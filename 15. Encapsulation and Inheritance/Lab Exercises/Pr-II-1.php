<?php

class Person
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @throws Exception
     */
    public function __construct($name, $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @throws Exception
     */
    protected function setName($name): void
    {
        if (strlen($name) >= 3) {
            $this->name = $name;
        }else{
            throw new Exception("Name's length should not be less than 3 symbols!");
        }
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param $age
     * @throws Exception
     */
    protected function setAge($age): void
    {
        if($age > 0) {
            $this->age = $age;
        }else{
            throw new Exception("Age must be positive!");
        }
    }

}

class Child extends Person
{
    public function __construct($name, $age)
    {
        if ($age > 15){
            throw new Exception("Child's age must be less than 16!");
        }else{
            parent::__construct($name,$age);
        }
    }
}

// MAIN
try {
    $person = new Person("Ivan",40);
    $child = new Child("Ivancho", 10);
    var_dump($person,$child);
}catch (Exception $e){
    echo $e->getMessage();
}

