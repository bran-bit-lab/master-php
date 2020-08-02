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
	
	tabla(5,3);
	//tabla(10);



/*
 if (isset($_GET['numero'])){

	// var_dump($_GET);
	echo $_GET['numero'];

}else{

	echo "Ingrese un numero por la url";

}
*/
//Ejm de arreglo diccionario e introduccion de 2 parametros por la URL

var_dump( $_GET );
echo "<br/>";
var_dump($_GET['numero1']);
echo "<br/>";
var_dump($_GET['numero2']);
echo "<br/>";

$numero1= $_GET['numero1'];
$numero2= $_GET['numero2'];

echo $numero1 . "<br/>";

echo $numero2;

if (isset($_GET['numero1'])&isset($_GET['numero2'])) {
	// En este ejemplo se esta parseando el valor de un string a un integrer
	$numero1= (int) $_GET['numero1'];
	$numero2= (int) $_GET['numero2'];
	echo "<br>";
	var_dump($numero2);
	}

	
	//var_dump($numero1);
	//tabla($num);

 ?>