@extends('components.layouts.app')

@section('titulo', 'Camila Ozuna')

@section('contenido')
<div class="p-6 max-w-xl mx-auto text-center bg-white rounded-lg shadow-md mt-10">
    <img src="{{ asset('imagenes/camila.jpg') }}" alt="Foto de Camila Ozuna" 
         class="mx-auto rounded-full w-48 h-48 object-cover mb-6 border-4 border-green-600" />
         
    <h1 class="text-4xl font-bold mb-4 text-gray-800">Camila Ozuna</h1>
    
    <p class="text-gray-700 text-lg leading-relaxed">
        Soy una desarrolladora dando sus primeros pasos, con ganas de aprender y crecer día a día.
        Mi objetivo es recibirme,y poder trabajar en proyectos desafiantes.
    </p>
</div>
@endsection
