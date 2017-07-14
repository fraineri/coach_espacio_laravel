var menuanimate = function(){
	var menu = document.querySelector(".hamburguer-menu");
	if (menu.style.display =="none") {
		//Muestro
		
		menu.style.display = "flex";
		menu.style.animation ="fadein .3s";
	}else{
		//escondo
		menu.style.animation ="fadeout .3s";
		menu.style.display = "none";
	}
}
var but = document.querySelector(".ham-resp");
but.addEventListener('click',menuanimate);