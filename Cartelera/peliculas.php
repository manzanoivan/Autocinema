<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
	require_once 'ListaDePeliculas.php';
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

    <section id="tables" class="home-section">
      <div class="row mt bg-white">
        <div class="col-md-12">
          <div class="content-panel">
            <?php
                if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 ){
            ?>        
                <br>
                <h3>No tienes autorización para ver ésta página</h3>
            <?php
                }
                else{
            ?>
                <br>
                <h4><i class="fa fa-angle-right"></i>Películas</h4><h7><a href="registrarPelicula.php"><i class="fa fa-plus-square"></i> Agregar Película</h4></a><hr>
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Película</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  
				  <?php
					$listaDePeliculas = new ListaDePeliculas();
					$peliculas = $listaDePeliculas->getPeliculasWhere("");
					foreach ($peliculas as $pelicula) {
					?>
				
                  <tr>
                    <td><a href="revisarPelicula.php?id=<?php echo $pelicula->getId() ?>"><?php echo $pelicula->getNombre() ?></a></td>
                    <td>
                      <a href="modificarPelicula.php?id=<?php echo $pelicula->getId() ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                      <a href="eliminarPelicula.php?id=<?php echo $pelicula->getId() ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                    </td>
                  </tr> 
				  
				  <?php 
					} 				
					?>	
				  
                </tbody>
              </table>
          <?php
              }
          ?>
        </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->
    </div>
  </section>

  <?php
      echo getScripts(1);
  ?>
</body>
</html>
