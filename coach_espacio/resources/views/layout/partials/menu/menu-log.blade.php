@if(!\Auth::check())
	@foreach ($pagesLog as $url => $title)
		<li>
			<a <?php if($url === $activePage){echo 'class ="page-active"';}?> class = "selectable" href="{{ $url }}">{{ $title }}</a>
		</li>
	@endforeach
@else
	<li class = "ham-desplegable">
		<div class ="ham-desplegable-user" >
			<div class ="ham-menu-log-user">
				<img class = 'ham-menu-log-user-image' src="{{ \Auth::user()->avatar }}">
			</div>
			<div class = 'ham-menu-log-name'>
				<p>{{ \Auth::user()->username }}</p>
			</div>
		</div>
		<ul class="ham-options">
			<li><a href="ham-user-profile.php">Editar perfil</a></li>
			<li>
				<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
					Cerrar sesión
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
				</form>
		</ul>
	</li>
@endif
<li class ="ham-shop-cart-menu">
	<a href="#">
		<div>
			<i class="fa fa-shopping-cart fa-lg shop-cart" aria-hidden="true"> </i>
		</div>
	</a>
</li>