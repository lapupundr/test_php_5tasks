<?php

/**
 * Задача 2 Работа со строками
 *
 * Есть некоторая переменная $number.
 * Как умножить ее на 9 без использования оператора умножения "*" ?
 */

function multiplicationNumber($number)
{
    $result_number = 0;

    for ($i = 1; $i <= 9; $i++) {
        $result_number += $number;
    }

    return $result_number;
}

echo multiplicationNumber(33);

