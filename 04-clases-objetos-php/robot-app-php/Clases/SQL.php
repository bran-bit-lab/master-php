<?php

namespace Clases;

trait SQL {
    public function crear(/*$nombreTabla, $descripcion*/) {
      
      //primary key clave unica SQL
      $sql= "CREATE TABLE invitado (
				id int NOT NULL UNIQUE,
				nombre char(30),
				alias char(30)
			);";

	return $sql;
    }

    public function insertar(){
    	
    	$sql= 'INSERT INTO robots(id, nombre, alias)
    	VALUE( :id, :nombre, :alias);';

    	return $sql;
    }
    //Sentencias preparadas y procedimientos almacenados
    public function actualizar(){

    	$sql="UPDATE robots
    	SET nombre = :nombre, alias = :alias WHERE id = :id;";

    	return $sql;
    }

    public function eliminar(){

        //DELETE FROM para borrar regsitros de tabla        
    	$sql= 'DELETE FROM invitado WHERE id = 1;';
    	return $sql;
    }
        //para borrar tablas o bases de datos usar DROP
    public function resetAutoIncrement(){

        $sql = "ALTER TABLE invitado AUTO_INCREMENT=1";
        return $sql;
    }

}

  ?>