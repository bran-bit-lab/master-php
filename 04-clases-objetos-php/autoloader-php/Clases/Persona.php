<?php  

// el namespace es el nombre de la carpeta que contiene el archivo.
namespace Clases;

class Persona {

	public $nombre = '';
	public $apellido = '';
	public $profesion = '';
	public $sueldo = '';


	public function __construct( 
		$nombre = '', 
		$apellido = '', 
		$profesion = '',
		$sueldo = ''
	) {
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->profesion = $profesion;
		$this->sueldo = $sueldo;

		echo $this-> getProfile();
		echo $this->calcularSueldoAnual();
	}

	public function getProfile() {
return <<<USER
	
Datos del perfil del usuario:

nombre: {$this->nombre}
apellido: {$this->apellido}
profesion: {$this->profesion}
sueldo: {$this->sueldo}$\n

USER;
	}

	public function calcularSueldoAnual() {

		$option = readline('¿Desea calcular el sueldo anual? [y/n]: ');

		if ( $option == 'y' ) {

			$sueldoAnual = $this->sueldo * 12;
			return "El sueldo anual de $this->nombre $this->apellido es: $sueldoAnual\n\n";

		} else if ( $option == 'n' ) {

			return "No se calculo sueldo\n\n";

		} else {

			return "\e[1;37;41m Opcion no válida \e[0m\n\n";
		}

	}
}

