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

    <section id="tables" class="home-section">
      <div class="row mt bg-white">
        <div class="col-md-12">
          <div class="content-panel">
            <h4>Comentarios</h4><hr>
            <table class="table table-striped table-advance">
            <thead>
              <tr>
                <th>Nombre</th>          
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="hidden-phone">Orlando Montiel</td>
                <td>orlmontiel@gmail.com</td>
                <td>
                  <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
                <tr>
                  <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium?</td>
                </tr>
              </tr>

              <tr>
                <td class="hidden-phone">Lucia Jimenez</td>
                <td>orluci jim@gmail.com</td>
                <td>
                  <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
                <tr>
                  <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus repellat sed voluptatem dignissimos possimus suscipit nisi consequatur inventore, magnam modi. Unde earum ad voluptatum magni pariatur, nam aspernatur! Deserunt, sint. </td>
                </tr>
              </tr>

              <tr>
                <td class="hidden-phone">Jesus Rodriguez</td>
                <td>jesrod@gmail.com</td>
                <td>
                  <a href="responder.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
                <tr>
                  <td colspan="3"> <strong>Comentario:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nihil, incidunt tempore facilis deserunt eaque doloremque aut eos expedita dolore ipsa placeat veritatis deleniti nulla perferendis repudiandae dolorum, quod, praesentium? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore corporis maiores deserunt voluptates harum reiciendis expedita tempora consequatur impedit! Quisquam ipsa minima laboriosam quibusdam pariatur id aspernatur, deserunt nesciunt repellendus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, enim, ipsam. Placeat mollitia obcaecati in dolorem. Atque laboriosam illo, qui eius nemo unde voluptatibus et repudiandae, fuga eaque, a aliquid.</td>
                </tr>
              </tr>
            </tbody>
          </table>
        </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->
    </div>
  </section>

  <?php
    echo getScripts(1);
  ?>
</body>
</html>
