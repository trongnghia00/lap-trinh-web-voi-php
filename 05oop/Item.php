<?php
class Item {
    public $name;
    public $description = "default value";

    function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    function sayHello() {
        echo "Hello !";
    }

    function getName() {
        return $this->name;
    }
}