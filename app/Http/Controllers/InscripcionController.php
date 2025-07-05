<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\TallerController;
use App\Models\Taller;
use App\Models\Inscripcion;


class InscripcionController extends Controller
{
    public function store(Request $request, $tallerId)
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        if (!$alumno) {
            return redirect()->route('talleres.index')->with('error', 'No estás registrado como alumno.');
        }

        $taller = Taller::findOrFail($tallerId);

        // Verificar cupo
        if ($taller->alumnos()->count() >= $taller->cupo_maximo) {
            return redirect()->route('talleres.index')->with('error', 'El taller ha alcanzado su cupo máximo.');
        }

        // Verificar si ya está inscrito
        if ($taller->alumnos()->where('alumno_id', $alumno->id)->exists()) {
            return redirect()->route('talleres.index')->with('error', 'Ya estás inscrito en este taller.');
        }

        // Crear inscripción
        Inscripcion::create([
            'alumno_id' => $alumno->id,
            'taller_id' => $taller->id,
        ]);

        return redirect()->route('mis_talleres')->with('success', 'Inscripción realizada con éxito.');
    }

    public function destroy($tallerId)
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        if ($alumno) {
            Inscripcion::where('taller_id', $tallerId)->where('alumno_id', $alumno->id)->delete();
        }

        return redirect()->route('mis_talleres')->with('success', 'Inscripción cancelada con éxito.');
    }
}
