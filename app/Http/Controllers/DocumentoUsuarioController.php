<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\DocumentoUsuario;
use App\Notifications\Expediente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
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
        $userId = Auth::id();
        $us = User::where('id', $userId)->first();
        $docs = DocumentoUsuario::where('user_id', $userId)->get();

        $alldocs = [
            [
                'name' => 'Formato Solicitud',
                'name_doc' => $docs[0]->name_doc,
                'status' => $docs[0]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[0]->name_doc)
            ],
            [
                'name' => 'Carta Academica',
                'name_doc' => $docs[1]->name_doc,
                'status' => $docs[1]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[1]->name_doc)
            ],
            [
                'name' => 'Carta Motivos',
                'name_doc' => $docs[2]->name_doc,
                'status' => $docs[2]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[2]->name_doc)
            ],
            [
                'name' => 'INE',
                'name_doc' => $docs[3]->name_doc,
                'status' => $docs[3]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[3]->name_doc)
            ],
            [
                'name' => 'CVU',
                'name_doc' => $docs[4]->name_doc,
                'status' => $docs[4]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[4]->name_doc)
            ],
            [
                'name' => 'Foto',
                'name_doc' => $docs[5]->name_doc,
                'status' => $docs[5]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[5]->name_doc)
            ],
        ];
        //dd($us[0]->curp);
        return Inertia::render("Documentos/Expediente", [
            'docs' => $alldocs,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
        $ins = Auth::user()->institution_id;

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 1)->first()){
            DocumentoUsuario::create(['user_id' => $id, 'document_id' => 1,'path' => $request->requestform]);
        }

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 2)->first()){
            DocumentoUsuario::create(['user_id' => $id,'document_id' => 2,'path' => $request->academicdoc]);
        }

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 3)->first()){
            DocumentoUsuario::create(['user_id' => $id,'document_id' => 3,'path' => $request->motivedoc]);
        }

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 4)->first()){
            DocumentoUsuario::create(['user_id' => $id,'document_id' => 4,'path' => $request->ine,]);
        }

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 5)->first()){
            DocumentoUsuario::create(['user_id' => $id,'document_id' => 5,'path' => $request->cvu,]);
        }

        if(!DocumentoUsuario::where('user_id', $id)->where('document_id', 6)->first()){
            DocumentoUsuario::create(['user_id' => $id,'document_id' => 6,'path' => $request->foto,]);
        }

        if(DocumentoUsuario::where('user_id', $id)->count() == 6){

        DB::table('records')->insert([
            'student_id' => $id,
            'status' => 'Cargado',
            'created_at' => now(),
        ]);

            $name = Auth::user()->name.' '.Auth::user()->lastnamep.' '.Auth::user()->lastnamem;

            $datos = [
                'titulo' => 'Expediente Hola',
                'contenido' => 'El alumno '.$name,
                'id' => $id
            ];

            $revs = User::where('rol', 3)->where('institution_id', $ins)->get();

            foreach ($revs as $rev) {
                $rev->notify(new Expediente($datos));
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
    public function edit($userId)
    {
        $us = User::where('id', $userId)->first();
        $docs = DocumentoUsuario::where('user_id', $userId)->get();

        $alldocs = [
            [
                'name' => 'Formato Solicitud',
                'name_doc' => $docs[0]->name_doc,
                'status' => $docs[0]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[0]->name_doc)
            ],
            [
                'name' => 'Carta Academica',
                'name_doc' => $docs[1]->name_doc,
                'status' => $docs[1]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[1]->name_doc)
            ],
            [
                'name' => 'Carta Motivos',
                'name_doc' => $docs[2]->name_doc,
                'status' => $docs[2]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[2]->name_doc)
            ],
            [
                'name' => 'INE',
                'name_doc' => $docs[3]->name_doc,
                'status' => $docs[3]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[3]->name_doc)
            ],
            [
                'name' => 'CVU',
                'name_doc' => $docs[4]->name_doc,
                'status' => $docs[4]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[4]->name_doc)
            ],
            [
                'name' => 'Foto',
                'name_doc' => $docs[5]->name_doc,
                'status' => $docs[5]->status,
                'url' => asset('storage/Expedientes/'.$us->curp.'/'.$docs[5]->name_doc)
            ],
        ];
        //dd($us[0]->curp);
        return Inertia::render("Documentos/IndexRevisor", [
            'docs' => $alldocs,
            'alumn' => $userId,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentoUsuarioRequest  $request
     * @param  \App\Models\DocumentoUsuario  $documentoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentoUsuarioRequest $request, $userId)
    {
        $id = Auth::id();
        //dd($request);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 1)
              ->update(['status' => $request->requestform, 'rev_id' => $id]);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 2)
              ->update(['status' => $request->academicdoc, 'rev_id' => $id]);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 3)
              ->update(['status' => $request->motivedoc, 'rev_id' => $id]);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 4)
              ->update(['status' => $request->ine, 'rev_id' => $id]);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 5)
              ->update(['status' => $request->cvu, 'rev_id' => $id]);

        DB::table('documents_user')
              ->where('user_id', $userId)
              ->where('document_id', 6)
              ->update(['status' => $request->foto, 'rev_id' => $id]);
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