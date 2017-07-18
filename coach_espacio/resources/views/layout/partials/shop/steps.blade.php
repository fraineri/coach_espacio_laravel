<div class="shop-steps">
	<div class = "helper <?php if ($currStep=='shop')echo ' shop-active'?>">
		<div class="shop-step">
			<i class="fa fa-shopping-cart fa-lg step-icon" aria-hidden="true"></i>
		</div>
		<p class ="shop-step-name">Carrito de compras</p>
	</div>
	<div class = "helper <?php if ($currStep=='datos')echo ' shop-active'?>">
		<div class="shop-step">
			<i class="fa fa-paper-plane-o fa-lg step-icon" aria-hidden="true"></i>
		</div>
		<p class ="shop-step-name">Datos del envío</p>
	</div>
	<div class = "helper <?php if ($currStep=='pago')echo ' shop-active'?>">
		<div class="shop-step">
			<i class="fa fa-credit-card fa-lg step-icon" aria-hidden="true"></i>
		</div>
		<p class ="shop-step-name">Forma de pago</p>
	</div>
	<div class = "helper <?php if ($currStep=='finalizar')echo ' shop-active'?>">
		<div class="shop-step">
			<i class="fa fa-check fa-lg step-icon" aria-hidden="true"></i>
		</div>
		<p class ="shop-step-name">Finalizar compra</p>
	</div>
</div>