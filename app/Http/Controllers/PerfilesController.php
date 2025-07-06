<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilesController extends Controller
{
    public function index()
    {
        return view('perfiles.medina_walter');
    }

    public function perfilCamila()
    {
        return view('perfiles.camila_ozuna');
    }

    public function perfilJose()
    {
        return view('perfiles.jose_sosa');
    }
}
