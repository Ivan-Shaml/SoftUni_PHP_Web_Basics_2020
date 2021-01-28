<?php

class Product
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $cost;

    /**
     * Product constructor.
     * @param string $name
     * @param float $cost
     * @throws Exception
     */
    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
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
     * @throws Exception //Product's name cannot be empty!
     */
    private function setName(string $name): void
    {
        if ($name == "" || $name == " " || strlen($name) == 0){
            throw new Exception("Product's name cannot be empty!\n");
        }
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     * @throws Exception //Cost cannot be negative!
     */
    private function setCost(float $cost): void
    {
        if ($cost < 0){
            throw new Exception("Cost cannot be negative!\n");
        }
        $this->cost = $cost;
    }

    public function __toString(): string
    {
        return $this->getName();
    }


}


class Person
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $money;

    /**
     * @var Product[]|array
     */
    private $bag;

    /**
     * Person constructor.
     * @param string $name
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bag = [];
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
     * @throws Exception //Person's name cannot be empty!
     */
    private function setName(string $name): void
    {
        if ($name == "" || $name == " " || strlen($name) == 0){
            throw new Exception("Person's name cannot be empty!\n");
        }
        $this->name = $name;
    }

    /**
     * @return Product
     */

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     * @throws Exception //Money cannot be a negative number!
     */
    private function setMoney(float $money): void
    {
        if($money < 0){
            throw new Exception("Money cannot be a negative number!\n");
        }
        $this->money = $money;
    }

    /**
     * @param Product $product
     * @throws Exception //$this->Person can't afford Product
     */
    public function addToBag(Product $product): void
    {
        if($this->getMoney() >= $product->getCost()) {
            array_push($this->bag, $product);
            $this->setMoney(($this->getMoney() - $product->getCost()));
            echo "{$this->getName()} bought {$product->getName()}".PHP_EOL;
        }else{
            throw new Exception("{$this->getName()} can't afford {$product->getName()}".PHP_EOL);
        }
    }

    /**
     * @return array|Product[]
     */
    public function getBag(): array
    {
        return $this->bag;
    }

}

// MAIN

// Read People
$personsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
//$personsData = array_filter($personsData, function (string $e) {
//    return $e !== "" && $e !== " ";
//});

$people = [];
for ($i = 0; $i < count($personsData) - 1; $i += 2){
    $personName = $personsData[$i];
    $personMoney = $personsData[$i+1];
    try {
        $people[$personName] = new Person($personName, floatval($personMoney));
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
// Read Products
$productsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
$products = [];
for ($i = 0; $i < count($productsData) - 1; $i += 2) {
    $productName = $productsData[$i];
    $productCost = $productsData[$i+1];
    try {
        $products[$productName] = new Product($productName, $productCost);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

//Read Assoc Person/Prod until "END"
$input = readline();
while ($input !== "END"){
    $data = explode(" ", $input);
    $personName = $data[0];
    $productName = $data[1];

    if ( array_key_exists($personName, $people) && array_key_exists($productName, $products) ) {
        try {
            $people[$personName]->addToBag($products[$productName]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $input = readline();
}

foreach ($people as $person){
    if (count($person->getBag()) === 0){
        echo PHP_EOL . $person->getName() . " - Nothing bought\n";
    }else {
        echo PHP_EOL . $person->getName() . " - ";
        echo implode(",", $person->getBag());
    }
}