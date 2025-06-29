@extends('layouts.app')

@section('title', 'Talleres disponibles')

@section('content')
    <h1 class="mb-5 text-center text-uppercase fw-bold text-primary">Talleres disponibles</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($talleres as $taller)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-dark fw-bold">{{ $taller->nombre }}</h5>
                            <p class="card-text text-muted">{{ $taller->descripcion }}</p>
                            <ul class="list-unstyled mt-3">
                                <li><span class="fw-semibold text-secondary">📅 Día:</span> {{ $taller->dia }}</li>
                                <li><span class="fw-semibold text-secondary">⏰ Horario:</span> {{ $taller->horario }}</li>
                                <li><span class="fw-semibold text-secondary">👥 Cupos:</span> {{ $taller->cupos }}</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-outline-primary mt-4 w-100 rounded-pill">Inscribirse</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
