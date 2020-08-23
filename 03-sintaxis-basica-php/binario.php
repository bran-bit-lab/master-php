<?php  

	// inclusion de archivos a codigo php, otra opcion para llamar el archivo es usando require

	include "./array_ascii.php";  

	// Funciones de string a binario

	function separarLetras( $palabra= "" ){

		$patron= '/^[A-Za-z]+$/';

		if ( preg_match( $patron, $palabra ) > 0 ) {

			// echo strlen( $palabra ); Para obtener longitud del texto
			// echo substr( $palabra, 1, 1 ); Para obtener un valor especifico del texto
			
			for ($contador=0; $contador < strlen( $palabra ); $contador++) { 
				
				// echo substr($palabra, $contador, 1) . "\n"; Imprimir letra especifico del texto
				
				$letra= substr( $palabra, $contador, 1 );
				conversionBinaria( $letra );
			}
			
			// conversionBinaria("e");
		
		} else {

			echo "El valor introducido no es una palabra\n";
		}
		
	}

	function conversionBinaria( $letra ){

		// global para usar varaiable del array ascii dentro de la funcion

		global $arrayAscii;
		global $binario;
		
		$string = "";

		foreach ( $arrayAscii as $clave => $valor ) {
			
			if ($clave == $letra) {
				
				while ($valor > 1) {
					$numero= $valor % 2;
					$string= $string. $numero;
					$valor= $valor / 2;
				}

				// bucle inverso para obtener el binario

				$contador = strlen( $string ) - 1; 

				while ($contador >= 0){
					$binario .= substr( $string, $contador, 1);
					
					if ($contador == 0) {
						$binario.= " ";
					}

					$contador--;
				}
				
				// sale del bucle

				break; 
			}
		}
	}


	// Funciones de binario a string

	function binarioaDecimal($valorBinario){

		$exponente= 0;
		$valor= 0;

		for ($contador= strlen( $valorBinario ) -1; $contador >= 0; $contador--) { 
			
			$digito = (int) substr($valorBinario, $contador, 1);

			if ($digito == 1) {
				$valor= $valor + ( pow(2, $exponente) );
			}
			
			$exponente++;	
		}
		
		return $valor;
	}

	function separarBinario( $valorBinario= "" ){
		
		global $arrayAscii;
		global $palabra;

		// Variable en la que se definen expresiones regulares
		$patron = "/^[0-1]+$/";

		if ( preg_match($patron, $valorBinario) > 0 ) {
    		
    		// Si llega aqui el valor es binario
			
			for ($contador=0; $contador < strlen($valorBinario); $contador += 7  ) { 
				
				$seccionBinaria= substr($valorBinario, $contador, 7);

				$decimal= binarioaDecimal($seccionBinaria);

				foreach ( $arrayAscii as $clave => $valor) {
					
					if ($decimal == $valor) {
						
						$palabra.= $clave;
						break;
					}
				}	
			}

		} else {
    		echo "El valor no es binario válido\n";

		}
	}

	// Main.php

	$app = true; // valor bucle centinela

	echo "Bienvenido a la calculadora binaria \n";

	do {

		echo "¿Que desea convertir? \n";
		echo "1.- Convertir a binario \n";
		echo "2.- Convertir de binario a caracter \n";
		echo "3.- Salir \n\n";

		// se setean los valores
		$binario= "";
		$option= 0;
		$palabra = "";

		$opcion= (int) readline("Ingrese el número de la opcion: ");

		switch ($opcion) {

		    case 1:
		    	$palabra= readline("Ingrese la palabra: ");
		        separarLetras( $palabra );
		        echo "el binario generado es: $binario \n\n";
		        break;

		    case 2:
		    	$valorBinario= readline("Ingrese el codigo binario: ");
		    	separarBinario( $valorBinario );
		    	echo "La palabra generada es: $palabra \n\n";
		        break;

		    case 3:
		    	// cierre del app.
		    	$app = false;
		    	break;

	    	default:
	    		echo "La opcion no es valida\n\n";
				break;
		}	

	} while ( $app );
	
?>