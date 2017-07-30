
document.getElementById("button-psw").addEventListener('click',function(){
	if(document.querySelector(".div-change-psw").style.display == 'none')
		document.querySelector(".div-change-psw").style.display="flex";
	else
		document.querySelector(".div-change-psw").style.display='none';
});

var passError = document.getElementById('error-Password');
var newPassError = document.getElementById('error-NewPassword');
if( (passError 		!= null && passError.innerText != '') 
	|| 
	(newPassError 	!= null && newPassError.innerText != '' )
  ){
	document.querySelector(".div-change-psw").style.display="flex";
}

/*
if(document.querySelector('#actPsw').innerHTML
	|| document.querySelector('#reNewPsw').innerHTML){
	
	document.querySelector(".div-change-psw").style.display="flex";
}else{
	document.querySelector(".div-change-psw").style.display="none";
}


*/
