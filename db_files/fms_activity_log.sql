-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2021 at 10:52 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sacco_fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `fms_activity_log`
--

DROP TABLE IF EXISTS `fms_activity_log`;
CREATE TABLE IF NOT EXISTS `fms_activity_log` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(250) NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `activity` text NOT NULL,
  `moudle_id` int(11) NOT NULL,
  `reference_id` varchar(250) DEFAULT NULL,
  `reference_number` varchar(250) DEFAULT NULL,
  `reference_url` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
