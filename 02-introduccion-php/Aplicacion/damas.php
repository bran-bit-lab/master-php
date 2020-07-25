<?php  

	for ( $fila = 1; $fila <= 10 ; $fila++ ) { 
		
		for ( $columna = 1; $columna <= 10 ; $columna++ ) {  
			
			if ( $fila % 2 != 0 ) {

				echo "*";
				echo " ";

			} else {

				echo " ";
				echo "*";
			}

		}

		echo "\n";
	}

?>