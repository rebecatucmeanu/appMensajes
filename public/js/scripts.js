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
            var mensajes = JSON.parse(respuesta);

            $('#contenedorMensajes').html('');

            for (var i=0; i<mensajes.length; i++)
            {
                $('#contenedorMensajes').append(mensajes[i]['texto']) + '<br>';
            }
        }
    });
}
