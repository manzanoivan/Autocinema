<?php
	require_once('Funcion.php');
	require_once('../connect_db.php');
	class ListaDeFunciones{
		
		//LISTA DEBE DE CONVERTIRSE EN UN ARREGLO DE Funcion
		
		public function getFuncionesWhere($whereQuery){
			$lista = array();
			$query = "SELECT idFuncion, fecha, pelicula.nombre AS nombreP, segundoNombre, sinopsis, director, anio, actores, duracion, trailer, clasificacion.nombre AS nombreC, imagen, precio, disponibilidad, sede.nombre AS nombreS FROM funcion, pelicula, clasificacion, sede WHERE funcion.idPelicula = pelicula.idPelicula AND pelicula.idClasificacion = clasificacion.idClasificacion AND funcion.idSede = sede.idSede";
			if(strcmp($whereQuery, "") != 0)
				$query = $query." AND ".$whereQuery;
			$link = conecta();
                        mysqli_set_charset($link, "utf8");
			if(!$result = mysqli_query($link,$query)){ 
				die();
			}
			while($row = mysqli_fetch_array($result))
			{
				$lista[] = new Funcion( 
					$row['idFuncion'], 
					$row['fecha'], 					
					$row['nombreP'], 
					$row['segundoNombre'], 
					$row['sinopsis'], 
					$row['director'], 
					$row['anio'], 
					$row['actores'], 
					$row['duracion'], 
					$row['trailer'], 
					$row['nombreC'],
					$row['imagen'],
					$row['precio'],
					$row['disponibilidad'],
					$row['nombreS']
				);
			}		
			desconecta($link);
			return $lista;
		}
		
		
		
	}
?>