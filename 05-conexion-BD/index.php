<?php 
	
	require_once 'autoload-Bd.php';

	use MisClases\Bd;

	//use PDO;

	$bdNew= new Bd;
	
	$bdNew->insertarDatos();

	/*
	Para cargar el autoload el archivo debe tener el mismo nombre de la clase como tambien el directorio
	debe tener el mismo nombre que los namespace
	*/


 ?>