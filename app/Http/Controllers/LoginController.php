<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function iniciar(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        if(!auth()->attempt($request->only('username','password')))
        {
            return back()->withErrors(['mensaje' => 'Credenciales incorrectas'])->withInput();
        }
        return redirect('/');
    }

    public function mostrarRegistro()
    {
        return view('auth.registro');
    }

    public function registrar(Request $request)
    {
        $permisos = (User::count()==0) ? 'admin' : 'user';
        $this->validate(
            $request,[
                'name'=>['required','max:100'],
                'username'=>['required','unique:users','min:5','max:20'],
                'email'=>['required','unique:users','email'],
                'password'=>['required','confirmed','min:8']
            ]
        );
        $usuario = User::create([
            'name'=>$request->name,
            'username'=>Str::lower($request->username),
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'permisos'=>$permisos,
        ]);
        auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password
        ]);
        return redirect()->route('Login');
    }

    public function salir()
    {
        Session::forget('conversaciones');
        auth()->logout();
        return redirect('/');
    }
}
