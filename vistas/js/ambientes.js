/*=============================================
=            EDITAR AMBIENTE                  =
=============================================*/
$(".btnEditarAmbiente").click(function() {
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
            console.log(respuesta);
            $("#editarAmbiente").val(respuesta["nombreAmbiente"]);
            $("#editarUbicacion").val(respuesta["ubicacionAmbiente"]);
            $("#editarAmbiente").html(respuesta["nombreAmbiente"]);
            $("#editarUbicacion").html(respuesta["ubicacionAmbiente"]);
            $("#idAmbiente").val(respuesta["idambiente"]);
            var datosPrograma = new FormData();
            datosPrograma.append("idPrograma", respuesta["idprograma"]);
            $.ajax({
                url: "ajax/programas.ajax.php",
                method: "POST",
                data: datosPrograma,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    $("#EditarPrograma").val(respuesta["idprograma"]);
                    $("#EditarPrograma").html(respuesta["nombreprograma"]);
                }
            })
        }
    })
})
/*=============================================
=            ELIMINAR AMBIENTE                  =
=============================================*/
$(".btnEliminarAmbiente").click(function() {
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