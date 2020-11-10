<?php 

namespace heroes\clases;

use mysql\MySQL;

class Heroe {

	public function createHeroe( $body ) {
		
		$mysql = new MySQL;

		$sql = "INSERT INTO node_db.heroes VALUES ( null, :nombre, :poder );";

		$heroe = array(':nombre' => $body['nombre'], ':poder' => $body['poder'] );

		$pdoUser = $mysql->executeQueryParams( $sql, $heroe );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		return [
			'ok' => true,
			'user' => $heroe,
			'status' => 200,
			'message' => 'Registro de heroe creado con exito'
		];
	}

	public function getHeroe( $id ) {

		$mysql = new MySQL;

		$pdoUser = $mysql->executeQuery( 'SELECT * FROM node_db.heroes WHERE id = '. $id );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		$user = $pdoUser->fetch();

		return [
			'ok' => true,
			'user' => $user,
			'status' => 200
		];

	}

	public function getAllHeroes() {
		
		$users = [];
		$mysql = new MySQL;
		$pdoUsers = $mysql->executeQuery( 'SELECT * FROM node_db.heroes;' );

		if ( !$pdoUsers ) {
			return [
				'ok' => false,
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		// multiples registros

		while ( $row = $pdoUsers->fetch() ) {
			array_push( $users, $row );
		}

		return [
			'ok' => true,
			'users' => $users,
			'status' => 200
		];
	}
}