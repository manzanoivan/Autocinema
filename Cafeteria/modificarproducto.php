<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
	require_once 'ListaDeProductos.php';
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
                            <h4 class="title">Editar Producto</h4>
                        </div>											
                        <div class="content">
							<?php
								$id = $_GET['id'];
								$listaDeProductos = new ListaDeProductos();
								$peliculas = $listaDeProductos->getProductosWhere("productoCafeteria.idProducto = ".$id);
								if($peliculas != null){
							?>
                            <form action="cambiarProducto.php?id=<?php echo $id;?>" method = "POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="Nombre Producto" required value = "<?php echo $peliculas[0]->getNombre();?>" name = "nombre" id = "nombre">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="number" class="form-control"   min="0" required name = "precio" id = "precio" value = "<?php echo $peliculas[0]->getPrecio();?>">
                                        </div>        
                                    </div>
                                </div>
								<div class="row">
                                    <img src="data:image/png;base64,<?php echo base64_encode( $peliculas[0]->getImagen() );  ?>" alt="QR"/>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="file" accept="image/*" name = "image" id = "image">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripción Producto</label>
                                            <textarea rows="5" class="form-control" placeholder="Descripción" required name = "descripcion" id = "descripcion"><?php echo $peliculas[0]->getDescripcion();?></textarea>
                                        </div>        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar</button>
                                <div class="clearfix"></div>
                            </form>
						<?php
							}
							else{
								echo "Este producto no existe";
							}
						?>
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
