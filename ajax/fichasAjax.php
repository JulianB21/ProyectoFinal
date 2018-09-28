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

    // VALIDAR NO REPETIR USUARIO
    public $validarFicha;
    public function ajaxValidarFicha(){

        $item = "NumeroFicha";
        $valor = $this->validarFicha;

        $respuesta = ControladorFichas::ctrMostrarFichas($item, $valor);

        echo json_encode($respuesta);

    }
}

// EDITAR CATEGORÍA
if(isset($_POST["idFicha"])){

    $ambiente = new AjaxFichas();
    $ambiente -> idFicha = $_POST["idFicha"];
    $ambiente -> ajaxEditarFicha();
}

// VALIDAR FICHA
if(isset($_POST["validarFicha"])){

    $valFicha = new AjaxFichas();
    $valFicha -> validarFicha = $_POST["validarFicha"];
    $valFicha -> ajaxValidarFicha();
}
