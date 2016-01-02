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
            if( !isset( $usuario ) || is_null($usuario->getId()) ){
        ?>        
            <div class="col-lg-12">
                <div class="row content-panel bg-white">
                  <div class="col-md-4 profile-text">
                    <br>
                    <h3>No has iniciado sesión</h3>
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
                      <a data-toggle="tab" href="#overview">Boletos</a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#contact" class="contact-map">Cafetería</a>
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
                                    $sql1 = "SELECT boleto.idBoleto AS id, boleto.fechaCompra AS fechaCompra, boleto.cantidad AS cantidad, boleto.codigo AS codigo, boleto.horaEntrada AS horaEntrada, tipo.nombre AS tipo, pago.fechaPago AS fechaPago, boleto.idFuncion AS idFuncion, pago.nombre AS nombre, pago.referencia AS referencia FROM boleto, tipoPago tipo, pagoBoleto pago, usuario WHERE usuario.idUsuario=pago.idUsuario AND tipo.idTipoPago=pago.idTipoPago AND boleto.idPagoBoleto=pago.idPago AND usuario.idUsuario=".$usuario->getId(). " ORDER BY boleto.fechaCompra DESC";
                                    $myArray = consultaBoletos($sql1, $link);
                                    desconecta($link);

                                    if( count( $myArray ) == 0 ){
                                ?>
                                    <h3>No has adquirido boletos</h3>
                                <?php
                                    }
                                    else{
                                ?>  
                                <thead>
                                    <tr>
                                      <th>Función</th>
                                      <th>Fecha</th>
                                      <th>Hora</th>
                                      <th>Estatus</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        date_default_timezone_set('America/Mexico_City');
                                        foreach ($myArray as $temp) {
                                          $ticket = new Boleto( $temp );
                                          $time = new DateTime($ticket->getFuncion()->getFecha());
                                          $entrada = $ticket->getHoraEntrada();
                                          $ahora = new DateTime("now");
                                          $date = $time->format('j-n-Y');
                                          $time = $time->format('H:i');
                                    ?>
                                      
                                        <tr>
                                            <td><a href="verBoleto.php?id=<?php echo $ticket->getId();?>"><?php echo $ticket->getFuncion()->getNombrePelicula();?></a></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $time;?></td>
                                            <td>
                                              <?php
                                                $hrFuncion = new DateTime($ticket->getFuncion()->getFecha());
                                                if( !is_null($entrada) ){
                                                  echo "<span class='label label-success label-mini'>Asistió</span>";
                                                }
                                                elseif( $ahora < $hrFuncion ){
                                                  echo "<span class='label label-warning label-mini'>Pendiente</span>";
                                                }
                                                else{
                                                  echo "<span class='label label-danger label-mini'>No asistió</span>";
                                                }
                                              ?>
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
                    <div id="contact" class="tab-pane">
                      <div class="col-md-12 bg-white">
                        <div class="content-panel">
                          <hr>
                            <table class="table table-striped table-advance table-hover">
                                <?php
                                    $link = conecta();
                                    $sql1 = "SELECT idCompra, fechaPago, referencia, nombre, fechaEntrega, codigo FROM compraCafeteria WHERE idUsuario=".$usuario->getId(). " ORDER BY fechaPago DESC";
                                    $myArray = consultaTicket($sql1, $link);
                                    desconecta($link);

                                    if( count( $myArray ) == 0 ){
                                ?>
                                    <h3>No has realizado compras en la cafetería</h3>
                                <?php
                                    }
                                    else{
                                ?>  
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Fecha Compra</th>
                                      <th>Fecha Entrega</th>
                                      <th>Estatus</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        foreach ($myArray as $temp) {
                                          $ticket = new TicketCafeteria( $temp );
                                          $time = new DateTime($ticket->getFechaPago());
                                          $ahora = new DateTime("now");
                                          $dateE = "- - - -";
                                          if( !is_null( $ticket->getFechaEntrega() ) ){
                                            $time2 = new DateTime($ticket->getFechaEntrega());  
                                            $dateE = $time2->format('j/n/Y H:i A');
                                          }
                                          $date = $time->format('j/n/Y H:i A');
                                    ?>
                                      
                                        <tr>
                                            <td><a href="verTicket.php?id=<?php echo $ticket->getId();?>"><?php echo $ticket->getId();?></a></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $dateE;?></td>
                                            <td>
                                            <?php
                                              if( !is_null( $ticket->getFechaEntrega() )){
                                                echo "<span class='label label-success label-mini'>Entregado</span>";
                                              }
                                              else{
                                                $time->add(new DateInterval('P1D'));
                                                if( $time < $ahora ){
                                                  echo "<span class='label label-danger label-mini'>No entregado</span>";
                                                }
                                                else{
                                                  echo "<span class='label label-warning label-mini'>Pendiente</span>";
                                                }
                                                
                                              } 
                                            ?>
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
