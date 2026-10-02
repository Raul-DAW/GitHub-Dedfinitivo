<?php

use App\Http\Controllers\SegundasRutasController;
use App\Http\Controllers\PrimerasRutasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrimerasRutasController::class, 'index']);

Route::get('mensaje', [PrimerasRutasController::class, 'primerMensaje']);

Route::get('segunda/enlaces', [SegundasRutasController::class, 'enlaces']);

Route::get(
    'tercera/destino',
    [App\Http\Controllers\TercerasRutasController::class, 'notFound']
);
