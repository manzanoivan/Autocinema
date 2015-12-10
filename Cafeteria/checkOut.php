<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
	require_once('ListaDeProductos.php');
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
  <link rel="stylesheet" href="css/datepicker/datepicker.css">
  <div id="preloader">
    <div id="load"></div>
  </div>

    <?php
        echo setMenu( $usuario , 1, false);
    ?>

    <section id="edit" class="home-section">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb">
                        <div class="header">
                            <h4 class="title">Compra cafetería</h4>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                            <th style="width:60px" class="text-center">#</th>
                            <th class="text-left">DESCRIPCIÓN</th>
                            <th class="text-right">PRECIO UNITARIO</th>
                            <th class="text-right">TOTAL</th>
                            </tr>
                            </thead>
                              <tbody>
							  
								<?php 
									$total = 0;
									$productos = NULL;
									if(isset( $_SESSION["carrito"] ) ){
										$productos = $_SESSION['carrito']; 
									}
									if(!is_null($productos)){
										$i = 0;
										foreach($productos as $producto){
											$total = $total + ($producto[0]->getPrecio()*$producto[1]);
								?>
								
                                <tr>
                                <td class="text-center"><?php echo $producto[1];?></td>
                                <td><?php echo $producto[0]->getSede();?> - <?php echo $producto[0]->getNombre();?></td>
                                <td class="text-right">$<?php echo $producto[0]->getPrecio();?></td>
                                <td class="text-right">$<?php echo $producto[0]->getPrecio()*$producto[1];?></td>
                                </tr>
                               
								<?php 
										$i = $i + 1;
										}
									}
								?>
							   
                                <tr>
                                <td colspan="2" rowspan="4"><h4></h4>
                                  <p></p>
                                </td>
                                </tr>
                                <tr>
                                <td class="text-right no-border"><strong>Total</strong></td>
                                <td class="text-right">$<?php echo $total;?></td>
                                </tr>
                              </tbody>
                          </table>
                        <hr>
                        <div class="content">
                            <form action="compra.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="Nombre" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Numero Tarjeta</label>
                                            <input type="text" class="form-control" placeholder="012345678" required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>
                                            <select class="form-control">
                                              <option>Visa</option>
                                              <option>MasterCard</option>
                                            </select>
                                        </div>        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha Vencimiento</label>
                                            <input  type="text" class="form-control" placeholder="dd/mm/yyyy"  id="fecha" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cod. Seguridad</label>
                                            <input type="password" class="form-control" placeholder="773" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>#Boletos</label>
                                           <input type="number" class="form-control" min="1" max="10" value="1" required>
                                        </div>        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Comprar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
    </section>

    <?php
        echo getScripts(1);
    ?>

    <!--datepicker-->
    <script src="js/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('#fecha').datepicker({
                format: "mm/yyyy",
                viewMode: 1,
                minViewMode: 1
            });  
        
        });
    </script>

</body>
</html>
