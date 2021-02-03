<?php
namespace Vehicles;

abstract class VehicleAbstract implements VehicleInterface
{
    private $fuelQuantity;
    private $fuelConsumption;
    private $modifier;
    private $tankCap;

    /**
     * VehicleAbstract constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     * @param float $modifier
     * @param float $tankCap
     */
    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier, float $tankCap)
    {
        $this->fuelQuantity = $fuelQuantity;
        $this->modifier = $modifier;
        $this->fuelConsumption = $fuelConsumption + $this->modifier;
        $this->tankCap = $tankCap;
    }

    public function drive(float $distance): string
    {
        if($this->fuelQuantity <=0 ){
            return "Fuel must be a positive number\n";
        }

        if ($this->fuelQuantity >= $this->fuelConsumption * $this->modifier * $distance){
            $this->fuelQuantity -= $this->fuelConsumption * $this->modifier * $distance;
            return basename(get_class($this)). " travelled " . $distance . " km" . PHP_EOL;
        }
        return  basename(get_class($this)). " needs refueling" . PHP_EOL;
    }

    public function driveempty(float $distance): string
    {
        if($this->fuelQuantity <=0 ){
            return "Fuel must be a positive number\n";
        }

        if ($this->fuelQuantity >= $this->fuelConsumption * $distance){
            $this->fuelQuantity -= $this->fuelConsumption * $distance;
            return basename(get_class($this)). " travelled " . $distance . " km" . PHP_EOL;
        }
        return  basename(get_class($this)). " needs refueling" . PHP_EOL;
    }

    public function refuel(float $litres): void
    {
        if ($this->fuelQuantity + $litres <= $this->tankCap) {
            $this->fuelQuantity += $litres;
        }
        else {
            echo "Cannot fit fuel in tank\n";
        }
    }

    public function __toString(): string
    {
        return basename(get_class($this)) . ": " . number_format($this->fuelQuantity, 2);
    }
}