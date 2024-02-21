
function enviarMensaje() {
    var texto = $('#textoUsuario').val();

    $.ajax({
        url: baseUrl + '/enviarMensaje',
        method: 'get',
        data: { mensajeEnvio: texto },
        success: function(respuesta) {
            alert(respuesta);
            obtenerMensajes();
        }
    });
}

function obtenerMensajes()
{
    $.ajax({
        url: baseUrl + '/obtenerMensajes',
        success: function(respuesta)
        {
            console.log(respuesta);
            var mensajes = JSON.parse(respuesta);
            console.log("El mensaje 0 es " + mensajes[0]['texto']);
        }
    });
}
