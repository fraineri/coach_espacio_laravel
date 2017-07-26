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
	
	<?php $currStep = "shop" ?>
	@include('/layout/partials/shop/steps')

	<div class="container">
		<div class="shop-cart" id ="items-cont">
			<?php if (count($carrito->items) == 0): ?>
				<h1 class ="msg-error">Aún no tenes productos en el carrito de compras. <a href="/tienda">¡A comprar!</a></h1>
			<?php else: ?>
				<?php foreach ($carrito->items as $item): ?>
					<form method="post" class="item-summary">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input hidden type="number" name="id" value = "{{$item->id}}">
						<div>
							<img class="item-picture" src="{{asset('/storage/products/'.$item->product->picture)}}">
						</div>
						<div class="item-info">
							<p class="item-name">{{$item->product->name}}</p>
							<div class="item-description">
								@if($item->product->type =="products")
									<div>
										<p class="item-title">Cantidad</p>
										<p class="item-value">{{$item->qty}}</p>
										<a class="item-modify" href ="/producto/{{$item->product->id}}">Modificar cantidad</a>
									</div>
								@endif

								<div>
									<p class="item-title">Precio unitario</p>
									<p class="item-value">${{$item->product->price}}</p>
								</div>
							</div>
						</div>
						<div class="buton">
							<button class ="item-delete" type="button">x</button>
						</div>
					</form>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<?php $tagText = "COMENZAR COMPRA";
			  $href = "/shop/shipping";
		?>
		@include('layout/partials/shop/bill')

	</div>

	<script>
		forms =  Array.from(document.getElementById("items-cont").children).forEach(function(i){
			i.querySelector(".item-delete").addEventListener("click",function(e){
				id = i.querySelector("[name=id]").value;
				var req = new XMLHttpRequest();
				req.onreadystatechange = function () {
					if (this.readyState === 4) {
			    		if (this.status === 200) {
			    			if(this.responseText == "ok"){
			    				location.reload();
			    			}
			    		}
			    	}
			    }
			    req.open('POST', '/shop/delete');
			    var data = new FormData();
			    data.append("id",id);
			    data.append("_token", "{{ csrf_token() }}");
				req.send(data);
			})
		});
	</script>
@endsection