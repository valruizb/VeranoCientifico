<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Proyectos;
use App\Models\DocumentoUsuario;
use App\Models\User;
use App\Notifications\Expediente;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Models\ProyectoUsuario;
use App\Http\Requests\StoreProyectoUsuarioRequest;
use App\Http\Requests\UpdateProyectoUsuarioRequest;

class ProyectoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private Proyectos $model;

    public function __construct()
    {
        $this->model = new Proyectos();
    }

    public function index(Request $request)
    {
        if($request != ''){
            //
            $request->status = $request->status === null ? true : $request->status;
            $records = $request->status == '0' ? $this->model->onlyTrashed() : $this->model;
            $records=
            $records = $records->when($request->search, function ($query, $search) {
                if ($search != '') {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('generalobject', 'LIKE', '%' . $search . '%')
                        ->orWhere('keywords', 'LIKE', '%' . $search . '%');
                }
            });
            $proyectos = $records->orderBy('id')->with('users','thematics', 'institutions', 'subthematics')->get();
        }else{
            $proyectos = Proyectos::with('users', 'thematics', 'institutions', 'subthematics')->get();
        }

        //  $proyectos = Proyectos::with('thematics', 'subthematics', 'institutions', 'users')->get();
        //$proyectos = Proyectos::with('subthematics')->get();
        //dd($proyectos);
        return Inertia::render("Proyectos/IndexAlumno", ['proyectos' => $proyectos],[
            //'proyectos'=> Proyectos::orderBy('id')->get(),
            //'tematicas' => Tematicas::orderby('id')->get(),
            //'proyectos' => $proyectos,
            'proyectos' => $proyectos,
            'loadingResults' => false,
            'search'         => $request->search ?? '',
            'status'         => (bool) $request->status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProyectoUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();

        if($request->proyecto1 != null){

            ProyectoUsuario::create([
                'user_id' => $id,
                'proyecto_id' => $request->proyecto1,
                'status' => 'En revision',
                'priority' => 1,
            ]);

            $proy = Proyectos::where('id', $request->proyecto1)->first();
            $idpost = ProyectoUsuario::where('user_id', $id)->where('proyecto_id', $request->proyecto1)->first();
            //dd($idpost->id);
            $profe = User::where('id', $proy->user_id)->first();
            $name = Auth::user()->name.' '.Auth::user()->lastnamep.' '.Auth::user()->lastnamem;
            $datos = [
                'titulo' => 'Solicitud de proyecto',
                'contenido' => 'El alumno '.$name.' quiere ser parte de uno de sus proyectos y selecciono que su poryecto es de ¡¡MAYOR PRIORIDAD!!, atienda a la BREVEDAD su solicitud',
                'ruta' => 'proyectospro/'.$idpost->id.'/edit'
            ];
            $profe->notify(new Expediente($datos));
        }
        if($request->proyecto2 != null){
            ProyectoUsuario::create([
                'user_id' => $id,
                'proyecto_id' => $request->proyecto2,
                'status' => 'En revision',
                'priority' => 2,]);
        }

        if($request->proyecto3 != null){
            ProyectoUsuario::create([
                'user_id' => $id,
                'proyecto_id' => $request->proyecto3,
                'status' => 'En revision',
                'priority' => 3,]);
        }

        Proyectos::where('id');

        //ProyectoUsuario::create(ProyectoUsuario::create($request->validated()));
        return redirect()->route('dashboard')->with('success', 'Proyecto guardado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProyectoUsuario  $proyectoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(ProyectoUsuario $proyectoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProyectoUsuario  $proyectoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit($idpost)
    {
        $post = ProyectoUsuario::where('id', $idpost)->first();
        $documento = DocumentoUsuario::where('user_id', $post->user_id)->where('document_id', 5)->first();
        //dd($documento->path);
        return Inertia::render("Proyectos/SeleccionAlumno", [
            'cvu' => $documento->path,
            'titulo' => 'Seleccion de alumno'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProyectoUsuarioRequest  $request
     * @param  \App\Models\ProyectoUsuario  $proyectoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectoUsuarioRequest $request, ProyectoUsuario $proyectoUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProyectoUsuario  $proyectoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProyectoUsuario $proyectoUsuario)
    {
        //
    }
}