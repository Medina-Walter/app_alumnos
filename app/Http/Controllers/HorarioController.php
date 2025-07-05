<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index(){
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }
}
