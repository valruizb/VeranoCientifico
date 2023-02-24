<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ModuloController;
use App\Actions\Fortify\UpdateUserPassword;
use App\Http\Controllers\PublicoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\TematicasController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AcercaVeranoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\SubtematicasController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\ProyectoUsuarioController;
use App\Http\Controllers\DocumentoUsuarioController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CalendarioConvocatoriaController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
Route::resource('acercaverano', AcercaVeranoController::class);
Route::resource('verano', PublicoController::class);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('registro.create'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,]);
});

Route::post('/guardar-archivo', function (Request $request) {
    $curp = $request->input('curp');
    $id = $request->input('id');

    if(!File::isDirectory(public_path('Expedientes/'.$curp))){
        Storage::makeDirectory('public/Expedientes/'.$curp);
    }
    $nombreDoc = $request->input('namedoc');
    $file = $request->file('archivo');
    $filename = $nombreDoc.$id.".". $file->guessExtension();
    if(!Storage::disk('public')->exists('Expedientes/'.$curp.'/'.$filename)){
        $rutaArchivo = Storage::putFileAs('public/Expedientes/'.$curp, $file, $filename);
        $urlArchivo = asset('storage/Expedientes/'.$curp.'/'.$filename);
    }else{
        Storage::delete('Expedientes/'.$curp.'/'.$filename);
        $rutaArchivo = Storage::putFileAs('public/Expedientes/'.$curp, $file, $filename);
        $urlArchivo = asset('storage/Expedientes/'.$curp.'/'.$filename);

    }
    return response()->json(['url' => $urlArchivo]);
});

Route::post('/eliminar-archivo', function (Request $request) {
    $path = $request->input('path');
    $ruta = Str::after($path, "storage/");
    $url = 'public/'.$ruta;
    Storage::delete($url);
    return response('El archivo se ha eliminado exitosamente');
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
    Route::resource('docuser', DocumentoUsuarioController::class)->parameters(['docuser' => 'docuser']);
    Route::resource('convocatoria', ConvocatoriaController::class)->parameters(['convocatoria' => 'convocatoria']);
    Route::resource('evento', EventoController::class)->parameters(['evento' => 'evento']);
    Route::resource('calendario', CalendarioConvocatoriaController::class)->parameters(['calendario' => 'calendario']);
    Route::resource('documento', DocumentoController::class)->parameters(['documento' => 'documento']);
    Route::resource('proyectos', ProyectosController::class)->parameters(['proyectos' => 'proyectos']);
    Route::resource('instituciones', InstitucionesController::class)->parameters(['instituciones' => 'instituciones']);
    Route::resource('tematicas', TematicasController::class)->parameters(['tematicas' => 'tematicas']);
    Route::resource('subtematicas', SubtematicasController::class)->parameters(['subtematicas' => 'subtematicas']);
    Route::resource('proyectospro', ProyectoUsuarioController::class)->parameters(['proyectospro' => 'proyectospro']);    
    Route::get('/adminp', [ProyectosController::class, 'indexadmin'])->name('indexadmin');
    //Route::get('/reportes', [ProyectosController::class, 'reportespdf'])->name('reportespdf');
    Route::resource('reportes', ReportesController::class)->parameters(['reportes' => 'reportes']);  
    Route::post('reportes/pdf', [ReportesController::class, 'pdf'])->name('pdf');  
});


