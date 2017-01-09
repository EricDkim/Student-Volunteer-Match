function chkPasswords2(){

var address = document.getElementById("address");	
	var city = document.getElementById("city");
	var state = document.getElementById("state");
	var zip = document.getElementById("zip");
	var phone = document.getElementById("phone");
	var comment = document.getElementById("comment");

if(address.value == ""){
		document.getElementById("terrors").innerHTML = "Please enter an address.";
	}	

	if(city.value == ""){
		document.getElementById("terrors2").innerHTML = "Please enter a city.";
	}	

	if(state.value == ""){
		document.getElementById("terrors3").innerHTML = "Please enter a state.";
	}	

	if(zip.value == ""){
		document.getElementById("terrors4").innerHTML = "Please enter a zip.";
	}	

	if(phone.value == ""){
		document.getElementById("terrors5").innerHTML = "Please enter a phone.";
	}	
	if(comment.value == ""){
		document.getElementById("terrors5").innerHTML = "Please enter a comment.";
	}	


	if (address.value && city.value && state.value && zip.value && 
		phone.value && comment.value !== ""){
		window.alert("Thank You for your Housing Info!");
	}

}