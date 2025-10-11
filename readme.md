## PHP OBJECT ORIENTED PROGRAMING (OOP)

HI, I am Oluwatimilehin, I am trying to understand the concept of `oop` in `PHP`

The few concept i have learnt so far are:

# Lesson 1:

- **classes** : class is a big object that contains a lot of diffrent information about something e.g variables and functions which are called propreties and method

- **properies**: they are variables inside a class.

- **Methods**: they are functions inside a class.

- **Objects** : they are a refrence to class.

```php

   <?php

       class NewClass{//this how to create a clas
          public $words = "hello world"; // is a property


       }
       $object = new NewClass; // this is an object which is the instance or refrence of a class

   ?>
```

# Lesson 2:

## Visiblity and Inheritance:

Anytime you want to create a new property in a class you should always declear its visibity, else you will get an error, but for methods it is not neccessary but it is good practice to always declear a visibity if method visbity isn't decleared, it automatically sees it as public.

- **Private:** private properties or methods can not be accessed outside the class in which it was created.

- **Public:** Public properties or methods can be accessed within and outside of a class in which it was created.

- **Protected:** Protected properties or methods can be accessed only in within class and sub-classes of the class in which it was created from

the `$this` keyword is use to refrence a property inside a class or a sub-class

- **Inheritance:** it when another class is able to access the properties and method of another class for a class to inherit another class you need to use the `extends` keyword
  _note:_ only protected and public methods or properties can be inherited.

```php
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
?>
```

# Lesson 3:

## Constructors and Destructors:

**Constructor:** is a special method in php that triggers when the object of a class is created the `__construct()` keyword is used for creating a constructor method, also it is used to initialize the object properties.

**Destructors:** is a special method used when the obeject is destroyed or the script is ended, it is always used at the end of a class. the `__destruct()` keyword is used for creating a destructor method, also it is used to do most of the clean up after the object has served it purpose

```php

<?php
class Person
{
    public $name;
    public $eyecolor;
    public $age;


    public function __construct($name, $eyecolor, $age)
    {//this is a Constructors method
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

    public function __destruct() {
        // this is a destructor method
    }
}
?>
```

# Lesson 4:

## Deleting of an object:

Deleting an object in Object-Oriented Programming (OOP) refers to the process of removing an object from memory and making its resources available for other uses,
the `unset()` function is used to delete an object or instance of a class

```php
    $object = new NewClass();
    unset($object); // line 2 unset the object and makes line 3 invalid or null.
    echo $object->getNewProperty();
```

# Lesson 5:

## Static Properties and Methods:

Static Properties and Methods are methods and properties that can be accessed without having to create an object or instance of a class we use the `static` keyword to recognize a method or property as static and to access it we use `::`
to reference a static method or property

```php
<?php
 class myClass{
    public static $pi = 3.14; // this is a static property

    public static function pi($newPi){ //this is a static method
        self::$pi = $newPi;
    }
 }
  myClass::$Pi; // how to reference a static property.
  myClass::pi(3.5); // how to reference a static method.
?>

```
