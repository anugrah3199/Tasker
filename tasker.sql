-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 21 Sie 2019, 03:11
-- Wersja serwera: 5.6.39-83.1-cll-lve
-- Wersja PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `s010051_tasker`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE `projects` (
  `id` int(3) NOT NULL,
  `Full name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Short name` varchar(4) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id`, `Full name`, `Short name`) VALUES
(1, 'Focusite', 'FCST'),
(10, 'Tasker', 'TSKR'),
(11, 'eloxd', 'ELXD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE `tasks` (
  `id` int(3) NOT NULL,
  `project_short_name` varchar(4) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `project_task_num` int(3) NOT NULL,
  `task_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `task_desc` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id`, `project_short_name`, `project_task_num`, `task_name`, `task_desc`, `state`) VALUES
(29, 'FCST', 1, ' a', 'a', 4),
(30, 'FCST', 2, ' asdas', 'dasdas', 4),
(31, 'NTSX', 1, ' asdd', 'asdasdas', 1),
(32, 'NTSX', 2, ' xd', 'dx', 1),
(33, 'TSKR', 1, 'Walidacje przy dodawaniu projektu', '1.sprawdzaÄ‡ czy nie ma juÅ¼ w bazie takiej nazwy projektu(krÃ³tkiej teÅ¼).\r\n2. DodawaÄ‡ moÅ¼na tylko nazwy 2-4 literowe z CAPS LOCKIEM.', 4),
(34, 'TSKR', 2, ' OstylowaÄ‡ dodawanie projketu', '', 4),
(35, 'TSKR', 3, ' Dodaj/usun projekt - admin only', '', 1),
(36, 'TSKR', 4, ' task description - ostylowaÄ‡', '', 2),
(37, 'TSKR', 5, ' task panel - dodaÄ‡ opcje zmiany statusu\r\n', '', 1),
(38, 'ELXD', 1, ' DAS', 'DASDSA', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `login` varchar(16) CHARACTER SET latin1 NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 NOT NULL,
  `admin` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `admin`) VALUES
(1, 'michal', 'cygan6562', 'yes'),
(3, 'test', 'test123', 'no');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
