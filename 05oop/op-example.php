<?php
require 'Item.php';
require 'Book.php';

$my_item = new Item();

$my_item->name = "Table";

// echo $my_item->code;

echo "<br />";

$my_book = new Book();

$my_book->name = "Learning Python";
$my_book->author = "Trong Nghia";

echo $my_book->getCode();