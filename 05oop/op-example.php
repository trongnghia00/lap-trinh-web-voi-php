<?php
require 'Item.php';

$my_item = new Item();
$my_item->name = "Example";
$my_item->description = "new description";
$my_item->price = 10;

var_dump($my_item);

?>