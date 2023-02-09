<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Publico;
use App\Models\Proyectos;
use App\Http\Requests\StorePublicoRequest;
use App\Http\Requests\UpdatePublicoRequest;
use Illuminate\Http\Request;

class PublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *$proyectos = Proyectos::with(['thematics' => function($query) {
      *      $query->select('name');
       * }])->get();
     * @return \Illuminate\Http\Response
     */
    private Proyectos $model;
    public function __construct()
    {
        $this->model = new Proyectos();
    }

    public function index(Request $request)
    {
       
        //$proyectos = Proyectos::with('users','thematics', 'subthematics')->paginate(3);
        if($request != ''){
            //
            $request->status = $request->status === null ? true : $request->status;
            $records = $request->status == '0' ? $this->model->onlyTrashed() : $this->model;
            $records= 
            $records = $records->when($request->search, function ($query, $search) {
                if ($search != '') {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('generalobject', 'LIKE', '%' . $search . '%')
                        ->orWhere('keywords', 'LIKE', '%' . $search . '%');
                }
            });
            $proyectos = $records->orderBy('id')->with('users','thematics', 'institutions', 'subthematics')->get();
        }else{
            $proyectos = Proyectos::with('users', 'thematics', 'institutions', 'subthematics')->get();
        }

        //  $proyectos = Proyectos::with('thematics', 'subthematics', 'institutions', 'users')->get();
        //$proyectos = Proyectos::with('subthematics')->get();
        //dd($proyectos);
        return Inertia::render("Verano", ['proyectos' => $proyectos],[
            //'proyectos'=> Proyectos::orderBy('id')->get(),
            //'tematicas' => Tematicas::orderby('id')->get(),
            //'proyectos' => $proyectos,    
            'proyectos' => $proyectos,
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
     * @param  \App\Http\Requests\StorePublicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publico  $publico
     * @return \Illuminate\Http\Response
     */
    public function show(Publico $publico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publico  $publico
     * @return \Illuminate\Http\Response
     */
    public function edit(Publico $publico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicoRequest  $request
     * @param  \App\Models\Publico  $publico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicoRequest $request, Publico $publico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publico  $publico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publico $publico)
    {
        //
    }
}
