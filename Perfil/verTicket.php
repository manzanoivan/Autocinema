<?php
    require_once("../Usuario.php");
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

	<section id="invoice" class="home-section">
		  <section class="wrapper">
       <div class="col-lg-12 mt bg-white">
       
        <div class="row content-panel">
          <div class="col-lg-10 col-lg-offset-1">
            <div class="invoice-body">
              <?php
                if( !isset( $usuario ) || is_null($usuario->getId()) ){
              ?>       
                  <div class="col-md-8"> 
                      <div class="card mb">
                          <div class="header">
                              <h4 class="title">No has iniciado sesión</h4>
                          </div>
                      </div>
                  </div>
              <?php
                }
                else{
                    $idB = htmlspecialchars($_GET["id"] , ENT_QUOTES);
                    $link = conecta();
                    $sql1 = "SELECT idCompra, fechaPago, referencia, nombre, fechaEntrega FROM compraCafeteria WHERE idUsuario=".$usuario->getId(). " AND idCompra='".$idB."' ORDER BY fechaPago DESC";
                    $myArray = consultaTicket($sql1, $link);
                    desconecta($link);
                    if( count( $myArray ) < 1 ||  count( $myArray ) > 1){
              ?>
                      <div class="col-md-8"> 
                          <div class="card mb">
                              <div class="header">
                                  <h4 class="title">No existe el ticket</h4>
                              </div>
                          </div>
                      </div>
              <?php
                    }
                    else{
              ?>        $ticket = new TicketCafeteria( $myArray[0] );
                            <div class="pull-left">

                              <h1>Autocinema</h1>
                              <address>
                              <strong>Sede</strong><br>
                              <?php  ?>
                              </address>
                            </div><!-- /pull-left -->
                            
                            <div class="pull-right">
                              <h2></h2>
                            </div><!-- --/pull-right ---->
                            
                            <div class="clearfix"></div>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                              <div class="col-md-9">
                                <h4>Juan Contreras</h4>
                              </div><!-- --/col-md-9 ---->
                              <div class="col-md-3"><br>
                                <div>
                                  <div class="pull-left"> Fecha Entrega : </div>
                                  <div class="pull-right"> 15/03/14 </div>
                                  <div class="clearfix"></div>
                                </div>
                              <div><!-- /col-md-3 -->
                              <div class="pull-left"> Hora Entrega : </div>
                              <div class="pull-right"> 8:30 pm</div>
                              <div class="clearfix"></div>
                            </div><!-- --/row ---->
                            <br>
                            <div class="well well-small green">
                              <div class="pull-left"> Forma Pago : </div>
                              <div class="pull-right"> Tarjeta </div>
                              <div class="clearfix"></div>
                            </div>
                          </div><!-- /invoice-body -->
                        </div><!-- --/col-lg-10 ---->
                        <table class="table">
                          <thead>
                          <tr>
                          <th style="width:60px" class="text-center">QTY</th>
                          <th class="text-left">DESCRIPCIÓN</th>
                          <th class="text-right">PRECIO UNITARIO</th>
                          <th class="text-right">TOTAL</th>
                          </tr>
                          </thead>
                            <tbody>
                              <tr>
                              <td class="text-center">1</td>
                              <td>Palomitas Grandes</td>
                              <td class="text-right">$60.00</td>
                              <td class="text-right">$60.00</td>
                              </tr>
                              <tr>
                              <td class="text-center">2</td>
                              <td>Refrescos Grandes</td>
                              <td class="text-right">$40.00</td>
                              <td class="text-right">$80.00</td>
                              </tr>
                              <tr>
                              <td colspan="2" rowspan="4"><h4></h4>
                                <p></p>
                              </td>
                              </tr>
                              <tr>
                              <td class="text-right no-border"><strong>Total</strong></td>
                              <td class="text-right">$140.00</td>
                              </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
              <?php        
                    }

                }
              ?>


              
    </div><!--/col-lg-12 mt -->
        
      
  </div></div></div></section>
  </section>

  <?php
    echo getScripts(1);
  ?>

</body>
</html>
