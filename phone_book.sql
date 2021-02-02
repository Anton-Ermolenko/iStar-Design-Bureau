-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2021 г., 10:07
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `istar_design_bureau`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phone_book`
--

CREATE TABLE `phone_book` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `dob` date DEFAULT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone_book`
--

INSERT INTO `phone_book` (`id`, `name`, `surname`, `email`, `dob`, `phone`) VALUES
(5, 'name', 'ddd', NULL, NULL, '0123456700, +380631234567, '),
(6, 'name123', 'aaa', NULL, NULL, '0123456700, '),
(7, 'Антон', 'zzz', NULL, NULL, '0123456780, ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `phone_book`
--
ALTER TABLE `phone_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `phone_book`
--
ALTER TABLE `phone_book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
