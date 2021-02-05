<?php


namespace Database;


use Cassandra\Statement;

interface DatabaseInterface
{
    /**
     * @param string $query
     * @return StatementInterface
     */
    public function query(string $query): StatementInterface;
}