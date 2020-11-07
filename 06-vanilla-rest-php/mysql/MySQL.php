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

		// manejo de excepciones try-catch: https://www.php.net/manual/es/language.exceptions.php

		if ( !file_exists( $path ) ) {
			echo "no se pudo encontrar el archivo de configuracion";
			die();
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
	}

	public function connect() {

		try {
			$this->bd = new PDO( $this->dsn, $this->username, $this->password );
			return true;

		} catch ( PDOException $error ) {	
			return false;
		}
	}

	public function executeQuery( $sql, $selectAll = false ) {

		$con = $this->connect();

		if ( !$con ) {
			return [
				'ok' => 'false',
				'error' => 'error en conexion de BD',
				'status' => 500
			];
		}

		$resp = $this->bd->prepare( $sql );

		if ( !$resp ) {
			return [
				'ok' => 'false',
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		if ( $selectAll ) {
			$resp->setFetchMode( PDO::FETCH_ASSOC );
		}

		$resp->execute();
		return $resp;
	}

	public function __destruct() {
		unset( $this->bd );
	}
}
