-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Nov 2018 um 17:57
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
(1, 'Alle'),
(2, 'PS4 Spiel'),
(3, 'Nintendo Spiel'),
(4, 'X-BOX Spiel'),
(5, 'Sonstige'),
(6, 'Konsole');

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
  `name` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`, `price`, `category`, `name`, `email`) VALUES
(1, 'PS4Projekt.jpg', '	PS4 leichte gebrauchsspuren in Durlach zum Abholen	', 180, 'Konsole', 'PS4 Karlsruh', 'bernd.honig@web.de'),
(2, 'XBOX.jpg', 'XBOX ONE gebraucht mit Controller in Etlingen zum Abholen', 150, 'Konsole', 'XBOX ONE', 'karmen.geiz@web.de'),
(3, 'NES.jpg', 'Alte Nintendo Konsole funktionsfähig! mit 30 Spielen und 2 Controlern', 250, 'Konsole', 'NES', 'karmen.geiz@web.de'),
(4, 'Nintendo.jpg', 'Nintendo DS Lite leichte gebrauchsspuren in Bruchsal', 75, 'Konsole', 'DS LITE', 'i.huber@gmail.com'),
(5, 'Switch.jpg', 'Nintendo Switch Neu!!! Versende!', 299, 'Konsole', 'Switch', 'i.huber@gmail.com'),
(6, 'rdr2.jpg', 'Red Dead Redemtion Neu Key', 75, 'PS4 Spiel', 'Red Dead', 'jonas.herbert@hotmail.de'),
(7, 'fifa18.jpg', 'Fifa 18 versende das Spiel Originalverpackt', 30, 'PS4 Spiel', 'Fifa 18', 'jonas.herbert@hotmail.de'),
(8, 'Goat.jpg', 'Ziegensimulator gratis versand', 900, 'PS4 Spiel', 'Goat <3', 'jonas.herbert@hotmail.de'),
(9, 'Sims4.jpg', 'The Sims Spiel in Wörth', 35, 'PS4 Spiel', 'Sims 4', 'mario.luigi@web.de'),
(10, 'TLOU.jpg', 'The Last of Us abholen in Pforzheim', 20, 'PS4 Spiel', 'Last of US', 'karmen.geiz@web.de'),
(11, 'AssassinsCreedOrigin.jpg', 'Assassins Creed Origin gebraucht', 45, 'X-BOX Spiel', 'AC Origin', 'karmen.geiz@web.de'),
(12, 'Battlefield1.jpg', 'Battlefield 1 kaum gespielt', 30, 'X-BOX Spiel', 'BF 1', 'bernd.honig@web.de'),
(13, 'Battlefront2.jpg', 'Battlefront 2', 25, 'X-BOX Spiel', 'Battlefront ', 'i.huber@gmail.com'),
(14, 'Bo3.jpg', 'Black Ops 3 zu verkaufen', 18, 'X-BOX Spiel', 'BO 3', 'i.huber@gmail.com'),
(15, 'Bo4.jpg', 'Black Ops 4 for Sale', 32, 'X-BOX Spiel', 'BO 4', 'jonas.herbert@hotmail.de'),
(16, 'Fortnite.jpg', 'Fortnite gut erhalten', 26, 'X-BOX Spiel', 'Fortnite', 'bernd.honig@web.de'),
(17, 'Forza_Horizon_4.jpg', 'Forza 4 :)', 50, 'X-BOX Spiel', 'Forza H 4', 'i.huber@gmail.com'),
(18, 'Halo.jpg', 'Halo <3', 43, 'X-BOX Spiel', 'Halo', 'jonas.herbert@hotmail.de'),
(19, 'HaloWars.jpg', 'Halo Wars <3', 40, 'X-BOX Spiel', 'Halo Wars', 'bernd.honig@web.de'),
(20, 'Spiderman2.jpg', 'Spiderman2', 38, 'X-BOX Spiel', 'Spiderman 2', 'bernd.honig@web.de'),
(21, 'Titanfall.jpg', 'Titanfall mit Exklusivinhalt', 30, 'X-BOX Spiel', 'Titanfall', 'bernd.honig@web.de'),
(22, 'SNESBundle.jpg', '10 Verschiedene Spiele für die SNES siehe Grafik! Einfach melden per Mail!', 60, 'Nintendo Spiel', 'SNES Spiele', 'd.vader@s-wars.de'),
(23, '3DSBundle.jpg', '25 3DS Spiele alle funktionieren! Zum Abholen in Mainz', 140, 'Nintendo Spiel', '3DS Bundle', 'd.vader@s-wars.de'),
(24, 'Platin.jpg', 'Pokemon Platin Edition für den Nintendo DS, Versende auch gerne über aufpreis! Landau', 15, 'Nintendo Spiel', 'PKMN Platin', 'd.vader@s-wars.de'),
(25, 'MK8.jpg', 'Mario Kart für die Switch Preis VB! in Stuttgart zum abholen', 70, 'Nintendo Spiel', 'Mario Kart 8', 'bernd.honig@web.de'),
(26, 'Sports.jpg', 'Wii Sports Resort für die Wii, wii kaputt spiel ganz.', 7, 'Nintendo Spiel', 'Wii Sports', 'mario.luigi@web.de'),
(27, 'Controllerzubehoer.jpg', 'Spezialcontroller', 45, 'Sonstige', 'Spezialcontr', 'i.huber@gmail.com'),
(28, 'Gamingseat.jpg', 'Gamingseat Deluxe', 400, 'Sonstige', 'Gamingseat E', 'i.huber@gmail.com'),
(29, 'gamingseat2.jpg', 'Gamingseat rot', 500, 'Sonstige', 'Gamingseat R', 'bernd.honig@web.de'),
(30, 'Headset.jpg', 'Headset schwarz', 60, 'Sonstige', 'Headset blac', 'bernd.honig@web.de'),
(31, 'Headset2.jpg', 'Headset rot', 65, 'Sonstige', 'Headset red', 'karmen.geiz@web.de'),
(32, 'Kindergaminglenkrad.jpg', 'Lenkrad Gaming', 120, 'Sonstige', 'Gaminglenkra', 'bernd.honig@web.de'),
(33, 'Lenkrad.jpg', 'Lenkrad Ferrari', 140, 'Sonstige', 'Lenkrad Ferr', 'karmen.geiz@web.de'),
(34, 'Nintendozubehoer.jpg', 'Nintendo Zubehör', 100, 'Sonstige', 'Nintendo Zub', 'mario.luigi@web.de'),
(35, 'Vr.jpg', 'Vr-Brille', 200, 'Sonstige', 'Vr-Brille', 'karmen.geiz@web.de');
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
(3, 'dfkÃ¶Ã¶Ã¤fd', 'dvÃ¤kfÃ¤gkfgf', 'khuk@web.de', 77746),
(4, 'admin123', 'admin123', 'hallo@hallo.de', 88234);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
