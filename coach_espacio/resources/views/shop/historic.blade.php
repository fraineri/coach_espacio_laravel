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
	<link rel="stylesheet" type="text/css" href="/css/shop.css">
	<link rel="stylesheet" type="text/css" href="/css/shipping.css">
	<link rel="stylesheet" type="text/css" href="/css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection

@section('content')
	
	<h1 class="page-title">Historial de compras realizadas</h1>
	@if(!count($historic))
		<h1>Aún no has realizado ninguna compra</h1>
		<a style="color: #5DC2E3;" href="/tienda"><h1>Puedes comenzar a comprar haciendo click aquí</h1></a>
	@else
		<?php $cont = 1; ?>
		@foreach($historic as $sell)
			<h2>Compra realizada el <?= date('d/m/Y', $sell->updated_at->timestamp); ?></h2>
			@foreach($sell->saledetail as $detail)
				<h3>#<?= $cont ?> {{$detail->product->name}}</h3>
				<h4>Cantidad: {{$detail->qty}}</h4>
				<h4>Precio unitario: ${{$detail->price_unit}}</h4>
			@endforeach
			<?php $cont++; ?>
		@endforeach
	@endif
	
@endsection