-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 07:52 PM
-- Server version: 5.5.31-cll
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cort1669`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gameId` int(5) NOT NULL DEFAULT '0',
  `gameName` varchar(38) DEFAULT NULL,
  `publisher` varchar(29) DEFAULT NULL,
  `genre` varchar(18) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  UNIQUE KEY `gameId` (`gameId`),
  KEY `gameId_2` (`gameId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameId`, `gameName`, `publisher`, `genre`, `price`) VALUES
(1, 'Half - Life 2', 'Vu Games', 'Action', '9.99'),
(2, 'Grand Theft Auto V', 'Rockstar Games', 'Open World', '59.99'),
(3, 'The Orange Box', 'EA Games', 'Mixed', '19.99'),
(4, 'Half-Life', 'Sierra Ent.', 'Action', '9.99'),
(5, 'BioShock', '2k Games', 'Adventure', '19.99'),
(6, 'Baldur''s Gate II', 'Interplay', 'RPG', '19.99'),
(7, 'Portal 2', 'Valve Software', 'Puzzle Adventure', '19.99'),
(8, 'The Elder Scrolls V: Skyrim', 'Bethesda Softworks', 'RPG', '39.99'),
(9, 'Mass Effect 2', 'Electronic Arts', 'Action', '19.99'),
(10, 'Grand Theft Auto: Vice City', 'Rockstar Games', 'Open World', '9.99'),
(11, 'Civillization II', 'MicroProse', 'Realtime Stratagy', '4.99'),
(12, 'Quake', 'Id Software', '1st Person Shooter', '4.99'),
(13, 'BioShock Infinite', '2k Games', '1st Person Shooter', '29.99'),
(14, ' The Elder Scrolls IV: Oblivion', '2k Games', 'RPG', '19.99'),
(15, 'Grim Fandango', 'Lucas Arts', 'Adventrure', '14.99'),
(16, 'Diablo', 'Blizzard Entertainment', 'RPG', '9.99'),
(17, ' Sid Meier''s Civilization IV', '2k Games', 'Realtime Strategy', '4.99'),
(18, 'The Witcher 3: Wild Hunt', 'Warner Bros. Interactive Ent.', 'RPG', '23.99'),
(19, 'Company of Heros', 'THQ', 'Action', '19.99'),
(20, 'Unreal Tournament 2004', 'Atari SA', '1st Person Shooter', '14.99'),
(21, 'Starcraft II: Wings of Liberty', 'Blizzard Entertainment', 'Realtime Strategy', '12.48'),
(22, 'Minecraft', 'Mojang AB', 'Building', '24.99'),
(23, 'Grand theft Auto III', 'Rockstar Games', 'Open World', '9.99'),
(24, 'Homeworld', 'Sierra Entertainment', 'Adventrure', '34.99'),
(25, 'Star Wars: Knights of the old Republic', 'Lucas Arts', 'Action', '9.99'),
(26, 'World of Warcraft', 'Blizzard Entertainment', 'Realtime Strategy', '19.99'),
(27, 'Grand Theft Auto: San Andreas', 'Rockstar Games', 'Open World', '19.99'),
(28, 'Call of Duty 4: Modern Warfare', 'Activision', '1st Person Shooter', '19.99'),
(29, 'Warcraft III: Reign of Chaos', 'Blizzard Entertainment', 'Realtime Strategy', '19.99'),
(30, 'The Sims', 'Maxis', 'Simulation', '9.99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
