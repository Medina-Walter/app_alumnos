@extends('components.layouts.app')

@section('titulo', 'Walter Medina')

@section('contenido')
<div class="p-6 max-w-xl mx-auto text-center bg-white rounded-lg shadow-md mt-10">
    <img src="{{ asset('imagenes/waltermedina.jpg') }}" alt="Foto de Walter Medina" class="mx-auto w-48 h-48 object-cover mb-6" />
         
    <h1 class="text-4xl font-bold mb-4 text-gray-800">Medina Walter</h1>
    
    <p class="text-gray-700 text-lg leading-relaxed">
        Estudiante en Programación Web.
        Con muchas ganas de aprender, dispuesto a aprender nuevas tecnologías a necesidad 
        Mis Conocimientos:
        HTML PHP MYSQL LARAVEL GIT BOOTSTRAP TAILWIND
    </p>
</div>
@endsection