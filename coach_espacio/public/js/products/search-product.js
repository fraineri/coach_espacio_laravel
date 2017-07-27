function search(){
	var input = document.getElementById('txtSearch');
	var products = document.getElementsByClassName('product-item');
	filter = input.value.toUpperCase();

	for(var i=0; i<products.length; i++){
		var product = products[i];
		var title = product.getElementsByClassName('product-title')[0].textContent;
		if(title.toUpperCase().indexOf(filter) > -1){
			product.style.display = "";	
		}else{
			product.style.display = "none";	
		}
	}

}
