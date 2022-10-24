<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CalendarioConvocatoriaController;
use App\Http\Controllers\DocumentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas publicas
Route::resource('registro', RegistroController::class);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('registro.create'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);



});

Route::middleware([
    'auth:sanctum',
    //config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('permissions', PermissionController::class)->names('permissions');
    Route::resource('modulo', ModuloController::class)->parameters(['modulo' => 'modulo']);
    //Route::resource('permissions', PermissionController::class)->parameters(['permissions' => 'permissions']);
    Route::resource('usuarios', UsuarioController::class)->parameters(['usuarios' => 'usuarios']);
    Route::resource('perfiles', PerfilesController::class)->parameters(['perfiles' => 'perfiles']);
    
    Route::resource('convocatoria', ConvocatoriaController::class)->parameters(['convocatoria' => 'convocatoria']);
    Route::resource('evento', EventoController::class)->parameters(['evento' => 'evento']);
    Route::resource('calendario', CalendarioConvocatoriaController::class)->parameters(['calendario' => 'calendario']);
    Route::resource('documento', DocumentoController::class)->parameters(['documento' => 'documento']);
    
});


