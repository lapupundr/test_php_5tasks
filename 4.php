<?php

/**
 * Задача 5 Работа с файлами
 *
 * Напишите PHP-скрипт, который открывает файл "example.txt" для чтения, считывает его содержимое и выводит на экран.
 * Затем напишите функцию, которая открывает файл для записи и записывает в него новую строку.
 * Проверьте работу функции, вызвав ее и затем снова открыв файл для чтения и проверив, что новая строка была записана.
 */

function readAllFile($fileName): void
{
    $file = file_get_contents($fileName);
    echo $file;
}

function writeToFile($filename, $str): void
{
    $file = file_get_contents($filename);
    $file .= $str;
    file_put_contents($filename, $file);
}

readAllFile("test.txt");
writeToFile("test.txt", " Added new line.");
readAllFile("test.txt");

