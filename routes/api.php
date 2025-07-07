<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TallerController;
use Illuminate\Support\Facades\Route;

Route::get('/talleres', [TallerController::class, 'index'])->name('api.talleres.index');
Route::get('/talleres/{id}', [TallerController::class, 'show'])->name('api.talleres.show');
Route::post('/talleres', [TallerController::class, 'store'])->name('api.talleres.store');
Route::put('/talleres/{id}', [TallerController::class, 'update'])->name('api.talleres.update');
Route::delete('/talleres/{id}', [TallerController::class, 'destroy'])->name('api.talleres.destroy');

Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
Route::post('/users', [UserController::class, 'store'])->name('api.users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('api.users.update');
Route::patch('/users/{id}', [UserController::class, 'update'])->name('api.users.update.patch');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');

