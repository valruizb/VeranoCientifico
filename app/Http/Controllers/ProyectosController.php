<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Http\Requests\StoreProyectosRequest;
use App\Http\Requests\UpdateProyectosRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{

    private Proyectos $model;
    private string $source;
    private string $routeName;

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
    }
    public function index(Request $request)
    {
        $request->status = $request->status === null ? true : $request->status;
        $records = $request->status == '0' ? $this->model->onlyTrashed() : $this->model;
        $records = $records->when($request->search, function ($query, $search) {
            if ($search != '') {
                $query->where('nombre', 'LIKE', '%' . $search . '%')
                    ->orWhere('descripcion', 'LIKE', '%' . $search . '%');
            }
        });
        return Inertia::render("Proyectos/Index", [
            'titulo'          => 'Proyectos',
            'routeName'      => $this->routeName,
            'proyectos'=>Proyectos::orderBy('titulo')->get(),
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
     * @param  \App\Http\Requests\StoreProyectosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectosRequest $request)
    {
        //
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
        //
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
