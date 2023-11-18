<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chatbot;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ChatbotController extends Controller
{
    function index()
    {
        return view('Chatbot.index');
    }

    function formulario()
    {
        return view('Chatbot.alimentar');
    }

    function alimentar(Request $request)
    {
        $this -> validate(
            $request,[
                'pregunta'=>['required','min:3','max:150'],
                'respuesta'=>['required','min:3','max:255']
            ]);
        $pregunta=chatbot::create([
            'pregunta'=>Str::lower($request->pregunta),
            'respuesta'=>$request->respuesta
        ]);
        return redirect()->route('ChatbotIndex')->with('success', 'Pregunta añadida correctamente');
    }


    public function respuesta(Request $request)
    {
        $pregunta = $request->pregunta;
        $respuesta = DB::table('chatbots')
            ->where('pregunta', $request->pregunta)
            ->value('respuesta');
        $conversacionesAnteriores = session('conversaciones', []);
        $conversacionesAnteriores = is_array($conversacionesAnteriores) ? $conversacionesAnteriores : [];
        $conversacionesAnteriores[] = ['sender' => 'Usuario', 'message' => $pregunta];
        $conversacionesAnteriores[] = ['sender' => 'Capsan', 'message' => $respuesta];
        session(['conversaciones' => $conversacionesAnteriores]);
        return view('Chatbot.index', ['respuesta' => $respuesta]);
        //return response()->json(['respuesta' => $respuesta]);
    }
}
