<?php 

	namespace MisClases;
	//la clases nativas como PDO se deben llamar de la siguiente manera para ser encontrada por el autoload
	use PDO;
	
	class Bd {

		use SQL;

		private $dsn = '';

		private $usuario = '';

		private $contrasenia = '';

		private $pdo = null;

		public function __construct ($filePath = './Ejemplo/config/base-de-datos-prueba.ini'){

			//define( "ds", DIRECTORY_SEPARATOR );
			//el autoload es el primero en cargarse y ya tiene la variable ds definida

			$filePath = str_replace("/", ds, $filePath);

			$existencia = parse_ini_file($filePath, true);
			
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

		public function crearTabla(){
			
			$sql= $this->crear();

			$this->conectar();

			$stmt = $this->pdo->query($sql);
			//mas info en PDO::query php.net

			if ($stmt == false) {
				echo "fallo en la ejecucion";
				return;
			}

			
			echo "creacion de tabla exitosa";
		}

		public function insertarDatos(){

			$sql= $this->insertar(); 

			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

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

		public function eliminarDatos(){

			$sql= $this->eliminar(); 

			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

			var_dump( $respuesta->execute() );
		
		}

		public function setearContador(){

			$sql= $this->resetAutoIncrement(); 

			$this->conectar();

			$respuesta = $this->pdo->prepare($sql);

			if ($respuesta == false) {
				echo "error en la consulta";
				return;
			}

			var_dump( $respuesta->execute() );

	}

}
	//$base = new Bd;
	 
	//$base->crearTabla();
	// $base->eliminarDatos();

	//prepare valida el codigo SQL
	//execute sentencia recomendada preferible a la sentencia query
 ?> 