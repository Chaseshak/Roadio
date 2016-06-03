// On ready, initialize. Also contains all jquery element funtions
$(document).ready(function(){
    initialize(); // inits the map on the homepage
    
    // On clicking the search icon, focus user to the location search box
    $('#locationSearchIcon').click(function(){
        $('#locationSearch').focus();
    });

    $('#locationSearch').tooltip({
        placement: "right",
        trigger: "focus"
    });
});


// Helper functions
var map;
function initialize() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 40, lng: -95.7},
        zoom: 4
    });
}

