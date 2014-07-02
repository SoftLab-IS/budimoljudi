-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2014 at 07:47 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ljudi`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_start` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `time_end` timestamp NULL DEFAULT NULL,
  `number_of_participants` int(11) DEFAULT NULL,
  `Location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_action_user_idx` (`user_id`),
  KEY `fk_action_Location1_idx` (`Location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `title`, `time_start`, `description`, `user_id`, `time_end`, `number_of_participants`, `Location_id`) VALUES
(2, 'Nako neka akcija', '2014-05-26 18:00:00', 'Драги моји пријатељи, поштоване колеге из медија, преклињем вас, немојте да и даље остајемо у медијском мраку и цензури. У току евакуације, са све ћерком од две и по године у рукама, покушавала сам да прикупим што више информација јер сам се задржала око 2-3 сата на месту где су нас из чамаца смештали у аутобусе који су нас возили за Београд. Ту, испред хотела, био је центар збивања, доношења и размењивања информација битних људи који су покушавали да помогну и збрину што више људи. Једном новинар увек новинар- имала сам огромне уши, а ту су била и питања на којих сам чак и успевала да добијем одговоре! Хтела сам да сачекам да мало прође, али нећу да ћутим!', 11, '2014-05-28 18:00:00', 1, 12),
(3, 'Vako neka akcija', '2014-05-24 22:00:00', 'Драги моји пријатељи, поштоване колеге из медија, преклињем вас, немојте да и даље остајемо у медијском мраку и цензури. У току евакуације, са све ћерком од две и по године у рукама, покушавала сам да прикупим што више информација јер сам се задржала око 2-3 сата на месту где су нас из чамаца смештали у аутобусе који су нас возили за Београд. Ту, испред хотела, био је центар збивања, доношења и размењивања информација битних људи који су покушавали да помогну и збрину што више људи. Једном новинар увек новинар- имала сам огромне уши, а ту су била и питања на којих сам чак и успевала да добијем одговоре! Хтела сам да сачекам да мало прође, али нећу да ћутим!', 12, '2014-05-30 16:00:00', 1, 14),
(4, 'Ko neka akcija', '2014-05-25 15:40:44', 'test', 10, '2014-05-25 15:40:44', NULL, 16),
(5, 'Okopavanje kukuruza', '2014-06-09 09:26:35', 'Dulum kukuruza.', 14, '2014-06-09 09:26:35', NULL, 19),
(6, 'test aktivna akcija do sutra', '2014-06-09 10:43:43', 'test datuma', 14, '2014-06-09 22:00:00', 1, 20),
(7, 'Akcija novi user', '2014-06-08 22:00:00', 'Nako neka akcija od novog usera', 15, '2014-06-09 17:00:00', 1, 21),
(8, 'Nako neka akcija izmjenjena', '2014-06-10 17:00:00', 'nako neka akcija', 16, '2014-06-12 19:00:00', NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `action_users`
--

CREATE TABLE IF NOT EXISTS `action_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_action_users_user1_idx` (`user_id`),
  KEY `fk_action_users_action1_idx` (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `action_users`
--

INSERT INTO `action_users` (`id`, `user_id`, `action_id`) VALUES
(5, 11, 2),
(6, 14, 6),
(7, 14, 3),
(8, 16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ptt` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`ptt`),
  KEY `fk_city_region1_idx` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=120001 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ptt`, `name`, `region_id`) VALUES
(3200, 'Cacak', 17),
(3400, 'Kragujevac', 17),
(3500, 'Jagodina', 17),
(10000, 'Pristina', 19),
(11000, 'Beograd', 16),
(12000, 'Pozarevac', 18),
(14000, 'Valjevo ', 17),
(15000, 'Sabac', 17),
(16000, 'Leskovac', 18),
(17500, 'Vranje', 18),
(18000, 'Nis', 18),
(18300, 'Pirot', 18),
(18400, 'Prokuplje', 18),
(19000, 'Zajecar', 18),
(19210, 'Bor', 18),
(20500, 'Orahovac ', 1),
(21000, 'Novi Sad', 15),
(22000, 'Sremska Mitrovica', 15),
(23000, 'Zrenjanin', 15),
(23300, 'Kikinda', 15),
(24000, 'Subotica', 15),
(25000, 'Sombor', 15),
(26000, 'Pancevo', 15),
(31000, 'Uzice', 17),
(32000, 'Vukovar', 3),
(34000, 'Požega', 3),
(35000, 'Slavonski Brod', 3),
(36000, 'Kraljevo', 17),
(37000, 'Krusevac', 17),
(38220, 'Kosovska Mitrovica', 19),
(38304, 'Pec', 19),
(38401, 'Prizren', 19),
(71000, 'Sarjevo', 12),
(71123, 'Istocno Sarajevo', 9),
(72000, 'Zenica', 13),
(73300, 'Foca', 14),
(74000, 'Doboj', 8),
(75000, 'Tuzla', 1),
(76000, 'Brcko', 20),
(76300, 'Bijeljina', 1),
(78000, 'Banjaluka', 7),
(79101, 'Prijedor', 7),
(89000, 'Trebinje', 14),
(120000, 'Pozarevac', 18);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `types` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `Location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_help_user1_idx` (`user_id`),
  KEY `fk_help_Location1_idx` (`Location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `time`, `types`, `description`, `user_id`, `Location_id`) VALUES
