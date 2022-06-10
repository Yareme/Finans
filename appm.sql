-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Maj 2022, 17:48
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Baza danych: `appm`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aim`
--

CREATE TABLE `aim` (
  `id_aim` int(11) NOT NULL,
  `text_aim` text NOT NULL,
  `price_aim` float NOT NULL,
  `owned` float NOT NULL DEFAULT 0,
  `id_user` int(6) NOT NULL,
  `id_family` int(6) NOT NULL,
  `id_receipt` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `aim`
--

INSERT INTO `aim` (`id_aim`, `text_aim`, `price_aim`, `owned`, `id_user`, `id_family`, `id_receipt`) VALUES
(30, 'Komputer', 5000, 0, 76, 19, NULL),
(32, 'Samochod', 15000, 0, 76, 19, NULL),
(34, 'Klawiatura', 700, 50, 76, 19, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id_category` int(6) NOT NULL,
  `category_name` text NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `id_user`) VALUES
(261, 'Praca', 128),
(292, 'Praca', 76),
(293, 'Praca', 123),
(294, 'Jedzenie', 76),
(295, 'Inne', 76);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `id_expenses` int(11) NOT NULL,
  `name_item` text NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_category` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `expenses`
--

INSERT INTO `expenses` (`id_expenses`, `name_item`, `price`, `date`, `quantity`, `id_user`, `id_category`) VALUES
(32, 'Chleb', 7, '2022-04-22', 1, 76, 294),
(33, 'Planszówka', 700, '2022-04-22', 1, 76, 295),
(34, 'T', 93, '2022-04-22', 1, 76, 295);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `family`
--

CREATE TABLE `family` (
  `id_family` int(6) NOT NULL,
  `invite_code` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `family`
--

INSERT INTO `family` (`id_family`, `invite_code`) VALUES
(3, 111111111),
(19, 892073909),
(58, 333897468),
(67, 476021438),
(68, 283685738),
(69, 536869712),
(70, 308643203),
(71, 933806303);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `income`
--

CREATE TABLE `income` (
  `id_income` int(11) NOT NULL,
  `income` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(6) NOT NULL,
  `id_category` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `income`
--

INSERT INTO `income` (`id_income`, `income`, `date`, `id_user`, `id_category`) VALUES
(220, 2000, '2022-05-16', 128, 261),
(228, 2000, '2022-05-30', 76, 292);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `receipts`
--

CREATE TABLE `receipts` (
  `id_receipt` int(6) NOT NULL,
  `receipt` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(6) NOT NULL,
  `id_aim` int(11) NOT NULL,
  `id_family` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `receipts`
--

INSERT INTO `receipts` (`id_receipt`, `receipt`, `date`, `id_user`, `id_aim`, `id_family`) VALUES
(184, 33, '2022-05-29', 76, 34, 19),
(185, 7, '2022-05-29', 76, 34, 19),
(186, 3, '2022-05-30', 76, 34, 19),
(187, 5, '2022-05-30', 76, 34, 19),
(188, 2, '2022-05-30', 76, 34, 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `role_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `role_active`, `date_create`) VALUES
(3, 'admin', 1, '2022-04-08 22:41:09'),
(4, 'user', 1, '2022-04-08 22:41:09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_user`
--

CREATE TABLE `role_user` (
  `id_user` int(6) NOT NULL,
  `id_role` int(6) NOT NULL,
  `role_granted` datetime NOT NULL,
  `role_revoked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `role_user`
--

INSERT INTO `role_user` (`id_user`, `id_role`, `role_granted`, `role_revoked`) VALUES
(57, 3, '2022-04-08 22:41:16', '2022-04-08 22:41:16'),
(60, 4, '2022-04-08 22:41:16', '2022-04-08 22:41:16'),
(76, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 3, '2022-04-19 19:51:44', '2022-04-19 19:51:44'),
(123, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `login` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `balance` float NOT NULL DEFAULT 0,
  `id_family` int(6) NOT NULL,
  `who_create` int(6) DEFAULT NULL,
  `who_update` int(6) DEFAULT NULL,
  `when_modified` date NOT NULL,
  `when_created` date NOT NULL DEFAULT current_timestamp(),
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `login`, `name`, `password`, `balance`, `id_family`, `who_create`, `who_update`, `when_modified`, `when_created`, `email`) VALUES
(57, 'admin', 'admin', '123', 0, 3, NULL, NULL, '0000-00-00', '2022-04-08', 'v@gmal.com'),
(60, 'user', 'user', 'user', 0, 3, NULL, NULL, '0000-00-00', '2022-04-08', NULL),
(76, 'lokins', 'Valik', '123', 1150, 19, NULL, NULL, '0000-00-00', '2022-04-16', NULL),
(123, '123', '123', '123', 0, 67, NULL, NULL, '0000-00-00', '2022-05-02', NULL),
(124, '321', '321', '321', 0, 68, NULL, NULL, '0000-00-00', '2022-05-02', NULL),
(127, 'qwe', 'qwe', '123', 0, 68, NULL, NULL, '0000-00-00', '2022-05-02', NULL),
(128, 'k', 'K', '123', 2000, 19, NULL, NULL, '0000-00-00', '2022-05-03', NULL),
(129, 'rr', 'fdg', '1', 0, 58, NULL, NULL, '0000-00-00', '2022-05-12', NULL),
(130, 'lokins1', 'asd', '12', 0, 69, NULL, NULL, '0000-00-00', '2022-05-22', NULL),
(131, 'asd', 'lokins', '123', 0, 70, NULL, NULL, '0000-00-00', '2022-05-22', NULL),
(132, 'test', 'Test', '1', 0, 71, NULL, NULL, '0000-00-00', '2022-05-22', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aim`
--
ALTER TABLE `aim`
  ADD PRIMARY KEY (`id_aim`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_receipts` (`id_receipt`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `category_ibfk_1` (`id_user`);

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id_expenses`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeksy dla tabeli `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id_family`);

--
-- Indeksy dla tabeli `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id_income`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `income_ibfk_1` (`id_user`);

--
-- Indeksy dla tabeli `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id_receipt`),
  ADD KEY `receipts_ibfk_1` (`id_user`),
  ADD KEY `id_aim` (`id_aim`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeksy dla tabeli `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_ibfk_2` (`id_role`),
  ADD KEY `role_user_ibfk_1` (`id_user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `who_create` (`who_create`),
  ADD KEY `who_update` (`who_update`),
  ADD KEY `id_family` (`id_family`),
  ADD KEY `who_create_2` (`who_create`),
  ADD KEY `who_create_3` (`who_create`,`who_update`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `aim`
--
ALTER TABLE `aim`
  MODIFY `id_aim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT dla tabeli `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id_expenses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `family`
--
ALTER TABLE `family`
  MODIFY `id_family` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `income`
--
ALTER TABLE `income`
  MODIFY `id_income` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT dla tabeli `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id_receipt` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `aim`
--
ALTER TABLE `aim`
  ADD CONSTRAINT `aim_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Ograniczenia dla tabeli `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL;

--
-- Ograniczenia dla tabeli `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_family`) REFERENCES `family` (`id_family`) ON DELETE CASCADE;
COMMIT;