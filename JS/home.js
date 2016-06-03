window.onload = function() {
    initialize();
};

var map;
function initialize() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 40, lng: -95.7},
        zoom: 4
    });
}
