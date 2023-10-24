<?php

/**
 * Задача 1 Создание функции для определения четности числа
 *
 * Напишите функцию PHP, которая принимает массив чисел и строк в качестве аргумента и
 * выводит на экран строку "Четное", если число четное, строку "Нечетное", если число нечетное,
 * и строку "Undefined" для других вариантов, если такие существую.
 * Функция вызвращает количество четных чисел
 */

function checkEvenNumber($array_str)
{
    $count_even_number = 0;

    foreach ($array_str as $item) {
        if (is_numeric($item)) {
            if ($item % 2 === 0) {
                echo " Четное число: " . $item;
                $count_even_number ++;
            } else {
                echo  " Нечетное число: " . $item;
            }
        } else {
            echo " Undefined";
        }
    }

    return $count_even_number;
}

echo " Количество четных чисел: " . checkEvenNumber([1, 2, '32', 43, 'fe', 1111, 44]);

