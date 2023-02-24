<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\documento;
use App\Models\DocumentoUsuario;
use App\Notifications\Expediente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use App\Http\Requests\StoredocumentoRequest;
use App\Http\Requests\UpdatedocumentoRequest;
use Illuminate\Support\Facades\Artisan;

class DocumentoController extends Controller
{
    private documento $model;
    private string $source;
    private string $routeName;
    private string $module = 'documento';
    private $disk = 'public';

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
        $id = Auth::id();
        $curp = Auth::user()->curp;

        $doc1 = '';
        $doc2 = '';
        $doc3 = '';
        $doc4 = '';
        $doc5 = '';
        $doc6 = '';

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/formato_solicituD'.$id.'.pdf')){
            $doc1 = asset('storage/Expedientes/'.$curp.'/formato_solicituD'.$id.'.pdf');
        }

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/carta_academicA'.$id.'.pdf')){
            $doc2 = asset('storage/Expedientes/'.$curp.'/carta_academicA'.$id.'.pdf');
        }

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/carta_motivos'.$id.'.pdf')){
            $doc3 = asset('storage/Expedientes/'.$curp.'/carta_motivos'.$id.'.pdf');
        }

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/ine'.$id.'.pdf')){
            $doc4 = asset('storage/Expedientes/'.$curp.'/ine'.$id.'.pdf');
        }

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/cvu'.$id.'.pdf')){
            $doc5 = asset('storage/Expedientes/'.$curp.'/cvu'.$id.'.pdf');
        }

        if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/fotografia'.$id.'.jpeg')){
            $doc6 = asset('storage/Expedientes/'.$curp.'/fotografia'.$id.'.jpeg');
        }else{
            if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/fotografia'.$id.'.jpg')){
                $doc6 = asset('storage/Expedientes/'.$curp.'/fotografia'.$id.'.jpg');
            }else{
                if(Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/fotografia'.$id.'.png')){
                    $doc6 = asset('storage/Expedientes/'.$curp.'/fotografia'.$id.'.png');
                }
            }
        }



        return Inertia::render("{$this->source}Index", [
            'documentos'   =>  $this->model::paginate(10),
            'titulo'          => 'Catálogo de Documentos Probatorios',
            'routeName'      => $this->routeName,
            'documento1' => $doc1,
            'documento2' => $doc2,
            'documento3' => $doc3,
            'documento4' => $doc4,
            'documento5' => $doc5,
            'documento6' => $doc6,

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
        //
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