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
                            <h4 class="title">Registrar Película</h4>
                        </div>
                        <div class="content">
                            <form action="verpeliculas.html">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre Original</label>
                                            <input type="text" class="form-control" placeholder="Nombre Película" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre en Español</label>
                                            <input type="text" class="form-control" placeholder="Nombre Película" required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Clasificación</label>
                                            <select class="form-control">
                                              <option>AA</option>
                                              <option>A</option>
                                              <option>B15</option>
                                            </select>
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input  type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}"  placeholder="dd/mm/yyyy"  id="fecha" required>
                                        </div>        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Duración(Minutos)</label>
                                           <input type="number" class="form-control" min="1" value="1" required>
                                        </div>        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Video(URL)</label>
                                             <input type="url" class="form-control"  required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Director" required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="file" required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Actores</label>
                                            <input type="text" class="form-control" placeholder="Actores" required>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sinopsis</label>
                                            <textarea rows="5" class="form-control" placeholder="Sinopsis" required></textarea>
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

</body>
</html>
