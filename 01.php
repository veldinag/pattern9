<?php

    // функция наполнения массива случайными числами

    function getArray($count) {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[$i] = rand(0, 10000);
        }
        return $result;
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
    // создадим массив из 10000 элементов

    $arr = getArray(10000);

    // сортировка пузырьком

    $start = microtime(true);
    $sortedArr = bubbleSort($arr);
    $end = microtime(true);
    $duration = $end - $start;
    echo "Сортировка пузырьком заняла " . $duration . " секунд.<br>";

    // шейкерная сортировка

    $start = microtime(true);
    $sortedArr = shakerSort($arr);
    $end = microtime(true);
    $duration = $end - $start;
    echo "Шейкерная сортировка заняла " . $duration . " секунд.<br>";

    // быстрая сортировка

    $start = microtime(true);
    quickSort($arr);
    $end = microtime(true);
    $duration = $end - $start;
    echo "Быстрая сортировка заняла " . $duration . " секунд.<br>";

    // шейкерная сортировка занимает самое долгое время в итоге, примерно в 2 раза медленнее пузырьковой
    // быстрая сортировка примерно в 300 раз быстрее пузырьковой и в 600 раз быстрее шейкерной

