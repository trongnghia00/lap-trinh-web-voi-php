<?php
class Item {
    public $name;

    protected $code = 432423123;

    public function getName() {
        return "Item: " . $this->name;
    }
}