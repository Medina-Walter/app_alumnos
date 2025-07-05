<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisTalleresController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        // Obtener los talleres inscritos por el alumno con sus horarios y profesor
        $talleres = $alumno
            ? Taller::whereHas('inscripciones', function ($query) use ($alumno) {
                $query->where('alumno_id', $alumno->id);
            })->with(['profesor.user', 'horarios'])->get() : collect();

        return view('mis_talleres.index', compact('talleres'));
    }
}
