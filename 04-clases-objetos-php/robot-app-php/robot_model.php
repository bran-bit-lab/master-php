<?php 

	class Robot{

		//atributos
		private $id= 1;

		public $nombre= "";

 		private $encendido= false;

 		private $movimiento= "estatico";

 		//metodos
 		//el constructor se ejecuta automaticamente al instanciar la clase
 		public function __construct($nombre) {

 			$this->nombre = $nombre;
 		}

 		public function getId(){

 			return $this->id;
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

			if ($direccion == "izq") {
				echo "girando a la izquierda \n";
			}else if ($direccion == "der"){
				echo "girando a la derecha \n";
			}else{
				echo "dar direccion al robot \n";
			}

		}
		
		public function avanzar(){
				
				if ($this->movimiento == "estatico" && $this->encendido == true) {
					echo "avanza \n";
					$this->movimiento= "avanza";
				}elseif($this->encendido == false){
					echo "El robot esta apagado \n";
				}else{
					echo "El robot esta en movimiento \n";
				}
				

		}
		
		public function retroceder(){

				if ($this->encendido == true && $this->movimiento == "estatico") {
					echo "Retrocediendo \n";
					$this->movimiento= "retrocede";
				}elseif ($this->movimiento == "avanza" ) {
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
			echo "traza";

		}

		//set es la funcion usada para ingresar y modificar atributos o acceder metodos privados
		public function setGenerarTraza(){
			$this-> generarTraza();

		}

		//get es usado para retornar atributos de clases privadas
		public function getGenerarTraza(){

		}

		public function getEstadodelRobot(){
			echo $this->id ."\n";
			echo $this->nombre . "\n";
			echo $this->encendido . "\n";
			echo $this->movimiento . "\n";
		}

		
	}

		$robot1= new Robot("bumblebee");

		
		echo $robot1->encender();

		echo $robot1->avanzar();

		echo $robot1->girar("izq");

		$robot1->getEstadodelRobot();

		

		

		/*$ultimaLinea = system( './Cuenta', $retval );

			echo $ultimaLinea;

			echo $retval;*/



		//var_dump($robot1);










 ?>