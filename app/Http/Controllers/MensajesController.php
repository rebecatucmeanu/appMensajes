<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Session;

class MensajesController extends Controller
{
    // Muestra la vista del chat
    public function mostrarMensajes() {
        
        return  view('templates/header').
                view('listadoMensajes').
                view('templates/footer');

    }

    // El usuario envía un mensaje por AJAX:
    public function enviarMensaje(Request $request) {
        
        // Obtenemos el mensaje recibido
        $texto = $request->get('mensajeEnvio');
        
        // Creamos una variable vacía de tipo Mensaje
        $mensaje = new Mensaje();

        // Asignamos la variable para el campo texto
        $mensaje->texto = $texto;

        $session = Session();
        $usuario = $session->get('nombre');

        // Asignamos la variable para el campo usuario
        $mensaje->usuario = $usuario;

        // Guardamos el registro en la base de datos
        $mensaje->save();

        echo 'Mensaje enviado y guardado';


    }
}
