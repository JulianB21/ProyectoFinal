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