<?php


class Cat extends Felime
{
    /**
     * @var string
     */
    private $breed;

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function __construct(string $name, string $type, float $weigth, string $livingRegion, string $breed)
    {
        $this->setBreed($breed);
        parent::__construct($name, $type, $weigth, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "Meowwww\n";
    }

    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %s, %s, %d]",$this->getType(), $this->getName(),$this->getBreed(), $this->getWeigth(), $this->getLivingRegion(),$this->getFoodEaten());
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $this->setFoodEaten($food->getQuantity());
    }
}