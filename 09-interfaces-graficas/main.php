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
use Gui\Components\InputText;
use Gui\Components\InputPassword;

function login( $password, $email ) {
	$login = [
		'email' => $email->getValue(),
		'password' => $password->getValue()
	];

	print_r( $login );
}


function main() {

	$label = new Label([
		'text' => 'Iniciar sesión',
		'left' => 200,
		'top' => 20,
		'fontSize' => 20
	]);

	$labelEmail = new Label([
			'text' => 'Correo electronico:',
			'left' => 60,
			'top' => 120
	]);

	$labelPassword = new Label([
			'text' => 'Contraseña:',
			'left' => 60,
			'top' => 160,
	]);

	$inputEmail = new InputText([
			'left' => 240,
			'top' => 120,
			'width' => 250,
	]);

	$inputPassword = new InputPassword([
			'left' => 240,
			'top' => 160,
			'width' => 250,
	]);

	$button = new Button([
		'left' => 200,
		'top' => 250,
		'width' => 200,
		'value' => 'Acceder'
	]);

	$button->on('click', function() use ($inputEmail, $inputPassword )  {
			return login( $inputPassword, $inputEmail );
		}
	);
}

$app = new Application([
	'title' => 'Iniciar sesión',
	'width' => 600,
	'height' => 400,
	'top' => 50,
]);

$app->on('start', 'main');

$app->run();
