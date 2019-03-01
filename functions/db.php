<?php
$us = 'root';
$bd = array(
    array(
        'host' => 'localhost',
        'user' => $us,
        'password' => $us,
        'database' => array(
            array(
                'name' => 'kafe',
            ),
        ),
    ),
);
global $mysqli;
foreach ($bd as $item=>$key){
    if (isset($key['database'])) {
        if (is_array($key['database']) || is_object($key['database'])) {
            foreach ($key['database'] as $value) {
                /*echo '<pre>';
                print_r($value);
                echo '</pre>';                                           */
                if (isset($value['name'])) {
                    $base = $value['name'];
                }
                if (empty($mysqli)) {
                    $mysqli = mysqli_connect($key['host'], $key['user'], $key['password'], $base);
                    mysqli_set_charset($mysqli, 'UTF8');
                }
                if (mysqli_connect_errno()) {
                    echo 'ошибка в подключении к БД (' . mysqli_connect_errno() . ')' . mysqli_connect_error();
                }
            }

        }


    }
}