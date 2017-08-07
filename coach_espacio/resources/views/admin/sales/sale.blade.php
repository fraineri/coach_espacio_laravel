<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<title>C.E. | Vendido</title>
</head>
<body style="background-image: url(/images/backgrounds/contact-banner-4.jpg);">
	<div class="container" style="background-color: white; padding: 2%; ">
			<fieldset class="container">	
		 		<legend style="padding: 2%; text-align: center; background-color: lightblue;"><h1>Cliente: {{$sale->name." ".$sale->surname}</h1></legend>
				<div class="form-group row">
				<h4>Código de venta: {{$sale->id}}</h4>
  				</div>
  				<div class="form-group row">
				<h4>Direccón: {{$sale->address}}</h4>
  				</div>
  				<div class="form-group row">
				<h4>Ciudad: {{$sale->city}}</h4>
  				</div>
  				<div class="form-group row">
				<h4>Provincia: {{$sale->province}}</h4>
  				</div>
  				<div class="form-group row">
				<h4>Código Postal: {{$sale->cp}}</h4>
  				</div>
  				<div class="form-group row">
				<h4>Teléfono: {{$sale->phone}}</h4>
  				</div>
  			@foreach($items as $item)
  				<div class="form-group row">
					<h5>Nombre del Producto: {{$item->name}}</h5>
					<h5>Código del Producto: {{$item->prod_id}}</h5>
					<h5>Precio unitario: {{$item->price_unit}}</h5>
					<h5>Cantidad: {{$item->qty}}</h5>
  				</div>
  			@endforeach

				<div class="form-inline">
				<!--boton para salir sin del detalle de venta-->
					<a class="btn btn-primary" href="/admin/sales/" role="button">Volver a lista de ventas</a>	
				</div>	
				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			</fieldset>
	</div>	
</body>
</html>