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

	<title>C.E. | Administrador</title>
</head>
<body>
	<h1>Productos y Videos</h1>
	<br>
	<div class="form-group">
		<button type="button" class="btn btn-primary"><a href="/admin/products/create">Nuevo Producto</a></button>	
	</div>
	<br>
	<br>
	<div class="">
	<ul>
		@foreach($products as $prod)
		<li>
		<a href="/admin/products/{{$prod->id}}/update">{{$prod->name}}</a>
		</li>
		@endforeach
	</ul>
	</div>
	{{$products->links()}}

</body>
</html>

