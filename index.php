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
    require("home.php");
}

function locationSearch($location){
    $_POST['title'] = "Stations Near $location";
    $data_arr = geocode($location); // geocode the address given
    $_POST['data_arr'] = $data_arr;
    // Query SQL database for locations within given range
    // One degree of latitude approx. equal to 69 miles
    // eqn: deg = (enteredMiles/69)
    // get the connection

    //$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
   // $sql = "SELECT * FROM fmstations WHERE latitude BETWEEN  42 AND 44 AND longitude BETWEEN -88 AND -90";
    require("locationSearch.php");
}

/**
 * @param $location the given address to geocode
 * @return array|bool, returns array of data if successful, else returns false.
 */
function geocode($location){
    //https://maps.googleapis.com/maps/api/geocode/json?address=

    //url encode the address
    $location = urlencode($location);

    // google maps geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$location}&key=AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM";

    // store json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK' if able to geocode
    if($resp['status'] == 'OK'){
        // get the important data
        $latitude = $resp['results'][0]['geometry']['location']['lat'];
        $longitude = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];

        // verify if data is complete
        if($latitude && $longitude && $formatted_address){

            // put data into array
            $data_arr = array();

            array_push(
                $data_arr,
                $latitude,
                $longitude,
                $formatted_address
            );
            return $data_arr;
        }
        else{
            return false;
        }

    }
    else{
        return false;
    }


}

?>