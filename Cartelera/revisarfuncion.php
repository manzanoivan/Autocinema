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
                    <div class="card mb">
                        <div class="header">
                            <h4 class="title nomg">The Terminal</h4>
                            <h6>(La Terminal)</h6>
                        </div>
                        <div class="content">
                            <form>                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Director</label>
                                            <p>Steven Spielberg</p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Año</label>
                                            <p>2004</p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Clasificación</label>
                                            <p>Comedia</p>
                                        </div>        
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Actores</label>
                                            <p>Tom Hanks, Catherine Zeta-Jones, Chi McBride</p>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Duración</label>
                                            <p>128 min</p>
                                        </div>        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sinopsis</label>
                                            <p>
                                                La película está basada en la historia real de Mehran Karimi Nasseri, un refugiado iraní que vivió en el Aeropuerto de París-Charles de Gaulle entre 1988 y 2006. Anteriormente a Spielberg, el director francés Philippe Lioret ya había adaptado al cine su historia en la película En tránsito.
                                            </p>                                           
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Funciones</label>
                                        </div>        
                                    </div>                                 
                                </div>

                                <div class="row">
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Polanco</label>
                                            <a href=""><p>Vie 13 Nov, 9:30 pm $150</p></a>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label></label>
                                            <a href=""><p>Sab 14 Nov, 9:30 pm $150</p></a>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label></label>
                                            <a href=""><p>Dom 15 Nov, 9:30 pm $150</p></a>
                                        </div>        
                                    </div>                              
                                </div>

                                <div class="row">
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Insurgentes</label>
                                            <a href=""><p>Vie 13 Nov, 9:30 pm $150</p></a>
                                        </div>        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label></label>
                                            <a href=""><p>Dom 15 Nov, 9:30 pm $150</p></a>
                                        </div>        
                                    </div>                              
                                </div>  
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
                        <hr>
                        <div class="text-center">
                            <a href="https://www.youtube.com/watch?v=HGOaj_IetHY"  target="_blank"><button class="btn btn-info btn-fill">Trailer</button></a>
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
