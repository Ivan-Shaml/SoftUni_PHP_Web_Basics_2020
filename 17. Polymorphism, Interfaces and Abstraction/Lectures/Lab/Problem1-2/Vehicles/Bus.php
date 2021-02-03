<?php

namespace Vehicles;

class Bus extends VehicleAbstract
{
    const FUEL_MODIFIER = 1.4;

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCap)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER, $tankCap);
    }
}
