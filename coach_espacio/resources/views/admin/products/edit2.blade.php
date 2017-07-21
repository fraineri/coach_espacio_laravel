<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar 2</title>
</head>
<body>
	<h1>Editar {{$prod->name}}</h1>
		<form class="form-horizontal" method="POST" action="/admin/products/{{$prod->id}}/update">
				{{csrf_field()}}
				<label>Nombre:</label>
				<input type="text" name="name" class="form-control" value="{{$prod->name}}" required>
				@if ($errors->has('name'))
					<span class="lbl-error">
						<strong> {{ $errors->first('name') }} </strong>
					</span>
				@endif
				<hr>
				<label>Descripción:</label>
				<input type="text" name="description" class="form-control" value="{{$prod->description}}" required>
				@if ($errors->has('description'))
					<span class="lbl-error">
						<strong> {{ $errors->first('description') }} </strong>
					</span>
				@endif
				<hr>
				<label>Precio:</label>
				<input type="text" name="price" class="form-control" value="{{$prod->price}}" required>
				@if ($errors->has('price'))
					<span class="lbl-error">
						<strong> {{ $errors->first('price') }} </strong>
					</span>
				@endif
				<hr>
				<label>Stock:</label>
				<input type="text" name="stock" class="form-control" value="{{$prod->stock}}" required>
				@if ($errors->has('stock'))
					<span class="lbl-error">
						<strong> {{ $errors->first('stock') }} </strong>
					</span>
				@endif
				<hr>
				<!--true o false para purchable-->
				<label>Producto listo para vender?</label>
				<select name="purchable">
					<option value=1>Si, Vender</option>
					<option value=0>NO vender</option>
				</select>
				<hr>
				<!--categorias de la tabla categories-->
				<label>Categoria del producto: {{$nomCat}}</label>
				<select name="category_id">
					@foreach($categories as $cat)
						<option>{{$cat->name}}</option>
					@endforeach
				</select>
				<hr>
				<!--boton para salir sin editar el producto-->
				<div class="form-group">
				<button type="button" class="btn btn-primary"><a href="/admin/products/">Volver a productos</a></button>	
				</div>
				<br>
				<!--boton para grabar cambios-->
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Grabar cambios</button>	
				</div>
				
		</form>
</body>
</html>