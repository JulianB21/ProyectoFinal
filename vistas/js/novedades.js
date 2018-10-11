function ficha(sel) {
    var idFicha1 = sel;
    var datosFichas = new FormData();
    datosFichas.append("sel", idFicha1);
    $.ajax({
        url: "ajax/fichasAjax.php",
        method: "POST",
        data: datosFichas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            var idAmbiente = respuesta["IdAmbiente"];
            var datosAmbiente = new FormData();
            datosAmbiente.append("idAmbiente", idAmbiente);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    // console.log("respuesta", respuesta);
                    $("#nuevoAmbiente1").val(respuesta["NombreAmbiente"]);
                }
            });
        }
    });
}
$(".btnBuscar").click(function() {
    $(".alert").remove();
    var idFicha = $("#nuevaFicha1").val();
    var datosFichas = new FormData();
    datosFichas.append("idFicha", idFicha);
    $.ajax({
        url: "ajax/fichasAjax.php",
        method: "POST",
        data: datosFichas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            var idAmbiente = respuesta["IdAmbiente"];
            var datosAmbiente = new FormData();
            datosAmbiente.append("idAmbiente", idAmbiente);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    // console.log("respuesta", respuesta);
                    if (respuesta == false) {
                        $("#nuevaFicha1").parent().after('<div class="alert alert-warning">Esta ficha no esta registrada en la base de datos</div>');
                        $("#nuevaFicha1").val("");
                    }
                }
            })
        }
    });
})
$(".btnBuscar1").click(function() {
    var idFicha = $("#nuevaFicha1").val();
    var datosFichas = new FormData();
    datosFichas.append("idFicha", idFicha);
    $.ajax({
        url: "ajax/fichasAjax.php",
        method: "POST",
        data: datosFichas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // console.log(respuesta);
            var idAmbiente1 = respuesta["IdAmbiente"];
            var datosAmbiente1 = new FormData();
            $("#idAmbiente2").val(respuesta["IdAmbiente"]);
            var idAmbiente = respuesta["IdAmbiente"];
            datosAmbiente1.append("idAmbiente", idAmbiente);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente1,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    // console.log(respuesta);
                    $(".inputAmbiente").val(respuesta["NombreAmbiente"]);
                    var e = $.Event("keyup", {
                        keyCode: 13
                    });
                    $('.inputAmbiente').focus();
                    $('.inputAmbiente').trigger(e);
                }
            });
            datosAmbiente1.append("idAmbiente1", idAmbiente1);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente1,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {}
            })
        }
    });
});
var table = $('.tablaArticulos').DataTable({
    "ajax": "ajax/datatable-articulosAjax.php",
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": '<div class="btn-group"><button class="btn btn-primary btnAgregarArticulo recuperarBoton" idArticulo data-toggle="modal" id="btnAgregarArticulo"data-target="#modalAgregarArticulo1">Agregar</button></div>'
    }],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
})
/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/
$('.tablaArticulos tbody').on('click', 'button.btnAgregarArticulo', function() {
    var data = table.row($(this).parents('tr')).data();
    // console.log("data", data);
    $(this).attr("idArticulo", data[0]);
});
/*=============================================
AGREGAR NOVEVDAD
=============================================*/
$('.tablaArticulos tbody').on('click', 'button.btnAgregarArticulo', function() {
    var idArticulo = $(this).attr("idArticulo");
    // console.log("idArticulo", idArticulo);
    $(this).removeClass("btn-primary btnAgregarArticulo");
    $(this).addClass("btn-default");
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

            // console.log("resspuesta", respuesta);

            var nombreArticulo = respuesta["TipoArticulo"];
            var articulo = respuesta["IdArticulo"];
            $("#idArticulo").val(articulo);
            $("#agregarArticulo").val(nombreArticulo);

   
        }
    });


});
// QUITAR NOVEVDAD
$('.formularioNovedad').on('click', 'button.quitarNovedad', function() {
    // console.log("boton");
    $(this).parent().parent().parent().parent().remove();
    var idArticulo = $(this).attr("idArticulo");
    $("button.recuperarBoton[idArticulo='" + idArticulo + "']").removeClass('btn-default');
    $("button.recuperarBoton[idArticulo='" + idArticulo + "']").addClass('btn-primary btnAgregarArticulo');
    listaArticulos("eliminar");
    
});



