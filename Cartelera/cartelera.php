<!-- ¡Cuidado, archivo no estandarizado! es necesario cambiar las rutas -->
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
<!doctype html>
<html lang="en" class="no-js">
<html>
<?php
    echo getHeader(1);
?>
<body>
    
    <?php
            echo setMenu( $usuario, 1, true);
        ?>

    <main class="cd-main-content container is-fixed">


            <section class="cd-gallery">
                    <ul>					                
				<?php
					$listaDeFunciones = new ListaDeFunciones();
					$funciones = $listaDeFunciones->getFuncionesWhere("");
					foreach ($funciones as $funcion)
				
					{

				 
					
					
				?>
						
						<li class="mix color-1 <?php 
				    $funcion->getSede();
					$cadena1='Insurgentes Sur';
					$cadena2='Polanco';
					$opc='';
				
					$checks='';
					
					if (strcmp ($funcion->getSede() , $cadena1) == 0) {
						$checks='check1';
						}
					else 
						{
							$checks='check2';
						}
					
						$id=$funcion->getId(); 
						$clasi= $funcion->getClasificacion();
						switch($clasi)
						{
							case 'AA':
								$opc='option0';
								break;
							case 'A':
								$opc='option1';
								break;
							case 'B':
								$opc='option2';
								break;
							case 'B-15':
								$opc='option3';
								break;
							case 'C':
								$opc='option4';
								break;
							
						
						}
		
						
						echo $checks; echo ' '; echo $opc; ?>   "><a href="revisarfuncion.php?id=<?php echo $id ;?>">
							<div class="team boxed-grey">
								<div class="inner">
									<h5><?php echo $funcion->getSede(); ?></h5>
									<p class="subtitle"><?php echo $funcion->getFecha(); ?></p>
									<!-- CAMBIAR POR getImagen -->
									<div class="avatar"><img src="data:image/png;base64,<?php echo base64_encode( $funcion->getImagen() );  ?>" alt="" class="img-responsive img-center" /></div>
									<p class="subtitle"><?php echo $funcion->getNombrePelicula(); ?></p>
									<p> Clasificación <?php echo $clasi?> </p>
								</div>
							</div>
						</a></li>
				<?php 
					} 				
				?>								
                            <li class="gap"></li>
                            <li class="gap"></li>
                            <li class="gap"></li>
                            <div class="cd-fail-message">No se encontraron resultados</div>
                    </ul>
            </section> <!-- cd-gallery -->

            <div class="cd-filter">
                    <form>
                          

                            <div class="cd-filter-block">
                                    <h4>Localización</h4>

                                    <ul class="cd-filter-content cd-filters list">
                                            <li>
                                                    <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                                            <label class="checkbox-label" for="checkbox1">Insurgentes Sur</label>
                                            </li>

                                            <li>
                                                    <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                                                    <label class="checkbox-label" for="checkbox2"> Polanco</label>
                                            </li>

                                            
                                    </ul> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->

                            <div class="cd-filter-block">
                                    <h4>Clasificación</h4>

                                    <div class="cd-filter-content">
                                            <div class="cd-select cd-filters">
                                                    <select class="filter" name="selectThis" id="selectThis">
                                                            <option value="">Escoge una Opción </option>
                                                            <option value=".option0">Clasificación AA</option>
                                                            <option value=".option1">Clasificación A</option>
                                                            <option value=".option2">Clasificación B</option>
                                                            <option value=".option3">Clasificación B-15</option>
															<option value=".option4">Clasificación C</option>
                                                           
                                                    </select>
                                            </div> <!-- cd-select -->
                                    </div> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->

                        <!--    <div class="cd-filter-block">
                                    <h4>Radio buttons</h4>

                                    <ul class="cd-filter-content cd-filters list">
                                            <li>
                                                    <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
                                                    <label class="radio-label" for="radio1">All</label>
                                            </li>

                                            <li>
                                                    <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
                                                    <label class="radio-label" for="radio2">Choice 2</label>
                                            </li>

                                            <li>
                                                    <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
                                                    <label class="radio-label" for="radio3">Choice 3</label>
                                            </li>
                                    </ul> <!-- cd-filter-content -->
                            </div> --> <!-- cd-filter-block -->
                    </form>
            </div> <!-- cd-filter -->


    </main> <!-- cd-main-content -->

    <!-- Core JavaScript Files -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/custom.js"></script>
    <script src="../js/backstretch/jquery.backstretch.js"></script>
	<script>
        $.backstretch([
          "../img/intro/1.jpg",
          "../img/intro/2.jpg",
          "../img/intro/3.jpg"
        ], {
            fade: 750,
            duration: 4000
        });
    </script>

    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/jquery.mixitup.min.js"></script>
    <script src="../js/main-filter.js"></script> <!-- Resource jQuery -->
</body>
</html>