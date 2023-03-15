-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2023 г., 18:34
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `credits_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `credits`
--

CREATE TABLE `credits` (
  `id` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `debt` int(255) NOT NULL,
  `accountNumber` int(255) NOT NULL,
  `tariffId` int(255) NOT NULL,
  `isClosed` tinyint(1) NOT NULL,
  `percent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `credits`
--

INSERT INTO `credits` (`id`, `balance`, `ownerId`, `debt`, `accountNumber`, `tariffId`, `isClosed`, `percent`) VALUES
(1, 100, 10, 5, 8470, 1, 0, 50),
(2, 91, 2, 34, 9724972, 1, 0, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id`, `name`, `percent`, `balance`, `date`) VALUES
(1, 'Tariff', 50, 100, NULL),
(2, 'Tariff2', 10, 10000, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
