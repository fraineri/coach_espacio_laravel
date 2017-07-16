@foreach ($pagesNav as $url => $title)
	<li <?php if($url === $activePage){echo 'class ="page-active"';}?>  >
	
		@if($url == "/#knowus")
			<a class = "selectable" id ="know" href="{{ $url }}">{{ $title }}</a>
		@else
			<a class = "selectable" href="{{ $url }}">{{ $title }}</a>
		@endif
	</li>
@endforeach
@if($activePage === "/")
 	echo "<li onclick='cambioTema()' ><a class='selectable' href='#'>Cambiar tema</a></li>";
@endif 
