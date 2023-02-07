<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Publico;
use App\Models\Proyectos;
use App\Models\Tematicas;
use App\Http\Requests\StorePublicoRequest;
use App\Http\Requests\UpdatePublicoRequest;

class PublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *$proyectos = Proyectos::with(['thematics' => function($query) {
      *      $query->select('name');
       * }])->get();
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proyectos = Proyectos::with('thematics', 'subthematics', 'institutions', 'users')->get();
        //$proyectos = Proyectos::with('subthematics')->get();
        //dd($proyectos);
        return Inertia::render("Verano", ['proyectos' => $proyectos],[
            //'proyectos'=> Proyectos::orderBy('id')->get(),
            //'tematicas' => Tematicas::orderby('id')->get(),
            'proyecto' => $proyectos,
            
            
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
