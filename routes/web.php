<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SandiasController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OpinionesController;

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
//Capibaras
Route::get('/Sandías/modificarDesc{categoria}',[SandiasController::class,'createDescripcion'])
->name('VerDescripcion');
Route::post('/Sandías/modificarDesc',[SandiasController::class,'saveDescripcion'])
->name('SaveDesc');
Route::get('/', function () { return view('index'); })->name('CapIndex');
Route::get('/Sandías/modificarCar{categoria}',[SandiasController::class,'createCar'])->name('CarIndex');
Route::get('/Sandías/agregararCar{categoria}',[SandiasController::class,'verCar'])->name('VerCar');
Route::post('/Sandías/modificarCar',[SandiasController::class,'saveCar'])->name('SaveCar');
Route::delete('/Sandías{id}',[SandiasController::class,'deleteCar'])->name('DeleteCar');
Route::get('/Sandías{id}',[SandiasController::class, 'putCar'])->name('PutCar');
Route::put('/Sandías/modificarCar{id}',[SandiasController::class,'updateCar'])->name('UpdateCar');
Route::get('/Sandías/video',function(){ return view('Sandías.video'); })->name('Video');
//Sandías
Route::get('Sandías/index',function(){ return view('Sandías.index'); })->name('SandiasIndex');
//Opiniones
Route::get('Opiniones/index',[OpinionesController::class,'index'])->name('OpinionesIndex');
Route::get('Opiniones/addOpinion',[OpinionesController::class,'addOpinion'])->name('AddOpinion');
Route::post('Opiniones/addOpinion',[OpinionesController::class,'saveOpinion'])->name('SaveOpinion');
Route::delete('/Opiniones/index{id}',[OpinionesController::class,'deleteOpinio'])->name('DeleteOpinion');
//Chatbot
Route::get('/Chatbot/index',[ChatbotController::class,'index'])->name('ChatbotIndex');
Route::get('/Chatbot/alimentar',[ChatbotController::class,'formulario'])->name('ChatbotAlimentar');
Route::post('/Chatbot/alimentar',[ChatbotController::class,'alimentar'])->name('ChatbotInsertar');
Route::post('/ChatbotRespuesta', [ChatbotController::class, 'respuesta'])->name('ChatbotRespuesta');
//Login y logout
Route::get('/auth/login',[LoginController::class,'index'])->name('Login');
Route::post('/auth/login',[LoginController::class,'iniciar'])->name('IniciarLogin');
Route::get('/auth/registro',[LoginController::class,'mostrarRegistro'])->name('Registro');
Route::post('/auth/registro',[LoginController::class,'registrar'])->name('Registrar');
Route::post('/logout',[LoginController::class,'salir'])->name('Logout');
