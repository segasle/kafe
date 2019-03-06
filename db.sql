-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 06 2019 г., 11:40
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `kade_louis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `header` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `img` text,
  `categories` int(11) NOT NULL,
  `head` text,
  `price2` float DEFAULT NULL,
  `weight2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `header`, `description`, `price`, `weight`, `img`, `categories`, `head`, `price2`, `weight2`) VALUES
(1, '«Милано»', 'колбаса пепперони, сыр «Моцарелла», говядина, лук, томаты черри, соус томати, огурцы, маслины', 500, NULL, 'pizza6.png', 7, NULL, NULL, NULL),
(2, '«Франческо»', 'ветчина, сыр «Моцарелла», грибы, соус сливочный', 460, NULL, 'pizza5.png', 7, NULL, NULL, NULL),
(3, '«Цезарь»', 'соус Цезарь, криное филе, сыр «Моцарелла», сыр «Пармезан», помидоры, салат «Айсберг»', 480, NULL, 'pizza4.png', 7, NULL, NULL, NULL),
(4, '«Венеция»', 'соус сливочный, курица, сыр «Моцарелла», грибы, томаты «черри», лук', 480, NULL, 'pizza3.png', 7, NULL, NULL, NULL),
(5, '«Маргарита»', 'соус томати, помидоры, сыр «Моцарелла»', 300, NULL, 'pizza1.png', 7, NULL, NULL, NULL),
(8, '«Фирменная»', 'соус «Цезарь», помидоры, грибы, ветчина, в/к колбаса, бекон, маслины', 550, NULL, 'pizza2.png', 7, NULL, NULL, NULL),
(9, '«Сальмоне»', 'лосось, сыр «Моцарелла», сыр« Филадельфия», томаты «черри» , сыр «пармезан», соус томатный, соус сливочный, кунжут', 620, NULL, 'pizza12.png', 7, NULL, NULL, NULL),
(10, '«Мексиканская»', 'бекон, сыр «моцарелла», фасоль в томатном соусе, соус томати, томаты «черри», авокадо, перец, табаско', 490, NULL, 'pizza11.png', 7, NULL, NULL, NULL),
(11, '«Четыре сыра»', 'сыр «Моцарелла», сыр «рокфор», сыр «Чеддер», сыр «Пармезан»', 500, NULL, 'pizzza10.png', 7, NULL, NULL, NULL),
(12, '«Каприоччиоза»', '\r\nветчина, сыр «Моцарелла», куриное филе, соус томати, помидоры, огурцы, маслины', 450, NULL, 'pizza9.png', 7, NULL, NULL, NULL),
(13, '«Баварская»', 'баварские колбаски, сыр «моцарелла», бекон, перец болгарский, помидоры, лук', 500, NULL, 'pizza8.png', 7, NULL, NULL, NULL),
(14, '«Вилаччи»', 'ветчина, сыр «Моцарелла», бекон, перец болгарский, грибы, соус томатни, лук', 480, NULL, 'pizza7.png', 7, NULL, NULL, NULL),
(15, '«Сырная тарелка »', 'сыр \"Пармезан\", сыр \"Рокфор\", сыр \"Чеддер\", сыр \"Моцарэлла\"', 400, 300, NULL, 10, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, 8, 'Черный чай', NULL, NULL),
(17, '«Индийский\"', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(18, '«PU-ERH»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(19, NULL, NULL, NULL, NULL, NULL, 8, 'Зеленый чай', NULL, NULL),
(20, '« с Жасмином»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(21, '« Тропика:Страсть»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(24, '« Молочный Улун»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(25, NULL, NULL, NULL, NULL, NULL, 8, 'Фруктовый чай', NULL, NULL),
(26, '«PINA-COLADA»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(27, '«клубника со сливками»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(28, '«Спелая вишня»', NULL, 120, NULL, NULL, 8, NULL, 150, NULL),
(29, NULL, NULL, NULL, NULL, NULL, 8, 'Кофе', NULL, NULL),
(30, 'Латте', NULL, 180, 200, NULL, 8, NULL, NULL, NULL),
(31, 'Капучино', NULL, 150, 200, NULL, 8, NULL, NULL, NULL),
(32, 'Раф', NULL, 150, 200, NULL, 8, NULL, NULL, NULL),
(33, 'Американо', NULL, 110, 150, NULL, 8, NULL, NULL, NULL),
(34, 'Эспрессо', NULL, 100, 30, NULL, 8, NULL, NULL, NULL),
(35, 'Глинтвейн', NULL, 120, 200, NULL, 8, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, 8, 'Закуски к пиву\r\n', NULL, NULL),
(37, 'Гренки чесночные', NULL, 100, 150, NULL, 8, NULL, NULL, NULL),
(38, 'Фисташки', NULL, 200, 100, NULL, 8, NULL, NULL, NULL),
(39, 'Картофель фри', NULL, 100, 200, NULL, 8, NULL, NULL, NULL),
(40, 'чипсы начос', NULL, 120, 150, NULL, 8, NULL, NULL, NULL),
(41, 'Картофель по-деревенски', NULL, 120, 200, NULL, 8, NULL, NULL, NULL),
(42, 'Наггетсы', NULL, 200, 200, NULL, 8, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, 9, 'Пиво', NULL, NULL),
(44, '«Разливное»', NULL, 100, 0.5, NULL, 9, NULL, 80, 0.33),
(45, '«В стекле»', NULL, 100, NULL, NULL, 9, NULL, 150, NULL),
(46, NULL, NULL, NULL, NULL, NULL, 10, 'Холодные закуски', NULL, NULL),
(47, '«Мясное ассорти \"', 'язык говяжий, \"буженина\", говядина', 250, 200, NULL, 10, NULL, NULL, NULL),
(48, '«Ассорти овощное\"', 'болгарский перец, огурцы, помидоры, редис, зеленый лук, петрушка, кинза', 250, 300, NULL, 10, NULL, NULL, NULL),
(49, '«Оливки, маслины(ассорти) »', NULL, 200, 200, NULL, 10, NULL, NULL, NULL),
(50, '«Рыбное ассорти \"', 'рыба Маслянная(белая) рыба с/с красная(Сёмга)', 350, 200, NULL, 10, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
