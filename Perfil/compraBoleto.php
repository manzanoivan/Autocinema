<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
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
                    <div class="card mb">
                        <div class="header">
                            <h4 class="title">Detalles Compra</h4>
                        </div>
                        <div class="content">
                            <form action="profile3.html">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Comprador</label>
                                            <input type="text" class="form-control" disabled value="michael23">
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Forma de Pago</label>
                                            <input type="text" class="form-control" disabled value="Tarjeta">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre Función</label>
                                            <input type="text" class="form-control" disabled value="La Terminal">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha Función</label>
                                            <input type="text" class="form-control" disabled value="12 Diciembre">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Hora Función</label>
                                            <input type="text" class="form-control" disabled value="5:30 pm">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio Unitario</label>
                                            <input type="text" class="form-control" disabled value="$150.00">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cantidad Boletos</label>
                                            <input type="text" class="form-control" disabled value="2">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cantidad Pagada</label>
                                            <input type="text" class="form-control" disabled value="$300.00">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sede</label>
                                            <input type="text" class="form-control" disabled value="Miguel de Cervantes Saavedra 161, Miguel Hidalgo, Granada, 11520 Ciudad de México, D.F.">
                                        </div>        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right"  >Regresar Perfil</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user mb">
                        <div class="image resimg">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="QR"/>   
                        </div>
                        <div class="content">
                            <p class="description text-center">Codigo QR
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            Texto QR
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
