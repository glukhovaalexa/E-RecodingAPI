-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 27 2021 г., 21:16
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `e-recoding`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Sumy'),
(2, 'Khmelnitskiy'),
(3, 'Lviv'),
(4, 'Kharkiv');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `speciality_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `hospital_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `city_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `roomNumber` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `lastname`, `speciality_id`, `hospital_id`, `city_id`, `roomNumber`) VALUES
(1, 'Olga', 'Petrenko', 1, 2, 2, 10),
(2, 'Ivan', 'Nesterenko', 2, 1, 1, 11),
(3, 'Alisa', 'Mavz', 1, 3, 3, 15),
(4, 'Lina', 'Kostenko', 3, 4, 4, 3),
(5, 'Valentina', 'Todorenko', 1, 1, 1, 29),
(6, 'Lina', 'Kostenko', 3, 4, 4, 3),
(7, 'Valentina', 'Petrenko', 1, 1, 1, 5),
(8, 'Margaret', 'Tetcher', 2, 2, 2, 57),
(9, 'Igor', 'Martenko', 3, 3, 3, 61),
(10, 'Petro', 'Nesterenko', 2, 2, 2, 46),
(11, 'Valentin', 'Ostrovskiy', 3, 3, 3, 74),
(12, 'Maks', 'Bevz', 2, 4, 4, 105),
(13, 'Oleksandra', 'Fedina', 3, 4, 4, 68),
(14, 'Mark', 'Emelianov', 2, 4, 4, 73),
(15, 'Oleksandr', 'Shufer', 3, 4, 4, 17),
(16, 'Katerina', 'Vasilenko', 3, 1, 1, 95),
(17, 'Katerina', 'Shevchenko', 1, 4, 4, 0),
(18, 'Gerashcenko', 'Anton', 3, 1, 1, 40),
(19, 'Irina', 'Martenko', 1, 4, 4, 45);

-- --------------------------------------------------------

--
-- Структура таблицы `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `name` varchar(255) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `city_id`) VALUES
(1, 'Міська клінічна лікарня м.Суми', 1),
(2, 'Обласна лікарня м.Хмельницький', 2),
(3, 'Лабораторія м.Львів', 3),
(4, 'Міська клінічна лікарня м.Харків', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `receptions`
--

CREATE TABLE `receptions` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `doctor_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `name` varchar(255) NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `hospital_id`) VALUES
(1, 'Dantist', 1),
(2, 'Hirurg', 2),
(3, 'Terapevt', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality_id` (`speciality_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
