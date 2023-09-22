<?php
    function sum($carry, $item){
        $carry += $item;
        return $carry;
    }

    function subtract($arr) : int{
        $temp = $arr[0];
        for($i = 1; $i < count($arr); $i++){
            $temp -= $arr[$i];
        }
        return $temp;
    }

    function multiplication($arr){
        $temp = 1;
        foreach($arr as $value){
            $temp *= $value;
        }
        return $temp;
    }

    function division($arr) : float{
        $temp = $arr[0];
        for($i = 1; $i < count($arr); $i++){
            $temp /= $arr[$i];
        }
        return $temp;
    }


    $arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    echo '<pre>';
    echo print_r($arr);
    echo '</pre>';

    echo 'Sum of array: ' . array_reduce($arr, 'sum') . '<br>';
    echo 'Subtract of array: ' . subtract($arr) . '<br>';
    echo 'Multiplication of array: ' . multiplication($arr) . '<br>';
    echo 'Division of array: ' . division($arr) . '<br>';
    