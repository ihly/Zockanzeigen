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
(5, 'Switch.jpg', 'Nintendo Switch Neu!!! Versende!', 299.00, 'Konsole', 'Switch'),
(6, 'rdr2.jpg', 'Red Dead Redemtion Neu Key', 75.00, 'PS4 Spiel', 'Red Dead'),
(7, 'fifa18.jpg', 'Fifa 18 versende das Spiel Originalverpackt', 30.00, 'PS4 Spiel', 'Fifa 18'),
(8, 'Goat.jpg', 'Ziegensimulator gratis versand', 900.00, 'PS4 Spiel', 'Goat <3'),
(9, 'Sims4.jpg', 'The Sims Spiel in Wörth', 35.00, 'PS4 Spiel', 'Sims 4'),
(10, 'TLOU.jpg', 'The Last of Us abholen in Pforzheim', 20.00, 'PS4 Spiel', 'Last of US'),
(11, 'AssassinsCreedOrigin.jpg', 'Assassins Creed Origin gebraucht', 45.00, 'X-BOX Spiel', 'AC Origin'),
(12, 'Battlefield1.jpg', 'Battlefield 1 kaum gespielt', 30.00, 'X-BOX Spiel', 'BF 1'),
(13, 'Battlefront2.jpg', 'Battlefront 2', 25.00, 'X-BOX Spiel', 'Battlefront 2'),
(14, 'Bo3.jpg', 'Black Ops 3 zu verkaufen', 18.00, 'X-BOX Spiel', 'BO 3'),
(15, 'Bo4.jpg', 'Black Ops 4 for Sale', 32.00, 'X-BOX Spiel', 'BO 4'),
(16, 'Fortnite.jpg', 'Fortnite gut erhalten', 26.00, 'X-BOX Spiel', 'Fortnite'),
(17, 'Forza_Horizon_4.jpg', 'Forza 4 :)', 50.00, 'X-BOX Spiel', 'Forza H 4'),
(18, 'Halo.jpg', 'Halo <3', 43.00, 'X-BOX Spiel', 'Halo'),
(19, 'HaloWars.jpg', 'Halo Wars <3', 40.00, 'X-BOX Spiel', 'Halo Wars'),
(20, 'Spiderman2.jpg', 'Spiderman2', 38.00, 'X-BOX Spiel', 'Spiderman 2'),
(21, 'Titanfall.jpg', 'Titanfall mit Exklusivinhalt', 30.00, 'X-BOX Spiel', 'Titanfall'),
(22, 'SNESBundle.jpg', '10 Verschiedene Spiele für die SNES siehe Grafik! Einfach melden per Mail!', 60.00, 'Nintendo Spiel', 'SNES Spiele'),
(23, '3DSBundle.jpg', '25 3DS Spiele alle funktionieren! Zum Abholen in Mainz', 140.00, 'Nintendo Spiel', '3DS Bundle'),
(24, 'Platin.jpg', 'Pokemon Platin Edition für den Nintendo DS, Versende auch gerne über aufpreis! Landau', 15.00, 'Nintendo Spiel', 'PKMN Platin'),
(25, 'MK8.jpg', 'Mario Kart für die Switch Preis VB! in Stuttgart zum abholen', 70.00, 'Nintendo Spiel', 'Mario Kart 8'),
(26, 'Sports.jpg', 'Wii Sports Resort für die Wii, wii kaputt spiel ganz.', 7.00, 'Nintendo Spiel', 'Wii Sports');

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
