-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 17 Maj 2020, 18:47
-- Wersja serwera: 10.3.22-MariaDB-0+deb10u1
-- Wersja PHP: 7.3.14-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mkauto`
--

--
-- Tabela Truncate przed wstawieniem `settings`
--

TRUNCATE TABLE `settings`;
--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'address', 'ul. Polna 34\r\n49-666 Poznań', '2020-05-17 14:36:32', '2020-05-17 14:43:59'),
(2, 'telephone', '+48 32 252 08 84', '2020-05-17 14:36:32', '2020-05-17 14:43:59'),
(3, 'email', 'kierownik.dzialu.sprzedazy@kmauto.pl', '2020-05-17 14:52:40', '2020-05-17 14:43:59'),
(4, 'opentimes', 'Pon - Pt 10:00 - 18:00\r\nSobota 10:00 - 15:00\r\nW celu umówienia się w innych godzinach, prosimy o kontakt telefoniczny.', '2020-05-17 14:52:40', '2020-05-17 14:43:59'),
(5, 'slogan', 'Zakup auta u nas jest przyjemnością', '2020-05-17 16:39:50', '2020-05-17 14:43:59'),
(6, 'mainpagetext', 'KMAuto to mała, rodzinna firma, która od pokoleń zajmuje się sprzedażą samochodów. Przez ostatnie kilka lat działalności zdobyliśmy wielu klientów, którzy zawsze chętnie nas polecają. Dysponujemy szeroką gamą samochodów, wśród których, każdy znajdzie coś dla siebie.', '2020-05-17 16:39:50', '2020-05-17 14:43:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
