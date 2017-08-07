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
 	<li onclick='cambioTema()' ><a class='selectable' href='#'>Cambiar tema</a></li>
@endif 

@if(Auth::check() AND Auth::user()->name =="monarinomimi")
	<li><a class = "selectable" href="/admin/sales">Administrar</a></li>
@endif