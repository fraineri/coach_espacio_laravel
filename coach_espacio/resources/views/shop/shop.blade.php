@extends('/layout/master')
<?php
	$activePage = 'producto'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<div class="container">
		<div class="shop-cart">
			<?php if (count($carrito->items) == 0): ?>
				<h1 class ="msg-error">Aún no tenes productos en el carrito de compras. <a href="/tienda">¡A comprar!</a></h1>
			<?php else: ?>
				<?php foreach ($carrito->items as $item): ?>
					<div class="item-summary">
						<div >
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
							<a href ="/shop/delete/{{$item->id}}" class ="item-delete">x</a>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<?php $tagText = "COMENZAR COMPRA";
			  $href = "/shop/shipping";
		?>
		@include('layout/partials/shop/bill')

	</div>
@endsection