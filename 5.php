<?php

/**
 * Задача 5 Работа с сессиями
 *
 * Используя API https://bezkassira.by/api/activity/categoryList/ "Список главных категорий"
 * с auth_key=05f8b6c1d960664e2bbab30d0cdf9865aa00a6ac94f251d7563b7b51ada8b334
 * напишите PHP-скрипт, который делает GET-запрос к API и выводит на экран все главные категории в столбик.
 *
 * Каждый раз, когда происходит обращение к API, его счетчик посещений должен увеличиваться.
 * Выведите на экран количество обращений к API пользователя.
 * Количество всех категорий сохранить в сессионной переменной и в cookies с именем "count_category"
 *
 */

session_start();
$_SESSION['api_cont'] = 0;

function getContent($url, $key)
{
    $content = file_get_contents($url . '?' . $key);
    $jsonString = preg_replace('/(\w+):/', '"$1":', $content);
    $array = json_decode($jsonString, true);
    //    print_r("<pre>");
    //    print_r($array);
    $countCategory = 0;
    foreach ($array as $subarray) {
        echo '<br />' . $subarray['type_name'];
        $countCategory ++;
    }
    $_COOKIE['count_category'] = $countCategory;
    $_SESSION['api_cont'] ++;
}

getContent(
    'https://bezkassira.by/api/activity/categoryList/',
    'auth_key=05f8b6c1d960664e2bbab30d0cdf9865aa00a6ac94f251d7563b7b51ada8b334'
);

    echo $_SESSION['api_cont'];
    echo $_COOKIE['count_category'];

