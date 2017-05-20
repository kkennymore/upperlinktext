-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2017 at 12:38 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upperlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Timestamp`) VALUES
(1, 'kkennymore', 'Etiosa11//', 1488419775);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `SurName` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ID`, `FirstName`, `SurName`, `PhoneNumber`, `Email`, `Image`, `Status`, `Timestamp`) VALUES
(1, 'sVJMzmqQVwGcogGnM8lqkU8nSMeQbE5CqlfkxryrrXY=', 'TwJNW77dEbr9DOP3JE3ZVxh9KVdReqJ9UPCab8nPNac=', 'BSvMjk5To4aHWNIMeHDuXBnxQpzGGf+MiMq9QbP31yA=', 'fiy6oXXSaZqMaN90iilZJz6HGkzG6++Nkylqvrx4Qgs=', '/XuQXxMmc0Xl2Lcn0YodHF0pLmb9AMJE7Q269AHUVkg=', 0, 1495274425),
(2, 'sVJMzmqQVwGcogGnM8lqkU8nSMeQbE5CqlfkxryrrXY=', 'TwJNW77dEbr9DOP3JE3ZVxh9KVdReqJ9UPCab8nPNac=', 'BSvMjk5To4aHWNIMeHDuXBnxQpzGGf+MiMq9QbP31yA=', 'fiy6oXXSaZqMaN90iilZJz6HGkzG6++Nkylqvrx4Qgs=', '/XuQXxMmc0Xl2Lcn0YodHF0pLmb9AMJE7Q269AHUVkg=', 0, 1495274471),
(9, 'sVJMzmqQVwGcogGnM8lqkU8nSMeQbE5CqlfkxryrrXY=', 'TwJNW77dEbr9DOP3JE3ZVxh9KVdReqJ9UPCab8nPNac=', 'p9JzDKZeBFLOTUM9Cy+0GhZr4KWaNkbwOiHLQoOTBeE=', 'XOCkkoxhxIE/g5TKUvubHd3S1PL8zqkCLBnGOdECA9k=', 'ViyHvGKDLyJg59Gj3ODro6TDTj26lFc16nwU0VZz+jE=', 0, 1495274807),
(10, 'sVJMzmqQVwGcogGnM8lqkU8nSMeQbE5CqlfkxryrrXY=', 'TwJNW77dEbr9DOP3JE3ZVxh9KVdReqJ9UPCab8nPNac=', 'p9JzDKZeBFLOTUM9Cy+0GhZr4KWaNkbwOiHLQoOTBeE=', 'XOCkkoxhxIE/g5TKUvubHd3S1PL8zqkCLBnGOdECA9k=', 'ViyHvGKDLyJg59Gj3ODro6TDTj26lFc16nwU0VZz+jE=', 0, 1495274810);
