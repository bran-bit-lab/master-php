<?php  

	include "./array_ascii.php";  //inclusion de archivos a codigo php, otra opcion para llamar el archivo es usando require

	function separarLetras( $palabra= "" ){
		
		//echo strlen( $palabra ); Para obtener longitud del texto
		//echo substr( $palabra, 1, 1 ); Para obtener un valor especifico del texto
		
		for ($contador=0; $contador < strlen( $palabra ); $contador++) { 
			
			//echo substr($palabra, $contador, 1) . "\n"; Imprimir valor especifico del texto
			
			$letra= substr($palabra, $contador, 1);
			conversionBinaria($letra);
		}
		 //conversionBinaria("e");
	}

	function conversionBinaria( $letra ){

		//global para usar varaiable del array ascii dentro de la funcion
		
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

				//bucle inverso para obtener el binario
				
				$contador = strlen( $string ) - 1; 

				while ($contador >= 0){
					$binario .= substr( $string, $contador, 1);
					if ($contador == 0) {
						$binario.= " ";
					}

					$contador--;
				}
				break;
			}
		}
	}

	
	echo "Bienvenido a la calculadora binaria \n";

	echo "¿Que desea convertir? \n";

	echo "1-Convertir a binario \n";

	echo "2-Convertir de binario a caracter \n";

	$opcion= (int) readline("Ingrese una opcion: ");

	$binario= "";
	
	switch ($opcion) {
	    case 1:
	    	$palabra= readline("Ingrese la palabra: ");
	        separarLetras ($palabra);
	        echo "$binario" . "\n";
	        break;
	    case 2:
	        echo "De binario a caracter";
	        break;
    	default:
    		echo "La opcion no es valida";
			break;
	}	


	
	

?>