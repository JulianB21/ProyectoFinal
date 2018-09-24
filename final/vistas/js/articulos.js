$(".btnEliminarArticulo").click(function() {
    debugger;
    var idArticulo = $(this).attr("idArticulo");
    swal({
        title: '¿Desea eliminar el articulo?',
        text: "Si no está seguro puede cancerlar la acción",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar Articulo'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=articulos&idArticulo=" + idArticulo;
        }
    })
})
/*=============================================
=            EDITAR ARTICULOS                  =
=============================================*/
$(".btnEditarArticulo").click(function() {
    var idArticulo = $(this).attr("idArticulo");
    var datos = new FormData();
    datos.append("idArticulo", idArticulo);
    $.ajax({
        url: "ajax/articulosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            $("#editarTipo").val(respuesta["TipoArticulo"]);
            $("#editarModelo").val(respuesta["ModeloArticulo"]);
            $("#editarMarca").val(respuesta["MarcaArticulo"]);
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
            var idCategorias = $(this).attr("idCategoria");
            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["IdCategoria"]);
            $.ajax({
                url: "ajax/categoriasAjax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    $("#editarCategoria").val(respuesta["IdCategoria"]);
                    $("#editarCategoria").html(respuesta["NombreCategoria"]);
                }
            })
            $("#editarInventario").val(respuesta["NumInventarioSena"]);
            $("#editarSerial").val(respuesta["SerialArticulo"]);
            $("#editarEstado").val(respuesta["EstadoArticulo"]);
            $("#editarEstado").html(respuesta["EstadoArticulo"]);
            $("#editarCaracteristica").val(respuesta["CaracteristicaArticulo"]);
        }
    })
})