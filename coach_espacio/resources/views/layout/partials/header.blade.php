<?php 
	$pagesNav= [
		'/' => 'Home',
		'/#knowus' => 'Quiénes somos',
		'/tienda' => 'Comprar',
		'/contact' => 'Contactanos',
		'/faq' => 'FAQ'
	];

	$pagesLog = [
		'/login' => 'Iniciar sesión',
		'/register' => 'Registrarse',
	];
?>
<header class ="home-header">
	<nav class ="main-menu">
		<button type ="button" class ="ham-resp"><i class="hamburguer-icon fa fa-bars fa-3x" aria-hidden="true"></i></button>
		<div class ="hamburguer-menu" style="display: none; animation:fadein .3s;">
			<ul class ="ham-horizontal-menu-nav">
				@include('layout/partials/menu/menu-nav')
			</ul>
			<ul class ="ham-horizontal-menu-log">
				@include('layout/partials/menu/menu-log')
			</ul>
		</div>

		<div class ="horizontal-menu">
			<ul class ="horizontal-menu-nav">
				@include('layout/partials/menu/menu-nav')
			</ul>
			<ul class ="horizontal-menu-log">
				@include('layout/partials/menu/menu-log')
			</ul>
		</div>
		<!--Categoria de productos-->
		<?php if ($activePage === "productos"): ?>
			<div class="menu-products">
			<div>
				<ul class='products-section'>
					@foreach($categories as $cat)
						@if ((!$id AND $cat->id ==1) OR ($id AND $cat->id == $id))
							<li><a class="product-category category-selected" href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
						@else
							<li><a class="product-category" href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
			<div>	
				<ul class='products-section course'>
					<li><a class="product-category" href="cursos.php">Ir a ver nuestros cursos</a></li>	
				</ul>
			</div>	
		<?php endif ?>
	</div>
	</nav>
	
	<script src="/js/cambiar_tema.js"></script>
	<script src="/js/menu-responsive.js"></script>
</header>