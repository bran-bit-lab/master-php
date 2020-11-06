<?php 

namespace heroes\routes;

use heroes\clases\Heroe;
use mysql\MySQL;

// herencia de clases
class HeroeRoutes extends Heroe {

	public function __construct() {
		
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		$mysql = new MySQL();

		switch ( $requestMethod ) {
			
			case 'GET':
				
				if ( empty( $this->getParams() ) ) {
				
					return $this->showJson( '200 OK', [
						'ok' => 'true',
						'heroes' => []
					]);
				}
			
				return $this->showJson( '200 OK', [
					'ok' => 'true',
					'heroe' => ( int ) $this->getParams()
				]);


			case 'POST':

				/* 	
				*		https://www.php.net/manual/es/wrappers.php.php
				* 	php://  permite acceder a diferentes secciones y obtener recursos del servidor
				* 	php://input es un flujo de sólo lectura que permite leer datos del cuerpo de cualquier peticion.
				*/

				$body = json_decode( file_get_contents('php://input'), true );

				
				if ( !is_array( $body ) ) {
					
					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'peticion incorrecta'
					]);
				}


				$mysql->executeQuery();


				return $this->showJson('201 Created', [
					'ok' => 'true',
					'heroe' => $body
				]);


			case 'PUT':
				
				if ( empty( $this->getParams() ) ) {

					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'peticion incorrecta'
					]);
				}
			
				return $this->showJson( '200 OK', [
					'ok' => 'true',
					'heroe' => ( int ) $this->getParams()
				]);

			case 'DELETE':
			
				if ( empty( $this->getParams() ) ) {
					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'peticion incorrecta'
					]);
				}

				return $this->showJson( '200 OK', [
					'ok' => 'true',
					'heroe' => ( int ) $this->getParams()
				]);
			
			default:

				return $this->showJson('404 Not Found', [
					'ok' => 'false',
					'error' => 'recurso no encontrado'
				]);
		}
	}
		

	private function getParams() {

		$params = $_SERVER['QUERY_STRING'];

		if ( empty( $params ) ) {
			return null;
		
		} else {

			list( $id, $value ) = explode( '=',  $params );
			
			if ( !filter_var( $value, FILTER_VALIDATE_INT ) ) {
				return null;
			}

			if ( $value == 0 ) {
				return null;
			}
			
			return $value;
		}

	}

	private function showJson( $status = '', $json = [] ) {

		header('Content-Type: application/json');
		header( 'HTTP/1.1 '. $status );

		echo json_encode( $json );
	}
}

