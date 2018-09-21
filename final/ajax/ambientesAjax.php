<?php
require_once "../controladores/ambientesControlador.php";
require_once "../modelos/ambientesModelo.php";
require_once "../controladores/programasControlador.php";
require_once "../modelos/programasModelo.php";

class AjaxAmbientes{

    // EDITAR CATEGORÍA
    public $idAmbiente;

    public function ajaxEditarAmbientes(){

        $item = "IdAmbiente";
        $valor = $this->idAmbiente;

        $respuesta = ControladorAmbientes::ctrMostrarAmbientes($item, $valor);

        echo json_encode($respuesta);

    }
}

// // EDITAR CATEGORÍA
if(isset($_POST["idAmbiente"])){

    $ambiente = new AjaxAmbientes();
    $ambiente -> idAmbiente = $_POST["idAmbiente"];
    $ambiente -> ajaxEditarAmbientes();
}


