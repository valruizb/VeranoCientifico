<?php

namespace App\Http\Controllers;

use App\Models\evento;
use App\Http\Requests\StoreeventoRequest;
use App\Http\Requests\UpdateeventoRequest;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class EventoController extends Controller
{

    private evento $model;
    private string $source;
    private string $routeName;
    private string $module = 'evento';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Eventos/';
        $this->model = new evento();
        $this->routeName = 'evento.';

        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['update', 'edit']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("{$this->source}Index", [
            'eventos'   =>  $this->model::paginate(10),
            'titulo'          => 'Catálogo de Eventos',
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
            'titulo'          => 'Agregar Eventos',
            'routeName'      => $this->routeName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreeventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeventoRequest $request): RedirectResponse
    {
        evento::create($request->validated());
        return redirect()->route('evento.index')->with('success', 'Evento guardado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(evento $evento)
    {
        abort(405);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(evento $evento)
    {
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar Eventos',
            'routeName'      => $this->routeName,
            'eventos' => $evento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeventoRequest  $request
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeventoRequest $request, evento $evento)
    {
        $evento->update($request->validated());
        return redirect()->route('evento.index')->with('success', 'Evento actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(evento $evento)
    {
        $evento->delete();
        return redirect()->route('evento.index')->with('success', 'Evento eliminado con éxito');
    }
}
