<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
    require_once( "../config.php" );
    require_once("ListaDeFunciones.php");
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
    $idF = htmlspecialchars(@$_GET["id"] , ENT_QUOTES);
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
                <div class="col-md-12">
                    <?php
                        if( !isset( $usuario ) || is_null($usuario->getId())){
                            header( "Location: ../login.php" );
                        }
                        else{
                            $listaDeFunciones = new ListaDeFunciones();
                            $funciones = $listaDeFunciones->getFuncionesWhere(" idFuncion='".$idF."'");
                            date_default_timezone_set('America/Mexico_City');
                            $info = new DateTime("now");
                            
                            if( count( $funciones ) > 1 || count( $funciones ) < 1){
                    ?>
                                <br>
                                <h3>No esxiste la función seleccionada</h3>
                    <?php            
                            }
                            elseif( $funciones[0]->getDisponibilidad() <= 0 ){
                    ?>
                                <br>
                                <h3>Lo sentimos, se han agotado los boletos para esta función</h3>
                    <?php
                            }
                            elseif( ($time = new DateTime($funciones[0]->getFecha())) < $info ){
                    ?>
                                <br>
                                <h3>Lo sentimos, la función ya ha sido proyectada</h3>
                    <?php
                            }
                            else{
                    ?>
                                <div class="card mb">
                                    <div class="header">
                                        <h4 class="title">Compra de Boletos</h4>
                                    </div>
                                    <div class="content">
                                        <form action="compraBoletoAction.php?id=<?php echo $idF; ?>" method="POST" id="card-form">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Película</label>
                                                        <p><?php echo $funciones[0]->getNombrePelicula(); ?> ( <?php echo $funciones[0]->getSegundoNombrePelicula(); ?>)</p>
                                                        <label>Sede:</label>
                                                        <p><?php echo $funciones[0]->getSede(); ?></p>
                                                        <label>Fecha:</label>
                                                        <p><?php 
                                                            $time = new DateTime($funciones[0]->getFecha());
                                                            $date = $time->format('d/m/Y');
                                                            $time = $time->format('h:i A');
                                                            echo $date." ".$time; 
                                                        ?></p>
                                                        <label>Costo por boleto:</label>
                                                        <p>$<?php echo $funciones[0]->getPrecio(); ?></p>
                                                    </div>        
                                                </div>
                                            </div>
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Mes de Vencimiento</label>
                                                        <input  type="text" class="form-control" placeholder="mm"  id="fecha" data-conekta="card[exp_month]" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Año de Vencimiento</label>
                                                        <input  type="text" class="form-control" placeholder="yyyy"  id="fecha2" data-conekta="card[exp_year]" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Cod. Seguridad</label>
                                                        <input type="password" class="form-control" placeholder="773" data-conekta="card[cvc]" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>#Boletos</label>
                                                       <input type="number" class="form-control" min="1" max="10" value="1" name="boletos" required>
                                                    </div>        
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Comprar</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?>
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
        
        });
    </script>

    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('#fecha2').datepicker({
                format: "mm-yyyy",
                viewMode: 1,
                minViewMode: 1
            });  
        
        });
    </script>
    

</body>
</html>
