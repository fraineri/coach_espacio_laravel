@extends('/layout/master')
<?php
	$activePage = 'producto'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/shop.css">
	<link rel="stylesheet" type="text/css" href="/css/bill.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<h1 class="page-title">Compra realizada con éxito!</h1>

	<h1>Te llegará un mail con el detalle de la compra.</h1>
	<a style="color: #5DC2E3;" href="/shop/historic"><h1>Podes ver el historial de tus compras haciendo click aqui.</h1></a>

	<script src = "/js/products/delete-from-cart.js"></script>
@endsection