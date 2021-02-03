<?php


interface FoodFactoryInterface
{
    public static function create(string $type, int $quantity): ?Food;
}