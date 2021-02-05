<?php


namespace Database;


class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    /**
     * PDOResultSet constructor.
     * @param $pdoStatement
     */
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }


    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className): \Generator
    {
        while($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}