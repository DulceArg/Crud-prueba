<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

// Redirige la página de inicio directamente al índice de películas
Route::get('/', function () {
    return redirect()->route('peliculas.index');
});

// Rutas automáticas para el CRUD de películas
Route::resource('peliculas', PeliculaController::class);