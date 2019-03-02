<?php

trait DriverTrait
{
    protected $additionalDriver = 100;

    public function driver()
    {
        return $this->additionalDriver;
    }
}