<?php
    date_default_timezone_set('America/Mexico_City');
	require_once("../Usuario.php");
	require_once("../connect_db.php");
	require_once ("../menu.php");
    require_once '../Header.php';
    require_once("../Cafeteria/TicketCafeteria.php");

	session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    } 

	$codigo = urlencode(htmlspecialchars($_GET["codigo"], ENT_QUOTES));
	$success = false;

	if( !isset($codigo) || is_null($codigo) || !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 3){
		header("Location: ../login.php");
	}

	$link = conecta();
	$sql1 = "SELECT fechaEntrega from compraCafeteria WHERE BINARY codigo='".$codigo."'";
    //echo $sql1;
    $res = consultageneral( $sql1 , $link );
    
    $horaEntrada = $res[0][0];
    echo $horaEntrada;

    if( is_null( $horaEntrada ) && count($res) == 1){
		$ahora = new DateTime("now");
		$time = $ahora->format("Y-n-j H:i:s");

    	$sql1 = "UPDATE compraCafeteria SET fechaEntrega='".$time."' WHERE BINARY codigo='".$codigo."'";
    	$insertar = insert($sql1, $link);
    	$success = true;
    }
    desconecta($link);
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
		<div class="container card-login">
            <h2 class="form-login-heading">
            	<?php
            		if( $success ){
            			echo "Aceptado";
            		}
            		else{
            			echo "Denegado";
            		}
            	?>
            </h2>
                <div class="team boxed-grey">
                    <div class="inner">
                    	<?php
                    		if( $success == true ){
                    	?>
								<h5>Entrega aprobada</h5>
		                        <div class="avatar"><img src="../img/icons/checked_true.png" alt="" class="img-responsive img-circle img-center" /></div>
	                    <?php
	                    	}
	                    	else{
						?>
		                        <h5>Entrega denegada</h5>
			                    <div class="avatar"><img src="../img/icons/checked_false.png" alt="" class="img-responsive img-circle img-center" /></div>
						<?php	                    		
	                    	}    
                        ?>
                    </div>
                </div>
        </div>  
    <section id="invoice" class="home-section">
          <section class="wrapper">
               <div class="col-lg-12 mt bg-white">
               
                <div class="row content-panel">
                  <div class="col-lg-10 col-lg-offset-1">
                    <div class="invoice-body">
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
                              <?php 
                                $link = conecta();
                                $sql1 = "SELECT idCompra, fechaPago, referencia, nombre, fechaEntrega, codigo FROM compraCafeteria WHERE codigo='".$codigo."' ORDER BY fechaPago DESC";
                                //echo $sql1;
                                $myArray = consultaTicket($sql1, $link);
                                
                                //var_dump($myArray);
                                desconecta($link);
                                $ticket = new TicketCafeteria( $myArray[0] );
                                  $suma = 0;
                                  foreach ($ticket->getProductos() as $temp): ?>
                                  <tr>
                                    <td class="text-center"><?php echo $temp['cantidad'];?></td>
                                    <td><?php echo $temp['nombre']?></td>
                                    <td class="text-right">$<?php echo $temp['precio'];?></td>
                                    <td class="text-right">$<?php $suma += $temp['cantidad']*$temp['precio']; echo $temp['cantidad']*$temp['precio'];?></td>
                                  </tr>
                              <?php endforeach ?>
                              <tr>
                              <td colspan="2" rowspan="4"><h4></h4>
                                <p></p>
                              </td>
                              </tr>
                              <tr>
                              <td class="text-right no-border"><strong>Total</strong></td>
                              <td class="text-right">$<?php echo $suma;?></td>
                              </tr>
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>
        </section>
    </section>    
  </section>

  	<?php
        echo getScripts(1);
    ?>

</body>

</html>