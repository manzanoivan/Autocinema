<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once("ListaDeFunciones.php");
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
                <div class="col-md-8">
				
					<!-- EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO -->
					
					<?php
						$id = $_GET['id'];
						$listaDeFunciones = new ListaDeFunciones();
						$funciones = $listaDeFunciones->getFuncionesWhere("idFuncion = ".$id);
						if($funciones != null){
					?>
					
                    <div class="card mb">
                        <div class="header">
                            <h4 class="title nomg"><?php echo $funciones[0]->getNombrePelicula() ?></h4>
                            <h6>(<?php echo $funciones[0]->getSegundoNombrePelicula() ?>)</h6>
                        </div>
                        <div class="content">
                            <form>                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Director</label>
                                            <p><?php echo $funciones[0]->getDirector() ?></p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Año</label>
                                            <p><?php echo $funciones[0]->getAnio() ?></p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Clasificación</label>
                                            <p><?php echo $funciones[0]->getClasificacion() ?></p>
                                        </div>        
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Actores</label>
                                            <p><?php echo $funciones[0]->getActores() ?></p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Duración</label>
                                            <p><?php echo $funciones[0]->getDuracion() ?></p>
                                        </div>        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sinopsis</label>
                                            <p>
                                                <?php echo $funciones[0]->getSinopsis() ?>
                                            </p>                                           
                                        </div>        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
					
					<?php
						}
						else{
							//AQUÍ SE REDIRECCIONA AL ERROR	
						}
					?>
					<!-- EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO -->
                </div>
				
				<!-- EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO -->	
                <div class="col-md-4">
                    <div class="card card-user mb">
                        <div class="image resimg">
                            <img src="<?php echo $funciones[0]->getImagen() ?>" alt="QR"/>   
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="<?php echo $funciones[0]->getTrailer() ?>"  target="_blank"><button class="btn btn-info btn-fill">Trailer</button></a>
                        </div>
                    </div>
                </div>
				<!-- EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO EDITADO -->
            </div>                    
        </div> 
    </section>

    <?php
        echo getScripts(1);
    ?>

</body>

</html>
