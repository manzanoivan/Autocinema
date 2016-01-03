<?php
    require_once("../Usuario.php");
    require_once("../Cartelera/Boleto.php");
    require_once("../Cafeteria/TicketCafeteria.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
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

    <section id="profile" class="home-section">
        <?php
            if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 ){
        ?>        
            <div class="col-lg-12">
                <div class="row content-panel bg-white">
                  <div class="col-md-4 profile-text">
                    <br>
                    <h3>No tienes autorización para ver ésta página</h3>
                  </div><!-- --/col-md-4 ---->
                </div><!-- /row -->    
              </div>
        <?php
            }
            else{
        ?>
            <div class="col-lg-12">
              <div class="row content-panel bg-white">
                <div class="col-md-4 profile-text">
                    <br>
                    <h3>
                        <?php
                            echo $usuario->getNombre()." ".$usuario->getApellidos();
                        ?>
                      - Administrador
                    </h3>
                    <h6>
                        <?php
                            echo $usuario->getEmail();
                         ?>   
                    </h6>
                  <p></p>
                </div><!-- --/col-md-4 ---->
              </div><!-- /row -->    
            </div>


            <div class="col-lg-12 mt">    
              <div class="row content-panel bg-white">
                <div class="panel-heading">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                      <a data-toggle="tab" href="#overview">Comentarios</a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#contact" class="contact-map">Sugerencias de Películas</a>
                    </li>             
                  </ul>
                </div><!-- --/panel-heading ---->

                <div class="panel-body">
                  <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                      <div class="col-md-12 bg-white">
                        <div class="content-panel">
                          <hr>
                            <table class="table table-striped table-advance table-hover">
                                <?php
                                    $link = conecta();
                                    $sql1 = "SELECT idComentario, texto, email, nombre FROM comentario";
                                    $myArray = consultageneral($sql1, $link);
                                    desconecta($link);

                                    if( count( $myArray ) == 0 ){
                                ?>
                                    <h3>No hay comentarios</h3>
                                <?php
                                    }
                                    else{
                                ?>  
                                  <tbody>
                                    <?php
                                      foreach ($myArray as $comentario) {
                                        $idC = $comentario[0];
                                        $texto = $comentario[1];
                                        $email = $comentario[2];
                                        $nombre = $comentario[3];
                                    ?>
                                        <tr>
                                          <td class="hidden-phone"><?php echo $nombre; ?></td>
                                          <td><?php echo $email; ?></td>
                                          <td>
                                            <a href="responderComentario.php?id=<?php echo $idC; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                            <a href="eliminarComentario.php?id=<?php echo $idC; ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                          </td>
                                          <tr>
                                            <td colspan="3"> <strong>Comentario:</strong> <?php echo $texto; ?></td>
                                          </tr>
                                        </tr>
                                    <?php
                                      }
                                    ?>
                                  </tbody>
                                
                            <?php    
                                }
                            ?>
                          </table>
                        </div><!-- --/content-panel ---->
                      </div>
                    </div><!-- --/tab-pane ---->
                    <div id="contact" class="tab-pane">
                      <div class="col-md-12 bg-white">
                        <div class="content-panel">
                          <hr>
                            <table class="table table-striped table-advance">
                                <?php
                                    $link = conecta();
                                    $sql1 = "SELECT idPropuesta, textoPropuesta FROM propuesta";
                                    $myArray = consultageneral($sql1, $link);
                                    desconecta($link);

                                    if( count( $myArray ) == 0 ){
                                ?>
                                    <h3>No se hay sugerencias de películas</h3>
                                <?php
                                    }
                                    else{
                                ?>  
                                <thead>
                                  <tr>
                                    <th>Película</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      foreach ($myArray as $sugerencia) {
                                        $idS = $sugerencia[0];
                                        $texto = $sugerencia[1];
                                    ?>
                                      <tr>
                                        <td><?php echo $texto; ?></a></td>
                                        <td>
                                          <a href="eliminarSugerencia.php?id=<?php echo $idS; ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                        </td>
                                      </tr>
                                    <?php
                                      }
                                    ?>
                                </tbody>
                                
                            <?php    
                                }
                            ?>
                          </table>
                        </div><!-- --/content-panel ---->
                      </div>
                    </div><!-- --/tab-pane ---->

                  </div><!-- /tab-content -->
                </div><!-- --/panel-body ---->
              </div><!-- Content panel -->
            </div><!-- /col-lg-12 -->
          </section>

    <?php
        }
        echo getScripts(1);
    ?>

</body>
</html>
