-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 jul 2024 om 13:12
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `isadmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `isadmin`) VALUES
(3, 'Sami@gmail.com', '1234', 1),
(5, 'senna', '1234', 1),
(6, 'senna123', '1234567890', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekingen`
--

CREATE TABLE `boekingen` (
  `boekid` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `reis_id` int(11) DEFAULT NULL,
  `betaald` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `boekingen`
--

INSERT INTO `boekingen` (`boekid`, `account_id`, `reis_id`, `betaald`) VALUES
(0, 4, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `email` text NOT NULL,
  `onderwerp` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`email`, `onderwerp`, `text`) VALUES
('sennavanzeeland@gmail.com', 'klacht', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recensies`
--

CREATE TABLE `recensies` (
  `recensie` text NOT NULL,
  `reis_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sterren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recensies`
--

INSERT INTO `recensies` (`recensie`, `reis_id`, `account_id`, `sterren`) VALUES
('top leuk mooi', 1, 4, 3),
('asdfg', 1, 4, 3),
('', 1, 4, 1),
('', 1, 5, 1),
('', 3, 5, 1),
('', 3, 5, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `id` int(11) NOT NULL,
  `land` text DEFAULT NULL,
  `preis` double DEFAULT NULL,
  `vertrekDatum` date DEFAULT NULL,
  `terugkomstDatum` date DEFAULT NULL,
  `isAdvert` int(11) DEFAULT NULL,
  `plaats` text DEFAULT NULL,
  `beschrijving` text DEFAULT NULL,
  `wc` int(11) DEFAULT NULL,
  `slaapkamers` int(11) DEFAULT NULL,
  `oppervlakte_woning` int(11) DEFAULT NULL,
  `handicap_vriendelijk` int(11) DEFAULT NULL,
  `recensies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`id`, `land`, `preis`, `vertrekDatum`, `terugkomstDatum`, `isAdvert`, `plaats`, `beschrijving`, `wc`, `slaapkamers`, `oppervlakte_woning`, `handicap_vriendelijk`, `recensies`) VALUES
(1, 'Nederland', 1260, '2024-08-22', '2024-09-22', 1, 'Amsterdam', 'Een maand vakantie in het mooie Amsterdam. Verken de grachten, de mooie huizen en krijg het oud hollandse gevoel.', 2, 3, 250, 0, ''),
(3, 'noorwegen', 80, '2025-08-21', '2026-08-21', 0, 'skål', 'een heel mooi hotel met uitzicht op de fjorden. met uitstekende activiteiten in de buurt.', 3, 3, 33, 1, ''),
(4, 'nederland', 1234, '2024-06-27', '2024-06-28', 1, 'bemmel', '', 2, 9, 2323, 0, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`boekid`);

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
