<?php
    require_once("ListaDeFunciones.php");
    require_once("Funcion.php");
    class Boleto{
        private $id;
        private $fechaCompra;
        private $cantidad;
        private $codigo;
        private $horaEntrada;
        private $tipo;
        private $fechaPago;
        private $idFuncion;
        private $funcion;

        function __construct( $myArray ) 
        { 
            $this->id = $myArray[ 'id' ];
            $this->fechaCompra = $myArray[ 'fechaCompra' ];
            $this->cantidad = $myArray[ 'cantidad' ];
            $this->codigo = $myArray[ 'codigo' ];
            $this->horaEntrada = $myArray[ 'horaEntrada' ];
            $this->tipo = $myArray[ 'tipo' ];
            $this->fechaPago = $myArray[ 'fechaPago' ];
            $this->idFuncion = $myArray[ 'idFuncion' ];  
            $lista = new ListaDeFunciones();
            $this->funcion = $lista->getFuncionesWhere("idFuncion = ".$myArray[ 'idFuncion' ]);
        } 
        public function getId(){
            return $this->id;
        }
        public function getFechaCompra(){
            return $this->fechaCompra;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function getHoraEntrada(){
            return $this->horaEntrada;
        }
        public function getTipo(){
            return $this->tipo;
        }
        public function getFechaPago(){
            return $this->fechaPago;
        }
        public function getIdFuncion(){
            return $this->idFuncion;
        }
        public function getFuncion(){
            return $this->funcion;
        }

        
    }
?>