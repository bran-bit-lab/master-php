<!DOCTYPE html>
<html>
<head>
	<title>Sitio Web con PHP</title>
</head>
<body>
	<?php 
		$nombre= "<b>Brandon Silva</b>";

		echo "Hola gente " . $nombre;
		echo "<br/>";

		$a= 8;
		$b= 10;
		$nulo= null;
		$resultadoSuma= $a + $b;
		$resultadoResta= $a - $b;
		$resultadoMultiplicacion= $a * $b;
		$resultadoOperacion= ($b-$a)/4;

		echo "El resultado de la suma es =  $resultadoSuma <br/>";
		echo "El resultado de la resta es = $resultadoResta <br/>";
		echo "El resultado de la multiplicacion es = $resultadoMultiplicacion <br/>";
		echo 'El resto es = ' . ($a%$b) . '<br/>';
		// se usan comillas simples presinando -Alt 39-
		echo "El resultado de la operacion es = $resultadoOperacion <br/>";
		echo 'El incremento de la suma es = ' . (++$resultadoSuma);
	 ?>

</body>
</html>

