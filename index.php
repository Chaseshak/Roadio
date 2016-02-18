<?php
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/17/2016
 * Time: 12:45 AM
 */
$location = isset($_GET['locationSearch']) ? $_GET['locationSearch'] : "";
require ("config.php");

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
    $latitude = $data_arr[0];
    // calc upper and lower bounds of latitude search
    $diffLat = $_GET['rangeSelect'] / 69;
    $upperLat = $latitude + $diffLat;
    $lowerLat = $latitude - $diffLat;
    $longitude = $data_arr[1];
    $divisor = 1;
    if($latitude < 15) $divisor = 68;
    elseif($latitude < 25) $divisor = 65;
    elseif($latitude < 35) $divisor = 60;
    elseif($latitude < 45) $divisor = 53;
    elseif($latitude < 55) $divisor = 44;
    else $divisor =  37;
    $diffLong = $_GET['rangeSelect'] / $divisor;
    $upperLong = $longitude + $diffLong;
    $lowerLong = $longitude - $diffLong;

    $conn = new mysqli("localhost", DB_USERNAME, DB_PASSWORD, "radiodb");
    if($conn->connect_error){
        $_POST['results'] = "Connection error";
    }
    $sql = "SELECT callsign, frequency, city, state, latitude, longitude, primaryGenre FROM fmstations WHERE (latitude BETWEEN $lowerLat AND $upperLat) AND (longitude BETWEEN $lowerLong AND $upperLong)";

    $result = $conn->query($sql);
    $results = array();
    while($row = $result->fetch_assoc()){
        $distance = distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M");
        if($distance < $_GET['rangeSelect']){
            $row['distance'] = $distance;
            $results[] = $row; // store into results array
       }

    }

    $_POST['results'] = $results;


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

function distanceBetween($searchedLat, $searchedLong, $resultLat, $resultLong, $unit){
    $theta = $searchedLong - $resultLong;
    $dist = sin(deg2rad($searchedLat)) * sin(deg2rad($resultLat)) +  cos(deg2rad($searchedLat)) * cos(deg2rad($resultLat)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

?>