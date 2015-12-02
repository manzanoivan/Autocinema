jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	
	//store DOM elements
	var formPopup = $('.grid');
	var cart = $('.cd-cart-items');
	var cont = 0;
	var listcart = [];
	var total = 0;

	//select a plan and open the signup form
	formPopup.on('click', 'button', function(event){

		listcart.push($(this).siblings('span.product__type').text());
		//alert(listcart);

		var prodname = $(this).siblings('h3.product__title').text();
		var price = $(this).siblings('span.product__price').text();
		var type = $(this).siblings('span.product__type').text();
		cart.append( "<li><span class=\"cd-qty\">1x</span>"+(prodname)+"<div class=\"cd-price\">"+(price)+"</div> <div class=\"cd-type\">"+(type)+"</div> <a href=\"#0\" class=\"cd-item-remove cd-img-replace\">Remove</a></li>");
		
		total += parseFloat(price.substring(1));
		$('.cd-cart-total span').text("$"+total.toFixed(2));


		/*Efects*/
		$(this).siblings('img').toggleClass('product__image__efect').delay(600).queue(function(){
	        $(this).toggleClass('product__image__efect');
	        $(this).dequeue(); //continue next item queue
	    });

	 	$('#cd-cart-trigger').toggleClass('cart__image__efect').delay(600).queue(function(){
	        $(this).toggleClass('cart__image__efect');
	        $(this).dequeue(); //continue next item queue
	    });
	});

	cart.on('click', 'a', function(event){
		var price = $(this).siblings('div.cd-price').text();
		total -= parseFloat(price.substring(1));

		var type2erase = $(this).siblings('div.cd-type').text()
		var indexitem = $.inArray( type2erase, listcart )
		listcart.splice(indexitem,1);
		//alert(listcart);
		//total = total.toFixed(2);
		$('.cd-cart-total span').text("$"+total.toFixed(2));
		$(this).parent().remove();	
	});

});