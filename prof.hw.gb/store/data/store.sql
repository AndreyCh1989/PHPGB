-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Окт 07 2019 г., 02:31
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `user`, `order_id`) VALUES
(48, 'onlmjppsqdhfe4m94aedmd2urv4juti2', 41, 1, 11),
(49, 'vbv9h8vr5es3cu4ki3qml2thl5qf6gck', 42, 1, 11),
(50, 'vbv9h8vr5es3cu4ki3qml2thl5qf6gck', 42, 1, 11),
(51, 'vbv9h8vr5es3cu4ki3qml2thl5qf6gck', 46, 1, 11),
(52, 'vbv9h8vr5es3cu4ki3qml2thl5qf6gck', 42, 1, 13),
(54, 'vbv9h8vr5es3cu4ki3qml2thl5qf6gck', 42, 1, 14),
(55, 'vfu80odmfnijmfjco9lchrcqqaghnfni', 41, 2, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `email`, `status`, `user`, `name`, `total`) VALUES
(11, 'andreychernykh@me.com', 1, 1, 'Comp', 686.23),
(14, 'ew@wer.ru', 0, 1, 'Max', 10),
(15, 'chek201@mail.ru', 2, 2, 'Qqq', 123.23);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`) VALUES
(41, 'Ботиночки', '123.23', 'Белые с черной полоской', '\\1.jpg'),
(42, 'Ботиночки', '10.00', 'Красные', '\\1.jpg'),
(43, 'Ботиночки', '432.00', 'Синие', '\\1.jpg'),
(44, 'Ботиночки', '654.00', 'Зеленые', '\\1.jpg'),
(45, 'Ботиночки', '222.00', NULL, '\\1.jpg'),
(46, 'Ботиночки', '543.00', NULL, '\\1.jpg'),
(47, 'Ботиночки', '333.00', NULL, '\\1.jpg'),
(48, 'Ботиночки', '54.00', NULL, '\\1.jpg'),
(49, 'Ботиночки', '63.00', NULL, '\\1.jpg'),
(50, 'Ботиночки', '11.00', NULL, '\\1.jpg'),
(51, 'Ботиночки', '23.00', NULL, '\\1.jpg'),
(52, 'Ботиночки', '534.00', NULL, '\\1.jpg'),
(53, 'Ботиночки', '236.00', NULL, '\\1.jpg'),
(54, 'Ботиночки', '6346.00', NULL, '\\1.jpg'),
(55, 'Ботиночки', '457.00', NULL, '\\1.jpg'),
(56, 'Ботиночки', '456.00', NULL, '\\1.jpg'),
(57, 'Ботиночки', '33.00', NULL, '\\1.jpg'),
(58, 'Ботиночки', '66.00', NULL, '\\1.jpg'),
(59, 'Ботиночки', '444.00', NULL, '\\1.jpg'),
(60, 'Ботиночки', '111.00', NULL, '\\1.jpg'),
(61, 'Ботиночки', '123.23', 'Белые с черной полоской', '\\1.jpg'),
(62, 'Ботиночки', '10.00', 'Красные', '\\1.jpg'),
(63, 'Ботиночки', '432.00', 'Синие', '\\1.jpg'),
(64, 'Ботиночки', '654.00', 'Зеленые', '\\1.jpg'),
(65, 'Ботиночки', '222.00', NULL, '\\1.jpg'),
(66, 'Ботиночки', '543.00', NULL, '\\1.jpg'),
(67, 'Ботиночки', '333.00', NULL, '\\1.jpg'),
(68, 'Ботиночки', '54.00', NULL, '\\1.jpg'),
(69, 'Ботиночки', '63.00', NULL, '\\1.jpg'),
(70, 'Ботиночки', '11.00', NULL, '\\1.jpg'),
(71, 'Ботиночки', '23.00', NULL, '\\1.jpg'),
(72, 'Ботиночки', '534.00', NULL, '\\1.jpg'),
(73, 'Ботиночки', '236.00', NULL, '\\1.jpg'),
(74, 'Ботиночки', '6346.00', NULL, '\\1.jpg'),
(75, 'Ботиночки', '457.00', NULL, '\\1.jpg'),
(76, 'Ботиночки', '456.00', NULL, '\\1.jpg'),
(77, 'Ботиночки', '33.00', NULL, '\\1.jpg'),
(78, 'Ботиночки', '66.00', NULL, '\\1.jpg'),
(79, 'Ботиночки', '444.00', NULL, '\\1.jpg'),
(80, 'Ботиночки', '111.00', NULL, '\\1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `is_admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `is_admin`) VALUES
(1, 'admin', '$2y$10$1JhpxaubN7MTNl14NhKUvejpEMVoBt6t2iMl5CVCoa1IO6VutsgQK', '2440326265d9a7891b249c2.16376740', 1),
(2, 'user', '$2y$10$1JhpxaubN7MTNl14NhKUvejpEMVoBt6t2iMl5CVCoa1IO6VutsgQK', '7085276925d9a793f27fec7.02840287', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `product_idx` (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
