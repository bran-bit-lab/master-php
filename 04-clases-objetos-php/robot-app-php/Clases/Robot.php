<?php 
	
namespace Clases;

class Robot {

	//atributos
	public $id= "";
	public $nombre= "";

	private $encendido= false;
	private $movimiento= "estatico";
	private $distanciaRecorrida= 0;

	public function __construct( $nombre, $id ){
		
		$this->id = $id;
		$this->nombre = $nombre;	
	}

	public function encender(){
		
		if ( $this->encendido == false ) {
			echo "encendido \n";
			$this->encendido = true;

		} else {
			echo "el robot ya esta encendido \n";

		}
		
	}
	
	public function apagar(){

		if ( $this->encendido == true ) {
			echo "apagado \n";
			$this->encendido = false;
			 
		} else {
			echo "el robot se encuentra apagado \n";

		}

	}
	
	public function girar( $direccion = "izq" | "der" ){

		if ( $direccion == "izq" && $this->encendido == true ) {
			echo "girando a la izquierda \n";

		} else if ( $direccion == "der" && $this->encendido == true ){
			echo "girando a la derecha \n";

		} else if ( $this->encendido == false ){
			echo "debe encender el robot el robot \n";
		
		}else {
			echo "Dar direccion al robot \n";

		}
	}
	
	public function avanzar(){
			
		if ( $this->movimiento == "estatico" && $this->encendido == true ) {
			echo "avanza \n";
			$this->movimiento= "avanzando";

		} elseif ($this->encendido == false){
			echo "El robot esta apagado \n";
		
		} elseif ($this->movimiento == "retrocede") {
			$this->detener();
			echo "avanzando \n";
			$this->movimiento= "avanzando";
		
		} else {
			echo "El robot esta en movimiento \n";
		}
		
}
	
	public function retroceder(){

		if ($this->encendido == true && $this->movimiento == "estatico") {
			echo "Retrocediendo \n";
			$this->movimiento= "retrocede";
		}elseif ($this->movimiento == "avanzando" ) {
			$this->detener();
			echo "Retrocediendo \n";
			$this->movimiento= "retrocede";
		}else{
			echo "Ya esta retrocediendo \n";
		}

	}

	public function detener(){

		if ( $this->movimiento == "avanza" && $this->encendido == true ) {
			echo "se detiene \n";
			$this->movimiento = "estatico";
		
		} else if ( $this->encendido == false ) {
			echo "El robot esta apagado \n";
		
		} else if ( $this->movimiento == "retrocede" ) {
			echo "El robot se detuvo en retroceso \n";
			$this->movimiento = "estatico";
		
		} else {
			echo "El robot no esta en movimiento \n";
		}

	}

	

	public function getEstadodelRobot(){
		
		if ($this->encendido == true) {
			echo "El robot esta encendido y " . $this->movimiento . "\n";
		}else{
			echo "El robot esta apagado \n";
		}
	}

}
				