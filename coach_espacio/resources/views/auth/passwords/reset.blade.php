@extends('layout/master')
<?php
	$activePage = 'reset'; 
?>
@section('head')
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/recuperar.css">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Recuperar</title>
@endsection
@section('content')
	<div class="form-container">
		<div class="form-recuperar-container">
			<div class="form-recuperar-shadow"></div>
			<div class="form-recuperar-titleCont">
				<h1 class="form-recuperar-title">Restablecer Contraseña</h1>
				<a class="form-recuperar-icon"><i class="fa fa-question fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="{{ route('password.request') }}" method="post" class="form-recuperar-inputs">
				{{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

				<input class="form-recuperar-txtUsuario" type="text" id="email" name="email"  placeholder="Email" value="{{ old('email') }}" required>
				@if ($errors->has('email'))
	                <span class="lbl-error">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif

				<input class="form-recuperar-txtUsuario" type="password" id="password" name="password"  placeholder="Contraseña"	value="" required>
				@if ($errors->has('password'))
	                <span class="lbl-error">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	            @endif

				<input class="form-recuperar-txtUsuario" type="password" id="password_confirmation" name="password_confirmation"  placeholder="Repita Contraseña" value="" required>
                @if ($errors->has('password_confirmation'))
                    <span class="lbl-error">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

				<button class="form-button-recuperar standard-button button-cyan" type="submit">Enviar Mail</button>
			</form>
			</div>
		</div>
	</div>
@endsection