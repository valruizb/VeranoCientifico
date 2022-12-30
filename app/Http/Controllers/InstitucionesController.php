<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Http\Requests\StoreInstitucionesRequest;
use App\Http\Requests\UpdateInstitucionesRequest;
use Inertia\Inertia;

class InstitucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        protected string $routeName;
        protected string $source;
        protected string $module = 'instituciones';
        protected Instituciones $model;
    
        public function __construct()
        {
            $this->routeName = "instituciones.";
            $this->source    = "Instituciones/";
            $this->model     = new Instituciones();
            $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
            $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
            $this->middleware("permission:{$this->module}.update")->only(['update', 'edit']);
            $this->middleware("permission:{$this->module}.delete")->only(['destroy', 'edit']); 
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
        return Inertia::render("{$this->source}Create", [
            'titulo'=>'Agregar Institución',
            'routeName'=>$this->routeName,
            'instituciones'=>instituciones::orderBy('id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstitucionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitucionesRequest $request)
    {
        $this->model::create($request->validated());
        return redirect()->route('instituciones.index')->with('success', 'Permiso guardado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function show(Instituciones $instituciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituciones $instituciones)
    {
        abort(405);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstitucionesRequest  $request
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstitucionesRequest $request, Instituciones $instituciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituciones $instituciones)
    {
        //
    }
}
