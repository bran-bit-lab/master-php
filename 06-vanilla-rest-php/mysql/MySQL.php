<?php

namespace mysql;

use PDO;

use Exception;
use PDOException;

class MySQL {

	private $dsn = '';
	private $username = '';
	private $password = '';
	private $bd = null;

	public function __construct( $path = './server/connection.ini' ) {

		try {
			
			if ( !file_exists( $path ) ) {
				throw new Exception("No se pudo encontrar el archivo de configuracion", 1);	
			}

			$settings = parse_ini_file( $path, true );

			$dsn = $settings['mysql']['driver']. ':';
			$dsn .= 'dbname:'. $settings['mysql']['database']. ';';
			$dsn .= 'host:'. $settings['mysql']['host']. ';';

			$dsn .= ( !empty( $settings['mysql']['port'] ) ) ? ( 'port='. $settings['mysql']['port']. ';' ) :
				( '' );

			$this->dsn = $dsn;
			$this->username = $settings['mysql']['username'];
			$this->password = $settings['mysql']['password'];

		} catch ( Exception $error ) {
			
			echo $error->getMessage();
			die();
		}
	}

	private function connect() {
		
		// manejo de excepciones try-catch: https://www.php.net/manual/es/language.exceptions.php

		try {
			$this->bd = new PDO( $this->dsn, $this->username, $this->password );
			return true;

		} catch ( PDOException $error ) {	
			return false;

		}
	}

	// funciones estaticas
	public static function executeQuery( $sql = '' ) {

		$mysql = new MySQL();

		if ( !$mysql->connect() ) {
			return false;
		}

		$resp = $mysql->bd->prepare( $sql );
		$resp->setFetchMode( PDO::FETCH_ASSOC );
		
		if ( !$resp ) {
			return false;
		}

		$resp->execute();
		
		return $resp;
	}

	public static function executeQueryParams( $sql = '', $params = [] ) {

		$mysql = new MySQL();

		if ( !$mysql->connect() ) {
			return false;
		}

		$resp = $mysql->bd->prepare( $sql );
		$resp->setFetchMode( PDO::FETCH_ASSOC );
		
		if ( !$resp ) {
			return false;
		}

		$resp->execute( $params );
		
		return $resp;	
	}

	public function __destruct() {
		unset( $this->bd );
	}
}
