<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chatbot;
use Illuminate\Support\Str;

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

    public function respuestas($suggestion)
    {
        dd($suggestion);
        $respuesta = DB::table('chatbots')
            ->where('pregunta', $suggestion)
            ->value('respuesta');
        //return response()->json(['respuesta' => $respuesta]);
    }
}
