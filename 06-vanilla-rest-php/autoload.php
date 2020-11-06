<?php  

define( 'DS',  DIRECTORY_SEPARATOR );
define( 'PATH', __DIR__ );

function appAutoload( $className ) {

	$path = PATH.DS.str_replace( '\\', DS, $className ).'.php';

	// echo $path;

	if ( !file_exists( $path ) ) {
		throw new Exception('No se pudo encontrar el archivo');
	}

	require_once $path;
}

spl_autoload_register('appAutoload');