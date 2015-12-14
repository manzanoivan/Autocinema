<?php

	class Funcion{
		
		private $id;
		private $fecha;
		private $nombrePelicula;
		private $idPelicula;
		private $segundoNombrePelicula;
		private $sinopsis;
		private $director;
		private $anio;
		private $actores;
		private $duracion;
		private $trailer;
		private $clasificacion;
		private $imagen;
		private $precio;
		private $disponibilidad;
		private $sede;
		
		public function __construct($id2, $fecha2, $idPel,$nombrePelicula2, $segundoNombrePelicula2, $sinopsis2, $director2, $anio2, $actores2, $duracion2, $trailer2, $clasificacion2, $imagen2, $precio2, $disponibilidad2, $sede2) {
			$this->id = $id2;
			$this->fecha = $fecha2;
			$this->nombrePelicula = $nombrePelicula2;
			$this->segundoNombrePelicula = $segundoNombrePelicula2;
			$this->sinopsis = $sinopsis2;
			$this->director = $director2;
			$this->anio = $anio2;
			$this->actores = $actores2;
			$this->duracion = $duracion2;
			$this->trailer = $trailer2;
			$this->clasificacion = $clasificacion2;
			$this->imagen = $imagen2;
			$this->precio = $precio2;
			$this->disponibilidad = $disponibilidad2;
			$this->sede = $sede2;
			$this->idPelicula = $idPel;
		}
		
		public function getId(){
				return $this->id;
		}

		public function getIdPelicula(){
				return $this->idPelicula;
		}

		public function setId($id){
				$this->id = $id;
		}

		public function getFecha(){
				return $this->fecha;
		}

		public function setFecha($fecha){
				$this->fecha = $fecha;
		}

		public function getNombrePelicula(){
				return $this->nombrePelicula;
		}

		public function setNombrePelicula($nombrePelicula){
				$this->nombrePelicula = $nombrePelicula;
		}

		public function getSegundoNombrePelicula(){
				return $this->segundoNombrePelicula;
		}

		public function setSegundoNombrePelicula($segundoNombrePelicula){
				$this->segundoNombrePelicula = $segundoNombrePelicula;
		}

		public function getSinopsis(){
				return $this->sinopsis;
		}

		public function setSinopsis($sinopsis){
				$this->sinopsis = $sinopsis;
		}

		public function getDirector(){
				return $this->director;
		}

		public function setDirector($director){
				$this->director = $director;
		}

		public function getAnio(){
				return $this->anio;
		}

		public function setAnio($anio){
				$this->anio = $anio;
		}

		public function getActores(){
				return $this->actores;
		}

		public function setActores($actores){
				$this->actores = $actores;
		}

		public function getDuracion(){
				return $this->duracion;
		}

		public function setDuracion($duracion){
				$this->duracion = $duracion;
		}

		public function getTrailer(){
				return $this->trailer;
		}

		public function setTrailer($trailer){
				$this->trailer = $trailer;
		}

		public function getClasificacion(){
				return $this->clasificacion;
		}

		public function setClasificacion($clasificacion){
				$this->clasificacion = $clasificacion;
		}

		public function getImagen(){
				return $this->imagen;
		}

		public function setImagen($imagen){
				$this->imagen = $imagen;
		}		
		
		public function getPrecio(){
				return $this->precio;
		}

		public function setPrecio($precio){
				$this->precio = $precio;
		}

		public function getDisponibilidad(){
				return $this->disponibilidad;
		}

		public function setDisponibilidad($disponibilidad){
				$this->disponibilidad = $disponibilidad;
		}

		public function getSede(){
				return $this->sede;
		}

		public function setSede($sede){
				$this->sede = $sede;
		}	
		
	}
	
?>