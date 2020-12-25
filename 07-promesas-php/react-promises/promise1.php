<?php 
	
/*
	react/promise: info: https://packagist.org/packages/react/promise
	
	Es una ligera implementacion de las promesas que utiliza JavaScript CommonJS 
	en el lado del servidor usando PHP,

	¿Como se compone una promesa?

	( ATENCION: ) la estructura principal de las promesas en JavaScript se compone principalmente por;

	Diferido:

	Un diferido representa un cálculo o una unidad de trabajo que puede no haberse completado todavía. Normalmente (pero no siempre), ese cálculo será algo que se ejecuta de forma asincrónica y se completa en algún momento en el futuro.

	Promesa: 

	Mientras que un diferido representa el cálculo en sí, un Promise representa el resultado de ese cálculo. Por lo tanto, cada aplazado tiene una promesa que actúa como marcador de posición para su resultado real.
*/

require_once '../vendor/autoload.php';

use React\Promise\Deferred;

$name = readline('Ingresa tu nombre: ');

/*	
	1.- Diferidos se crea el diferido de computacion para almacenar los resultados de las promesas
 	y asignaciones a funciones
 	
 	$deferred = new Deferred();

 	Las promesas se hallan dentro de los diferidos
 	
 	$promise1 = $deferred->promise();
 	$promise2 = $deferred->promise();
 	var_dump( $promise1, $promise2 );

	El objetivo del diferido es transformar la funcion en una 
	promesa.

	Una funcion se puede transformar en una promesa.
	Observa el siguiente ejemplo

*/

function validateName( $name = '' ) {
	
	$difered = new Deferred();

	if ( empty( $name ) ) {
		$difered->reject('El nombre esta vacío');
	
	} elseif ( !empty( $name ) && preg_match( '/^[A-Za-z\s]+$/', $name ) < 1 ) {
		$difered->reject('El nombre debe contener carateres alfabeticos');

	} else {
		$difered->resolve( $name );

	}

	return $difered->promise();
} 

/*
	2.-Promesa: Mientras que un diferido representa el cálculo en sí, un Promise representa el resultado de ese cálculo. Por lo tanto, cada aplazado tiene una promesa que actúa como marcador de posición para su resultado real.

	Se compone de 2 funciones por establecidos por el resolve o reject del difered. 
*/

validateName( $name )
	->then(

		// $value será el valor pasado a $deferred->resolve()
		function( $value ) {
			echo 'Hola, '. $value. PHP_EOL;
		},

		// $error será el valor pasado a $deferred->reject()
		function ( $error ) {
			echo $error. PHP_EOL;
		}
	);
