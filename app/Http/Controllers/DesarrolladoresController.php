<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesarrolladoresController extends Controller
{
    public function index()
    {
        return view('desarrolladores.medina_walter');
    }

    public function perfilCamila()
    {
        return view('desarrolladores.camila_ozuna');
    }

    public function perfilJose()
    {
        return view('desarrolladores.jose_sosa');
    }

    public function perfilLucas()
    {
        return view('desarrolladores.Oviedo_lucas');
    }
}
