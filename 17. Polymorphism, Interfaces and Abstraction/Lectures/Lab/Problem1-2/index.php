<?php

spl_autoload_register(function ($class){
    require_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php";
});

$vehicles = [];
$factory = new Factories\VehicleFactory();
$count = 0;

foreach (scandir('Vehicles') as $file){
    if ($file == "." || $file == ".."){
        continue;
    }
    $file = str_replace(".php", "", $file);
    $info = new ReflectionClass("Vehicles\\".$file);
    if(!$info->isAbstract() && !$info->isInterface()){
        $count++;
    }

}

for ($i=0 ; $i<$count; $i++){
    list($type, $qty, $consumption, $tankCap) = explode(" ", readline());
    $vehicle = $factory->create($type,$qty,$consumption, $tankCap);
    $vehicles[$type] = $vehicle;
}

$n = readline();

for ($i=0; $i<$n; $i++){
    list($action, $type, $param) = explode(" ", readline());
    $vehicle = $vehicles[$type];
    $action = strtolower($action);
    echo $vehicle->$action($param);
}

foreach ($vehicles as $vehicle){
    echo $vehicle . PHP_EOL;
}