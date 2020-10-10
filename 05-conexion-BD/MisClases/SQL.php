<?php 

	/*el codigo SQL se le asigna(entre comillado) a una variable php para enviar los datos en este caso se retorna el resultado para incrustar los datos a la variable*/

    namespace MisClases;

trait SQL {
    public function crear(/*$nombreTabla, $descripcion*/) {
      
      //primary key clave unica SQL
      $sql= "CREATE TABLE invitado (
				id int PRIMARY KEY AUTO_INCREMENT,
				name char(30),
				apellido char(30),
				correo char(30)
			);";

	return $sql;
    }

    public function insertar(){
    	
    	$sql= 'INSERT INTO invitado(name, apellido, correo)
    	VALUE("Gabriel", "Martinez", "prueba6@prueba.com");';

    	return $sql;
    }

    public function actualizar(){

    	$sql="UPDATE invitado
    	SET name = 'Brian', apellido = 'Sanchez', correo = 'modificacion@prueba.com' WHERE id = 1;";

    	return $sql;

    }

    public function eliminar(){

    	$sql= 'DELETE FROM invitado WHERE id = 1;';
    	return $sql;

    }

    public function resetAutoIncrement(){

        $sql = "ALTER TABLE invitado AUTO_INCREMENT=1";
        return $sql;
    }

}


/*
para setear autoincremento usar
$query = "ALTER TABLE nombreTabla AUTO_INCREMENT=1";
*/



















