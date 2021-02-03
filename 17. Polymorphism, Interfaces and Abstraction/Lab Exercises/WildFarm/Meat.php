<?php


class Meat extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }
}