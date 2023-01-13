<?php

namespace App\Http\Controllers;

use App\Models\Publico;
use App\Http\Requests\StorePublicoRequest;
use App\Http\Requests\UpdatePublicoRequest;

class PublicoController extends Controller
{
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
