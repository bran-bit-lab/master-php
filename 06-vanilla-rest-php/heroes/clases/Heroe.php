<?php 

namespace heroes\clases;

use mysql\MySQL;

class Heroe {

	public function createHeroe( $body ) {
		
		$sql = "INSERT INTO node_db.heroes VALUES ( null, :nombre, :poder );";

		$heroe = array( ':nombre' => $body['nombre'], ':poder' => $body['poder'] );

		$pdoUser = MySQL::executeQueryParams( $sql, $heroe );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instruccion SQL',
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

		$idHeroe = [ ':id' => $id ];

		$pdoUser = MySQL::executeQueryParams( 'SELECT * FROM node_db.heroes WHERE id = :id;', $idHeroe );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instruccion SQL',
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

		$pdoUsers = MySQL::executeQuery( 'SELECT * FROM node_db.heroes;' );

		if ( !$pdoUsers ) {
			return [
				'ok' => false,
				'error' => 'error en instruccion SQL',
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

	public function updateHeroe( $id, $heroe ) {

		$sql = 'UPDATE node_db.heroes SET nombre = :nombre, poder = :poder WHERE id = :id';

		$params = array( ':nombre' => $heroe['nombre'], ':poder' => $heroe['poder'], ':id' => $id );

		$pdoUser = MySQL::executeQueryParams( $sql, $params );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		return [
			'ok' => true,
			'message' => 'Heroe actualizado con exito',
			'user' => $heroe,
			'status' => 200
		];
	}

	public function deleteHeroe( $id ) {

		$sql = 'DELETE FROM node_db.heroes WHERE id = :id';

		$param = array( 'id' => $id );

		$pdoUser = MySQL::executeQueryParams( $sql, $param );

		if ( !$pdoUser ) {
			return [
				'ok' => false,
				'error' => 'error en instrucción SQL',
				'status' => 500
			];
		}

		return [
			'ok' => true,
			'message' => 'Registro de heroe eliminado',
			'status' => 200
		];
	}
}