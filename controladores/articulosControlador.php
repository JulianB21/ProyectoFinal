<?php 


class ControladorArticulos
{
	// CREAR ARTICULO
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

				 $tablaEquipo = "equipo";
				$valorEquipo  = $_POST["equipo"];
				$itemEquipo="IdEquipo";
				

            $equipo = ModeloEquipos::mdlMostrarEquipos($tablaEquipo, $itemEquipo, $valorEquipo);
            $agregados=$equipo["NumArticulosAgregados"]+1;
            

                        $datosEquipo = array
                    (
                    "IdEquipo"				=> $equipo["IdEquipo"],
                    "NuevoEquipo"           => $equipo["NombreEquipo"],
                    "NuevoEstado"           => $equipo["EstadoEquipo"],
                    "NuevaObservacion"      => $equipo["ObservacionEquipo"],
                    "NumArticulosEquipo"    => $equipo["NumArticulosEquipo"],
                    "NumArticulosAgregados" => $agregados
                );
                   
                 $respuestaAmbiente2 =  ModeloEquipos::mdlEditarEquipo($tablaEquipo, $datosEquipo);

					
				$respuesta= ModeloArticulos::mdlCrearArticulo($tabla, $datos);
				
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
			$item="IdArticulo";



			$articulo=ModeloArticulos::mdlMostrarArticulos($tabla, $item, $datos);

			 	$tablaEquipo = "equipo";
				$valorEquipo  = $articulo["IdEquipo"];
				$itemEquipo="IdEquipo";
				

            $equipo = ModeloEquipos::mdlMostrarEquipos($tablaEquipo, $itemEquipo, $valorEquipo);
            $agregados=$equipo["NumArticulosAgregados"]-1;
            

                        $datosEquipo = array
                    (
                    "IdEquipo"				=> $equipo["IdEquipo"],
                    "NuevoEquipo"           => $equipo["NombreEquipo"],
                    "NuevoEstado"           => $equipo["EstadoEquipo"],
                    "NuevaObservacion"      => $equipo["ObservacionEquipo"],
                    "NumArticulosEquipo"    => $equipo["NumArticulosEquipo"],
                    "NumArticulosAgregados" => $agregados
                );
                   
                 $respuestaAmbiente2 =  ModeloEquipos::mdlEditarEquipo($tablaEquipo, $datosEquipo);

			$respuesta = ModeloArticulos::mdlBorrarArticulos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El articulo ha sido borrado correctamente",
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

	// EDITAR ARTICULO
	static public function ctrEditarArticulos()
	{
		if(isset($_POST["editarTipo"]))
		{
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])&& preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMarca"])) 
			{
				$editarTipo=strtoupper( $_POST["editarTipo"]);
				$editarMarca=strtoupper( $_POST["editarMarca"]);
				$editarModelo=strtoupper( $_POST["editarModelo"]);
				$editarSerial=strtoupper( $_POST["editarSerial"]);
				$editarCaracteristica=strtoupper( $_POST["editarCaracteristica"]);
				$idEquipo =$_POST["idEquipo"];
				if($idEquipo=="")
				{
					$idEquipo=null;
				}

				$tabla="articulo";
				$datos=array("IdArticulo" => $_POST["idArticulo"],
							"TipoArticulo" => $editarTipo,
							"MarcaArticulo"=>$editarMarca,
							"ModeloArticulo"=>$editarModelo,
							"NumInventarioSena"=>$_POST["editarInventario"],
							"SerialArticulo"=>$_POST["editarSerial"],
							"EstadoArticulo"=>$_POST["editarEstado"],
							"IdAmbiente"=>$_POST["idAmbiente"],
							"IdCategoria"=>$_POST["idCategoria"],
							"CaracteristicaArticulo"=>$editarCaracteristica,
							"IdEquipo"=>$idEquipo);

				$respuesta = ModeloArticulos::mdlEditarArticulo($tabla, $datos);
				
				if($respuesta=="ok")
				{
					echo '<script>

                    swal({

                        type: "success",
                        title: "¡El articulo ha sido editado correctamente!",
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

}