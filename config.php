<?php
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/15/2016
 * Time: 10:03 PM
 */

ini_set("display_errors", true); // displays errors in test environment only // TODO remove when live
date_default_timezone_set("America/Chicago");
define("DB_DSN", "mysql:host=localhost; dbname=roadiodb");
define("DB_USERNAME", "schachenman");
define("DB_PASSWORD", "password");

//TODO define anymore constants here
require("classes/FM_Station.php");
require("classes/AM_Station.php");
