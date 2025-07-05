<?php

use App\Http\Controllers\Api\TallerController;
use Illuminate\Support\Facades\Route;

Route::get('/talleres', [TallerController::class, 'index'])->name('api.talleres.index');
Route::get('/talleres/{id}', [TallerController::class, 'show'])->name('api.talleres.show');
Route::post('/talleres', [TallerController::class, 'store'])->name('api.talleres.store');
Route::put('/talleres/{id}', [TallerController::class, 'update'])->name('api.talleres.update');
Route::delete('/talleres/{id}', [TallerController::class, 'destroy'])->name('api.talleres.destroy');
Route::get('/mis-inscripciones', [TallerController::class, 'misInscripciones'])->name('api.mis-inscripciones');