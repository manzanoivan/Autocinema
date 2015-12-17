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
                                    <tr>
                                      <td class="hidden-phone">Orlando Montiel</td>
                                      <td>orlmontiel@gmail.com</td>
                                      <td>
                                        <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                      </td>
                                      <tr>
                                        <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium?</td>
                                      </tr>
                                    </tr>

                                    <tr>
                                      <td class="hidden-phone">Lucia Jimenez</td>
                                      <td>orluci jim@gmail.com</td>
                                      <td>
                                        <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                      </td>
                                      <tr>
                                        <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus repellat sed voluptatem dignissimos possimus suscipit nisi consequatur inventore, magnam modi. Unde earum ad voluptatum magni pariatur, nam aspernatur! Deserunt, sint. </td>
                                      </tr>
                                    </tr>

                                    <tr>
                                      <td class="hidden-phone">Jesus Rodriguez</td>
                                      <td>jesrod@gmail.com</td>
                                      <td>
                                        <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                      </td>
                                      <tr>
                                        <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore corporis maiores deserunt voluptates harum reiciendis expedita tempora consequatur impedit! Quisquam ipsa minima laboriosam quibusdam pariatur id aspernatur, deserunt nesciunt repellendus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, enim, ipsam. Placeat mollitia obcaecati in dolorem. Atque laboriosam illo, qui eius nemo unde voluptatibus et repudiandae, fuga eaque, a aliquid.</td>
                                      </tr>
                                    </tr>
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
                                  <tr>
                                    <td>Titanic</a></td>
                                    <td>
                                      <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                  </tr>
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