function agregar()
{
$(".alert").remove();
    if($(".tipoNovedadArticulo").val()=="")
    {
         $(".tipoNovedadArticulo").parent().after('<div class="alert alert-warning">Ingrese tipo</div>');
               

    }
    else
    {
        
        $("#modalAgregarArticulo1").modal('hide') 
        // $(".skin-blue sidebar-collapse sidebar-mini login-page").focus();
        $(".nuevoArticulo").append(

                '<div class="row" style="padding: 5px 15px">'+
                    '<div class="col-xs-4" style="padding-right:0px">'+
                      
                        '<div class="input-group">'+
                          
                          '<span class="input-group-addon"><button type="button" class="btn btn-danger quitarNovedad btn-xs" idArticulo="'+$("#idArticulo").val()+'"><i class="fa fa-times"></i></button></span>'+

                          '<input type="text" class="form-control agregarArticulo1" idArticulo="'+$("#idArticulo").val()+'" name="agregarArticulo" value="'+$("#agregarArticulo").val()+'" required readonly>'+

                        '</div>'+

                    '</div>'+

                    '<div class="form-group col-xs-4"  style="padding-left:5px; padding-right: 0px">'+
                    
                        '<div class="input-group">'+
                        
                          '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+

                          '<input type="text" class="form-control tipoNovedadArticulo1" name="tipoNovedadArticulo1" placeholder="Descripción" readonly value="'+$(".tipoNovedadArticulo").val()+'"required>'+

                        '</div>'+

                    '</div> '+

                    '<div class="col-xs-4" style="padding-left:5px">'+
                      
                        '<div class="input-group">'+

                            '<input type="text" class="form-control nuevaDescripcion1" name="nuevaDescripcion" placeholder="Descripción" readonly value="'+$(".nuevaDescripcion").val()+'"required>'+
                            '<input type="hidden" id="articulo" name="articulo" value="'+$("#idArticulo").val()+'">'+

                        '</div>'+

                    '</div>'+
                '</div>'
                );
        listaArticulos("agregar");
    }
         
}

// LISTA DE ARTICULOS
lista=0;
function listaArticulos(valor){
    console.log(valor);

    var listaArticulos1 = [];
    // var id =  $(".")
    if(valor=="agregar")
    {
         var descripcion = $(".nuevaDescripcion1");
    var tipo = $(".tipoNovedadArticulo1");
    var nombre = $(".agregarArticulo1");  

    for (var i = 0; i <= lista; i++) {

        
        listaArticulos1.push({"id":$(nombre[i]).attr("idArticulo"),
                            "nombre":$(nombre[i]).val(),
                            "tipo":$(tipo[i]).val(),
                            "descripcion":$(descripcion[i]).val()});
        $("#listaArticulos").val(JSON.stringify(listaArticulos1));

    }

}
    
    else
    {
        debugger;
        var idArticulo = $("#idArticulo").val();
        for (var i = 0; i <= lista; i++) {

        
        if(listaArticulos1[i]==idArticulo)
        {
            alert("ELIMINAR");
        }
    }
}
    lista++;
    console.log("listaArticulos", listaArticulos1);
    
    $("#tipoNovedadArticulo").val("");
    $(".nuevaDescripcion").val("");

    $("button.recuperarBoton[idArticulo='" + idArticulo + "']").addClass('disabled');
    
    
   
} 

function quitarNovedad()
{
    var idArticulo = $("#idArticulo").val();
    $("button.recuperarBoton[idArticulo=" + idArticulo + "']").removeClass('btn-default');
    $("button.recuperarBoton[idArticulo='" + idArticulo + "']").addClass('btn-primary btnAgregarArticulo');
    

}
