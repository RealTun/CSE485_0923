<?php
    $array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

    $min_length = strlen($array[0]);
    $stringMin = null;
    foreach($array as $string){
        if(strlen($string) < $min_length){
            $min_length = strlen($string);
            $stringMin = $string;
        }
    }

    $max_length = strlen($array[0]);
    $stringMax = null;
    foreach($array as $string){
        if(strlen($string) > $max_length){
            $max_length = strlen($string);
            $stringMax = $string;
        }
    }

    

    echo "Chuỗi lớn nhất là $stringMax, độ dài = $max_length <br>";
    echo "Chuỗi nhỏ nhất là $stringMin, độ dài = $min_length";
?>