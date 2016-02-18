<?php

/**
 * Class to handle FM Stations
 */
class fm_station
{

    // Properties (matches SQL DB fmstations)
    public $callsign = null;
    public $frequency = null;
    public $antClass = null;
    public $city = null;
    public $state = null;
    public $facilityId = null;
    public $latitude = null;
    public $longitude = null;
    public $licensee = null;
    public $appId = null;
    public $genre = null;

    /**
     * fm_station constructor
     * @param an array of data for an FM_Station
     */
    public function __construct($data){
        $this->callsign = $data[0];
        $this->frequency = $data[1];
        $this->antClass = $data[2];
        $this->city = $data[3];
        $this->state = $data[4];
        $this->facilityId = $data[5];
        $this->latitude = $data[6];
        $this->longitude = $data[7];
        $this->licensee = $data[8];
    }

}
?>
