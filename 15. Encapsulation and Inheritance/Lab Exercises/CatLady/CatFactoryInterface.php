<?php


interface CatFactoryInterface
{
    /**
     * @param string $breed
     * @param string $name
     * @param int $param
     * @return Cat
     */
    public static function create(string $breed, string $name, int $param): Cat;
}