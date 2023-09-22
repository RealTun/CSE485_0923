<?php
    $a = [
        'a' => ['b' => 0,'c' => 1],
        'b' => ['e' => 2,'o' => ['b' => 3]]
       ];
    
    echo "". $a['a'];
    echo '<pre>';
    echo var_dump($a['a']);
    echo '</pre>'
?>