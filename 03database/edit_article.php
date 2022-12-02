<?php
require 'includes/db.php';
require 'includes/getArticle.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}

var_dump($article);
?>