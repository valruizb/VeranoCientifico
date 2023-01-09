<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\User;
use App\Models\tematica;
use App\Models\subtematica;
use App\Models\Instituciones;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected string $routeName;
    protected string $source;
    protected string $module = 'usuarios';
    protected User $model;
    private $disk = 'public';

    public function __construct()
    {
        
        $this->routeName = "usuarios.";
        $this->source    = "Auth/";
        $this->model     = new User();

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return Inertia::render("{$this->source}Register", [
            'tematica'=>tematica::orderBy('name')->get(),
            'instituto' =>Instituciones::orderBy('id')->get(),
            'roles'=> Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->get(),
             /*'subtematica' => tematica::subtematica()->get(),
           'sub1' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'1')->get(),
            'sub2' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'2')->get(),
            'sub3' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'3')->get(),
            'sub4' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'4')->get(),
            'sub5' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'5')->get(),
            'sub6' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'6')->get(),
            'sub7' =>Subtematica::orderBy('id')->where('id_tematica', '=' ,'7')->get(),*/
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        /*$id =  Auth::id();
        $file = $request->file('URL_documento');
        $nombre = $request->input('nombre_documento') . $id . "." . $file->guessExtension();*/
        //dd($request->constancia);
        
        if($request -> hasFile(key:'formatosolicitud')){
            $filename = $request -> formatosolicitud -> getClientOriginalName();
            $request->formatosolicitud = "Storage/DocumentosRevisores/".$filename;
        }
        
        if($request -> hasFile(key:'constancia')){
            $filename = $request -> constancia -> getClientOriginalName();
            $constancia = $request->constancia = "Storage/DocumentosProfesores/".$filename;
            $file = $request->file('constancia');
            if (!Storage::disk($this->disk)->exists('DocumentosProfesores/'.$constancia)){
                $fields= $request->validated();
                $fields['password'] = Hash::make($fields['password']);
                $usuario = $this->model::create($fields);
                $roles = Role::where('id', $request->tipouser)->get();
                $usuario->syncRoles($roles);
                $file->storeAs('public/DocumentosProfesores', $constancia);
                return redirect()->route('registro.create')->with('success', 'Usuario registrado!');
            }
        }

        
        dd($request->constancia);
        /*$fields= $request->validated();
        $fields['password'] = Hash::make($fields['password']);
        $usuario = $this->model::create($fields);
        $roles = Role::where('id', $request->tipouser)->get();
        $usuario->syncRoles($roles);
        return redirect()->route('registro.create')->with('success', 'Usuario registrado!');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        abort(405);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistroRequest  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
