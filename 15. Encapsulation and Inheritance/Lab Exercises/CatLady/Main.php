<?php

spl_autoload_register();

class Main
{
    const INPUT_END = "End";
    const PATTERN = "/\\s+/";

    /**
     * @var Array
     */
    private $cats;

    public function run()
    {
        $this->readData();
    }

    /**
     * @param string $name
     * @return Cat
     * @throws Exception
     */
    private function findCatByName(string $name) : Cat
    {
        if (array_key_exists($name, $this->cats)){
            return $this->cats[$name];
        }
        throw new Exception("Cat not found!");
    }

    private function readData()
    {
        $input = readline();

        while($input !== self::INPUT_END) {
            $data = preg_split(self::PATTERN, $input, -1, PREG_SPLIT_NO_EMPTY);


            $breed = $data[0];
            $name = $data[1];
            $param = intval($data[2]);

            $cat = null;
            try {
                $this->cats[$name] = CatFactory::create($breed, $name, $param);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            $input = readline();
        }

        $searchingCatName = readline();
        try {
            echo $this->findCatByName($searchingCatName);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}

$main = new Main();
$main->run();