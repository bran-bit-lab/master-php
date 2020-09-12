<?php 

namespace Clases;

use Clases\Persona;

class App {

	public $persona = null;

	public function __construct() {

		global $argv;
		global $argc;

		$nombre = '';
		$apellido = '';
		$profesion = '';
		$sueldo = '';

		// corre la ayuda si no se le pasa argumentos 
		if ( $argc == 1 ) {
			return $this->help();
		}

		foreach ( $argv as $arg ) {
			
			$arrayParams = explode( '=',  $arg );  // explode separa string devuelve un arreglo
			
			switch ( $arrayParams[0] ) {
					
				case '--apellido':
					$apellido = $this->validateData( $arrayParams[1], $arrayParams[0] );
					break;
				

				case '--nombre':
					$nombre = $this->validateData( $arrayParams[1], $arrayParams[0] );
					break;


				case '--profesion':
					$profesion = $this->validateData( $arrayParams[1], $arrayParams[0] );
					break;

				case '--sueldo':
					$sueldo = $this->validateData( $arrayParams[1], $arrayParams[0] );
					break;
				
				case '--help';
					return $this->help();

				default:
					break;
			}
		}

		$this->persona = new Persona( $nombre, $apellido, $profesion, $sueldo );
	}

	private function validateData( $cadena, $property ) {

		if ( preg_match( '/^[a-zA-Z0-9]+$/', $cadena ) ) {
			return $cadena;
		
		} else {
			echo $this->showError( 'dato inválido '. $property );
			die();

		}
	}

	private function showError( $error ) {
		return "\n\e[1;37;41m $error \e[0m\n\n";
	}

	
	public function help() {
		
		// sintaxis heredoc
		echo <<<HELP
		
		Esta es una aplicacion con php, es un script
		que permite crear perfiles y calcular su sueldo anual.

		Argumentos:

		--help\t\t\tmuestra la ayuda disponible por la aplicación.
		--nombre="valor"\tinstancia el nombre de la persona.
		--apellido="valor"\tinstancia el apellido de la persona.
		--profesion="valor"\tinstancia la profesion de la persona.
		--sueldo="valor"\tsueldo mensual\n

		Autor: Gabriel Martinez: gabmart1995\n 

		HELP;
	}
}