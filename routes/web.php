<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesarrolladoresController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProfesoresCrud;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


Route::get('/login', Login::class)->name('login');
Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    
});




