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

	<title>C.E. | Agregar Producto</title>
</head>
<body>
	<h1>Agregar Nuevo Producto o Video</h1>
	<form class="form-horizontal" method="POST" action="/admin/products/create" enctype="multipart/form-data">
				{{csrf_field()}}
				<label>Nombre:</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre del producto o video" required>
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
				<label>Precio:</label>
				<input type="text" name="price" class="form-control" placeholder="Precio" required>
				@if ($errors->has('price'))
					<span class="lbl-error">
						<strong> {{ $errors->first('price') }} </strong>
					</span>
				@endif
				<br>
				<br>
				<label>Stock:</label>
				<input type="text" name="stock" class="form-control" placeholder="cantidad en stock" required>
				@if ($errors->has('stock'))
					<span class="lbl-error">
						<strong> {{ $errors->first('stock') }} </strong>
					</span>
				@endif
				<br>
				<br>
				<!--true o false para purchable-->
				<label>Producto listo para vender?  </label>
				<select name="purchable" required>
					<option value=1>Si, Vender</option>
					<option value=0>NO vender</option>
				</select>
				<br>
				<br>
				<!--categorias de la tabla categories-->
				<label>Categoria del producto: </label>
				<select name="category_id" required>
					@foreach($categories as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>
				<br>
				<br>
				<label>Tipo de producto:  </label>
				<select name="type" required>
					<option value="products">Articulo</option>
					<option value="course">Video Curso</option>
				</select>
				<br>
				<br>
				<!--imagen-->
				<label class="admin-product-image">Foto de Producto</label>
				<input type="file" name="picture" class="form-control" required>
				<br>
				<br>
				<hr>
				<!--boton para salir sin editar el producto-->
				<div class="form-group">
				<button type="button" class="btn btn-primary"><a href="/admin/products/">Volver a productos</a></button>	
				</div>
				<br>
				<!--boton para grabar cambios-->
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Guardar Nuevo Producto</button>	
				</div>
				
		</form>
</body>
</html>