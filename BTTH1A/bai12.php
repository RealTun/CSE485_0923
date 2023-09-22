<?php

use function PHPSTORM_META\map;

    $numbers = [
        'key1' => 12, 
        'key2' => 30, 
        'key3' => 4, 
        'key4' => -123, 
        'key5' => 1234, 
        'key6' => -12565, 
    ];

    // Lấy ra phần tử đầu tiên, phần tử cuối cùng trong mảng trên
    //  Tìm số lớn nhất, số nhỏ nhất, tổng các giá trị từ mảng trên
    //  Sắp xếp mảng theo chiều tăng, giảm các giá trị
    //  Sắp xếp mảng theo chiều tăng, giảm các key

    $sum = array_reduce($numbers, function($carry, $value) {
        return $carry + $value;
    });
    echo "Phần tử đầu tiên: {$numbers['key1']}, phần tử cuối cùng: {$numbers['key6']} <br>";
    echo "Số lớn nhất: " . max($numbers) . ", số nhỏ nhất: " . min($numbers). ", tổng mảng: " . $sum . '<br>';


    $arrAsc = array_map(function($value) use ($numbers){
        return $numbers[$value];
    }, array_keys($numbers));

    echo '<pre>';
    print_r($arrAsc);
    echo '</pre>';
?>