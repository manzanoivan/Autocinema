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
                            <h4 class="title">Registrar Producto</h4>
                        </div>
                        <div class="content">
                            <form action="registroDeProducto.php" method = "POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="Nombre Producto" required name = "nombre" id = "nombre">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="number" class="form-control" min="0" required name = "precio" id = "precio">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Existencias Polanco</label>
                                            <input type="number" class="form-control" min="0" value="0" required name = "existencias1" id = "existencias1">
                                        </div>        
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label>Existencias Insurgentes</label>
                                            <input type="number" class="form-control" min="0" value="0" required name = "existencias2" id = "existencias2">
                                        </div>        
                                    </div>
                                    
                                </div>

								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="file"  accept="image/*" required name = "image" id = "image">
                                        </div>        
                                    </div>
                                </div>								
								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripción Producto</label>
                                            <textarea rows="5" class="form-control" placeholder="Descripción" required name = "descripcion" id = "descripcion"></textarea>
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

</body>
</html>
