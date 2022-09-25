<?php
    global $message;
    $message = 'Welcome to PHP';
    echo $GLOBALS['message'] . "<br />";

    function print_welcome() {
        echo $GLOBALS['message'] . "<br />";
    }

    print_welcome();

    @$val = 1/0;
    print_r(error_get_last());
?>