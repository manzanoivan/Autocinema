<?php
    require_once("../Usuario.php");
    require_once("../Cartelera/Boleto.php");
    require_once("../Cafeteria/TicketCafeteria.php");
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

    <section id="profile" class="home-section">
        <?php
            if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 4 ){
        ?>        
            <div class="col-lg-12">
                <div class="row content-panel bg-white">
                  <div class="col-md-4 profile-text">
                    <br>
                    <h3>No tienes autorización para ver ésta página</h3>
                  </div><!-- /col-md-4 -->
                </div><!-- /row -->    
              </div>
        <?php
            }
            else{
        ?>
            <div class="col-lg-12">
              <div class="row content-panel bg-white">
                <div class="col-md-4 profile-text">
                    <br>
                    <h3>
                        <?php
                            echo $usuario->getNombre()." ".$usuario->getApellidos();
                        ?>
                      - Encargado Entrada
                    </h3>
                    <h6>
                        <?php
                            echo $usuario->getEmail();
                         ?>   
                    </h6>
                  <p></p>
                </div><!-- /col-md-4 -->
              </div><!-- /row -->    
            </div>
          </section>

    <?php
        }
        echo getScripts(1);
    ?>

</body>
</html>
