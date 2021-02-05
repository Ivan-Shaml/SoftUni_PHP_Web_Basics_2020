<?php


namespace Database;


use mysql_xdevapi\Result;

interface StatementInterface
{
    /**
     * @param array $param
     * @return ResultSetInterface
     */
    public function execute(array $param = []) : ResultSetInterface;
}