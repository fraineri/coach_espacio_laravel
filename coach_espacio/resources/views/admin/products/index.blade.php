<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


	<title>C.E. | Administrador</title>
</head>

<body style="background-image: url(/images/backgrounds/contact-banner-4.jpg);">
	<div class="container" style="background-color: white; padding: 2%; ">

  		<nav class="navbar navbar-light navbar-toggleable-sm" style="background-color: #e3f2fd;">
    		<a class="navbar-brand" href="/admin/products/">Productos</a>
    		<a class="navbar-brand" href="/admin/categories/">Categorias</a>
  		</nav>
	</div>
	<br>
		<fieldset class="container">	
		 	<legend style="padding: 2%; text-align: center; "><h1>Productos y Videos</h1></legend>
					<br>
					<div class="">
						<ul class="list-group">
							@foreach($products as $prod)
								<li class="list-group-item">
								<a href="/admin/products/{{$prod->id}}/update">{{$prod->name}}</a>
								</li>
							@endforeach
						</ul>
					</div>
					<br>
			<div class="form-group">
				<a class="btn btn-primary" href="/admin/products/create">Nuevo Producto</a>	
			</div>

			{{$products->links()}}

				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		</fieldset>
</body>
</html>