(8, NULL, '1', 'Imam praznu kuću koju mogu da ustupim jednoj porodici.', 9, 10),
(9, NULL, '2', 'nudim hranu', 10, 11),
(10, NULL, '1', 'Namjesten stan', 11, 13),
(11, NULL, '1', 'test', 12, 15),
(12, NULL, '1', 'test', 13, 17),
(13, NULL, '123', 'Test nako neki', 14, 18),
(14, NULL, '123', 'Ja baraba nudim sve vrste pomoci', 16, 22);

-- --------------------------------------------------------

--
-- Table structure for table `help_has_types`
--

CREATE TABLE IF NOT EXISTS `help_has_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `help_id` int(11) NOT NULL,
  `help_types_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_help_has_types_help1_idx` (`help_id`),
  KEY `fk_help_has_types_help_types1_idx` (`help_types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `help_has_types`
--

INSERT INTO `help_has_types` (`id`, `help_id`, `help_types_id`) VALUES
(45, 8, 1),
(46, 9, 2),
(47, 10, 1),
(48, 11, 1),
(49, 12, 1),
(50, 13, 1),
(51, 13, 2),
(52, 13, 3),
(61, 14, 1),
(62, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `help_types`
--

CREATE TABLE IF NOT EXISTS `help_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `help_types`
--

INSERT INTO `help_types` (`id`, `name`, `description`) VALUES
(1, 'Smještaj', 'Mogu da dam nekome smještaj.'),
(2, 'Hrana', 'Mogu da hranim neku porodicu.'),
(3, 'Voda', 'Imam bunar');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `city_ptt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Location_state1_idx` (`state_id`),
  KEY `fk_Location_region1_idx` (`region_id`),
  KEY `fk_Location_city1_idx` (`city_ptt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `state_id`, `region_id`, `city_ptt`) VALUES
(10, 1, 9, 71123),
(11, 2, 15, 21000),
(12, 1, 7, 78000),
(13, 2, 15, 21000),
(14, 1, 1, 20500),
(15, 1, 1, 20500),
(16, 1, 9, 71123),
(17, 1, 1, 20500),
(18, 1, 1, 20500),
(19, 2, 15, 21000),
(20, 1, 1, 20500),
(21, 1, 1, 75000),
(22, 1, 1, 20500),
(23, 1, 1, 20500);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `image`, `user_id`, `date`) VALUES
(1, 'Nako neki tekst na blogu', 'adasdasmfnkasfk.asfasfasfnakfaksnfklankankngkldsngkdsnkgkgnkdslfklffdsknfksffnskdnksngsnknskngksgkngksdngsgnskdlngksngksnkdsngknskgnskngklsgklns', 'raso.PNG', 16, '2014-07-01 05:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_region_state1_idx` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `state_id`) VALUES
(1, 'Tuzlanska', 1),
(2, 'Centralna Hrvatska', 3),
(3, 'Istocna Hrvatska', 3),
(4, 'Planinska Hrvatska', 3),
(5, 'Sjeverna Hrvatska obala', 3),
(6, 'Juzna Hrvatska obala/Dalmacija', 1),
(7, 'Banjalucka', 1),
(8, 'Dobojsko-bijeljinska', 1),
(9, 'Sarajevsko-zvornicka', 1),
(12, 'Sarajevska', 1),
(13, 'Zenicko-dobojska', 1),
(14, 'Trebinjsko-focanksa', 1),
(15, 'Vojvodina', 2),
(16, 'Beograd', 2),
(17, 'Sumadija i zapadna Srbija', 2),
(18, 'Juzna i istocna Srbija', 2),
(19, 'Kosovo i Metohija', 2),
(20, 'Distrikt Brcko', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Bosna i Hercegovina'),
(2, 'Srbija'),
(3, 'Hrvatska');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1400931097),
('m140516_233128_inicial', 1400931102),
('m140523_142327_delete_last_name_from_table_user', 1400931102),
('m140524_073610_add_tabel_action_users', 1400931103),
('m140524_091718_insert_cities', 1400932902),
('m140524_111137_add_location_table', 1400931630),
('m140524_151721_add_table_for_help_types', 1400944677);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `type`, `email`, `phone`, `password`) VALUES
(9, 'Volonter Smještaj', NULL, 'volonter', 'volonter@mail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(10, 'Volonter Hrana', NULL, 'kompletan', 'volonter@hrana.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(11, 'Pokretač Nako', NULL, 'kompletan', 'pokretac@mail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(12, 'samo pokretac', NULL, 'kompletan', 'pokretac@gmail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(13, 'Igor', NULL, 'volonter', 'golub.konj@gmial.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(14, 'Igor konj', NULL, 'kompletan', 'konj@gmail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(15, 'Akcija Akcijic', NULL, 'kompletan', 'akcija@gmail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c'),
(16, 'Igor Golub', NULL, 'admin', 'golub@gmail.com', NULL, '1bed2e6bba53bf08328ab88464771d2c');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `fk_action_Location1` FOREIGN KEY (`Location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_action_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `action_users`
--
ALTER TABLE `action_users`
  ADD CONSTRAINT `fk_action_users_action1` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_action_users_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `help`
--
ALTER TABLE `help`
  ADD CONSTRAINT `fk_help_Location1` FOREIGN KEY (`Location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_help_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `help_has_types`
--
ALTER TABLE `help_has_types`
  ADD CONSTRAINT `fk_help_has_types_help1` FOREIGN KEY (`help_id`) REFERENCES `help` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_help_has_types_help_types1` FOREIGN KEY (`help_types_id`) REFERENCES `help_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_Location_city1` FOREIGN KEY (`city_ptt`) REFERENCES `city` (`ptt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_state1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk_region_state1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
