<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    function index()
    {
        return view('Chatbot.index');
    }
}
