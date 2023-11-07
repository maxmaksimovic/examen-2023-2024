-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 1 november 2023 om 00:56
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `ID` int(2) NOT NULL,
  `Naam` varchar(30) NOT NULL,
  `Afdeling` varchar(30) NOT NULL,
  `Datum` varchar(50) NOT NULL,
  `Minutentelaat` varchar(30) NOT NULL,
  `Redentelaat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(1, 'Jesper', 'Development', '06-02-2023', '20', 'ik was mijn fiets sleutel thuis vergeten');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(2, 'Rosemarie', 'Support', '16-03-2023', '11', 'Had vanochtend een vertraging.');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(3, 'Isabella ', 'Office', '26-02-2023', '45', 'Ik was gister jarig en het werd nogal gezellig.');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(4, 'Jorik', 'Sales', '01-03-2023', '3', 'Ben vergeten mijn wekker te zetten');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(5, 'Josh', 'Support', '02-04-2023', '8', 'Mijn auto had een lekke band.');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(6, 'Pieter', 'Development', '18-04-2023', '15', 'Metro viel uit.');
INSERT INTO `medewerkers` (`ID`, `Naam`, `Afdeling`, `Datum`, `Minutentelaat`, `Redentelaat`) VALUES
(10, 'Janpieter', 'Sales', '02-04-2023', '10', 'hij stopt met lopen');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5564;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
