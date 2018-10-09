<?php 

class ControladorNovedades{

	// CREAR NOVEDAD
	static public function ctrCrearNovedad(){
		
		if (isset($_POST["usuarioNovedad"])) {
			
			$tabla = "novedad";

			date_default_timezone_set('America/Bogota');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');

			$fechaActual = $fecha.' '.$hora;

		  	$datos = array("NumDocumentoUsuario" => $_POST["numUsuario"],
			                "UsuarioNovedad"     => $_POST["usuarioNovedad"],
			                "NumeroFicha"        => $_POST["nuevaFicha1"],
			                "articulo"         => $_POST["articulo"],
			                "FechaNovedad"       => $fechaActual);
		  	
		  	$respuesta = ModeloNovedades::mdlCrearNovedad($tabla, $datos);
		  	if ($respuesta == "ok") {

		  		$tabla = "articulonovedad";

		  		$observacion = $_POST["nuevaDescripcion"];
		  		if ($observacion == "") {
		  		 	$observacion = null;
		  		} 


		  		$item1 = "Articulo";
		  		$valor1 = $_POST["articulo"];
		  		$tabla1 = "novedad";

				$respuesta1 = ModeloNovedades::mdlMostrarNovedades($tabla1, $item1, $valor1);

			  	$datos = array("IdArticulo"   => $_POST["articulo"],
				                "TipoNovedad" => $_POST["tipoNovedadArticulo"],
				                "ObservacionNovedad" => $observacion,
				                "IdNovedad"=> $respuesta1["IdNovedad"]);
			  	
			  	
			  	$respuesta = ModeloNovedades::mdlCrearNovedadArticulo($tabla, $datos);
			  	if($respuesta=="error")
			  	{
			  		 echo '<script>

                    swal({

                        type: "error",
                        title: "¡El artículo ya se encuentra registrado en esta novedad!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "crear-novedad";

                        }

                    });


                </script>';
			  	}


		  	}else{

		  	}
		}
	}

	static public function ctrMostrarNovedades($item, $valor){

		$tabla = "novedad";

		$respuesta = ModeloNovedades::mdlMostrarNovedades($tabla, $item, $valor);

        return $respuesta;

    }

}