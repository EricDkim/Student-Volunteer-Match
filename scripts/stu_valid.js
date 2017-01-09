//check password input using submit event
function chkPasswords() {
	var first_name = document.getElementById("first_name");
	var last_name = document.getElementById("last_name");
	var gender = document.getElementById("gender-0");
	var level = document.getElementById("level");
	var major = document.getElementById("major");
	var email = document.getElementById("email");
	var phone = document.getElementById("phone");
	var username = document.getElementById("username");
	var pw = document.getElementById("pw");
	var vpw = document.getElementById("vpw");

	

	if(first_name.value == ""){
		document.getElementById("errors").innerHTML = "Please enter a first name.";
	}	

	if(last_name.value == ""){
		document.getElementById("errors2").innerHTML = "Please enter last name.";
	} 

	if(level.value == "") {
		document.getElementById("errors3").innerHTML = "Please enter a level"
	}

	if(major.value == "") {
		document.getElementById("errors4").innerHTML = "Please enter a major"
	}

	if(email.value == "") {
		document.getElementById("errors5").innerHTML = "Please enter an email"
	}

	if(phone.value == "") {
		document.getElementById("errors6").innerHTML = "Please enter a phone number"
	}

	if(username.value == "") {
		document.getElementById("errors7").innerHTML = "Please enter a username"
	}

	if(password.value == "") {
		document.getElementById("errors8").innerHTML = "Please enter a password"
	}

	if(gender.value == "") {
		document.getElementById("errors9").innerHTML = "Please enter a password"
	}

	if (last_name.value && first_name.value && major.value && email.value && 
		phone.value && username.value && password.value !== ""){
		window.location.href = "student_complete.html";
	}

	if(password.value != vpassword.value) {
		document.getElementById("errors10").innerHTML = "Two passwords do not match.";
		return false;
	} else {
		return true;
	}
}