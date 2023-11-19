<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SandiasController extends Controller
{
    function index()
    {
        return view('Sandías.index');
    }

    function createDescripcion($categoria)
    {
        return View('Sandías.modificarDesc',compact('categoria'));
    }
}
