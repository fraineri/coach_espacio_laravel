@extends('/layout/master')
<?php
	$activePage = 'productos'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/producto.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<div class="container">
		<div class="image-cont">
			<img class="product-image" src="/images/products/{{$product->picture}}">
		</div>
		<div class="product-info">
			<div class="product-name">
				<h2 class="product-title">{{$product->name}}</h2>
				<div class="product-price">
					<p >${{$product->price}}</p>
				</div>
			</div>
			
			

			<div class="product-description">
				<p >{{$product->description}}</p>
			</div>
			
			<form style="text-align: center;">
				{{csrf_field()}}
				<div>
					<label class ="product-price" for="cantidad">Cantidad:</label>
					<input type="number" name="cantidad" class="product-qty" value="1">
				</div>
				<button class="button-cart" type="submit"><i class="fa fa-shopping-cart fa-lg shop-cart" aria-hidden="true"> </i>  Agregar al carrito</button>
			</form>
		</div>
	</div>
@endsection