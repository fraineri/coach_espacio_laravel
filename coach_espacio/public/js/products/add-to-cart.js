document.forms[0].addEventListener("submit",function(e){
	e.preventDefault();
	document.querySelector(".success").style.display="none";
	document.querySelector(".error").style.display="none";
	var req = new XMLHttpRequest();
	req.onreadystatechange = function () {
		if (this.readyState === 4) {
    		if (this.status === 200) {
    			success = JSON.parse(this.responseText);
    			success = success['success'];
    			if(success){
    				document.querySelector(".success").style.display="block";
    				document.querySelector(".success").style.opacity = "1"; 
					setTimeout(function() { 
					    document.querySelector(".success").style.opacity = "0"; 
					}, 
					2000);
					
    			}else{
    				document.querySelector(".error").style.display="block";
    				document.querySelector(".error").style.opacity = "1"; 
    				setTimeout(function() { 
					    document.querySelector(".error").style.opacity = "0"; 
					}, 
					2000);
    			}
    		}
    	}
    }
    req.open('POST', '/producto/{id}');
    var data = new FormData(document.forms[0]);
	req.send(data);
});