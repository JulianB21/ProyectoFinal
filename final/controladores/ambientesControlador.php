<?php

class ControladorAmbientes
{

    static public function ctrCrearAmbientes()
    {

    	/*=============================================
    	=           	CREAR AMBIENTES               =
    	=============================================*/

    	if(isset($_POST["nuevoAmbiente"])){

    		if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAmbiente"])) {

    			$tabla="ambiente";
    			$NombreAmbiente = strtoupper($_POST["nuevoAmbiente"]);
    			$nuevaUbicacion= strtoupper($_POST["nuevaUbicacion"]);

    			$datos=array("IdPrograma"=>$_POST["idPrograma"],
    				"NombreAmbiente"=>$NombreAmbiente,
    				"UbicacionAmbiente"=>$nuevaUbicacion
    			);

                // var_dump($datos);

    			$respuesta=ModeloAmbientes::mdlCrearAmbientes($tabla, $datos);

    				if($respuesta=="ok"){
    					echo '<script>

					swal({
						  type: "success",
						  title: "El ambiente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "ambientes";

									}
								})

					</script>';
    				}

    				else{

    					echo '<script>

					swal({
						  type: "error",
						  title: "El ambiente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "ambientes";
							}
						})

			  	</script>';

    				}
    			}
    	}

    }

		static public function ctrEditarAmbientes()
    {

    	/*=============================================
    	=           	editar AMBIENTES               =
    	=============================================*/

    	if(isset($_POST["editarAmbiente"])){

    		if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAmbiente"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUbicacion"])) {

    			$tabla="ambiente";
    			$NombreAmbiente = strtoupper($_POST["editarAmbiente"]);
    			$editarUbicacion= strtoupper($_POST["editarUbicacion"]);


    			$datos=array("IdPrograma"=>$_POST["idPrograma"],
    				"NombreAmbiente"=>$NombreAmbiente,
    				"UbicacionAmbiente"=>$editarUbicacion,
                    "IdAmbiente"=>$_POST["idAmbiente"]
    			);

                var_dump($datos);
                
    			$respuesta=ModeloAmbientes::mdlEditarAmbientes($tabla, $datos);

    				if($respuesta=="ok"){
    					echo '<script>

					swal({
						  type: "success",
						  title: "El ambiente ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "ambientes";

									}
								})

					</script>';
    				}

    				else{

    					echo '<script>

					swal({
						  type: "error",
						  title: "El ambiente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "ambientes";
							}
						})

			  	</script>';

    				}
    			}
    	}

    }
    /*=============================================
    	=           	MOSTRAR AMBIENTES               =
    	=============================================*/

    static public function ctrMostrarAmbientes($item,$valor)
    {

    	$tabla="ambiente";

    	$respuesta=ModeloAmbientes::mdlMostrarAmbientes($tabla, $item, $valor);
        


    	return $respuesta;
    }


public function ctrEliminarAmbientes()
    {
        if (isset($_GET["idAmbiente"])) {
            $tabla     = "ambiente";
            $datos     = $_GET["idAmbiente"];
            $respuesta = ModeloAmbientes::mdlEliminarAmbiente($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                    swal({
                          type: "success",
                          title: "El ambiente ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "ambientes";

                                    }
                                })

                    </script>';
            }
        }
    }

}
