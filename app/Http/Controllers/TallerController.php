<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function index()
    {
        // Carga los talleres con sus horarios y el profesor (y su usuario)
        $talleres = Taller::with(['profesor.user', 'horarios'])->get();
        return view('talleres.index', compact('talleres'));
    }
}
