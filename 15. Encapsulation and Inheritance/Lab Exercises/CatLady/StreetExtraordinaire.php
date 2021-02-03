<?php


class StreetExtraordinaire extends Cat
{
    /**
     * @var int
     */
    private $decibelsOfMeows;

    /**
     * StreetExtraordinaire constructor.
     * @param string $breed
     * @param string $name
     * @param int $decibelsOfMeows
     */
    public function __construct(string $breed, string $name, int $decibelsOfMeows)
    {
        $this->setDecibelsOfMeows($decibelsOfMeows);
        parent::__construct($breed, $name);
    }

    /**
     * @return int
     */
    public function getDecibelsOfMeows(): int
    {
        return $this->decibelsOfMeows;
    }

    /**
     * @param int $decibelsOfMeows
     */
    private function setDecibelsOfMeows(int $decibelsOfMeows): void
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    public function __toString(): string
    {
        return parent::__toString(). " " . $this->getDecibelsOfMeows() . PHP_EOL;
    }
}