<?php
//Почасовой Тариф

class HourlyRate extends CommonRate
{
    protected $pricePerHour = 200;

    use DriverTrait;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        $ageCheck = $this->ageСheck($age);
        if (empty($services)) {
            echo $this->basicCalculation($minute, $ageCheck) * $ageCheck;
        } elseif ($services == 'gps') {
            echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->Gps($minute);
        } elseif ($services == 'driver') {
            echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->driver();
        } elseif ($services == 'gps, driver') {
            echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->Gps($minute) + $this->driver();
        }
    }

    public function basicCalculation($minute, $ageCheck)
    {
        return $price = ceil($minute/60) * $this->pricePerHour;
    }
}