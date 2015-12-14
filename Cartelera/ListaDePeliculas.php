<?php

	require_once('Pelicula.php');
	require_once('../connect_db.php');

	class ListaDePeliculas{
		
		public function getPeliculasWhere($whereQuery){
			
			$lista = array();
			$query = "SELECT idPelicula, pelicula.nombre AS nombrePelicula, segundoNombre, sinopsis, director, anio, actores, duracion, trailer, clasificacion.nombre AS nombreClasificacion, imagen FROM pelicula, clasificacion WHERE pelicula.idClasificacion = clasificacion.idClasificacion";
			if(strcmp($whereQuery, "") != 0)
				$query = $query." AND ".$whereQuery;
			$link = conecta();
            mysqli_set_charset($link, "utf8");
			if(!$result = mysqli_query($link,$query)){ 
				die();
			}
			while($row = mysqli_fetch_array($result))
			{
				$lista[] = new Pelicula( 
					$row['idPelicula'], 
					$row['nombrePelicula'],
					$row['segundoNombre'],
					$row['sinopsis'],
					$row['director'],
					$row['anio'],
					$row['actores'],
					$row['duracion'],
					$row['trailer'],
					$row['nombreClasificacion'],
					$row['imagen']
				);
			}		
			desconecta($link);
			return $lista;
		}
			
	}
	
?>