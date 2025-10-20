## PHP OBJECT ORIENTED PROGRAMMING (OOP)

HI, I am Oluwatimilehin, I am trying to understand the concept of `oop` in `PHP`

The few concept i have learnt so far are:

# Lesson 1:

- **classes** : class is a big object that contains a lot of different information about something e.g variables and functions which are called properties and method

- **properties**: they are variables inside a class.

- **Methods**: they are functions inside a class.

- **Objects** : they are a reference to class.

```php

   <?php

       class NewClass{//this how to create a class
          public $words = "hello world"; // is a property


       }
       $object = new NewClass; // this is an object which is the instance or refrence of a class

   ?>
```

# Lesson 2:

## Visibility and Inheritance:

Anytime you want to create a new property in a class you should always declear its Visibility, else you will get an error, but for methods it is not necessary but it is good practice to always declear a Visibility if method Visibility isn't declared, it automatically sees it as public.

- **Private:** private properties or methods can not be accessed outside the class in which it was created.

- **Public:** Public properties or methods can be accessed within and outside of a class in which it was created.

- **Protected:** Protected properties or methods can be accessed only in within class and sub-classes of the class in which it was created from

the `$this` keyword is use to reference a property inside a class or a sub-class

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

**Destructors:** is a special method used when the object is destroyed or the script is ended, it is always used at the end of a class. the `__destruct()` keyword is used for creating a destructor method, also it is used to do most of the clean up after the object has served it purpose

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
to reference a static method or property, and we use the `self` and `::` to access it inside a class

```php
<?php
 class myClass{
    public static $pi = 3.14; // this is a static property

    public static function pi($newPi){ //this is a static method
        self::$pi = $newPi; // how to reference a property inside a class.
    }

 }
  myClass::$Pi; // how to reference a static property.
  myClass::pi(3.5); // how to reference a static method.
?>
```

# Lesson 6:

## Automatic Loading of classes and Namespaces:

we use the php `spl_autoload_register()` function to auto load files in php easily without having to include so many files to the files we are working on.
A namespace in PHP is a way to encapsulate items such as classes, functions, and constants to avoid naming conflicts and organize code, especially in large applications or when using third-party libraries. Think of it as a container that allows you to group related code under a unique name, similar to how directories organize files in a filesystem.

```php
<?php
spl_autoload_register("myAutoLoader"); // to auto load classes with the function name "myAutoLoader";
function myAutoLoader($className) //autoloader function
{
    $path = "classes/"; // file part
    $extension = ".php"; // file extension
    $fullPathName = $path . $className . $extension; //concatenating of the file directory and extensions together.
    try {
        if (!file_exists($fullPathName)) { // error handling if file does not exist
            throw new Exception("invalid class or file Name");
        }
        include_once $fullPathName;
        return $fullPathName;
    } catch (ErrorException  $th) {
        echo $th->getMessage();
    }
}
```

# Lesson 7:

## Type Declaration Or Type Hinting:

We use type declaration to make sure that the user passes in the right type of data inside a function or method the list of type we have in PHP are:

- int
- Float
- string
- bool
- array
- callable
- object
- null
- resource

```php
<?php
    declare(strict_types = 1); // used to enable strict mode in php nd also ensure the type declaration rule is enforced.
    class myClass{

        public function add(int $x, int $y){
            return x +y;
        }
    }
    $obj = new myClass();
    $obj->add(2,4) // the two parameters passed as to be integer data type for the function to work, if not it will throw a type error.
?>
```
# Lesson 8:

## Scope Resolution Operator:

the scope resolution operator  which is `::` is an operator that is used to access static methods, properties, and also constants in php

```php
<?php
     class Firstclass{
    const EXAMPLE = "DOES NOT CHANGE"; // this is a constant

    public static function test(){
        $testing = "This is a test";
        return $testing;
    }
 }

 echo Firstclass::EXAMPLE; // echoing the value of the constant using the scope resolution operator

class Secondclass extends Firstclass
{
    public static $property = "Static Property";

    public static function test2() {
        echo parent::EXAMPLE; //  I used the parent key word to access the the constant from the parent class in this subclass
        echo self::$property;
    }
}

echo Secondclass::test2();

?>
```
[! warning]
> the "parent" key word is used to access constant inside a subclass like in 
> the example showing above, but the scope resolution operator makes it accessible outside a `class.`     