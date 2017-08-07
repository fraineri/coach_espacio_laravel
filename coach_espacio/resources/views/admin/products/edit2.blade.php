<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<title>C.E. | Editar</title>
</head>
<body style="background-image: url(/images/backgrounds/bg-2b.png);">
	<div class="container" style="background-color: white; padding:0 ;margin-top: 20px; ">
	<form class="form-horizontal" method="POST" action="/admin/products/{{$prod->id}}/update" enctype="multipart/form-data">
				{{csrf_field()}}
		 <fieldset style="padding: 0" class="container">	
		 	<legend style="padding: 2%; text-align: center; background-color: lightblue;">Editar {{$prod->name}}</legend>
				<div class="form-group row">
  					<label for="name-text-input" class="col-2 col-form-label">Nombre</label>
  					<div class="col-10">
						<input type="text" name="name" class="form-control" id="name-text-input" value="{{$prod->name}}" required>
						@if ($errors->has('name'))
							<span class="lbl-error">
							<strong> {{ $errors->first('name') }} </strong>
							</span>
						@endif
					</div>
  				</div>

				<div class="form-group row">
  					<label for="description-text-input" class="col-2 col-form-label">Descripción</label>
  					<div class="col-10">
						<input type="text" name="description" class="form-control" value="{{$prod->description}}" id="description-text-input" required>
						@if ($errors->has('description'))
							<span class="lbl-error">
								<strong> {{ $errors->first('description') }} </strong>
							</span>
						@endif
					</div>
  				</div>

				<div class="form-group row">
  					<label for="price-text-input" class="col-2 col-form-label">Precio</label>
  					<div class="col-10">
						<input type="text" name="price" class="form-control" value="{{$prod->price}}" id="price-text-input" required>
						@if ($errors->has('price'))
					<span class="lbl-error">
						<strong> {{ $errors->first('price') }} </strong>
					</span>
				@endif
					</div>
  				</div>
				
				<div class="form-group row">
  					<label for="stock-number-input" class="col-2 col-form-label">Stock</label>
  					<div class="col-10">
						<input type="number" name="stock" class="form-control" value="{{$prod->stock}}" id="stock-number-input" required>
						@if ($errors->has('stock'))
							<span class="lbl-error">
								<strong> {{ $errors->first('stock') }} </strong>
							</span>
						@endif
					</div>
  				</div>
	
				<!--true o false para purchable-->
				<label>Producto listo para vender?  </label>
				<select class="custom-select" name="purchable" >
					<option value=1>Si, Vender</option>
					<option value=0>NO vender</option>
				</select>
				<br>
				<br>
				<!--categorias de la tabla categories-->
				<label>Categoria del producto: </label>
				<select class="custom-select" name="category_id" >
					@foreach($categories as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>
				<br>
				<br>
				<!--tipo de producto: articulo o curso-->
				<label>Tipo de producto:  </label>
				<select class="custom-select" name="type">
					<option value="products">Articulo</option>
					<option value="course">Video Curso</option>
				</select>
				<br>

				<!--imagen-->
				<label class="admin-product-image">Foto de Producto</label>
				<input type="file" name="picture" class="form-control" value="{{$prod->picture}}">
				<div class="image-cont">
					<img class="product-image" src="{{asset('/storage/products/'.$prod->picture)}}" width="100px" height="100px">
				</div>
				<br>
				
				<div class="form-inline">
				<!--boton para salir sin editar el producto-->
					<a class="btn btn-primary" href="/admin/products/" role="button">Volver a productos</a>
				<!--boton para grabar cambios-->
					<button type="submit" class="btn btn-success">Grabar cambios</button>
				</div>
			

				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		</fieldset>
	</form>
	</div>
	
</body>
</html>

