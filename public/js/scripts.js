function enviarMensaje()
{
    var texto = $('#textoUsuario').val();

    $.ajax({
        url: baseUrl + '/enviarMensaje',
        method: 'get',
        data: { mensajeEnvio: texto + "'"},
        success: function(respuesta) {
            alert(respuesta);
            obtenerMensajes();
        }
    });
}

function obtenerMensajes() {
        $.ajax({
            url: baseUrl + '/obtenerMensajes',
            method: 'GET',
            success: function(respuesta) {
                var mensajes = JSON.parse(respuesta);
                var contenedorMensajes = $('#contenedorMensajes');
                contenedorMensajes.html('');

                for (var i = 0; i < mensajes.length; i++) {
                    var mensaje = mensajes[i];
                    contenedorMensajes.append('<li class="list-group-item">' + 'Usuario: ' + mensaje.usuario + '</li>');
                    contenedorMensajes.append('<li class="list-group-item">' + 'Fecha y hora: ' + mensaje.created_at + '</li>');

                    if (mensaje.imagen) {
                        contenedorMensajes.append('<li class="list-group-item">' + '<img src="' + mensaje.imagen + '" alt="Imagen" />' + '</li>');
                    } else if (mensaje.video) {
                        contenedorMensajes.append('<li class="list-group-item">' + '<iframe src="' + mensaje.video + '"></iframe>' + '</li>');
                    } else {
                        contenedorMensajes.append('<li class="list-group-item">' + mensaje.texto + '</li>');
                    }
                }
            }
    });
}
