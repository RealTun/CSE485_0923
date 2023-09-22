<?php
    $keys = array(
        "field1" => "first",
        "field2" => "second",
        "field3" => "third"
    );
    
    $values = array(
        "field1value" => "dinosaur",
        "field2value" => "pig",
        "field3value" => "platypus"
    );
    
    $keysAndValues = array_combine(array_values($keys), array_values($values));
    echo '<pre>';
    echo print_r($keysAndValues);
    echo '</pre>';
?>