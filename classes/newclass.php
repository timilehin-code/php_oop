<?php

class NewClass
{
    public $data = "I am a property";
    public function __construct()
    {
        echo "This class as being instantiated <br>";
    }

    public function setNewProperty($newData)
    {
        $this->data = $newData;
    }

    public function getNewProperty()
    {
        return  $this->data;
    }

    public function __destruct()
    {
        echo "<br> this is end of the class";
    }
}
