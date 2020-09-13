<?php 

define( "load", dirname(__FILE__) );

define( "ds", DIRECTORY_SEPARATOR );
	
//funciones asincronas
function cargador( $archivoClase ){
	
	/* 	
		En los sistemas UNIX-LINUX los PATH vienen de esta forma: 
	 	/var/www/html/master-php/04-clases-objetos-php/autoloader-php
	 	reemplazar el $path con: 

		$path = load.ds.str_replace( "\\", DS, $className ).'.php';
		
		cambia el path de la siguiente forma
		\var\www\html\master-php\04-clases-objetos-php\autoloader-php

	*/


	// Windows MS-DOS
	$path = load . ds . $archivoClase . ".php" ;
	
	//var_dump($path);
	
	if ( file_exists($path) ) {
		require_once $path;
	
	} else {
		throw new Exception( "No se encontro el archivo" );
		die();
	}
}

spl_autoload_register( "cargador" );
		
/*
	spl_autoload_register: funcion que se mantiene escuchando hasta que se utiliza el namespace y use, conocido por ser un escuchador de eventos
*/

	// cargador("Clases\\robot_model");	

/*
	el primer backslash(\) indica el primer espae de linea
	el segundo backslash(\) implica el caracter para reemplazarlo
*/

	//$path = str_replace("\\", ds, $path);






