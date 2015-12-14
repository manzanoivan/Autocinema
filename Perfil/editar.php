<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  
?>
<!DOCTYPE html>
<html>

<?php
    echo getHeader(1);
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <?php
        echo setMenu( $usuario , 1, false);
    ?>

	<section id="login" class="home-section">
            <div class="container card-login">
                <?php
                    if( isset( $usuario ) && !is_null($usuario->getId()) ){

                ?>
                        <form class="form-login" method="POST" action="editarAction.php">
                          <h2 class="form-login-heading">Editar Perfil</h2>
                          <div class="login-wrap">
                              Nombre: <input class="form-control" placeholder="Nombre" autofocus="" name='nombre' type="text" value="<?php echo $usuario->getNombre(); ?>" required>
                              <br>
                              Apellidos: <input class="form-control" placeholder="Apellidos" autofocus="" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" type="text" required>
                              <br>
                              Usuario: <input class="form-control" placeholder="Usuario" autofocus="" name='usuario' value="<?php echo $usuario->getUsername(); ?>" type="text" required>
                              <br>
                              Email: <input class="form-control" placeholder="Email" autofocus="" name='email' value="<?php echo $usuario->getEmail(); ?>" type="email" required>
                              <br>
                              Sexo: 
                              <select name='sexo'>
                                 <?php 
                                    $bandSexo = false;
                                    if( $usuario->getSexo() == 1 ) $bandSexo = true;
                                         
                                ?>
                                <option value="1" <?php if( $bandSexo ) echo "selected"; ?>>Hombre</option>
                                <option value="2" <?php if( !$bandSexo ) echo "selected";?> >Mujer</option>
                              </select>
                              <br>
                              <hr>
                              Password: <input class="form-control" placeholder="Password" name='password' type="password">
                              <br>
                              Confirmar password: <input class="form-control" placeholder="Password" name='confirmacion' type="password">
                              <br>
                              
                              <label class="checkbox">
                                  <span class="pull-right">
                                      <!--espacio entre iniciar y campos -->
                                  </span>
                              </label>
                              <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>Actualizar</button>
                              <hr>
                          </div>
                        </form>
                <?php
                    }
                    else{
                ?>
                        <form class="form-login" action="" method="POST">
                            <h2 class="form-login-heading">No has iniciado sesión sesión</h2>
                        </form>
                <?php
                    }
                ?>
            </div>
        </section>

   <?php
        echo getScripts(1);
    ?>

</body>
</html>
