<?php 
	namespace Clases;
	
	class Robot{

		//atributos
		public $id= 0;

		public $nombre= "";

 		private $encendido= false;

 		private $movimiento= "estatico";

 		//metodos
 		//el constructor se ejecuta automaticamente al instanciar la clase
		public function __construct() {
			global $argv;
			
			foreach ($argv as $argumento) {
			$parametros= explode("=", $argumento);
			
				switch ($parametros[0]) {
					
					case 'help':
						return $this->help();
						break;

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
			
			//$this->getEstadodelRobot();
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

		if ($direccion == "izq" && $this->encendido == true) {
			echo "girando a la izquierda \n";
		}else if ($direccion == "der" && $this->encendido == true){
			echo "girando a la derecha \n";
		}else if ($this->encendido == false){
			echo "debe encender el robot el robot \n";
		}
		else{
			echo "Dar direccion al robot \n";
		}

	}
	
	public function avanzar(){
			
		if ($this->movimiento == "estatico" && $this->encendido == true) {
			echo "avanza \n";
			$this->movimiento= "avanzando";
		}elseif($this->encendido == false){
			echo "El robot esta apagado \n";
		}elseif ($this->movimiento == "retrocede") {
			$this->detener();
			echo "avanzando";
			$this->movimiento= "avanzando";
		}
		else{
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

		if ($this->movimiento == "avanza" && $this->encendido == true) {
			echo "se detiene";
			$this->movimiento = "estatico";
		}else if($this->encendido == false){
			echo "El robot esta apagado";
		}else if ($this->movimiento == "retrocede") {
			echo "El robot se detuvo en retroceso \n";
			$this->movimiento = "estatico";
		}else{
			echo "El robot no esta en movimiento \n";
		}

	}

	//private indica que no se puede acceder al metodo de manera global se requie usar get y set para acceder 
	private function generarTraza(){
		echo $this->movimiento . "\n";

	}

	//set es la funcion usada para ingresar y modificar atributos o acceder metodos privados
	public function setGenerarTraza(){
		$this-> generarTraza();

	}

	//get es usado para retornar atributos de clases privadas
	public function getGenerarTraza(){

	}

	public function getEstadodelRobot(){
		if ($this->encendido == true) {
			echo "El robot esta encendido y ";
		}else{
			echo "El robot esta apagado \n";
		}
		
		echo $this->movimiento . "\n";
	}

	public function help() {
		
// sintaxis heredoc
echo <<<HELP

Esta es una aplicacion con php, que permite generar robots.

Argumentos:

nombre = nombre del robot.
id = numero identificador el robot.
help = muestra ayuda para su control.

- El robot inicia estatico y apagado.

Autor: Brandon Silva bran-bit-lab. 

HELP;
	}

}

		
 ?>