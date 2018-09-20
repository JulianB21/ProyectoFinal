/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function() {
    var imagen = this.files[0];
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "Cerrar"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})
/*=============================================
EDITAR USUARIO
=============================================*/
$(".btnEditarUsuario").click(function() {
    var idUsuario = $(this).attr("NumDocumentoUsuario");
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarNombre").html(respuesta["NombreUsuario"]);
            $("#editarNombre").val(respuesta["NombreUsuario"]);
            $("#editarDocumento").val(respuesta["NumDocumentoUsuario"]);
            $("#editarPerfil").html(respuesta["RolUsuario"]);
            $("#editarPerfil").val(respuesta["RolUsuario"]);
            $("#fotoActual").val(respuesta["FotoUsuario"]);
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
            $("#passwordActual").val(respuesta["ContraseniaUsuario"]);
            if (respuesta["FotoUsuario"] != "") {
                $(".previsualizar").attr("src", respuesta["FotoUsuario"]);
            }
        }
    });
})
/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/
$("#nuevoDocumento").change(function() {
    $(".alert").remove();
    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("ValidarUsuario", usuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#nuevoDocumento").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
                $("#nuevoDocumento").val("");
            }
        }
    })
})
/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function() {
    var NumDocumentoUsuario = $(this).attr("NumDocumentoUsuario");
    var FotoUsuario = $(this).attr("FotoUsuario");
    var usuario = $(this).attr("usuario");
    swal({
        title: '¿Està seguro de borrar usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=usuarios&NumDocumentoUsuario=" + NumDocumentoUsuario + "&usuario=" + usuario + "&FotoUsuario=" + FotoUsuario;
        }
    })
})

function rolUsuario(sel) {
    if (sel == "Administrador") {
        $("#nuevoPrograma").prop('disabled', true);
    } else {
        $("#nuevoPrograma").prop('disabled', false);
    }
}