@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Alumnos</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Alumnos Registrados</h5>
                      <table class="table datatable">
                        <thead>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">DNI</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Red Profecional</th>
                            <th class="text-center">Foto</th>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                          <tr>
                          <td class="text-center">{{ $item->nombre }}</td>
                          <td class="text-center">{{ $item->apellido }}</td>
                          <td class="text-center">{{ $item->dni }}</td>
                          <td class="text-center">{{ $item->email }}</td>
                          <td class="text-center">
                            @if ($item->phone)
                                <a href="https://wa.me/549{{ $item->phone }}" target="_blank" 
                                  class="btn btn-outline-success btn-sm">
                                  Abrir en WhatsApp
                                </a>
                            @else
                                <em>No disponible</em>
                            @endif
                          </td>
                          <td class="text-center">
                            @if ($item->professional_url)
                               <a href="{{ $item->professional_url }}" target="_blank" 
                               class="btn btn-outline-info btn-sm">
                               Ver perfil
                               </a>
                            @else
                               <em>No disponible</em>
                            @endif
                          </td>
                          <td class="text-center">
                          <img src="{{ asset('storage/' . $item->photo_path) }}" alt="Foto de Perfil" width="50px" height="50px">
                          </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection
