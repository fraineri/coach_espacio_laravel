@extends('layout/master')
<?php
	$activePage = 'email'; 
?>
@section('head')
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/recuperar.css">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

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
				<h1 class="form-recuperar-title">Recuperar Contraseña</h1>
				<a class="form-recuperar-icon"><i class="fa fa-question fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="{{ route('password.email') }}" method="post" class="form-recuperar-inputs">
				{{ csrf_field() }}
				<input class="form-recuperar-txtUsuario" type="text" id="email" name="email"  placeholder="Ingrese su email"	value="" required>
				@if ($errors->has('email'))
				<span class="lbl-error">
                	<strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

                @if(session()->has('correct'))
					<span class="lbl-confirm">Mail envidado</span>	
                @endif
				<button class="form-button-recuperar standard-button button-cyan" type="submit">Enviar Mail</button>
			</form>
			</div>
		</div>
	</div>
@endsection