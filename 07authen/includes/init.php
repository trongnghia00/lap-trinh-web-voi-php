<?php

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});

session_start();