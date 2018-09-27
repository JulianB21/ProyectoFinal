/*=============================================
ELIMINAR EQUIPO
=============================================*/
$(".btnEliminarEquipo").click(function() {
    var idEquipo = $(this).attr("idEquipo");
    swal({
        title: '¿Está seguro de borrar el equipo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar equipo!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=equipos&idEquipo=" + idEquipo;
        }
    })
})
$(".btnEditarEquipo").click(function() {
    // debugger;
    var idEquipo = $(this).attr("idEquipo");
    var datos = new FormData();
    datos.append("idEquipo", idEquipo);
    $.ajax({
        url: "ajax/equipoAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarEquipo").val(respuesta["NombreEquipo"]);
            $("#idEquipo").val(respuesta["IdEquipo"]);
            $("#editarEstado").val(respuesta["EstadoEquipo"]);
            // $("#editarEstado").html(respuesta["EstadoEquipo"]);
            $("#editarCantidad").val(respuesta["NumArticulosEquipo"]);
            $("#editarObservacion").val(respuesta["ObservacionEquipo"]);
        }
    })
})

function equipoFuncion(sel) {
    $(".alert").remove();
    var idEquipo = sel;
    var datos = new FormData();
    datos.append("sel", idEquipo);
    $.ajax({
        url: "ajax/equipoAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            debugger;
            $("#equipo").val(respuesta["IdEquipo"]);
            if (respuesta["NumArticulosAgregados"] == respuesta["NumArticulosEquipo"]) {
                $("#nuevoEquipo").parent().after('<div class="alert alert-warning">Este equipo ya tiene el total de artículos asignados</div>');
                $("#nuevoEquipo").val("");
            }
            // $("#editarEquipo").val(respuesta["NombreEquipo"]);
            // $("#idEquipo").val(respuesta["IdEquipo"]);
            // $("#editarEstado").val(respuesta["EstadoEquipo"]);
            // // $("#editarEstado").html(respuesta["EstadoEquipo"]);
            // $("#editarCantidad").val(respuesta["NumArticulosEquipo"]);
            // $("#editarObservacion").val(respuesta["ObservacionEquipo"]);
            console.log(respuesta);
        }
    })
}