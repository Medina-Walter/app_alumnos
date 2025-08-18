@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar perfil</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono (sin + ni espacios)</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
            <label for="professional_url" class="form-label">URL profesional (LinkedIn, GitHub, etc.)</label>
            <input type="url" name="professional_url" id="professional_url" class="form-control" value="{{ old('professional_url', $user->professional_url) }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto de perfil</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if ($user->photo_path)
                <p class="mt-2">Foto actual:</p>
                <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Foto actual" class="img-thumbnail" style="max-width: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
