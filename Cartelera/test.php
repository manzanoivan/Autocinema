<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>

	</head>
	<body>
		<form action="compraBoletoAction.php" method="POST" id="card-form">
		  <span class="card-errors"></span>
		  <div class="form-row">
		    <label>
		      <span>Nombre del tarjetahabiente</span>
		      <input type="text" size="20" data-conekta="card[name]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>Número de tarjeta de crédito</span>
		      <input type="text" size="20" data-conekta="card[number]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>CVC</span>
		      <input type="text" size="4" data-conekta="card[cvc]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>Fecha de expiración (MM/AAAA)</span>
		      <input type="text" size="2" data-conekta="card[exp_month]"/>
		    </label>
		    <span>/</span>
		    <input type="text" size="4" data-conekta="card[exp_year]"/>
		  </div>
		  <button type="submit">¡Pagar ahora!</button>
		</form>
		<script type="text/javascript">
      jQuery(function($) {
          
          
          var conektaSuccessResponseHandler;
          conektaSuccessResponseHandler = function(token) {
              var $form;
              $form = $("#card-form");
              /* Inserta el token_id en la forma para que se envíe al servidor */
              $form.append($("<input type=\"hidden\" name=\"conektaTokenId\" />").val(token.id));
              /* and submit */
              $form.get(0).submit();
          };
          
          conektaErrorResponseHandler = function(token) {
              console.log(token);
          };
          
          $("#card-form").submit(function(event) {
              event.preventDefault();
              var $form;
              $form = $(this);
              /* Previene hacer submit más de una vez */
              $form.find("button").prop("disabled", true);
              Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
              /* Previene que la información de la forma sea enviada al servidor */
              return false;
          });
      });
    </script>
		<script type="text/javascript">
		 
		 // Conekta Public Key
		  Conekta.setPublishableKey('key_EyyvhcwxFXRt6pzbsnqv3zw');
		 
		 // ...
		</script>
	</body>

</html>