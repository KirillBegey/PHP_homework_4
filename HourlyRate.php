<?php
//Почасовой Тариф

class HourlyRate extends CommonRate
{
    protected $pricePerHour = 200;

    use DriverTrait;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        $ageCheck = $this->ageСheck($age);
        if ($age < 18 || $age > 65) {
            echo "Ваш возвраст не подходит!";
        } else {
            if (empty($services)) {
                echo $this->basicCalculation($minute, $ageCheck) * $ageCheck;
            } elseif ($services == 'gps') {
                echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->Gps($minute, $this->priceGps);
            } elseif ($services == 'driver') {
                echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->driver();
            } elseif ($services == 'gps, driver') {
                echo $this->basicCalculation($minute, $ageCheck) * $ageCheck + $this->Gps($minute, $this->priceGps) + $this->driver();
            }
        }
    }

    public function basicCalculation($minute, $ageCheck)
    {
        return $price = ceil($minute/60) * $this->pricePerHour;
    }
}