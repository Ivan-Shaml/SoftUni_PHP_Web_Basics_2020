<?php


class Vegetable extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }
}