<?php

namespace mysql;

use PDO;

use Exception;
use PDOException;


class MySQL {

	private $dsn = '';
	private $userName = '';
	private $password = '';

	public function __construct( $path = './server/connection.ini' ) {

		// manejo de excepciones try-catch: https://www.php.net/manual/es/language.exceptions.php

		try {

			if ( !file_exists( $path ) ) {
				throw new Exception("no se pudo encontrar el archivo de configuracion", 1);
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
			
			echo "Error " .$error->getMessage();
			die();
		}

	}

	private function connect() {
	}

	public function executeQuery() {
	}
}
