-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 11:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `song_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `SongID` int NOT NULL AUTO_INCREMENT,
  `SongTitle` varchar(30) NOT NULL,
  `SongArtist` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SongUrl` varchar(2083) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SongGenre` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SongLanguage` varchar(20) NOT NULL,
  `SongReleaseDate` date NOT NULL,
  `OtherDetails` varchar(30) DEFAULT NULL,
  `SongStatus` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `OwnerID` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`SongID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`SongID`, `SongTitle`, `SongArtist`, `SongUrl`, `SongGenre`, `SongLanguage`, `SongReleaseDate`, `OtherDetails`, `SongStatus`, `OwnerID`) VALUES
(1, 'Caraphernelia', 'Pierce The Veil', 'https://www.youtube.com/watch?v=FZVYOriINwc', 'Pop Punk', 'English', '2010-06-22', '', '', 'aniq'),
(9, 'Satellites', 'Periphery', 'https://www.youtube.com/watch?v=JAXQxAkcL78', 'Metal', 'English', '2019-03-31', '', '', 'aniq'),
(10, 'karena kamu', 'geisha', 'https://www.youtube.com/watch?v=jAl_7vqdms4', 'Pop Rock', 'Malay', '2011-05-25', '', NULL, 'hazreen'),
(15, 'Zagreus', 'Periphery', 'https://www.youtube.com/watch?v=kDgNhyz-z5s', 'Metal', 'English', '2023-01-12', 'Really good good good song 10/', NULL, 'aniq'),
(14, 'Bills', 'enhypen', 'https://youtu.be/bZVsghyA2VI?si=xAb07GnqYUEo8QlF', 'K-Pop', 'Other', '2023-05-22', '', NULL, 'hazreen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(15) NOT NULL,
  `UserPwd` varchar(15) NOT NULL,
  `UserType` varchar(15) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `UserPwd`, `UserType`) VALUES
('aniq', '123', 'user'),
('hazreen', '123', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
