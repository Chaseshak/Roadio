<?php
include "include/header.php";
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/15/2016
 * Time: 10:37 PM
 */

//Store the searched location
$locationSearch = "";
if(isset($_GET['locationSearch'])){
    $locationSearch = $_GET['locationSearch'];
}
?>

<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }
</script>
   <!-- AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM -->
<div class="row">
    <div class="col-md-12">
        <div id="map-canvas">
            <script type="text/javascript" src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM"></script>
        </div>
    </div>
</div>

<?php

include "include/footer.php";
?>