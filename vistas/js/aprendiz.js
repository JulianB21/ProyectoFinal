$(".tablas").on("click", ".btnVerAprendiz", function(){
    var ficha = $(this).attr("id");
    // console.log("numficha", numficha);
     // $("#nuevaFichaAprendiz").val(ficha);
     // $("#nuevaFichaAprendiz").html(ficha);

     window.location = "index.php?ruta=aprendiz&ficha=" + ficha;

});

$(".tablas").on("click", ".btnEliminarAprendiz", function(){
    var NumDocumentoAprendiz = $(this).attr("Documento");
    swal({
        title: '¿Está seguro de borrar aprendiz?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar aprendiz!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=aprendiz&NumDocumentoAprendiz=" + NumDocumentoAprendiz;
        }
    })
})