<?php  
	
	/*
		
		Las promesas son estados de procesos de ejecucion
		en donde se pueden ejecutar de una forma asincrona
		
		Una promesa posee 3 estados:

		pendient: es el estado de ejecucion de la promesa no
		devuelve ningun valor

		resolve: es el estado donde la promesa se resuelve con 
		exito

		reject: es el estado donde la promesa falla.

	*/

	
	// se cargan las librerias de composer	
	require_once '../vendor/autoload.php';
	
	use GuzzleHttp\Promise\Promise;
	
	function getName( $name, $promise ) {
		!empty( $name ) ? $promise->resolve( $name ) : $promise->reject('Nombre no valido');
	}

	$promise1 = new Promise();

	$promise1
		->then( 
			
			// ejecucion exitosa (resolve)
			function( $value ) {
				return 'Hola, '. $value. PHP_EOL;
			},

			// falla la ejecucion (reject)
			function( $error ) {
				return $error. PHP_EOL;
			}
		)
		
		->then( 
			function( $value ) {
				echo $value;
			}
		);

	getName( 'Gabriel', $promise1 );


