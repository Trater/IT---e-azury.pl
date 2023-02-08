-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lut 2023, 21:17
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `it`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `images_img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `users_user_id`, `images_img_id`) VALUES
(2, 11, 40),
(3, 11, 35),
(4, 11, 21),
(5, 11, 25),
(7, 11, 19),
(8, 11, 17),
(9, 12, 35),
(10, 12, 40),
(11, 12, 39),
(12, 12, 19),
(13, 12, 17),
(14, 12, 44),
(15, 13, 21),
(16, 13, 23),
(17, 13, 26),
(18, 13, 28),
(19, 13, 19),
(20, 13, 17),
(21, 13, 43),
(22, 13, 42),
(23, 11, 36),
(24, 11, 37),
(32, 10, 21);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `img_filename` varchar(255) NOT NULL,
  `img_uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  `img_status` enum('1','0') NOT NULL DEFAULT '1',
  `img_category` enum('po','w','r','n','pi','z') NOT NULL,
  `img_subcategory` enum('b','wi','j') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `images`
--

INSERT INTO `images` (`img_id`, `img_title`, `img_filename`, `img_uploaded`, `img_status`, `img_category`, `img_subcategory`) VALUES
(13, 'R7. Sztylety', 'r7.png', '2022-11-10 23:53:57', '1', 'n', NULL),
(14, 'R8. Geometryczny', 'r8.png', '2022-11-10 23:54:05', '1', 'n', NULL),
(15, 'R9. Pajęczyna', 'r9.png', '2022-11-10 23:54:12', '1', 'n', NULL),
(16, 'L1. Viktorian', 'L1.png', '2022-11-10 23:55:35', '1', 'pi', NULL),
(17, 'L2. Kwadraty', 'L2.png', '2022-11-10 23:55:41', '1', 'pi', NULL),
(18, 'L3. Kamienie', 'L3.png', '2022-11-10 23:55:48', '1', 'pi', NULL),
(19, 'L4. Plecionka', 'L4.png', '2022-11-10 23:55:54', '1', 'pi', NULL),
(21, '1. Aztekan', 'aztekan.png', '2022-11-10 23:56:38', '1', 'po', NULL),
(22, '50. Renifery', 'chris.png', '2022-11-10 23:56:45', '1', 'po', 'b'),
(23, '3. Diana', 'diana.png', '2022-11-10 23:56:51', '1', 'po', NULL),
(24, '4. Eastern', 'east.png', '2022-11-10 23:56:57', '1', 'po', 'wi'),
(25, '5. Jesienne', 'liscie.png', '2022-11-10 23:57:03', '1', 'po', 'j'),
(26, '6. Ombre', 'ombre.png', '2022-11-10 23:57:20', '1', 'po', NULL),
(28, '7. Rodo', 'rodo.png', '2022-11-10 23:57:34', '1', 'po', NULL),
(30, 'W10. Sztylety', 'w10.png', '2022-11-10 23:57:50', '1', 'r', NULL),
(31, 'W11. Geometryczny', 'w11.png', '2022-11-10 23:57:56', '1', 'r', NULL),
(32, 'W12. Pajęczyna', 'w12.png', '2022-11-10 23:58:04', '1', 'r', NULL),
(33, 'W13. Maroko', 'w13.png', '2022-11-10 23:58:09', '1', 'r', NULL),
(34, 'W14. Fantazy', 'w14.png', '2022-11-10 23:58:15', '1', 'r', NULL),
(35, 'W1. Viktorian', 'w1.png', '2022-11-10 23:59:05', '1', 'w', NULL),
(36, 'W2. Barok', 'w2.png', '2022-11-10 23:59:11', '1', 'w', NULL),
(37, 'W3. Pierścienie', 'w3.png', '2022-11-10 23:59:17', '1', 'w', NULL),
(38, 'W4. Nuvo', 'w4.png', '2022-11-10 23:59:24', '1', 'w', NULL),
(39, 'W5. Koła', 'w5.png', '2022-11-10 23:59:30', '1', 'w', NULL),
(40, 'W6. Kwadraty', 'w6.png', '2022-11-10 23:59:35', '1', 'w', NULL),
(42, 'H1.', 'H1.png', '2022-11-11 00:00:15', '1', 'z', NULL),
(43, 'H2.', 'H2.png', '2022-11-11 00:00:22', '1', 'z', NULL),
(44, 'H3.', 'H3.png', '2022-11-11 00:00:28', '1', 'z', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rating`
--

CREATE TABLE `rating` (
  `rating_number` int(11) NOT NULL,
  `rating_submitted` datetime NOT NULL DEFAULT current_timestamp(),
  `rating_id` int(11) NOT NULL,
  `images_img_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `rating`
--

INSERT INTO `rating` (`rating_number`, `rating_submitted`, `rating_id`, `images_img_id`, `users_user_id`) VALUES
(1, '2022-12-15 11:43:31', 1, 21, 10),
(0, '2022-12-15 14:43:41', 2, 22, 10),
(0, '2022-12-15 14:44:47', 3, 35, 10),
(1, '2022-12-15 14:44:48', 4, 36, 10),
(1, '2022-12-15 14:44:56', 5, 31, 10),
(1, '2022-12-15 14:44:57', 6, 34, 10),
(-1, '2022-12-15 14:45:01', 7, 33, 10),
(0, '2022-12-15 14:47:49', 8, 24, 10),
(0, '2022-12-15 14:47:56', 9, 25, 10),
(0, '2022-12-15 14:51:30', 10, 17, 10),
(0, '2022-12-15 14:51:35', 11, 19, 10),
(0, '2022-12-15 17:05:05', 12, 26, 10),
(0, '2022-12-15 17:15:38', 13, 21, 11),
(0, '2022-12-15 17:15:39', 14, 22, 11),
(1, '2022-12-15 17:21:39', 15, 26, 11),
(1, '2022-12-15 17:21:40', 16, 25, 11),
(1, '2023-01-03 18:43:19', 17, 17, 11),
(1, '2023-01-03 19:25:12', 18, 17, 11),
(-1, '2023-01-03 21:43:19', 19, 37, 10),
(1, '2023-01-03 21:57:36', 20, 39, 10),
(1, '2023-01-03 21:57:37', 21, 40, 10),
(1, '2023-01-17 13:23:35', 22, 42, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Block',
  `user_role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1-admin|0-user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created`, `user_status`, `user_role`) VALUES
(10, 'admin', 'admin@admin.com', '$2y$10$NXDZGbsg4GvShfVRs2NVfeRfsyQK.qmCnUrH5n9pPUI5RxReyBLe.', '2022-12-02 21:51:53', 1, 1),
(11, 'asasdsa', 'asdasas@gmail.com', '$2y$10$wq3/RUySG67mBujmhgb9jOo/kAB6RhAybNaR0F6oNbbPLusub/9DK', '2022-12-02 21:53:19', 1, 0),
(12, 'asdasasdasd', 'asdcsa@ascbkj.pl', '$2y$10$g9HC2g8FDr1cnrtuqe/qlOOUThYhikxPMUso65NHRfzjIcAl6aT8e', '2022-12-02 21:54:41', 1, 0),
(13, 'bhcaknj', 'ihbcds@bcask.pl', '$2y$10$DVaASbeVIiw5mUUTcx8Pd.Tl13k61axk0eytRAxJb6tFbzTUa1YEu', '2022-12-02 21:55:57', 1, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `favourite_images` (`images_img_id`),
  ADD KEY `favourite_users` (`users_user_id`);

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indeksy dla tabeli `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_images` (`images_img_id`),
  ADD KEY `rating_users` (`users_user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_images` FOREIGN KEY (`images_img_id`) REFERENCES `images` (`img_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_images` FOREIGN KEY (`images_img_id`) REFERENCES `images` (`img_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
