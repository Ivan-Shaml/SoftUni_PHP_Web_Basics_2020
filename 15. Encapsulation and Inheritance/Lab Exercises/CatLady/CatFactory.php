<?php


class CatFactory implements CatFactoryInterface
{

    /**
     * @param string $breed
     * @param string $name
     * @param int $param
     * @return Cat
     * @throws Exception
     */
    public static function create(string $breed, string $name, int $param): Cat
    {
        if (!class_exists($breed)){
            throw new Exception("This breed doesn't exist!");
        }
        return new $breed($breed, $name, $param);
    }
}