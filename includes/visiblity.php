<?php
class Person
{
    public $name;
    public $eyecolor;
    public $age;


    public function __construct($name, $eyecolor, $age)
    {
        $this->name = $name;
        $this->eyecolor = $eyecolor;
        $this->age = $age;
    }

    public function setName(string $name = "user")
    {
        $this->name = $name . "</br>";
    }

    public function getName()
    {
        return  $this->name;
    }

    public function __destruct() {}
}
