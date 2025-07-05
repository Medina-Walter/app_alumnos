@extends('components.layouts.app')

@section('titulo', 'Talleres Disponibles')

@section('contenido')
    <div class="container mx-auto p-6">
        <h1 class="mb-5 text-center text-3xl font-bold text-blue-400 uppercase">Talleres</h1>

        @if (session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if ($talleres->isNotEmpty())
                @foreach($talleres as $taller)
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                        <div>
                            <h5 class="text-xl font-bold text-gray-800">{{ $taller->nombre }}</h5>
                            <p class="text-gray-600 mt-2">{{ $taller->descripcion }}</p>
                            <ul class="mt-4 space-y-2">
                                <li><span class="font-semibold text-gray-500">Profesor:</span> {{ $taller->profesor && $taller->profesor->user ? $taller->profesor->user->nombre . ' ' . $taller->profesor->user->apellido : 'Sin asignar' }}</li>
                                <li><span class="font-semibold text-gray-500">Cupo disponible:</span> {{ $taller->cupo_maximo - $taller->alumnos()->count() }} / {{ $taller->cupo_maximo }}</li>
                                <li>
                                    <span class="font-semibold text-gray-500">Horarios:</span>
                                    @if ($taller->horarios->isEmpty())
                                        <span class="text-gray-600">No hay horarios asignados</span>
                                    @else
                                        <ul class="list-disc list-inside text-gray-600">
                                            @foreach ($taller->horarios as $horario)
                                                <li>
                                                    {{ $horario->dia_semana }}: 
                                                    {{ date('H:i', strtotime($horario->hora_inicio)) }} - 
                                                    {{ date('H:i', strtotime($horario->hora_fin)) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        @auth
                            @if (Auth::user()->alumno)
                                @if ($taller->alumnos()->where('alumno_id', Auth::user()->alumno->id)->exists())
                                    <p class="mt-4 text-center text-gray-500">Ya estás inscrito</p>
                                @elseif ($taller->alumnos()->count() >= $taller->cupo_maximo)
                                    <p class="mt-4 text-center text-red-500">Taller lleno</p>
                                @else
                                    <form action="{{ route('inscripciones.store', $taller->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="mt-4 block w-full text-center bg-blue-500 text-white py-2 rounded-full hover:bg-blue-600 transition">
                                            Inscribirse
                                        </button>
                                    </form>
                                @endif
                            @else
                                <p class="mt-4 text-center text-red-500">No eres un alumno registrado</p>
                            @endif
                        @else
                            <p class="mt-4 text-center text-gray-500">Inicia sesión para inscribirte</p>
                        @endauth
                    </div>
                @endforeach
            @else
                <p class="text-center text-3xl font-bold uppercase">No hay talleres disponibles</p>
            @endif
        </div>
    </div>
@endsection