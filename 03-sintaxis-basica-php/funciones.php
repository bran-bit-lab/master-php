<?php 

function muestra_nombres(){

	echo "Brandon <br/>";
	echo "Brian <br/>";
	echo "Juan Carlos <br/>";

}

/*
muestra_nombres();

muestra_nombres();

muestra_nombres();
*/


function tabla($numero){

	echo "<h3> tabla del numero $numero </h3>";

	for ($multiplicador=1; $multiplicador <= 10 ; $multiplicador++) { 
		$resultado= $numero * $multiplicador;
		echo "$numero * $multiplicador = $resultado <br/>";
}
}
/*	
	tabla(5);
	tabla(10);

*/

/* if (isset($_GET['numero'])){

	// var_dump($_GET);
	echo $_GET['numero2'];

}else{

	echo "Ingrese un numero por a url";

}*/


if (isset($_GET['numero'])) {
	// En este ejemplo se esta parseando el valor de un string a un integrer
	$num= (int) $_GET['numero'];
	//var_dump($num);
	tabla($num);
}







 ?>