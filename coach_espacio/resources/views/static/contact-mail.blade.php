<style type="text/css">
	body{
	  display: block;
	  width: 80%;
	  margin: auto;
	  border: 3px solid black;
	}

	h1{
		text-align:center;
	}
</style>

@if(isset($data))
<h1>Contacto</h1>
 <strong>Name: </strong><span>{{ $data->name }} {{ $data->surname }}</span> 
<br>
<strong>Email: </strong><span>{{ $data->email }}</span>
<hr>
<strong>Message:</strong>
 <p>{{ $data->message }}<p/>

@endif
