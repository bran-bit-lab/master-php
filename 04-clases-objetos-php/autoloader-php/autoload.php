<?php 

/*
	CARGADOR DE CLASES DINAMICO AUTOLOADER

	este script se encarga de cargar las clases dentro de 
	un directorio espcedificado cada vez que haya una instanciacion
	de clase. es mucho mas limpio que usar include o require

*/

define( 'ROOT', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );

class Autoloader {

	public static function classLoader( $className ) {

		$path = ROOT.DS.str_replace( "\\", DS, $className ).'.php';

		// var_dump( file_exists( $path ), $path ); verificacion

		if ( !file_exists( $path ) ) {
			throw new Exception("Error al crear clase ". $className );
		}

		require_once $path;
	}
}

spl_autoload_register( 'Autoloader::classLoader' );	