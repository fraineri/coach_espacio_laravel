@extends('/layout/master')
<?php
	$activePage = '/contact'; 
	$userLogin = null;
?>
@section('head')
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Contactanos</title>
@endsection

@section('content')
		<div class ="contact-ppal">
			<div class ="contact-ppal-image">
				<p class ="contact-ppal-text">Contactanos_</p>
			</div>

			<div class ="contact-ppal-description">
				<h2>¿Tenés alguna duda? ¿Estás interesado en contratar nuestros servicios?</h2>
				<p>Completá el siguiente formulario para enviarnos un mail!</p>
			</div>
		</div>
		
		<div class ="form-container">
			<div class="form-contact-container">
				<h1 class="form-title">Contacto</h1>
				<form class="form-contact" method="POST" action="/contact/send">
					{{ csrf_field() }}
					<input class="form-contact-txtNombre" type="text" id="nombre" name="name" placeholder="Nombre" required>
				
					<input class="form-contact-txtApellido" type="text" id="apellido" name="surname" placeholder="Apellido" required>
				
					<input class="form-contact-txtEmail" for="email" type="email" id="email" name="email" placeholder="hola@ejemplo.com" required>
				
					<textarea class="form-contact-txtMensaje" name="message" id="mensaje" placeholder="Escriba su mensaje" required></textarea>

					<button class="form-button-contact standard-button button-cyan" type="submit">Enviar mensaje</button>

				</form>
			</div>
		</div>
@endsection
