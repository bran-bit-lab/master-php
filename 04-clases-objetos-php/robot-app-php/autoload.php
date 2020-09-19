<?php 

define("load", dirname(__FILE__));

define("ds", DIRECTORY_SEPARATOR);
	
//funciones asincronas
	function cargador ($archivoClase){
		
		$path = load . ds . $archivoClase . ".php" ;
		//var_dump($path);
		
		if (file_exists($path)) {
			require_once $path;
		
		} else {

			throw new Exception("No se encontro el archivo");
			die();
		}
	}
	spl_autoload_register("cargador");
		
/*spl_autoload_register: funcion que se mantiene escuchando hasta que se utiliza el namespace y use, conocido por ser un escuchador de eventos
*/
	//cargador("Clases\\robot_model");	

/*
el primer bakslage(\) indica el primer espacio de linea
el segundo bakslage(\) implica el caracter para reemplazarlo
*/
	//$path = str_replace("\\", ds, $path);






