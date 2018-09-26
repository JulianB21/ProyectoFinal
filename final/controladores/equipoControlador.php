<?php 
Class ControladorEquipos
{
    public static function ctrCrearEquipos()
    {
        if (isset($_POST["nuevoEquipo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEquipo"])) {
                $tabla            = "equipo";
                $nuevoEquipo      = strtoupper($_POST["nuevoEquipo"]);
                $nuevoEstado      = strtoupper($_POST["nuevoEstado"]);
                $nuevaObservacion = strtoupper($_POST["nuevaObservacion"]);

                $datos = array
                    (
                    "NuevoEquipo"           => $nuevoEquipo,
                    "NuevoEstado"           => $nuevoEstado,
                    "NuevaObservacion"      => $nuevaObservacion,
                    "NumArticulosEquipo"    => $_POST["nuevaCantidad"],
                    "NumArticulosAgregados" => null,
                );

                $respuesta = ModeloEquipos::mdlCrearEquipo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                                  swal({
                                        type: "success",
                                        title: "El equipo ha sido agregado correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                        }).then((result) => {
                                                  if (result.value) {

                                                  window.location = "equipos";

                                                  }
                                              })

                                  </script>';

                }
            } else {
                echo '<script>

                                  swal({
                                        type: "error",
                                        title: "El equipo no puede ir vacío o llevar caracteres especiales!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                        }).then((result) => {
                                          if (result.value) {

                                          window.location = "equipos";

                                          }
                                      })

                              </script>';
            }
        }
    }

     // MOSTRAR EQUIPOS
    public static function ctrMostrarEquipos($item, $valor)
    {

        $tabla = "equipo";

        $respuesta = ModeloEquipos::mdlMostrarEquipos($tabla, $item, $valor);

        return $respuesta;

    }

    // BORRAR EQUIPO
    public static function ctrBorrarEquipo()
    {

        if (isset($_GET["idEquipo"])) {

            $tabla = "equipo";
            $datos = $_GET["idEquipo"];

            $respuesta = ModeloEquipos::mdlBorrarEquipo($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

          swal({
              type: "success",
              title: "El quipo ha sido borrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                  if (result.value) {

                  window.location = "equipos";

                  }
                })

          </script>';
            }
        }
    }
}

