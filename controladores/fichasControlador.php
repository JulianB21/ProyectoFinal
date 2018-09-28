<?php 

class ControladorFichas
{

/*=============================================
=                    CREAR FICHA 			    =
=============================================*/

	static public function ctrAgregarFichas()
	{

		if(isset($_POST["nuevaFicha"]))
		{

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaFicha"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaJornada"])){

				$tabla = "ficha";

				$jornada = strtoupper($_POST["nuevaJornada"]);
				// $fechaInicio=($_POST["nuevaFechaInicio"],$formato);

				$datos = array("NumeroFicha" => $_POST["nuevaFicha"],
							 "IdAmbiente" => $_POST["nuevoAmbiente"],
							 "IdPrograma" => $_POST["nuevoPrograma"],
							 "FechaInicio" => $_POST["nuevaFechaInicio"],
							 "FechaFin" => $_POST["nuevaFechaFin"],
							 "JornadaFicha"=>$jornada);
				

				$respuesta = ModeloFichas::mdlAgregarFichas($tabla, $datos);
				
				if($respuesta == "ok"){
					echo '<script>

					swal({
						  type: "success",
						  title: "La ficha ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "fichas";

									}
								})

					</script>';
    				}

    		}else{

    			echo '<script>

					swal({
						  type: "error",
						  title: "La ficha no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "fichas";
							}
						})

			  	</script>';
			}
		}
	}

	// MOSTRAR fICHAS
	static public function ctrMostrarFichas($item,$valor)
    {

    	$tabla="ficha";

    	$respuesta = ModeloFichas::mdlMostrarFichas($tabla, $item, $valor);

    	return $respuesta;
    }

    /*=============================================
	=                    CREAR FICHA 			    =
	=============================================*/

	static public function ctrEditarFichas()
	{

		if(isset($_POST["editarFicha"]))
		{

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarFicha"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarJornada"])){

				$tabla = "ficha";

				$jornada = strtoupper($_POST["editarJornada"]);
				// $fechaInicio=($_POST["editarFechaInicio"],$formato);

				$datos = array("NumeroFicha" => $_POST["editarFicha"],
							 "IdAmbiente" => $_POST["idAmbiente"],
							 "IdPrograma" => $_POST["idPrograma"],
							 "FechaInicio" => $_POST["editarFechaInicio"],
							 "FechaFin" => $_POST["editarFechaFin"],
							 "JornadaFicha"=>$jornada);

				$respuesta = ModeloFichas::mdlEditarFichas($tabla, $datos);
				
				if($respuesta == "ok"){
					echo '<script>

					swal({
						  type: "success",
						  title: "La ficha ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "fichas";

									}
								})

					</script>';
    				}

    		}else{

    			echo '<script>

					swal({
						  type: "error",
						  title: "La ficha no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "fichas";
							}
						})

			  	</script>';
			}
		}
	}

	// ELIMINAR FICHA
	static public function ctrEliminarFicha()
    {
        if (isset($_GET["idFicha"])) {
            $tabla     = "ficha";
            $datos     = $_GET["idFicha"];
            $respuesta = ModeloFichas::mdlEliminarFicha($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                    swal({
                          type: "success",
                          title: "La ficha ha sido borrada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "fichas";

                                    }
                                })

                    </script>';
            }
        }
    }
}




