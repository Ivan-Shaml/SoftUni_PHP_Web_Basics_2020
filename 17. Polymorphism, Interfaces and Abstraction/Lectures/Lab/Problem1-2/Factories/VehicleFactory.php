<?php


namespace Factories;


use Vehicles\VehicleInterface;

class VehicleFactory implements VehicleFactoryInterface
{
    /**
     * @param string $type
     * @param float $qty
     * @param float $consumption
     * @param float $tankCap
     * @return VehicleInterface
     * @throws \Exception
     */
    public function create(string $type, float $qty, float $consumption, float $tankCap): VehicleInterface
    {
        $className = 'Vehicles\\' . $type;
        if (!class_exists($className)){
            throw new \Exception("Invalid vehicle type");
        }
        return $vehicle = new $className($qty, $consumption, $tankCap);
    }
}