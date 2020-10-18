<?php 

namespace Clases;
use PDO;
	
	class Bd {

		use SQL;

		private $dsn = '';

		private $usuario = '';

		private $contrasenia = '';

		private $pdo = null;

		public function __construct ($filePath = 'base-de-datos-robot.ini'){

			$filePath = str_replace("/", ds, $filePath);

			$existencia = parse_ini_file($filePath, true); //true para traerlo en forma de arreglo si no lo trae en texto plano

					
			if ($existencia == false) {
				throw new Exception("No se encontro archivo revisar el path", 1);
				die();												
			}

			$mysqlDriver= $existencia['mysql'];
			//var_dump($mysqlDriver);

			//conexion mediante PDO::__construct para mas informacion
			$this->dsn = $mysqlDriver['driver']. ":dbname=" . $mysqlDriver['database'];
			$this->dsn .= ";host=". $mysqlDriver['host'];
			//var_dump($this->dsn);

			$this->usuario = $mysqlDriver["username"];
			$this->contrasenia = $mysqlDriver["password"];

			echo "soy el constructor";
			
		}


		public function conectar(){

			//PDO::__construct para mas info en php.net
			try {
				//var_dump (spl_autoload_unregister("cargador"));
				$this->pdo = new PDO($this->dsn, $this->usuario, $this->contrasenia);
				echo "conexion a BD exitosa";
			    
			} catch ( PDOException $error ) {
			    echo $error->getMessage();
			}
		}

		public function __destruct(){
			$this->pdo = null;
			echo "Soy el destructor";
		}
	
		public function insertarDatos($arrayRobot){

			$sql= $this->insertar(); 
			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

			$respuesta->bindParam(":id", $arrayRobot['id'] );
			$respuesta->bindParam(":nombre", $arrayRobot['nombre'], PDO::PARAM_STR); //inclusion de validacion de string
			$respuesta->bindParam(":alias", $arrayRobot['alias']);

			$respuesta->execute();
		}

		public function actualizarDatos(){
			

			$sql= $this->actualizar(); 
			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

			$respuesta->execute();
		}
	public function setearContador(){

			$sql= $this->resetAutoIncrement(); 
			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

			$respuesta->execute();
	}

}







 ?>