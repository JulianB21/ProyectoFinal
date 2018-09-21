<?php 

require_once "../controladores/usuariosControlador.php";
require_once "../modelos/usuariosModelo.php";

class AjaxUsuarios{

    /*=============================================
    EDITAR USUARIO
    =============================================*/

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item = "NumDocumentoUsuario";
        $valor = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
    =============================================*/

    public $ValidarUsuario;

    public function ajaxValidarUsuario(){

        $item = "NumDocumentoUsuario";
        $valor = $this->ValidarUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();

}

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO

=============================================*/
if(isset($_POST["ValidarUsuario"])){

    $valUsuario = new AjaxUsuarios();

    $valUsuario -> ValidarUsuario = $_POST["ValidarUsuario"];

    $valUsuario -> ajaxValidarUsuario();
}



