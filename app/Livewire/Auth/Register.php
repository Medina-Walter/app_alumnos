<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $nombre = '';
    public $apellido = '';
    public $dni = '';
    public $phone = '';
    public $professional_url = '';
    public $photo_path;
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:users',
            'phone' => 'nullable|numeric',
            'professional_url' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

        // Guardar la foto si se subió
        $photoPath = $this->photo_path
            ? $this->photo_path->store('photos', 'public')
            : null;

        $user = User::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'professional_url' => $this->professional_url,
            'photo_path' => $photoPath,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'rol' => 'alumno',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.index');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.guest');
    }
}
