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
	
	<?php $currStep = "finalizar"?>
	@include('/layout/partials/shop/steps')

	<div class="container" >
		<div class="shipping">
			<form class ="form-input" method="post" >
				{{csrf_field()}}
				<p class="form-title">CONFIRMAR COMPRA</p>
				<div class="info-container" >
					<div class="input-box">
						<label class="label" for>Titular de la tarjeta</label>
						<input class ="input" type="text" name="creditName">
					</div>
					<div class="input-box">
						<label class="label" for>Numero de tarjeta (solo números)</label>
						<input class ="input" type="text" name="creditNumber" maxlength="16">
					</div>
					<div class="input-box">
						<label class="label" for>Código de seguridad</label>
						<input class ="input" type="text" name="creditCode" maxlength="4">
					</div>
					<div class="input-box">
						<label class="label" for>Fecha de vencimiento</label>
						<select class ="input" name ="month">
							<?php for ($i=1; $i <=12 ; $i++) { 
								echo "<option value = '$i'>$i</option>";
							} ?>
						</select>
						<select class ="input" name="year">
							<?php for ($i=2017; $i <= 2050 ; $i++) { 
								echo "<option value = '$i'>$i</option>";
							}?>
						</select>
					</div>
					
				</div>
			</form>
		</div>

		<?php $tagText = "COMPRAR";
			  $href = "";?>
		@include('layout/partials/shop/bill')
	</div>
@endsection