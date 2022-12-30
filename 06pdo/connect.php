<?php
$db_host = "localhost";
$db_name = "my_blog";
$db_user = "blog_db_admin";
$db_pass = "kUO8jJphaouidk82";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

// echo "Connected successfully.";

$sql = "SELECT * 
        FROM blogs
        ORDER BY Published_at;";
$results = mysqli_query($conn, $sql);
if ($results === false) {
    echo mysqli_error($conn);
}
else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    var_dump($articles);
}
?>