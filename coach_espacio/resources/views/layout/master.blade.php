<!DOCTYPE html>
<html>
<head>
	@yield('head')
</head>
<body>
	@include('layout/partials/header')
	@yield('content')
	@include('layout/partials/footer')
</body>
</html>