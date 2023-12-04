<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AnimationController;

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

Route::get('/', [SurveyController::class,'consultarPreguntas']);
Route::get('/enviar/{numero}/{respuesta}/{nombre}', [SurveyController::class,'guardarRespuestas']);

Route::get('/productos', [ProductoController::class,'mostrar']);
Route::get('/productos/consultar', [ProductoController::class,'consultar']);
Route::post('/productos/subir', [ProductoController::class, 'subir']);

Route::get('/animacion', [AnimationController::class, 'mostrar']);