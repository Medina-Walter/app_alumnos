<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('ver-admin', function(User $user){
            return $user->rol === 'admin';
        });

        Gate::define('ver-alumno', function(User $user){
            return $user->rol === 'alumno';
        });

        Gate::define('ver-todos', function(User $user){
            return in_array($user->rol, ['admin', 'alumno']);
        });
    }
}
