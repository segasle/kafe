<?php
global $title;
if (basename($_SERVER['REQUEST_URI']) == '?page=main') {
    $title = 'Главная страница о акциях, скидках';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=pizza') {
    $title = 'Пицца';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=cold_appetizers_and_salads') {
    $title = 'Холодные закуски и сэндвичи';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=cold_dishes_and_pasta') {
    $title = 'Холодные блюда и паста';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=contacts') {
    $title = 'Контакты';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=drinks') {
    $title = 'Напитки';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=hot_dishes_and_pasta') {
    $title = 'Горячие блюда и пасты';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=hot_drink') {
    $title = 'Горячие напитки';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=input') {
    $title = 'Авторизация';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=pastries_and_desserts') {
    $title = 'Выпечка и десерты';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=reg') {
    $title = 'Регистрация';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=Salads_and_first_courses') {
    $title = 'Салаты и первые блюда';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=Side_dishes_snacks_and_sauces') {
    $title = 'Гарниры, закуски и соусы';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=404') {
    $title = 'Ошибка';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=comments') {
    $title = 'Отзывы';
}