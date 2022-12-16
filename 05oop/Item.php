<?php
class Item {
    private $name;
    public $description = "default value";

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function sayHello() {
        echo "Hello !";
    }

    public function getName() {
        return $this->name;
    }
}