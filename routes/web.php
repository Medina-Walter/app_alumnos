<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Clientes;
use App\Livewire\Producto\FormularioProductos;







Route::get('/login', Login::class)->name('login');
Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');


// Ruta protegida
Route::middleware(['auth'])->group(function () {
    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/productos', FormularioProductos::class)->name('productos');
});