<?php 

	define( "load", dirname( __FILE__ ) );

	define( "ds", DIRECTORY_SEPARATOR );
		
	// funciones asincronas
	function cargador( $archivoClase ){
		
	$path = load.ds.str_replace( "\\", ds, $archivoClase ).'.php';
		
		var_dump($path);
		
		if ( !file_exists( $path ) ) {
			throw new Exception( "No se encontro el archivo" );
		} 
		
		require_once $path;
	}

	spl_autoload_register( "cargador" );


 ?>