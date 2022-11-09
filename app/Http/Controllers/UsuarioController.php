<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreusuarioRequest;
use App\Http\Requests\UpdateusuarioRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\modulo;
use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected string $routeName;
    protected string $source;
    protected string $module = 'usuarios';
    protected User $model;

    public function __construct()
    {
        $this->routeName = "usuarios.";
        $this->source    = "Seguridad/Usuarios/";
        $this->model     = new User();
        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['edit', 'update']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy']);
    }

    public function index(Request $request): Response
    {
        $request->validate(['search' => 'nullable']);

        $usuarios = $this->model::filtro($request->all('search', 'profile'))
            ->with('roles')
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render("{$this->source}Index", [
            'titulo'   => 'Catálogo de Usuarios',
            'usuarios' =>$usuarios,
            'profiles' => Role::get(['id', 'name']),
            'routeName'=> $this->routeName,
            'loadingResults' => false,
            'filtro' => $request->all('search','profile'),
        ]);

    }
    public function create(): Response
    {
        /* $permissions = Cache::rememberForever('permissions', function () {
            return Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray();
        }); */
        return Inertia::render("{$this->source}Create", [
            'titulo'=> 'Agregar Usuarios',
            'routeName'=> $this->routeName,
            'profiles'=> Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->get(),
            'permisos'=> Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray(),
            'modulos'=> modulo::orderBy('key')->get(['id', 'nombre', 'descripcion', 'key'])
        ]);
        
    }
    public function store(StoreusuarioRequest $request): RedirectResponse
    {
        $fields= $request->validated();
        $fields['password'] = Hash::make($fields['password']);
        $usuario = $this->model::create($fields);
        $roles = Role::whereIn('id', $request->profiles)->get();
        $usuario->syncRoles($roles);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito!');

    }
    public function show()
    {
        abort(405);
    }
    public function edit(User $usuarios):Response
    {
        //dd($usuarios);
       /*  $perfil = Cache::rememberForever("profile.{$perfil->id}", function () use ($perfil) {
            return $perfil->load('permissions:id,name,description,module_key');
        }); */
        /* $permissions = Cache::rememberForever('permissions', function () {
            return Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray();
        }); */
        return Inertia::render("{$this->source}Edit", [
            'titulo'    => 'Editar Usuarios.',
            'routeName' => $this->routeName,
            'record' => $usuarios->load('roles:id,name','permissions:id,name'),
            'profiles' => Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->get(),
            'permissions' => Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray(),
            'modules' => modulo::orderBy('key')->get(['id', 'nombre', 'descripcion', 'key'])
        ]);
    }
    public function update(UpdateusuarioRequest $request, User $usuarios)
    {
        //dd($usuarios);
        $usuarios->update($request->validated());
        $roles = Role::whereIn('id', $request->profiles)->get();
        //$permissions = Permission::whereIn('id', $request->permissions)->get();
        $usuarios->syncRoles($roles);
        //$usuario->syncPermissions($permissions);
        return redirect()->route('usuarios.index')->with('success', 'Usuario modificado con éxito');
    }
    public function destroy(User $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
    }
}
