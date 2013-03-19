-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2013 at 12:27 AM
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
-- Table structure for table `arthro_samples`
--

CREATE TABLE IF NOT EXISTS `arthro_samples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `habitat_id` int(11) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `observer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `habitat_id` (`habitat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `arthro_specimens`
--

CREATE TABLE IF NOT EXISTS `arthro_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trap_id` varchar(20) NOT NULL,
  `taxon` int(11) DEFAULT NULL,
  `frequency` int(10) NOT NULL,
  `sample_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trap_id` (`trap_id`),
  KEY `taxon` (`taxon`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `arthro_taxon`
--

CREATE TABLE IF NOT EXISTS `arthro_taxon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxon` varchar(6) NOT NULL,
  `taxon_name` varchar(50) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taxon` (`taxon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `arthro_taxon`
--

INSERT INTO `arthro_taxon` (`id`, `taxon`, `taxon_name`, `date_entered`) VALUES
(1, 'ACARI', 'Acari', '2013-03-18 14:29:36'),
(2, 'AERID', 'Aerididae', '2013-03-18 14:29:36'),
(3, 'THOMI', 'Thomisidae', '2013-03-18 14:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `habitats`
--

CREATE TABLE IF NOT EXISTS `habitats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(2) NOT NULL,
  `recording_date` date DEFAULT NULL,
  `area` smallint(6) DEFAULT NULL,
  `shrubcover` smallint(6) DEFAULT NULL,
  `tree_canopy` smallint(6) DEFAULT NULL,
  `lawn` tinyint(4) DEFAULT NULL,
  `other` tinyint(4) DEFAULT NULL,
  `paved_building` tinyint(4) DEFAULT NULL,
  `gravel_soil` tinyint(4) DEFAULT NULL,
  `water` tinyint(4) DEFAULT NULL,
  `num_traps` smallint(6) DEFAULT NULL,
  `trap_arrange` varchar(255) DEFAULT NULL,
  `percent_observed` tinyint(4) DEFAULT NULL,
  `radius` smallint(6) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `type`, `recording_date`, `area`, `shrubcover`, `tree_canopy`, `lawn`, `other`, `paved_building`, `gravel_soil`, `water`, `num_traps`, `trap_arrange`, `percent_observed`, `radius`, `date_entered`, `site_id`, `school_id`) VALUES
(2, 'VE', '2013-03-03', NULL, NULL, 40, 30, 20, 0, 30, 20, 0, 'Line', 0, 0, NULL, NULL, NULL),
(3, 'AR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 0, 0, NULL, NULL, NULL),
(4, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, NULL, NULL, NULL),
(5, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:14:35', NULL, NULL),
(6, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:15:18', NULL, NULL),
(7, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:15:34', NULL, 1),
(9, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:18:38', NULL, 1),
(10, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:19:53', 23, 1),
(11, 'AR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:20:14', 24, 1),
(12, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:20:25', 25, 1),
(13, 'BR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:20:32', 26, 1),
(14, 'VE', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', 20, 70, '2013-03-15 00:20:39', 27, 1),
(15, 'AR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', NULL, NULL, '2013-03-15 00:23:38', 28, 1),
(16, 'AR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', NULL, NULL, '2013-03-15 00:24:55', 29, 1),
(17, 'BI', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, NULL, NULL, 20, 70, '2013-03-15 00:25:02', 30, 1),
(18, 'BR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, NULL, NULL, NULL, NULL, '2013-03-15 00:25:10', 31, 1),
(19, 'VE', '2013-03-03', 100, NULL, 40, 30, 20, 10, 20, 20, NULL, NULL, NULL, NULL, '2013-03-15 00:25:18', 32, 1),
(20, 'BR', '2013-03-03', NULL, NULL, 40, 30, 20, 10, 20, 20, NULL, NULL, NULL, NULL, '2013-03-15 00:25:54', 33, 1),
(21, 'BR', '2013-02-06', NULL, NULL, 40, 30, 20, 10, 20, 20, NULL, NULL, NULL, NULL, '2013-03-15 00:26:24', 34, 1),
(22, 'AR', '2013-02-06', 100, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', NULL, NULL, '2013-03-15 00:26:36', 35, 1),
(23, 'AR', '2013-02-06', 100, NULL, 40, 30, 20, 10, 20, 20, 30, 'Line', NULL, NULL, '2013-03-15 00:26:52', 36, 1),
(24, 'AR', '2013-02-06', 100, NULL, 40, 30, 20, 10, 20, 20, 40, 'Line', NULL, NULL, '2013-03-15 00:27:36', 37, 1),
(25, 'AR', '2013-02-06', 100, NULL, 40, 30, 20, 10, 20, 20, 40, 'Line', NULL, NULL, '2013-03-15 00:30:36', 38, 1),
(26, 'BI', '2013-04-15', NULL, NULL, 20, 10, 20, 10, 30, 10, NULL, NULL, 40, 20, '2013-03-15 00:32:42', 39, 1),
(27, 'AR', '2013-02-15', 489, NULL, 20, 10, 20, 10, 30, 10, 20, 'Line', NULL, NULL, '2013-03-19 00:02:00', 40, 1),
(28, 'VE', '2013-04-15', 111, NULL, 30, 20, 10, 10, 30, 10, NULL, NULL, NULL, NULL, '2013-03-18 22:58:57', 41, 1),
(29, 'BI', '2013-03-04', NULL, NULL, 0, 10, 10, 20, 10, 10, NULL, NULL, 10, 10, '2013-03-18 22:57:54', 42, 1),
(31, 'BR', '2013-01-18', NULL, NULL, 60, 10, 10, 0, 20, 0, NULL, NULL, NULL, NULL, '2013-03-18 23:35:28', 43, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_id`, `school_name`, `address`, `zipcode`, `city`, `date_entered`) VALUES
(1, 'ASU', 'Arizona State University', 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309', '85287', 'Tempe', '2013-02-18 12:27:55'),
(2, 'USC', 'University Of Southern California', 'University Drive 6th Floor,USC,P.O. Box 879555', '25877', 'Los Angeles', '2013-02-18 12:27:55'),
(4, 'NCS', 'North Carolina State University', 'Raeligh, NC', '465892', 'Raeligh', '2013-03-11 17:49:29'),
(6, 'SYR', 'Syracuse University', 'Fulton Street 6th Floor,Syracuse University,P.O. Box 777309', '57287', 'Syracuse', '2013-02-18 12:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` varchar(50) NOT NULL,
  `school` int(11) DEFAULT NULL,
  `site_name` varchar(40) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_id` (`site_id`),
  KEY `school` (`school`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `school`, `site_name`, `address`, `description`, `city`, `zipcode`, `date_entered`, `location`) VALUES
(1, ' football field', 1, 'N.33.26.505.W.111.46.305', '2700 E. Brown Road', 'East side of the football field on the 15 yard line all grass', 'Mesa', '85213', '2013-03-11 16:14:47', 'Football field East of the 50 yard line'),
(2, 'baseball fields', 2, 'baseball fields', '2700 E. Brown Road', 'behind portables by baseball fields', 'Mesa', '85213', '2013-03-11 16:14:47', '26.333 46.493'),
(7, '1', 1, 'asu site', 'tempe asu', 'asuusdf;l', 'tempe', '85281', '2013-03-12 00:20:59', 'asu '),
(8, '2', 1, 'sad', 'asd', 'asd', 'asd', '85281', '2013-03-12 00:21:31', 'asd'),
(9, '3', 1, 'as', 'a56', 'gbngbn', 'sfdgdsg', '85774', '2013-03-12 00:21:44', '456'),
(10, '5', 1, 'sdf', 'sdf', '789', 'vbnfgvb', '85281', '2013-03-12 00:22:15', 'vb798'),
(14, 'asdad', 1, 'asdsad234', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:10:14', 'sdfs'),
(15, 'asdad111', 1, 'zxc', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:11:06', 'sdfs'),
(23, '123490', 1, 'asdsadvbvbn', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:19:53', 'sdfs'),
(24, '123499', 1, '24324', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:20:14', 'sdfs'),
(25, '123472', 1, 'asdsad45', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:20:25', 'sdfs'),
(26, '123474', 1, 'asdsadvv', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:20:32', 'sdfs'),
(27, '123475', 1, 'asdsad77', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:20:39', 'sdfs'),
(28, '12771', 1, 'asdsadcvb', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:23:38', 'sdfs'),
(29, '12772', 1, 'asdsad78', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:24:55', 'sdfs'),
(30, '127723', 1, 'asdsadokj', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:25:02', 'sdfs'),
(31, '127724', 1, 'asdsad7789', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:25:10', 'sdfs'),
(32, '127725', 1, 'asdsadqa', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:25:18', 'sdfs'),
(33, '127727', 1, 'asdsad', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:25:54', 'sdfs'),
(34, '127728', 1, 'asdsadn65un', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:26:24', 'sdfs'),
(35, '127729', 1, 'asdsad', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:26:36', 'sdfs'),
(36, '1277211', 1, 'asdsadfh', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:26:52', 'sdfs'),
(37, '1277212', 1, 'asdsadnvbn', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:27:36', 'sdfs'),
(38, '12999', 1, 'asdsad', 'sdfdsf', 'dfsf', 'fghfgh', '85281', '2013-03-15 00:30:36', 'sdfs'),
(39, '22132', 1, '24', '24', '234', '234', '85281', '2013-03-15 00:32:42', '234'),
(40, '22133', 1, '248bdfg ', '24', '234', '234', '85281', '2013-03-15 00:32:59', '234'),
(41, '22134', 1, '24234', '24', '234', '234', '85281', '2013-03-15 00:33:20', '234'),
(42, 'dsadsad dsf', 1, '123', '123', '13123', '123', '85281', '2013-03-18 21:46:30', '123'),
(43, '12345678', 1, 'br', 'sd', 'asd', 'sdf', '85281', '2013-03-18 23:00:20', 'asd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email_address`, `password`, `type`, `name`, `school`) VALUES
(4, 'rohit@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'A', 'Rohit Srikanta', 1),
(5, 'temp@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'T', 'temp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_classes`
--

CREATE TABLE IF NOT EXISTS `teachers_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `teacher` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school` (`school`),
  KEY `teacher` (`teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`id`, `class_name`, `grade`, `date_entered`, `teacher`, `school`) VALUES
(1, 'grade 12', '12', '2013-03-18 19:25:50', 4, 1),
(3, 'Grade 10', '10', '2013-03-18 19:26:17', 5, 2),
(4, 'Grade 11', '11', '2013-03-18 19:37:10', 4, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arthro_samples`
--
ALTER TABLE `arthro_samples`
  ADD CONSTRAINT `arthro_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `arthro_samples_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `arthro_specimens`
--
ALTER TABLE `arthro_specimens`
  ADD CONSTRAINT `arthro_specimens_ibfk_1` FOREIGN KEY (`taxon`) REFERENCES `arthro_taxon` (`id`),
  ADD CONSTRAINT `arthro_specimens_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `arthro_samples` (`id`);

--
-- Constraints for table `habitats`
--
ALTER TABLE `habitats`
  ADD CONSTRAINT `habitats_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `habitats_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`);

--
-- Constraints for table `teachers_classes`
--
ALTER TABLE `teachers_classes`
  ADD CONSTRAINT `teachers_classes_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `teachers_classes_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
