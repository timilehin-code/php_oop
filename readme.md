## PHP OBJECT ORIENTED PROGRAMING (OOP)

HI, I am Oluwatimilehin, I am trying to understand the concept of `oop` in `PHP`

The few concept i have learnt so far are:

# Day 1:

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

# Day 2:

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
