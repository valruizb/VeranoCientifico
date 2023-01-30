<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\documento;
use App\Models\DocumentoUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoredocumentoRequest;
use App\Http\Requests\UpdatedocumentoRequest;

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
        $curp = Auth::user()->curp;

        $doc1 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 1)->first();
        $doc2 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 2)->first();
        $doc3 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 3)->first();
        $doc4 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 4)->first();
        $doc5 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 5)->first();
        $doc6 = DocumentoUsuario::select('name_doc')->where('user_id', Auth::id())->where('document_id', 6)->first();

        
        //dd(asset('Expedientes/'.$curp.'/'.$doc1->name_doc));
        
        return Inertia::render("{$this->source}Index", [
            'documentos'   =>  $this->model::paginate(10),
            'titulo'          => 'Catálogo de Documentos Probatorios',
            'routeName'      => $this->routeName,
            'loadingResults' => false,
            'doc' => $doc1->name_doc,
            'doc2' => $doc2,
            'doc3' => $doc3,
            'doc4' => $doc4,
            'doc5' => $doc5,
            'doc6' => $doc6,
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
