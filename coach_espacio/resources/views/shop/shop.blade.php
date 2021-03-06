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
	<link rel="stylesheet" type="text/css" href="/css/shop.css">
	<link rel="stylesheet" type="text/css" href="/css/bill.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<?php $currStep = "shop" ?>
	@include('/layout/partials/shop/steps')

	<form class="container" method ="post">
		<div class="shop-cart" >
			<?php if (count($carrito) == 0 || count($carrito->items) == 0): ?>
				<h1 class ="msg-error">Aún no tenes productos en el carrito de compras. <a href="/tienda">¡A comprar!</a></h1>
			<?php else: ?>
				<?php 
					$total = 7200 - (time() - $carrito->updated_at->timestamp);
					$hours = floor($total / 3600);
					$minutes = (($total / 60) % 60);
				?>
				<?php if ($hours > 0): ?>
					<p style="display: inline" class="shop-title">Tiempo restante de reserva: <i class="fa fa-clock-o fa-lg shop-title" aria-hidden="true"></i> <?= $hours.":".$minutes ?></p>
				<?php endif ?>

				<div id ="items-cont">
				<?php foreach ($carrito->items as $item): ?>
					<div class="item-summary">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input hidden type="number" name="id" value = "{{$item->id}}">
						<div>
							<img class="item-picture" src="{{asset('/storage/products/'.$item->product->picture)}}">
						</div>
						<div class="item-info">
							<p class="item-name">{{$item->product->name}}</p>
							<div class="item-description">
								@if($item->product->type =="products")
									<div>
										<p class="item-title">Cantidad</p>
										<p class="item-value">{{$item->qty}}</p>
									</div>
								@endif

								<div>
									<p class="item-title">Precio unitario</p>
									<p class="item-value">${{$item->product->price}}</p>
								</div>
							</div>
						</div>
						<div class="buton">
							<button class ="item-delete" type="button">x</button>
						</div>
					</div>
				<?php endforeach ?>
				</div>
			<?php endif ?>
		</div>

		<?php $tagText = "COMENZAR COMPRA";?>
		@include('layout/partials/shop/bill')

	</form>

	<script src = "/js/products/delete-from-cart.js"></script>
@endsection