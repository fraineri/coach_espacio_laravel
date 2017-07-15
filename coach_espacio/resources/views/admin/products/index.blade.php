<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coach Espacios Admin</title>
</head>
<body>
<h1>Productos</h1>
	<ul>
		@foreach($products as $prod)
		<li>{{$prod->name}}</li>
		@endforeach
	</ul>
	

</body>
</html>