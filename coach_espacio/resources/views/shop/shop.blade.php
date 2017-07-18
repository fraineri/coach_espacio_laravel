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
			<?php $total = 0 ?>
			<?php if (count($items) ==0): ?>
				<h1 class ="msg-error">Aún no tenes productos en el carrito de compras. <a href="/tienda">¡A comprar!</a></h1>
			<?php else: ?>
				<?php $total = 0 ?>
				<?php foreach ($items as $item): ?>
					<div class="item-summary">
						<div >
							<img class="item-picture" src="/images/products/{{$item->product->picture}}">
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
					<?php $total += $item->qty*$item->product->price?>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<?php if (count($items) !=0): ?>
		<div class ="test">
			<img style="width: 100%" src="/images/products/shop.png">

			<div class ="shop">
				<div class = "shop-helper">
					<p class="shop-title">Tu compra <i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
				</div>
				<div class="shop-price">
					<p>TOTAL</p>
					<p>$<?php echo $total?></p>
				</div>
				<div>
					<button type="submit" class="button-buy">
						COMENZAR COMPRA
					</button>
				</div>
			</div>
		</div>
		<?php endif ?>
	</div>
@endsection