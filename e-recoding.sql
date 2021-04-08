-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 08 2021 г., 20:39
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
(2, 'Khmelnitskyi');

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
  `roomNamber` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `lastname`, `speciality_id`, `hospital_id`, `city_id`, `roomNamber`) VALUES
(1, 'Olga', 'Petrenko', 1, 2, 2, 10),
(2, 'Ivan', 'Nesterenko', 2, 1, 1, 11),
(3, 'Alisa', 'Mavz', 1, 1, 1, 15);

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
(1, 'Міська клінічна лікарня Sumy1111', 1),
(2, 'Міська клінічна лікарня Хм', 2),
(3, 'Міська клінічна лікарня Хм2222', 2),
(4, 'Міська клінічна лікарня Sumy2222', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `receptions`
--

CREATE TABLE `receptions` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Pk',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `doctor_id` int(10) UNSIGNED NOT NULL COMMENT 'Fk',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `receptions`
--

INSERT INTO `receptions` (`id`, `user_id`, `doctor_id`, `date`) VALUES
(4, 1, 1, '2021-05-10'),
(5, 1, 1, '2021-05-10'),
(6, 1, 1, '2021-05-10');

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
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_rep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `city_id`, `phone`, `email`, `pass`, `pass_rep`) VALUES
(1, 'Alexa', 'Glu', 1, '', '', '123', '123'),
(2, 'Alexa', 'Ala', 2, '', '', '111', '111');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
