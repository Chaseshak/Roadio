<?php

$location = isset($_GET['locationSearch']) ? $_GET['locationSearch'] : "";
require ("config.php"); // require config file for DB settings

if($location == ""){
    homepage();
}
else{
    locationSearch($location);
}

// Simply display the homepage
function homepage(){
    $_POST['title'] = "Roadio"; // Post the homepages title
    require("home.php");
}

function locationSearch($location){
    $_POST['title'] = "Stations Near $location";

    $data_arr = geocode($location); // geocode the address given
    // Query SQL database for locations within given range
    // One degree of latitude approx. equal to 69 miles
    // eqn: deg = (enteredMiles/69)
    // get the connection
    $latitude = $data_arr[0];
    // calc upper and lower bounds of latitude search
    $diffLat = 100 / 69;
    $upperLat = $latitude + $diffLat;
    $lowerLat = $latitude - $diffLat;
    $longitude = $data_arr[1];
    $divisor = 37;
    $diffLong = 100 / $divisor;
    $upperLong = $longitude + $diffLong;
    $lowerLong = $longitude - $diffLong;

    $conn = new mysqli("localhost", DB_USERNAME, DB_PASSWORD, "radiodb");
    if($conn->connect_error){
        $_POST['results'] = "Connection error";
    }
    $sql = "SELECT *
    FROM fmstations WHERE
    (latitude BETWEEN $lowerLat AND $upperLat) AND
    (longitude BETWEEN $lowerLong AND $upperLong)";
    $result = $conn->query($sql);
    //SELECT * FROM fmstations WHERE (latitude BETWEEN 43 AND 44) AND (longitude BETWEEN -90 AND -89) UNION SELECT * FROM amstations WHERE (latitude BETWEEN 43 AND 44) AND (longitude BETWEEN -90 AND -89)
    //TODO above is for getting AM AND FM stations.
    //TODO above query moves the genre of the AM stations over into another column to match column space.
    // AM Stations start their freq at 500 hz, check if is am based off of that.
    // Store all possible station class ranges
    $class_A = 17.6;
    $class_C3 = 24.3;
    $class_B1 = 27.8;
    $class_C2 = 32.4;
    $class_B = 40.5;
    $class_C1 = 44.9;
    $class_C0 = 51.8;
    $class_C = 57.0;

    // array to store the results after range check
    $rangedResults[] = array();

    while($row = $result->fetch_assoc()){
        $class = $row['antClass'];
        $row['enteredLat'] = $latitude;
        $row['enteredLng'] = $longitude;
        $row['enteredLoc'] = $location;
        /**
         * Switch statement on radio station class to determine if entered location is in range of
         * radio station's predicted broadcasting range.
         */
        switch ($class) {
            case 'A':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_A)
                    $rangedResults[] = $row;
                break;
            case 'C3':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_C3)
                    $rangedResults[] = $row;
                break;
            case 'B1':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_B1)
                    $rangedResults[] = $row;
                break;
            case 'C2':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_C2)
                    $rangedResults[] = $row;
                break;
            case 'B':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_B)
                    $rangedResults[] = $row;
                break;
            case 'C1':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_C1)
                    $rangedResults[] = $row;
                break;
            case 'C0':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_C0)
                    $rangedResults[] = $row;
                break;
            case 'C':
                if(distanceBetween($latitude, $longitude, $row['latitude'], $row['longitude'], "M") < $class_C)
                    $rangedResults[] = $row;
                break;
            default:
                break;
        }
    }
    $_POST['results'] = $rangedResults;

    // Require the php page to display the results
    require("locationSearch.php");

}

/**
 * Geocodes the entered location, or turns a written address into lat, long, coordinates.
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

/**
 * Calculates the distance between two lat and long points given a unit (M, K, M) to output the result.
 */
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