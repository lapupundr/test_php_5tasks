<?php

/**
 * Задача 3. Работа с массивами
 *
 * Напишите функцию PHP, которая принимает массив чисел и возвращает их сумму.
 */

function arraySum($array_number)
{
    $result_sum = 0;

    foreach ($array_number as $item) {
        $result_sum += $item;
    }

    return $result_sum;
}

echo arraySum([2, 4, 77, 43, 543, 331]);

