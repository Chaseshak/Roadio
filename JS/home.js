function processDirections(){
	var searchStart = document.getElementById("searchStart");
	var searchEnd = document.getElementById("searchEnd");
	var iframe = document.getElementById("iframe");
	var src = "https://www.google.com/maps/embed/v1/directions?key=AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM&origin=";
	src = src.concat(searchStart.value);
	src = src.concat("&destination=");
	src = src.concat(searchEnd.value);
	iframe.src = src;
}