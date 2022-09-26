<?php
    define("LANGUAGE", "PHP");
    $lang = LANGUAGE;
    echo "This program is written using $lang <br />";
    echo "This program is written using LANGUAGE <br />";
    echo "This program is written using ". LANGUAGE . "<br />";

    // define("LANGUAGE", "JAVA");
    // echo "This program is written using ". LANGUAGE . "<br />";

    // define("7VERSION", "7.4");
    // ECHO 7VERSION;

    define("NAME", "Nghia");
    echo NAME;

    echo constant('NAME');
?>