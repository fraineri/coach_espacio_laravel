<div style="width:90%; border-radius: 30px; background-color: #96D9EA; color:white; padding:20px;" >
	<h1>Orden de compra N° {{$order->id}}</h1>
	<h2>Total: ${{$order->total}}</h2>
	<h2>Compra realizada:</h2>
	<ul style="list-style-type: circle; font-size: 1.2em; width: 100%;">
		@foreach($carritoEmail->items as $item)
			<li style="width: 100%;">
				<h4><strong>{{$item->product->name}}</strong></h4>
				<div style="margin-left: 50px;">
					<p>Cantidad: {{$item->qty}}</p>
					<p>Total: ${{$item->qty}}*{{$item->price_unit}}</p>
				</div>
			</li>
		@endforeach
	</ul>

	<h1>Información de envío</h1>
	<ul style="list-style-type: circle; font-size: 1.2em;">
		<li><p><strong>Nombre y apellido</strong> {{$order->name}} {{$order->surname}}</p></li>
		<li><p><strong>Dirección: </strong> {{$order->address}}</p></li>
		<li><p><strong>Ciudad: </strong> {{$order->city}} </p></li>
		<li><p><strong>Provincia: </strong> {{$order->province}}</p></li>
	</ul>

	<footer>
		<div style="display: flex; justify-content: flex-end;margin-right: 20px;">
			<h5>COACH DE ESPACIOS</h5>
		</div>
	</footer>
</div>
