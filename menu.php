<?php
    require_once("Usuario.php");
    function setMenu($usuario, $sub, $cartelera){
        $carpeta = "";
        $principal = "";
        $tipo = -1;
        if( !is_null($usuario) ){
            $tipo = $usuario->getTipo();
        } 
        
        for( $i = 0; $i < $sub; $i++ ){
            $carpeta .= "../";
        }
        if($sub != -1){
            $principal = "index.php";
        }
        
        switch ($tipo) {
            /*case 1:
                return menuAdmin($carpeta);
            case 2:
                return menuUsuario($carpeta);
            case 3:
                return menuCafeteria($carpeta);
            case 4:
                return menuEntrada($carpeta);
             */
            case 2:
                return menuUsuario($carpeta, $principal, $usuario->getUsername(), $cartelera, false);
            default:
                return menuNormal($carpeta, $principal, $cartelera, false);
        }
    }
    
    function setMenuCafeteria($usuario){
        $tipo = -1;
        $carpeta = "../";
        $principal = "index.php";
        $cartelera = false;        
        if( !is_null($usuario) ){
            $tipo = $usuario->getTipo();
        } 
        
        switch ($tipo) {
            /*case 1:
                return menuAdmin($carpeta);
            case 2:
                return menuUsuario($carpeta);
            case 3:
                return menuCafeteria($carpeta);
            case 4:
                return menuEntrada($carpeta);
             */
            case 2:
                return menuUsuario($carpeta, $principal, $usuario->getUsername(), $cartelera,  true);
            default:
                return menuNormal($carpeta, $principal, $cartelera, true);
        }
    }
    
    function menuNormal($carpeta, $principal, $cartelera, $cafeteria){
        $menu = "";
        $menu .="	<nav class='navbar navbar-custom navbar-fixed-top' role='navigation'>"; 
        $menu .="        <div class='container'>"; 
        if( $cafeteria ){
            $menu .= "<div id='cd-cart-trigger'><a class='cd-img-replace' href='#0'>Cart</a></div>";
        }
        $menu .="            <div class='navbar-header page-scroll'>"; 
        $menu .="                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-main-collapse'>"; 
        $menu .="                    <i class='fa fa-bars'></i>"; 
        $menu .="                </button>";
        if( $cartelera ){
            $menu .="        <a href='#0' class='cd-filter-trigger'>Filtros</a>";
        }
        else{
            $menu .="                <a class='navbar-brand' href='".$carpeta."index.php'>"; 
            $menu .="                    <h1>AutoCinema</h1>"; 
            $menu .="                </a>"; 
        }
        $menu .="   </div>";
        $menu .="        <!-- Collect the nav links, forms, and other content for toggling -->"; 
        $menu .="        <div class='collapse navbar-collapse navbar-right navbar-main-collapse'>"; 
        $menu .="      		<ul class='nav navbar-nav'>"; 
        $menu .="	        	<li class='active'><a href='".$carpeta.$principal."#intro'>Home</a></li>"; 
        $menu .="		        <li><a href='".$carpeta."Cartelera/cartelera.php'>Cartelera</a></li>"; 
        $menu .="				<li><a href='".$carpeta.$principal."#ubicacion'>Ubicación</a></li>"; 
        $menu .="				<li><a href='".$carpeta.$principal."#contacto'>Contacto</a></li>"; 
        $menu .="				<li><a href='".$carpeta."Cafeteria/cafeteria.php'>Cafetería</a></li>"; 
        $menu .="		        <li class='dropdown'>"; 
        $menu .="		          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Login<b class='caret'></b></a>"; 
        $menu .="		          <ul class='dropdown-menu'>"; 
        $menu .="		            <li><a href='".$carpeta."login.php'>Iniciar Sesión</a></li>"; 
        $menu .="		            <li><a href='".$carpeta."signin.php'>Registrarse</a></li>"; 
        $menu .="		          </ul>"; 
        $menu .="            </div>"; 
        $menu .="            <!-- /.navbar-collapse -->"; 
        $menu .="        </div>"; 
        $menu .="        <!-- /.container -->"; 
        $menu .="    </nav>"; 
        return $menu;
    }

    function menuUsuario($carpeta, $principal, $nombre, $cartelera, $cafeteria){
        $menu = "";
        $menu .="	<nav class='navbar navbar-custom navbar-fixed-top' role='navigation'>"; 
        $menu .="        <div class='container'>"; 
        if( $cafeteria ){
            $menu .= "<div id='cd-cart-trigger'><a class='cd-img-replace' href='#0'>Cart</a></div>";
        }
        $menu .="            <div class='navbar-header page-scroll'>"; 
        $menu .="                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-main-collapse'>"; 
        $menu .="                    <i class='fa fa-bars'></i>"; 
        $menu .="                </button>"; 
        if( $cartelera ){
            $menu .="        <a href='#0' class='cd-filter-trigger'>Filtros</a>";
        }
        else{
            $menu .="                <a class='navbar-brand' href='".$carpeta."index.php'>"; 
            $menu .="                    <h1>AutoCinema</h1>"; 
            $menu .="                </a>"; 
        }
        $menu .="            </div>"; 
        $menu .="        <!-- Collect the nav links, forms, and other content for toggling -->"; 
        $menu .="        <div class='collapse navbar-collapse navbar-right navbar-main-collapse'>"; 
        $menu .="      		<ul class='nav navbar-nav'>"; 
        $menu .="	        	<li class='active'><a href='".$carpeta.$principal."#intro'>Home</a></li>"; 
        $menu .="		        <li><a href='".$carpeta."Cartelera/cartelera.php'>Cartelera</a></li>"; 
        $menu .="				<li><a href='".$carpeta.$principal."#ubicacion'>Ubicación</a></li>"; 
        $menu .="				<li><a href='".$carpeta.$principal."#contacto'>Contacto</a></li>"; 
        $menu .="				<li><a href='".$carpeta."Cafeteria/cafeteria.php'>Cafetería</a></li>"; 
        $menu .="		        <li class='dropdown'>"; 
        $menu .="		          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$nombre."<b class='caret'></b></a>"; 
        $menu .="		          <ul class='dropdown-menu'>"; 
        $menu .="		            <li><a href='".$carpeta."Perfil/perfil.php'>Perfil</a></li>"; 
        $menu .="		            <li><a href='".$carpeta."Perfil/editar.php'>Editar Perfil</a></li>";
        $menu .="		            <li><a href='".$carpeta."logout.php'>LogOut</a></li>"; 
        $menu .="		          </ul>"; 
        $menu .="            </div>"; 
        $menu .="            <!-- /.navbar-collapse -->"; 
        $menu .="        </div>"; 
        $menu .="        <!-- /.container -->"; 
        $menu .="    </nav>"; 
        return $menu;
}
?>