<?php
    $arr = ['a', 'b', 'ABC'];

    for($i = 0; $i < count($arr); $i++){
        $arr[$i] = strtoupper($arr[$i]);
    }

    echo '<pre>';
    print_r($arr);
    echo '</pre>';
?>