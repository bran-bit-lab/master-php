<?php 

//Funciones para realizar calculos

function suma( $numero1, $numero2 ){
	return $numero1 + $numero2;
}

function resta( $numero1, $numero2 ){
	return $numero1 - $numero2;
}

function multiplicar( $numero1, $numero2 ){
	return  $numero1 * $numero2;
}

function dividir( $numero1, $numero2){

	if ($numero2 <= 0) {
		return "<b style='color:red'>No se puede realizar la operacion</b>";
	}else{
		return  $numero1 / $numero2; 
	}

}


if ( isset($_GET['numero1']) && isset($_GET['numero2']) ) {
	$numero1= (int) $_GET['numero1'];
	$numero2= (int) $_GET['numero2'];
}


 echo suma($numero1,$numero2) . "<br/>";

 echo resta($numero1,$numero2) . "<br/>";
	
 echo multiplicar($numero1,$numero2) . "<br/>";

 echo dividir($numero1,$numero2);


 ?>