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
				<br><H3>Polanco</H3><br>
	          	<div class="content-panel grid">					
					<?php
						$listaDeProductos = new ListaDeProductos();
						$productos = $listaDeProductos->getProductosWhere("sede.idSede = 1 AND existencia > 0");
						foreach ($productos as $producto) {
					?>					
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="data:image/png;base64,<?php echo base64_encode( $producto->getImagen() );  ?>" />
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
				
				<br><H3>Insurgentes Sur</H3><br>
	          	<div class="content-panel grid">					
					<?php
						$listaDeProductos = new ListaDeProductos();
						$productos = $listaDeProductos->getProductosWhere("sede.idSede = 2 AND existencia > 0");
						foreach ($productos as $producto) {
					?>					
					<div class="product">
						<div class="product__info">
							<img class="product__image" src="data:image/png;base64,<?php echo base64_encode( $producto->getImagen() );  ?>" />
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
		<ul class="cd-cart-items">
			<!--<li>
				<span class="cd-qty">1x</span> Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>-->
		</ul> <!-- cd-cart-items -->
		<?php 
			$total = 0;
			$productos = NULL;
			if(isset( $_SESSION["carrito"] ) ){
				$productos = $_SESSION['carrito']; 
			}
			if(!is_null($productos)){
				$i = 0;
				foreach($productos as $producto){
					$total = $total + ($producto[0]->getPrecio()*$producto[1]);
		?>
			<div class="cd-cart-total">
				<p>
					<?php echo $producto[0]->getSede();?> - <?php echo $producto[0]->getNombre();?> x <?php echo $producto[1];?> <span>Total - $<?php echo $producto[0]->getPrecio()*$producto[1];?></span><br>
					<a href = "quitarProducto.php?pos=<?php echo $i;?>"> Quitar Todos </a> - <a href = "quitarUno.php?pos=<?php echo $i;?>"> Quitar Uno </a>
				</p>
			</div> 
		<?php 
				$i = $i + 1;
				}
			}
		?>
		<div class="cd-cart-total">
				<p>
					<b>TOTAL</b> <span>$<?php echo $total ?></span>
				</p>
			</div>
		<a href="checkOut.php" class="checkout-btn">Confirmar</a>
	</div> <!-- cd-cart -->

    <?php
        echo getScripts(1);
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/main-product.js"></script> <!-- Gem jQuery -->
    <script src="../js/main2-product.js"></script> <!-- Gem jQuery -->
</body>
</html>