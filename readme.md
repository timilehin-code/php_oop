
# **PHP Object-Oriented Programming (OOP) – Complete Guide**  
*By Oluwatimilehin Tawose*  



## Table of Contents
1. [Classes, Objects, Properties & Methods](#lesson-1)
2. [Visibility & Inheritance](#lesson-2)
3. [Constructors & Destructors](#lesson-3)
4. [Deleting Objects (`unset`)](#lesson-4)
5. [Static Properties & Methods](#lesson-5)
6. [Autoloading & Namespaces](#lesson-6)
7. [Type Declarations (Type Hinting)](#lesson-7)
8. [Scope Resolution Operator (`::`)](#lesson-8)
9. [Interfaces](#lesson-9)
10. [Abstract Classes](#lesson-10)
11. [Anonymous Classes](#lesson-11)
12. [Model-View-Controller (MVC)](#lesson-12)



<a name="lesson-1"></a>
# Lesson 1: Classes, Objects, Properties & Methods

> *Class is a big object that contains a lot of different information about something e.g variables and functions which are called properties and method. Objects are a reference to class.*

**Class** – A blueprint for creating objects.  
**Object** – An instance of a class.  
**Properties** – Variables inside a class.  
**Methods** – Functions inside a class.

```php
<?php
class NewClass 
{
    public $words = "hello world"; // property
}

$object = new NewClass(); // object = instance of class
echo $object->words; // hello world
?>
```

> **Best Practice**:  
> - Class names → `PascalCase`  
> - Properties/methods → `camelCase`


> *A **class** is like a **recipe for jollof rice** — it tells you the ingredients and steps.  
> An **object** is the actual plate of jollof you cook and eat!*

---

<a name="lesson-2"></a>
# Lesson 2: Visibility & Inheritance
 
> *Anytime you want to create a new property in a class you should always declare its visibility, because it is best practice.*

PHP if visibility is omitted — it defaults to `public`.  
**Best practice**: **Always declare visibility** for clarity.

| Keyword     | Accessible In      |
|-------------|--------------------|
| `public`    | Everywhere         |
| `protected` | Class + subclasses |
| `private`   | Only this class    |

```php
class Person
{
    public $first = "Oluwatimilehin";
    protected $last = "Tawose";
    private $age = 20;
}

class Pet extends Person
{
    private $animal = "dog";
    private $name = "kai";

    public function owner()
    {
        $a = $this->first . " " . $this->last;
        return $a;
    }

    public function petName()
    {
        return "<br>" . $this->owner() . "'s " . $this->animal . "'s name is " . $this->name;
    }
}

$pet = new Pet();
echo $pet->petName();
```

> **Only `public` and `protected` are inherited.**  
> Use `$this` to reference properties/methods in the current object.


> *`private` is like your **phone password** — only you can see it.  
> `protected` is like **family secrets** — only your siblings (subclasses) know.  
> `public`? That’s your **Instagram bio** — everyone sees it!*

---

<a name="lesson-3"></a>
# Lesson 3: Constructors & Destructors
 
> *Constructor: is a special method in php that triggers when the object of a class is created the `__construct()` keyword is used for creating a constructor method, also it is used to initialize the object properties.*
> *Destructors: is a special method used when the object is destroyed or the script is ended, it is always used at the end of a class. the `__destruct()` keyword is used for creating a destructor method, also it is used to do most of the clean up after the object has served it purpose*

```php
class Person
{
    public $name;
    public $eyeColor;
    public $age;

    public function __construct($name, $eyeColor, $age)
    {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }

    public function setName(string $name = "user")
    {
        $this->name = $name . "<br>";
    }

    public function getName()
    {
        return $this->name;
    }

    public function __destruct()
    {
        echo "Cleanup: Person object destroyed.<br>";
    }
}

$person = new Person("Tim", "brown", 20);
echo $person->getName();
```

> `__destruct()` runs when:  
> - `unset($obj)`  
> - Script ends  
> - Object goes out of scope


> *`__construct()` is like **arriving at a party and introducing yourself**.  
> `__destruct()` is **saying goodbye and turning off the lights when you leave**.*

---

<a name="lesson-4"></a>
# Lesson 4: Deleting Objects with `unset()`


> *Deleting an object removes it from memory... use `unset()`*

```php
$object = new NewClass();
unset($object); // Object destroyed → __destruct() runs
// echo $object->words; // Fatal error
```

> Alternative: `$object = null;`


> *`unset($object)` is like **throwing away your old phone** — it’s gone, and you can’t call it anymore!*

---

<a name="lesson-5"></a>
# Lesson 5: Static Properties & Methods

> *Static properties and methods can be accessed without creating an object... use `::`*

```php
class MyClass
{
    public static $pi = 3.14;

    public static function updatePi($newPi)
    {
        self::$pi = $newPi;
    }
}

echo MyClass::$pi;           // 3.14
MyClass::updatePi(3.142);
echo MyClass::$pi;           // 3.142
```

> Use `self::` inside class  
> Use `static::` for late static binding in inheritance
  
> *A **static method** is like the **school bell** — everyone hears it, no need to create a student first!*

---

<a name="lesson-6"></a>
# Lesson 6: Autoloading & Namespaces
  
> *Use `spl_autoload_register()` to auto-load classes... Namespaces avoid naming conflicts.*

```php
spl_autoload_register(function ($className) {
    $path = "classes/";
    $extension = ".php";
    $fullPath = $path . $className . $extension;

    if (file_exists($fullPath)) {
        include_once $fullPath;
    }
});
```

### PSR-4 Style
```php
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) return;

    $relative = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
```

### Namespace Example
```php
// src/Models/User.php
namespace App\Models;

class User {
    public function greet() {
        return "Hello from User!";
    }
}

// index.php
use App\Models\User;
$user = new User();
echo $user->greet();
```

  
> *Namespaces are like **full names** — `Tunde Adebayo` vs `Tunde Ibrahim`.  
> Without them, PHP thinks both are the same `Tunde`!*

---

<a name="lesson-7"></a>
# Lesson 7: Type Declarations (Type Hinting)
  
> *Use type declaration to enforce correct data types... enable with `declare(strict_types=1)`*

```php
<?php
declare(strict_types=1);

class Calculator
{
    public function add(int $x, int $y): int
    {
        return $x + $y;
    }
}

$calc = new Calculator();
echo $calc->add(2, 4); // 6
// $calc->add("2", 4); // TypeError!
?>
```

> Supported types: `int`, `float`, `string`, `bool`, `array`, `callable`, `object`, `?Type`, etc.

> *Type hinting is like a **bouncer at a club** — “Sorry, strings not allowed. Only `int` VIPs!”*

---

<a name="lesson-8"></a>
# Lesson 8: Scope Resolution Operator (`::`)
  
> *Used to access static methods, properties, and constants... `parent::` in subclasses*

```php
class FirstClass
{
    const EXAMPLE = "DOES NOT CHANGE";

    public static function test()
    {
        return "This is a test";
    }
}

echo FirstClass::EXAMPLE; // DOES NOT CHANGE

class SecondClass extends FirstClass
{
    public static $property = "Static Property";

    public static function test2()
    {
        echo parent::EXAMPLE;
        echo self::$property;
    }
}

SecondClass::test2();
```
 
> *`parent::` is like asking your **dad** for his old school motto — even if you’re in a new class!*

---

<a name="lesson-9"></a>
# Lesson 9: Interfaces

> *Interface is like a blueprint... must use `implements`... only public methods*

```php
interface Logger
{
    public function logMessage(string $message);
    public function logError(string $errorMessage);
}

class FileLogger implements Logger
{
    public function logMessage(string $message)
    {
        echo "Logging message to file: $message" . PHP_EOL;
    }

    public function logError(string $errorMessage)
    {
        echo "Logging error to file: $errorMessage" . PHP_EOL;
    }
}

class DatabaseLogger implements Logger
{
    public function logMessage(string $message)
    {
        echo "Storing message in database: $message" . PHP_EOL;
    }

    public function logError(string $errorMessage)
    {
        echo "Storing error in database: $errorMessage" . PHP_EOL;
    }
}

$fileLogger = new FileLogger();
$fileLogger->logMessage("Test message");
```

> **Rules**:  
> - Methods must be `public`  
> - No properties or constants  
> - Use `implements`

 
> *An **interface** is like a **job description** — “You must `logMessage()` and `logError()`”.  
> Any class that `implements` it must do the work — no excuses!*

---

<a name="lesson-10"></a>
# Lesson 10: Abstract Classes

> *Abstract classes cannot be instantiated... must implement abstract methods*

```php
abstract class Visa
{
    public function visaPayment()
    {
        return "perform a payment";
    }

    abstract public function getPayment();
}

class BuyProduct extends Visa
{
    public function getPayment()
    {
        return $this->visaPayment();
    }
}

$buy = new BuyProduct();
echo $buy->getPayment(); // perform a payment
```

> **Important**:  
> - Cannot instantiate abstract class  
> - Subclasses **must** implement abstract methods  
> - **No abstract properties** (even in PHP 8.1+)


> *An **abstract class** is like a **half-built house** — you can’t live in it (`new AbstractClass()`), but your kids can finish it and move in!*

---

<a name="lesson-11"></a>
# Lesson 11: Anonymous Classes

> **Original Note (by Oluwatimilehin):**  
> *Anonymous class is created and used once... uses `new class()`*

```php
$AnonymousClass = new class()
{
    public function greet()
    {
        return "Hello world";
    }
};

echo $AnonymousClass->greet(); // Hello world
```

> Use for: one-time objects, testing, mocking.

> **Relatable Joke**:  
> *An **anonymous class** is like a **one-day substitute teacher** — does the job, no name tag, gone tomorrow!*

---

<a name="lesson-12"></a>
# Lesson 12: Model-View-Controller (MVC)


> *MVC separates logic: Model (data), View (presentation), Controller (connection)*

### Folder Structure
```bash
my-app/
├── index.php
├── controllers/
│   └── user.php
├── models/
│   └── user.php
└── views/
    └── user.php
```

### Simple Flow
```
User → Controller → Model ↔ Database
               ↓
             View → HTML
```
  
> *MVC is like **cooking Jollof**:  
> - **Model** = ingredients in the pot (data)  
> - **View** = the plate and garnish (presentation)  
> - **Controller** = the chef who connects pot to plate!*

---

## Next Lessons (Planned)
1. **Traits** – Reusable methods  
2. **Dependency Injection** – Cleaner, testable code  
3. **Composer** – Autoloading + packages  
4. **PSR-12** – Coding standards  
5. **Design Patterns** – Factory, Singleton, Repository

---
## Projects done with oop
[OOP Projects](https://github.com/timilehin-code/php_oop/tree/projects)

## Author
**Oluwatimilehin Tawose**  
*PHP Developer | Learning OOP*

---

> **"Code is like humor. When you have to explain it, it’s bad."** – Cory House  

---

## Contributing

We'd love your help to make this guide even better!

Please see **[CONTRIBUTING.md](./CONTRIBUTING.md)** for details on:
- How to submit pull requests
- Coding style
- Testing
- Code of conduct

Every contribution counts – from a typo fix to a brand-new lesson!

<a href="./CONTRIBUTING.md">
  <img src="https://img.shields.io/badge/Contributions-Welcome-brightgreen.svg" alt="Contributions Welcome">
</a>

