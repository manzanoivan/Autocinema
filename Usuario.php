<?php
    require_once("connect_db.php");
    class Usuario{
        private $id;
        private $username;
        private $tipo;
        private $nombre;
        private $apellidos;
        private $email;

        function __construct( $user , $password ) 
        { 
            $link = conecta();
            $sql1 = "select idUsuario, nombre, apellidos, email, tipo, username from usuario where username='".$user."' AND BINARY password='".$password."'";
            $myArray = consultaUsuarios($sql1, $link);
            desconecta($link);
            
            if(count($myArray) == 1 ){
                $this->id = $myArray[0]['id'];
                $this->tipo = $myArray[0]['tipo'];
                $this->username = $myArray[0]['username'];
                $this->apellidos = $myArray[0]['username'];
                $this->nombre = $myArray[0]['nombre'];
                $this->email = $myArray[0]['email'];
            }
            else{
                $this->id = NULL;
                $this->tipo = NULL;
                $this->username = NULL;
                $this->apellidos = NULL;
                $this->nombre = NULL;
                $this->email = NULL;
            }
            
        } 
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        
        public function getApellidos(){
            return $this->apellidos;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        
        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        
    }
?>