@extends('/layout/master')
@section('head')
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

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
	<div class="form-container">
		<div class="form-register-container">
			<div class="form-register-shadow"></div>
				<div class="form-register-titleCont">
					<h1 class="form-register-title">REGISTRATE</h1>
					<div class="form-register-icon" ><i class="fa fa-pencil fa-5x" aria-hidden="true"></i></div>
				</div>
				<form class="form-register-inputs" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<input id="txtName" class="form-register-txtNombre" type="text" name="name" placeholder="Nombre"  value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="lbl-error">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

					<input id="txtSurname" class="form-register-txtApellido" type="text" name="surname" placeholder="Apellido"  value="{{ old('surname') }}">		
					@if ($errors->has('surname'))
                        <span class="lbl-error">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif

					<input id="txtEmail" class="form-register-txtEmail" type="text" name="email" placeholder="tu@email"  value="{{ old('email') }}">
					@if ($errors->has('email'))
                        <span class="lbl-error">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

					<input id="txtUser" class="form-register-txtUsuario" type="text" name="username" placeholder="Usuario"  value="{{ old('username') }}">
					<span id="user-lbl-ok" class="lbl-ok"></span>
					@if ($errors->has('username'))
                        <span id="user-lbl-error" class="lbl-error">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif					

					<input id="txtPass" class="form-register-txtPass" type="password" name="password" placeholder="Contraseña" >
					@if ($errors->has('password'))
                        <span class="lbl-error">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

					<input id="txtRePass" class="form-register-txtRePass" type="password" name="password_confirmation" placeholder="Repita su contraseña" >
					<span class="lbl-error"></span>

					<label for="avatar" class="form-register-label-foto">Foto de perfil</label>
					<input class="form-register-foto" type="file" name="avatar">

					<button class="form-button-register standard-button button-white" type="submit">REGISTRAR</button>
				</form>
			</div>
		</div>
	</div>
<!--<script src="js/registerValidation.js"></script> -->
@endsection