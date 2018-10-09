<?php 

class ControladorNovedades{

	// CREAR NOVEDAD
	static public function ctrCrearNovedad(){

		$arreglo = $_POST["listaArticulos"];

		$array = json_decode($arreglo);

		print_r($array);

		// if (isset($_POST["usuarioNovedad"])) {
			
		// 	$tabla = "novedad";

		// 	date_default_timezone_set('America/Bogota');

		// 	$fecha = date('Y-m-d');
		// 	$hora = date('H:i:s');

		// 	$fechaActual = $fecha.' '.$hora;

		//   	$datos = array("NumDocumentoUsuario" => $_POST["numUsuario"],
		// 	                "UsuarioNovedad"     => $_POST["usuarioNovedad"],
		// 	                "NumeroFicha"        => $_POST["nuevaFicha1"],
		// 	                "articulo"         => $_POST["articulo"],
		// 	                "FechaNovedad"       => $fechaActual);
		  	
		//   	$respuesta = ModeloNovedades::mdlCrearNovedad($tabla, $datos);
		//   	if ($respuesta == "ok") {



		//   		$tabla = "articulonovedad";

		//   		$observacion = $_POST["nuevaDescripcion"];
		//   		if ($observacion == "") {
		//   		 	$observacion = null;
		//   		} 


		//   		$item1 = "Articulo";
		//   		$valor1 = $_POST["articulo"];
		//   		$tabla1 = "novedad";

		// 		$respuesta1 = ModeloNovedades::mdlMostrarNovedades($tabla1, $item1, $valor1);

		// 	  	$datos = array("IdArticulo"   => $_POST["articulo"],
		// 		                "TipoNovedad" => $_POST["tipoNovedadArticulo"],
		// 		                "ObservacionNovedad" => $_POST["nuevaDescripcion"],
		// 		                "IdNovedad"=> $respuesta1["IdNovedad"]);
		// 	  	// var_dump($datos);
		// 	  	$respuesta = ModeloNovedades::mdlCrearNovedadArticulossssss($tabla, $datos);

		//   	}
		// }
	}

	static public function ctrMostrarNovedades($item, $valor){

		$tabla = "novedad";

		$respuesta = ModeloNovedades::mdlMostrarNovedades($tabla, $item, $valor);

        return $respuesta;

    }

} 