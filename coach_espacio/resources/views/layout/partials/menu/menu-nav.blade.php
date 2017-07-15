<?php foreach ($pagesNav as $url => $title): ?>
	<li <?php if($url === $activePage){echo 'class ="page-active"';}?>  >
		
		<?php if ($url == "/#knowus"): ?>
			<a class = "selectable" id ="know" href="<?php echo $url; ?>"><?php echo $title ?></a>
		<?php else: ?>
			<a class = "selectable" href="<?php echo $url; ?>"><?php echo $title ?></a>
		<?php endif ?>
	</li>
<?php endforeach; ?>
<?php
	if ($activePage === "/") {
	 	echo "<li onclick='cambioTema()' ><a class='selectable' href='#'>Cambiar tema</a></li>";
	} 
?>