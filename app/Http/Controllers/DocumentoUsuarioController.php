<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\DocumentoUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDocumentoUsuarioRequest;
use App\Http\Requests\UpdateDocumentoUsuarioRequest;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcherInterface;

class DocumentoUsuarioController extends Controller
{

    private $disk = 'public';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentoUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentoUsuarioRequest $request)
    {
        $id = Auth::id();
        $curp = Auth::user()->curp;

        
        if($request -> hasFile(key:'requestform') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 1)->first()){
            $file = $request->file('requestform');
            $filename = 'formato_solicitud' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 1,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }else{
            dd('Ya esta');
        }

        if($request -> hasFile(key:'academicdoc') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 2)->first()){
            $file = $request->file('academicdoc');
            $filename = 'carta_academica' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
                
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 2,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }


        if($request -> hasFile(key:'motivedoc') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 3)->first()){
            $file = $request->file('motivedoc');
            $filename = 'carta_motivos' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
                
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 3,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }

        if($request -> hasFile(key:'ine') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 4)->first()){
            $file = $request->file('ine');
            $filename = 'INE' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
                
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 4,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }

        if($request -> hasFile(key:'cvu') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 5)->first()){
            $file = $request->file('cvu');
            $filename = 'CVU' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
                
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 5,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }


        if($request -> hasFile(key:'foto') && !DocumentoUsuario::where('user_id',$id)->where('document_id', 6)->first()){
            $file = $request->file('foto');
            $filename = 'fotografia' .$id.".". $file->guessExtension();
            if(!File::isDirectory(public_path('Expedientes/'.$curp))){
                Storage::makeDirectory('public/Expedientes/'.$curp);
                
            }

            if (!Storage::disk($this->disk)->exists('Expedientes/'.$curp.'/'.$filename)){
                DocumentoUsuario::create([
                    'user_id' => $id,
                    'document_id' => 6,
                    'name_doc' => $filename,
                    'status' => 'Cargado'
                ] );

                $file->storeAs('public/Expedientes/'.$curp, $filename);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentoUsuario  $documentoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentoUsuario $documentoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentoUsuario  $documentoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentoUsuario $documentoUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentoUsuarioRequest  $request
     * @param  \App\Models\DocumentoUsuario  $documentoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentoUsuarioRequest $request, DocumentoUsuario $documentoUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentoUsuario  $documentoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentoUsuario $documentoUsuario)
    {
        //
    }
}
