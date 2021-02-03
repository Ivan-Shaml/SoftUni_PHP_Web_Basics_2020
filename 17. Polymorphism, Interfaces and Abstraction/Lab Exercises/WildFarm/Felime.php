<?php


abstract class Felime extends Mammal
{
    public function __construct(string $name, string $type, float $weigth, string $livingRegion)
    {
        parent::__construct($name, $type, $weigth, $livingRegion);
    }
}