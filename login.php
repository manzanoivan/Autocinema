<?php
    require_once("Usuario.php");
    require_once ("Menu.php");
    session_start();
    if(@!is_null( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocinema Coyote</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
	<!-- Backstretch CSS -->
    <link href="css/backstretch.css" rel="stylesheet">
	<!-- login CSS -->
  <link rel="stylesheet" href="css/login.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

        <?php
            if( @is_null( $usuario ) || @is_null($usuario->getId()) ){
                echo setMenu(-1);
            }
            else{
                echo setMenu( $usuario->getTipo() );
            }
        ?>
        

    <section id="login" class="home-section">
        <div class="container card-login">
            <?php
            if( @is_null( $usuario ) || @is_null($usuario->getId()) ){
                echo setMenu(-1);
            
            ?>
            <form class="form-login" action="loginAction.php" method="POST">
                <h2 class="form-login-heading">Login</h2>
                <div class="login-wrap">
                    <input class="form-control" placeholder="Usuario" autofocus="" type="text" name="user">
                    <br>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                    <label class="checkbox">
                        <span class="pull-right">
                            <!--espacio entre iniciar y campos -->
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>Iniciar Sesión</button>
                    <hr>                
                    <div class="login-social-link centered">
                        <p>Mediante Redes Sociales</p>
                        <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                        <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                    </div>
                    <div class="registration">
                        Aún no estas registrado?<br>
                        <a class="" href="#">
                            Crear una cuenta
                        </a>
                    </div>    
                </div>
            </form>  
            <?php
            }
            else{
            ?>    
                <form class="form-login" action="loginAction.php" method="POST">
                    <h2 class="form-login-heading">Ya has iniciado sesión</h2>
                </form>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/backstretch/jquery.backstretch.js"></script>
	<script>
        $.backstretch([
          "img/intro/1.jpg",
          "img/intro/2.jpg",
          "img/intro/3.jpg"
        ], {
            fade: 750,
            duration: 4000
        });
    </script>

</body>

</html>
