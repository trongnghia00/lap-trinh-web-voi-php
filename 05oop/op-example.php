<?php
require 'Item.php';

Item::showCount();

$my_item = new Item("Table", "A round table");

Item::showCount();

$my_item->name = "A new table";

$item2 = new Item("Car", "A toy");

Item::showCount();

echo $my_item->getName();

echo "<br />";

define("MAX", 100);

echo Item::MAX;