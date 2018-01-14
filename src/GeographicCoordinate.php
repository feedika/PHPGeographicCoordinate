<?php
namespace feedika\PHPGeographicCoordinate;

class GeographicCoordinate
{

    public function distance(Coordinate $startCoordinate,Coordinate $endCoordinate, $unit) {

        $theta = $startCoordinate->getLongitude() - $endCoordinate->getLongitude();
        $dist  = sin(deg2rad($startCoordinate->getLatitude())) * sin(deg2rad($endCoordinate->getLatitude())) +  cos(deg2rad($startCoordinate->getLatitude())) * cos(deg2rad($endCoordinate->getLatitude())) * cos(deg2rad($theta));
        $dist  = acos($dist);
        $dist  = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit  = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public function checkRadius(Coordinate $mainCoordinate,Coordinate $inputCoordinate){

    }
}