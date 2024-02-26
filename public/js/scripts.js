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
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: baseUrl + '/obtenerMensajes',
                type: 'GET',
                success: function(respuesta) {
                    // Manipular los datos recibidos y mostrarlos en la página
                    var mensajes = JSON.parse(respuesta);

                    $('#contenedorMensajes').html('');

                    for (var i=0; i<mensajes.length; i++)
                    {
                        $('#contenedorMensajes').append(mensajes[i]['texto']) + '<br>';
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }, 5000);
    });

}
