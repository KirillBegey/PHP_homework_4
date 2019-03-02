<?php
//Студенческий Тариф

class StudentRate extends CommonRate
{
    protected $priceKilometer = 4;
    protected $priceMinute = 1;

    public function ratePrice($kilometer, $minute, $age, $services = '')
    {
        if ($age < 18 || $age > 25) {
            echo "Ваш возвраст не подходит!";
        } else {
            $ageCheck = $this->ageСheck($age);
            if (empty($services)) {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck;
            } elseif ($services == 'gps') {
                echo $this->basicCalculation($kilometer, $minute) * $ageCheck + $this->Gps($minute, $this->priceGps);
            }
        }
    }

    public function basicCalculation($kilometer, $minute)
    {
        return $price = ($kilometer * $this->priceKilometer)+($minute * $this->priceMinute);
    }
}