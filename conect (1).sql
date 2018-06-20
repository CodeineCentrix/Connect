-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2018 at 05:11 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conect`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `uspGetBusiness`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspGetBusiness` ()  NO SQL
SELECT * FROM business$$

DROP PROCEDURE IF EXISTS `uspGetEventTickets`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspGetEventTickets` ()  NO SQL
SELECT * 
FROM event_ticket$$

DROP PROCEDURE IF EXISTS `uspGetSponsors`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspGetSponsors` ()  NO SQL
SELECT *
FROM sponsor$$

DROP PROCEDURE IF EXISTS `uspUpdateBusiness`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspUpdateBusiness` (IN `busName` VARCHAR(50), IN `busLogo` VARCHAR(100), IN `busSlogan` VARCHAR(100), IN `vat` FLOAT, IN `busAddressID` INT, IN `busAboutUs` TEXT, IN `busDateFound` DATE)  BEGIN

UPDATE business
SET BusName = busName ,BusLogo = busLogo , BusSlogan = busSlogan, VAT = vat,
 BusAddressID  = busAddressID, BusAboutUs = busAboutUs, BusDateFound = busDateFound;
 
END$$

DROP PROCEDURE IF EXISTS `uspUpdateSponsors`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspUpdateSponsors` (IN `spoName` VARCHAR(100), IN `spoWebsite` VARCHAR(100), IN `spoPic` INT, IN `spoID` INT)  NO SQL
UPDATE sponsor
SET SpoName = spoName , SpoWebsite = spoWebsite , SpoPicture = spoPic
WHERE SpoID = spoID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `BusName` varchar(50) DEFAULT NULL,
  `BusLogo` varchar(100) DEFAULT NULL,
  `BusSlogan` varchar(100) DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `BusAddressID` int(11) DEFAULT NULL,
  `BusAboutUs` text,
  `BusDateFound` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`BusName`, `BusLogo`, `BusSlogan`, `VAT`, `BusAddressID`, `BusAboutUs`, `BusDateFound`) VALUES
('Con.ect', NULL, NULL, 15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `EveID` int(11) NOT NULL,
  `EveName` varchar(100) DEFAULT NULL,
  `EveStartDate` date DEFAULT NULL,
  `EveAddress` int(11) DEFAULT NULL,
  `EveDescription` text,
  `EveEndDate` date NOT NULL,
  PRIMARY KEY (`EveID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket`
--

DROP TABLE IF EXISTS `event_ticket`;
CREATE TABLE IF NOT EXISTS `event_ticket` (
  `EveID` int(11) NOT NULL,
  `TicID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `GalID` int(11) NOT NULL,
  `GalPic` varchar(100) NOT NULL,
  `GalDate` date NOT NULL,
  `GalDescrip` text,
  PRIMARY KEY (`GalID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ItemID` int(11) NOT NULL,
  `IteName` varchar(100) NOT NULL,
  `IteDescription` text,
  `IteQty` int(11) NOT NULL,
  `ItePrice` double NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `SpoID` int(11) NOT NULL AUTO_INCREMENT,
  `SpoName` varchar(100) NOT NULL,
  `SpoWebsite` varchar(100) DEFAULT NULL,
  `SpoPicture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SpoID`),
  KEY `SpoID` (`SpoID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`SpoID`, `SpoName`, `SpoWebsite`, `SpoPicture`) VALUES
(1, 'Propella', 'thepropella.ac.za', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `TicID` int(11) NOT NULL,
  `TicPrice` double NOT NULL,
  `TicDescription` text,
  `TicType` int(11) DEFAULT NULL,
  PRIMARY KEY (`TicID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

DROP TABLE IF EXISTS `ticket_type`;
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `TicTypID` int(11) NOT NULL,
  `TicTypName` varchar(50) NOT NULL,
  PRIMARY KEY (`TicTypID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `VenID` int(11) NOT NULL,
  `VenName` varchar(100) NOT NULL,
  `VenFacebook` varchar(100) NOT NULL,
  `VenTwitter` varchar(100) NOT NULL,
  `VenInstagram` varchar(100) NOT NULL,
  `VenWebsite` varchar(100) NOT NULL,
  `VenDescription` text NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
