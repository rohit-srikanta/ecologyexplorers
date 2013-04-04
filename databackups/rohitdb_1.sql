-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2013 at 12:25 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rohitdb_1`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `arthro_samples`
--

INSERT INTO `arthro_samples` (`id`, `site_id`, `habitat_id`, `collection_date`, `comments`, `date_entered`, `observer`) VALUES
(54, 50, 40, '2013-03-26', 'Recording from site Arthro', '2013-03-26 22:02:31', 'Rohit'),
(55, 50, 40, '2013-03-26', 'asd', '2013-03-26 22:40:06', 'Ryan'),
(56, 50, 40, '2013-03-28', 'qwe', '2013-03-28 00:08:29', 'ryan'),
(57, 50, 40, '2013-03-31', '', '2013-04-01 20:39:17', 'test'),
(58, 50, 40, '2013-04-04', 'asd', '2013-04-04 00:10:31', '1232312');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `arthro_specimens`
--

INSERT INTO `arthro_specimens` (`id`, `trap_no`, `taxon`, `frequency`, `sample_id`) VALUES
(1, '12', 1, 1, 54),
(2, '13', 2, 3, 54),
(3, '1', 2, 3, 55),
(4, '2', 3, 4, 55),
(5, '1', 1, 123, 56),
(6, '1', 2, 10, 57),
(7, '2', 1, 10, 57),
(8, 'asd', 2, 123, 58),
(9, 'asd', 3, 132, 58);

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
  `cloud_cover` int(11) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `habitat_id` (`habitat_id`),
  KEY `cloud_cover` (`cloud_cover`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bird_samples`
--

