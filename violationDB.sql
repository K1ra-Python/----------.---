-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2023 г., 09:41
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `violationDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(115) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'copp', '1a1dc91c907325c69271ddf0c944bc72');

-- --------------------------------------------------------

--
-- Структура таблицы `approved`
--

CREATE TABLE `approved` (
  `id` int NOT NULL,
  `username` varchar(55) NOT NULL,
  `vi_de` varchar(659) NOT NULL,
  `c_s_n` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `approved`
--

INSERT INTO `approved` (`id`, `username`, `vi_de`, `c_s_n`, `login`, `email`) VALUES
(20, 'Маджима Горо', 'Уебки не хотят строить Камурочо Хилз', '9549439', 'gorogoro123', 'oneyeboi42@gmail.com'),
(21, 'Маджима Горо', 'Кирю-чан не хочет драться со мной ;c', '111999', 'gorogoro123', 'oneyeboi42@gmail.com'),
(23, 'Маджима Горо', '\"Сияющая Звезда\", номер \"ABC123\". Марка и номер второй машины - \"Быстрый Торнадо\", номер \"XYZ456\".\r\nСобытие происходит вечером на перекрестке улицы Солнечной и Проспекта Лунного света. Водитель \"Сияющей Звезды\" собирался проехать через перекресток, когда у него загорелся зеленый сигнал светофора.\r\nОднако, водитель \"Быстрого Торнадо\" решил не соблюдать красный светофор и прорвался через перекресток. В результате, машина \"Сияющей Звезды\" и \"Быстрого Торнадо\" столкнулись', '1234567', 'gorogoro123', 'oneyeboi42@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `complaints`
--

CREATE TABLE `complaints` (
  `ID` int NOT NULL,
  `car_state_num` varchar(115) NOT NULL,
  `violation_desc` varchar(601) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(115) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `complaints`
--

INSERT INTO `complaints` (`ID`, `car_state_num`, `violation_desc`, `username`, `login`, `email`) VALUES
(42, '696969', 'Точно не очередной тест', 'Маджима Горо', 'gorogoro123', 'oneyeboi42@gmail.com'),
(44, '1221312312', 'Вообщем дело было так и бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла, пиздец', 'Маджима Горо', 'gorogoro123', 'oneyeboi42@gmail.com'),
(45, 'фф', 'фыв', 'Маджима Горо', 'gorogoro123', 'oneyeboi42@gmail.com'),
(49, '99766754o87', 'Фаывпдбывьпбы. ФАЫлдьыаябчлфыаьфдл. ФЫДвфждалвыждлафжыдалыв. ФЫвааываывафыщвлщыф. ФЫЛвьфылаьль  :c', 'Маджима Горо', 'gorogoro123', 'oneyeboi42@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `nApproved`
--

CREATE TABLE `nApproved` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `vi_de` varchar(659) NOT NULL,
  `c_s_n` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `nApproved`
--

INSERT INTO `nApproved` (`id`, `username`, `vi_de`, `c_s_n`, `login`, `email`) VALUES
(12, 'Маджима Горо', 'Произошло конкретное нарушение! Меня опять затащили в клан Тодзё!', '123559876', 'gorogoro123', 'oneyeboi42@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `username` varchar(115) NOT NULL,
  `email` varchar(115) NOT NULL,
  `phonenum` varchar(115) NOT NULL,
  `login` varchar(115) NOT NULL,
  `password` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `phonenum`, `login`, `password`) VALUES
(15, 'Маджима Горо', 'oneyeboi42@gmail.com', '88005553535', 'gorogoro123', 'c33367701511b4f6020ec61ded352059'),
(16, 'Леха', 'maksimka.guchenko@mail.ru', '12345678901', 'lexazawr', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Шимано', 'shimanotiger02@gmail.com', '69696969691', 'shimano123', 'a8698009bce6d1b8c2128eddefc25aad');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `approved`
--
ALTER TABLE `approved`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `nApproved`
--
ALTER TABLE `nApproved`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `approved`
--
ALTER TABLE `approved`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `nApproved`
--
ALTER TABLE `nApproved`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
