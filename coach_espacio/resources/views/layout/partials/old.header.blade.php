<header class ="home-header">
			<nav class ="horizontal-menu">
				<?php 
					$pagesNav= [
						'/' => 'Home',
						'/#knowus' => 'Quiénes somos',
						/*'productos.php' => 'Productos',*/
						/*'curses.php' => 'Cursos',*/
						'contact' => 'Contactanos',
						'faq' => 'FAQ'
					];

					$pagesLog = [
						'login' => 'Iniciar sesión',
						'register' => 'Registrarse',
					];
				?>
				
				<ul class ="horizontal-menu-nav">
					<?php foreach ($pagesNav as $url => $title): ?>
						<li>
							<a <?php if($url === $activePage){echo 'class ="page-active"';}?> href="<?php echo $url; ?>"><?php echo $title ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
				
				<ul class ="horizontal-menu-log">
					<?php if($userLogin == null){ ?>
						<?php foreach ($pagesLog as $url => $title): ?>
							<li>
								<a <?php if($url === $activePage){echo 'class ="page-active"';}?> href="<?php echo $url; ?>"><?php echo $title ?></a>
							</li>
						<?php endforeach; ?>
					<?php } else { ?>
						<li class = "desplegable">
							<div class ="desplegable-user" >
								<div class ="menu-log-user">
									<img class = 'menu-log-user-image' src="php/users/pictures/<?php echo$_SESSION['picture'] ?>">
								</div>
								<div class = 'menu-log-name'>
									<p><?php echo $userLogin; ?></p>
								</div>
							</div>
							<ul class ="options">
								<li><a href="user-profile.php">Editar perfil</a></li>
								<li><a href="php/logOut.php">Cerrar sesión</a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</header>
