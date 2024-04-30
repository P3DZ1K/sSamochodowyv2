-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 09:44 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wypozyczalnia_samochodow`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie_klienta` varchar(100) DEFAULT NULL,
  `nazwisko_klienta` varchar(100) DEFAULT NULL,
  `haslo_klienta` varchar(20) NOT NULL,
  `miasto_klienta` varchar(50) NOT NULL,
  `email_klienta` varchar(100) DEFAULT NULL,
  `telefon_klienta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie_klienta`, `nazwisko_klienta`, `haslo_klienta`, `miasto_klienta`, `email_klienta`, `telefon_klienta`) VALUES
(1, 'adam', 'Kowalski', 'qwerty', 'oswiecim', 'jan.kowalski@example.com', '+48123456789'),
(2, 'Anna', 'Nowak', 'qwerty', 'Brzezinka', 'anna.nowak@example.com', '+48234567890'),
(3, 'Piotr', 'Wiśniewski', 'qwerty', 'Warszawa', 'piotr.wisniewski@example.com', '+48345678901'),
(4, 'Maria', 'Dąbrowska', 'qwerty', 'Sosnowiec', 'maria.dabrowska@example.com', '+48456789012'),
(5, 'Andrzej', 'Lewandowski', 'qwerty', 'Mars', 'andrzej.lewandowski@example.com', '+48567890123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `rok_produkcji` int(11) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`id`, `marka`, `model`, `rok_produkcji`, `cena`) VALUES
(1, 'Toyota', 'Corolla', 2019, 25000.00),
(2, 'Ford', 'Focus', 2018, 22000.00),
(3, 'Honda', 'Civic', 2020, 27000.00),
(4, 'Volkswagen', 'Golf', 2017, 20000.00),
(5, 'BMW', '3 Series', 2021, 40000.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) DEFAULT NULL,
  `samochod_id` int(11) DEFAULT NULL,
  `data_transakcji` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `transakcje`
--

INSERT INTO `transakcje` (`id`, `klient_id`, `samochod_id`, `data_transakcji`) VALUES
(1, 1, 2, '2023-05-10'),
(2, 3, 4, '2023-06-15'),
(3, 2, 1, '2023-07-20'),
(4, 4, 5, '2023-08-25'),
(5, 5, 3, '2023-09-30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `samochod_id` (`samochod_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `transakcje_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id_klienta`),
  ADD CONSTRAINT `transakcje_ibfk_2` FOREIGN KEY (`samochod_id`) REFERENCES `samochody` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
