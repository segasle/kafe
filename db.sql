-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 21 2019 г., 13:26
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ca57629_log`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `datatime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `id_products` int(11) NOT NULL,
  `id_users` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `event` varchar(255) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `addition` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT '?page=',
  `catg` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `parent`, `link`, `catg`) VALUES
(1, 'Главная', 0, '?page=main', NULL),
(2, 'Мероприятия', 0, '?page=events', NULL),
(3, 'Отзывы', 0, '?page=comments', NULL),
(4, 'Контакты', 0, '?page=contacts', NULL),
(5, 'Вход', 1, '?page=input', NULL),
(6, 'Регистрация', 1, '?page=reg', NULL),
(7, 'Пицца', 2, '?page=pizza', 'pizza'),
(8, 'Горячите напитки ', 2, '?page=hot_drink', 'hot_drink'),
(9, 'Напитки', 2, '?page=drinks', 'drinks'),
(10, 'Холодные закуски и сэндвичи', 2, '?page=cold_appetizers_and_salads', 'cold_appetizers_and_salads'),
(11, 'Горячие блюда и пасты', 2, '?page=hot_dishes_and_pasta', 'hot_dishes_and_pasta'),
(12, 'Выпечка и десерты', 2, '?page=pastries_and_desserts', 'pastries_and_desserts'),
(13, 'Гарниры, закуски и соусы', 2, '?page=Side_dishes_snacks_and_sauces', 'Side_dishes_snacks_and_sauces'),
(14, 'Салаты и первые блюда', 2, '?page=Salads_and_first_courses', 'Salads_and_first_courses'),
(15, 'Моя информация', 3, '?page=myinfo', NULL),
(16, 'Контактная информация', 3, '?page=contactsinfo', NULL),
(17, 'Пароль', 3, '?page=passwordgo', NULL),
(18, 'Адресная книга', 3, '?page=addressbook', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `sms` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `email`, `phone`, `address`, `sms`) VALUES
(13, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 квартира 51', NULL),
(12, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 квартира 51', NULL),
(11, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 квартира 51', NULL),
(10, 'segasle@gmail.com', '+7(915)3301314', 'Кострово дом 22 квартира 51', NULL),
(14, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 квартира 51', NULL),
(15, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 ', NULL),
(16, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 ', NULL),
(17, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 ', NULL),
(18, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 ', NULL),
(19, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 ', NULL),
(20, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 55', NULL),
(21, 'segasle@gmail.com', '+7(915)3301314', 'костроао', NULL),
(22, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22 55', NULL),
(23, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22', NULL),
(24, 'segasle@gmail.com', '+7(915)3301314', 'кострово дом 22', NULL),
(25, 'segasle@gmail.com', '+7(915)3301314', 'костроао', NULL),
(26, 'segasle@gmail.com', '+7(915)3301314', 'segasle@gmail.com', 'оплата картой');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `img` text,
  `categories` int(11) NOT NULL,
  `head` text,
  `price2` float DEFAULT NULL,
  `weight2` float DEFAULT NULL,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`idd`, `header`, `description`, `price`, `weight`, `img`, `categories`, `head`, `price2`, `weight2`) VALUES
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
(50, '«Рыбное ассорти \"', 'рыба Маслянная(белая) рыба с/с красная(Сёмга)', 350, 200, NULL, 10, NULL, NULL, NULL),
(51, '«Лимон »', NULL, 60, 60, NULL, 10, NULL, NULL, NULL),
(52, '«Соленья »', 'черемша, чеснок, помидоры, огурцы', 300, 250, NULL, 10, NULL, NULL, NULL),
(53, '«Селёдочка под водочку\"', 'селёдка, картофель отварной, лук красный', 150, 180, NULL, 10, NULL, NULL, NULL),
(54, '«Говяжий язык с хреном \"', NULL, 350, 250, NULL, 10, NULL, NULL, NULL),
(55, '\"Клаб сэндвич с курицей\"', 'тосты, куринное филе, помидоры свежие, огурцы свежие, салат \"Айсберг\", бекон, яйцо, соус Цезарь, картофель фри', 350, 400, NULL, 10, NULL, NULL, NULL),
(56, '«Рулеты из Баклажанов»', 'баклажаны, сыр, чеснок, майонез, грецкий орех, укроп', 250, 250, NULL, 10, NULL, NULL, NULL),
(57, '«Рулеты из ветчины с сыром»', 'ветчина, сыр, чеснок, майонез, грецкий орех, укроп', 300, 250, NULL, 10, NULL, NULL, NULL),
(58, '«Тарталетки с икрой»', 'тарталетки(6 шт) икра, сливочная масло', 600, 250, NULL, 10, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL, 10, 'Сэндвичи', NULL, NULL),
(60, '«Клаб сэндвич с курицей»', 'тосты, куринное филе, помидоры свежие, огурцы свежие, салат \"Айсберг\", бекон, яйцо, соус Цезарь, картофель фри', 350, 400, NULL, 10, NULL, NULL, NULL),
(61, '«Клаб сэндвич с лососем»\r\n', 'тосты, лосось, авокадо, салат \"Романо\", огурцы свежие, сыр \"Креметта\", соус Цезарь, картофель фри', 370, 400, NULL, 10, NULL, NULL, NULL),
(62, '«Гамбургер»', 'Булка, котлета говяжья, лист салата, сыр Чеддер, помидор, огурец соленный, соус Цезарь', 150, NULL, NULL, 10, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL, NULL, 11, 'горячие блюда', NULL, NULL),
(64, '«Куриные крылышки в медово-соевом соусе\"', NULL, 230, 150, NULL, 11, NULL, NULL, NULL),
(65, '«Стейк Лосося»', 'лосось, соус Тартар', 550, 250, NULL, 11, NULL, NULL, NULL),
(66, '«Курица по-милански»', 'куриное филе, помидор, сыр Моцарелла', 250, 200, NULL, 11, NULL, NULL, NULL),
(67, '«Жульен с курицей»', 'лук репчатый, сыр Моцарелла, куринное филе, сливки', 150, 120, NULL, 11, NULL, NULL, NULL),
(68, '«Жульен с грибами\"', 'лук репчатый, сыр Моцарелла, шампиньоны, сливки', 150, 120, NULL, 11, NULL, NULL, NULL),
(69, '«Жульен с курицей и грибами»', 'лук репчатый, куриное филе, шампиньоны, сыр «Моцарелла», сливки', 170, 120, NULL, 11, NULL, NULL, NULL),
(70, '«Гречка с овощами»', 'гречка, шампиньоны, перец болгарский, кабачок, баклажан, соевый соус, кисло сладкий соус', 250, 200, NULL, 11, NULL, NULL, NULL),
(71, '«Наггетсы»', 'куринная грудка, панировочные сухари', 200, 6, NULL, 11, NULL, NULL, NULL),
(72, '«Мясо по-Французски»', 'свинина, сыр «Моцарелла», лук репчатый, майонез, помидор, шампиньоны', 300, 200, NULL, 11, NULL, NULL, NULL),
(73, '«Пельмешка по-Домашнему»', 'свинина, лук, специи, зелень, сыр, сметана', 250, 250, NULL, 11, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL, NULL, 11, 'Паста', NULL, NULL),
(75, '«Паста с грибами в сливочном соусе»', 'паста, куринное филе, грибы, соус сливочный, пармезан, чеснок', 350, 300, NULL, 11, NULL, NULL, NULL),
(76, 'Паста«Карбонара»', 'паста, бекон, сливочный соус, пармезан, желток\r\n', 320, 300, NULL, 11, NULL, NULL, NULL),
(77, 'Паста«Болоньезе»', 'паста, мясной фарш, сыр «Пармезан», томатный соус', 350, 300, NULL, 11, NULL, NULL, NULL),
(78, 'Паста «Сальмоне»', 'свежий лосось, сливочный соус, паста', 370, 300, NULL, 11, NULL, NULL, NULL),
(79, 'Кленовый пекан', NULL, 50, NULL, NULL, 12, NULL, NULL, NULL),
(80, 'Улитка с карамелью', NULL, 70, NULL, NULL, 12, NULL, NULL, NULL),
(81, 'Штрудель с яблоком и мороженным\r\n\r\n', NULL, 100, NULL, NULL, 12, NULL, NULL, NULL),
(82, 'Пончик с клубникой', NULL, 70, NULL, NULL, 12, NULL, NULL, NULL),
(83, 'Пончик с бананом\r\n\r\n', NULL, 70, NULL, NULL, 12, NULL, NULL, NULL),
(84, 'Маффин mini ванильный с шоколадом', NULL, 40, NULL, NULL, 12, NULL, NULL, NULL),
(85, 'Маффин ванильный с шоколадом\r\n\r\n', NULL, 50, NULL, NULL, 12, NULL, NULL, NULL),
(86, 'Эклер ванильный\r\n', NULL, 40, NULL, NULL, 12, NULL, NULL, NULL),
(87, 'Эклер шоколадный\r\n\r\n', NULL, 40, NULL, NULL, 12, NULL, NULL, NULL),
(88, 'Пирожок с мясом\r\n\r\n', NULL, 30, NULL, NULL, 12, NULL, NULL, NULL),
(89, 'Пирожок с капустой\r\n\r\n', NULL, 20, NULL, NULL, 12, NULL, NULL, NULL),
(90, 'Слойка с сыром\r\n\r\n', NULL, 30, NULL, NULL, 12, NULL, NULL, NULL),
(91, 'Венгерка с творогом', NULL, 30, NULL, NULL, 12, NULL, NULL, NULL),
(92, 'Булочка с яблоком\r\n\r\n', NULL, 20, NULL, NULL, 12, NULL, NULL, NULL),
(93, 'Блинчик с мясом\r\n\r\n', NULL, 30, NULL, NULL, 12, NULL, NULL, NULL),
(94, '«Тирамису»\r\n\r\n', NULL, 200, NULL, NULL, 12, NULL, NULL, NULL),
(95, '«Наполеон»\r\n\r\n', NULL, 200, NULL, NULL, 12, NULL, NULL, NULL),
(96, 'Блинчик с бананом и шоколадом\r\n\r\n', NULL, 150, NULL, NULL, 12, NULL, NULL, NULL),
(97, NULL, NULL, NULL, NULL, NULL, 13, 'Гарниры', NULL, NULL),
(98, 'Пюре', NULL, 70, 150, NULL, 13, NULL, NULL, NULL),
(99, 'Картофель по-деревенски', NULL, 120, 180, NULL, 13, NULL, NULL, NULL),
(100, 'Картофель Фри', NULL, 100, 150, NULL, 13, NULL, NULL, NULL),
(101, 'Рис', NULL, 70, 120, NULL, 13, NULL, NULL, NULL),
(102, 'Макароны', NULL, 80, 120, NULL, 13, NULL, NULL, NULL),
(103, 'Гречка с луком', NULL, 80, 150, NULL, 13, NULL, NULL, NULL),
(104, 'Гречка с грибами\r\n\r\n', NULL, 100, 200, NULL, 13, NULL, NULL, NULL),
(105, 'Овощи гриль', NULL, 250, 180, NULL, 13, NULL, NULL, NULL),
(106, NULL, NULL, NULL, NULL, NULL, 13, 'Закуски', NULL, NULL),
(107, 'Чипсы Начос', NULL, 120, 150, NULL, 13, NULL, NULL, NULL),
(108, 'Фисташки', NULL, 200, 100, NULL, 13, NULL, NULL, NULL),
(109, 'Арахис', NULL, 100, 100, NULL, 13, NULL, NULL, NULL),
(110, 'Гренких-Чесночные', '+ томатный соус', 100, 8, NULL, 13, NULL, NULL, NULL),
(111, NULL, NULL, NULL, NULL, NULL, 13, 'Соусы', NULL, NULL),
(112, 'Соус Сырный', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(113, 'Соус томатный', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(114, 'Соус Цезарь', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(115, 'Соус чесночный', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(116, 'Соус горчичный', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(117, 'Соус сметанный', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(118, NULL, 'Горчица\r\n', 30, NULL, NULL, 13, NULL, NULL, NULL),
(119, 'Кисло сладкий', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(120, 'Хрен', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(121, 'Сметана', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(122, 'Сгущенка', NULL, 30, NULL, NULL, 13, NULL, NULL, NULL),
(123, NULL, NULL, NULL, NULL, NULL, 14, 'Салаты', NULL, NULL),
(124, '«Цезарь с курицей»', 'салат \"Айсберг\", помидоры \"Черри\", куриное филе, яйцо перепелиное, сыр\"Пармезан \", гренки, соус \"Цезарь\"', 270, 250, NULL, 14, NULL, NULL, NULL),
(125, '«Цезарь с креветками»', 'салат \"Айсберг\", помидоры\"Черри\", креветки\"Королевские\", яйцо, сыр «Пармезан», гренки , соус «;Цезарь»', 300, 250, NULL, 14, NULL, NULL, NULL),
(126, '\r\n«Греческий»', '\r\nсыр \"Фета\", помидор, огурец, оливки, маслины, перец \"Болгарский\", лук красный', 200, 150, NULL, 14, NULL, NULL, NULL),
(127, '«Салат Морской»\r\n', 'Помидоры \"Черри\", перец \"Болгарский\", оливки, маслины, рукола, мидии, креветки, уксус бальзамический, кунжут, масло оливковое, авокадо, орехи кедровые', 300, 250, NULL, 14, NULL, NULL, NULL),
(128, '«Теплый салат в хлебной корзиночке»', 'шампиньоны, грудка куриная, лук репчатый, болгарский перец, кисло-сладкий соус', 250, 250, NULL, 14, NULL, NULL, NULL),
(129, '«Салат Кофетун»', '\r\nогурец солёный, свежий огурец, помидор, перец болгарский, филе куриное, гренки ржаные, кетчуп, майонез', 150, 180, NULL, 14, NULL, NULL, NULL),
(130, '«Салат Оливье»', 'картофель, курица, горошек зеленый, яйцо, огурец свежий, морковь,лук, майонез', 180, 200, NULL, 14, NULL, NULL, NULL),
(131, '«Салат Капрезе»', 'помидоры, сыр, Моцарелла, бализик, бальзамическиий уксус, соус Песто', 250, 180, NULL, 14, NULL, NULL, NULL),
(132, '« Овощной салат»\r\n', 'помидоры, огурцы, перец болгарский, зелень, масло оливковое\r\n', 150, 150, NULL, 14, NULL, NULL, NULL),
(133, NULL, NULL, NULL, NULL, NULL, 14, 'Первые блюда ', NULL, NULL),
(134, '«Крем-суп сливочно-грибной»', 'шампиньоны, лук репчатый, картофель, сливки, сыр «Пармезан», гренки', 150, 250, NULL, 14, NULL, NULL, NULL),
(135, '«Суп гороховый»\r\n', 'копчёные свиные ребра, картофель, горох, лук', 150, 250, NULL, 14, NULL, NULL, NULL),
(136, '«Суп харчо»', 'бульон говяжий, рис, лук, томаты, чеснок, специи, соус табаско', 150, 250, NULL, 14, NULL, NULL, NULL),
(137, '«Щи мясные»', 'бульон свиной, свежая капуста, картофель, морковь, лук, чеснок, специи', 120, 250, NULL, 14, NULL, NULL, NULL),
(138, '«Борщ по домашнему»', 'бульон мясной, лук репчатый, морковь, свекла, картофель, капуста, чеснок, зелень\r\n', 120, 250, NULL, 14, NULL, NULL, NULL),
(139, '«Рыбный»', '\r\nсемга, картофель, морковь, лук репчатый, специи', 120, 250, NULL, 14, NULL, NULL, NULL),
(140, '\r\n«Суп мясная солянка»', 'ассорти колбасное, свинина, курица, говядина, лимон, картофель, морковь, лук, маслины, оливки, огурец соленый, специи', 150, 250, NULL, 14, NULL, NULL, NULL),
(141, '«Суп с белыми грибами»', 'грибы белые, картофель, морковь, лук, специи\r\n', 150, 250, NULL, 14, NULL, NULL, NULL);

-- --------------------------------------------------------

INSERT INTO `comment` (`id`, `name`, `data`, `content`) VALUES
(3, 'Serg', '2018-11-09 14:11:57', 'Пиццы получаются вкусными ! Рекомендую всем посетить '),
(2, 'Sega', '2018-11-08 12:32:21', 'все вкусно '),
(4, 'Nika', '2018-11-11 18:03:28', 'Брали пиццу на вынос,приехали домой она горелая капец какая,и это уже не первый!Ребят исправляйте(((((('),
(5, 'Gevorg', '2018-11-28 20:33:52', 'Че пицца норм!');
--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `address`, `phone`) VALUES
(1, 'segasle@gmail.com', 'Сергей', '$2y$10$O2sFJ8u3REG0BYLnuRLTOuJs4ULulRdxlz9ysp/kxvRC7AKNyxzDq', 'Истра', '+7(915)5473712');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

