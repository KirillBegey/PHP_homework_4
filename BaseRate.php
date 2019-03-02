<?php
//Тариф Базовый

class BaseRate extends CommonRate
{
    protected $priceKilometer = 10;
    protected $priceMinute = 3;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        $ageCheck = $this->ageСheck($age);
        if ($age < 18 || $age > 65) {
            echo "Ваш возвраст не подходит!";
        } else {
            if (empty($services)) {
                echo $this->basicCalculation($kilometer, $minute, $ageCheck) * $ageCheck;
            } elseif ($services == 'gps') {
                echo $this->basicCalculation($kilometer, $minute, $ageCheck) * $ageCheck + $this->Gps($minute, $this->priceGps);
            }
        }
    }

    public function basicCalculation($kilometer, $minute)
    {
        return $price = ($kilometer * $this->priceKilometer)+($minute * $this->priceMinute);
    }
}