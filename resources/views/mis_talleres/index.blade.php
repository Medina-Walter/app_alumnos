@extends('components.layouts.app')

@section('titulo', 'Talleres disponibles')

@section('contenido')
    <h1 class="mb-5 text-center text-3xl font-bold text-blue-400 uppercase">Mis Talleres</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @if ($talleres->isNotEmpty())
          @foreach($talleres as $taller)
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-bold text-gray-800">{{ $taller->nombre }}</h5>
                    <p class="text-gray-600 mt-2">{{ $taller->descripcion }}</p>
                    <ul class="mt-4 space-y-2">
                        <li><span class="font-semibold text-gray-500">Profesor:</span> {{ $taller->profesor && $taller->profesor->user ? $taller->profesor->user->name : 'Sin asignar'}}</li>
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
                <a href="#" class="mt-4 block text-center bg-blue-500 text-white py-2 rounded-full hover:bg-blue-600 transition">Inscribirse</a>
            </div>
           @endforeach
        @else
        <p class="mb-5 text-center text-3xl font-bold uppercase">No Hay Talleres Disponibles</pc>
        @endif
    </div>
@endsection
