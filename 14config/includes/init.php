<?php

spl_autoload_register(function ($class) {
    require dirname(__DIR__) . "/class/{$class}.php";
});

session_start();

require dirname(__DIR__) . '/config.php';

function errorHandler($level, $message, $file, $line) {
    throw new ErrorException($message, 0, $level, $file, $line);
}

function exceptionHandler($ex) {
    if (DEBUG) {
        echo "<h1>An error occured </h1>";
        echo "<p>Uncaught Exception: " . get_class($ex) . "</p>";
        echo "<p>Message: " . $ex->getMessage() . "</p>";
        echo "<p>In file " . $ex->getFile() . " on line " . $ex->getLine() . "</p>";
    } else {
        echo "<h1>An error occured </h1>";
        echo "<p>Please try again later </p>";
    }
    

    exit();
}

set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');