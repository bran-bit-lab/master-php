<?php 

function factorial($contadorFactorial){
	
	$numeroFactorial= 1;
		
	while ( $contadorFactorial >= 1 ) {
		$numeroFactorial= $contadorFactorial * $numeroFactorial;
	
		$contadorFactorial--;
	}
	
	return $numeroFactorial;
}

	//Funcion para obtener el valor de Euler

function eulier(){
	
	$limite= 10;
	$contadorEulier= 1;
	
	while ( $contadorEulier <= $limite ) {
		
		if ($contadorEulier == 1) {
			$numeroEulier= 1 + ( 1/ factorial( $contadorEulier ) );	
			
		} else {
			$numeroEulier= $numeroEulier + ( 1/ factorial( $contadorEulier ) );
		}
		
		$contadorEulier++;
	}
	
	return $numeroEulier;
}


	//Funcion para Euler de potencia

function eulierElevado(){
	
	$limite= (int) $_GET['numero'];
	$contadorEulier= 1;
	
	while ( $contadorEulier <= $limite ) {
		
		if ($contadorEulier == 1) {
			$eulierElevado= 1 + ( $limite/ factorial( $contadorEulier ) );	
		
		} else {
			$eulierElevado= $eulierElevado + pow( ( $limite / factorial( $contadorEulier ) ), $contadorEulier );
		}
		
		$contadorEulier++;
	}
	
	return $eulierElevado;
}

// ambito global se ejecuta de forma automatica al cargar la pagina
if ( isset($_GET['numero']) ){
 	echo "el valor de euler elevado es: ". eulierElevado() . "<br />";
 	echo "el valor de euler es: ". eulier() . "<br />";
} else {
	echo "<b>Introducir dato por la URL</b>";
}
 

?>