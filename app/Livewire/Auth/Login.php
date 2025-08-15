<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $credentials = $this->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }

        $this->addError('email', 'Credenciales inválidas.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
