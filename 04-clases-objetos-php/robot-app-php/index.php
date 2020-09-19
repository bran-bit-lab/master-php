<?php 

	require_once "autoload.php";

	use Clases\Robot;
	
	$robot = new Robot;
	
	echo $robot->encender();

	echo $robot->avanzar();
	
	echo $robot->girar("izq");

	echo $robot->retroceder();

	$robot->setGenerarTraza();
	echo $robot->getGenerarTraza();
 	
 	echo $robot->getestadodelrobot();
 ?>