<?php
    require_once("Usuario.php");
    require_once ("menu.php");
    require_once 'Header.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  
?>
<!DOCTYPE html>
<html>

<?php
    echo getHeader(0);
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
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
                <form class="form-login"  method='POST' action="registro.php">
                  <h2 class="form-login-heading">Registro</h2>
                  <div class="login-wrap">
                      <input class="form-control" placeholder="Nombre" autofocus="" name='nombre' type="text" required>
                      <br>
                      <input class="form-control" placeholder="Apellidos" autofocus="" name="apellidos" type="text" required>
                      <br>
                      <input class="form-control" placeholder="Usuario" autofocus="" name='usuario' type="text" required>
                      <br>
                      <input class="form-control" placeholder="Email" autofocus="" name='email' type="email" required>
                      <br>
                      <input class="form-control" placeholder="Password" name='password' type="password" required>
                      <br>
                      Sexo: 
                      <select name='sexo'>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                      </select>
                      <br>
                      <label class="checkbox">
                          <span class="pull-right">
                              <!--espacio entre iniciar y campos -->
                          </span>
                      </label>
                      <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>Registrarme</button>
                      <hr>
                  </div>
                </form>    
            <?php
            }
            else{
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

</body>
</html>
