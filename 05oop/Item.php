<?php
class Item {
    private $name;
    private $description;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
}