forms =  Array.from(document.getElementById("items-cont").children).forEach(function(i){
	i.querySelector(".item-delete").addEventListener("click",function(e){
		id = i.querySelector("[name=id]").value;
		var req = new XMLHttpRequest();
		req.onreadystatechange = function () {
			if (this.readyState === 4) {
	    		if (this.status === 200) {
	    			if(this.responseText == "ok"){
	    				location.reload();
	    			}
	    		}
	    	}
	    }
	    req.open('POST', '/shop/delete');
	    var data = new FormData();
	    data.append("id",id);
	    data.append("_token", "{{ csrf_token() }}");
		req.send(data);
	})
});
