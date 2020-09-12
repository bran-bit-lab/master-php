<?php 
//Se abre el archivo
$archivo= fopen("archivo_texto.txt", "r");

//Validacion de que es un archivo
var_dump(is_file("archivo_texto.txt") . "\n");

/* 
Se utiliza el bucle while y la funcion feof para que lea todas las lineas del archivo (se concatena un salto de linea)
*/
while (!feof($archivo)) {
	$contenido= fgets($archivo);
	echo $contenido . "<br/>";
}

//Se cierra el archivo
fclose($archivo);

 ?>