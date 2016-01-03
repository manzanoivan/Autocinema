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
    $id = htmlspecialchars($_GET["id"] , ENT_QUOTES);

    $link = conecta();
    $sql1 = "SELECT idComentario, texto, email, nombre FROM comentario WHERE idComentario='".$id."'";
    $myArray = consultageneral($sql1, $link);
    desconecta($link);

    if( count( $myArray ) != 1 ){
      header("Location: perfilAdmin.php");
    }
    $idC = $myArray[0][0];
    $texto = $myArray[0][1];
    $email = $myArray[0][2];
    $nombre = $myArray[0][3];

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
            <?php
                if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 ){
            ?>        
                <div class="col-lg-12">
                    <div class="row content-panel bg-white">
                      <div class="col-md-12 profile-text">
                        <br>
                        <h3>No tienes autorización para ver ésta página</h3>
                      </div><!-- --/col-md-4 ---->
                    </div><!-- /row -->    
                  </div>
            <?php
                }
                else{
            ?>
                   <div class="container-fluid bg-white">
                       <div class="row">

                           <div class="col-md-12">
                               <div class="card mb">
                                   <div class="header">
                                       <h4 class="title">Responder Comentario</h4>
                                   </div>
                                   <div class="content">
                                       <form action="reponderComentarioAction.php" method = "POST">
                                           <input type="hidden" value="<?php echo $id ?>" name="idC">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Destinatario: </label>
                                                       <input type="text" class="form-control" disabled name = "nombre" id = "nombre" value="<?php echo $nombre; ?>">
                                                   </div>        
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Email: </label>
                                                       <input type="text" class="form-control" disabled value="<?php echo $email; ?>" name = "segundoNombre" id = "segundoNombre">
                                                   </div>        
                                               </div>
                                           </div>

                                           <div class="row">
                                               <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label>Respuesta: </label>
                                                       <textarea rows="8" maxlength="1000" class="form-control" required name = "respuesta" id = "respuesta"></textarea>
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
            <?php
                }
            ?>
         </section>

   <?php
        echo getScripts(1);
    ?>

</body>
</html>
