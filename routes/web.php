<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\reporteasistencia3Controller;
use App\Http\Controllers\reporteasistencia2Controller;
use App\Http\Controllers\registroinicio_extrangeroController;
use App\Http\Controllers\reporteasistencia1Controller;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditpController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\ComfigController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\Welcome2Controller;
use App\Http\Controllers\carta_homeController;


// Modifica la ruta raíz para que use el inicioController
Route::get('/', [inicioController::class, 'index'])->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('iniciodasboard');
    })->name('dashboard');
});

Route::get('/reporteasistencia1', [reporteasistencia1Controller::class, 'index'])->name('reporteasistencia1');
Route::get('/reporteasistencia3', [reporteasistencia3Controller::class, 'index'])->name('reporteasistencia3');
Route::get('/reporteasistencia2', [reporteasistencia2Controller::class, 'index'])->name('reporteasistencia2');
Route::get('/inicio', [inicioController::class, 'index'])->name('inicio');
Route::get('/registroinicio_extrangero', [registroinicio_extrangeroController::class, 'index'])->name('registroinicio_extrangero');
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');
Route::get('/Home', [HomeController::class, 'index'])->name('Home');
Route::get('/editarperfil', [EditpController::class, 'index'])->name('editarperfil');
Route::get('/certificados', [CertificadoController::class, 'index'])->name('certificados');
Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('/mapa', [MapaController::class, 'index'])->name('mapa');
Route::get('/comfiguracionAva', [ComfigController::class, 'index'])->name('comfiguracionAva');
Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte');
Route::get('/iniciodasboard', [Welcome2Controller::class, 'index'])->name('iniciodasboard');
Route::get('/carta_del_home', [carta_homeController::class, 'index'])->name('carta_del_home');

