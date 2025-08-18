<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✅ ESTA LÍNEA ES NECESARIA
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Muestra el perfil del usuario autenticado.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar el perfil.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Actualiza el perfil del usuario autenticado.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:20'],
            'professional_url' => ['nullable', 'url'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo_path = $path;
        }

        $user->phone = $validated['phone'] ?? $user->phone;
        $user->professional_url = $validated['professional_url'] ?? $user->professional_url;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Perfil actualizado correctamente.');
    }
}
