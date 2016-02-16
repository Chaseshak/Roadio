<?php
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/15/2016
 * Time: 10:37 PM
 */
$locationSearch = "";
if(isset($_GET['locationSearch'])){
    $locationSearch = $_GET['locationSearch'];
}

echo "You entered: $locationSearch";
