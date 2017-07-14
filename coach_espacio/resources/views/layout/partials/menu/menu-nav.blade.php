<?php foreach ($pagesNav as $url => $title): ?>
	<li <?php if($url === $activePage){echo 'class ="page-active"';}?>  >
		<a class = "selectable" href="<?php echo $url; ?>"><?php echo $title ?></a>
	</li>
<?php endforeach; ?>
<?php
	if ($activePage === "/") {
	 	echo "<li onclick='cambioTema()' ><a class='selectable' href='#'>Cambiar tema</a></li>";
	} 
?>