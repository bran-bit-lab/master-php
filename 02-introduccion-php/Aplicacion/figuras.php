<?php  

	function primerTriagulo() {

		$contador = 1;

		for ( $fila = 1; $fila <= 10; $fila++ ) {  

			for ( $asteriscos = 1; $asteriscos <= $contador; $asteriscos++ ) {  
				echo "*";
			}

			for ( $espacios = 10; $espacios >= $contador; $espacios-- ) {
				echo " ";
			}

			echo "\n";
			$contador++;
		}
	}

	function segundoTriangulo() {

		$contador = 1;

		for ( $fila = 1; $fila <= 10; $fila++ ) {  

			for ( $asteriscos = 1; $asteriscos <= $contador; $asteriscos++ ) {  
				echo " ";
			}

			for ( $espacios = 10; $espacios >= $contador; $espacios-- ) {
				echo "*";
			}

			echo "\n";
			$contador++;
		}
	}

	function tercerTriangulo() {

		$contador = 1;

		for ( $fila = 1; $fila <= 10; $fila++ ) {  

			for ( $asteriscos = 10; $asteriscos >= $contador; $asteriscos-- ) {  
				echo "*";
			}

			for ( $espacios = 1; $espacios <= $contador; $espacios++ ) {
				echo " ";
			}

			echo "\n";
			$contador++;
		}
	}

	function cuartoTriangulo() {

		$contador = 1;

		for ( $fila = 1; $fila <= 10; $fila++ ) {  

			for ( $asteriscos = 10; $asteriscos >= $contador; $asteriscos-- ) {  
				echo " ";
			}

			for ( $espacios = 1; $espacios <= $contador; $espacios++ ) {
				echo "*";
			}

			echo "\n";
			$contador++;
		}
	}

	primerTriagulo();
	echo "\n";
	segundoTriangulo();
	echo "\n";
	tercerTriangulo();
	echo "\n";
	cuartoTriangulo();
	echo "\n";
?>