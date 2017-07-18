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
	
	<?php $currStep = "datos"?>
	@include('/layout/partials/shop/steps')

	<div class="container">
		<div class="shipping">
			<form class ="form-input" method="post">
				{{csrf_field()}}
				<p class="form-title">Datos personales</p>
				<div class="info-container">
					<div class="input-box">
						<label class="label" for>Nombre</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Apellido</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Direccion</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Ciudad</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Provincia</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Código postal</label>
						<input class ="input" type="text" name="">
					</div>
					<div class="input-box">
						<label class="label" for>Teléfono</label>
						<input class ="input" type="text" name="">
					</div>
				</div>
			</form>
		</div>

		<?php $tagText = "CONTINUAR";
			  $href = "/shop/payment";?>
		@include('layout/partials/shop/bill')
	</div>
@endsection