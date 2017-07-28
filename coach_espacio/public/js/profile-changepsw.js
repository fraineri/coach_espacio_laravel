
document.getElementById("button-psw").addEventListener('click',function(){
	if(document.querySelector(".div-change-psw").style.display == 'none')
		document.querySelector(".div-change-psw").style.display="flex";
	else
		document.querySelector(".div-change-psw").style.display='none';
});


/*
if(document.querySelector('#actPsw').innerHTML
	|| document.querySelector('#reNewPsw').innerHTML){
	
	document.querySelector(".div-change-psw").style.display="flex";
}else{
	document.querySelector(".div-change-psw").style.display="none";
}


*/
