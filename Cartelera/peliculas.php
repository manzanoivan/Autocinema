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
            <h4><i class="fa fa-angle-right"></i>Inventario</h4><h7><a href="agregar.jsp"><i class="fa fa-plus-square"></i> Agregar Película</h4></a><hr>
            <table class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th>Pelicula</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>  
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>  
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>  
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>  
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>  
              <tr>
                <td><a href="verproducto.jsp">Daredevil</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
              </tr>
              <tr>
                <td><a href="verproducto.jsp">Divergente</a></td>
                <td>
                  <a href="modificar.jsp"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                  <a href="eliminar.jsp"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                </td>
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
