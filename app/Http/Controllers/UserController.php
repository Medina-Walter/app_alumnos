<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $titulo = "Lista de Alumnos";
        $items = User::all();
        return view('alumnos.index', compact('titulo', 'items'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'professional_url' => 'nullable|url|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo_path = $path;
        }

        $user->phone = $request->phone;
        $user->professional_url = $request->professional_url;
        $user->save();

        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}
