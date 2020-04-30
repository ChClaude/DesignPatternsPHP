<?php

// Base Component
interface Pizza {
    public function getDesc() : String;
}

// Concrete Component
class Margherita implements Pizza {

    public function getDesc(): String
    {
        return "Margherita";
    }
}

class VeggieParadise implements Pizza {

    public function getDesc(): String
    {
        return "Veggie Paradise";
    }
}

// Base Decorator
class PizzaToppings implements Pizza {

    protected $pizza;

    /**
     * PizzaToppings constructor.
     * @param $pizza
     */
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }


    public function getDesc(): String
    {
        return $this->pizza->getDesc();
    }
}

// Concrete Decorator
class ExtraCheese extends PizzaToppings {
    public function getDesc(): string
    {
        return parent::getDesc() . "Extra Cheese ";
    }
}

class Jalepeno extends PizzaToppings {
    public function getDesc(): string
    {
        return parent::getDesc() . "Jalepeno ";
    }
}

function makePizza(Pizza $pizza) {
    echo "Your Order: " . $pizza->getDesc();
}

$pizza = new Margherita();
$pizza = new ExtraCheese($pizza);
$pizza = new Jalepeno($pizza);

makePizza($pizza);