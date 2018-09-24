$(".btnEditarPrograma").click(function() {
    var idPrograma = $(this).attr("idPrograma");
    var datos = new FormData();
    datos.append("idPrograma", idPrograma);
    $.ajax({
        url: "ajax/programas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#EditarPrograma").val(respuesta["NombrePrograma"]);
            $("#EditarTipoPrograma").val(respuesta["TipoPrograma"]);
            $("#EditarDuracion").val(respuesta["DuracionPrograma"]);
            $("#idPrograma").val(respuesta["IdPrograma"]);
        }
    })
})
$(".btnEliminarPrograma").click(function() {
    var idPrograma = $(this).attr("idPrograma");
    swal({
        title: '¿Desea eliminar el programa?',
        text: "Si no está seguro puede cancerlar la acción",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar Programa'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=programas&idPrograma=" + idPrograma;
        }
    })
})
/*=========================
=    VALIDAR PROGRAMA     =
=========================*/
$("#NuevoPrograma").change(function() {
    $(".alert").remove();
    var programa = $(this).val();
    var datos = new FormData();
    datos.append("validarPrograma", programa);
    $.ajax({
        url: "ajax/programas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#NuevoPrograma").parent().after('<div class="alert alert-warning">Este programa ya se encuentra registrado</div>');
                $("#NuevoPrograma").val("");
            }
            // console.log(respuesta);
        }
    })
})