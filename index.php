<?php
require "InterfaceRatePrice.php";
require "GpsTrait.php";
require "DriverTrait.php";
require "CommonRate.php";
require "BaseRate.php";
require "HourlyRate.php";
require "DailyRate.php";
require "StudentRate.php";

$rate = new BaseRate();
$rate->ratePrice(13, 7, 20, '');

