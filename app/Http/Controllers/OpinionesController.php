<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;

class OpinionesController extends Controller
{
    function index()
    {
        $opiniones = Opinion::all();
        return view('Opiniones.index',compact('opiniones'));
    }

    function addOpinion()
    {
        return view('Opiniones.addOpinion');
    }

    function saveOpinion(Request $request)
    {
        $this->validate($request,[
            'opinion'=>['required','min:5','max:300'],
        ]);
        Opinion::create([
            'usuario'=>auth()->user()->username,
            'opinion'=>$request->opinion,
        ]);
        return redirect()->route('OpinionesIndex')->with('success', 'Opinión agregada correctamente');
    }
}
