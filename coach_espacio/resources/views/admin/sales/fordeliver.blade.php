<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<title>C.E. | Pendiente</title>
</head>
<body style="background-image: url(/images/backgrounds/bg-2b.png);">
	<div class="container" style="background-color: white; padding:0 ;margin-top: 20px; ">

		<form class="form-horizontal" method="POST" action="/admin/sales/{{$sale->id}}/fordeliver" style="padding:0" enctype="multipart/form-data">
				{{csrf_field()}}
			<fieldset class="container" style="padding:0; margin-bottom: 60px;" >	
		 		<legend style="text-align: center; background-color: lightblue;">
		 			<h1>Cliente: {{$sale->name." ".$sale->surname}}</h1>
		 		</legend>
				<div class="form-group ">
					<h4>Código de venta: {{$sale->id}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Dirección: {{$sale->address}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Ciudad: {{$sale->city}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Provincia: {{$sale->province}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Código Postal: {{$sale->cp}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Teléfono: {{$sale->phone}}</h4>
  				</div>
  				<div class="form-group">
					<h4>Total: ${{$sale->total}}</h4>
  				</div>
  				
				<hr>
	  			@foreach($items as $item)
	  				<div class="form-group" style="display: flex">
		  				<div>
		  					<img style ="height: 150px; width: auto; margin-right:60px;"src="{{ asset('storage') }}/products/{{$item->product->picture}}">
		  				</div>
		  				<div>
							<h5>Nombre del Producto: {{$item->product->name}}</h5>
							<h5>Código del Producto: {{$item->product_id}}</h5>
							<h5>Precio unitario: {{$item->price_unit}}</h5>
							@if($item->product->type == "products")
								<h5>Cantidad: {{$item->qty}}</h5>
							@endif
						</div>
	  				</div>
	  			@endforeach
  				<!--true o false para entregado-->
				<label>Productos entregados?  </label>
				<select class="custom-select" name="delivered" required>
					<option value=0>No, pendientes</option>
					<option value=1>Si, entregados</option>
				</select>
				<br>
				<br>
				
				<div class="form-inline">
				<!--boton para salir sin editar el producto-->
					<a class="btn btn-primary" href="/admin/sales/" role="button">Volver a Ventas</a>	
				<!--boton para grabar cambios-->
					<button type="submit" class="btn btn-success">Grabar cambios</button>	
				</div>
					
				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			</fieldset>
		</form>
	</div>	
</body>
</html>