<?php

trait GpsTrait
{
    public function Gps($time, $price)
    {
        $gpsTime = $time/60;
        $gpsTimeRounding = ceil($gpsTime);
        return $gps = $gpsTimeRounding * $price;
    }
}