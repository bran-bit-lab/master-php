<?php 
	
namespace Clases;

use Clases\Robot;


class App {

	private $robot = null;
	private $traza = [];  //instancia de array basico
	private $app = true;

	//el constructor se ejecuta automaticamente al instanciar la clase
	public function __construct() {
		
		global $argv;
		global $argc;

		$nombre= '';
		$id= '';

		//$argv recoge todos las palabras separadas en un espacio , si estan entre comillas "" va a tomar toda la frase, despues de escribir php
		//$argc es la cantidad de parametros asignados a $argv

		if ( $argc == 1 ) {
			return $this->help();
		}
		
		foreach ( $argv as $argumento ) {

			$parametros= explode("=", $argumento);
		
			switch ( $parametros[0] ) {
				
				case 'help':
					return $this->help();

				case 'id':
					$id = $parametros[1];
					break;

				case 'nombre':
					$nombre = $parametros[1];
					break;

				default:
					break;
			}
		}

		
		
		$this->robot = new Robot( $id, $nombre );

		$this->generarTraza("Creacion del robot");

		$this->mainloop();
	}

	// private indica que no se puede acceder al metodo de manera global se requie usar get y set para acceder 
	private function generarTraza( $log ){
		
		array_push( $this->traza, $log );
		$this->escribirTraza( $log );
	}

	// set es la funcion usada para ingresar y modificar atributos o acceder metodos privados
	public function escribirTraza( $log ) {

		$path = __DIR__. '/../logs/logs.txt';

		$file= fopen( $path, "a+");  //escritura en el archivo
		
		fwrite($file, $log. "\n");

		fclose($file);
	}

	// get es usado para retornar atributos de clases privadas
	public function getGenerarTraza(){
		return $this->traza;

	}
	
	public function help() {
//sintaxis heredoc
echo <<<HELP

Esta es una aplicación con php, que permite generar el comportamiento logico de un robot
de exploracion de terreno.

Argumentos:

nombre="valor"		nombre del robot.
id="valor"		numero identificador el robot.
help="valor"		muestra ayuda para su control.
logs="true | false" 		muestra las trazas del robot generado a través de su ciclo de vida.


- El robot inicia en posición estatico y apagado.

Autor: Brandon Silva bran-bit-lab.\n 

HELP;
	}

	public function menu() {

echo <<<MENU

Ingrese una accion:

1- Encender
2- Apagar
3- Avanzar
4- Detener
5- Retroceder
6- Girar a la izquierda
7- Girar a la derecha
8- Salir de la aplicacion
9- Obtener traza del robot


- El robot inicia en posición estatico y apagado se incluirá las acciones dentro de la 
ejecucion del programa

Autor: Brandon Silva bran-bit-lab.\n 

MENU;

	}


	public function mainloop(){
		
		$this->menu();

		do {

		$option= (int) readline("Ingrese el número de la opcion: ");

			switch ($option) {
				case 1:
					$this->robot->encender();
					$this->generarTraza("El robot fue encendido, ");
					break;

				case 2:
					$this->robot->apagar();
					$this->generarTraza("se apaga el robot ");
					break;

				case 3:
					$this->robot->avanzar();
					$this->generarTraza("el robot avanza ");
					break;

				case 4:
					$this->robot->detener();
					$this->generarTraza("El robot se detiene ");
					break;

				case 5:
					$this->robot->retroceder();
					$this->generarTraza("El robot retrocede ");
					break;

				case 6:
					$this->robot->girar("izq");
					$this->generarTraza("El robot gira a la izquierda ");
					break;

				case 7:
					$this->robot->girar("der");
					$this->generarTraza("El robot gira a la derecha");
					break;
				
				case 8:
					$this->app= false;
					break;

				case 9:
					print_r($this->getGenerarTraza()) . "\n";
					break;

				default:
					echo "opcion invalida para el usuario";
					break;
			}

		} while ($this->app);

	}

}

/*
Ejemplo de validacion secundaria PHP
$encendido = $this->encendido == true ? 'Encendido' : 'Apagado';
*/