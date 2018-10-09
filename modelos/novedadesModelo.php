<?php 

require_once "conexion.php";

class ModeloNovedades{

	// CREAR NOVEDAD
	static public function mdlCrearNovedad($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NumDocumentoUsuario, UsuarioNovedad, NumeroFicha, FechaNovedad, Articulo) VALUES (:NumDocumentoUsuario, :UsuarioNovedad, :NumeroFicha, :FechaNovedad, :Articulo)");

		$stmt->bindParam(":NumDocumentoUsuario", $datos["NumDocumentoUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":UsuarioNovedad", $datos["UsuarioNovedad"], PDO::PARAM_STR);
		$stmt->bindParam(":NumeroFicha", $datos["NumeroFicha"], PDO::PARAM_STR);
		$stmt->bindParam(":FechaNovedad", $datos["FechaNovedad"], PDO::PARAM_STR);
		$stmt->bindParam(":Articulo", $datos["articulo"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	// CREAR NOVEDAD ARTICULO
	static public function mdlCrearNovedadArticulo($tabla, $datos){

		var_dump($datos);
		var_dump($tabla);

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (IdArticulo, TipoNovedad, ObservacionNovedad, IdNovedad) VALUES (:IdArticulo, :TipoNovedad, :ObservacionNovedad, :IdNovedad)");


		$stmt->bindParam(":IdArticulo", $datos["IdArticulo"], PDO::PARAM_STR);
		$stmt->bindParam(":TipoNovedad", $datos["TipoNovedad"], PDO::PARAM_STR);
		$stmt->bindParam(":ObservacionNovedad", $datos["ObservacionNovedad"], PDO::PARAM_STR);
		$stmt->bindParam(":IdNovedad", $datos["IdNovedad"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	// MOSTRAR NOVEDADES
	static public function mdlMostrarNovedades($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt->null();
    }
}

