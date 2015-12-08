<?php

	require_once('ProductoDeCafeteria.php');
	require_once('../connect_db.php');
	
	class ListaDeProductos{
	
		public function getProductosWhere($whereQuery){
			$lista = array();
			$query = "SELECT productocafeteria.idProducto AS id, productocafeteria.nombre AS producto, descripcion, precio, sede.idSede AS idSede, existencia, sede.nombre AS sede FROM productocafeteria, disponibilidadproducto, sede WHERE productocafeteria.idProducto = disponibilidadproducto.idproducto AND sede.idSede = disponibilidadproducto.idSede";
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
					$row['producto'],
					$row['descripcion'],
					$row['precio'],
					$row['idSede'],
					$row['existencia'],
					$row['sede']
				);
			}
			desconecta($link);
			return $lista;
		}
	}
	
?>