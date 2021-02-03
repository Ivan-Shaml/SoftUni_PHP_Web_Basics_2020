<?php

namespace Vehicles;

class Car extends VehicleAbstract
{

    const FUEL_MODIFIER = 0.9;

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCap)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER, $tankCap);
    }
}