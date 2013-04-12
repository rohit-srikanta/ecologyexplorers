-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2013 at 12:12 AM
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
  `teachers_class_id` int(11) NOT NULL,
  `habitat_id` int(11) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `observer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `teachers_class_id` (`teachers_class_id`),
  KEY `habitat_id` (`habitat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `arthro_samples`
--

INSERT INTO `arthro_samples` (`id`, `site_id`, `teachers_class_id`, `habitat_id`, `collection_date`, `comments`, `date_entered`, `observer`) VALUES
(54, 50, 1, 40, '2013-03-26', 'Recording from site Arthro', '2013-03-26 22:02:31', 'Rohit'),
(55, 50, 1, 40, '2013-03-26', 'asd', '2013-03-26 22:40:06', 'Ryan'),
(56, 50, 1, 40, '2013-03-28', 'qwe', '2013-03-28 00:08:29', 'ryan'),
(57, 50, 1, 40, '2013-03-31', '', '2013-04-01 20:39:17', 'test'),
(58, 50, 1, 40, '2013-04-04', 'asd', '2013-04-04 00:10:31', '1232312'),
(59, 50, 3, 40, '2013-04-09', 'sdf', '2013-04-09 23:27:33', 'sad'),
(60, 52, 10, 42, '2013-04-11', 'asd', '2013-04-11 18:45:51', 'USC'),
(61, 50, 1, 40, '2013-04-11', '123', '2013-04-11 23:19:38', 'fgh');

-- --------------------------------------------------------

--
-- Table structure for table `arthro_specimens`
--

CREATE TABLE IF NOT EXISTS `arthro_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trap_no` varchar(20) NOT NULL,
  `arthro_taxon_id` int(11) DEFAULT NULL,
  `frequency` int(10) NOT NULL,
  `arthro_sample_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `arthro_taxon_id` (`arthro_taxon_id`),
  KEY `arthro_sample_id` (`arthro_sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `arthro_specimens`
--

