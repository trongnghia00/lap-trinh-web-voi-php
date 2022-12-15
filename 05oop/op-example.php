<?php
require 'Item.php';

$my_item = new Item();
$my_item->name = 'Nghia';

$item2 = new Item();
$item2->name = "Trong";

echo $my_item->getName() . " " . $item2->getName();