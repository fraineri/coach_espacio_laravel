<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>destruir cat</title>
</head>
<body>
<body style="background-image: url(/images/backgrounds/contact-banner-4.jpg);">
	<div class="container" style="background-color: white; padding: 2%; ">

		<form class="form-horizontal" method="POST" action="/admin/categories/{{$cat->id}}/destroy" enctype="multipart/form-data">
				{{csrf_field()}}
			<fieldset class="container">	
		 		<legend style="padding: 2%; text-align: center; background-color: lightblue;"><h1>Esta seguro que quiere borrar la categoría {{$cat->name}}???</h1></legend>

		 		<div class="form-inline">
				<!--boton para salir sin editar el producto-->
					<a class="btn btn-primary" href="/admin/categories/" role="button">Volver a Categorías</a>	
					
				<!--boton para eliminar la categoria-->
					<button type="submit" class="btn btn-danger">ELIMINAR CATEGORIA</button>
				</div>
		
				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			</fieldset>
		</form>
	</div>	



</body>
</html>