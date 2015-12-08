<?php

	require_once('ProductoDeCafeteria.php');
	require_once('../connect_db.php');
	
	class ListaDeProductos{
	
		public function getProductosWhere($whereQuery){
			$lista = array();
			$query = "SELECT productocafeteria.idProducto AS id, nombre, descripcion, precio, idSede, existencia FROM productocafeteria, disponibilidadproducto WHERE productocafeteria.idProducto = disponibilidadproducto.idproducto";
			if(strcmp($whereQuery, "") != 0)
				$query = $query." AND ".$whereQuery;
			$link = conecta();
                        mysqli_set_charset($link, "utf8");
			if(!$result = mysqli_query($link,$query)){ 
				die();
			}
			while($row = mysqli_fetch_array($result))
			{
				$lista[] = new ProductoDeCafeteria( 
					$row['id'], 
					$row['nombre'],
					$row['descripcion'],
					$row['precio'],
					$row['idSede'],
					$row['existencia']
				);
			}
			desconecta($link);
			return $lista;
		}
	}
	
?>