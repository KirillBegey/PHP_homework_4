<?php
abstract class CommonRate implements InterfaceRatePrice
{
    use GpsTrait;

    public function ageСheck($age)
    {
        if ($age >= 18 && $age < 21) {
            return 1.1;
        } else {
            return 1;
        }
    }



}