<?php
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/17/2016
 * Time: 12:45 AM
 */
$location = isset($_GET['locationSearch']) ? $_GET['locationSearch'] : "";

if($location == ""){
    homepage();
}
else{
    locationSearch($location);
}

// Simply display the homepage
function homepage(){
    $_POST['title'] = "Roadio";
    require ("templates/home.php");
}

function locationSearch($location){
    $_POST['title'] = "Stations Near $location";
    $_POST['locationSearch'] = $location;
    require ("templates/locationSearch.php");
}

?>