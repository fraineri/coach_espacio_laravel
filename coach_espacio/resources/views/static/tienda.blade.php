@extends('/layout/master')
<?php
	$activePage = '/tienda'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/tienda.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	<div class ="container">
		<h1>Bienvenido a la tienda!</h1>
		<div class ="items-container">
			<div class ="item">
				<a  href="productos">
					<img class ="item-image" src="images/others/relojes.jpg">
					<p class ="item-title">Artículos</p>	
				</a>
			</div>
			<div class ="item">
				<a  href="">
					<img class ="item-image" src="images/others/Curso.jpg">
					<p class ="item-title">Cursos</p>
				</a>
			</div>
		</div>
	</div>
@endsection