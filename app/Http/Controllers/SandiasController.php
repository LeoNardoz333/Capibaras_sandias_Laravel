<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Descripcion;
use App\Models\Caracteristica;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        $this->validate($request,[
            'descripcion'=>['required','min:3','max:270'],
        ]);
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

    function createCar($categoria)
    {
        $caracteristicas=Caracteristica::where('categoria',$categoria)->paginate(8);
        return View('Sandías.carCapIndex',['caracteristicas'=>$caracteristicas],compact('categoria'));
    }

    function verCar($categoria)
    {
        return View('Sandías.agregarCar',compact('categoria'));
    }

    function saveCar(Request $request)
    {
        $this->validate($request,[
            'caracteristica'=>['required','min:3','max:20'],
            'descripcion'=>['required','min:10','max:270'],
            'icono'=>['required','image','mimes:jpeg,png,jpg,gif'],
        ]);

        $imagen = $request->file('icono');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $subir=$imagen->move('img/iconos/', $nombreImagen);

        Caracteristica::create([
            'categoria'=>$request->categoria,
            'caracteristica'=>$request->caracteristica,
            'descripcion'=>$request->descripcion,
            'icono'=>'img/iconos/' . $nombreImagen,
        ]);

        return redirect()->route('CarIndex',['categoria'=>$request->categoria])
        ->with('success','Se agregó la característica correctamente.');
        /*else
        {
            Caracteristica::where('categoria',$request->categoria)->
            update(['caracteristica'=>$request])
        }*/
    }

    function deleteCar($id)
    {
        $caracteristicas=Caracteristica::find($id);
        if($caracteristicas)
        {
            $categoria=$caracteristicas->categoria;
            if (file_exists(public_path($caracteristicas->icono))) {
                unlink(public_path($caracteristicas->icono));
            }
            $caracteristicas->delete();
        }
        session()->flash('status','Se eliminó la característica correctamente');
        return redirect()->route('CarIndex',['categoria'=>$categoria]);
    }
}
