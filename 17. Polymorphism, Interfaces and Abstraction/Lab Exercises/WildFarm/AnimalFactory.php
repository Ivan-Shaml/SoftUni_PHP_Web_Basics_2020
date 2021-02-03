<?php


class AnimalFactory implements AnimalFactoryInterface
{

    public static function create(array $data): ?Animal
    {
        $type = $data[0];
        $name = $data[1];
        $weight = floatval($data[2]);
        $livingRegion = $data[3];

        switch ($type){
            case "Cat":
            $breed = $data[4];
            return new Cat($name, $type, $weight, $livingRegion, $breed);
            case "Zebra":
            case "Mouse":
            case "Tiger":
            return new $type($name, $type, $weight, $livingRegion);
            default:
                return null;
        }

    }
}