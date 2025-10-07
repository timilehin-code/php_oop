<?php

class Newclass {// this is how to create a class using the keyword "class" then the name of your class
    // properties and method goes here
    public $info = "this is some info"; //this is a property which are variables inside a class
    public  $a = $this->info;
}
  
$object = new Newclass; // this is an object which is the instance or refrence of  a class
var_dump($object);