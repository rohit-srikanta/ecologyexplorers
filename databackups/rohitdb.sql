-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2013 at 12:14 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `arthro_samples`
--

INSERT INTO `arthro_samples` (`id`, `site_id`, `habitat_id`, `collection_date`, `comments`, `date_entered`, `observer`) VALUES
(54, 50, 40, '2013-03-26', 'Recording from site Arthro', '2013-03-26 22:02:31', 'Rohit'),
(55, 50, 40, '2013-03-26', 'asd', '2013-03-26 22:40:06', 'Ryan'),
(56, 50, 40, '2013-03-28', 'qwe', '2013-03-28 00:08:29', 'ryan');

-- --------------------------------------------------------

--
-- Table structure for table `arthro_specimens`
--

CREATE TABLE IF NOT EXISTS `arthro_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trap_no` varchar(20) NOT NULL,
  `taxon` int(11) DEFAULT NULL,
  `frequency` int(10) NOT NULL,
  `sample_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `taxon` (`taxon`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `arthro_specimens`
--

INSERT INTO `arthro_specimens` (`id`, `trap_no`, `taxon`, `frequency`, `sample_id`) VALUES
(1, '12', 1, 1, 54),
(2, '13', 2, 3, 54),
(3, '1', 2, 3, 55),
(4, '2', 3, 4, 55),
(5, '1', 1, 123, 56);

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
-- Table structure for table `bird_samples`
--

CREATE TABLE IF NOT EXISTS `bird_samples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `observer` varchar(255) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `air_temp` int(4) DEFAULT NULL,
  `temp_units` varchar(1) DEFAULT NULL,
  `cloud_cover` int(1) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `habitat_id` (`habitat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bird_specimens`
--

CREATE TABLE IF NOT EXISTS `bird_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sample_id` int(11) NOT NULL,
  `species_id` int(11) DEFAULT NULL,
  `frequency` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `species_id` (`species_id`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bird_taxon`
--

CREATE TABLE IF NOT EXISTS `bird_taxon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `species_id` varchar(4) NOT NULL,
  `tsn` int(10) DEFAULT NULL,
  `common_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_id` (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bird_taxon`
--

INSERT INTO `bird_taxon` (`id`, `species_id`, `tsn`, `common_name`) VALUES
(1, 'ABTO', NULL, 'Abert''s Towhee'),
(2, 'BNST', NULL, 'Black-necked Stilt'),
(3, 'HAGS', NULL, 'Harris'' Antelope Ground Squirrel'),
(4, 'NOFL', NULL, 'Northern Flicker'),
(5, 'UNWO', NULL, 'Unidentified Woodpecker'),
(6, 'YWAR', NULL, 'Yellow Warbler');

-- --------------------------------------------------------

--
-- Table structure for table `cloud_cover`
--

CREATE TABLE IF NOT EXISTS `cloud_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cloud_cover_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `type`, `recording_date`, `area`, `shrubcover`, `tree_canopy`, `lawn`, `other`, `paved_building`, `gravel_soil`, `water`, `num_traps`, `trap_arrange`, `percent_observed`, `radius`, `date_entered`, `site_id`, `school_id`) VALUES
(40, 'AR', '2013-02-26', 200, NULL, 10, 10, 30, 10, 10, 10, 10, 'Line', NULL, NULL, '2013-03-28 00:07:52', 50, 1),
(41, 'BI', '2013-02-26', NULL, NULL, 20, 30, 10, 10, 10, 0, NULL, NULL, 10, 10, '2013-03-26 22:17:27', 51, 1),
(42, 'AR', '2013-02-26', 199, NULL, 20, 10, 10, 10, 50, 0, 10, 'Line', NULL, NULL, '2013-03-26 22:19:27', 52, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_id`, `school_name`, `address`, `zipcode`, `city`, `date_entered`) VALUES
(1, 'ASU', 'Arizona State University', 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309', '85287', 'Tempe', '2013-02-18 12:27:55'),
(2, 'USC', 'University Of Southern California', 'University Drive 6th Floor,USC,P.O. Box 879555', '25877', 'Los Angeles', '2013-02-18 12:27:55'),
(4, 'NCS', 'North Carolina State University', 'Raeligh, NC', '465892', 'Raeligh', '2013-03-11 17:49:29'),
(6, 'SYR', 'Syracuse University', 'Fulton Street 6th Floor,Syracuse University,P.O. Box 777309', '57287', 'Syracuse', '2013-02-18 12:27:55'),
(7, 'UFL', 'University of Florida', 'Gainsville,FL', '58428', 'Gainsville', '2013-03-25 21:44:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `school`, `site_name`, `address`, `description`, `city`, `zipcode`, `date_entered`, `location`) VALUES
(50, 'Artho Site', 1, 'Arthropod Site at ASU', 'ASu', 'Near MU', 'Tempe', '85281', '2013-03-26 22:01:36', 'Tempe'),
(51, 'Bird Site', 1, 'Bird Site at ASU', 'ASu', 'ASu', 'Tempe', '85281', '2013-03-26 22:17:27', 'ASU'),
(52, 'Arthro', 2, 'Arthropod Site at USC', 'USC', 'USC', 'LA', '84785', '2013-03-26 22:18:58', 'USC');

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
  `date_created` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `email_address_2` (`email_address`,`password`),
  KEY `school` (`school`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email_address`, `password`, `type`, `name`, `school`, `date_created`, `last_login`) VALUES
(4, 'rohit@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'A', 'Rohit Srikanta', 1, '2013-03-06 10:18:36', '2013-03-28 00:09:10'),
(15, 'temp@asu.edu', '5ef3f435d713ec7e69ee08f93f42a322ce180627', 'T', 'temp', 1, '2013-03-11 10:17:48', '2013-03-27 03:23:20'),
(17, 'ryan@asu.edu', 'ea3cd978650417470535f3a4725b6b5042a6ab59', 'T', 'Ryan', 1, '2013-03-17 06:17:14', '2013-03-28 00:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_classes`
--

CREATE TABLE IF NOT EXISTS `teachers_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school` (`school`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`id`, `class_name`, `grade`, `date_entered`, `teacher_id`, `school`) VALUES
(1, 'Mr. Smith Grade 12', '12', '2013-03-25 15:47:47', 4, 1),
(3, 'grade 12', 'grade', '2013-03-25 22:49:33', 4, 1),
(6, '13', '13', '2013-03-25 23:17:29', 4, 1),
(7, 'Temp Class', '7', '2013-03-26 22:16:26', 15, 1),
(8, 'Ryans Class', '8', '2013-03-28 00:07:38', 17, 1);

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
-- Constraints for table `bird_samples`
--
ALTER TABLE `bird_samples`
  ADD CONSTRAINT `bird_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `bird_samples_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `bird_specimens`
--
ALTER TABLE `bird_specimens`
  ADD CONSTRAINT `bird_specimens_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `bird_taxon` (`id`),
  ADD CONSTRAINT `bird_specimens_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `bird_samples` (`id`);

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
  ADD CONSTRAINT `teachers_classes_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
