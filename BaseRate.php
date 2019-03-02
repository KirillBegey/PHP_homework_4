<?php
//Тариф Базовый

class BaseRate extends CommonRate
{
    protected $priceKilometer = 10;
    protected $priceMinute = 3;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        $ageCheck = $this->ageСheck($age);
        if (empty($services)) {
            echo $this->basicCalculation($kilometer, $minute, $ageCheck) * $ageCheck;
        } elseif ($services == 'gps') {
            echo $this->basicCalculation($kilometer, $minute, $ageCheck) * $ageCheck + $this->Gps($minute);
        }
    }

    public function basicCalculation($kilometer, $minute)
    {
        return $price = ($kilometer * $this->priceKilometer)+($minute * $this->priceMinute);
    }
}