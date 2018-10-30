-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Okt 2018 um 12:39
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `image_upload` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `image_upload`;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `image_upload`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Konsole'),
(2, 'PS4 Spiel'),
(3, 'Nintendo Spiel'),
(4, 'X-BOX Spiel'),
(5, 'Sonstige');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL,
  `price` float DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`, `price`, `category`, `name`) VALUES
(1, 'PS4Projekt.jpg', '	PS4 leichte gebrauchsspuren in Durlach zum Abholen	', 180.00, 'Konsole', 'PS4 Karlsruhe'),
(2, 'XBOX.jpg','XBOX ONE gebraucht mit Controller in Etlingen zum Abholen', 150.00, 'Konsole', 'XBOX ONE'),
(3, 'NES.jpg','Alte Nintendo Konsole funktionsfähig! mit 30 Spielen und 2 Controlern',250.00,'Konsole','NES'),
(4, 'Nintendo.jpg','Nintendo DS Lite leichte gebrauchsspuren in Bruchsal', 75.00, 'Konsole', 'DS LITE' ),
(5, 'Switch.jpg', 'Nintendo Switch Neu!!! Versende!', 299.00, 'Konsole','Switch');

--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `passwort` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `plz` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`id`, `name`, `passwort`, `email`, `plz`) VALUES
(1, 'dfÃ¶dff', 'Ã¶jdfÃ¶gfg', 'dfdfd@web.de', 77746),
(2, 'dfÃ¶dff', 'Ã¶jdfÃ¶gfg', 'dfdfd@web.de', 77746),
(3, 'dfkÃ¶Ã¶Ã¤fd', 'dvÃ¤kfÃ¤gkfgf', 'khuk@web.de', 77746);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
