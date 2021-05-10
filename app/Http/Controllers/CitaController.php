<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CitaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function cita()
    {
        return view('cita.cita');
    }

    public function create(Request $request)
    {
        //dd($request);
        return view('cita.create', compact('request'));
    }
}