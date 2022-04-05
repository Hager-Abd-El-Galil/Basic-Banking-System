-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2022 at 09:16 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer_money`
--

DROP TABLE IF EXISTS `transfer_money`;
CREATE TABLE IF NOT EXISTS `transfer_money` (
  `id` int(5) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `receiver` varchar(100) DEFAULT NULL,
  `balance` int(10) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_money`
--

INSERT INTO `transfer_money` (`id`, `sender`, `receiver`, `balance`, `time`) VALUES
(NULL, 'hager', 'nesma', 2000, '2022-04-05 18:51:33'),
(NULL, 'amr', 'aya', 3000, '2022-04-05 19:17:40'),
(NULL, 'mahmoud', 'adel', 200, '2022-04-05 19:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `balance` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `balance`) VALUES
(1, 'hager', 'hager@gmail.com', 18000),
(2, 'nesma', 'nesma@gmail.com', 14500),
(1, 'hager', 'hager@gmail.com', 18000),
(2, 'nesma', 'nesma@gmail.com', 14500),
(3, 'alaa', 'alaa@gmail.com', 8000),
(4, 'nada', 'nada@gmail.com', 50000),
(5, 'adel', 'adel@gmail.com', 2500),
(6, 'amir', 'amir@gmail.com', 6500),
(7, 'aya', 'aya@gmail.com', 20000),
(8, 'amr', 'amr@gmail.com', 27000),
(9, 'nour', 'nour@gmail.com', 18000),
(10, 'mahmoud', 'mahmoud@gmail.com', 11000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
