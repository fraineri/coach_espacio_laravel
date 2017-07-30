<h1> Compra </h1>
<ul>
@foreach($carritoEmail->items as $item)
	<li>
		<strong>{{$item->product->name}}</strong> (x {{ $item->qty }}): {{ ($item->product->price*$item->qty) }}
	</li>
@endforeach
</ul>

