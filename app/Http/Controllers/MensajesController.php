<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;

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

        // Si el mensaje es una imagen, guardar en la columna imagen
        // Si el mensaje es un video, guardar en la columna video
        // Si no, guardar en la columna del texto
        if (strrpos($texto, '.jpg') !== false || strrpos($texto, '.png') !== false || strrpos($texto, '.jpeg') !== false) {
            $mensaje->imagen = $texto;
        } else if (strrpos($texto, '.mp4') !== false || strrpos($texto, '.avi') !== false || strrpos($texto, '.mov') !== false) {
            $mensaje->video = $texto;
        } else {
            $mensaje->texto = $texto;
        }

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

    public function obtenerMensajes()
    {
        $mensajes = DB::select('SELECT * FROM mensajes ORDER BY created_at DESC LIMIT 10');
        $mensajesJson = json_encode($mensajes);
        echo $mensajesJson;
    }
}
