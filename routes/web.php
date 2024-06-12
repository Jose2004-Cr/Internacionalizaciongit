<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\registro3Controller;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\registroinicioController;
use App\Http\Controllers\welcomeinicialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarioController;

// Modifica la ruta raíz para que use el inicioController
Route::get('/', [inicioController::class, 'index'])->name('inicio');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/Registro3',[registro3Controller::class,'index'])->name('Registro3');
Route::get('/welcome',[welcomeController::class,'index'])->name('welcome');
Route::get('/inicio',[inicioController::class,'index'])->name('inicio');
Route::get('/registroinicio',[registroinicioController::class,'index'])->name('registroinicio');
Route::get('/welcomeinicial',[welcomeinicialController::class,'index'])->name('welcomeinicial');

Route::get('/Registro3', [registro3Controller::class, 'index'])->name('Registro3');
Route::get('/welcome', [welcomeController::class, 'index'])->name('welcome');
Route::get('/inicio', [inicioController::class, 'index'])->name('inicio');
Route::get('/registroinicio', [registroinicioController::class, 'index'])->name('registroinicio');
Route::get('/welcomeinicial', [welcomeinicialController::class, 'index'])->name('welcomeinicial');
Route::get('/Home', [HomeController::class, 'index'])->name('Home');
Route::get('/Calendario', [calendarioController::class, 'index'])->name('Calendario');
