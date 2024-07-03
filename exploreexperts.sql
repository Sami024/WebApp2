-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mei 2024 om 11:09
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
-- Database: `exploreexperts`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `ID` int(11) NOT NULL,
  `naam` varchar(50) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `soort` text DEFAULT NULL,
  `badkamer` int(11) DEFAULT NULL,
  `slaapkamers` int(11) DEFAULT NULL,
  `eten_drinken` int(11) DEFAULT NULL,
  `keuken` int(11) DEFAULT NULL,
  `internet` int(11) DEFAULT NULL,
  `foto1_bestand_locatie` text DEFAULT NULL,
  `foto2_bestand_locatie` text DEFAULT NULL,
  `foto3_bestand_locatie` text DEFAULT NULL,
  `foto4_bestand_locatie` text DEFAULT NULL,
  `foto5_bestand_locatie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`ID`, `naam`, `omschrijving`, `soort`, `badkamer`, `slaapkamers`, `eten_drinken`, `keuken`, `internet`, `foto1_bestand_locatie`, `foto2_bestand_locatie`, `foto3_bestand_locatie`, `foto4_bestand_locatie`, `foto5_bestand_locatie`) VALUES
(2, 'test_item', 'test_item', 'hotel', 3, 2, 1, 5, 2, '../IMG/test-1.jpg', '../IMG/test-2.jpg', '../IMG/test-3.jpg', '../IMG/test-4.jpg', '../IMG/test-5.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(20) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `wachtwoord` varchar(50) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `werknemer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
