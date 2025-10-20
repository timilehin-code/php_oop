<?php
include 'firstclass.php';
class Secondclass extends Firstclass
{
    public static $property = "Static Property";

    public static function test2() {
        echo parent::EXAMPLE;
        echo self::$property;
    }
}

echo Secondclass::test2();