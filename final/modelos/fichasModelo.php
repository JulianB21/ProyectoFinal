<?php 
require_once "conexion.php";

class ModeloFichas{

	static public function mdlAgregarFichas($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NumeroFicha, IdPrograma, IdAmbiente, FechaInicio, FechaFin, JornadaFicha) VALUES (:NumeroFicha, :IdPrograma, :IdAmbiente, :FechaInicio, :FechaFin, :JornadaFicha)");

        $stmt->bindParam(":NumeroFicha", $datos["NumeroFicha"], PDO::PARAM_STR);
        $stmt->bindParam(":IdPrograma", $datos["IdPrograma"], PDO::PARAM_STR);
        $stmt->bindParam(":IdAmbiente", $datos["IdAmbiente"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaInicio", $datos["FechaInicio"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaFin", $datos["FechaFin"], PDO::PARAM_STR);
        $stmt->bindParam(":JornadaFicha", $datos["JornadaFicha"], PDO::PARAM_STR);
        // var_dump($datos);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;
	}
}