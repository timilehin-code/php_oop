<?php
class visibility
{
    public $name;
    public $age;
    private $sex;

    public function sex($sex)
    {
        $sum = 2 + 2;
        echo $sum;
        return $this->sex = $sex;
        
    }
}

$visibility = new  visibility();

echo $visibility->name = "timi online";
echo $visibility->age = 20;
echo $visibility->sex("male");
