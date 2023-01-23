<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Renapo;
use App\Models\User;
use App\Models\Tematicas;
use App\Models\Subtematicas;
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
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected string $routeName;
    protected string $source, $source2;
    protected string $module = 'usuarios';
    protected User $model;
    private $disk = 'public';

    public function __construct()
    {
        
        $this->routeName = "usuarios.";
        $this->source    = "Auth/";
        $this->source2    = "Usuarios/";
        $this->model     = new User();

    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $thematic = Tematicas::all();
        $thematic->load('subtematica');
        return Inertia::render("{$this->source}Register", [
            'tematica'=>$thematic,
            'instituto' =>Instituciones::orderBy('id')->get(),
            'roles'=> Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->where('id', '!=', '1')->get(),
            'subtematica' => Subtematicas::get(),
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistroRequest $request): RedirectResponse
    {
        //dd($request);

        if($request -> hasFile(key:'requestform')){
            $file = $request->file('requestform');
            $formatosolicitud = $request->input('name_doc') .$request->curp .".". $file->guessExtension();

            if (!Storage::disk($this->disk)->exists('DocumentosRevisores/'.$formatosolicitud)){
                
                $fields= $request->validated();
                
                //$fields['constancia'] = $request -> constancia -> getClientOriginalName();
                    
                $fields['password'] = Hash::make($fields['password']);
                $usuario = $this->model::create([
                    'rol' => $fields['rol'],
                    'name' => $fields['name'],
                    'lastnamep' => $fields['lastnamep'],
                    'lastnamem' => $fields['lastnamem'],
                    'curp' => $fields['curp'],
                    'email' => $fields['email'],
                    'emailcon' => $fields['emailcon'],
                    'phone' => $fields['phone'],
                    'institution_id' => $fields['institution_id'],
                    'thematic_id' => $fields['thematic_id'],
                    'subthematic_id' => $fields['subthematic_id'],
                    'snilevel' => $fields['snilevel'],
                    'grademax' => $fields['maxgrade'],
                    'invline' => $fields['invline'],
                    'job' => $fields['job'],
                    'password' => $fields['password'],
                    'requestform' => $formatosolicitud
                ] );
                $roles = Role::where('id', $request->rol)->get();
                $usuario->syncRoles($roles);
                $file->storeAs('public/DocumentosRevisores', $formatosolicitud);
                event(new Registered($usuario));
                return redirect()->route('dashboard')->with('success', 'Usuario registrado!');
            }else{
                return 'Este documento ya fue subido';
            }
        }
        
        if($request -> hasFile(key:'constancy')){
            $file = $request->file('constancy');
            $constancia = $request->input('name_doc') .$request->curp .".". $file->guessExtension();
            //dd($constancia); 
            //$constancia = $request -> constancia -> getClientOriginalName();
            //$request->constancia = $constancia;  
            if (!Storage::disk($this->disk)->exists('DocumentosProfesores/'.$constancia)){
                
                $fields= $request->validated();
                
                //$fields['constancia'] = $request -> constancia -> getClientOriginalName();
                    
                $fields['password'] = Hash::make($fields['password']);
                $usuario = $this->model::create([
                    'rol' => $fields['rol'],
                    'name' => $fields['name'],
                    'lastnamep' => $fields['lastnamep'],
                    'lastnamem' => $fields['lastnamem'],
                    'curp' => $fields['curp'],
                    'email' => $fields['email'],
                    'emailcon' => $fields['emailcon'],
                    'phone' => $fields['phone'],
                    'institution_id' => $fields['institution_id'],
                    'thematic_id' => $fields['thematic_id'],
                    'subthematic_id' => $fields['subthematic_id'],
                    'snilevel' => $fields['snilevel'],
                    'grademax' => $fields['maxgrade'],
                    'invline' => $fields['invline'],
                    'job' => $fields['job'],
                    'password' => $fields['password'],
                    'constancy' => $constancia
                ] );
                $roles = Role::where('id', $request->rol)->get();
                $usuario->syncRoles($roles);
                $file->storeAs('public/DocumentosProfesores', $constancia);
                event(new Registered($usuario));
                return redirect()->route('registro.create')->with('success', 'Usuario registrado!');
            }else{
                return 'Este documento ya fue subido';
            }
                
        }

        if($request->rol == 4){
            //dd($request);
            $fields= $request->validated();
            $fields['password'] = Hash::make($fields['password']);
            $usuario = $this->model::create($fields);
            $roles = Role::where('id', $request->rol)->get();
            $usuario->syncRoles($roles);
            //$file->storeAs('public/DocumentosProfesores', $constancia);
            event(new Registered($usuario));
            return redirect()->route('dashboard')->with('success', 'Usuario registrado!');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        if(Renapo::where('curp',$request)->exists()){
            $records = Renapo::where('curp',$request)->get();
        }else{
            $response = Http::get("https://curpws.bienestar.gob.mx/ServiceCurpPro/ConsultaPor/Curp/".$request);
            $data = $response->object();
            //dd($data);
            $reg = new Renapo();
            $reg->curp = $data->response->curp;
            $reg->curpRespuesta = $data->response->curpRespuesta;
            $reg->nombres = $data->response->nombres;
            $reg->apellidopaterno = $data->response->apellidoPaterno;
            $reg->apellidomaterno = $data->response->apellidoMaterno;
            $reg->save();
            $records = Renapo::where('curp',$request)->get();
        }
        return $records[0];
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
