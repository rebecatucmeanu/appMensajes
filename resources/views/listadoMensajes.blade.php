@php
    $session = Session();
    $nombre = $session->get('nombre');
@endphp

<div>
    <h1>Mensajes del chat. Bienvenid@ {{ $nombre }}</h1>
    <div id="contenedorMensajes">

    </div>

    <input type="text" id="textoUsuario" name="textoUsuario" />
    <button onclick="enviarMensaje()">Enviar</button>
    <button onclick="obtenerMensajes()">Actualizar mensajes</button>
    <a href="{{ url('usuario') }}"><button>Cerrar sesión</button></a>
</div>
