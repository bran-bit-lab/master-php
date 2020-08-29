<?php

	// Modelos vista controlador

	function sumarOhms(){

		$resistenciaR1= validarFloat( $_GET['resistenciaR1'] );
		$resistenciaR2= validarFloat( $_GET['resistenciaR2'] );
		$resistenciaR3= validarFloat( $_GET['resistenciaR3'] );
		
		$rT= ($resistenciaR1 + $resistenciaR2 + $resistenciaR3);

		return $rT;
	}

	function sumarVolts(){

		$voltageR1= validarFloat( $_GET['voltageR1'] );
		$voltageR2= validarFloat( $_GET['voltageR2'] );
		$voltageR3= validarFloat( $_GET['voltageR3'] );
		
		$vT= ($voltageR1 + $voltageR2 + $voltageR3);

		return $vT;
	}


	function validarFloat( $numeroEvaluar ) {
		
		global $error;
		global $mensaje;

		if ( filter_var( $numeroEvaluar, FILTER_VALIDATE_FLOAT) || empty( $numeroEvaluar )) {
			return (float) $numeroEvaluar;

		} else {
			
			echo "<strong style='color: red'>Los datos introducidos no son validos</strong>";
			die();
		}	
	}

	$error= false;
	$mensaje= "";

	// Calculo de resistencia total
	// Controlador

	$rT = 0.0;
	$vT = 0.0;
	$iT = ''; // respuesta

		// calcular RT
		if( ( 
			empty($_GET['resistenciaR1']) &&  
			empty($_GET['resistenciaR2']) &&  
			empty($_GET['resistenciaR3']) 

			) 
			&&( 
			 	!empty($_GET['intensidadTotal']) 
			) 
			&&( 
				!empty($_GET['voltageR1']) ||
				!empty($_GET['voltageR2']) ||
				!empty($_GET['voltageR3']) 
			)
		) {

			$vT = sumarVolts();
			$iT = validarFloat ( $_GET['intensidadTotal'] ); 
			
			if ($iT <= 0) {
				$rT = $vT;

			} else {

				$rT= $vT / $iT;
			}

		}

		// calcular VT
		
		else if (
			( empty($_GET['voltageR1']) &&
			  empty($_GET['voltageR2']) &&
			  empty($_GET['voltageR3']) 
			)
			&&(
				!empty($_GET['intensidadTotal']) 
			)
			&&(
				!empty($_GET['resistenciaR1']) ||  
				!empty($_GET['resistenciaR2']) ||  
				!empty($_GET['resistenciaR3']) 
			)
		) {

			$rT = sumarOhms();
			$iT = validarFloat ( $_GET['intensidadTotal'] );
			$vT = $iT * $rT;
		}
		
		// calcular IT
		else if (
			( 
				empty( $_GET['intensidadTotal'] ) 
			) 
			&&( 	
				!empty($_GET['resistenciaR1']) || 
				!empty($_GET['resistenciaR2']) || 
				!empty($_GET['resistenciaR3']) 
			) 
			&&( 	
				!empty($_GET['voltageR1']) || 
				!empty($_GET['voltageR2']) || 
				!empty($_GET['voltageR3']) 
			)
		) {
			
			$rT = sumarOhms();
			$vT = sumarVolts();

			if ($rT <= 0) {
				$iT = $vT;
			
			} else {
				$iT = $vT / $rT;
			}
		}
	

	include "circuitos_vista.php";
?>