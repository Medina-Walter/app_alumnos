<?php

use App\Http\Controllers\MisTalleresController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Clientes;
use App\Livewire\Producto\FormularioProductos;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\InscripcionController;

Route::get('/login', Login::class)->name('login');
Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/mis_talleres', [MisTalleresController::class, 'index'])->name('mis_talleres');
    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/productos', FormularioProductos::class)->name('productos');
    Route::post('/inscripciones/{taller}', [InscripcionController::class, 'store'])->name('inscripciones.store');
    Route::delete('/inscripciones/{taller}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');

    // Nueva ruta para ver los talleres
    Route::get('/talleres', [TallerController::class, 'index'])->name('talleres.index');
});
