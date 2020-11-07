<?php 

namespace heroes\clases;

use mysql\MySQL;

class Heroe {

	public function createHeroe( $heroe ) {

	}

	public function getHeroe( $id ) {

	}

	public function getAllHeroes() {
		
		$users = [];
		$mysql = new MySQL;
		$pdoUsers = $mysql->executeQuery('SELECT * FROM node_db.heroes;', true );

		while ( $row = $pdoUsers->fetch() ) {
			array_push( $users, $row );
		}

		return [
				'ok' => 'true',
				'users' => $users,
				'status' => 200
			];
	}
}