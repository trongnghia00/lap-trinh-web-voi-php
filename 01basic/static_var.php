<?php
    function counter() {
        $count = 1;
        echo $count . '<br />';
        $count = $count + 1;
    }

    counter();
    counter();
    counter();
    counter();
    counter();

    echo '<hr />';

    function counter_static() {
        static $count = 1;
        echo $count . '<br />';
        $count = $count + 1;
    }

    counter_static();
    counter_static();
    counter_static();
    counter_static();
    counter_static();
?>