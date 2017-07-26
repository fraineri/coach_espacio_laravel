@extends('/layout/master')
<?php
	$activePage = 'producto'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
			<img class="product-image" src="{{ asset('storage') }}/products/{{$product->picture}}">
		</div>
		<div class="product-info">
			<div class="product-name">
				<h2 class="product-title">{{$product->name}}</h2>
				@if ($product->type == "products")
					<p class ="category">{{$product->category->name}}</p>
				@endif
				<div class="product-price">
					<p >${{$product->price}}</p>
				</div>
			</div>

	
			<div class="product-description">
				<p style="font-weight: bolder;">Descripción</p>
				<p>{{$product->description}}</p>
			</div>
			
			<form method="post" style="text-align: center;">
				{{csrf_field()}}
				<!--<input type="hidden" name="_method" value="PUT">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
    			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			<input type="number" name="id" hidden value = "{{$product->id}}">
				<div class = "product-select">
    				@if($product->type == "products")
						@if($product->stock != 0 )
							<div style="display: flex; align-items: center;">
								<p class ="product-price" for="cantidad">Cantidad:</p>
								<button type="button" id = "menos" class="qty-button">-</button>
								<input type = "text" readonly id="cantidad" name = "productqty" class="product-qty" value="1"></p>
								<button type="button" id = "mas" class="qty-button">+</button>
							</div>
							
						@endif
					@endif
				</div>
				<div>
					@if($product->type=="products" AND $product->stock == 0)
						<div class="button-cart stock">Sin stock</div>
					@else
				
					<button type="button" name="buttoncart" class="button-cart" ><i class="fa fa-shopping-cart fa-lg shop-cart" aria-hidden="true"> </i>  Agregar al carrito</button>
					@endif
				</div>
			</form>
		</div>
		<div style="padding-top: 10px;position: relative;margin: auto;width: 100%; display: flex; justify-content: center;">
			<h3 class="success">Producto agregado correctamente</h3>
			<h3 class="error">No se pudo agregar el producto. No tenemos la cantidad de stock ingresada.</h3>
		</div>
	</div>
	
	<script src ="/js/products/add-to-cart.js"></script>
	<script src ="/js/products/qty-update.js"></script>
	
@endsection