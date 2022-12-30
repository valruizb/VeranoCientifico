<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Http\Requests\StoreProyectosRequest;
use App\Http\Requests\UpdateProyectosRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\tematica;
use App\Models\subtematica;

class ProyectosController extends Controller
{

    private Proyectos $model;
    private string $source;
    private string $routeName;
    private string $module = 'proyectos';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->source = 'Proyectos/';
        $this->model = new Proyectos();
        $this->routeName = 'proyectos.';
/* 

        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['update', 'edit']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy', 'edit']); */
    }
    public function index(Request $request)
    {
        $request->status = $request->status === null ? true : $request->status;
        $records = $request->status == '0' ? $this->model->onlyTrashed() : $this->model;
        $records = $records->when($request->search, function ($query, $search) {
            if ($search != '') {
                $query->where('titulo', 'LIKE', '%' . $search . '%')
                    ->orWhere('objectgeneral', 'LIKE', '%' . $search . '%');
            }
        });
        return Inertia::render("Proyectos/Index", [
            'titulo'          => 'Proyectos',
            'routeName'      => $this->routeName,
            'proyectos'=>  $records->paginate(3),
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
        return Inertia::render("{$this->source}Create", [
            'titulo'          => 'Agregar Módulos',
            'routeName'      => $this->routeName,
            'tem'=>tematica::orderBy('name')->get(),
            'subtem'=>subtematica::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProyectosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectosRequest $request)
    {
        //dd($request);
        Proyectos::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyectos $proyectos)
    {
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar Módulos',
            'routeName'      => $this->routeName,
            'proyectos' => $proyectos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProyectosRequest  $request
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectosRequest $request, Proyectos $proyectos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyectos $proyectos)
    {
        //
    }
}
