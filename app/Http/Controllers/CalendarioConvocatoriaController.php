<?php

namespace App\Http\Controllers;

use App\Models\calendario_convocatoria;
use App\Http\Requests\Storecalendario_convocatoriaRequest;
use App\Http\Requests\Updatecalendario_convocatoriaRequest;
use App\Models\convocatoria;
use App\Models\evento;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class CalendarioConvocatoriaController extends Controller
{

    private calendario_convocatoria $model;
    private string $source;
    private string $routeName;
    private string $module = 'calendario';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Calendario/';
        $this->model = new calendario_convocatoria();
        $this->routeName = 'calendario.';

        
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
            'calendarios'   =>  $this->model::with('Convocatorias','Eventos')->paginate(10),
            'titulo'          => 'Calendario de Eventos',
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
            'titulo'          => 'Agregar Calendario',
            'routeName'      => $this->routeName,
            'convocatorias'  => convocatoria::orderBy('id')->get(),
            'eventos' => evento::orderBy('id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storecalendario_convocatoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecalendario_convocatoriaRequest $request)
    {
        calendario_convocatoria::create($request->validated());
        return redirect()->route('calendario.index')->with('success', 'Evento guardado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calendario_convocatoria  $calendario_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function show(calendario_convocatoria $calendario_convocatoria)
    {
        abort(405);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calendario_convocatoria  $calendario_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(calendario_convocatoria $calendario)
    {
        //dd($calendario_convocatoria);
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar Calendario de Eventos',
            'routeName'      => $this->routeName,
            'calendarios' => $calendario,
            'convocatorias'  => convocatoria::orderBy('id')->get(),
            'eventos' => evento::orderBy('id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecalendario_convocatoriaRequest  $request
     * @param  \App\Models\calendario_convocatoria  $calendario_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecalendario_convocatoriaRequest $request, calendario_convocatoria $calendario)
    {
        $calendario->update($request->validated());
        return redirect()->route('calendario.index')->with('success', 'Calendario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calendario_convocatoria  $calendario_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(calendario_convocatoria $calendario)
    {
        $calendario->delete();
        return redirect()->route('calendario.index')->with('success', 'Calendario eliminado con éxito');
    }
}
