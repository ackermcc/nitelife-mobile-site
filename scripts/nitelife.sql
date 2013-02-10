-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2013 at 01:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nitelife`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE IF NOT EXISTS `bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `icon_url` varchar(200) DEFAULT NULL,
  `banner_url` varchar(200) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `region` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `foursquare` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`id`, `name`, `slug`, `icon_url`, `banner_url`, `address`, `zipcode`, `region`, `description`, `facebook`, `twitter`, `foursquare`, `username`, `password`, `phone`, `website`) VALUES
(2, 'Cock and Bull English Pub', 'cock-and-bull-english-pub', NULL, NULL, '601 Main St ', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-581-4253', ''),
(3, 'Keystone Bar & Grill', 'keystone-bar-and-grill', NULL, NULL, '313 Greenup St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-6777', 'http://www.keystonebar.com/'),
(4, 'Sidebar', 'sidebar', NULL, NULL, '322 Greenup St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-431-3456', ''),
(5, 'Mainstrasse Village Pub', 'mainstrasse-village-pub', NULL, NULL, '619 Main St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-431-5552', 'http://www.mainstrassevillagepub.com/'),
(6, 'The Avenue Lounge', 'the-avenue-lounge', NULL, NULL, '411 Madison Ave', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-6120', 'http://www.theavenuelounge.com/'),
(7, 'Molly Malone''s Irish Pub & Restaurant', 'molly-malones-irish-pub-restaurant', NULL, NULL, '112 E 4th St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-491-6659', 'http://covington.mollymalonesirishpub.com/'),
(8, 'Tickets Sports Bar', 'tickets-sports-bar', NULL, NULL, '100 W 6th St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-431-1839', 'http://www.ticketssportscafe.com/'),
(9, 'Zola Bar & Grill', 'zola-bar-and-grill', NULL, NULL, '626 Main St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-7510', 'http://www.zolapubandgrill.com/'),
(10, 'Down Under', 'down-under', NULL, NULL, '126 Park Place', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-9393', ''),
(11, 'Keefer''s Pub', 'keefers-pub', NULL, NULL, '902 Madison Ave', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-5333', 'keeferspub.com'),
(12, 'Hot Spot Sports Bar, Inc', 'hot-spot-sports-bar', NULL, NULL, '820 Madison Ave', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-291-2904', ''),
(13, 'Zazou Grill & Pub', 'zazou-grill-and-pub', NULL, NULL, '502 W 6th St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-261-9111', 'http://www.zazoupub.com/'),
(14, 'Club Yadda', 'club-yadda', NULL, NULL, '404 Pike St #1', '41016', 'Covington', '', NULL, NULL, NULL, '', '', '859-491-5600', ''),
(15, 'Herb & Thelma''s Tavern', 'herb-and-themlas-tavern', NULL, NULL, '718 Pike St', '41011', 'Covington', '', NULL, NULL, NULL, '', '', '859-491-6984', ''),
(16, 'Jefferson Hall', 'jefferson-hall', NULL, NULL, '1 Levee Way #2118', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-491-6200', 'http://www.jeffersonhall.com/main/index.php'),
(17, 'Bar Louie', 'bar-louie', NULL, NULL, '1 Levee Way', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-291-4222', 'http://www.barlouieamerica.com/home/'),
(18, 'Gangsters Dueling Piano Bar', 'gangsters-dueling-piano-bar', NULL, NULL, '18 East 5th St', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-491-8900', 'http://www.gangsterspianobar.com/'),
(19, 'Beer Sellar', 'beer-sellar', NULL, NULL, '301 Riverboat Row #1', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-431-6969', 'http://www.beersellar.net/'),
(20, 'Arnie''s on the Levee', 'arnies-on-the-levee', NULL, NULL, '120 East 3rd St', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-431-4340', 'http://www.arniesonthelevee.com/'),
(21, 'Crazy Fox Saloon', 'crazy-fox-saloon', NULL, NULL, '901 Washington Ave', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-261-2143', ''),
(22, 'Hofbrauhaus', 'hofbrauhaus', NULL, NULL, '200 East 3rd St', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-491-7200', 'http://www.hofbrauhausnewport.com/'),
(23, 'Mansion Hill Tavern', 'mansion-hill-tavern', NULL, NULL, '502 Washington Ave #A', '41071', 'Newport', '', NULL, NULL, NULL, '', '', '859-581-0100', 'http://mansionhilltavern.tripod.com/');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bar_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bar_id` (`bar_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bar_id` int(11) NOT NULL,
  UNIQUE KEY `user_id_2` (`user_id`,`bar_id`),
  KEY `user_id` (`user_id`),
  KEY `bar_id` (`bar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `open_times`
--

CREATE TABLE IF NOT EXISTS `open_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bar_id` int(11) NOT NULL,
  `day` enum('M','T','W','H','F','S','U') NOT NULL,
  `times` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bar_id` (`bar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `open_times`
--

INSERT INTO `open_times` (`id`, `bar_id`, `day`, `times`) VALUES
(1, 3, 'M', '2pm-4pm'),
(2, 3, 'W', '2pm-4pm');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE IF NOT EXISTS `special` (
  `id` int(11) NOT NULL,
  `bar_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `day` varchar(7) NOT NULL,
  `type` enum('N') NOT NULL,
  `times` varchar(20) NOT NULL,
  KEY `bar_id` (`bar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `bar_id`, `name`, `date_start`, `date_end`, `all_day`, `day`, `type`, `times`) VALUES
(0, 2, 'Free Margaritas', '2013-01-01', '2013-01-31', 0, 'M', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`id`),
  ADD CONSTRAINT `clicks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `open_times`
--
ALTER TABLE `open_times`
  ADD CONSTRAINT `open_times_ibfk_1` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `special`
--
ALTER TABLE `special`
  ADD CONSTRAINT `special_ibfk_1` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
