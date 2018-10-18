/*=============================================
=            EDITAR AMBIENTE                  =
=============================================*/

$(".tablas").on("click", ".btnEditarAmbiente", function(){
    var idAmbiente = $(this).attr("idAmbiente");
    var datos = new FormData();
    datos.append("idAmbiente", idAmbiente);
    $.ajax({
        url: "ajax/ambientesAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarAmbiente").val(respuesta["NombreAmbiente"]);
            $("#editarUbicacion").val(respuesta["UbicacionAmbiente"]);
            $("#editarAmbiente").html(respuesta["NombreAmbiente"]);
            $("#editarUbicacion").html(respuesta["UbicacionAmbiente"]);
            $("#idAmbiente").val(respuesta["IdAmbiente"]);
            var datosPrograma = new FormData();
            datosPrograma.append("idPrograma", respuesta["IdPrograma"]);
            $.ajax({
                url: "ajax/programas.ajax.php",
                method: "POST",
                data: datosPrograma,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    $("#EditarPrograma").val(respuesta["IdPrograma"]);
                    $("#EditarPrograma").html(respuesta["NombrePrograma"]);
                }
            })
        }
    })
})
/*=============================================
=            ELIMINAR AMBIENTE                  =
=============================================*/
$(".tablas").on("click", ".btnEliminarAmbiente", function(){
    var idAmbiente = $(this).attr("idAmbiente");
    swal({
        title: '¿Desea eliminar el ambiente?',
        text: "Si no está seguro puede cancerlar la acción",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar Ambiente'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=ambientes&idAmbiente=" + idAmbiente;
        }
    })
})