<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Descripcion;

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

    function saveDescripcion(Request $request)
    {
        $existe = DB::table('descripcions')->where('categoria',$request->categoria)->count();
        if($existe == 0)
        {
            Descripcion::create([
                'categoria'=>$request->categoria,
                'descripcion'=>$request->descripcion,
            ]);
        }
        else
        {
            Descripcion::where('categoria',$request->categoria)->
            update(['descripcion'=>$request->descripcion]);
        }
        if($request->categoria=='capibaras')
        return redirect()->route('CapIndex')->with('success', 'Descripción actualizada correctamente');
    }
}
