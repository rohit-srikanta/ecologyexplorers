-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2013 at 12:49 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rohitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(3) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id` (`school_id`),
  KEY `school_id_2` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_id`, `school_name`, `address`, `zipcode`, `city`, `date_entered`) VALUES
(1, 'ASU', 'Arizona State University', 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309', '85287', 'Tempe', '2013-02-18 12:27:55'),
(2, 'USC', 'University Of Southern California', 'University Drive 6th Floor,USC,P.O. Box 879555', '25877', 'Los Angeles', '2013-02-18 12:27:55'),
(3, 'SYR', 'Syracuse University', 'Fulton Street 6th Floor,Syracuse University,P.O. Box 777309', '57287', 'Syracuse', '2013-02-18 12:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` varchar(50) NOT NULL,
  `school` varchar(3) NOT NULL,
  `sitename` varchar(40) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_id` (`site_id`),
  KEY `school` (`school`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `school`, `sitename`, `address`, `description`, `city`, `zipcode`, `date_entered`, `location`) VALUES
(1, ' football field', 'ASU', 'N.33.26.505.W.111.46.305', '2700 E. Brown Road', 'East side of the football field on the 15 yard line all grass', 'Mesa', '85213', '2013-03-06 15:37:07', 'Football field East of the 50 yard line'),
(2, 'baseball fields', 'SYR', 'baseball fields', '2700 E. Brown Road', 'behind portables by baseball fields', 'Mesa', '85213', '2013-03-06 15:38:34', '26.333 46.493');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(160) DEFAULT NULL,
  `password` varchar(160) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'P',
  `name` varchar(255) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `email_address_2` (`email_address`,`password`),
  KEY `school` (`school`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email_address`, `password`, `type`, `name`, `school`) VALUES
(1, 'rohit@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'A', 'Rohit Srikanta', 1),
(2, 'asu@asu.edu', '5ef3f435d713ec7e69ee08f93f42a322ce180627', 'T', 'Name....', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`school_id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
