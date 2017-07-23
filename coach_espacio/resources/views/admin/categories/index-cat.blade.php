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

	<title>C.E. | Categorias</title>
</head>
<body>
<h1>Categorías:</h1>
	<div class="form-group">
		<button type="button" class="btn btn-primary"><a href="/admin/categories/create">Nueva Categoría</a></button>	
	</div>
	<div class="">
	<ul>
		@foreach($categories as $cat)
		<li>
		<a href="/admin/categories/{{$cat->id}}/update">{{$cat->name}}</a>
		</li>
		@endforeach
	</ul>
	</div>
	{{$categories->links()}}
</body>
</html>