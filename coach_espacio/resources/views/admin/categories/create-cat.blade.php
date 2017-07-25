<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/producto.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">

	<title>C.E. | Agregar Categoria</title>
</head>
<body>
<h1>Agregar Nueva Categoría</h1>
		<form class="form-horizontal" method="POST" action="/admin/categories/create" enctype="multipart/form-data">
				{{csrf_field()}}
				<label>Nombre:</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre de la categoría" required>
				@if ($errors->has('name'))
					<span class="lbl-error">
						<strong> {{ $errors->first('name') }} </strong>
					</span>
				@endif
				<br>
				<br>
				<label>Descripción:</label>
				<input type="text" name="description" class="form-control" placeholder="Descripción" required>
				@if ($errors->has('description'))
					<span class="lbl-error">
						<strong> {{ $errors->first('description') }} </strong>
					</span>
				@endif
				<br>
				<br>
				<!--imagen-->
				<label class="admin-category-image">Foto de la Categoría</label>
				<input type="file" name="picture" class="form-control">
				
				<br>
				<br>
				<hr>
				<!--boton para salir sin editar el producto-->
				<div class="form-group">
				<button type="button" class="btn btn-primary"><a href="/admin/categories/">Volver a Categorías</a></button>	
				</div>
				<br>
				<!--boton para grabar cambios-->
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Guardar Nueva Categoría</button>	
				</div>
				
		</form>
</body>
</html>