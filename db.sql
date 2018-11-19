-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 19 2018 г., 07:22
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `kade_louis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `name`, `data`, `content`) VALUES
(1, 'Sega', '2018-11-09 09:17:11', 'hyjhgfdvcds'),
(2, 'Sega', '2018-11-09 13:16:57', 'RTRTRTRTYUI'),
(3, 'Sega', '2018-11-09 13:45:49', 'RTRTRTRTYUI'),
(4, 'Sega', '2018-11-09 13:49:55', 'RTRTRTRTYUI'),
(5, '3trtyuyt', '2018-11-14 16:28:02', 'erttyuytyuiuytyuio'),
(6, '12', '2018-11-14 16:32:48', '1233'),
(7, '12', '2018-11-14 16:45:38', 'wertyuioiuo\r\n'),
(8, '', '2018-11-14 17:02:54', ''),
(9, '', '2018-11-14 17:04:50', ''),
(10, '', '2018-11-14 17:04:52', ''),
(11, '', '2018-11-14 17:05:02', ''),
(12, '677', '2018-11-14 17:06:30', '1212213'),
(13, '234', '2018-11-14 18:49:31', '3457889--8767'),
(14, '8899', '2018-11-14 18:51:46', '34543234324323'),
(15, '678', '2018-11-14 18:55:14', '4566565443'),
(16, 'укуув', '2018-11-15 13:28:21', 'паваквуввы'),
(17, 'укуув', '2018-11-15 13:31:28', 'паваквуввы'),
(18, 'цуваупп', '2018-11-15 13:32:13', 'паваааваа'),
(19, 'апкреапкапаивм', '2018-11-18 19:06:53', 'hghhbgfvgbvfdfvcdcvv'),
(20, '<br /><b>Notice</b>:  Undefined index: name in <b>/Applications/MAMP/htdocs/php-projects/kafe_louis/events.php</b> on line <b>7</b><br />', '2018-11-18 19:43:41', 'eevfdddsds');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `event` varchar(255) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `surname`, `phone`, `event`, `rooms`, `data`) VALUES
(1, 'Сергей', 'Слепенков', '89153301314', 'день рождения', 'закрытый', '2018-11-23 00:00:00'),
(2, 'Сергей', 'Слепенков', '89153301314', 'день рождения', 'закрытый', '2018-11-23 00:00:00'),
(3, 'ret', 'ttffgvv', '54354e65', '53rert', 'derrew1', '2018-11-14 04:23:00');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(10) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `parent`, `link`) VALUES
(1, 'Главная', 0, 'main');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `img` text NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`) VALUES
(11, 'segasle@gmail.com', 'Sega', '81e7b5a3eb92b0d58d16b56509d2f2a1'),
(12, 'segaslesegasle@gmail.comgmail.comtkyyr', '', '623b177c933ed897256db4a99fa91530');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
