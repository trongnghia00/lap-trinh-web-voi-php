<?php
class Book extends Item {
    
    public $author;

    public function getName() {
        return parent::getName() . " by " . $this->author;
    }

    public function getCode() {
        return $this->code;
    }
}