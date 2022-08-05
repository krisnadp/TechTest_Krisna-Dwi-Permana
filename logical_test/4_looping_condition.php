<?php

    $i = 1;

    for ($i; $i <= 50; $i++) {

        if ( $i % 3 == 0) {
            echo '<br>' . 'Foo';
        } elseif ( $i % 5 == 0 ) {
            echo '<br>' . 'Bar';
        } elseif ( $i % 3 && $i % 5 == 0 ) {
            echo '<br>' . 'FooBar';
        } else {
            echo '<br>' . $i;
        }

    }

?>