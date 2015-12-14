<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
    require_once("ListaDeFunciones.php");
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
                <br><h4><i class="fa fa-angle-right"></i>Funciones</h4><h7><a href="registrarfuncion.php"><i class="fa fa-plus-square"></i> Agregar Función</h4></a><hr>
                <?php
                  $listaDeFunciones = new ListaDeFunciones();
                  $funciones = $listaDeFunciones->getFuncionesWhereDescOrder("");
                  if( count($funciones) == 0 ){
                ?>
                  <br>
                  <h3>No existen funciones registradas</h3>
                <?php
                  }
                  else{
                ?>
                    <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>Fecha y hora</th>
                          <th>Película</th>
                          <th>Estatus</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($funciones as $funcion) {
                            $time = new DateTime($funcion->getFecha());
                            $time = $time->format('j/n/Y H:i');
                        ?>
                          <tr>
                            <td><a href="revisarfuncion.php?id=<?php echo $funcion->getId(); ?>"><?php echo $time ?></a></td>
                            <td><a href="revisarPelicula.php?id=<?php echo $funcion->getIdPelicula(); ?>"><?php echo $funcion->getNombrePelicula() ?></a></td>
                            <td>
                              <?php
                                date_default_timezone_set('America/Mexico_City');
                                $info = new DateTime("now");
                                $time = new DateTime($funcion->getFecha());
                                if( $time < $info ){
                              ?>
                                  <span class="label label-warning label-mini">Proyectada</span>
                              <?php  
                                }          
                                else{
                              ?>
                                  <span class="label label-success label-mini">Por proyectar</span>
                              <?php  
                                }
                              ?>
                            </td>
                            <td>
                              <a href="modificarFuncion.php?id=<?php echo $funcion->getId(); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                              <a href="eliminarFuncion.php?id=<?php echo $funcion->getId(); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
