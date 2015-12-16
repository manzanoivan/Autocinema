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
                            <h4 class="title">Editar Stock</h4>
                        </div>											
                        <div class="content">
							<?php
								$id = $_GET['id'];
								$idSede = $_GET['sede'];
								$nombreSede="";
								$listaDeProductos = new ListaDeProductos();
								switch($idSede)
								{
									case 1: 
										$nombreSede="Polanco";
										break;
									case 2:
										$nombreSede="Insurgentes Sur";
										break;
								}
								$peliculas = $listaDeProductos->getProductosWhere("productoCafeteria.idProducto = ".$id);
								if($peliculas != null){
								//&sede=<?php echo ->getIdSede();?>
							
                            <form action="cambiarProductoSede.php?id=<?php echo $id;?>&sede=<?php echo $idSede?>" method = "POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
										<p><?php  echo"La sede es ".$nombreSede?> </p>
                                        <div class="form-group">
										
                                            <label>Nombre   </label>
                                            <?php echo $peliculas[0]->getNombre();?>
                                        </div>        
                                    </div>
								</div> 
								<div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <?php echo $peliculas[0]->getPrecio();?>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Stock </label>
                                             <input type="text" class="form-control" placeholder="Cantidad de stock" required value = "<?php echo $peliculas[0]->getExistencia();?>" name ="existencia" id ="existencia">
                                        </div>        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar</button>
								
                                <div class="clearfix"></div>
                            </form>
							<form action="eliminarProductoSede.php?id=<?php echo $id;?>&sede=<?php echo $idSede?>" method = "POST" enctype="multipart/form-data">
							 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            
											 <button type="submit" class="btn btn-danger btn-fill pull-right">Vaciar Stock</button>
											 
                                        </div>        
                                    </div>
                                </div>
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
