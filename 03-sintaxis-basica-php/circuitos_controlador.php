<?php


	// Modelos vista controlador

	function calcularOhms(){

		$resistenciaR1= (float) $_GET['resistenciaR1'];
		$resistenciaR2= (float) $_GET['resistenciaR2'];
		$resistenciaR3= (float) $_GET['resistenciaR3'];
		
		$rT= ($resistenciaR1 + $resistenciaR2 + $resistenciaR3);

		return $rT;
	}

	function calcularVolts(){

		$voltageR1= (float) $_GET['voltageR1'];
		$voltageR2= (float) $_GET['voltageR2'];
		$voltageR3= (float) $_GET['voltageR3'];
		
		$vT= ($voltageR1 + $voltageR2 + $voltageR3);

		return $vT;
	}

	// Calculo de resistencia total
	// Controlador

	$rT = 0.0;
	$vT = 0.0;
	$iT = 0.0;

	if ( count( $_GET ) > 0 ) {

		if (!empty($_GET['resistenciaR1']) && !empty($_GET['resistenciaR2']) && !empty($_GET['resistenciaR3'])) {
			$rT = calcularOhms();				
		}

		if (!empty($_GET['voltageR1']) && !empty($_GET['voltageR2']) && !empty($_GET['voltageR3'])) {

			$vT = calcularVolts();
		} 

		if ($rT <= 0) {
			$iT = $vT;
		}else{
			$iT =  $vT / $rT;
		}

		if ( isset($_GET['intensidadTotal']) ){
			echo "intensidad Total";
		}

	} else {
		echo "fuerza electromotriz (fem)";
	}

	//Renderizado de php-html, contenido dinamico, modelo vista controlador

	$htmlOhms = '<input type="text" name="resistenciaTotal" value="' .$rT. '" />';

	$htmlVolts = '<input type="text" name="voltageTotal" value="' .$vT. '" />';

	$htmlAmpers = '<input type="text" name="intensidadTotal" value="' .$iT. '" />';


	include "circuitos_vista.php";
?>