INSERT INTO `arthro_specimens` (`id`, `trap_no`, `arthro_taxon_id`, `frequency`, `arthro_sample_id`) VALUES
(1, '12', 1, 1, 54),
(2, '13', 2, 3, 54),
(3, '1', 2, 3, 55),
(4, '2', 3, 4, 55),
(5, '1', 1, 123, 56),
(6, '1', 2, 10, 57),
(7, '2', 1, 10, 57),
(8, 'asd', 2, 123, 58),
(9, 'asd', 3, 132, 58),
(10, '12', 1, 123, 59),
(11, '12', 3, 121, 59),
(12, '12', 1, 1, 60),
(13, '1', 2, 1, 60),
(14, '324', 3, 22, 60),
(15, 'a', 1, 1, 61),
(16, 'as', 2, 2, 61),
(17, '123', 3, 21, 61);

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
  `teachers_class_id` int(11) NOT NULL,
  `observer` varchar(255) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `air_temp` int(4) DEFAULT NULL,
  `cloud_cover_id` int(11) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `habitat_id` (`habitat_id`),
  KEY `teachers_class_id` (`teachers_class_id`),
  KEY `cloud_cover_id` (`cloud_cover_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bird_samples`
--

INSERT INTO `bird_samples` (`id`, `site_id`, `habitat_id`, `teachers_class_id`, `observer`, `collection_date`, `time_start`, `time_end`, `air_temp`, `cloud_cover_id`, `comments`, `date_entered`) VALUES
(1, 51, 41, 1, 'Rohit', '2013-03-31', '05:04:00', '10:04:00', 45, 1, 'sd', '2013-04-01 20:04:53'),
(2, 51, 41, 1, '321', '2013-03-31', '03:39:00', '13:39:00', 89, 2, '55', '2013-04-01 20:41:00'),
(3, 51, 41, 1, 'sad', '2013-04-04', '17:10:00', '17:10:00', 78, 2, 'asd', '2013-04-04 00:10:55'),
(4, 51, 41, 1, 'asd', '2013-04-05', '17:08:00', '17:08:00', 185, 1, 'asd', '2013-04-09 00:09:12'),
(5, 55, 45, 1, 'ucs', '2013-04-06', '02:30:00', '14:30:00', 78, 1, 'sad', '2013-04-09 21:31:07'),
(6, 51, 41, 1, 'asd', '2013-04-09', '04:17:00', '16:17:00', 73, 2, 'asd', '2013-04-09 23:18:00'),
(9, 55, 45, 10, 'asd', '2013-04-11', '06:47:00', '11:47:00', 80, 2, 'asd', '2013-04-11 18:47:50'),
(10, 51, 41, 3, 'qwe', '2013-04-11', '15:19:00', '16:19:00', 100, 1, 'qe', '2013-04-11 23:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `bird_specimens`
--

CREATE TABLE IF NOT EXISTS `bird_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_sample_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `frequency` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `species_id` (`species_id`),
  KEY `bird_sample_id` (`bird_sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bird_specimens`
--

INSERT INTO `bird_specimens` (`id`, `bird_sample_id`, `species_id`, `frequency`) VALUES
(1, 1, 3, 32),
(2, 1, 6, 6),
(3, 2, 2, 10),
(4, 2, 1, 213),
(5, 3, 3, 306),
(6, 4, 3, 22),
(7, 4, 6, 77),
(8, 5, 1, 1),
(9, 5, 5, 2),
(10, 5, 2, 1),
(11, 5, 5, 2),
(12, 5, 6, 1),
(13, 6, 3, 1),
(14, 6, 4, 1),
(15, 9, 2, 23),
(16, 9, 4, 234),
(17, 10, 3, 12),
(18, 10, 5, 12);

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
  `teachers_class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_class_id` (`teachers_class_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bruchid_samples`
--

INSERT INTO `bruchid_samples` (`id`, `site_type`, `tree_type`, `location`, `observer`, `collection_date`, `date_entered`, `site_id`, `teachers_class_id`) VALUES
(1, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:04:14', 50, 1),
(2, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:04:57', 50, 1),
(3, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:07:15', 50, 1),
(4, 'Urban', 'B', 'asd', 'ad', '2013-04-04', '2013-04-04 00:07:45', 50, 1),
(5, 'Desert', 'B', 'sadsad', 'asd', '2013-04-04', '2013-04-04 00:09:45', 50, 1),
(6, 'Urban', 'F', 'asd', 'ad', '2013-04-08', '2013-04-04 00:11:14', 50, 1),
(7, 'Urban', 'B', 'fddg', 'asd', '2013-04-09', '2013-04-09 23:32:34', 56, 3),
(8, 'Desert', 'B', 'asd', 'usc', '2013-04-11', '2013-04-11 18:50:22', 58, 10),
(9, 'Desert', 'B', '12', 'ewf', '2013-04-11', '2013-04-11 23:20:21', 56, 9);

-- --------------------------------------------------------

--
-- Table structure for table `bruchid_specimens`
--

CREATE TABLE IF NOT EXISTS `bruchid_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_no` varchar(10) NOT NULL,
  `pod_no` varchar(10) NOT NULL,
  `bruchid_sample_id` int(11) NOT NULL,
  `hole_count` int(10) DEFAULT NULL,
  `seed_count` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bruchid_sample_id` (`bruchid_sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bruchid_specimens`
--

INSERT INTO `bruchid_specimens` (`id`, `tree_no`, `pod_no`, `bruchid_sample_id`, `hole_count`, `seed_count`) VALUES
(1, 'a', '1', 4, 3, 3),
(2, 'a', '4', 4, 5, 5),
(3, '234', '234', 5, 536, 456),
(4, 'try', 'sdf', 5, 456, 456),
(5, 'sdf', 'sdf', 6, 4, 54),
(6, 's', 'sd', 6, 45, 45),
(7, 'asd', 'ad', 6, 32, 98),
(8, 'as', 'as', 7, 2, 1),
(9, 'as', 'as', 8, 10, 10),
(10, 'sa', 'sa', 8, 2, 2),
(11, 'as', 'as', 8, 2, 8),
(12, 'w', 'w', 9, 21, 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `type`, `recording_date`, `area`, `shrubcover`, `tree_canopy`, `lawn`, `other`, `paved_building`, `gravel_soil`, `water`, `num_traps`, `trap_arrange`, `percent_observed`, `radius`, `date_entered`, `site_id`, `school_id`) VALUES
(40, 'AR', '2013-02-26', 200, 0, 10, 10, 30, 10, 0, 10, 10, 'Line', NULL, NULL, '2013-04-01 21:45:14', 50, 1),
(41, 'BI', '2013-02-26', NULL, 0, 20, 30, 10, 10, 10, 0, NULL, NULL, 10, 10, '2013-04-01 20:39:50', 51, 1),
(42, 'AR', '2013-02-26', 199, 0, 20, 10, 10, 10, 50, 0, 20, 'Line', NULL, NULL, '2013-04-11 18:45:36', 52, 2),
(44, 'VE', '2013-04-01', 200, 0, 20, 30, 10, 10, 10, 20, NULL, NULL, NULL, NULL, '2013-04-01 20:36:54', 54, 1),
(45, 'BI', '2013-04-09', NULL, 50, 30, 0, 10, 50, 10, 10, NULL, NULL, 10, 10, '2013-04-09 21:30:32', 55, 2),
(46, 'AR', '2013-04-09', 100, 0, 0, 0, 0, 0, 0, 0, 0, 'Line', NULL, NULL, '2013-04-09 22:37:15', 56, 1),
(47, 'VE', '2013-04-11', 200, 30, 20, 10, 0, 0, 20, 30, NULL, NULL, NULL, NULL, '2013-04-11 18:48:28', 57, 2),
(48, 'BR', '2013-04-11', NULL, 20, 20, 0, 0, 60, 0, 0, NULL, NULL, NULL, NULL, '2013-04-11 18:49:56', 58, 2);

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
  `school_id` int(11) NOT NULL,
  `site_name` varchar(40) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_id` (`site_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `school_id`, `site_name`, `address`, `description`, `city`, `zipcode`, `date_entered`, `location`) VALUES
(50, 'Artho Site', 1, 'Arthropod Site at ASU', 'ASu', 'Near MU', 'Tempe', '85281', '2013-03-26 22:01:36', 'Tempe'),
(51, 'Bird Site', 1, 'Bird Site at ASU', 'ASu', 'ASu', 'Tempe', '85281', '2013-03-26 22:17:27', 'ASU'),
(52, 'Arthro', 2, 'Arthropod Site at USC', 'USC', 'USC', 'LA', '84785', '2013-03-26 22:18:58', 'USC'),
(53, 'Birds', 1, 'Birds Site', 'asd', 'asd', 'tempe', '85281', '2013-03-28 22:50:42', 'asd'),
(54, 'Veg Site', 1, 'Vegetation Site at ASU', 'asd', 'asd', 'tempe', '85281', '2013-04-01 20:36:32', 'asd'),
(55, '2', 2, 'birds at USC', 'asd', 'asd', 'usc', '85281', '2013-04-09 21:30:31', 'asd'),
(56, 'asd', 1, 'ads', 'ads', 'asd', 'asd', '85281', '2013-04-09 22:37:15', 'ad'),
(57, 'Veg Site at ASU', 2, 'Veg Site at ASU', 'df', 'asd', 'LA', '85214', '2013-04-11 18:48:28', 'asd'),
(58, 'Bruchid Site', 2, 'Bruchid Site', 'asd', 'asd', 'LA', '85244', '2013-04-11 18:49:56', 'asd');

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
  `school_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `email_address_2` (`email_address`,`password`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email_address`, `password`, `type`, `name`, `school_id`, `date_created`, `last_login`) VALUES
(4, 'rohit@asu.edu', '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76', 'A', 'Rohit Srikanta', 1, '2013-03-06 10:18:36', '2013-04-11 23:50:55'),
(15, 'temp@asu.edu', '5ef3f435d713ec7e69ee08f93f42a322ce180627', 'T', 'temp', 1, '2013-03-11 10:17:48', '2013-03-27 03:23:20'),
(17, 'ryan@asu.edu', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'T', 'Ryan1', 1, '2013-03-17 06:17:14', '2013-03-28 22:04:26'),
(18, 'tempeee@asu.edu', 'd969831eb8a99cff8c02e681f43289e5d3d69664', 'T', 'tempeee', 1, '2013-03-29 00:08:52', NULL),
(19, 'usc@usc.edu', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'T', 'USC11', 2, '2013-04-09 21:29:22', '2013-04-11 22:05:34');

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
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`id`, `class_name`, `grade`, `date_entered`, `teacher_id`, `school_id`) VALUES
(1, 'Mr. Smith Grade 12', '12', '2013-03-25 15:47:47', 4, 1),
(3, 'grade 12', 'grade', '2013-03-25 22:49:33', 4, 1),
(6, '13', '13', '2013-03-25 23:17:29', 4, 1),
(7, 'Temp Class', '7', '2013-03-26 22:16:26', 15, 1),
(8, 'Ryans Class', '8', '2013-03-28 00:07:38', 17, 1),
(9, 'Class 8', '8', '2013-04-01 20:38:03', 4, 1),
(10, 'usc', 'usc 12', '2013-04-09 21:29:50', 19, 2),
(16, '123', '123', '2013-04-09 22:31:46', 4, 1);

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
  `teachers_class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `teachers_class_id` (`teachers_class_id`),
  KEY `habitat_id` (`habitat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `veg_samples`
