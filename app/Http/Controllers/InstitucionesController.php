<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Http\Requests\StoreInstitucionesRequest;
use App\Http\Requests\UpdateInstitucionesRequest;

class InstitucionesController extends Controller
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
     * @param  \App\Http\Requests\StoreInstitucionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitucionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function show(Instituciones $instituciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituciones $instituciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstitucionesRequest  $request
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstitucionesRequest $request, Instituciones $instituciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituciones $instituciones)
    {
        //
    }
}
