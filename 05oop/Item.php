<?php
class Item {
    public $name;
    public $description = "default value";

    function sayHello() {
        echo "Hello !";
    }

    function getName() {
        return $this->name;
    }
}