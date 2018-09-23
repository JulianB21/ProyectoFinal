<?php
class ControladorProgramas
{
    public function ctrCrearProgramas()
    {

        if (isset($_POST["NuevoPrograma"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoPrograma"])) {

                $tabla = "programa";
                $nombrePrograma = strtoupper($_POST['NuevoPrograma']);
                $tipoPrograma= strtoupper($_POST["TipoPrograma"]);
                $duracionPrograma=strtoupper($_POST["nuevaDuracion"]);

                $datos = array("NuevoPrograma" => 		$nombrePrograma,
                    "TipoPrograma"                 => $tipoPrograma,
                    "DuracionPrograma"             => $duracionPrograma);

                //var_dump($datos);exit();

                $respuesta = ModelosProgramas::mdlCrearPrograma($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El programa ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "programas";

									}
								})

					</script>';

                }
            } else {
                echo '<script>

					swal({
						  type: "error",
						  title: "El programa no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "programas";

							}
						})

			  	</script>';
            }
        }
    }

    public function ctrMostrarProgramas($item, $valor)
    {
        $tabla = "programa";

        $respuesta = ModelosProgramas::mdlMostrarProgramas($tabla, $item, $valor);
        return $respuesta;
    }

     public function ctrEditarPrograma()
    {
		
        if (isset($_POST["EditarPrograma"])) {


            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarPrograma"])) {



                $tabla = "programa";
                $nombrePrograma = strtoupper($_POST['EditarPrograma']);
                $tipoPrograma= strtoupper($_POST["EditarTipoPrograma"]);
                $duracionPrograma=strtoupper($_POST["EditarDuracion"]);

                $datos = array("EditarPrograma" => 		$nombrePrograma,
                    "TipoPrograma"                 => $tipoPrograma,
                    "DuracionPrograma"             => $duracionPrograma,
                	"idPrograma"=>					$_POST["idPrograma"]);

                var_dump($datos);

                $respuesta = ModelosProgramas::mdlEditarPrograma($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El programa ha sido actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "programas";

									}
								})

					</script>';

                }
            } else {
                echo '<script>

					swal({
						  type: "error",
						  title: "El programa no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "programas";

							}
						})

			  	</script>';
            }
        }
    }

    public function ctrBorrarPrograma()
    {
        if (isset($_GET["idPrograma"])) {
            $tabla     = "programa";
            $datos     = $_GET["idPrograma"];

     
            $respuesta = ModelosProgramas::mdlBorrarPrograma($tabla, $datos);
			
            if ($respuesta == "ok") {
                echo '<script>

					swal({
						  type: "success",
						  title: "El programa ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "programas";

									}
								})

					</script>';
            }
        }
    }

}