INSERT INTO `bird_samples` (`id`, `site_id`, `habitat_id`, `observer`, `collection_date`, `time_start`, `time_end`, `air_temp`, `cloud_cover`, `comments`, `date_entered`) VALUES
(1, 51, 41, 'Rohit', '2013-03-31', '05:04:00', '10:04:00', 45, 1, 'sd', '2013-04-01 20:04:53'),
(2, 51, 41, '321', '2013-03-31', '03:39:00', '13:39:00', 89, 2, '55', '2013-04-01 20:41:00'),
(3, 51, 41, 'sad', '2013-04-04', '17:10:00', '17:10:00', 78, 2, 'asd', '2013-04-04 00:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `bird_specimens`
--

CREATE TABLE IF NOT EXISTS `bird_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sample_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `frequency` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `species_id` (`species_id`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bird_specimens`
--

INSERT INTO `bird_specimens` (`id`, `sample_id`, `species_id`, `frequency`) VALUES
(1, 1, 3, 32),
(2, 1, 6, 6),
(3, 2, 2, 10),
(4, 2, 1, 213),
(5, 3, 3, 306);

-- --------------------------------------------------------

--
-- Table structure for table `bird_taxon`
--

CREATE TABLE IF NOT EXISTS `bird_taxon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `species_id` varchar(4) NOT NULL,
  `tsn` int(10) DEFAULT NULL,
  `common_name` varchar(100) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_id` (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bird_taxon`
--

INSERT INTO `bird_taxon` (`id`, `species_id`, `tsn`, `common_name`, `date_entered`) VALUES
(1, 'ABTO', NULL, 'Abert''s Towhee', NULL),
(2, 'BNST', NULL, 'Black-necked Stilt', NULL),
(3, 'HAGS', NULL, 'Harris'' Antelope Ground Squirrel', NULL),
(4, 'NOFL', NULL, 'Northern Flicker', NULL),
(5, 'UNWO', NULL, 'Unidentified Woodpecker', NULL),
(6, 'YWAR', NULL, 'Yellow Warbler', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bruchid_samples`
--

CREATE TABLE IF NOT EXISTS `bruchid_samples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_type` varchar(20) DEFAULT NULL,
  `tree_type` varchar(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `observer` varchar(255) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bruchid_samples`
--

INSERT INTO `bruchid_samples` (`id`, `site_type`, `tree_type`, `location`, `observer`, `collection_date`, `date_entered`, `site_id`) VALUES
(1, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:04:14', 50),
(2, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:04:57', 50),
(3, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:07:15', 50),
(4, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:07:45', 50),
(5, 'Desert', 'B', 'sadsad', 'asd', '2013-04-04', '2013-04-04 00:09:45', 50),
(6, 'Urban', 'F', 'asd', 'ad', '2013-04-04', '2013-04-04 00:11:14', 50);

-- --------------------------------------------------------

--
-- Table structure for table `bruchid_specimens`
--

CREATE TABLE IF NOT EXISTS `bruchid_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_no` varchar(10) NOT NULL,
  `pod_no` varchar(10) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `hole_count` int(10) DEFAULT NULL,
  `seed_count` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bruchid_specimens`
--

INSERT INTO `bruchid_specimens` (`id`, `tree_no`, `pod_no`, `sample_id`, `hole_count`, `seed_count`) VALUES
(1, 'a', '1', 4, 3, 3),
(2, 'a', '4', 4, 5, 5),
(3, '234', '234', 5, 536, 456),
(4, 'try', 'sdf', 5, 456, 456),
(5, 'sdf', 'sdf', 5, 4, 54),
(6, 's', 'sd', 5, 45, 45),
(7, 'asd', 'ad', 6, 32, 98);

-- --------------------------------------------------------

--
-- Table structure for table `cloud_cover`
--

CREATE TABLE IF NOT EXISTS `cloud_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cloud_cover_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cloud_cover`
--

INSERT INTO `cloud_cover` (`id`, `cloud_cover_name`) VALUES
(1, 'No Cloud Cover'),
(2, 'Scattered Clouds'),
(3, 'Overcast Sky');

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
  `site_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `type`, `recording_date`, `area`, `shrubcover`, `tree_canopy`, `lawn`, `other`, `paved_building`, `gravel_soil`, `water`, `num_traps`, `trap_arrange`, `percent_observed`, `radius`, `date_entered`, `site_id`, `school_id`) VALUES
(40, 'AR', '2013-02-26', 200, 0, 10, 10, 30, 10, 0, 10, 10, 'Line', NULL, NULL, '2013-04-01 21:45:14', 50, 1),
(41, 'BI', '2013-02-26', NULL, 0, 20, 30, 10, 10, 10, 0, NULL, NULL, 10, 10, '2013-04-01 20:39:50', 51, 1),
(42, 'AR', '2013-02-26', 199, NULL, 20, 10, 10, 10, 50, 0, 10, 'Line', NULL, NULL, '2013-03-26 22:19:27', 52, 2),
(43, 'BI', '2013-03-28', NULL, NULL, 20, 10, 20, 10, 10, 10, NULL, NULL, 20, 10, '2013-03-29 00:21:04', 53, 1),
(44, 'VE', '2013-04-01', 200, 0, 20, 30, 10, 10, 10, 20, NULL, NULL, NULL, NULL, '2013-04-01 20:36:54', 54, 1);

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
  `school` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `school`, `site_name`, `address`, `description`, `city`, `zipcode`, `date_entered`, `location`) VALUES
(50, 'Artho Site', 1, 'Arthropod Site at ASU', 'ASu', 'Near MU', 'Tempe', '85281', '2013-03-26 22:01:36', 'Tempe'),
(51, 'Bird Site', 1, 'Bird Site at ASU', 'ASu', 'ASu', 'Tempe', '85281', '2013-03-26 22:17:27', 'ASU'),
(52, 'Arthro', 2, 'Arthropod Site at USC', 'USC', 'USC', 'LA', '84785', '2013-03-26 22:18:58', 'USC'),
(53, 'Birds', 1, 'Birds Site', 'asd', 'asd', 'tempe', '85281', '2013-03-28 22:50:42', 'asd'),
(54, 'Veg Site', 1, 'Vegetation Site at ASU', 'asd', 'asd', 'tempe', '85281', '2013-04-01 20:36:32', 'asd');

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
(4, 'rohit@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'A', 'Rohit Srikanta', 1, '2013-03-06 10:18:36', '2013-04-03 23:35:57'),
(15, 'temp@asu.edu', '5ef3f435d713ec7e69ee08f93f42a322ce180627', 'T', 'temp', 1, '2013-03-11 10:17:48', '2013-03-27 03:23:20'),
(17, 'ryan@asu.edu', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'T', 'Ryan1', 1, '2013-03-17 06:17:14', '2013-03-28 22:04:26'),
(18, 'tempeee@asu.edu', 'd969831eb8a99cff8c02e681f43289e5d3d69664', 'T', 'tempeee', 1, '2013-03-29 00:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_classes`
--

CREATE TABLE IF NOT EXISTS `teachers_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `school` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school` (`school`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`id`, `class_name`, `grade`, `date_entered`, `teacher_id`, `school`) VALUES
(1, 'Mr. Smith Grade 12', '12', '2013-03-25 15:47:47', 4, 1),
(3, 'grade 12', 'grade', '2013-03-25 22:49:33', 4, 1),
(6, '13', '13', '2013-03-25 23:17:29', 4, 1),
(7, 'Temp Class', '7', '2013-03-26 22:16:26', 15, 1),
(8, 'Ryans Class', '8', '2013-03-28 00:07:38', 17, 1),
(9, 'Class 8', '8', '2013-04-01 20:38:03', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `veg_samples`
--

CREATE TABLE IF NOT EXISTS `veg_samples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_count` int(10) DEFAULT NULL,
  `cactus_count` int(10) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `observer` varchar(255) DEFAULT NULL,
  `shrub_count` int(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `habitat_id` (`habitat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `veg_samples`
--

INSERT INTO `veg_samples` (`id`, `tree_count`, `cactus_count`, `collection_date`, `observer`, `shrub_count`, `date_entered`, `site_id`, `habitat_id`) VALUES
(1, 10, 2, '2013-04-01', 'asd', 2, '2013-04-01 23:55:40', 54, 44),
(2, 1, 1, '2013-04-04', '3', 1, '2013-04-04 00:11:45', 54, 44);

-- --------------------------------------------------------

--
-- Table structure for table `veg_specimens`
--

CREATE TABLE IF NOT EXISTS `veg_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veg_no` varchar(50) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `plant_type` varchar(6) DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `circumference` double(15,5) DEFAULT NULL,
  `canopy` double(15,5) DEFAULT NULL,
  `height` double(15,5) DEFAULT NULL,
  `comments` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `species_id` (`species_id`),
  KEY `sample_id` (`sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `veg_specimens`
--

INSERT INTO `veg_specimens` (`id`, `veg_no`, `sample_id`, `plant_type`, `species_id`, `circumference`, `canopy`, `height`, `comments`) VALUES
(1, '123', 1, 'Cactus', 3, 1.00000, 1.00000, 1.00000, '32asd'),
(2, '123', 1, 'Shrub', 2, 4.00000, 7.00000, 8.00000, '92'),
(3, '1', 2, 'Shrub', 3, 1123.00000, 123.00000, 123.00000, '213'),
(4, '1', 2, 'Tree', 3, 213.00000, 213.00000, 213.00000, '213'),
(5, '1', 2, 'Cactus', 3, 213.00000, 123.00000, 123.00000, '213');

-- --------------------------------------------------------

--
-- Table structure for table `veg_taxon`
--

CREATE TABLE IF NOT EXISTS `veg_taxon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `species_id` varchar(6) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `common_name` varchar(100) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_id` (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `veg_taxon`
--

INSERT INTO `veg_taxon` (`id`, `species_id`, `type`, `common_name`, `date_entered`) VALUES
(1, 'Acagre', 'Tree', 'Cat claw acacia', '2013-04-01 15:41:57'),
(2, 'AloWri', 'Shrub', 'Aloysia wrightii', '2013-04-01 15:41:57'),
(3, 'AmbAmb', 'Shrub', 'Giant bursage', '2013-04-01 15:41:57'),
(4, 'AmbDel', 'Tree', 'Triangle leaf bursage', '2013-04-01 15:41:57');

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
  ADD CONSTRAINT `bird_samples_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`),
  ADD CONSTRAINT `bird_samples_ibfk_3` FOREIGN KEY (`cloud_cover`) REFERENCES `cloud_cover` (`id`);

--
-- Constraints for table `bird_specimens`
--
ALTER TABLE `bird_specimens`
  ADD CONSTRAINT `bird_specimens_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `bird_taxon` (`id`),
  ADD CONSTRAINT `bird_specimens_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `bird_samples` (`id`);

--
-- Constraints for table `bruchid_samples`
--
ALTER TABLE `bruchid_samples`
  ADD CONSTRAINT `bruchid_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `bruchid_specimens`
--
ALTER TABLE `bruchid_specimens`
  ADD CONSTRAINT `bruchid_specimens_ibfk_1` FOREIGN KEY (`sample_id`) REFERENCES `bruchid_samples` (`id`);

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

--
-- Constraints for table `veg_samples`
--
ALTER TABLE `veg_samples`
  ADD CONSTRAINT `veg_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `veg_samples_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `veg_specimens`
--
ALTER TABLE `veg_specimens`
  ADD CONSTRAINT `veg_specimens_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `veg_taxon` (`id`),
  ADD CONSTRAINT `veg_specimens_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `veg_samples` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
