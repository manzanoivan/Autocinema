<?php
    require_once("../Usuario.php");
    require_once ("../Menu.php");
    require_once '../Header.php';
    session_start();
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
            if( !isset( $usuario ) || is_null($usuario->getId()) ){
                echo setMenu(-1, 1);
            }
            else{
                echo setMenu( $usuario->getTipo() , 1);
            }
        ?>

    <section id="profile" class="home-section">
      <div class="col-lg-12">
        <div class="row content-panel bg-white">
          <div class="col-md-4 profile-text">
            <h3>Juan Contreras</h3>
            <h6>juancon@hotmail.com</h6>
            <p></p>
          </div><!-- --/col-md-4 ---->
        </div><!-- /row -->    
      </div>

      
      <div class="col-lg-12 mt">    
        <div class="row content-panel bg-white">
          <div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active">
                <a data-toggle="tab" href="#overview">Boletos</a>
              </li>
              <li class="">
                <a data-toggle="tab" href="#contact" class="contact-map">Cafeteria</a>
              </li>              
            </ul>
          </div><!-- --/panel-heading ---->

          <div class="panel-body">
            <div class="tab-content">
              <div id="overview" class="tab-pane active">
                <div class="col-md-12 bg-white">
                  <div class="content-panel">
                    <hr>
                    <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>Función</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="verboleto.jsp">La Terminal</a></td>
                          <td>22 Nov</td>
                          <td>9:30 pm</td>
                        </tr>
                        <tr>
                          <td><a href="verboleto.jsp">Avengers</a></td>
                          <td>30 Nov</td>
                          <td>11:30 pm</td>
                        </tr>
                        <tr>
                          <td><a href="verboleto.jsp">Maquina Enigma</a></td>
                          <td>3 Dic</td>
                          <td>7:00 pm</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- --/content-panel ---->
                </div>
              </div><!-- --/tab-pane ---->

              <div id="contact" class="tab-pane">
                <div class="col-md-12 bg-white">
                  <div class="content-panel">
                    <hr>
                    <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Fecha Compra</th>
                          <th>Fecha Entrega</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="vercafcomp.jsp">1010</a></td>
                          <td>20 Noviembre</td>
                          <td>28 Noviembre</td>
                        </tr>
                        <tr>
                          <td><a href="vercafcomp.jsp">3403</a></td>
                          <td>12 Diciembre</td>
                          <td>14 Diciembre</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- --/content-panel ---->
                </div>
              </div><!-- --/tab-pane ---->

            </div><!-- /tab-content -->
          </div><!-- --/panel-body ---->
        </div><!-- Content panel -->
      </div><!-- /col-lg-12 -->
    </section>

    <?php
        echo getScripts(1);
    ?>

</body>
</html>
