<?php
    require_once("../Usuario.php");
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
                      <a data-toggle="tab" href="#contact" class="contact-map">Cafeteria</a>
                    </li>              
                  </ul>
                </div><!-- --/panel-heading ---->

                <div class="panel-body">
                  <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                      <div class="col-md-12 bg-white">
                        <div class="content-panel">
                          <hr>
                            <?php
                                $link = conecta();
                                $sql1 = "SELECT boleto.idBoleto AS id, boleto.fechaCompra AS fechaCompra, boleto.cantidad AS cantidad, boleto.codigo AS codigo, boleto.horaEntrada AS horaEntrada, tipo.nombre AS nombre, pago.fechaPago AS fechaPago, boleto.idFuncion AS idFuncion FROM boleto, tipoPago tipo, pagoBoleto pago, usuario WHERE usuario.idUsuario=pago.idUsuario AND tipo.idTipoPago=pago.idTipoPago AND boleto.idPagoBoleto=pago.idPago AND usuario.idUsuario=".$usuario->getId();
                                $myArray = consultaBoletos($sql1, $link);
                                desconecta($link);
                                if( count( $myArray ) == 0 ){
                            ?>
                                <h3>No has adquirido boletos</h3>
                            <?php
                                }
                                else{
                            ?>
                                <table class="table table-striped table-advance table-hover">
                                  <thead>
                                    <tr>
                                      <th>Función</th>
                                      <th>Fecha</th>
                                      <th>Hora</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        foreach ($myArray as $temp) {
                                            $link = conecta();
                                             $sql1 = "SELECT  FROM boleto, tipoPago tipo, pagoBoleto pago, usuario WHERE usuario.idUsuario=pago.idUsuario AND tipo.idTipoPago=pago.idTipoPago AND boleto.idPagoBoleto=pago.idPago AND usuario.idUsuario=".$usuario->getId();
                                            $myArray = consultaBoletos($sql1, $link);
                                            desconecta($link);
                                    ?>
                                      
                                        <tr>
                                            <td><a href="verboleto.jsp">La Terminal</a></td>
                                            <td>22 Nov</td>
                                            <td>9:30 pm</td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                  </tbody>
                                </table>
                              </div><!-- --/content-panel ---->
                            </div>
                          </div><!-- --/tab-pane ---->
                            <?php    
                                }
                            ?>
                    <div id="contact" class="tab-pane">
                      <div class="col-md-12 bg-white">
                        <div class="content-panel">
                          <hr>
                          <table class="table table-striped table-advance table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Fecha Compra</th>
                                <th>Fecha Entrega</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><a href="vercafcomp.jsp">1010</a></td>
                                <td>20 Noviembre</td>
                                <td>28 Noviembre</td>
                              </tr>
                              <tr>
                                <td><a href="vercafcomp.jsp">3403</a></td>
                                <td>12 Diciembre</td>
                                <td>14 Diciembre</td>
                              </tr>
                            </tbody>
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
