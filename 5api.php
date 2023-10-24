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
if (!isset($_SESSION['api_count'])) {
    $_SESSION['api_count'] = 1;
} else {
    $_SESSION['api_count']++;
}

/**
 * @param $url
 * @param $keys
 * @return void
 *
 * Connect to the API and get information.
 */
function getContent($url, $keys)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($keys));
    $response = curl_exec($ch);
    $data = json_decode($response, true);
    curl_close($ch);

    $count_category = 0;
    foreach ($data as $arr) {
        if (isset($arr['type_name'])) {
            echo('<br />' . $arr['type_name']);
            $count_category++;
        }
    }
    $_COOKIE['count_category'] = $count_category;
    $_SESSION['count_category'] = $count_category;
}

$options = [
    'auth_key' => '05f8b6c1d960664e2bbab30d0cdf9865aa00a6ac94f251d7563b7b51ada8b334',
];

getContent('https://bezkassira.by/api/activity/categoryList/', $options);

echo '<br />' . 'Количество обращений к API: ' . $_SESSION['api_count'];
echo '<br />' . 'Количество всех категорий: ' . $_COOKIE['count_category'];

