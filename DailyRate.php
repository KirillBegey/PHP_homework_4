<?php
//Суточный Тариф

class DailyRate extends CommonRate
{
    protected $priceKilometer = 1;
    protected $pricePerDay = 1000;

    use DriverTrait;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        $ageCheck = $this->ageСheck($age);
        if ($age < 18 || $age > 65) {
            echo "Ваш возвраст не подходит!";
        } else {
            if (empty($services)) {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck;
            } elseif ($services == 'gps') {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck + $this->Gps($minute, $this->priceGps);
            } elseif ($services == 'driver') {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck + $this->driver();
            } elseif ($services == 'gps, driver') {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck + $this->Gps($minute, $this->priceGps) + $this->driver();
            }
        }
    }

    public function basicCalculation($kilometer, $minute)
    {
        $hour = $minute / 60;
        if ($hour <= 24) {
            return $price = $this->pricePerDay + $kilometer * $this->priceKilometer;
        } elseif ($hour > 24) {
            $day = round($hour) / 24;
            return $price = ceil($day) * $this->pricePerDay + $kilometer * $this->priceKilometer;
        }
    }
}