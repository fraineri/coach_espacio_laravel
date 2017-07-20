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
				<input type="text" name="name" class="form-control" value="{{$prod->name}}" required>
				@if ($errors->has('name'))
					<span class="lbl-error">
						<strong> {{ $errors->first('name') }} </strong>
					</span>
				@endif
				<br>
				<input type="text" name="description" class="form-control" value="{{$prod->description}}" required>
				@if ($errors->has('description'))
					<span class="lbl-error">
						<strong> {{ $errors->first('description') }} </strong>
					</span>
				@endif
				<br>
				<input type="text" name="price" class="form-control" value="{{$prod->price}}" required>
				@if ($errors->has('price'))
					<span class="lbl-error">
						<strong> {{ $errors->first('price') }} </strong>
					</span>
				@endif
				<br>
				<input type="text" name="stock" class="form-control" value="{{$prod->stock}}" required>
				@if ($errors->has('stock'))
					<span class="lbl-error">
						<strong> {{ $errors->first('stock') }} </strong>
					</span>
				@endif
				<br>
				<!--checkbutton de purchable // o botón NO Vendible-->
				<h3>{{$nomCat}}</h3>
				@foreach($categories as $cat)
				<h2>{{$cat->name}}</h2>
				@endforeach
				<!--select de categoria de productos-->
				<div class="form-group">
				<button type="button" class="btn btn-primary"><a href="/admin/products/">Volver a productos</a></button>	
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Grabar cambios</button>	
				</div>
				
		</form>
</body>
</html>