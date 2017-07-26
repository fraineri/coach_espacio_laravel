<?php if (count($carrito) && count($carrito->items) !=0): ?>
	<div class ="bill">
		<img style="width: 100%" src="/images/products/shop.png">

		<div class ="shop">
			<div class = "shop-helper">
				<p class="shop-title">Tu compra <i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
			</div>
			<div class="shop-price">
				<p>TOTAL</p>
				<p>$<?php echo $carrito->getTotal()?></p>
			</div>
			<div>
				<a href="<?php echo $href ?>" class="button-buy">
					<?php echo $tagText ?>
				</a>
			</div>
		</div>
	</div>
<?php endif ?>
