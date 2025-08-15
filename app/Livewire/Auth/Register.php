<?php

namespace App\Livewire\Auth;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $nombre = '';
    public $apellido = '';
    public $dni = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    

    public function register()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

        $user = User::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'rol' => 'alumno',
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.guest');
    }
}