-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 17 2024 г., 11:51
-- Версия сервера: 5.7.27-30-log
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `officeinf3_rep`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `fio`, `phone`, `email`) VALUES
(1, 'sfsd', '+7 (342) 342-42', 'fsdf@sdf.ru'),
(2, 'sfsd', '+7 (342) 342-42', 'fsdf@sdf.ru'),
(3, 'sfsd', '+7 (342) 342-42', 'fsdf@sdf.ru'),
(4, 'sfsd', '+7 (342) 342-42', 'fsdf@sdf.ru'),
(5, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(6, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(7, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(8, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(9, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(10, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(11, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(12, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(13, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(14, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(15, 'Test', '+7 (888) 888-88', 'tttt@mail.ru'),
(16, 'tttt', '+7 (999) 999-99', 'dfdf@gg.ru'),
(17, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(18, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(19, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(20, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(21, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(22, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(23, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(24, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(25, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(26, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(27, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(28, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(29, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(30, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(31, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(32, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(33, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(34, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(35, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(36, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(37, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(38, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(39, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(40, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(41, '12', '+7 (999) 999-99', 'dsd@sdf.ru'),
(42, 'Тест', '+7 (999) 999-99', 'test@mail.ru'),
(43, 'Testt', '+7 (888) 888-88', 'ddd@ddf.ru'),
(44, 'FF', '+7 (345) 345-35', 'dfg@fdg.ru'),
(45, 'fvf', '+7 (355) 353-45', 'gdfg@dg.ru'),
(46, 'Tess', '+7 (222) 222-22', 'ffff@fff.ru'),
(47, 'Вова', '+7 (999) 208-58', 'example@mail.ru'),
(48, 'Тест 13.06', '+7 (905) 277-33', 'emaxple@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `token`) VALUES
(1, 'admin', '7ef2a0b3987a39e06d5d83f5121acd20');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
