<?php
    require_once("../Usuario.php");
    require_once("../Cartelera/Boleto.php");
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

    <section id="edit" class="home-section">
        <div class="container-fluid bg-white">
            <div class="row">
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
                        $sql1 = "SELECT boleto.idBoleto AS id, boleto.fechaCompra AS fechaCompra, boleto.cantidad AS cantidad, boleto.codigo AS codigo, boleto.horaEntrada AS horaEntrada, tipo.nombre AS tipo, pago.fechaPago AS fechaPago, boleto.idFuncion AS idFuncion, pago.nombre AS nombre, pago.referencia AS referencia FROM boleto, tipoPago tipo, pagoBoleto pago, usuario WHERE usuario.idUsuario=pago.idUsuario AND tipo.idTipoPago=pago.idTipoPago AND boleto.idPagoBoleto=pago.idPago AND usuario.idUsuario=".$usuario->getId(). " AND boleto.idBoleto='".$idB. "' ORDER BY boleto.fechaCompra DESC";
                        $myArray = consultaBoletos($sql1, $link);
                        desconecta($link);

                        if( count( $myArray ) < 1 ||  count( $myArray ) > 1){
                ?>
                            <div class="col-md-8"> 
                                <div class="card mb">
                                    <div class="header">
                                        <h4 class="title">No existe el boleto</h4>
                                    </div>
                                </div>
                            </div>
                <?php   
                    }
                        else{
                            $ticket = new Boleto( $myArray[0] );
                ?>
                            <div class="col-md-8">
                                <div class="card mb">
                                    <div class="header">
                                        <h4 class="title">Detalles Compra</h4>
                                    </div>
                                    <div class="content">
                                        <form action="perfil.php">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Comprador</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $ticket->getNombre(); ?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Forma de Pago</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $ticket->getTipo(); ?>">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre Función</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $ticket->getFuncion()->getNombrePelicula(); ?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Fecha Función</label>
                                                        <?php 
                                                            $time = new DateTime($ticket->getFuncion()->getFecha());
                                                            $date = $time->format('j-n-Y');
                                                            $time = $time->format('H:i');
                                                        ?>
                                                        <input type="text" class="form-control" disabled value="<?php echo $date ?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Hora Función</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $time ?>">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Precio Unitario</label>
                                                        <input type="text" class="form-control" disabled value="$<?php echo $ticket->getFuncion()->getPrecio(); ?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cantidad Boletos</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $ticket->getCantidad(); ?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cantidad Pagada</label>
                                                        <input type="text" class="form-control" disabled value="$<?php echo $ticket->getFuncion()->getPrecio() * $ticket->getCantidad(); ?>">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sede</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $ticket->getFuncion()->getSede();?>">
                                                    </div>        
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right"  >Regresar al Perfil</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-user mb">
                                    <div class="image resimg">
                                        <img src="data:image/png;base64,<?php echo base64_encode( $ticket->getFuncion()->getImagen() );  ?>" alt="QR"/>   
                                    </div>
                                    <div class="content">
                                        <p class="description text-center">Codigo QR
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <?php
                                            echo $ticket->getCodigo();
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
            <?php
                    }
                }
            ?>
        </div> 
    </section>

    <?php
        echo getScripts(1);
    ?>

</body>

</html>
