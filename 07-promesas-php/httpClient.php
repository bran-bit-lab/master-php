<?php 

/*
	Este es un script que realiza peticiones HTTP desde el lado del 
	servidor.

	El objetivo de las promesas es integrar procesos asincronos de 
	consulta y ejecutar en paralelo aplicaciones sin perder el 
	ritmo de la aplcacion.

	El siguiente ejemplo permite la utilizacion 
	de una libreria clientes para consultar api con php.

	puede ser utilizada para consultar cualquier api a nivel mundial.

	documentación: https://docs.guzzlephp.org/en/stable/
*/

require_once 'vendor/autoload.php';

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Psr7\Request;
use \GuzzleHttp\Psr7\Response;

$httpClient = new Client();

// ===============================================
// 	ejemplo 1; petición sincrona usando try-catch
// ===============================================

try {	
	
	$response = $httpClient->request('GET', 'https://randomuser.me/api/');
	
	echo $response->getStatusCode(). PHP_EOL;
	echo $response->getHeaderLine('content-type').  PHP_EOL;

	echo $response->getBody().  PHP_EOL;

} catch ( RequestException $error ) {

	echo Psr7\Message::toString( $error->getRequest() ). PHP_EOL;
	echo Psr7\Message::toString( $error->getResponse() ).  PHP_EOL;
}

// ===============================================
// 	ejemplo 2; petición asincrona usando promesas
// ===============================================

$request = new Request('GET', 'https://randomuser.me/api/');

$promise = $httpClient->sendAsync( $request )
	->then(
		
		//maneja la informacion durante la consulta 
		function( Response $response ) {
			
			echo $response->getStatusCode(). PHP_EOL;
			echo $response->getHeaderLine('content-type').  PHP_EOL;
			echo $response->getBody(). PHP_EOL;
		}
	)
	->otherwise(

		// maneja los errores ocurridos durante la consulta en caso de fallar
		function ( $error ) {
			echo $error->getMessage(). PHP_EOL;
		}
	);

$promise->wait(); // ejecuta la promesa