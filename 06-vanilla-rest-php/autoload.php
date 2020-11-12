<?php  

define( 'DS',  DIRECTORY_SEPARATOR );
define( 'PATH', __DIR__ );

function appAutoload( $className ) {

	$path = PATH.DS.str_replace( '\\', DS, $className ).'.php';

	// echo $path;

	if ( !file_exists( $path ) ) {
		echo 'No se pudo encontrar el archivo';
		die();
	}

	require_once $path;
}

spl_autoload_register('appAutoload');