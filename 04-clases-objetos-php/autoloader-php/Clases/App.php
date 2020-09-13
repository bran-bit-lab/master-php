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

		if ( $argc == 1 ) {
			return $this->obtenerAyuda();
		}

		unset( $argv[0] ); // elimina la primera del arreglo que contiene el nombre del script

		foreach ( $argv as $argumentos ) {
			
			$parametros = explode( '=',  $argumentos );
			
			switch ( $parametros[0] ) {
					
				case '--apellido':
					$apellido = $this->validarDatos( $parametros[1], $parametros[0], '/^[a-zA-Z]+$/' );
					break;
				

				case '--nombre':
					$nombre = $this->validarDatos( $parametros[1], $parametros[0], '/^[a-zA-Z]+$/' );
					break;


				case '--profesion':
					$profesion = $this->validarDatos( $parametros[1], $parametros[0], '/^[a-zA-Z]+$/' );
					break;

				case '--sueldo':
					$sueldo = $this->validarDatos( $parametros[1], $parametros[0], '/^[0-9]+$/' );
					break;
				
				case '--help';
					return $this->obtenerAyuda();

				default:
					echo "No opción ingresada no es valida.\n";
					return; 
					
			}
		}

		$this->persona = new Persona( $nombre, $apellido, $profesion, $sueldo );
	}

	private function validarDatos( $cadena, $propiedad, $patron ) {

		if ( preg_match( $patron, $cadena ) && !empty( $cadena ) ) {
			return $cadena;
		}

		die( "dato inválido $propiedad\n" );
	}
	
	public function obtenerAyuda() {
		
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