<?php 



function suma($numero,$number){
	
	$numero= $_GET['numero1'];
	$number= $_GET['numero2'];
	
	if (isset($_GET['numero1'])&isset($_GET['numero2'])) {
	
	$numero= (int) $_GET['numero1'];
	$number= (int) $_GET['numero2'];
	echo "<br>";
	}
	return $numero+$number;
}






	
	//var_dump($numero1);


 ?>