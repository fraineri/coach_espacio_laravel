var cantP = document.querySelector("#cantidad");
	if (cantP  !== null) {
		var cant = cantP.value;

		var	mas = document.querySelector("#mas");
		mas.addEventListener('click',function(){
			cantP.value = ++cant;
		})

		var	menos = document.querySelector("#menos");
		menos.addEventListener('click',function(){
			if (cant != 1) {
				cantP.value = --cant;		
			}
	})
}