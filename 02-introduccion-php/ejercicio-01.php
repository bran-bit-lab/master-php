 <!DOCTYPE html>
<html>
<title>Primera pagina PHP</title>
<body>

<h1>PHP</h1>
<?php 
	echo "Hola gente ";
	echo "<br/>";

//if, else, else if

$a= 40;
$b= 30;

	if ($a<$b) {
		echo "a es menor que b";
	}elseif ($a==$b) {
		echo "a y b son iguales";
	}else{
		echo "a es mayor que b";		
	}

echo "<hr/>";

$edadOficial=18;
	
	/* El operador logico Y -&&- establece que deben cumplirse ambas condiciones
		El operado O -||- establece que se cumplan al menos una de las condiciones*/
	if ($edadOficial >= $b && $edadOficial <=$a) {
		echo "En edad adulta";
	}elseif ($edadOficial>=$a) {
		echo "Adulto Mayor";
	}else{
		echo "Joven";
	}

echo "<hr/>";

echo "Hacer un pseudocódigo que imprima los numeros impares hasta el 100 y que
imprima cuantos impares hay" . "<br/>";

$contadorImpar= 0;
for ($num=1; $num <=100 ; $num+= 2) { 
	echo "$num , ";
	
	$contadorImpar++;
if ($num == 99) {
		echo "Cantidad de impares: " . $contadorImpar;
	}
}


?>

</body>
</html> 


