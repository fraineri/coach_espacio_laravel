@extends('/layout/master')
<?php
	$activePage = 'producto'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/bill.css">
	<link rel="stylesheet" type="text/css" href="/css/shop.css">
	<link rel="stylesheet" type="text/css" href="/css/shipping.css">
	<link rel="stylesheet" type="text/css" href="/css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<?php $currStep = "finalizar"?>
	@include('/layout/partials/shop/steps')
	<h1 class="page-title">Confirma tu pedido</h1>
			<?php 
			$total = 7200 - (time() - $carrito->updated_at->timestamp);
			$hours = floor($total / 3600);
			$minutes = (($total / 60) % 60);
		?>
		<?php if ($hours > 0): ?>
			<p style="display: inline" class="shop-title">Tiempo restante de reserva: <i class="fa fa-clock-o fa-lg shop-title" aria-hidden="true"></i> <?= $hours.":".$minutes ?></p>
		<?php endif ?>
	<form class="container" method="post">
		<div class="shop-cart">
			<div class="shipping" style="width: 100%">
				<div class ="form-input" >
					<p class="form-title">DETALLE DE COMPRA</p>
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
							</div>
						<?php endforeach ?>
					</div>

					<h2 class="label">Información de envío</h2>
					<div class="info-container">
						<div class="input-box">
							<label class="label" for>Nombre</label>
							<input readonly class ="input" type="text" name="name" value ="{{$resume->name}}">
						</div>
						<div class="input-box">
							<label class="label" for>Apellido</label>
							<input readonly class ="input" type="text" name="surname" value ="{{$resume->surname}}">
						</div>
						<div class="input-box">
							<label class="label" for>Direccion</label>
							<input readonly class ="input" type="text" name="address" value ="{{$resume->surname}}">
						</div>
						<div class="input-box">
							<label class="label" for>Ciudad</label>
							<input readonly class ="input" type="text" name="city" value ="{{$resume->city}}">
						</div>
						<div class="input-box">
							<label class="label" for>Provincia</label>
							<input readonly class ="input" type="text" name="province" value ="{{$resume->province}}">
						</div>
						<div class="input-box">
							<label class="label" for>Código postal</label>
							<input readonly class ="input" type="text" name="cp" value ="{{$resume->cp}}">
						</div>
						<div class="input-box">
							<label class="label" for>Teléfono</label>
							<input readonly class ="input" type="text" name="phone" value ="{{$resume->phone}}">
						</div>
					</div>
					<br><br>

					<h2 class="label">Tarjeta de crédito</h2>
					<div class="info-container">
						<div class="input-box">
							<label class="label" for>Titular de la tarjeta</label>
							<input readonly class ="input" type="text" name="card_name" value ="{{$resume->card_name}}">
						</div>
						
						<div class="input-box">
							<label class="label" for>Numero de tarjeta</label>
							<input readonly class ="input" type="text" name="card_number" maxlength="16" value = xxxx-xxxx-xxxx-<?= substr ($resume->card_number, 12)?>>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $tagText = "FINALIZAR COMPRA";?>
		@include('layout/partials/shop/bill')
	</form>
@endsection