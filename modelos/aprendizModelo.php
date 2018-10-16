<?php

require_once "conexion.php";

class ModeloAprendiz
{

    /*=============================================
    MOSTRAR APRENDIZ
    =============================================*/
    static public function mdlIngresarAprendiz($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NumDocumentoAprendiz, NumeroFicha, NombreAprendiz, TelefonoAprendiz, EmailAprendiz) VALUES (:NumDocumentoAprendiz, :NumeroFicha, :NombreAprendiz, :TelefonoAprendiz, :EmailAprendiz)");

        $stmt->bindParam(":NumDocumentoAprendiz", $datos["NumDocumentoAprendiz"], PDO::PARAM_STR);
        $stmt->bindParam(":NumeroFicha", $datos["NumeroFicha"], PDO::PARAM_STR);
        $stmt->bindParam(":NombreAprendiz", $datos["NombreAprendiz"], PDO::PARAM_STR);
        $stmt->bindParam(":TelefonoAprendiz", $datos["TelefonoAprendiz"], PDO::PARAM_STR);
        $stmt->bindParam(":EmailAprendiz", $datos["EmailAprendiz"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
}