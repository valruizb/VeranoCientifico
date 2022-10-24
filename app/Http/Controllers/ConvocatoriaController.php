<?php

namespace App\Http\Controllers;

use App\Models\convocatoria;
use App\Http\Requests\StoreconvocatoriaRequest;
use App\Http\Requests\UpdateconvocatoriaRequest;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class ConvocatoriaController extends Controller
{
    private convocatoria $model;
    private string $source;
    private string $routeName;
    private string $module = 'convocatoria';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Convocatorias/';
        $this->model = new convocatoria();
        $this->routeName = 'convocatoria.';

        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['update', 'edit']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy', 'edit']);
    }

    public function index()
    {
        return Inertia::render("{$this->source}Index", [
            'convocatorias'   =>  $this->model::paginate(10),
            'titulo'          => 'Catálogo de Convocatorias',
            'routeName'      => $this->routeName,
            'loadingResults' => false
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
            'titulo'          => 'Agregar Convocatorias',
            'routeName'      => $this->routeName
        ]);
    }

    public function store(StoreconvocatoriaRequest $request): RedirectResponse
    {
        convocatoria::create($request->validated());
        return redirect()->route('convocatoria.index')->with('success', 'Convocatoria guardada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function show(convocatoria $convocatoria)
    {
        abort(405);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(convocatoria $convocatoria)
    {
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar Convocatorias',
            'routeName'      => $this->routeName,
            'convocatorias' => $convocatoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateconvocatoriaRequest  $request
     * @param  \App\Models\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateconvocatoriaRequest $request, convocatoria $convocatoria)
    {
        $convocatoria->update($request->validated());
        return redirect()->route('convocatoria.index')->with('success', 'Convocatoria actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(convocatoria $convocatoria)
    {
        $convocatoria->delete();
        return redirect()->route('convocatoria.index')->with('success', 'Convocatoria eliminada con éxito');
    }
}
