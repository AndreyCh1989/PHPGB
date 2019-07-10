<?php

// 1,2,3,4
class Product {
    protected $id;
    protected $name;
    protected $price;
    protected $gender;

    public function __construct($id, $name, $price, $gender) {
        $this->$id = $id;
        $this->$name = $name;
        $this->$price = $price;
        $this->$gender = $gender;
    }

    public function getId()
    {
        return $this->$id;
    }

    public function getName()
    {
        return $this->$name;
    }

    public function getPrice()
    {
        return $this->$price;
    }

    public function getGender()
    {
        return $this->$gender;
    }
}

class CartItem extends Product {
    protected $quantity;

    public function __construct($id, $name, $price, $gender) {
        parent::__construct($id, $name, $price, $gender);

        $quantity = 1;
    }

    public function getQuantity()
    {
        return $this->$quantity;
    }

    public static function setQuantity($quantity)
    {
        $this->$quantity = $quantity;
    }
}

//5
class С {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new С(); // -> ничего не выведет (инициализация экземпляра класса)
$a2 = new С(); // -> ничего не выведет (инициализация экземпляра класса)
$a1->foo(); // -> 1 статичная переменная 0+1=1 потом вывод
$a2->foo(); // -> 2 статичная переменная 1+1=2 потом вывод
$a1->foo(); // -> 3 статичная переменная 2+1=3 потом вывод
$a2->foo(); // -> 4 статичная переменная 3+1=4 потом вывод

//6
class D {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class E extends D {
}
$a1 = new D(); // -> ничего не выведет (инициализация экземпляра класса)
$b1 = new E(); // -> ничего не выведет (инициализация экземпляра класса)
$a1->foo(); // -> 1 статичная переменная 0+1=1 потом вывод
$b1->foo(); // -> 1 статичная переменная 0+1=1 потом вывод (метод переопределен)
$a1->foo(); // -> 1 статичная переменная 1+1=2 потом вывод
$b1->foo(); // -> 1 статичная переменная 1+1=2 потом вывод (метод переопределен)


//7
class A { // тоже самое что и предыдущий пример
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
