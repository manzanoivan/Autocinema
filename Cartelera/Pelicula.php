<?php
	
	class Pelicula{
		
		private $id;
		private $nombre;
		private $segundoNombre;
		private $sinopsis;
		private $director;
		private $anio;
		private $actores;
		private $duracion;
		private $trailer;
		private $clasificacion;
		private $imagen;
		
		public function __construct($id, $nombre, $segundoNombre, $sinopsis, $director, $anio, $actores, $duracion, $trailer, $clasificacion, $imagen){
			$this->id = $id;
			$this->nombre = $nombre;
			$this->segundoNombre = $segundoNombre;
			$this->sinopsis = $sinopsis;
			$this->director = $director;
			$this->anio = $anio;
			$this->actores = $actores;
			$this->duracion = $duracion;
			$this->trailer = $trailer;
			$this->clasificacion = $clasificacion;
			$this->imagen = $imagen;
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

		public function getSegundoNombre(){
			return $this->segundoNombre;
		}

		public function setSegundoNombre($segundoNombre){
			$this->segundoNombre = $segundoNombre;
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
		
	}
	
?>