<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>error</title>
		<link rel="stylesheet" href="./index.css">
		<!-- Materialize -->
	  	<link rel="stylesheet" href="./materialize.min.css">
			<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
	  	<script src="./materialize.min.js"></script>
	</head>
	<body>
		<div class="container container-error">
			<div class="d-flex-c-c">
				<strong style="color: red" class="mt-2">
					<?= $error ?>
				</strong> 
				<a class="btn" href="http://localhost/master-php/03-sintaxis-basica-php/circuitos/circuitos_controlador.php">
					Volver
				</a>
			</div>
		</div>
	</body>
</html>