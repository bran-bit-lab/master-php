<?php 
	
	// Generacion de una promesa desde el contructor de la api

	require_once '../vendor/autoload.php';
	
	use GuzzleHttp\Promise\Promise;

	$promise = new Promise(
		
		function() use ( &$promise ) {
			return $promise->resolve('Se ejecuto la promesa');
		},

		function() use ( &$promise ) {
			return $promise->reject('Se cancela la promesa');
		}
	);

	var_dump( $promise );

	$promise
		->then(
			function( $value ) {
				echo $value. PHP_EOL;
			},

			function( $error ) {
				echo $error. PHP_EOL;
			}
		);

	$promise->wait(); // estado pendiente y luego devuelve la promesa
