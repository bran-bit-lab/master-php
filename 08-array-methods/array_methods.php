<?php  

function cube( $number ) {
	return $number * 2;
}

function isImpar( $number ) {
	return $number % 2 != 0;
}

function reduceNull( $accum, $item ) {

	if ( $item != null ) {
		return array_merge( $accum, [ $item ] );
	}

	return $accum;
}

$values = [ 2, 20, 30, 78, 27, 101 ];

$valuesReduce = [ null, 1, 22, 'hola', null, [], 'prueba', null ];

// map transofma el valor en un nuevo array
$result = array_map( 'cube',  $values );

// filter permite filtrar elementos en un nuevo array
$resultFilter = array_filter( $values, 'isImpar' );

// merge une uno o mas arrays pasados por parametros
$combine = array_merge( $result, $resultFilter );

// reverse devuelve el array en orden inverso
$reverse = array_reverse( $combine );

// reduce: devuelve un array usando una unica funcion reductora
$reduceArray = array_reduce( $valuesReduce, 'reduceNull', [] );

print_r( $resultFilter );

print_r( $result );

print_r( $combine );

print_r( $reverse );

print_r( $reduceArray );