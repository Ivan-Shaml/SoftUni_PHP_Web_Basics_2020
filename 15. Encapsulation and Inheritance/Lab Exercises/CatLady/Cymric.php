<?php


class Cymric extends Cat
{

    /**
     * @var int
     */
    private $furLength;

    /**
     * @return int
     */
    public function getFurLength(): int
    {
        return $this->furLength;
    }

    /**
     * @param int $furLength
     */
    private function setFurLength(int $furLength): void
    {
        $this->furLength = $furLength;
    }

    /**
     * Cymric constructor.
     * @param string $breed
     * @param string $name
     * @param int $furLength
     */
    public function __construct(string $breed, string $name, int $furLength)
    {
        $this->setFurLength($furLength);
        parent::__construct($breed, $name);
    }

    public function __toString(): string
    {
        return parent::__toString(). " " . $this->getFurLength() . PHP_EOL;
    }

}