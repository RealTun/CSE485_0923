<?php
    $numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 
    65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

    function sumArray($arr){
        $temp = 0;
        foreach($arr as $value){
            $temp += $value;
        }
        return $temp;
    }

    $avg =  sumArray($numbers)/count($numbers);

    echo "Gia tri trung binh: " . $avg . '<br>';

    echo "Cac so co gia tri nho hon $avg: ";
    foreach($numbers as $values){
        if($values < $avg){
            echo $values . ' ';
        }
    }
    echo '<br>';

    echo "Cac so co gia tri lon hon $avg: ";
    foreach($numbers as $values){
        if($values > $avg){
            echo $values . ' ';
        }
    }
    echo '<br>';
?>