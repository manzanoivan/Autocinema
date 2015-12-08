<?php
    require_once("../Usuario.php");
    require_once ("../menu.php");
    require_once '../Header.php';
	require_once('ListaDeProductos.php');
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
					
					<?php
						$listaDeProductos = new ListaDeProductos();
						$productos = $listaDeProductos->getProductosWhere("");
						foreach ($productos as $producto) {
					?>
					
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="../images/1.png" />
							<h3 class="product__title"><?php echo $producto->getNombre();  ?></h3>
							<span class="product__year extra highlight">2011</span>
							<span class="product__region extra highlight">Douro</span>
							<span class="product__varietal extra highlight">Touriga Nacional</span>
							<span class="product__type extra highlight">1</span>
							<span class="product__price highlight">$<?php echo $producto->getPrecio();  ?></span>
							<a href="agregarProducto.php?id=<?php echo $producto->getId();?>&sede=<?php echo $producto->getIdSede();?>">
								<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i>Agregar</button>
							</a>
						</div>
					</div>
					
					<?php
						}
					?>
					
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