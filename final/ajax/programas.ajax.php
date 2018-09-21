<?php

require_once "../controladores/programasControlador.php";
require_once "../modelos/programasModelo.php";

class AjaxProgramas
{

    // EDITAR CATEGORÍA
    public $idPrograma;

    public function ajaxEditarPrograma()
    {

        $item  = "IdPrograma";
        $valor = $this->idPrograma;

        $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor);

        echo json_encode($respuesta);

    }
}

// EDITAR CATEGORÍA
if (isset($_POST["idPrograma"])) {

    $programas             = new AjaxProgramas();
    $programas->idPrograma = $_POST["idPrograma"];
    $programas->ajaxEditarPrograma();
}
