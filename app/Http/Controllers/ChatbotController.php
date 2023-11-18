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
        $pregunta=$request->pregunta;
        $respuesta = DB::table('chatbots')
        ->where('pregunta', $pregunta)
        ->value('respuesta');

        // Obtén las conversaciones anteriores de la sesión
    $conversacionesAnteriores = session('conversaciones', []);

    // Agrega la nueva conversación
    $conversaciones = array_merge($conversacionesAnteriores, [
        ['sender' => 'Capsan', 'message' => $respuesta]
    ]);

    // Guarda las conversaciones en la sesión
    session(['conversaciones' => $conversaciones]);

    return redirect()->route('ChatbotIndex');
    }
}
