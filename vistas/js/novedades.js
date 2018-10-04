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

$(".btnBuscar").click(function(){

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
                    if (respuesta==false) {
                        $("#nuevaFicha1").parent().after('<div class="alert alert-warning">Esta ficha no esta registrada en la base de datos</div>');
                        $("#nuevaFicha1").val("");

                     }
                }
            })
        }

    });

})

$(".btnBuscar1").click(function(){

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
            var idAmbiente1 = respuesta["IdAmbiente"];
            var datosAmbiente1 = new FormData();
            $("#idAmbiente2").val(respuesta["IdAmbiente"]);
            datosAmbiente1.append("idAmbiente1", idAmbiente1);
            $.ajax({
                url: "ajax/ambientesAjax.php",
                method: "POST",
                data: datosAmbiente1,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    console.log("respuesta", respuesta);
                    
                }
            })
        }

    });

})

var table = $('.tablaArticulos').DataTable({

    "ajax":"ajax/datatable-articulosAjax.php",
    "columnDefs": [

        {
            "targets": -1,
             "data": null,
             "defaultContent": '<div class="btn-group"><button class="btn btn-primary btnAgregarArticulo recuperarBoton" idArticulo>Agregar</button></div>'

        }

    ],

    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

})

/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaArticulos tbody').on( 'click', 'button.btnAgregarArticulo', function () {
   
        var data = table.row( $(this).parents('tr') ).data();
        // console.log("data", data);

        $(this).attr("idArticulo",data[0]);

});

/*=============================================
AGREGAR NOVEVDAD
=============================================*/
$('.tablaArticulos tbody').on( 'click', 'button.btnAgregarArticulo', function () {
   
   var idArticulo = $(this).attr("idArticulo");
   // console.log("idArticulo", idArticulo);

   $(this).removeClass("btn-primary btnAgregarArticulo");
   $(this).addClass("btn-default");

   var datos = new FormData();
   datos.append("idArticulo",idArticulo);

   $.ajax({
        url: "ajax/articulosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // console.log("respuesta", respuesta);

            var nombreArticulo = respuesta["TipoArticulo"];

            $(".nuevoArticulo").append(

                '<div class="row" style="padding: 5px 15px">'+
                    '<div class="col-xs-4" style="padding-right:0px">'+
                      
                        '<div class="input-group">'+
                          
                          '<span class="input-group-addon"><button type="button" class="btn btn-danger quitarNovedad btn-xs" idArticulo="'+idArticulo+'"><i class="fa fa-times"></i></button></span>'+

                          '<input type="text" class="form-control " id="agregarArticulo" name="agregarArticulo" value="'+nombreArticulo+'" required readonly>'+

                        '</div>'+

                    '</div>'+

                    '<div class="form-group col-xs-4"  style="padding-left:5px; padding-right: 0px">'+
                    
                        '<div class="input-group">'+
                        
                          '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+

                          '<select class="form-control" name="tipoNovedadArticulo" id="tipoNovedadArticulo">'+
                            
                            '<option value="">Tipo</option>'+

                            '<option value="DAÑADO">DAÑADO</option>'+

                            '<option value="PERDIDO">PERDIDO</option>'+
                              
                          '</select>'+

                        '</div>'+

                    '</div> '+

                    '<div class="col-xs-4" style="padding-left:5px">'+
                      
                        '<div class="input-group">'+

                            '<input type="text" class="form-control " id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Descripción" required>'+

                        '</div>'+

                    '</div>'+
                '</div>'
                )

        }
    });

});

// QUITAR NOVEVDAD
$('.formularioNovedad').on( 'click', 'button.quitarNovedad', function () {

    console.log("boton");
    $(this).parent().parent().parent().parent().remove();

    var idArticulo = $(this).attr("idArticulo");

    $("button.recuperarBoton[idArticulo='"+idArticulo+"']").removeClass('btn-default');
    $("button.recuperarBoton[idArticulo='"+idArticulo+"']").addClass('btn-primary btnAgregarArticulo');

});