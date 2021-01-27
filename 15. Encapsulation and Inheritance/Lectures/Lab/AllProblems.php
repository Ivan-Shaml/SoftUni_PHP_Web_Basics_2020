<?php

class Vehicle
{
    /**
     * @var int
     */
    protected $numberDoors;
    /**
     * @var string
     */
    protected $color;

    /**
     * @var string
     */
    protected $brand;
    /**
     * @var string
     */
    protected $model;
    /**
     * @var int
     */
    protected $year;

    /**
     * Vehicle constructor.
     * @param int $numberDoors
     * @param string $color
     * @param string $brand
     * @param string $model
     * @param int $year
     */
    public function __construct(int $numberDoors, string $color, string $brand, string $model, int $year)
    {
        $this->setNumberDoors($numberDoors);
        $this->setColor($color);
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setYear($year);
        echo "Parent constructor called!\n";
    }

    /**
     * @return int
     */
    public function getNumberDoors(): int
    {
        return $this->numberDoors;
    }

    /**
     * @param int $numberDoors
     */
    protected function setNumberDoors(int $numberDoors): void
    {
        $this->numberDoors = $numberDoors;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    protected function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    protected function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    protected function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */

    protected function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function __get($name)
    {
        if ($this->{$name} != null) {
            return $this->{$name};
        }
        return "property doesn't exist";
    }

    public function Paint($color)
    {
        $this->setColor($color);
    }

}

class Car extends Vehicle
{


    /**
     * Car constructor.
     * @param int $numberDoors
     * @param string $color
     * @param string $brand
     * @param string $model
     * @param int $year
     */
    public function __construct(int $numberDoors, string $color, string $brand, string $model, int $year)
    {
        parent::__construct($numberDoors, $color, $brand, $model, $year);
        echo "Car constructor called!\n";
    }

    public function Paint($color): void
    {
        $this->setColor($color);
    }

}

class Bicycle extends Vehicle
{
    /**
     * @var ?boolean
     */
    private $forSkirt;

    /**
     * @var boolean
     */
    private $riding;

    /**
     * @return bool|null
     */
    public function getForSkirt(): ?bool
    {
        return $this->forSkirt;
    }

    /**
     * @param bool|null $forSkirt
     */
    private function setForSkirt(?bool $forSkirt = null): void
    {
        $this->forSkirt = $forSkirt;
    }

    /**
     * @return bool
     */
    public function isRiding(): bool
    {
        return $this->riding;
    }

    /**
     * @param bool $riding
     */
    private function setRiding(bool $riding): void
    {
        $this->riding = $riding;
    }


    /**
     * Bicycle constructor.
     * @param ?bool $forSkirt
     * @param string $brand
     * @param string $model
     * @param int $year
     * @param string $color
     */
    public function __construct(string $brand, string $model, int $year, string $color, ?bool $forSkirt=null)
    {
        parent::__construct(0,$color,$brand,$model,$year);
        $this->setForSkirt($forSkirt);
        $this->setRiding(false);
        echo "Bicycle constructor called!\n";
    }

    public function Ride():void
    {
        $this->setRiding(true);
    }

    public function Stop():void
    {
        $this->setRiding(false);
    }

}

//$door = 4;//intval(readline());
//$cl = "red";//readline();

//$vh = new Vehicle($door,$cl);

//echo $vh->__get("numberDoors");

//var_dump($vh);
//$vh->Paint("blue");

//$car = new Car("5", "red", "Audi", "A4", 1998);

//var_dump($car);

//$car->Paint("blue");

//var_dump($car);

$b1 = new Bicycle("china1", "fake1", "2001", "yellow");
$b2 = new Bicycle("china2", "fake2", "2002", "red");

$b1->Ride();
$b2->Stop();

var_dump($b1,$b2);