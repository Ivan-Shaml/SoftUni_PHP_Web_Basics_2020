<?php


class FoodFactory implements FoodFactoryInterface
{

    public static function create(string $type, int $quantity): ?Food
    {
        if (class_exists($type)){
            return new $type($quantity);
        }
        return null;
    }
}