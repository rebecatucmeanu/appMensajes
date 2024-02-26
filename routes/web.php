<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\MensajesController;

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

// USUARIOS:
Session::flush();
Route::get('/', [UsuariosController::class, 'acceso']);
Route::get('/usuario', [UsuariosController::class, 'acceso']);
Route::post('/login', [UsuariosController::class, 'registrarSesion']);

// MENSAJES:
Route::get('/listado', [MensajesController::class, 'mostrarMensajes']);
Route::get('/enviarMensaje', [MensajesController::class, 'enviarMensaje']);
Route::get('/obtenerMensajes', [MensajesController::class, 'obtenerMensajes']);
