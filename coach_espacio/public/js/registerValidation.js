
window.onload = function(){
	var formRegister 	= document.getElementById('form-register');
	var txtName 		= formRegister.elements.namedItem('name');
	var txtSurname 		= formRegister.elements.namedItem('surname');
	var txtEmail 		= formRegister.elements.namedItem('email');
	var txtUser 		= formRegister.elements.namedItem('username');
	var txtPass 		= formRegister.elements.namedItem('password');
	var txtRePass 		= formRegister.elements.namedItem('password_confirmation');
	var button 			= formRegister.elements.namedItem('submit');

	var input 			= formRegister.querySelector(".form-register-txtUsuario");

	button.className = "form-button-register-blocked";
	button.innerHTML = "Faltan Datos";

	//Si el input tiene error.
	var errores = [];
	for (var i = 0; i < 6; i++) {
		errores[i] = true;
	}

	//No marca error hasta el primer blur.
	var flags = [];
	for (var i = 0; i < 6; i++) {
		flags[i] = true;
		if(formRegister.elements[i+1].value != ""){
			flags[i] = false;
			switch(i){
				case 1:
					validateTxtName();
					break;
				case 2:
					validateTxtSurname();
					break;
				case 3:
					validateTxtEmail();
					break;
				case 4:
					validateTxtUsername();
					break;
			}
		}
	}



	

	function checkFlags(){
		for (var i = 0; i < 6; i++) {
			if(flags[i]){
				return false;
			}
		}
		return true;
	}

	function checkErrores(){
		for (var i = 0; i < 6; i++) {
			if(errores[i]){
				button.className = "form-button-register-blocked";
				button.innerHTML = "Faltan Datos";
				return true;
			}
		}
		button.className = "form-button-register standard-button button-white";
		button.innerHTML = "REGISTRAR";
		return false;
	}

//Validador Nombre
	txtName.addEventListener('blur',function(){
		validateTxtName();
	});
	function validateTxtName(){
		flags[0] = false;
		errores[0] = true;
		var RegExpression = /^[a-zA-Z\s]*$/;
		var lblError = txtName.nextElementSibling;
		if(txtName.value == ""){
			lblError.innerHTML = "Nombre obligatorio";
		}else if(!RegExpression.test(txtName.value)){
			lblError.innerHTML = "Caracteres invalidos";
		}else if(txtName.value.length > 30){
			lblError.innerHTML = "Nombre mayor a 30 caracteres";
		}else{
			lblError.innerHTML = "";
			errores[0] = false;
		}
		hayError = checkErrores();
	}

//Validador Apellido
	txtSurname.addEventListener('blur',function(){
		validateTxtSurname();
	});
	function validateTxtSurname(){
		flags[1] = false;
		errores[1] = true;
		var RegExpression = /^[a-zA-Z\s]*$/;
		var lblError = txtSurname.nextElementSibling;
		if(txtSurname.value == ""){
			lblError.innerHTML = "Apellido obligatorio";
		}else if(!RegExpression.test(txtSurname.value)){
			lblError.innerHTML = "Caracteres invalidos";
		}else{
			lblError.innerHTML = "";
			errores[1] = false;
		}
		hayError = checkErrores();
	}

//Validador Email
	txtEmail.addEventListener('blur',function(){
		validateTxtEmail();
	});
	function validateTxtEmail(){
		flags[2] = false;
		errores[2] = true;
		var RegExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var lblError = txtEmail.nextElementSibling;
		if(txtEmail.value == ""){
			lblError.innerHTML = "Email obligatorio";
		}else if(txtEmail.value.length > 70){
			lblError.innerHTML = "Email mayor a 70 caracteres";
		}else if(!RegExpression.test(txtEmail.value)){
			lblError.innerHTML = "Email invalido";
		}else{
			lblError.innerHTML = "";
			errores[2] = false;
		}
		hayError = checkErrores();
	}

//Validador Usuario
	txtUser.addEventListener('blur',function(){
		validateTxtUsername();
	});
	function validateTxtUsername(){
		flags[3] = false;
		errores[3] = true;
		var lblError = txtUser.nextElementSibling;
		if(txtUser.value == ""){
			lblError.innerHTML = "Usuario obligatorio";
		}else if(txtUser.value.length > 20){
			lblError.innerHTML = "Usuario mayor a 20 caracteres";
		}else if(txtUser.value.length < 6){
			lblError.innerHTML = "Usuario menor a 6 caracteres";
		}else{
			lblError.innerHTML = "";
			errores[3] = false;
		}
		hayError = checkErrores();
	}

//Validador Contrasenia
	txtPass.addEventListener('blur',function(){
		validateTxtPass();
	});
	function validateTxtPass(){
		flags[4] = false;
		errores[4] = true;
		var lblError = txtPass.nextElementSibling;
		if(txtPass.value == ""){
			lblError.innerHTML = "Contraseña obligatoria";
		}else if(txtPass.value.length > 30){
			lblError.innerHTML = "Contraseña mayor a 20 caracteres";
		}else if(txtPass.value.length < 8){
			lblError.innerHTML = "Contraseña menor a 8 caracteres";
		}else if(txtPass.value != txtRePass.value){
			lblError.innerHTML = "Contraseñas distintas";
		}else{
			lblError.innerHTML = "";
			errores[4] = false;
			if(txtPass.value == txtRePass.value)
				errores[5] = false;
		}
		hayError = checkErrores();
	}

//Validador ReContrasenia
	txtRePass.addEventListener('blur',function(){
		validateTxtRePass();
	});
	function validateTxtRePass(){
		flags[5] = false;
		errores[5] = true;
		var lblError = txtPass.nextElementSibling;
		if(txtRePass.value != txtPass.value || txtRePass.value == ""){
			lblError.innerHTML = "Contraseñas distintas";
		}else{
			lblError.innerHTML = "";
			errores[5] = false;
			if(txtRePass.value == txtPass.value)
				errores[4] = false;
		}
		hayError = checkErrores();
	}

	button.addEventListener('click',function(e){
		hayError = checkErrores();
		if(!hayError && checkFlags()){
			console.log("No hay errores");
		}else{
			e.preventDefault();
			console.log("Hay errores");
		}
		console.log("----------------------");
		console.log(flags);
		console.log("----------------------");
		console.log(errores);

	});


//Validador usuario existente
	input.addEventListener('change', function(e){
		document.getElementById("user-lbl-error").innerHTML = " ";
		document.getElementById("user-lbl-ok").innerHTML = " ";
		if (input.value && input.value.length>6 && input.value.length<20) {
			var users;

			var req = new XMLHttpRequest();
			req.open("GET", "js/findUser.php?username="+input.value);
			req.send();
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					$response = JSON.parse(req.responseText);
					if ($response['exists']) {
						document.getElementById("user-lbl-error").innerHTML = "El usuario ingresado ya se encuentra en uso";
					} else{
						document.getElementById("user-lbl-ok").innerHTML = "El usuario esta disponible!";
					}
				}
			};	
		}
	})

}

