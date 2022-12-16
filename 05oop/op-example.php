<?php
require 'Item.php';

$my_item = new Item();

$my_item->setName("Table");
$my_item->setDescription("A round table");

echo $my_item->getName();