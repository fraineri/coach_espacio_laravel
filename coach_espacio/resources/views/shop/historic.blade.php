@extends('/layout/master')
<?php
	$activePage = 'producto'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/historic.css">

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
		@foreach($historic as $sell)
			<?php $cont = 1; ?>
			<div class="buy-container">
				<h2 class="title">Compra realizada el <?= date('d/m/Y', $sell->updated_at->timestamp); ?></h2>
				@foreach($sell->saledetail as $detail)
					<div class="item-container">
						<h3 class="name"><div class="smaller">#<?= $cont ?></div> {{$detail->product->name}}</h3>
						<div class="item-detail">
							<h4 class="qty">Cantidad: {{$detail->qty}}</h4>
							<h4 class="price">Precio unitario: ${{$detail->price_unit}}</h4>
						</div>
						<?php $cont++; ?>
					</div>
					<hr class="helper">
				@endforeach
			</div>
		@endforeach
	@endif
	
@endsection