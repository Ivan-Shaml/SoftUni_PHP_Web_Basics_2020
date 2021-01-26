<?php

class Person
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $occupation;

    /**
     * Person constructor.
     * @param string $name
     * @param int $age
     * @param string $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getOccupation(): string
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     */
    private function setOccupation(string $occupation): void
    {
        $this->occupation = $occupation;
    }
}

$people = [];

$input = readline();
while ($input !== "END"){
    list($name, $age, $occupation) = explode(" ", $input);
    $age = intval($age);
    $person = new Person($name, $age, $occupation);
    $people [] = $person;

    $input = readline();
}

print_r($people);