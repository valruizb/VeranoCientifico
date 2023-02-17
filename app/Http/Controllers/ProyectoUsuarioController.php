<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Proyectos;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProyectoUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        dd($request);
        ProyectoUsuario::create($request->validated());    
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
    public function edit(ProyectoUsuario $proyectoUsuario)
    {
        //
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
