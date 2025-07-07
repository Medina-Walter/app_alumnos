<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Taller;
use App\Models\Inscripcion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TallerController extends Controller
{
    public function index()
    {
        $talleres = Taller::with(['profesor.user', 'horarios'])->get();
        return response()->json([
            'success' => true,
            'data' => $talleres,
        ], 200);
    }

    public function show($id)
    {
        $taller = Taller::with(['profesor.user', 'horarios'])->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $taller,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cupo_maximo' => 'required|integer|min:1',
            'profesor_id' => 'nullable|exists:profesores,id',
        ]);

        $taller = Taller::create($validated);
        return response()->json([
            'success' => true,
            'data' => $taller,
            'message' => 'Taller creado con éxito.',
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $taller = Taller::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cupo_maximo' => 'required|integer|min:1',
            'profesor_id' => 'nullable|exists:profesores,id',
        ]);

        $taller->update($validated);
        return response()->json([
            'success' => true,
            'data' => $taller,
            'message' => 'Taller actualizado con éxito.',
        ], 200);
    }

    public function destroy($id)
    {
        $taller = Taller::findOrFail($id);
        $taller->delete();
        return response()->json([
            'success' => true,
            'message' => 'Taller eliminado con éxito.',
        ], 200);
    }
}