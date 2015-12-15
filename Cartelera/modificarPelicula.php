<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
    require_once '../connect_db.php';
	require_once 'ListaDePeliculas.php';
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
                            <h4 class="title">Editar Película</h4>
                        </div>
                        <div class="content">
						
						<?php
							$id = $_GET['id'];
							$listaDePeliculas = new ListaDePeliculas();
							$peliculas = $listaDePeliculas->getPeliculasWhere("idPelicula = ".$id);
							if($peliculas != null){
						?>
						
                            <form action="editarPelicula.php?id=<?php echo $peliculas[0]->getId() ?>" method = "POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre Original</label>
                                            <input type="text" class="form-control" placeholder="Nombre Película" required value = "<?php echo $peliculas[0]->getNombre() ?>" name = "nombre" id = "nombre">
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre en Español</label>
                                            <input type="text" class="form-control" placeholder="Nombre Película" required value = "<?php echo $peliculas[0]->getSegundoNombre() ?>" name = "segundoNombre" id = "segundoNombre">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Clasificación</label>
                                            <select class="form-control" name = "clasificacion" id = "clasificacion">
                                              <?php
													$link = conecta();
													mysqli_set_charset($link, "utf8");
													if(!$result = mysqli_query($link,"SELECT idClasificacion, nombre FROM clasificacion")){ 
														die();
													}
													while($row = mysqli_fetch_array($result))
													{
														$selected = "";	
														if($row['nombre'] == $peliculas[0]->getClasificacion()){															
															$selected = "selected";
														}
												?>
														<option value = "<?php echo $row['idClasificacion'];?>" <?php echo $selected; ?>><?php echo $row['nombre'];?></option>
												<?php
													}		
													desconecta($link);
												?>
                                            </select>
                                        </div>        
                                    </div>
                                    
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Año</label>
                                            <input  type="text" class="form-control"  placeholder="Año"   required name = "anio" id = "anio" value = "<?php echo $peliculas[0]->getAnio(); ?>">
                                        </div>        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Duración(Minutos)</label>
                                           <input type="number" class="form-control" min="1"  required name = "duracion" id = "duracio" value = <?php echo $peliculas[0]->getDuracion(); ?>>
                                        </div>        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Video(URL)</label>
                                             <input type="url" class="form-control"  required name = "trailer" id = "trailer" value = "<?php echo $peliculas[0]->getTrailer(); ?>">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Director" required name = "director" id = "director" value = "<?php echo $peliculas[0]->getDirector(); ?>">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Imagen</label>
											<br>
											<img src="data:image/png;base64,<?php echo base64_encode( $peliculas[0]->getImagen() );  ?>" alt="QR"/>
                                            <input type="file" name="image">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Actores</label>
                                            <input type="text" class="form-control" placeholder="Actores" required name = "actores" id = "actores" value = "<?php echo $peliculas[0]->getActores() ?>">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sinopsis</label>
                                            <textarea rows="5" class="form-control" placeholder="Sinopsis" required name = "sinopsis" id = "sinopsis" ><?php echo $peliculas[0]->getSinopsis() ?></textarea>
                                        </div>        
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <div class="clearfix"></div>
                            </form>
							
						<?php
							}
							else{
								echo "Esta película no existe";
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
