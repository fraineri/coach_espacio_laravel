<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coach Espacios Editar</title>
</head>
<body>
	<h1>Editar {{$prod->name}}</h1>
	<div class="container">
		<div class="form-group">
			<form class="form-horizontal" method="POST" action="/admin/products/{{$prod->id}}/update">
				{{csrf_field()}}
				<input type="text" name="name" class="form-control" placeholder="{{$prod->name}}">
				<input type="text" name="description" class="form-control" placeholder="{{$prod->description}}">
				<input type="text" name="price" class="form-control" placeholder="{{$prod->price}}">
				<input type="text" name="stock" class="form-control" placeholder="{{$prod->stock}}">

				<h3>{{$nomCat}}</h3>
				<!--<select name="category_id">
					@foreach($categories as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
					@enforeach
				</select>-->
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Garbar cambios</button>	
				</div>
			</form>
		</div>
	</div>
</body>
</html>