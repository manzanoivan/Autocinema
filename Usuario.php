<?php
    require_once("connect_db.php");
    class Usuario{
        private $id;
        private $username;
        private $tipo;
        private $nombre;
        private $apellidos;
        private $email;
        private $sexo;

        function __construct( $user , $password ) 
        { 
            $link = conecta();
            $sql1 = "select idUsuario, nombre, apellidos, email, tipo, username, idSexo from usuario where username='".$user."' AND BINARY password='".$password."'";
            $myArray = consultaUsuarios($sql1, $link);
            desconecta($link);
            
            if(count($myArray) == 1 ){
                $this->id = $myArray[0]['id'];
                $this->tipo = $myArray[0]['tipo'];
                $this->username = $myArray[0]['username'];
                $this->apellidos = $myArray[0]['apellidos'];
                $this->nombre = $myArray[0]['nombre'];
                $this->email = $myArray[0]['email'];
                $this->sexo = $myArray[0]['sexo'];
            }
            else{
                $this->id = NULL;
                $this->tipo = NULL;
                $this->username = NULL;
                $this->apellidos = NULL;
                $this->nombre = NULL;
                $this->email = NULL;
                $this->sexo = NULL;
            }
            
        }
        
        public static function withId( $id ) 
        { 
            $instance = new self();
            
            $link = conecta();
            $sql1 = "select idUsuario, nombre, apellidos, email, tipo, username, idSexo from usuario where idUsuario=".$id."";
            //echo $sql1;
            $myArray = consultaUsuarios($sql1, $link);
            desconecta($link);
            
            if(count($myArray) == 1 ){
                $instance->id = $myArray[0]['id'];
                $instance->tipo = $myArray[0]['tipo'];
                $instance->username = $myArray[0]['username'];
                $instance->apellidos = $myArray[0]['apellidos'];
                $instance->nombre = $myArray[0]['nombre'];
                $instance->email = $myArray[0]['email'];
                $instance->sexo = $myArray[0]['sexo'];
            }
            else{
                $instance->id = NULL;
                $instance->tipo = NULL;
                $instance->username = NULL;
                $instance->apellidos = NULL;
                $instance->nombre = NULL;
                $instance->email = NULL;
                $instance->sexo = NULL;
            }
            return $instance;
            
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
        
        public function getSexo(){
            return $this->sexo;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        
    }
?>