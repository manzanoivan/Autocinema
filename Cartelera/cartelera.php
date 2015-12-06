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
					foreach ($funciones as $funcion) {
				?>
						<li class="mix color-1 check1 radio2 option3"><a href="revisarfuncion.php?id=<?php echo $funcion->getId(); ?>">
							<div class="team boxed-grey">
								<div class="inner">
									<h5><?php echo $funcion->getSede(); ?></h5>
									<p class="subtitle"><?php echo $funcion->getFecha(); ?></p>
									<!-- CAMBIAR POR getImagen -->
									<div class="avatar"><img src="../img/team/1.jpg" alt="" class="img-responsive img-circle img-center" /></div>
									<p class="subtitle"><?php echo $funcion->getNombrePelicula(); ?></p>
								</div>
							</div>
						</a></li>
				<?php 
					} 				
				?>								
                            <li class="gap"></li>
                            <li class="gap"></li>
                            <li class="gap"></li>
                    </ul>
                    <div class="cd-fail-message">No results found</div>
            </section> <!-- cd-gallery -->

            <div class="cd-filter">
                    <form>
                            <div class="cd-filter-block">
                                    <h4>Search</h4>

                                    <div class="cd-filter-content">
                                            <input type="search" placeholder="Try color-1...">
                                    </div> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->

                            <div class="cd-filter-block">
                                    <h4>Check boxes</h4>

                                    <ul class="cd-filter-content cd-filters list">
                                            <li>
                                                    <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                                            <label class="checkbox-label" for="checkbox1">Option 1</label>
                                            </li>

                                            <li>
                                                    <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                                                    <label class="checkbox-label" for="checkbox2">Option 2</label>
                                            </li>

                                            <li>
                                                    <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
                                                    <label class="checkbox-label" for="checkbox3">Option 3</label>
                                            </li>
                                    </ul> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->

                            <div class="cd-filter-block">
                                    <h4>Select</h4>

                                    <div class="cd-filter-content">
                                            <div class="cd-select cd-filters">
                                                    <select class="filter" name="selectThis" id="selectThis">
                                                            <option value="">Choose an option</option>
                                                            <option value=".option1">Option 1</option>
                                                            <option value=".option2">Option 2</option>
                                                            <option value=".option3">Option 3</option>
                                                            <option value=".option4">Option 4</option>
                                                            <option value=".option5">Option 5</option>
                                                    </select>
                                            </div> <!-- cd-select -->
                                    </div> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->

                            <div class="cd-filter-block">
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
                            </div> <!-- cd-filter-block -->
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