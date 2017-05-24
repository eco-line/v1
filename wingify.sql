-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 08:30 AM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wingify`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `password`) VALUES
('vaibhavbansal23', '5cfffb43b40bd9f92ac721b0b622021c');

-- --------------------------------------------------------

--
-- Table structure for table `ip_logs`
--

CREATE TABLE IF NOT EXISTS `ip_logs` (
  `username` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `access` varchar(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_logs`
--

INSERT INTO `ip_logs` (`username`, `ip`, `remark`, `access`, `timestamp`) VALUES
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:17:22'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:23:08'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:23:14'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:23:22'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:23:26'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:24:50'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 00:27:53'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:06:25'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:09:22'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:10:30'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:11:15'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:12:07'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:13:48'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:14:04'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:14:17'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:14:29'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:15:00'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:15:19'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:15:30'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:15:48'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:15:58'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:17:58'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:18:05'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:18:33'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:19:15'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:19:37'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:21:21'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:22:04'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:23:36'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:24:31'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:24:57'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 01:39:16'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:03:39'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:04:59'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:06:17'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:09:41'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:09:43'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:10:14'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:10:21'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:14:09'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:15:18'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:16:40'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:31:21'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:32:53'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:33:06'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:41:55'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:42:24'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:42:24'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:45:24'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:45:24'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:45:39'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:45:39'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:53:26'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:53:26'),
('vaibhavbansal23', '127.0.0.1', '', 'api', '2017-05-24 02:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `timestamp`) VALUES
(1, 'Laptop', '45000', '2017-05-23 21:18:24'),
(2, 'Iphone', '60000', '2017-05-23 21:18:24'),
(3, 'iphone7', '80000', '2017-05-23 23:44:19'),
(4, 'LenovoK6Note', '15000', '2017-05-24 01:24:31'),
(6, 'charger', '2500', '2017-05-24 02:16:40'),
(7, 'JBLSpeakers', '6500', '2017-05-24 02:42:24'),
(8, 'JBLSpeakers', '6500', '2017-05-24 02:45:24'),
(9, 'JBLSpeakers', '6500', '2017-05-24 02:45:39'),
(10, 'JBLSpeakers', '6500', '2017-05-24 02:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `token_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`token_id`, `username`, `token`, `timestamp`) VALUES
(24, 'vaibhavbansal23', 'AankMsLiwF0qoTXH', '2017-05-24 01:18:33'),
(27, 'vaibhavbansal23', 'DKYD3xB8hfU69H99', '2017-05-24 02:31:21'),
(28, 'vaibhavbansal23', '15ePdFNr5tGkFwQX', '2017-05-24 02:32:53'),
(29, 'vaibhavbansal23', 'p1u78peZbXWnIBZ2', '2017-05-24 02:33:07'),
(30, 'vaibhavbansal23', 'vIZ4uNylKoXcCNZu', '2017-05-24 02:41:55'),
(31, 'vaibhavbansal23', 'VraSn9jCNXOIFNHQ', '2017-05-24 02:42:24'),
(32, 'vaibhavbansal23', '2x7SIaHW10LT1aIh', '2017-05-24 02:45:24'),
(33, 'vaibhavbansal23', 'f1eX9YVVU0JXvKnQ', '2017-05-24 02:45:39'),
(34, 'vaibhavbansal23', 'VEcPXNFVS8rxh0Rj', '2017-05-24 02:53:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
