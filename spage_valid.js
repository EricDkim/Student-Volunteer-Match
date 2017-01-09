//check password input using submit event
function chkPasswords() {
	var flight_num = document.getElementById("flight_num");
	var airline = document.getElementById("airline");
	var pickdate = document.getElementById("pickdate");
	var timepicker = document.getElementById("timepicker");
	var leave_flight_num = document.getElementById("leave_flight_num");
	var leave_flight_airline = document.getElementById("leave_flight_airline");

	var address2 = document.getElementById("address2");	
	var city2 = document.getElementById("city2");
	var state2 = document.getElementById("state2");
	var zip2 = document.getElementById("zip2");
	var phone2 = document.getElementById("phone2");

	if(flight_num.value == ""){
		document.getElementById("errors").innerHTML = "Please enter a flight num.";
	}	

	if(airline.value == ""){
		document.getElementById("errors2").innerHTML = "Please enter an airline.";
	} 

	if(pickdate.value == "") {
		document.getElementById("errors3").innerHTML = "Please enter a date"
	}

	if(timepicker.value == "") {
		document.getElementById("errors4").innerHTML = "Please enter a time"
	}

	if(leave_flight_num.value == "") {
		document.getElementById("errors5").innerHTML = "Please enter a home flight number"
	}

	if(leave_flight_airline.value == "") {
		document.getElementById("errors6").innerHTML = "Please enter a home airline"
	}


	if (flight_num.value && airline.value && pickdate.value && timepicker.value && 
		leave_flight_airline.value && leave_flight_num.value !== ""){
		window.alert("Thank You for your Flight Info!");
	}

	if(address2.value == ""){
		document.getElementById("herrors").innerHTML = "Please enter a address.";
	}	

	if(city2.value == ""){
		document.getElementById("herrors2").innerHTML = "Please enter a city.";
	}	

	if(state2.value == ""){
		document.getElementById("herrors3").innerHTML = "Please enter a state.";
	}	

	if(zip2.value == ""){
		document.getElementById("herrors4").innerHTML = "Please enter a zip.";
	}	

	if(phone2.value == ""){
		document.getElementById("herrors5").innerHTML = "Please enter a phone.";
	}	

	if (address2.value && city2.value && state2.value && zip2.value && 
		phone2.value !== ""){
		window.alert("Thank You for your Housing Info!");
	}










}