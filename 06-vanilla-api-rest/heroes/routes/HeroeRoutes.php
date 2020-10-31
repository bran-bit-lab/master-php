<?php 

namespace heroes\routes;

use heroes\clases\Heroe;

// herencia de clases
class HeroeRoutes extends Heroe {

	public function __construct() {
		
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		if ( $requestMethod == 'GET' ) {
			echo "peticion get";
			return;
		}

		if ( $requestMethod == 'POST' ) {
			echo "peticion post";
			return;
		}

		if ( $requestMethod == 'PUT' ) {
			echo "peticion put";
			return;
		}

		if ( $requestMethod == 'DELETE' ) {
			echo "peticion delete";
			return;
		}

		// En caso de que ninguna de las opciones anteriores se haya ejecutado
		header("HTTP/1.1 400 Bad Request");
	}
}

