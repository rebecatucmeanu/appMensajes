@php
    $session = Session();
    $nombre = $session->get('nombre');
@endphp

<div>
    <h1>Mensajes del chat. Bienvenid@ {{ $nombre }}</h1>
    <div id="contenedorMensajes">

    </div>

    <input id="texto" type="text" id="textoUsuario" name="textoUsuario" />

    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush" id="contenedorMensajes">
        </ul>
    </div>
    <button onclick="enviarMensaje()">Enviar</button>
    <button onclick="obtenerMensajes()">Actualizar mensajes</button>
    <a href="{{ url('usuario') }}"><button>Cerrar sesión</button></a>
</div>
