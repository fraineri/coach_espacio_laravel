<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<title>C.E. | Administrador</title>
</head>
<body style="background-image: url(/images/backgrounds/contact-banner-4.jpg);">
	<div class="container" style="background-color: white; padding: 2%; ">

		<form class="form-horizontal" method="POST" action="/admin/login" enctype="multipart/form-data">
				{{csrf_field()}}
			<h1>Hola Liliana!</h1>
				<div class="form-group row">
					<label for="clave-text-input" class="col-2 col-form-label">Ingresa tu clave</label>
					<div class="col-10">
						<input type="password" name="clave" class="form-control" id="description-text-input" required>
						@if ($errors->has('clave'))
							<span class="lbl-error">
								<strong> {{ $errors->first('clave') }} </strong>
							</span>
						@endif
						<br>
					</div>
  				</div>

  				<button class="btn btn-primary" type="submit">Ingresar</button>

		</form>
	</div>	
</body>
</html>