-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2021 г., 20:34
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `price`) VALUES
(1, 'Партер', 1000),
(2, 'Бельэтаж', 500),
(3, 'Балкон', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `data_create`) VALUES
(2, 48, '2021-05-31'),
(3, 42, '2021-05-31'),
(5, 43, '2021-05-31'),
(8, 43, '2021-06-02'),
(9, 59, '2021-06-02'),
(10, 60, '2021-06-02'),
(11, 43, '2021-06-05');

-- --------------------------------------------------------

--
-- Структура таблицы `order_place`
--

CREATE TABLE `order_place` (
  `order_place_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_place`
--

INSERT INTO `order_place` (`order_place_id`, `order_id`, `place_id`) VALUES
(3, 2, 45),
(4, 2, 46),
(5, 2, 47),
(6, 3, 19),
(13, 5, 32),
(14, 5, 33),
(18, 8, 1),
(19, 8, 2),
(20, 8, 3),
(21, 9, 56),
(22, 9, 76),
(23, 9, 96),
(24, 9, 116),
(25, 10, 21),
(26, 10, 41),
(27, 10, 61),
(28, 10, 81),
(29, 10, 101),
(30, 11, 36),
(31, 11, 57),
(32, 11, 78),
(33, 11, 99),
(34, 11, 120);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_tel`, `password`, `role`) VALUES
(40, 'login', '3@1.com', '5555555555', '$2y$10$YYTwX0Jt/cQi533cnnL.ke8VmmvzqADLFsx3COMNGEP32YuhjaL8i', 'user'),
(41, 'olha', '1@1.com', '2222222222', '$2y$10$h54eqGDaBtDh92dWa21hDev5DilmXffvMr8RyTveTrLEzRHgUMUyO', 'admin'),
(42, 'trump', '2@1.com', '5555555555', '$2y$10$AFn1NMtc1MN4bBjOMaSufeSY5QMXJ6M2ELKA86TrlGp7pfUKqaq8y', 'user'),
(43, 'gepa', '4@1.com', '88888888888', '$2y$10$s18sAqkDPDU1yfx9HlXOUOINSnRPs6kBozSOAcJEviFjqLlumgLdq', 'user'),
(48, 'dopa', '5@1.com', '88888888888', '$2y$10$xg9CDb7A8uw0pGB5W541GuNAE5rztOfWjhLRCJAgpbKalPwduiVJu', 'user'),
(56, 'user', '11@1.com', '88888888888', '$2y$10$33l6gaI8BctsMdV2Csriy.KNUQ2rtoFB/b5S.N5qsISusECS52Bf6', 'user'),
(57, 'users', '111@1.com', '2222222222', '$2y$10$0Ggo9UDM7TruK0xOLcIzGuWy6YUyo9eDSSM2YLLqS69oWugzsCEfe', 'user'),
(58, 'trump', '8@1.com', '88888888888', '$2y$10$e5PgpKpZiImwJ0qx8YKsJuXStZka6LZOR8fzuP5MPpf4uFBL3T/Ja', 'user'),
(59, 'bayden', '18@1.com', '5555555555', '$2y$10$CQ9YSvGRaI3xd4bxZtatNeyyt9jeKfSil3JbS/gnl7DIJpdFwkp82', 'user'),
(60, 'Semen', '22@1.com', '1111111111', '$2y$10$ALxR4H3xCNXvLb5N7bOOseWqWmesy1CuJqMizIrZzFfLwh6N1s2h.', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `zal`
--

CREATE TABLE `zal` (
  `place_id` int(11) NOT NULL,
  `place_name` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zal`
--

INSERT INTO `zal` (`place_id`, `place_name`, `category_id`, `status`) VALUES
(1, 1, 1, '0'),
(2, 1, 1, '0'),
(3, 1, 1, '0'),
(4, 1, 1, '1'),
(5, 1, 1, '1'),
(6, 1, 1, '1'),
(7, 1, 1, '1'),
(8, 1, 1, '1'),
(9, 1, 1, '1'),
(10, 1, 1, '1'),
(11, 1, 1, '1'),
(12, 1, 1, '1'),
(13, 1, 1, '1'),
(14, 1, 1, '1'),
(15, 1, 1, '1'),
(16, 1, 1, '1'),
(17, 1, 1, '1'),
(18, 1, 1, '1'),
(19, 1, 1, '0'),
(20, 1, 1, '1'),
(21, 2, 1, '0'),
(22, 2, 1, '1'),
(23, 2, 1, '1'),
(24, 2, 1, '1'),
(25, 2, 1, '1'),
(26, 2, 1, '1'),
(27, 2, 1, '1'),
(28, 2, 1, '1'),
(29, 2, 1, '1'),
(30, 2, 1, '1'),
(31, 2, 1, '1'),
(32, 2, 1, '0'),
(33, 2, 1, '0'),
(34, 2, 1, '1'),
(35, 2, 1, '1'),
(36, 2, 1, '0'),
(37, 2, 1, '1'),
(38, 2, 1, '1'),
(39, 2, 1, '1'),
(40, 2, 1, '1'),
(41, 1, 2, '0'),
(42, 1, 2, '1'),
(43, 1, 2, '1'),
(44, 1, 2, '1'),
(45, 1, 2, '0'),
(46, 1, 2, '0'),
(47, 1, 2, '0'),
(48, 1, 2, '1'),
(49, 1, 2, '1'),
(50, 1, 2, '1'),
(51, 1, 2, '1'),
(52, 1, 2, '1'),
(53, 1, 2, '1'),
(54, 1, 2, '1'),
(55, 1, 2, '1'),
(56, 1, 2, '0'),
(57, 1, 2, '0'),
(58, 1, 2, '1'),
(59, 1, 2, '1'),
(60, 1, 2, '1'),
(61, 2, 2, '0'),
(62, 2, 2, '1'),
(63, 2, 2, '1'),
(64, 2, 2, '1'),
(65, 2, 2, '1'),
(66, 2, 2, '1'),
(67, 2, 2, '1'),
(68, 2, 2, '1'),
(69, 2, 2, '1'),
(70, 2, 2, '1'),
(71, 2, 2, '1'),
(72, 2, 2, '1'),
(73, 2, 2, '1'),
(74, 2, 2, '1'),
(75, 2, 2, '1'),
(76, 2, 2, '0'),
(77, 2, 2, '1'),
(78, 2, 2, '0'),
(79, 2, 2, '1'),
(80, 2, 2, '1'),
(81, 1, 3, '0'),
(82, 1, 3, '1'),
(83, 1, 3, '1'),
(84, 1, 3, '1'),
(85, 1, 3, '1'),
(86, 1, 3, '1'),
(87, 1, 3, '1'),
(88, 1, 3, '1'),
(89, 1, 3, '1'),
(90, 1, 3, '1'),
(91, 1, 3, '1'),
(92, 1, 3, '1'),
(93, 1, 3, '1'),
(94, 1, 3, '1'),
(95, 1, 3, '1'),
(96, 1, 3, '0'),
(97, 1, 3, '1'),
(98, 1, 3, '1'),
(99, 1, 3, '0'),
(100, 1, 3, '1'),
(101, 2, 3, '0'),
(102, 2, 3, '1'),
(103, 2, 3, '1'),
(104, 2, 3, '1'),
(105, 2, 3, '1'),
(106, 2, 3, '1'),
(107, 2, 3, '1'),
(108, 2, 3, '1'),
(109, 2, 3, '1'),
(110, 2, 3, '1'),
(111, 2, 3, '1'),
(112, 2, 3, '1'),
(113, 2, 3, '1'),
(114, 2, 3, '1'),
(115, 2, 3, '1'),
(116, 2, 3, '0'),
(117, 2, 3, '1'),
(118, 2, 3, '1'),
(119, 2, 3, '1'),
(120, 2, 3, '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_place`
--
ALTER TABLE `order_place`
  ADD PRIMARY KEY (`order_place_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Индексы таблицы `zal`
--
ALTER TABLE `zal`
  ADD PRIMARY KEY (`place_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_place`
--
ALTER TABLE `order_place`
  MODIFY `order_place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `zal`
--
ALTER TABLE `zal`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_place`
--
ALTER TABLE `order_place`
  ADD CONSTRAINT `order_place_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
