<?php
namespace Playroom;

use Playroom\CarMakerVW;


//TODO: make 1 dimensional array of car makers
$carsArray = ['Volvo', 'Audi', 'VW', 'BMW'];

function printArray($array) {
   $count = count($array);

   for($i = 0; $i < $count; $i++) {
    echo "Car Maker no {$i}: {$array[$i]} ";  
   }
}

printArray($carsArray);

//TODO: make associative array and access it

$bmwX3 = ['make' => 'BMW', 'model' => 'X3', 'YearOfProduction' => 2009];

function printCarAssoc($car) {
    echo "Car make:{$car['make']} Model: {$car['model']} Production Year: {$car['YearOfProduction']}";
}
echo "<br>";
printCarAssoc($bmwX3);

//TODO: create car class and new car object

class Car {
    public $make, $model, $yearOfProd;

   public function __construct($make, $model, $yearOfProd) {
       $this->make = $make;
       $this->model = $model;
       $this->yearOfProd = $yearOfProd;       
   }

   public function printMe() {
       echo "{$this->make} {$this->model} Production Year: {$this->yearOfProd}";
   }

}
echo "<br>";
$audiQ5 = new Car('Audi', 'Q5', 2010);
$audiQ5->printMe();

//TODO: create CarFactory design pattern

// interface ICar, classes Audi, BMW, Volvo, CarFactory

interface ICar {
    public function printMe();
}
class Audi implements ICar {
    public  $model, $yearOfProd;
    public function __construct($model, $yearOfProd)
    {
        $this->make = 'Audi';
        $this->model = $model;
        $this->yearOfProd = $yearOfProd;
    }
    public function printMe()
    {
        echo "<br>";//print on new line
        echo "{$this->make} {$this->model} Production Year: {$this->yearOfProd}";
    }
}

class CarFactory {
    public $car = null;
    public $makerClass = null;
    public function make($make, $model, $yearOfProd) : ICar {
        $this->makerClass = "\\Playroom\\".$make;
        $this->car = new $this->makerClass($model, $yearOfProd);
        return $this->car;
    }
}

$carFactory = new CarFactory();
$audiQ7 = $carFactory->make('Audi', 'Q7', 2015); 
$audiQ7->printMe();


//TODO: use Facade pattern $VWGolf7 = VW::make('Golf 7', 2018)

abstract class CarMakerVW {
    public function make($model, $yearOfProd) {
        $newCar = [];
        $newCar = ['make' => 'WV', 'model' => $model, 'yearOfProduction' => $yearOfProd];
        return $newCar;
    }
}

class VW extends CarMakerVW {
    public static function printMe() {
        echo 'This is VW maker facade!';
    }
}

$VWGolf7 = VW::make('Golf 7', 2018);
echo '<br>';
print_r($VWGolf7);

