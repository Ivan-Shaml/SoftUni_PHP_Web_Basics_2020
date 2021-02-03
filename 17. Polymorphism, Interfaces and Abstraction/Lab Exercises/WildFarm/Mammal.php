<?php


abstract class Mammal extends Animal
{

    /**
     * @var string
     */
    private $livingRegion;

    /**
     * Mammal constructor.
     * @param string $name
     * @param string $type
     * @param float $weigth
     * @param string $livingRegion
     */
    public function __construct(string $name, string $type, float $weigth, string $livingRegion)
    {
        $this->setLivingRegion($livingRegion);
        parent::__construct($name, $type, $weigth);
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    private function setLivingRegion(string $livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }


    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %s, %d]",$this->getType(), $this->getName(), $this->getWeigth(), $this->getLivingRegion(),$this->getFoodEaten());
    }

}