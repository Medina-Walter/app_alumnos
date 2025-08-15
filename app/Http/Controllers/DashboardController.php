<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function index(){
        $titulo = "Dashboard";
        return view('dashboard.index', compact('titulo'));
    }
}
