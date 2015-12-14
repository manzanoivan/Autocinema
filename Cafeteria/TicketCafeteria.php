<?php
    require_once("../connect_db.php");
    class TicketCafeteria{
        private $id;
        private $fechaPago;
        private $fechaEntrega;
        private $referencia;
        private $nombre;
        private $productos;

        private function listadoProductos( $idCompra ){
            $link = conecta();
            $sql1 = "SELECT producto.idProducto AS id , detalle.cantidad AS cantidad, detalle.precioUnitario AS precio, producto.nombre AS nombre  FROM detalleCompra detalle, productoCafeteria producto WHERE detalle.idProducto=producto.idProducto AND detalle.idCompra=".$idCompra;
            $myArray = consultaListadoProductos($sql1, $link);
            desconecta($link);

            return $myArray;
        }

        function __construct( $myArray ) 
        { 
            $this->id = $myArray[ 'id' ];
            $this->fechaPago = $myArray[ 'fechaPago' ];
            $this->fechaEntrega = $myArray[ 'fechaEntrega' ];
            $this->referencia = $myArray[ 'referencia' ];
            $this->nombre = $myArray[ 'nombre' ];
            $this->productos = $this->listadoProductos( $this->id );
        } 
        public function getId(){
            return $this->id;
        }
        public function getFechaPago(){
            return $this->fechaPago;
        }
        public function getFechaEntrega(){
            return $this->fechaEntrega;
        }
        public function getReferencia(){
            return $this->referencia;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getProductos(){
            return $this->productos;
        }

        
    }
?>