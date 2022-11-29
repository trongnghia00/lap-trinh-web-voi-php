<?php
function getDB() {
    $db_host = "localhost";
    $db_name = "my_blog";
    $db_user = "blog_db_admin";
    $db_pass = "kUO8jJphaouidk82";
    // $db_user = "root";
    // $db_pass = "mysql";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}


?>