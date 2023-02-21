<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function index()
{
    $proyectos = Proyectos::select('thematics.name as thematic_name', DB::raw('count(*) as total'))
    ->join('thematics', 'proyectos.thematic_id', '=', 'thematics.id')
    ->groupBy('thematics.name')
    ->get();



    return Inertia::render('Reportes/Tematicas', [
        'proyectos' => $proyectos
    ]);
}
}
