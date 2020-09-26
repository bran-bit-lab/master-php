<!DOCTYPE html>
	<html>
	<head>
		<meta charset= "UTF-8">
		<title>Calculadora de Circuitos Electricos</title>
		<link rel="stylesheet" href="./index.css">
	</head>
	<body>
		
		<h1>Bienvenido a la Calculadora de circuitos</h1>
		<h2>Circuito en Serie</h2>
		<div class="center">
			<img src="imagenes-sintaxis-basica/circuito_serie1.jpeg" alt="circuito"/>
		</div>
		
			<!-- form- resistencia -->
			<form action="circuitos_controlador.php" method="GET">

			<div class="fila">
				<div>
					<h2>Calcula resistencia:</h2>

					<p>
					<label for="resistenciaR1">Resistencia de R1 en ohms: </label>
					<input type="text" name="resistenciaR1" />
					<p/>

					<p>
					<label for="resistenciaR2">Resistencia de R2 en ohms: </label>
					<input type="text" name="resistenciaR2" />
					<p/>

					<p>
					<label for="resistenciaR3">Resistencia de R3 en ohms: </label>
					<input type="text" name="resistenciaR3" />
					<p/>

					<p>
					
					<p/>	

					<p>
					<label for="resistenciaTotal"> Resistencia total en ohms: </label>
					<!--Renderizado de php-html-->
					<?php echo $htmlOhms; ?>
					<p/>
					
				</div>
				<div>
					<h2>Calcular voltios:</h2>
					<p>
					<label for="voltageR1">Voltage en R1 en voltios: </label>
					<input type="text" name="voltageR1" />
					<p/>

					<p>
					<label for="voltageR2">Voltage en R2 en voltios: </label>
					<input type="text" name="voltageR2" />
					<p/>

					<p>
					<label for="voltageR3">Voltage en R3 en voltios: </label>
					<input type="text" name="voltageR3" />
					<p/>

					<p>
					<p/>	

					<p>
					<label for="voltageTotal"> Voltage total en voltios: </label>
					<?php echo $htmlVolts; ?>
					<p/>
				</div>
			</div>
			<div class="fila">
				<div>
					<p>
					<label for="intensidadTotal">Intensidad en Amperios: </label>
					<?php echo $htmlAmpers; ?>
					<p/>
				</div>
				<div>
					<input type="submit" value="Procesar"/>
				</div>
			</div>
			<div>
				
			</div>
			
			</form>	

	</body>
	</html>

