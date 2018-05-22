-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 07:51 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(2) NOT NULL DEFAULT '0',
  `firstName` varchar(8) DEFAULT NULL,
  `lastName` varchar(8) DEFAULT NULL,
  `address` varchar(43) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId` (`userId`),
  UNIQUE KEY `password` (`password`),
  KEY `userId_2` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `address`, `email`, `phone`, `password`) VALUES
(1, 'Betty', 'Frank', '4701 W. Thunderbird Road, Scottsdale, AZ', 'Betty_Frank@games.com', '(602)590-668', 'Se1creT'),
(2, 'Barbara', 'Raymond', '13510 N 49th Ave, Glendale, AZ', 'Barbara_Raymond@games.com', '(602)547-346', 'Se2creT'),
(3, 'Shirley', 'Jack', '4920 W Thunderbird Rd, Tolleson, AZ', 'Shirley_Jack@games.com', '(602)487-823', 'Se3creT'),
(4, 'Patricia', 'Harold', '5000 Rhonda Rd, Anderson, CA', 'Patricia_Harold@games.com', '(909)416-616', 'Se4creT'),
(5, 'Dorothy', 'Billy', '6051 Florin Rd, Sacramento, CA', 'Dorothy_Billy@games.com', '(510)330-416', 'Se5creT'),
(6, 'Joan', 'Gerald', '710 E Ben White Blvd, Austin, TX', 'Joan_Gerald@games.com', '(210)303-125', 'Se6creT'),
(7, 'James', 'Walter', '4530 W Monroe Rd, Glendale, AZ', 'James_Walter@games.com', '(602)283-620', 'Se7creT'),
(8, 'John', 'Jerry', '3848 McHenry Ave, Modesto, CA', 'John_Jerry@games.com', '(510)192-237', 'Se8creT'),
(9, 'William', 'Joe', '1101 Sanguinetti Rd, Sonora, CA', 'William_Joe@games.com', '(909)183-845', 'Se9creT'),
(10, 'Richard', 'Eugene', '5017 W Hwy 290, Austin, TX', 'Richard_Eugene@games.com', '(210)180-523', 'Se10creT'),
(11, 'Charles', 'Henry', '777 Story Rd, San Jose, CA', 'Charles_Henry@games.com', '(510)164-670', 'Se11creT'),
(12, 'Donald', 'Bobby', '4324 W Indian school Rd, Peoria, AZ', 'Donald_Bobby@games.com', '(602)147-808', 'Se12creT'),
(13, 'George', 'Arthur', '9300 S IH 35 Frontage Rd b, Austin, TX', 'George_Arthur@games.com', '(210)140-292', 'Se13creT'),
(14, 'Thomas', 'Carl', '3055 Loughborough Dr, Merced, CA', 'Thomas_Carl@games.com', '(909)125-735', 'Se14creT'),
(15, 'Margaret', 'Larry', '7065 N Ingram Ave, Fresno, CA', 'Margaret_Larry@games.com', '(510)125-075', 'Se15creT'),
(16, 'Nancy', 'Ralph', '2761 Jensen Ave, Sanger, CA', 'Nancy_Ralph@games.com', '(909)572-906', 'Se16creT'),
(17, 'Helen', 'Albert', '690 Old San Antonio Rd, Buda, TX', 'Helen_Albert@games.com', '(210)300-361', 'Se17creT'),
(18, 'Carol', 'Willie', '4356 W 2nd st, Glendale, AZ', 'Carol_Willie@games.com', '(602)296-386', 'Se18creT'),
(19, 'Joyce', 'Fred', '488 Highway 71 W, Bastrop, TX', 'Joyce_Fred@games.com', '(210)229-354', 'Se19creT'),
(20, 'Doris', 'Michael', '250 12th Ave, Hanford, CA', 'Doris_Michael@games.com', '(510)220-564', 'Se20creT'),
(21, 'Ruth', 'Lawrence', '1320 N Demaree St, Visalia, CA', 'Ruth_Lawrence@games.com', '(909)210-380', 'Se21creT'),
(22, 'Virginia', 'Harry', '8333 Van Nuys Blvd, Panorama City, CA', 'Virginia_Harry@games.com', '(510)173-419', 'Se22creT'),
(23, 'Joseph', 'Howard', '', 'Joseph_Howard@games.com', '(909)157-351', 'Se23creT'),
(24, 'David', 'Roy', '4346 W Camelback Rd, Glendale, AZ', 'David_Roy@games.com', '(602)142-473', 'Se24creT'),
(25, 'Edward', 'Norman', '31700 Grape St, Lake Elsinore, CA', 'Edward_Norman@games.com', '(510)140-402', 'Se25creT'),
(26, 'Ronald', 'Roger', '1540 E 2nd St, Beaumont, CA', 'Ronald_Roger@games.com', '(909)117-728', 'Se26creT'),
(27, 'Paul', 'Daniel', '434 W Thunderbird Rd, Tempe, AZ', 'Paul_Daniel@games.com', '(602)115-498', 'Se27creT'),
(28, 'Kenneth', 'Louis', '1800 University Dr, Vista, CA', 'Kenneth_Louis@games.com', '(909)110-635', 'Se28creT'),
(29, 'Robert', 'Earl', '6250 Valley Springs Pkwy, Riverside, CA', 'Robert_Earl@games.com', '(510)109-184', 'Se29creT'),
(30, 'Mary', 'Gary', '5601 Ramon Rd, Palm Springs, CA', 'Mary_Gary@games.com', '(909)103-070', 'Se30creT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
