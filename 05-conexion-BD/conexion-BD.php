<?php 

	class Bd {

		private $dsn = '';

		private $usuario = '';

		private $contrasenia = '';

		private $pdo = null;

		public function __construct ($filePath = './Ejemplo/config/base-de-datos-prueba.ini'){

			$existencia = parse_ini_file($filePath, true);

			if ($existencia == false) {
				throw new Exception("No se encontro archivo revisar el path", 1);
				die();												
			}

			$mysqlDriver= $existencia['mysql'];
			//var_dump($mysqlDriver);

			$this->dsn = $mysqlDriver['driver']. ":dbname=" . $mysqlDriver['database'];
			$this->dsn .= ";host=". $mysqlDriver['host'];
			// var_dump($this->dsn);

			$this->usuario = $mysqlDriver["username"];
			$this->contrasenia = $mysqlDriver["password"];

			echo "soy el constructor";

		}


		public function conectar(){

			try {
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

		public function crearTabla(){
			
			$sql= "CREATE TABLE invitado (
				id int PRIMARY KEY,
				name char(30),
				apellido char(30),
				correo char(30)
			);";

			$this->conectar();

			$stmt = $this->pdo->query($sql);

			if ($stmt == false) {
				echo "fallo en la ejecucion";
				return;
			}

			
			echo "creacion de tabla exitosa";
		}

	}

	$base = new Bd;
	$base->crearTabla();



 ?>