<?php


interface AnimalFactoryInterface
{
    public static function create(array $data): ?Animal;
}