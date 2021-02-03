<?php


class Tiger extends Felime
{
    public function __construct(string $name, string $type, float $weigth, string $livingRegion)
    {
        parent::__construct($name, $type, $weigth, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $func = new \ReflectionClass($food); //get name of class using type reflection
        $foodClassName = $func->getName();

        $class = new ReflectionClass($this);
        $className = $class->getName();

        if ("Meat" !== $foodClassName){
            throw new Exception($className . "s are not eating that type of food!");
        }
        $this->setFoodEaten($food->getQuantity());
    }
}