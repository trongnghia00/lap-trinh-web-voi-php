<?php
$homeUrl = "/lap-trinh-web-voi-php/14config/";
?>
<!Doctype html>
<html>
    <head>
        <title>My Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= $homeUrl ?>css/style.css">
    </head>
    <body>
        <div class="container">
        <header><h1>My Blog</h1></header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= $homeUrl ?>">Home</a></li>
                <?php if (Auth::isLoggedIn()) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $homeUrl ?>admin">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $homeUrl ?>logout.php">Logout</a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $homeUrl ?>login.php">Login</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?= $homeUrl ?>contact.php">Contact</a></li>
            </ul>
        </nav>

        <main>