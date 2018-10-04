<?php 
require_once "../controladores/ambientesControlador.php";
require_once "../modelos/ambientesModelo.php";

require_once "../controladores/programasControlador.php";
require_once "../modelos/programasModelo.php";

require_once "../controladores/equipoControlador.php";
require_once "../modelos/equipoModelo.php";

class TablaArticulos{

  /*=============================================
  MOSTRAR LA TABLA DE ARTICULOS
  =============================================*/ 
  // public $idAmbiente = $_POST["idAmbiente1"];

  public function mostrarTabla(){

   
    // $item = "IdAmbiente";
    // $valor = "7";

    $item = null;
    $valor = null;

    $respuesta = ControladorAmbientes::ctrMostrarArticulos1($item, $valor);
    // var_dump($respuesta);
    echo '{
            "data": [';

            for($i = 0; $i < count($respuesta)-1; $i++){

                $item = "IdEquipo";
                $valor = $respuesta[$i]["IdEquipo"];

                $equipo = ControladorEquipos::ctrMostrarEquipos($item, $valor);

                 echo '[
                  "'.$respuesta[$i]["IdArticulo"].'",
                  "'.$respuesta[$i]["TipoArticulo"].'",
                  "'.$respuesta[$i]["NumInventarioSena"].'",
                  "'.$respuesta[$i]["ModeloArticulo"].'",
                  "'.$respuesta[$i]["SerialArticulo"].'",
                  "'.$equipo["NombreEquipo"].' '.$equipo["IdEquipo"].'"
                ],';

            }

            $item = "IdEquipo";
            $valor = $respuesta[count($respuesta)-1]["IdEquipo"];

            $equipo = ControladorEquipos::ctrMostrarEquipos($item, $valor);

           echo'[
                  "'.$respuesta[$i]["IdArticulo"].'",
                  "'.$respuesta[count($respuesta)-1]["TipoArticulo"].'",
                  "'.$respuesta[count($respuesta)-1]["NumInventarioSena"].'",
                  "'.$respuesta[count($respuesta)-1]["ModeloArticulo"].'",
                  "'.$respuesta[count($respuesta)-1]["SerialArticulo"].'",
                  "'.$equipo["NombreEquipo"].' '.$equipo["IdEquipo"].'"
                ]
            ]
        }';


  }


}

/*=============================================
ACTIVAR TABLA DE ARTICULOS
=============================================*/
$activar = new TablaArticulos();
$activar -> mostrarTabla();