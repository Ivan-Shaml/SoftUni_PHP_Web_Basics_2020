<?php

namespace Database;

interface ResultSetInterface
{
    public function fetchAll($className) : \Generator;
    public function fetch($className);
}