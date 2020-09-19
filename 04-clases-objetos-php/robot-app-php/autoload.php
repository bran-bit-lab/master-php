<?php 

define( "load", dirname( __FILE__ ) );

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
	// $path = load . ds . $archivoClase . ".php" ;

<<<<<<< HEAD
			throw new Exception("No se encontro el archivo");
			die();
		}
	}
	spl_autoload_register("cargador");
=======
	$path = load.ds.str_replace( "\\", ds, $archivoClase ).'.php';
	
	//var_dump($path);
	
	if ( !file_exists( $path ) ) {
		throw new Exception( "No se encontro el archivo" );
	} 
	
	require_once $path;
}

spl_autoload_register( "cargador" );
>>>>>>> 9f2492581da3c36b026c8b09773f83c256d9da67
		
/*
	spl_autoload_register: funcion que se mantiene escuchando hasta que se utiliza el namespace y use, conocido por ser un escuchador de eventos
*/

	// cargador("Clases\\robot_model");	

/*
<<<<<<< HEAD
el primer bakslage(\) indica el primer espacio de linea
el segundo bakslage(\) implica el caracter para reemplazarlo
=======
	el primer backslash(\) indica el primer espae de linea
	el segundo backslash(\) implica el caracter para reemplazarlo
>>>>>>> 9f2492581da3c36b026c8b09773f83c256d9da67
*/

	//$path = str_replace("\\", ds, $path);






