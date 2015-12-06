<?php
    require_once("Usuario.php");
    require_once ("Menu.php");
    require_once 'Header.php';
    session_start();
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  
?>

<!DOCTYPE html>
<html>

<?php
    echo getHeader(0);
    
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

        <?php
            if( !isset( $usuario ) || is_null($usuario->getId()) ){
                echo setMenuIndex(-1);
            }
            else{
                echo setMenuIndex( $usuario->getTipo());
            }
        ?>

	<!-- Section: intro -->
    <section id="intro" class="intro container">
	
		<div class="slogan">
			<h2>Autocinema Coyote</h2>
			<h4> </h4>
		</div>
		<div class="page-scroll">
			<a href="#cartelera" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
		
	<!-- Section: about -->
    <section id="cartelera" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Hoy en Cartelera</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
	            <a href="peli1">
	                <div class="team boxed-grey">
	                    <div class="inner">
							<h5>Insurgentes</h5>
	                        <p class="subtitle">20:30 horas</p>
	                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle img-center" /></div>
	                        <p class="subtitle">COMPRAR</p>
	                    </div>
	                </div>
	            </a>
				</div>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
	            <a href="peli2">    
	                <div class="team boxed-grey">
	                    <div class="inner">
							<h5>Polanco</h5>
	                        <p class="subtitle">13:30 horas</p>
	                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle img-center" /></div>
							<p class="subtitle">COMPRAR</p>
	                    </div>
	                </div>
	            </a>
				</div>
            </div>
        </div>		
		</div>
	</section>
	<!-- /Section: about -->
	
	<!-- Section: ubicacions -->
	<section id="ubicacion" class="home-section text-center bg-gray">
		<div class="nav-tabs-navigation">
	        <div class="nav-tabs-wrapper">
	        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
	            <li class="active"><a href="#1" data-toggle="tab">Polanco</a></li>
	            <li><a href="#2" data-toggle="tab">Insurgentes</a></li>
	        </ul>
	        </div>
	    </div>
	    <div id="my-tab-content" class="tab-content text-center">
	        <div class="tab-pane active" id="1">
	            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7524.666251974246!2d-99.1964202767212!3d19.44119904865444!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8fd25b60951ad39d!2sAutocinema+Coyote!5e0!3m2!1ses!2smx!4v1444865512221" width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
	        <div class="tab-pane" id="2">
	            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.211905179407!2d-99.18615538563853!3d19.359975148016908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fff353763453%3A0x76a6cd74c040374a!2sAutocinema+Coyote!5e0!3m2!1ses!2smx!4v1444865555645" width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
	    </div>
	</section>
	<!-- /Section: Ubicacion -->

	<!-- Section: services -->
    <section id="lala" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading-blue">
					<h2>Nosotros</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-1.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Revivimos el concepto</h5>
						<p>Te transportamos al pasado con todo un concepto de la época, innovado con los avances del presente.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Ambiente</h5>
						<p>vives la magia de la colectividad del público y la gran pantalla, es la combinación perfecta de ambas.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Eventos Temáticos</h5>
						<p>Presentaciones en vivo, noches temáticas, conciertos y hasta sacamos personajes de la pantalla para divertirte o en su caso asustarte</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-4.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Convive con Amigos</h5>
						<p>El boleto de entrada es válido para un auto sin límite de pasajeros.</p>
					</div>
                </div>
				</div>
            </div>
        </div>		
		</div>
	</section>
	<!-- /Section: services -->
	
	<!-- Section: cafeteria 
    <section id="cafeteria" class="intro cafeteria">
	
		<div class="slogan">
			<h2>Esta es la cafeteria</h2>
			<h4> </h4>
		</div>
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: cafeteria -->

	

	<!-- Section: contact -->
    <section id="contacto" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Contacto</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form" action="hola.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingresa nombre" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Ingresa email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Asunto</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Selecciona uno:</option>
                                <option value="service">Película</option>
                                <option value="suggestions">Boletos</option>
                                <option value="product">Cafeteria</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Enviar Mensjae</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
		
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Autocinema Coyote</h5>
				
				<address>
				  <strong>Horario de Atención</strong><br>
				  12:00 a 18:00 hrs<br>
				  <abbr title="Phone">P:</abbr> (55) 6821 4495
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">info@autocinemacoyote.com</a>
				</address>	
				<address>
				  <strong>Siguenos en Redes Sociales</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>	
				</address>					
			
			</div>	
		</div>
    </div>	

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
				</div>
			</div>	
	</footer>

    <?php
        echo getScripts(0);
    ?>

</body>

</html>
