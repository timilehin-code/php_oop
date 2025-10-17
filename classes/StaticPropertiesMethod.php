<?php
// declare(strict_types = 1);
class StaticPropertiesMethod
{
    private $name;
    private $eyeColor;
    private $age;


    public static $drinkingAge = 18;

    // public function __construct($name, $eyeColor, $age)
    // { //this is a Constructors method
    //     $this->name = $name;
    //     $this->eyeColor = $eyeColor;
    //     $this->age = $age;
    // }

    public function setName(int $name = 2)
    {
        $this->name = $name . "</br>";
    }

    public function getName()
    {
        return  $this->name;
    }

    public static function SetDrinkingAge($newDrinkingAge){
        self::$drinkingAge = $newDrinkingAge;
    }
}
