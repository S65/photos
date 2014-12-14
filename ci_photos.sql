-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2014 at 07:22 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_photos`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `fileurl` varchar(255) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `fileurl`, `uploadtime`, `user_id`) VALUES
(1, 'uploads/273382_3096.jpg', 1418539965, 6),
(2, 'uploads/3731.Ikz5ixE_.jpg-550x0_.jpg', 1418540879, 6),
(3, 'uploads/840769_51568537.jpg', 1418540897, 6),
(4, 'uploads/clash-of-clans-lootatrisk.png', 1418540911, 6),
(5, 'uploads/The-peak-tourist-season-in-Italy.jpg', 1418540919, 6),
(6, 'uploads/venice-italy.jpg', 1418540925, 6),
(7, 'uploads/venice-italy.jpg', 1418541482, 6),
(8, 'uploads/273382_30961.jpg', 1418541678, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passwordkey` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `passwordkey`) VALUES
(6, 'homerun31@msn.com', '$2a$10$0ec20d691e7948213b321OKL9ShRqwbmTBWGLtTJNkU/gC64QYmVm', '$2a$10$0ec20d691e7948213b321a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
