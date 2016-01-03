<?php
	require_once("../Usuario.php");
	require_once("../connect_db.php");
	require_once ("../menu.php");
    require_once '../Header.php';

	session_start();
    date_default_timezone_set('America/Mexico_City');
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    } 

	$codigo = urlencode(htmlspecialchars($_GET["codigo"], ENT_QUOTES));
	$success = false;

	if( !isset($codigo) || is_null($codigo) || !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 4){
		header("Location: ../login.php");
	}

	$link = conecta();
	$sql1 = "SELECT horaEntrada, cantidad from boleto WHERE BINARY codigo='".$codigo."'";
    $res = consultageneral( $sql1 , $link );
    
    $horaEntrada = @$res[0][0];
    
    if( is_null( $horaEntrada ) && count($res) == 1){
		$ahora = new DateTime("now");
		$time = $ahora->format("Y-n-j H:i:s");

    	$sql1 = "UPDATE boleto SET horaEntrada='".$time."' WHERE BINARY codigo='".$codigo."'";
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

	<section id="login" class="home-section">
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
								<h5>Entrada aprobada</h5>
                                <h5>Válido por <?php echo $res[0][1];?> vehículos</h5>
		                        <div class="avatar"><img src="../img/icons/checked_true.png" alt="" class="img-responsive img-circle img-center" /></div>
	                    <?php
	                    	}
	                    	else{
						?>
		                        <h5>Entrada denegada</h5>
			                    <div class="avatar"><img src="../img/icons/checked_false.png" alt="" class="img-responsive img-circle img-center" /></div>
						<?php	                    		
	                    	}    
                        ?>
                    </div>
                </div>
        </div>     
  </section>

  	<?php
        echo getScripts(1);
    ?>

</body>

</html>