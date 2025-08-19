@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">👤 Perfil de {{ $user->nombre }} {{ $user->apellido }}</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Información del alumno
        </div>
        <div class="card-body">
            <div class="mb-3 text-center">
                @if ($user->photo_path)
                    <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Foto de perfil" class="rounded-circle shadow" style="max-width: 150px;">
                @else
                    <p><em>Sin foto de perfil</em></p>
                @endif
            </div>

            <p><i class="bi bi-envelope"></i> <strong>Nombre:</strong> {{ $user->nombre }}</p>
            <p><i class="bi bi-envelope"></i> <strong>Apellido:</strong> {{ $user->apellido }}</p>
            <p><i class="bi bi-envelope"></i> <strong>Email:</strong> {{ $user->email }}</p>
            <p><i class="bi bi-telephone"></i> <strong>Teléfono:</strong> 
                @if ($user->phone)
                    <a href="https://wa.me/549{{ $user->phone }}" target="_blank" class="btn btn-outline-success btn-sm">
                        Abrir en WhatsApp
                    </a>
                @else
                    <em>No disponible</em>
                @endif
            </p>
            <p><i class="bi bi-link-45deg"></i> <strong>Perfil profesional:</strong> 
                @if ($user->professional_url)
                    <a href="{{ $user->professional_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                        Ver perfil
                    </a>
                @else
                    <em>No disponible</em>
                @endif
            </p>
        </div>
    </div>

    <div class="d-flex gap-2 mt-4">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            <i class="bi bi-pencil-square"></i> Editar perfil
        </a>
        <a href="{{ route('home') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver al inicio
        </a>
    </div>
</div>
@endsection
