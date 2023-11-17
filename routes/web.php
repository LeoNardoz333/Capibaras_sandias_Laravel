<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SandiasController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/Sandías/index',[SandiasController::class,'index'])->name('SandiasIndex');
Route::get('/Chatbot/index',[ChatbotController::class,'index'])->name('ChatbotIndex');
Route::get('/auth/login',[LoginController::class,'index'])->name('Login');
Route::post('/auth/login',[LoginController::class,'iniciar'])->name('IniciarLogin');
Route::get('/auth/registro',[LoginController::class,'mostrarRegistro'])->name('Registro');
Route::post('/auth/registro',[LoginController::class,'registrar'])->name('Registrar');
