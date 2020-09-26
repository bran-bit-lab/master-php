<?php 

/* 
	PRUEBA DE CONEXION A BASE DE DATOS 
	
	prueba de conexión a Base de Datos
	utitlizando clase PDO como objeto de conexion
	.
*/

class Database {
	
	private $dsn = '';
	private $username = '';
	private $password = '';
	private $objConn = null;

	public function __construct( $filePath = './config/database.ini' ) {

		echo "Constructor de la clase Database \n";

		if ( !$settings = parse_ini_file( $filePath, true ) ) {
			
			throw new Exception( "Error al procesar el archivo", 1 );
			die();

		} 

		// formato dsn: mysql:dbname=testdb;host=127.0.0.1
		// var_dump( $settings );

		$dsn = $settings['mysql']['driver']. ':';
		$dsn .= 'dbname:'. $settings['mysql']['database']. ';';
		$dsn .= 'host:'. $settings['mysql']['host']. ';';
		$dsn .= ( !empty( $settings['mysql']['port'] ) ) ? ( 'port='. $settings['mysql']['port']. ';' ) :
			( '' );

		$this->dsn = $dsn;
		$this->username = $settings['mysql']['username'];
		$this->password = $settings['mysql']['password'];
	}

	// destructor de la clase, cierra la conexion
	public function __destruct() {

		echo "Destructor de la clase Database \n";

		$this->objConn = null;
	}

	public function connect() {

		try {

			$this->objConn = new PDO( $this->dsn, $this->username, $this->password );
			
			echo "Conectado con la BD con éxito\n";
			

		} catch ( PDOException $e ) {
			
			echo 'fallo la conexion: '. $e->getMessage();
			
			die();

		}
	}
}

$db = new Database();
$db->connect();