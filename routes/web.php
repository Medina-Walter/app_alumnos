<?php

use App\Http\Controllers\DesarrolladoresController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProfesoresCrud;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Clientes;
use App\Livewire\Producto\FormularioProductos;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\MisTalleresController;

Route::get('/login', Login::class)->name('login');
Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('/mis_talleres', [MisTalleresController::class, 'index'])->name('mis_talleres');

    Route::get('/profesores', function () {
        return view('profesores');
    })->name('profesores.index');

    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/productos', FormularioProductos::class)->name('productos');
    Route::post('/inscripciones/{taller}', [InscripcionController::class, 'store'])->name('inscripciones.store');
    Route::delete('/inscripciones/{taller}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');
    Route::get('/medina_walter', [DesarrolladoresController::class, 'index'])->name('medina_walter');
    Route::get('/camila_ozuna', [DesarrolladoresController::class, 'perfilCamila'])->name('camila_ozuna');
    Route::get('/talleres', [TallerController::class, 'index'])->name('talleres.index');
});
