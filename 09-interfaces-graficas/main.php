<?php 

/*
	Interfaces graficas: php-gui libreria profesional para el diseño de interfaces graficas con 
	php.

	solo funciona en arquitectura 64bits (multiplataforma) php >=5.6 
*/

require 'vendor/autoload.php';

use Gui\Application;
use Gui\Components\Window;
use Gui\Components\Button;
use Gui\Components\Label;

function main() {
	
	$label = new Label([
		'text' => 'Iniciar sesión',
		'left' => 20,
		'top' => 20
	]);
	
	$button = new Button([
		'left' => 40,
		'top' => 100,
		'width' => 200,
		'value' => 'Acceder'
	]);
		
	$button->on('click', function() use ($button)  {
		$button->setValue('Look, I\'m a clicked button!');
		echo "Boton pulsado";
	});
}

$app = new Application([
	'title' => 'Iniciar sesión',
	'width' => 460,
	'height' => 300,
	'top' => 50
]);

$app->on('start', 'main');

$app->run();