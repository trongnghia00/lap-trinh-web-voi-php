<?php
    global $name;
    $name = 'Nghia';

    function print_name() {
        global $name;
        // $name = 'PHP';
        echo $name;
    }

    print_name();
    echo $name;
?>