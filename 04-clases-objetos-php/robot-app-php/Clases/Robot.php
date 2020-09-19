<?php 
	
namespace Clases;

class Robot {

	//atributos
	public $id= "";
	public $nombre= "";

	private $encendido= false;
	private $movimiento= "estatico";
	private $distanciaRecorrida= 0;

	//metodos
	
	//el constructor se ejecuta automaticamente al instanciar la clase
	public function __construct() {
		
		global $argv;
		global $argc;

		if ( $argc == 1 ) {
			return $this->ayuda();
		}
		
		foreach ( $argv as $argumento ) {

			$parametros= explode("=", $argumento);
		
			switch ( $parametros[0] ) {
				
				case 'help':
					return $this->ayuda();

				case 'id':
					$this->id = $parametros[1];
					break;
			
				case 'nombre':
					$this->nombre = $parametros[1];
					break;

				default:
					break;
			}
		}
		
		$this->obtenerEstadoRobot();
	}

	public function encender(){
		
		if ( $this->encendido == false ) {
			// echo "encendido";
			$this->encendido = true;

		} else {
			echo "el robot ya esta encendido";

		}

	}
	
	public function apagar(){

		if ( $this->encendido == true ) {
			// echo "apagado";
			$this->encendido = false;
			 
		} else {
			echo "el robot se encuentra apagado";

		}

	}
	
	public function girar( $direccion = "izq" | "der" ){

		if ( $direccion == "izq" ) {
			echo "girando a la izquierda \n";
		
		} else if ($direccion == "der"){
			echo "girando a la derecha \n";
		
		} else {
			echo "dar direccion al robot \n";
		
		}
	}
	
	public function avanzar(){
			
		if ( $this->movimiento == "estatico" && $this->encendido == true ) {
			echo "avanza \n";
			$this->movimiento= "avanza";
		
		} else if ( $this->encendido == false ){
			echo "El robot esta apagado \n";
		
		} else {
			echo "El robot esta en movimiento \n";
		
		}
	}
	
	public function retroceder(){

		if ( $this->encendido == true && $this->movimiento == "estatico" ) {
			echo "Retrocediendo \n";
			$this->movimiento= "retrocede";
		
		} else if ( $this->movimiento == "avanza" ) {
			$this->detener();
			echo "Retrocediendo \n";
			$this->movimiento= "retrocede";
		
		} else {
			echo "Ya esta retrocediendo \n";
		
		}

	}

	public function detener(){

		if ( $this->movimiento == "avanza" && $this->encendido == true ) {
			echo "se detiene";
			$this->movimiento = "estatico";
		
		} else if ( $this->encendido == false ) {
			echo "El robot esta apagado";
		
		} else if ( $this->movimiento == "retrocede" ) {
			echo "El robot se detuvo en retroceso \n";
			$this->movimiento = "estatico";
		
		} else {
			echo "El robot no esta en movimiento \n";
		}

	}

	//private indica que no se puede acceder al metodo de manera global se requie usar get y set para acceder 
	private function generarTraza() {
	
	}

	//set es la funcion usada para ingresar y modificar atributos o acceder metodos privados
	public function setGenerarTraza() {
		
	}

	//get es usado para retornar atributos de clases privadas
	public function getGenerarTraza() {
	
	}

	public function ayuda() {
		
echo <<<HELP

Esta es una aplicación con php, que permite generar el comportamiento logico de un robot
de exploracion de terreno.

Argumentos:

nombre="valor"		nombre del robot.
id="valor"		numero identificador el robot.
help="valor"		muestra ayuda para su control.
logs="true | false" 			muestra las trazas del robot generado a través de su ciclo de vida.


- El robot inicia en posición estatico y apagado se incluirá las acciones dentro de la 
ejecucion del programa

Autor: Brandon Silva bran-bit-lab.\n 

HELP;
	}

	
	public function obtenerEstadoRobot(){

		$encendido = $this->encendido ? 'Encendido' : 'Apagado';

echo <<<STATE

Estado del Robot:

Identificador: {$this->id},
Nombre: {$this->nombre},
Movimiento: {$this->movimiento},
Estado: {$encendido},
Distancia recorrida: {$this->distanciaRecorrida}m 


STATE;
	}
}
