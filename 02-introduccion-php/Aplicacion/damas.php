<?php 

for ($fila=1; $fila <=8 ; $fila++) { 

	for ($columna=1; $columna <=8 ; $columna++) { 

		// % permite validar si un numero es par o no 

		if ($fila % 2 == 0)  {
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