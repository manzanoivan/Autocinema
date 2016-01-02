<?php
    require_once("Usuario.php");
    require_once ("menu.php");
    require_once 'Header.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    } 
    $codigo = urlencode(htmlspecialchars(@$_GET["codigo"], ENT_QUOTES));
?>
<!DOCTYPE html>
<html>
<?php
    echo getHeader(0);
?>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" onload="errorFunction()">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

        <?php
            echo setMenu( $usuario , 0, false);
        ?>
        

    <section id="login" class="home-section">
        <div class="container card-login">
            <?php
            if( !isset( $usuario ) || is_null($usuario->getId()) ){
            
            ?>
            <form class="form-login" action="loginAction.php" method="POST">
                <h2 class="form-login-heading">Login</h2>
                <div class="login-wrap">
                    <input class="form-control" placeholder="Usuario" autofocus="" type="text" name="user" required>
                    <br>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                    <label class="checkbox">
                        <span class="pull-right">
                            <!--espacio entre iniciar y campos -->
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.php" type="submit"><i class="fa fa-lock"></i>Iniciar Sesión</button>
                    <hr>
                    <div class="registration">
                        Aún no estas registrado?<br>
                        <a class="" href="signin.php">
                            Crear una cuenta
                        </a>
                    </div>
                    <?php
                        if( isset($codigo) && !is_null($codigo) )
                            echo "<input type='hidden' name='codigo' value='".$codigo."'>";
                    ?>    
                </div>
            </form>  
            <?php
            }
            else{
                if( $usuario->getTipo() == 3 ){
                    header("Location: Perfil/registrarEntrega.php?codigo=".$codigo."");
                }
                if( $usuario->getTipo() == 4 ){
                    header("Location: Perfil/registrarEntrada.php?codigo=".$codigo."");
                }
            ?>    
                <form class="form-login" action="" method="POST">
                    <h2 class="form-login-heading">Ya has iniciado sesión</h2>
                </form>
            <?php
            }
            ?>
        </div>
    </section>

    <?php
        echo getScripts(0);
    ?>
    <script>
        function errorFunction(){
            <?php
                if( isset( $_SESSION['errorLogin'] ) ){
                    echo "alert('{$_SESSION['errorLogin']}');";
                    unset($_SESSION['errorLogin']);
                }
            ?>
        }
    </script>

</body>

</html>