--

INSERT INTO `veg_samples` (`id`, `tree_count`, `cactus_count`, `collection_date`, `observer`, `shrub_count`, `date_entered`, `site_id`, `habitat_id`, `teachers_class_id`) VALUES
(1, 10, 2, '2013-04-01', 'asd', 2, '2013-04-01 23:55:40', 54, 44, 1),
(2, 1, 1, '2013-04-04', '3', 1, '2013-04-04 00:11:45', 54, 44, 1),
(3, 2, 2, '2013-04-09', '234', 2, '2013-04-09 23:28:09', 54, 44, 1),
(4, 2, 2, '2013-04-09', '234', 2, '2013-04-09 23:28:09', 54, 44, 1),
(5, 2, 2, '2013-04-11', 'usc', 0, '2013-04-11 18:49:28', 57, 47, 10),
(6, 1, 1, '2013-04-11', 'dfdsf', 1, '2013-04-11 23:20:49', 54, 44, 6);

-- --------------------------------------------------------

--
-- Table structure for table `veg_specimens`
--

CREATE TABLE IF NOT EXISTS `veg_specimens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veg_no` varchar(50) NOT NULL,
  `veg_sample_id` int(11) NOT NULL,
  `plant_type` varchar(6) DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `circumference` double(15,5) DEFAULT NULL,
  `canopy` double(15,5) DEFAULT NULL,
  `height` double(15,5) DEFAULT NULL,
  `comments` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `species_id` (`species_id`),
  KEY `veg_sample_id` (`veg_sample_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `veg_specimens`
--

INSERT INTO `veg_specimens` (`id`, `veg_no`, `veg_sample_id`, `plant_type`, `species_id`, `circumference`, `canopy`, `height`, `comments`) VALUES
(1, '123', 1, 'Cactus', 3, 1.00000, 1.00000, 1.00000, '32asd'),
(2, '123', 1, 'Shrub', 2, 4.00000, 7.00000, 8.00000, '92'),
(3, '1', 2, 'Shrub', 3, 1123.00000, 123.00000, 123.00000, '213'),
(4, '1', 2, 'Tree', 3, 213.00000, 213.00000, 213.00000, '213'),
(5, '1', 2, 'Cactus', 3, 213.00000, 123.00000, 123.00000, '213'),
(6, '2', 3, 'Tree', 2, 213.00000, 123.00000, 13.00000, '113'),
(7, '2', 3, 'Cactus', 4, 123.00000, 13.00000, 132.00000, '132'),
(8, '2', 4, 'Tree', 2, 213.00000, 123.00000, 13.00000, '113'),
(9, '2', 4, 'Cactus', 4, 123.00000, 13.00000, 132.00000, '132'),
(10, '1', 5, 'Tree', 1, 23.00000, 23.00000, 123.00000, '123'),
(11, '2', 5, 'Cactus', 3, 12.00000, 12.00000, 12.00000, '21'),
(12, '1', 6, 'Tree', 2, 12.00000, 123.00000, 213.00000, '213');

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
  ADD CONSTRAINT `arthro_samples_ibfk_2` FOREIGN KEY (`teachers_class_id`) REFERENCES `teachers_classes` (`id`),
  ADD CONSTRAINT `arthro_samples_ibfk_3` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `arthro_specimens`
--
ALTER TABLE `arthro_specimens`
  ADD CONSTRAINT `arthro_specimens_ibfk_1` FOREIGN KEY (`arthro_taxon_id`) REFERENCES `arthro_taxon` (`id`),
  ADD CONSTRAINT `arthro_specimens_ibfk_2` FOREIGN KEY (`arthro_sample_id`) REFERENCES `arthro_samples` (`id`);

--
-- Constraints for table `bird_samples`
--
ALTER TABLE `bird_samples`
  ADD CONSTRAINT `bird_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `bird_samples_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`),
  ADD CONSTRAINT `bird_samples_ibfk_3` FOREIGN KEY (`teachers_class_id`) REFERENCES `teachers_classes` (`id`),
  ADD CONSTRAINT `bird_samples_ibfk_4` FOREIGN KEY (`cloud_cover_id`) REFERENCES `cloud_cover` (`id`);

