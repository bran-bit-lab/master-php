	<!DOCTYPE html>
	<html>
	<head>
		<meta charset= "UTF-8">
		<title>Calculadora de Circuitos Electricos</title>
	</head>
	<body>
		
		<h1>Bienvenido a la Calculadora de circuitos</h1>
		<h2>Circuito en Serie</h2>

		<img src="imagenes-sintaxis-basica/circuito_serie1.jpeg" alt="circuito"/>
		<form>

		<p>
		<label for="resistenciaR1">Resistencia de R1 en ohms: </label>
		<input type="text" name="resistenciaR1" placeholder="escribe el valor de R1"/>
		<p/>

		<p>
		<label for="resistenciaR2">Resistencia de R2 en ohms: </label>
		<input type="text" name="resistenciaR2" placeholder="escribe el valor de R2"/>
		<p/>

		<p>
		<label for="resistenciaR3">Resistencia de R3 en ohms: </label>
		<input type="text" name="resistenciaR3" placeholder="escribe el valor de R3"/>
		<p/>

		<p>
		<input type="submit" value="Procesar"/>
		<p/>	

		<p>
		<label for="resistenciaTotal">Resistencia total en ohms: </label>
		<input type="number" name="resistenciaTotal"/>
		<p/>

		</form>

		<?php  



		if (isset($_GET['resistenciaR1']) && isset($_GET['resistenciaR2']) && isset($_GET['resistenciaR3'])) {
			
			$resistenciaR1= (int) $_GET['resistenciaR1'];
			$resistenciaR2= (int) $_GET['resistenciaR2'];
			$resistenciaR3= (int) $_GET['resistenciaR3'];

			echo 'La resistencia total es: ' . ($resistenciaR1+$resistenciaR2+$resistenciaR3) . '<br/>';

			}else{
				echo "Sin datos";
			}


		 ?>

	</body>
	</html>

