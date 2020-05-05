-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 05 2020 р., 21:42
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lab6`
--

-- --------------------------------------------------------

--
-- Структура таблиці `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `degree_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`) VALUES
(1, 'Бакалавр'),
(2, 'Доцент'),
(3, 'Професор');

-- --------------------------------------------------------

--
-- Структура таблиці `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`) VALUES
(2, 'ІФТКН'),
(1, 'ФПМ');

-- --------------------------------------------------------

--
-- Структура таблиці `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `salary` int(10) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `lecturers`
--

INSERT INTO `lecturers` (`id`, `first_name`, `last_name`, `surname`, `birthday`, `salary`, `faculty_id`, `degree_id`, `position_id`) VALUES
(1, 'Сергій', 'Косовчич', 'Орестович', '2000-01-07', 1000, 1, 1, 1),
(2, 'Михайло', 'Морараш', 'Михайлович', '1999-10-23', 1000000, 1, 1, 1),
(3, 'Віталій', 'Тумак', 'Віталійович', '2000-03-30', 5000, 1, 2, 1),
(4, 'Аліна', 'Корбутяк', 'Георгіївна', '1989-04-25', 10000, 1, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблиці `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `positions`
--

INSERT INTO `positions` (`id`, `position_name`) VALUES
(1, 'Доцент'),
(2, 'Студент');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `degree_name` (`degree_name`);

--
-- Індекси таблиці `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_name` (`faculty_name`);

--
-- Індекси таблиці `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Індекси таблиці `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position_name` (`position_name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  ADD CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `lecturers_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
