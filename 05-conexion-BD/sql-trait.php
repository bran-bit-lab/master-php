<?php 

trait SQL {
    public function crear(/*$nombreTabla, $descripcion*/) {
      
      //primary key clave unica
      $sql= "CREATE TABLE invitado (
				id int PRIMARY KEY,
				name char(30),
				apellido char(30),
				correo char(30)
			);";

	return $sql;
    }
}






















