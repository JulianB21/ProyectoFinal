/*=============================================
=            EDITAR FICHAS                  =
=============================================*/
$(".btnEditarFicha").click(function() {
    var idFicha = $(this).attr("idFicha");
    var datos = new FormData();
    datos.append("idFicha", idFicha);
    $.ajax({
        url: "ajax/fichasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarFicha").val(respuesta["NumeroFicha"]);
            $("#editarFechaInicio").val(respuesta["FechaInicio"]);
            $("#editarFechaFin").val(respuesta["FechaFin"]);
            $("#editarJornada").val(respuesta["JornadaFicha"]);
            $("#editarJornada").html(respuesta["JornadaFicha"]);
            var idPrograma = $(this).attr("idPrograma");
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
                    $("#editarPrograma").val(respuesta["IdPrograma"]);
                    $("#editarPrograma").html(respuesta["NombrePrograma"]);
                }
            })
            var idAmbiente = $(this).attr("idAmbiente");
            var datosAmbiente = new FormData();
            datosAmbiente.append("idAmbiente", respuesta["IdAmbiente"]);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    $("#editarAmbiente").val(respuesta["IdAmbiente"]);
                    $("#editarAmbiente").html(respuesta["NombreAmbiente"]);
                }
            })
        }
    })
})
/*=============================================
=            ELIMINAR FICHA                  =
=============================================*/
$(".btnEliminarFicha").click(function() {
    var idFicha = $(this).attr("idFicha");
    swal({
        title: '¿Desea eliminar la ficha?',
        text: "Si no está seguro puede cancerlar la acción",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar Ficha'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=fichas&idFicha=" + idFicha;
        }
    })
})
/*=============================================
REVISAR SI LA FICHA YA ESTÁ REGISTRADO
=============================================*/
$("#nuevaFicha").change(function() {
    $(".alert").remove();
    var ficha = $(this).val();
    var datos = new FormData();
    datos.append("validarFicha", ficha);
    $.ajax({
        url: "ajax/fichasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#nuevaFicha").parent().after('<div class="alert alert-warning">Esta ficha ya existe en la base de datos</div>');
                $("#nuevaFicha").val("");
            }
        }
    })
})