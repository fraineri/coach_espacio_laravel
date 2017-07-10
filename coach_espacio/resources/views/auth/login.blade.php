@extends('/layout/master')
@section('head')
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign-in-up.css">

	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/sign-in-up.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Iniciá sesión</title>
@endsection
@section('content')
	<?php
		$activePage = 'login.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		if ($userLogin) {
			header('location: index');
		}
	?>

	<div class="form-container">
		<div class="form-login-container">
			<div class="form-login-shadow"></div>
			<div class="form-login-titleCont">
				<h1 class="form-login-title">INGRESAR</h1>
				<a class="form-login-icon" href="register.php"><i class="fa fa-user-o fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="php/controllers/login.controller.php" method="post" class="form-login-inputs">
				<input required class="form-login-txtUsuario" type="text" id="ingreso" name="username"  placeholder="Usuario" value="{{ old('username')}}">
				<span class="lbl-error">
				</span>
		
				<input required class="form-login-txtPass" type="password" id="contraseña" name="password" placeholder="Contraseña">
				<span class="lbl-error">
				</span>
				
				<div class="form-login-remember">
					<label class="form-login-lblRemember">Recordame!</label>
					<input class="form-login-chkRemember" type="checkbox" name="recordame" value="si">
				</div>

				<button class="form-button-login standard-button button-cyan" type="submit">ENTRAR</button>
			</form>
			<a class="form-login-forgot" href="/recuperar">Olvidaste tu contraseña?</a>
						
			</div>
		</div>
	</div>
@endsection

