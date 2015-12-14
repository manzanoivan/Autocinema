<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
    require_once 'ListaDePeliculas.php';
    require_once 'ListaDeSedes.php';
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
                <div class="col-md-12">
                    <?php
                        if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 ){
                    ?>        
                        <br>
                        <h3>No tienes autorización para ver ésta página</h3>
                    <?php
                        }
                        else{
                            $listaSedes = new ListaDeSedes();
                            $listaDePeliculas = new ListaDePeliculas();
                            $peliculas = $listaDePeliculas->getPeliculasWhere("");
                            $sedes = $listaSedes->getSedes();
                            if( count($peliculas) == 0 ){
                    ?>
                            <br>
                            <h3>No hay películas registradas</h3>  
                    <?php            
                            }
                            else{
                    ?>
                                <div class="card mb">
                                    <div class="header">
                                        <h4 class="title">Registrar Función</h4>
                                    </div>
                                    <div class="content">
                                        <form action="registrarFuncionAction.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Película</label>
                                                        <select id="pelicula" name="pelicula" class="form-control">
                                                            <?php            
                                                                foreach ($peliculas as $pelicula) {
                                                            ?>
                                                                  <option value="<?php echo $pelicula->getId(); ?>"><?php echo $pelicula->getNombre(); ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sede</label>
                                                        <select id="sede" name="sede" class="form-control">
                                                            <?php

                                                                foreach ($sedes as $sede) {
                                                            ?>
                                                                  <option value="<?php echo $sede['id']; ?>"><?php echo $sede['nombre']; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Precio</label>
                                                        <input id="precio" name="precio" type="text" class="form-control" placeholder="22.50" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cupo</label>
                                                        <input name="cupo" type="number" class="form-control" min="1" value="1"  required>
                                                    </div>        
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input id="fecha" name="fecha" type="text" class="form-control" placeholder="dd/mm/yyyy"  id="fecha" required>
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tiempo</label>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="timepicker1" name="time" type="text" class="form-control">
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Registrar</button>
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
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>

    <!--timepicker-->
    <script src="../js/timepicker/bootstrap-timepicker.js"></script>
    <script type="text/javascript">
        $('#timepicker1').timepicker({
            minuteStep: 1
        });
    </script>

</body>
</html>
