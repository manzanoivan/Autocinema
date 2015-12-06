<?php
    function setMenu($tipo, $sub){
        $carpeta = "";
        for( $i = 0; $i < $sub; $i++ ){
            $carpeta .= "../";
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
            default:
                return menuNormal($carpeta);
        }
    }
    
    function setMenuIndex($tipo){
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
            default:
                return menuNormalIndex();
        }
    }
    
    
    
    function menuNormal($carpeta){
        $menu = "";
        $menu .="	<nav class='navbar navbar-custom navbar-fixed-top' role='navigation'>"; 
        $menu .="        <div class='container'>"; 
        $menu .="            <div class='navbar-header page-scroll'>"; 
        $menu .="                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-main-collapse'>"; 
        $menu .="                    <i class='fa fa-bars'></i>"; 
        $menu .="                </button>"; 
        $menu .="                <a class='navbar-brand' href='index.php'>"; 
        $menu .="                    <h1>AutoCinema</h1>"; 
        $menu .="                </a>"; 
        $menu .="            </div>"; 
        $menu .="        <!-- Collect the nav links, forms, and other content for toggling -->"; 
        $menu .="        <div class='collapse navbar-collapse navbar-right navbar-main-collapse'>"; 
        $menu .="      		<ul class='nav navbar-nav'>"; 
        $menu .="	        	<li class='active'><a href='".$carpeta."index.php#intro'>Home</a></li>"; 
        $menu .="		        <li><a href='".$carpeta."content-filter.html'>Cartelera</a></li>"; 
        $menu .="				<li><a href='".$carpeta."index.php#ubicacion'>Ubicación</a></li>"; 
        $menu .="				<li><a href='".$carpeta."index.php#contacto'>Contacto</a></li>"; 
        $menu .="				<li><a href='".$carpeta."product-comparison.html'>Cafeteria</a></li>"; 
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

    function menuNormalIndex(){
        $menu = "";
        $menu .="    <nav class='navbar navbar-custom navbar-fixed-top' role='navigation'>"; 
        $menu .="        <div class='container'>"; 
        $menu .="            <div class='navbar-header page-scroll'>"; 
        $menu .="                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-main-collapse'>"; 
        $menu .="                    <i class='fa fa-bars'></i>"; 
        $menu .="                </button>"; 
        $menu .="                <a class='navbar-brand' href='index.php'>"; 
        $menu .="                    <h1>AutoCinema</h1>"; 
        $menu .="                </a>"; 
        $menu .="            </div>"; 
        $menu .=""; 
        $menu .="            <!-- Collect the nav links, forms, and other content for toggling -->"; 
        $menu .="            <div class='collapse navbar-collapse navbar-right navbar-main-collapse'>"; 
        $menu .="      <ul class='nav navbar-nav'>"; 
        $menu .="        <li class='active'><a href='#intro'>Home</a></li>"; 
        $menu .="        <li><a href='cartelera.php'>Cartelera</a></li>"; 
        $menu .="        <li><a href='#ubicacion'>Ubicación</a></li>"; 
        $menu .="        <li><a href='#contacto'>Contacto</a></li>"; 
        $menu .="        <li><a href='cafeteria.php'>Cafeteria</a></li>"; 
        $menu .="        <li class='dropdown'>"; 
        $menu .="          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Login<b class='caret'></b></a>"; 
        $menu .="          <ul class='dropdown-menu'>"; 
        $menu .="            <li><a href='login.php'>Iniciar Sesión</a></li>"; 
        $menu .="            <li><a href='signin.php'>Registrarse</a></li>"; 
        $menu .="          </ul>"; 
        $menu .="        </li>"; 
        $menu .="      </ul>"; 
        $menu .="            </div>"; 
        $menu .="            <!-- /.navbar-collapse -->"; 
        $menu .="        </div>"; 
        $menu .="        <!-- /.container -->"; 
        $menu .="    </nav>"; 

        return $menu;
}
?>