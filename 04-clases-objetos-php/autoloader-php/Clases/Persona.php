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
		$this->sueldo = ( int ) $sueldo;

		echo $this->obtenerPerfil();

		if ( strlen( $sueldo ) > 0 ) {
			echo $this->calcularSueldoAnual();
		}
	}

	public function obtenerPerfil() {

return <<<USER
	
Datos del perfil del usuario:

nombre: {$this->nombre}
apellido: {$this->apellido}
profesión: {$this->profesion}
sueldo: {$this->sueldo}$\n

USER;

	}

	public function calcularSueldoAnual() {

		$opcion = readline('¿Desea calcular el sueldo anual? [y/n]: ');

		if ( $opcion == 'y' ) {

			$sueldoAnual = $this->sueldo * 12;
			return "El sueldo anual de $this->nombre $this->apellido es: $sueldoAnual$\n\n";

		} else if ( $opcion == 'n' ) {

			return "No se calculo sueldo\n\n";

		} else {

			return "Opcion no válida\n\n";
		}

	}
}

