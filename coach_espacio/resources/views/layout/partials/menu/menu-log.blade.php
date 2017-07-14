<?php if($userLogin == null){ ?>
	<?php foreach ($pagesLog as $url => $title): ?>
		<li>
			<a <?php if($url === $activePage){echo 'class ="page-active"';}?> class = "selectable" href="<?php echo $url; ?>"><?php echo $title ?></a>
		</li>
	<?php endforeach; ?>
<?php } else { ?>
	<li class = "ham-desplegable">
		<div class ="ham-desplegable-user" >
			<div class ="ham-menu-log-user">
				<img class = 'ham-menu-log-user-image' src="php/users/pictures/<?php echo$_SESSION['picture'] ?>">
			</div>
			<div class = 'ham-menu-log-name'>
				<p><?php echo $userLogin; ?></p>
			</div>
		</div>
		<ul class="ham-options">
			<li><a href="ham-user-profile.php">Editar perfil</a></li>
			<li><a href="ham-php/logOut.php">Cerrar sesión</a></li>
		</ul>
	</li>
<?php } ?>
	<li class ="ham-shop-cart-menu">
		<a href="#">
			<div>
				<i class="fa fa-shopping-cart fa-lg shop-cart" aria-hidden="true"> </i>
			</div>
		</a>
	</li>