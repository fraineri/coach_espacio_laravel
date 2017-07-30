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

	<?php 
		$total = 7200 - (time() - $carrito->updated_at->timestamp);
		$hours = floor($total / 3600);
		$minutes = (($total / 60) % 60);
	?>
	<?php if ($hours > 0): ?>
		<p style="display: inline" class="shop-title">Tiempo restante de reserva: <i class="fa fa-clock-o fa-lg shop-title" aria-hidden="true"></i> <?= $hours.":".$minutes ?></p>
	<?php endif ?>
	<form class="container" method="post">
		{{csrf_field()}}

		<div class="shipping">
			<div class ="form-input" >
				<p class="form-title">Información de envío</p>
				<div class="info-container">
					<div class="input-box">
						<label class="label" for>Nombre</label>
						<input required class ="input" type="text" name="name" value ="{{Auth::user()->name}}">
						@if ($errors->has('name'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Apellido</label>
						<input required class ="input" type="text" name="surname" value ="{{Auth::user()->surname}}">
						@if ($errors->has('surname'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('surname') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Direccion</label>
						<input required class ="input" type="text" name="address" value="{{ old('address') }}">
						@if ($errors->has('address'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('address') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Ciudad</label>
						<input required class ="input" type="text" name="city" value="{{ old('city') }}">
						@if ($errors->has('city'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('city') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Provincia</label>
						<input required class ="input" type="text" name="province" value="{{ old('province') }}">
						@if ($errors->has('province'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('province') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Código postal</label>
						<input required class ="input" type="text" name="cp" value="{{ old('cp') }}">
						@if ($errors->has('cp'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('cp') }}</strong>
	                        </span>
                    	@endif
					</div>
					<div class="input-box">
						<label class="label" for>Teléfono</label>
						<input required class ="input" type="text" name="phone" value="{{ old('phone') }}">
						@if ($errors->has('phone'))
	                        <span class="lbl-error">
	                            <strong>{{ $errors->first('phone') }}</strong>
	                        </span>
                    	@endif
					</div>
				</div>
			</div>
		</div>
		
		<?php $tagText = "COMENZAR COMPRA";?>
		@include('layout/partials/shop/bill')
	</form>
@endsection