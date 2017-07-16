@extends('/layout/master')
@section('head')
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/user-profile.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:750px)" href="css/sign-in-up-750.css">
		<link rel="stylesheet" type="text/css" media="only screen and (max-width:480px)" href="css/sign-in-up-480.css">

		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Información de perfil</title>
@endsection
@section('content')
		<h2 class ="page-title">Información de perfil</h2>

		<div class = "form-profile-container">
			<h1 class="form-profile-title"> {{$user->name.$user->surname}} </h1>
			<form class="form-profile-inputs" method="POST" action=" {{ route('user-profile')}} " enctype="multipart/form-data">
				{{csrf_field()}}
				<label class="form-profile-label">Usuario</label>
				<p class="form-profile-txtUsuario"> {{$user->username}} </p>

				<label class="form-profile-label" for ="email">Mail</label>
				<input class="form-profile-txtEmail" type="email" name="email" value ="{{$user->email}}">
				@if ($errors->has('email'))
					<span class="lbl-error">
						<strong> {{ $errors->first('email') }} </strong>
					</span>
				@endif

				<label class="form-profile-label" for ="nombre">Nombre</label>
				<input class="form-profile-txtNombre" type="text" name="nombre" value =" {{$user->username}} ">
				@if ($errors->has('username'))
					<span class="lbl-error">
						<strong> {{ $errors->first('username') }} </strong>
					</span>
				@endif
			
				<label class="form-profile-label" for ="apellido">Apellido</label>
				<input class="form-profile-txtApellido" type="text" name="apellido" value=" {{$user->surname}} ">		
				@if ($errors->has('surname'))
					<span class="lbl-error">
						<strong> {{ $errors->first('surname') }} </strong>
					</span>
				@endif

				<label class="form-profile-label" for ="profile-picture">Foto de perfil</label>
				<?php 
					if ($_SESSION['picture'] != 'default.png') {
						$name = $_SESSION['picture'];
						echo "<img class = 'form-profile-picture' src='php/users/pictures/$name'>";
					}
				?>
				<input type="file" name="avatar">

				<div class ="button-change-psw">
					<label for ="change-psw">Contraseña</label>	
					<button id="button-psw" class="standard-button button-red" type="button" name="but-change-psw">Cambiar contraseña</button>
				</div>

				<div class ="div-change-psw">
					<label for ="actPsw">Ingrese su contraseña actual</label>
					<input class="form-profile-txtPass" type="password" name="actPsw">
					<span class="lbl-error" id ="actPsw"><?php echo $errores['actPsw'];?></span>

					<label for ="actPsw">Ingrese su nueva contraseña</label>
					<input class="form-profile-txtPass" type="password" name="newPsw">

					<label for ="actPsw">Reingrese la contraseña nueva</label>
					<input class="form-profile-txtPass" type="password" name="reNewPsw">
					<span class="lbl-error" id="reNewPsw"><?php echo $errores['newPsw'];?></span>	
				</div>

				<button class="form-profile-send standard-button button-cyan" type="submit">ACTUALIZAR DATOS</button>

			</form>
		</div>

		<script src="js/profile-changepsw.js"></script>
@section('content')
	
