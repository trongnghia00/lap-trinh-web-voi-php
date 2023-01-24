<?php

spl_autoload_register(function ($class) {
    require dirname(__DIR__) . "/class/{$class}.php";
});

session_start();