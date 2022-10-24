<?php

namespace App\Http\Controllers;

use App\Models\documento;
use App\Http\Requests\StoredocumentoRequest;
use App\Http\Requests\UpdatedocumentoRequest;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class DocumentoController extends Controller
{
    private documento $model;
    private string $source;
    private string $routeName;
    private string $module = 'documento';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Documentos/';
        $this->model = new documento();
        $this->routeName = 'documento.';

        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['update', 'edit']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy', 'edit']);
    }

    public function index()
    {
        return Inertia::render("{$this->source}Index", [
            'documentos'   =>  $this->model::paginate(10),
            'titulo'          => 'Catálogo de Documentos Probatorios',
            'routeName'      => $this->routeName,
            'loadingResults' => false
        ]);
    }
    public function create()
    {
        return Inertia::render("{$this->source}Create", [
            'titulo'          => 'Agregar Documentos',
            'routeName'      => $this->routeName
        ]);
    }
    public function store(StoredocumentoRequest $request)
    {
        documento::create($request->validated());
        return redirect()->route('documento.index')->with('success', 'Documento guardado con éxito!');
    }
    public function show(documento $documento)
    {
        abort(405);
    }
    public function edit(documento $documento)
    {
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar Documentos',
            'routeName'      => $this->routeName,
            'documentos' => $documento
        ]);
    }
    public function update(UpdatedocumentoRequest $request, documento $documento)
    {
        $documento->update($request->validated());
        return redirect()->route('documento.index')->with('success', 'Documento actualizado correctamente!');
    }
    public function destroy(documento $documento)
    {
        $documento->delete();
        return redirect()->route('documento.index')->with('success', 'Documento eliminado con éxito');
    }
}
