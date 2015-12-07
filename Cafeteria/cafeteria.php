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
<!doctype html>
<html lang="en" class="no-js">
<?php
    echo getHeader(1);
?>
</head>
<body>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <link href="../css/product-style.css" rel="stylesheet">
    
    <?php
        echo setMenuCafeteria( $usuario);
    ?>

	<section class="home-section product-section">
		<div class="row mt bg-white">
	        <div class="col-md-12">
	          	<div class="content-panel grid">
					<!-- Products -->
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="../images/1.png" alt="Product 1" />
							<h3 class="product__title">Chryseia</h3>
							<span class="product__year extra highlight">2011</span>
							<span class="product__region extra highlight">Douro</span>
							<span class="product__varietal extra highlight">Touriga Nacional</span>
							<span class="product__type extra highlight">1</span>
							<span class="product__price highlight">$55.95</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="../images/2.png" alt="Product 2" />
							<h3 class="product__title">Meiomi Pinot Noir</h3>
							<span class="product__year extra highlight">2013</span>
							<span class="product__region extra highlight">California</span>
							<span class="product__varietal extra highlight">Pinot Noir</span>
							<span class="product__type extra highlight">2</span>
							<span class="product__price highlight">$19.90</span>
							<input type="hidden" value="2">
							<button class="action action--button action--buy"  value="2"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/10.png" alt="Product 3" />
							<h3 class="product__title">Antucura Cabernet Sauvignon</h3>
							<span class="product__year extra highlight">2013</span>
							<span class="product__region extra highlight">Argentina</span>
							<span class="product__varietal extra highlight">Cabernet Sauvignon </span>
							<span class="product__type extra highlight">3</span>
							<span class="product__price highlight">$15.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/4.png" alt="Product 4" />
							<h3 class="product__title">Leonetti Sangiovese</h3>
							<span class="product__year extra highlight">2012</span>
							<span class="product__region extra highlight">Washington</span>
							<span class="product__varietal extra highlight">Sangiovese</span>
							<span class="product__type extra highlight">4</span>
							<span class="product__price highlight">$85.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/5.png" alt="Product 5" />
							<h3 class="product__title">Chateau Pontet-Canet</h3>
							<span class="product__year extra highlight">2009</span>
							<span class="product__region extra highlight">Pauillac, Bordeaux</span>
							<span class="product__varietal extra highlight">Bordeaux </span>
							<span class="product__type extra highlight">5</span>
							<span class="product__price highlight">$269.00</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/6.png" alt="Product 6" />
							<h3 class="product__title">Quintessa</h3>
							<span class="product__year extra highlight">2011</span>
							<span class="product__region extra highlight">California</span>
							<span class="product__varietal extra highlight">Cabernet Sauvignon</span>
							<span class="product__type extra highlight">6</span>
							<span class="product__price highlight">$125.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/7.png" alt="Product 7" />
							<h3 class="product__title">Clarendon Hills Astralis</h3>
							<span class="product__year extra highlight">2006</span>
							<span class="product__region extra highlight">McLaren Vale</span>
							<span class="product__varietal extra highlight">Syrah, Shiraz</span>
							<span class="product__type extra highlight">7</span>
							<span class="product__price highlight">$153.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/8.png" alt="Product 8" />
							<h3 class="product__title">Lapostolle Clos Apalta</h3>
							<span class="product__year extra highlight">2010</span>
							<span class="product__region extra highlight">Chile</span>
							<span class="product__varietal extra highlight">Bordeaux</span>
							<span class="product__type extra highlight">8</span>
							<span class="product__price highlight">$82.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/9.png" alt="Product 9" />
							<h3 class="product__title">Bodega Colome Reserva</h3>
							<span class="product__year extra highlight">2009</span>
							<span class="product__region extra highlight">Argentina</span>
							<span class="product__varietal extra highlight">Malbec</span>
							<span class="product__type extra highlight">9</span>
							<span class="product__price highlight">$99.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/10.png" alt="Product 10" />
							<h3 class="product__title">Montevertine Le Pergole Torte</h3>
							<span class="product__year extra highlight">2011</span>
							<span class="product__region extra highlight">Tuscany</span>
							<span class="product__varietal extra highlight">Sangiovese </span>
							<span class="product__type extra highlight">10</span>
							<span class="product__price highlight">$119.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/2.png" alt="Product 11" />
							<h3 class="product__title">Massolino Vigna Parussi Barolo</h3>
							<span class="product__year extra highlight">2009</span>
							<span class="product__region extra highlight">Piedmont</span>
							<span class="product__varietal extra highlight">Nebbiolo</span>
							<span class="product__type extra highlight">11</span>
							<span class="product__price highlight">$169.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="images/4.png" alt="Product 12" />
							<h3 class="product__title">Chateau Branaire-Ducru</h3>
							<span class="product__year extra highlight">2009</span>
							<span class="product__region extra highlight">St-Julien, Bordeaux</span>
							<span class="product__varietal extra highlight">Bordeaux</span>
							<span class="product__type extra highlight">12</span>
							<span class="product__price highlight">$99.90</span>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="cd-shadow-layer"></div>

	<div id="cd-cart">
		<h2>Cart</h2>
		<ul class="cd-cart-items">
			<!--<li>
				<span class="cd-qty">1x</span> Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>-->
		</ul> <!-- cd-cart-items -->

		<div class="cd-cart-total">
			<p>Total <span>$0.00</span></p>
		</div> <!-- cd-cart-total -->

		<a href="compra.php" class="checkout-btn">Checkout</a>
	</div> <!-- cd-cart -->

    <?php
        echo getScripts(1);
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/main-product.js"></script> <!-- Gem jQuery -->
    <script src="../js/main2-product.js"></script> <!-- Gem jQuery -->
</body>
</html>