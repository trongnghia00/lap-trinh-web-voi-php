<?php
$homeUrl = "/lap-trinh-web-voi-php/10upload/";
?>
<!Doctype html>
<html>
    <head>
        <title>My Blog</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <header><h1>My Blog</h1></header>

        <nav>
            <ul>
                <li><a href="<?= $homeUrl ?>">Home</a></li>
                <?php if (Auth::isLoggedIn()) : ?>
                    <li><a href="<?= $homeUrl ?>admin">Admin</a></li>
                    <li><a href="<?= $homeUrl ?>logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?= $homeUrl ?>login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <main>