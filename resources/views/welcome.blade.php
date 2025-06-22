@extends('components.layouts.app')

@section('titulo', 'Listado de Clientes')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Bienvenido al Crud de Clientes</h1>
    
    @livewire('clientes')
@endsection