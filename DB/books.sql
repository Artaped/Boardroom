-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2019 г., 06:58
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
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointmens`
--

CREATE TABLE `appointmens` (
  `id` int(11) NOT NULL,
  `notes_event` varchar(255) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `long_event` enum('0','1') DEFAULT NULL,
  `room_event` enum('1','2','3') NOT NULL,
  `create_date` datetime NOT NULL,
  `mark` tinyint(11) NOT NULL,
  `mark_long` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`) VALUES
(1, 'Dima', '300175@mail.ru'),
(2, 'Mawa', '300175@mail.ru'),
(9, 'Zorro', 'qwe@asw.ko'),
(14, 'boris', '3001751@mail.ru'),
(40, 'test1', '300171115@mail.ru'),
(41, 'Harrison Ford', '300175@mail.ruswer');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointmens`
--
ALTER TABLE `appointmens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointmens`
--
ALTER TABLE `appointmens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
