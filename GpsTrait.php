<?php

trait GpsTrait
{
    protected $priceGps = 15;

    public function Gps($time)
    {
        $gpsTime = $time/60;
        $gpsTimeRounding = ceil($gpsTime);
        return $gps = $gpsTimeRounding * $this->priceGps;
    }
}