<?php 

require_once '../vendor/autoload.php';

/*
	Promesas: concatenacion y ejemplos de uso:
	se pueden manipular los resultados de promesas mira el siguiente ejemplo

	Para transformar cualquier funcion en promesa ver: promise1.php
*/

use React\Promise\Deferred;

// =========================================
// ejemplo 1: concatenacion de promesas
// =========================================

$deferred1 = new Deferred();

$deferred1->promise()
  ->then( function ( $x ) {

    // $x será el valor pasado a $deferred->resolve()
    // y retornará *new promise* sumando $x + 1
    
    return $x + 1;
  })
  ->then( function ( $x ) {
    
    // $x === 2
    // este manejador recibe el valor de retorno del anterior
    
    return $x + 1;
  })
  ->then( function ( $x ) {
    
    // $x === 3
    // este manejador recibe el valor de retorno del anterior
    
    return $x + 1;
  })
  ->then( function ( $x ) {
    
    // $x === 4
   	// este manejador recibe el valor de retorno del anterior
    
    echo 'Resolve '. $x. PHP_EOL;
  });

$deferred1->resolve( 1 ); // Prints "Resolve 4"

// =================================================================
// ejemplo 2: manejo de excepciones then-throw-otherwise
// =================================================================

$deferred2 = new Deferred();

$deferred2->promise()
    ->then( function ($x) {
    		
  		// echo 'entrada'. $x.  PHP_EOL;

      throw new Exception( $x + 1 );
    })
    ->otherwise( function ( Exception $x ) {
        
      // Captura y propaga el rechazo de la promesa por el then
  		// echo 'primer exception '. $x->getMessage().  PHP_EOL;
      
      throw $x;
    })
    ->otherwise( function ( Exception $x ) {
        
      // Sigue propagando y causa otra excepción, sumando el resultado
  		// echo 'segunda exception '. $x->getMessage(). PHP_EOL;
      
      return React\Promise\reject( new Exception( $x->getMessage() + 1 ) );
    })
    ->otherwise( function ( $x ) {
        
      echo 'Reject '. $x->getMessage(). PHP_EOL;
    });

$deferred2->resolve( 1 );  // imprime "Reject 3"