-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 30 2022 г., 17:42
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shops`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `NameProd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cost` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuantityOrWeightKG` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supermarket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `NameProd`, `Category`, `Cost`, `QuantityOrWeightKG`, `Country`, `id_supermarket`) VALUES
(1, 'Огурец', 'Овощи', '120', '3.5', 'Россия', 2),
(2, 'Помидор', 'Овощи', '190', '3.9', 'Россия', 2),
(3, 'Болгарка', 'Инструменты', '2000', '3', 'Болгария', 5),
(4, 'Шампунь', 'Гигиена', '156', '10', 'Швейцария', 2),
(5, 'Носки', 'Одежда', '199', '200', 'Беларусь', 1),
(6, 'Макбук', 'Девайсы', '190000', '10', 'США', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `supermarkets`
--

CREATE TABLE `supermarkets` (
  `id` int(11) NOT NULL,
  `NameSup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SizeInM3` int(11) NOT NULL,
  `DateOfFoundation` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `supermarkets`
--

INSERT INTO `supermarkets` (`id`, `NameSup`, `Adress`, `SizeInM3`, `DateOfFoundation`) VALUES
(1, 'Покупалко', 'Краснопресненская, дом 3, корпус 1', 12000, '12.03.2003'),
(2, 'Ашан', 'Университетский проспект, дом 107', 3000, '11.02.2012'),
(3, 'Радеж', 'Краснополянская, дом 107б', 300, '11.05.2021'),
(4, 'Ман', 'Невская, дом 5, корпус 2', 1130, '08.02.2009'),
(5, 'Лента', 'Университетский проспект, дом 105', 3400, '11.01.2012'),
(6, 'Покупалко', 'Краснопресненская, дом 3, корпус 1', 1200, '12.03.2003'),
(9, 'Вкуссвилл', 'Краснополянская, дом 5', 1200, '12.03.2001');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `FIOname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateOfBirthday` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sallary` double NOT NULL,
  `id_supermarket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `FIOname`, `DateOfBirthday`, `Gender`, `Sallary`, `id_supermarket`) VALUES
(1, 'Кузнецов Евгений Васильевич', '12.03.2001', 'М', 13000, 4),
(2, 'Брежнева Екатерина Давыдова', '01.01.2000', 'Ж', 19000, 1),
(3, 'Чертяева Мария Дмитриевна', '19.09.1978', 'Ж', 26000, 2),
(4, 'Потапов Дмитрий Андреевич', '11.01.1999', 'М', 29000, 4),
(5, 'Черкизова Рената Осипова', '22.02.2002', 'Ж', 67000, 1),
(6, 'Картофелев Яков Корнеевич', '01.12.2003', 'М', 28000, 5),
(7, 'Кузнецов Евгений Константинович', '12.11.2002', 'М', 14000, 2),
(9, 'Антейкина Гулия Зиковна ', '12.04.2000', 'Ж', 11000, 2),
(10, 'Антонов Антон Антонович', '11.01.2001', 'М', 15000, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supermarket` (`id_supermarket`);

--
-- Индексы таблицы `supermarkets`
--
ALTER TABLE `supermarkets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supermarket` (`id_supermarket`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `supermarkets`
--
ALTER TABLE `supermarkets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_supermarket`) REFERENCES `supermarkets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`id_supermarket`) REFERENCES `supermarkets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
