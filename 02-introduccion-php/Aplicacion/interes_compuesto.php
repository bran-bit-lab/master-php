
<?php 

/*    
Este SCRIPT se encarga calcular el interes compuesto de un usuario
*/

$monto_inicial= 1000;
$tasa_interes= 0.05;
$numero_anios= 10;
$cantidad_depositada= 0;

for ( $contador= 1; $contador <= $numero_anios ; $contador++ ) { 

	/*$cantidad_depositada= $monto_inicial * pow( 1 + $tasa_interes, $contador );*/
	$taza_anual = 1 + $tasa_interes;
	$potencia= pow( $taza_anual, $contador );
	$cantidad_depositada= $monto_inicial * $potencia;
	

	echo "$contador \t";
	echo "$cantidad_depositada \n";
}

 ?>


<