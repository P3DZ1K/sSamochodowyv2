-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 03, 2024 at 09:39 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssamochodowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_samochodu`
--

CREATE TABLE `dane_samochodu` (
  `id_dane_samochodu` int(11) NOT NULL,
  `zdjecie_dane_samochodu` varchar(100) NOT NULL,
  `kolor_dane_samochodu` varchar(100) NOT NULL,
  `opis_dane_samochodu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `dane_samochodu`
--

INSERT INTO `dane_samochodu` (`id_dane_samochodu`, `zdjecie_dane_samochodu`, `kolor_dane_samochodu`, `opis_dane_samochodu`) VALUES
(1, './images/samochód4.jfif', 'Black', 'BMW xD is modern and versatile, perfect for both city drives and off-road adventures. Its deep black color adds elegance and strength. It offers a spacious interior with plenty of room for passenger'),
(2, './images/samochód2.jfif', 'Blue', 'BMW LEWUS is compact and agile, perfect for city driving. Its vibrant blue color catches the eye and gives it a modern look. It excels in tight parking spots while offering comfort and fuel efficiency'),
(3, './images/samogód3.1.jfif', 'Black', 'BMW LOLEK is elegant and spacious, perfect for long trips and daily commutes. Its deep black color exudes class and sophistication. It offers a comfortable ride with plenty of room for passengers and ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie_klienta` varchar(100) DEFAULT NULL,
  `haslo_klienta` varchar(32) NOT NULL,
  `miasto_klienta` varchar(50) NOT NULL,
  `telefon_klienta` varchar(20) DEFAULT NULL,
  `zdjecie_klienta` int(1) NOT NULL,
  `pu_klienta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie_klienta`, `haslo_klienta`, `miasto_klienta`, `telefon_klienta`, `zdjecie_klienta`, `pu_klienta`) VALUES
(5, 'admin', 'abd0720380fb476cf3e1b95686e9c7b1', 'wawa', '767 678 658', 2, 1),
(6, 'dad', '028d46eb3e274fe15202dc4f7cec2cbf', 'da', '21', 2, 0),
(7, 'lol', '1c12f9956b2e32586345defa8db809b5', 'lol', '123', 2, 0),
(8, 'test', 'bed3d7727ee166d6043e494d0d86b735', 'osiwecim', '123123123', 3, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id_samochodu` int(11) NOT NULL,
  `model_samochodu` varchar(100) DEFAULT NULL,
  `typ_nadwozia_samochodu` varchar(100) DEFAULT NULL,
  `rok_produkcji` date DEFAULT NULL,
  `cena_samochodu` decimal(10,2) DEFAULT NULL,
  `id_dane_samochodu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`id_samochodu`, `model_samochodu`, `typ_nadwozia_samochodu`, `rok_produkcji`, `cena_samochodu`, `id_dane_samochodu`) VALUES
(6, 'xD', 'SUV', '0000-00-00', 1234.00, 1),
(7, 'LEWUS', 'Small car', '2024-05-15', 9612.00, 2),
(8, 'LOLEK', 'SEDAN', '2024-05-15', 12912.00, 3);

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
(26, 5, 7, '2024-05-29'),
(29, 5, 7, '2024-05-29'),
(31, 8, 6, '2024-05-29'),
(38, 5, 7, '2024-05-29');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_samochodu`
--
ALTER TABLE `dane_samochodu`
  ADD PRIMARY KEY (`id_dane_samochodu`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id_samochodu`),
  ADD KEY `id_dane_samochodu` (`id_dane_samochodu`);

--
-- Indeksy dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `samochod_id` (`samochod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dane_samochodu`
--
ALTER TABLE `dane_samochodu`
  MODIFY `id_dane_samochodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `samochody`
--
ALTER TABLE `samochody`
  MODIFY `id_samochodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `samochody`
--
ALTER TABLE `samochody`
  ADD CONSTRAINT `samochody_ibfk_1` FOREIGN KEY (`id_dane_samochodu`) REFERENCES `dane_samochodu` (`id_dane_samochodu`);

--
-- Constraints for table `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `transakcje_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id_klienta`),
  ADD CONSTRAINT `transakcje_ibfk_2` FOREIGN KEY (`samochod_id`) REFERENCES `samochody` (`id_samochodu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
