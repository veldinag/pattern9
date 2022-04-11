<?php

    function linearSearch ($myArray, $num, &$counter) {
        $count = count($myArray);
        for ($i=0; $i < $count; $i++) {
            $counter++;
            if ($myArray[$i] == $num)
                return $i;
        }
        return null;
    }

    function binarySearch ($myArray, $num, &$counter) {
        $left = 0;
        $right = count($myArray) - 1;
        while ($left <= $right) {
            $counter++;
            $middle = floor(($right + $left) / 2);
            if ($myArray[$middle] == $num) {
                return $middle;
            } elseif ($myArray[$middle] > $num) {
                $right = $middle - 1;
            } elseif ($myArray[$middle] < $num) {
                $left = $middle + 1;
            }
        }
        return null;
    }

    function interpolationSearch($myArray, $num, &$counter) {
        $start = 0;
        $last = count($myArray) - 1;
        while (($start <= $last) && ($num >= $myArray[$start]) && ($num <= $myArray[$last])) {
            $pos = floor($start + ((($last - $start) / ($myArray[$last] - $myArray[$start])) * ($num - $myArray[$start])));
            $counter++;
            if ($myArray[$pos] == $num) {
                return $pos;
            }
            if ($myArray[$pos] < $num) {
                $start = $pos + 1;
            } else {
                $last = $pos - 1;
            }
        }
        return null;
    }

    $array = [
        2, 6, 7, 11, 15, 17, 26, 34, 35, 40,
        43, 47, 51, 55, 67, 69, 72, 77, 83, 88
    ];
    $num = 35;
    $i = 0;
    $j = 0;
    $k = 0;
    echo "Индекс элемента массива со значением " . $num . " - " . (linearSearch($array, $num, $i) ?: "элемент не найден") . ". <br>";
    echo "Произведено " . $i . " итераций.<br>";
    echo "Индекс элемента массива со значением " . $num . " - " . (binarySearch($array, $num, $j) ?: "элемент не найден") . ". <br>";
    echo "Произведено " . $j . " итераций.<br>";
    echo "Индекс элемента массива со значением " . $num . " - " . (interpolationSearch($array, $num, $k) ?: "элемент не найден") . ". <br>";
    echo "Произведено " . $k . " итераций.";