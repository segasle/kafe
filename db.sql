-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 03 2019 г., 14:02
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
  `data` datetime NOT NULL,
  `addition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT '?page='
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `parent`, `link`) VALUES
(1, 'Главная', 0, '?page=main'),
(2, 'Мероприятия', 0, '?page=events'),
(3, 'Отзывы', 0, '?page=comments'),
(4, 'Контакты', 0, '?page=contacts'),
(5, 'Вход', 1, '?page=input'),
(6, 'Регистрация', 1, '?page=reg'),
(7, 'Пицца', 2, '?page=pizza'),
(8, 'Горячите напитки ', 2, '?page=hot_drink'),
(9, 'Напитки', 2, '?page=drinks'),
(10, 'Холодные закуски и сэндвичи', 2, '?page=cold_appetizers_and_salads'),
(11, 'Горячие блюда и пасты', 2, '?page=hot_dishes_and_pasta'),
(12, 'Выпечка и десерты', 2, '?page=pastries_and_desserts'),
(13, 'Гарниры, закуски и соусы', 2, '?page=Side_dishes_snacks_and_sauces'),
(14, 'Салаты и первые блюда', 2, '?page=Salads_and_first_courses');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `weight` float DEFAULT NULL,
  `img` text,
  `categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `weight`, `img`, `categories`) VALUES
(1, '«Милано»', 'колбаса пепперони, сыр «Моцарелла», говядина, лук, томаты черри, соус томати, огурцы, маслины', 500, NULL, 'pizza6.png', 7),
(2, '«Франческо»', 'ветчина, сыр «Моцарелла», грибы, соус сливочный', 460, NULL, 'pizza5.png', 7),
(3, '«Цезарь»', 'соус Цезарь, криное филе, сыр «Моцарелла», сыр «Пармезан», помидоры, салат «Айсберг»', 480, NULL, 'pizza4.png', 7),
(4, '«Венеция»', 'соус сливочный, курица, сыр «Моцарелла», грибы, томаты «черри», лук', 480, NULL, 'pizza3.png', 7),
(5, '«Маргарита»', 'соус томати, помидоры, сыр «Моцарелла»', 300, NULL, 'pizza1.png', 7),
(8, '«Фирменная»', 'соус «Цезарь», помидоры, грибы, ветчина, в/к колбаса, бекон, маслины', 550, NULL, 'pizza2.png', 7),
(9, '«Сальмоне»', 'лосось, сыр «Моцарелла», сыр« Филадельфия», томаты «черри» , сыр «пармезан», соус томатный, соус сливочный, кунжут', 620, NULL, 'pizza12.png', 7),
(10, '«Мексиканская»', 'бекон, сыр «моцарелла», фасоль в томатном соусе, соус томати, томаты «черри», авокадо, перец, табаско', 490, NULL, 'pizza11.png', 7),
(11, '«Четыре сыра»', 'сыр «Моцарелла», сыр «рокфор», сыр «Чеддер», сыр «Пармезан»', 500, NULL, 'pizzza10.png', 7),
(12, '«Каприоччиоза»', '\r\nветчина, сыр «Моцарелла», куриное филе, соус томати, помидоры, огурцы, маслины', 450, NULL, 'pizza9.png', 7),
(13, '«Баварская»', 'баварские колбаски, сыр «моцарелла», бекон, перец болгарский, помидоры, лук', 500, NULL, 'pizza8.png', 7),
(14, '«Вилаччи»', 'ветчина, сыр «Моцарелла», бекон, перец болгарский, грибы, соус томатни, лук', 480, NULL, 'pizza7.png', 7);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
