<?php
	
	class ProductoDeCafeteria{
		
		private $id;
		private $nombre;
		private $descripcion;
		private $precio;
		private $idSede;
		private $existencia;
		
		public function __construct($id2, $nombre2, $descripcion2, $precio2, $idSede2, $existencia2){
			
			$this->id = $id2;
			$this->nombre = $nombre2;
			$this->descripcion = $descripcion2;
			$this->precio = $precio2;
			$this->idSede = $idSede2;
			$this->existencia = $existencia2;
		
		}
		
		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getDescripcion(){
			return $this->descripcion;
		}

		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}

		public function getPrecio(){
			return $this->precio;
		}

		public function setPrecio($precio){
			$this->precio = $precio;
		}

		public function getIdSede(){
			return $this->idSede;
		}

		public function setIdSede($idSede){
			$this->idSede = $idSede;
		}

		public function getExistencia(){
			return $this->existencia;
		}

		public function setExistencia($existencia){
			$this->existencia = $existencia;
		}		
		
	}
	
?>