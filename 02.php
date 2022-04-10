<?php

    function printArr($array) {
        foreach ($array as $item)
            echo $item . " ";
        echo "<br>";
    }

    function delElem($array, $value) {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] == $value) {
                unset($array[$i]);
            }
        }
        return $array;
    }

    $array = [10, 5, 34, 10, 56, 3, 5, 82, 34, 21, 48, 25, 38];
    echo "Исходный массив: <br>";
    printArr($array);
    $delValue = 34; // удаляем элементы массива с таким значением
    echo "Массив, в котором удилили все элементы со значением: " . $delValue . ":<br>";
    $newArray = delElem($array, $delValue);
    printArr($newArray);