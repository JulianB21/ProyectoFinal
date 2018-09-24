<?php 


class ControladorArticulos
{
	static public function ctrCrearArticulos()
	{
		if(isset($_POST["nuevoTipo"]))
		{
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])&& preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMarca"])) 
			{
				$nuevoTipo=strtoupper( $_POST["nuevoTipo"]);
				$nuevaMarca=strtoupper( $_POST["nuevaMarca"]);
				$nuevoModelo=strtoupper( $_POST["nuevoModelo"]);
				$nuevoSerial=strtoupper( $_POST["nuevoSerial"]);
				$nuevaCaracteristica=strtoupper( $_POST["nuevaCaracteristica"]);
				$idEquipo =$_POST["nuevoEquipo"];
				if($idEquipo=="")
				{
					$idEquipo=null;
				}

				$tabla="articulo";
				$datos=array("TipoArticulo" => $nuevoTipo,
				"MarcaArticulo"=>$nuevaMarca,
				"ModeloArticulo"=>$nuevoModelo,
				"NumInventarioSena"=>$_POST["nuevoInventario"],
				"SerialArticulo"=>$_POST["nuevoSerial"],
				"EstadoArticulo"=>$_POST["nuevoEstado"],
				"IdAmbiente"=>$_POST["nuevoAmbiente"],
				"IdCategoria"=>$_POST["nuevaCategoria"],
				"CaracteristicaArticulo"=>$nuevaCaracteristica,
				"IdEquipo"=>$idEquipo
				);
					
				$respuesta= ModeloArticulos::mdlCrearArticulo($tabla, $datos);
				var_dump($respuesta);
				if($respuesta=="ok")
				{
					echo '<script>

                    swal({

                        type: "success",
                        title: "¡El articulo ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "articulos";

                        }

                    });

                    </script>';
				}
			}
			else
			{
				echo '<script>

                    swal({

                        type: "error",
                        title: "¡El articulo no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "articulos";

                        }

                    });


                </script>';
			}
		}
	}

static public function ctrMostrarArticulos($item, $valor){

$tabla = "articulo";

$respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $item, $valor);

return $respuesta;
	
	}


	static public function ctrBorrarArticulo(){

		if(isset($_GET["idArticulo"])){

			$tabla ="articulo";
			$datos = $_GET["idArticulo"];

			$respuesta = ModeloArticulos::mdlBorrarArticulos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El articulo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "articulos";

									}
								})

					</script>';
			}
		}
	}

	static public function ctrEditarArticulos(){


	}


}