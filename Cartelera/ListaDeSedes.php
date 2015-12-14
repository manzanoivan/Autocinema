<?php
	require_once('../connect_db.php');

	class ListaDeSedes{
		
		public function getSedes(){
			$lista = array();
			$query = "SELECT idSede, nombre, direccion FROM sede";
			
			$link = conecta();
            mysqli_set_charset($link, "utf8");
			if(!$result = mysqli_query($link,$query)){ 
				die();
			}
			while($row = mysqli_fetch_array($result))
			{
				$lista[] = [
					"id" => $row['idSede'],
					"nombre" => $row['nombre'],
					"direccion" => $row['direccion']
				];
			}		
			desconecta($link);
			return $lista;
		}
			
	}
	
?>