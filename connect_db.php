<?php 
    include_once("config.php");
    function conecta(){
        $server = $GLOBALS['DBServer'];
        $user = $GLOBALS['DBUser'];
        $pass = $GLOBALS['DBPass'];
        $bd = $GLOBALS['DBName'];
        $link = @mysqli_connect($server, $user, $pass,$bd) or die;
        if (mysqli_connect_errno())
        {
            return "";
        }
        return $link;
    }
    function consultageneral($sql,$link){
        mysqli_set_charset($link, "utf8");
        if(!$result = mysqli_query($link,$sql)) 
            die();
        $rawdata = array();
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            //$id=$row['id_nivel'];
            //$desc=$row['descripcion'];
            //$rawdata[] = array('id'=> $id, 'descripcion'=> $desc);
            $rawdata[$i] = $row;
            $i++;
        }
        return $rawdata;
    }
    
    function consultaUsuarios($sql,$link){
        mysqli_set_charset($link, "utf8");
        if(!$result = mysqli_query($link,$sql)){ 
            die();
        }
        $rawdata = array();
        while($row = mysqli_fetch_array($result))
        {
            $rawdata[] = [ 'nombre' => $row['nombre'], 'apellidos' => $row['apellidos'], 'id' => $row['idUsuario'], 'email' => $row['email'] , 'tipo' => $row['tipo'] , 'username' => $row['username']];
        }
        return $rawdata;
    }

    function insert($sql,$link){
        mysqli_set_charset($link, "utf8");
        if(!$result = mysqli_query($link,$sql)) 
            die();
        if($result == true)
            return "yes";
        else
            return "no"; 
    }

    function desconecta($link)
    {
        mysqli_close($link);
    }
?>