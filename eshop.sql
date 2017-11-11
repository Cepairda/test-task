-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 11 2017 г., 16:27
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Фэнтези'),
(2, 'Боевик'),
(3, 'Триллер'),
(4, 'Детектив'),
(5, 'Приключения'),
(6, 'Драма'),
(7, 'Комедия'),
(8, 'Фантастика'),
(9, 'Ужасы');

-- --------------------------------------------------------

--
-- Структура таблицы `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 5, 2),
(7, 2, 2),
(8, 1, 2),
(9, 6, 2),
(10, 1, 3),
(11, 6, 3),
(12, 7, 4),
(13, 6, 5),
(14, 7, 5),
(15, 3, 6),
(16, 6, 6),
(17, 2, 7),
(18, 9, 7),
(19, 8, 7),
(20, 1, 7),
(21, 5, 7),
(22, 3, 8),
(23, 4, 8),
(24, 6, 9),
(25, 7, 9),
(26, 1, 10),
(27, 5, 10),
(28, 7, 10),
(29, 2, 11),
(30, 3, 11),
(31, 4, 11),
(32, 4, 12),
(33, 5, 12),
(34, 6, 12),
(35, 1, 12),
(36, 2, 12),
(37, 3, 13),
(38, 8, 13),
(39, 1, 14),
(40, 2, 14),
(41, 5, 14),
(42, 6, 14),
(44, 2, 15),
(45, 1, 15),
(47, 2, 15),
(48, 2, 15),
(49, 1, 15),
(50, 8, 15),
(51, 2, 15),
(52, 6, 16),
(53, 7, 16),
(54, 5, 16),
(55, 3, 17),
(56, 6, 17),
(57, 8, 17),
(58, 1, 18),
(59, 5, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'no-image.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `provider_id`, `name`, `price`, `img`) VALUES
(1, 1, 'Великая стена', 555, '1.jpg'),
(2, 1, 'Белоснежка и Охотник 2', 7, '2.jpg'),
(3, 1, 'Голос Монстра', 4, '3.jpg'),
(4, 1, 'Полтора шпиона', 9, '4.jpg'),
(5, 1, 'Обыкновенный мир', 12, '5.jpg'),
(6, 1, 'Под покровом ночи', 15, '6.jpg'),
(7, 2, 'Тёмная башня', 3, '7.jpg'),
(8, 2, 'Инферно', 17, '8.jpg'),
(9, 2, 'Алоха', 7, '9.jpg'),
(10, 2, 'Монстры на каникулах 2', 14, '10.jpg'),
(11, 2, 'Зелёный Шершень', 8, '11.jpg'),
(12, 2, 'Орудия смерти: Город костей', 12, '12.jpg'),
(13, 3, 'Бегущий по лезвию 2049 (2017)', 20, '13.jpg'),
(14, 3, 'Меч короля Артура', 18, '14.jpg'),
(15, 3, 'Кинг Конг: Остров черепа', 16, '15.jpg'),
(16, 3, 'Пока не сыграл в ящик ', 18, '16.jpg'),
(17, 3, 'Я - легенда', 15, '17.jpg'),
(18, 3, 'Фантастические твари и где они обитают', 10, '18.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `provider`
--

INSERT INTO `provider` (`id`, `name`) VALUES
(1, 'Universal Studios'),
(2, 'Sony Pictures Entertainment'),
(3, 'Warner Bros. Pictures');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
