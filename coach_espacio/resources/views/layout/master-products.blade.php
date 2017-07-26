@extends('/layout/master')
<?php
	$activePage = 'productos'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/productos.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection


@section('content')
	
	<div>
		@if (!$currCat OR !$currCat->picture)
			<div class = "banner" style="background-image: url('/images/products/shopping.jpg');">
			</div>
		@else
			<div class = "banner" style="background-image: url('{{asset('/storage/categories/'.$currCat->picture)}}');">
			</div>
		@endif
	</div>
	
	<div class ="products-container">
	
	@if (!count($products))
		<div>
			<h2>Actualmente no contamos con productos de esta categoría :(</h2>
		</div>
	@else
		@foreach($products as $product)
			<a href="/producto/{{$product->id}}" class = "product-item" onmouseover="changeInfo(this)" onmouseout="overInfo(this)">
				<div class ="product-image">
					<img class="product-image-resize" src="{{asset('/storage/products/'.$product->picture)}}">
				</div>
				

				<!-- if no stock o descuento -->
				<div class ="product-special">
				@if ($product->stock == 0)
					<img src="/images/products/noStock.png">
				@endif
				</div>	
			
				@if ($product->type == "course")
					<div class ="product-title"><p>{{$product->name}}</p></div>
				@else
					<div class ="product-title"><p>{{$product->name}} | {{$product->category->name}}</p></div>
				@endif
				
				<div class ="info-container" >
					<div class ="product-price"><p>${{$product->price}}</p></div>
					<div class ="product-option">+ VER MÁS</div>
				</div>
			</a>
		@endforeach
	@endif
	</div>
	<div>
		{{ $products->links() }}
	</div>

	<script>
		function changeInfo($t){
			$t.querySelector(".product-price").style.opacity="0";
			$t.querySelector(".product-option").style.opacity="1";
		}
		function overInfo($t){
			$t.querySelector(".product-price").style.opacity="1";
			$t.querySelector(".product-option").style.opacity="0";
		}
	</script>
@endsection