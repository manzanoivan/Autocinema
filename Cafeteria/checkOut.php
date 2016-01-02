<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once( "../config.php" );
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
                    if( count($productos) == 0 ){
                      header( "Location: cafeteria.php" );
                    }
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
                            <form action="compraCafeteriaAction.php" method="POST" id="card-form">
                                <div class="row">
                                    <span id="card-errors" class="card-errors"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre del tarjetahabiente</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" data-conekta="card[name]" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Número de tarjeta</label>
                                            <input type="text" class="form-control" placeholder="012345678" data-conekta="card[number]" required>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha Vencimiento</label>
                                            <input  type="text" class="form-control" placeholder="mm/yyyy"  id="fecha" required>
                                            <input type="hidden" name="mes" id="mes" data-conekta="card[exp_month]">
                                            <input type="hidden" name="anio" id="anio" data-conekta="card[exp_year]">
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cod. Seguridad</label>
                                            <input type="password" class="form-control" placeholder="773" data-conekta="card[cvc]" required>
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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>

    <script type="text/javascript">
     
     // Conekta Public Key
      Conekta.setPublishableKey('<?php echo $GLOBALS['PublicKey']; ?>');
     
     // ...
    </script>

    <script type="text/javascript">
        jQuery(function($) {
          
          
          var conektaSuccessResponseHandler;
          conektaSuccessResponseHandler = function(token) {
              var $form;
              $form = $("#card-form");
              /* Inserta el token_id en la forma para que se envíe al servidor */
              $form.append($("<input type=\"hidden\" name=\"conektaTokenId\" />").val(token.id));
              /* and submit */
              //$( "#card-errors" ).empty();
              $form.get(0).submit();
          };
          
          conektaErrorResponseHandler = function(token) {
              console.log(token);
              $form = $("#card-form");
              $form.find("button").prop("disabled", false);
              alert(token['message_to_purchaser']);
              //$( "#card-errors" ).append( token['message_to_purchaser'] );

          };
          
          $("#card-form").submit(function(event) {
              event.preventDefault();
              var $form;
              $form = $(this);
              /* Previene hacer submit más de una vez */
              $form.find("button").prop("disabled", true);
              Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
              /* Previene que la información de la forma sea enviada al servidor */
              return false;
          });
        });
    </script>

    <!--datepicker-->
    <script src="../js/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('#fecha').datepicker({
                format: "mm-yyyy",
                viewMode: 1,
                minViewMode: 1
            });  
            
            $('.datepicker').on('click', function(){
                    $('#mes').val( $('#fecha').val().substring(0, 2));
                    $('#anio').val( $('#fecha').val().substring(3, 7));
                    //alert($('#fecha').val());
                });
        });
    </script>

</body>
</html>
