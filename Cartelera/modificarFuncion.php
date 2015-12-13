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

    <section id="edit" class="home-section">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb">
                        <div class="header">
                            <h4 class="title">Modificar Función</h4>
                        </div>
                        <div class="content">
                            <form action="registrar.jsp">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Película</label>
                                            <select class="form-control">
                                              <option>La Terminal</option>
                                              <option>Daredevil</option>
                                            </select>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" class="form-control" placeholder="22.50" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input  type="text" class="form-control" placeholder="dd/mm/yyyy"  id="fecha">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tiempo</label>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker1" type="text" class="form-control">
                                            </div>
                                        </div>        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Registrar</button>
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
