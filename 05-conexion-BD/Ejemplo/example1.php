<?php 

/* 
	PRUEBA DE CONEXION A BASE DE DATOS 
	
	prueba de conexión a Base de Datos
	utitlizando heredando la clase PDO
	.
*/

class Database extends PDO {
	
	private $dsn = '';
	private $username = '';
	private $password = '';

	public function __construct( $filePath = './config/database.ini' ) {

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

	public function connect() {

		try {

			parent::__construct( $this->dsn, $this->username, $this->password );
			
			echo "Conectado con la BD con éxito\n";
			

		} catch ( PDOException $e ) {
			
			echo 'fallo la conexion: '. $e->getMessage();
			die();

		}
	}
}

$db = new Database();
$db->connect();

$db = null;  // para cerrar la conexion PDO debe ser usada al momento de finalizar la app. 

if ( empty( $db ) ) { 
	echo "conexion cerrada"; 
}