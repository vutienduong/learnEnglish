-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2014 at 07:11 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learnenglish`
--

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE IF NOT EXISTS `dictionary` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_eng` varchar(50) NOT NULL,
  `col_vie` varchar(50) NOT NULL,
  `col_create_time` varchar(30) DEFAULT NULL,
  `col_family_type` text,
  `col_memo` text,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `col_eng_2` (`col_eng`,`col_vie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `dictionary`
--

INSERT INTO `dictionary` (`_id`, `col_eng`, `col_vie`, `col_create_time`, `col_family_type`, `col_memo`) VALUES
(1, 'cat', 'con mèo', NULL, NULL, NULL),
(3, 'dog', 'chÃ³', '1419765740', 'noun', ''),
(9, 'cat', 'con meo 2', NULL, NULL, NULL),
(11, 'dad', 'bo', '1419944362', 'noun', ''),
(12, 'mom', 'me', '1419944439', 'noun', ''),
(13, 'add', 'them', '1419945469', 'verb', ''),
(14, 'hand', 'tay', '1419945577', 'noun', ''),
(15, 'aa', 'aa', '1419945658', 'noun', ''),
(16, 'aa', 'aaa', '1419945800', 'noun', ''),
(17, 'maximum', 'tá»‘i Ä‘a', '1419946359', 'adj', ''),
(18, 'minimum', 'tá»‘i thiá»ƒu', '1419946425', 'adj', ''),
(19, 'Chirstmas', 'GiÃ¡ng sinh', '1419946455', 'noun', ''),
(20, 'ab', 'ab', '1419946596', 'noun', ''),
(21, 'English', 'Tiáº¿ng Anh', '1419961312', 'noun', '');

-- --------------------------------------------------------

--
-- Table structure for table `recent_add_word`
--

CREATE TABLE IF NOT EXISTS `recent_add_word` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_word` int(11) NOT NULL,
  `col_ctime` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `col_word` (`col_word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '12345', 2),
(2, 'kenny', '12345', 2),
(3, 'jacky', '12345', 1),
(4, 'Lena', '12345', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
