<?php 

//Obtener el factorial de un numero por la URL
function factorial(){
	
	$resultado= 1;
	$contador= (int) $_GET['numero'];
	
	while ( $contador >= 1 ) {
		$resultado= $contador * $resultado;
	
		$contador--;
	}
	
	return $resultado;

}

if ( isset($_GET['numero']) ){
 	echo "el factorial del número es: ". factorial();
}else{
	echo "<b>Introducir dato por la URL</b>";
}
 



 ?>