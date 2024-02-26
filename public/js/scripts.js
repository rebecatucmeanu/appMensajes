function enviarMensaje()
{
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
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: baseUrl + '/obtenerMensajes',
                method: 'GET',
                success: function(respuesta) {
                    var mensajes = JSON.parse(respuesta);
                    var contenedorMensajes = $('#contenedorMensajes');
                    contenedorMensajes.html('');

                    for (var i = 0; i < mensajes.length; i++) {
                        contenedorMensajes.append('<li class="list-group-item">' + mensajes[i].texto + '</li>');
                    }
                }
            });
        }, 5000);
    });
}

function obtenerUltimoMensaje ()
{
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: baseUrl + '/obtenerUltimoMensaje',
                method: 'GET',
                succes: function() {
                    var contenedorMensajes = $('#contenedorMensajes');
                    contenedorMensajes.html('');
                }
            });
        })
    })
}
