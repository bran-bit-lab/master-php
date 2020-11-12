<?php 

namespace heroes\routes;

use heroes\clases\Heroe;

class HeroeRoutes extends Heroe {
	
	public function __construct() {
		
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		switch ( $requestMethod ) {
			
			case 'GET':
				
				if ( is_array( $this->getParamsRoute() ) ) {	
					
					$resp = $this->getParamsRoute();

					return $this->showJson( $resp['status'], $resp );
				
				} else if ( empty( $this->getParamsRoute() ) ) {

					$resp = $this->getAllHeroes();
					
					return $this->showJson( $resp['status'], $resp );
				
				} else {

					$resp = $this->getHeroe( $this->getParamsRoute() );
					
					return $this->showJson( $resp['status'], $resp );			
				} 
			

			case 'POST':

				/* 	
				*		https://www.php.net/manual/es/wrappers.php.php
				* 	php://  permite acceder a diferentes secciones y obtener recursos del servidor
				* 	php://input es un flujo de sólo lectura que permite leer datos del cuerpo de cualquier peticion.
				*/

				$body = json_decode( file_get_contents('php://input'), true );

				if ( !is_array( $body ) || empty( $this->validateBody( $body ) ) ) {
					
					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'carga de peticion incorrecta'
					]);
				}

				$resp = $this->createHeroe( $body );

				return $this->showJson( $resp['status'], $resp );	

			case 'PUT':

				$body = json_decode( file_get_contents('php://input'), true );

				if ( !is_array( $body ) || empty( $this->validateBody( $body ) ) ) {
					
					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'carga de peticion incorrecta'
					]);
				}

				// parametro de ruta 
				if ( empty( $this->getParamsRoute() ) ) {

					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'peticion incorrecta',
					]);
				}

				$resp = $this->updateHeroe( $this->getParamsRoute(), $body );
			
				return $this->showJson( $resp['status'], $resp );	

			case 'DELETE':

				if ( empty( $this->getParamsRoute() ) ) {
					
					return $this->showJson( '400 Bad Request', [
						'ok' => 'false',
						'error' => 'peticion incorrecta'
					]);

				}

				$resp = $this->deleteHeroe( $this->getParamsRoute() );
			
				return $this->showJson( $resp['status'], $resp );	
			
			default:

				return $this->showJson('404 Not Found', [
					'ok' => 'false',
					'error' => 'recurso no encontrado'
				]);
		}
	}
		
	private function getParamsRoute() {

		$params = $_SERVER['QUERY_STRING'];

		if ( empty( $params ) ) {
			return null;
		
		} else {

			list( $id, $value ) = explode( '=',  $params );
			
			if ( !filter_var( $value, FILTER_VALIDATE_INT ) || $value == 0 ) {
				return null;
			}
		
			return (int) $value;
		}

	}

	private function showJson( $status = '', $json = [] ) {

		header('Content-Type: application/json');
		header( 'HTTP/1.1 '. $status );

		echo json_encode( $json );
	}

	private function validateBody( $body = [] ) {

		if ( count( $body ) == 0 ) {
			return null;
		}

		foreach ( $body as $field ) {
			
			if ( !preg_match( '/^[A-Za-z0-9\s]+$/', $field ) ) {
				return null; 
			}
		}

		return $body;
	}
}

