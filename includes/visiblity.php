<?php
class person
{
    protected $first = "Oluwatimilehin";
    protected $last = "Tawose";

    protected $age = 20;
}


class pet extends person
{
    private $animal = "dog";
    private $name = "kai";
    public function owner()
    {
        $a = $this->first ." " . $this->last;

        return $a;
    }

    function petname()
    {
        $a = "<br>" . $this->owner() . "'s " . $this->animal."'s name " . " is " . $this->name;

        return $a;
    }
}
