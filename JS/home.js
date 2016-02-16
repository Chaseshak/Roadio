function validateLocationSearch(){
	var x = document.forms["locationForm"]["locationSearch"].value;
	if(x == null || x == ""){
		alert("You must enter a location");
		return  false;
	}
}