--
-- Constraints for table `bird_specimens`
--
ALTER TABLE `bird_specimens`
  ADD CONSTRAINT `bird_specimens_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `bird_taxon` (`id`),
  ADD CONSTRAINT `bird_specimens_ibfk_2` FOREIGN KEY (`bird_sample_id`) REFERENCES `bird_samples` (`id`);

--
-- Constraints for table `bruchid_samples`
--
ALTER TABLE `bruchid_samples`
  ADD CONSTRAINT `bruchid_samples_ibfk_1` FOREIGN KEY (`teachers_class_id`) REFERENCES `teachers_classes` (`id`),
  ADD CONSTRAINT `bruchid_samples_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `bruchid_specimens`
--
ALTER TABLE `bruchid_specimens`
  ADD CONSTRAINT `bruchid_specimens_ibfk_1` FOREIGN KEY (`bruchid_sample_id`) REFERENCES `bruchid_samples` (`id`);

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
  ADD CONSTRAINT `sites_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `teachers_classes`
--
ALTER TABLE `teachers_classes`
  ADD CONSTRAINT `teachers_classes_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `teachers_classes_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `veg_samples`
--
ALTER TABLE `veg_samples`
  ADD CONSTRAINT `veg_samples_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `veg_samples_ibfk_2` FOREIGN KEY (`teachers_class_id`) REFERENCES `teachers_classes` (`id`),
  ADD CONSTRAINT `veg_samples_ibfk_3` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `veg_specimens`
--
ALTER TABLE `veg_specimens`
  ADD CONSTRAINT `veg_specimens_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `veg_taxon` (`id`),
  ADD CONSTRAINT `veg_specimens_ibfk_2` FOREIGN KEY (`veg_sample_id`) REFERENCES `veg_samples` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
