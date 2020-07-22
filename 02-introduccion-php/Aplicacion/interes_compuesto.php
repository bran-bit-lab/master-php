
<?php 

/*    
Este SCRIPT se encarga calcular el interes compuesto de un usuario
*/

$monto_inicial= 1000;
$tasa_interes= 0.05;
$numero_anios= 10;
$cantidad_depositada= 0;

for ( $contador= 1; $contador <= $numero_anios ; $contador++ ) { 

	/*Formula alternativa: $cantidad_depositada= $monto_inicial * pow( 1 + $tasa_interes, $contador );*/
	$taza_anual = 1 + $tasa_interes;
	$potencia= pow( $taza_anual, $contador );
	$cantidad_depositada= $monto_inicial * $potencia;
	

	echo "$contador \t";
	echo "$cantidad_depositada \n";
}

echo "\n";

$viñeta= "*";
	$espacio= " ";

	for ($aterisco1 = 0; $aterisco1 <= 21 ; $aterisco1++) { 
		
	for ($aterisco2 = 0; $aterisco2 <= 1 ; $aterisco2++) { 
		
		if (($aterisco1 == 4 && $aterisco2 == 0) || ($aterisco1 == 8 && $aterisco2 == 1) || ($aterisco1 == 13 && $aterisco2 == 0) || ($aterisco1 == 17 && $aterisco2 == 1) ){
			echo "\n";
			continue;
		}elseif ($aterisco2 == 0) {
			echo $espacio;
		}else{
			echo $viñeta;
		}
	

	}
	}



 ?>


<