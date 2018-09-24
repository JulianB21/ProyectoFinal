<?php
require_once "../controladores/fichasControlador.php";
require_once "../modelos/fichasModelo.php";

class AjaxFichas{

    // EDITAR FICHA
    public $idFicha;

    public function ajaxEditarFicha(){

        $item = "NumeroFicha";
        $valor = $this->idFicha;

        $respuesta = ControladorFichas::ctrMostrarFichas($item, $valor);

        echo json_encode($respuesta);

    }
}

// // EDITAR CATEGORÍA
if(isset($_POST["idFicha"])){

    $ambiente = new AjaxFichas();
    $ambiente -> idFicha = $_POST["idFicha"];
    $ambiente -> ajaxEditarFicha();
}
