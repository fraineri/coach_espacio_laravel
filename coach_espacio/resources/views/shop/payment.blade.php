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
	<link rel="stylesheet" type="text/css" href="/css/shipping.css">
	<link rel="stylesheet" type="text/css" href="/css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<?php $currStep = "pago"?>
	@include('/layout/partials/shop/steps')
	<?php 
		$total = 7200 - (time() - $carrito->updated_at->timestamp);
		$hours = floor($total / 3600);
		$minutes = (($total / 60) % 60);
	?>
	<?php if ($hours > 0): ?>
		<p style="display: inline" class="shop-title">Tiempo restante de reserva: <i class="fa fa-clock-o fa-lg shop-title" aria-hidden="true"></i> <?= $hours.":".$minutes ?></p>
	<?php endif ?>
	<form  method="post" class="container">
	{{csrf_field()}}
		<div class="shipping">
			<div class ="form-input">
				<p class="form-title">TARJETA DE CREDITO</p>
				<div class="info-container">
					<div class="input-box">
						<label class="label" for>Titular de la tarjeta</label>
						<input required class ="input" type="text" name="card_name">
					</div>
					<div class="input-box">
						<label class="label" for>Numero de tarjeta (solo números)</label>
						<input required class ="input" type="text" name="card_number" maxlength="16">
					</div>
					<div class="input-box">
						<label class="label" for>Código de seguridad</label>
						<input required class ="input" type="text" name="card_code" maxlength="4">
					</div>
					<div class="input-box">
						<label class="label" for>Fecha de vencimiento</label>
						<select class ="input" name ="card_month">
							<?php for ($i=1; $i <=12 ; $i++) { 
								echo "<option value = '$i'>$i</option>";
							} ?>
						</select>
						<select class ="input" name="card_year">
							<?php for ($i=2017; $i <= 2050 ; $i++) { 
								echo "<option value = '$i'>$i</option>";
							}?>
						</select>
					</div>
					
				</div>
			</div>
		</div>

		<?php $tagText = "FINALIZAR COMPRA";
			  $href = "/shop/buy";?>
		@include('layout/partials/shop/bill')
	</form>
@endsection