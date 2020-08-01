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


function tabla($numero,$number){

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

/*
 if (isset($_GET['numero'])){

	// var_dump($_GET);
	echo $_GET['numero'];

}else{

	echo "Ingrese un numero por la url";

}
*/
//arreglo diccionario

var_dump( $_GET );
echo "<br>";
var_dump($_GET['numero1']);
echo "<br>";
var_dump($_GET['numero2']);
echo "<br>";



/*if (isset($_GET['numero1']['numero2'])) {
	// En este ejemplo se esta parseando el valor de un string a un integrer
	var_dump($_GET['numero1'])
}*/
	//$num= (int) $_GET['numero']['number'];
	//var_dump($num);
	//tabla($num);

 ?>