<?php

    // функция наполнения массива случайными числами

    function getArray($count) {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[$i] = rand(0, 100);
        }
        return $result;
    }

    function printArr($array) {
        for ($i = 0; $i < count($array); $i++) {
            echo $array[$i] . ", ";
        }
        echo "<br>";
    }

    // функция пузырьковой сортировки

    function bubbleSort($array) {
        for($i = 0; $i < count($array); $i++) {
            $count = count($array);
            for ($j = $i + 1; $j < $count; $j++) {
                if($array[$i] > $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $temp;
                }
            }
        }
        return $array;
    }

    // функция шейкерной сортировки

    function shakerSort($array) {
        $n = count($array);
        $left = 0;
        $right = $n - 1;
        do {
            for ($i = $left; $i < $right; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
                }
            }
            $right -= 1;
            for ($i = $right; $i > $left; $i--) {
                if ($array[$i] < $array[$i - 1]) {
                    list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
                }
            }
            $left += 1;
        } while ($left <= $right);
        return $array;
    }

    // функции быстрой сортировки

    function quickSort(&$array) {
        $left = 0;
        $right = count($array) - 1;
        qSort($array, $left, $right);
    }

    function qSort(&$arr, $low, $high) {
        $i = $low;
        $j = $high;
        $middle = $arr[(int)($low + $high) / 2];
        do {
            while ($arr[$i] < $middle) ++$i;
            while ($arr[$j] > $middle) --$j;
            if ($i <= $j) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++;
                $j--;
            }
        } while ($i < $j);
        if ($low < $j) {
            qSort($arr, $low, $j);
        }
        if ($i < $high) {
            qSort($arr, $i, $high);
        }
    }

    $arr = getArray(30);
    echo "Несортированный массив<br>";
    printArr($arr);
    $bubbleSortedArr = bubbleSort($arr);
    $shakerSortArr = shakerSort($arr);
    quickSort($arr);
    echo "Массив, отсортированный пузырьковой сортировкой<br>";
    printArr($bubbleSortedArr);
    echo "Массив, отсортированный шейкерной сортировкой<br>";
    printArr($shakerSortArr);
    echo "Массив, отсортированный быстрой сортировкой<br>";
    printArr($arr);