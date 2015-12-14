<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
    require_once("ListaDeFunciones.php");
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
    $idF = htmlspecialchars($_GET["id"] , ENT_QUOTES);
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
                                        <h4 class="title">Compra Boletos</h4>
                                    </div>
                                    <div class="content">
                                        <form action="comprarBoletoAction.php">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Pelicula</label>
                                                        <p>La Terminal</p>
                                                    </div>        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre del tarjetahabiente</label>
                                                        <input type="text" class="form-control" placeholder="Nombre" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Número de tarjeta</label>
                                                        <input type="text" class="form-control" placeholder="012345678" required>
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Fecha Vencimiento</label>
                                                        <input  type="text" class="form-control" placeholder="mm/yyyy"  id="fecha" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cod. Seguridad</label>
                                                        <input type="password" class="form-control" placeholder="773" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
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

    <!--datepicker-->
    <script src="../js/datepicker/bootstrap-datepicker.js"></script>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>

</body>
</html>
