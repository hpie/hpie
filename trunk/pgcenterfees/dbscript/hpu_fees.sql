-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2013 at 03:33 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hpu_fees`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_cash`
--

CREATE TABLE IF NOT EXISTS `c_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL COMMENT 'FK for t_receipt',
  `rs_1` int(11) NOT NULL DEFAULT '0',
  `rs_2` int(11) NOT NULL DEFAULT '0',
  `rs_5` int(11) NOT NULL DEFAULT '0',
  `rs_10` int(11) NOT NULL DEFAULT '0',
  `rs_20` int(11) NOT NULL DEFAULT '0',
  `rs_50` int(11) NOT NULL DEFAULT '0',
  `rs_100` int(11) NOT NULL DEFAULT '0',
  `rs_500` int(11) NOT NULL DEFAULT '0',
  `rs_1000` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c_cash`
--


-- --------------------------------------------------------

--
-- Table structure for table `c_dd`
--

CREATE TABLE IF NOT EXISTS `c_dd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL COMMENT 'FK for t_receipt',
  `dd_no` varchar(100) NOT NULL,
  `dd_dt` date NOT NULL,
  `dd_exp_dt` date NOT NULL,
  `bank_id` varchar(20) NOT NULL,
  `dd_amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c_dd`
--


-- --------------------------------------------------------

--
-- Table structure for table `c_ipo`
--

CREATE TABLE IF NOT EXISTS `c_ipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL COMMENT 'FK for t_receipt',
  `ipo_1` int(11) NOT NULL DEFAULT '0',
  `ipo_2` int(11) NOT NULL DEFAULT '0',
  `ipo_5` int(11) NOT NULL DEFAULT '0',
  `ipo_10` int(11) NOT NULL DEFAULT '0',
  `ipo_20` int(11) NOT NULL DEFAULT '0',
  `ipo_50` int(11) NOT NULL DEFAULT '0',
  `ipo_100` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c_ipo`
--


-- --------------------------------------------------------

--
-- Table structure for table `c_ipo_detail`
--

CREATE TABLE IF NOT EXISTS `c_ipo_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL COMMENT 'FK for t_receipt',
  `ipo_type` varchar(20) NOT NULL,
  `ipo_number` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c_ipo_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_bank`
--

CREATE TABLE IF NOT EXISTS `m_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `bank_ifsc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bank_id` (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_bank`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_department`
--

CREATE TABLE IF NOT EXISTS `m_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` varchar(20) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `admfee_contfee` float NOT NULL,
  `late_readm_fee` float NOT NULL,
  `tution_fee` float NOT NULL,
  `regd_fee` float NOT NULL,
  `sports_fee` float NOT NULL,
  `welfate_fund` float NOT NULL,
  `cultural_activity` float NOT NULL,
  `computer_fee` float NOT NULL,
  `exam_fee` float NOT NULL,
  `medical_fund` float NOT NULL,
  `hh_fee` float NOT NULL,
  `depapidation_fee` float NOT NULL,
  `delay_fine` float NOT NULL,
  `breakage_fee` float NOT NULL,
  `practical_fee` float NOT NULL,
  `teaching_practice_fee` float NOT NULL,
  `caution_fee` float NOT NULL,
  `extension_fee_lecture` float NOT NULL,
  `maintenace_fee` float NOT NULL,
  `pop_edu_fee` float NOT NULL,
  `building_fund` float NOT NULL,
  `common_room_fee` float NOT NULL,
  `identity_card_fee` float NOT NULL,
  `magazine_fee` float NOT NULL,
  `amalgamated_fund` float NOT NULL,
  `red_cross_fee` float NOT NULL,
  `other_fee` float NOT NULL,
  `lib_security` float NOT NULL,
  `poor_student_aid_fund` float NOT NULL,
  `misc_fee` float NOT NULL,
  `postal_charges` float NOT NULL,
  `library_fee` float NOT NULL,
  `exam_extra_fee` float NOT NULL,
  `migration_fee` float NOT NULL,
  `news_letter_fee` float NOT NULL,
  `general_dev_fee` float NOT NULL,
  `rent_viva` float NOT NULL,
  `pcp` float NOT NULL,
  `is_icdeol` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_department`
--

INSERT INTO `m_department` (`id`, `department_id`, `department_name`, `admfee_contfee`, `late_readm_fee`, `tution_fee`, `regd_fee`, `sports_fee`, `welfate_fund`, `cultural_activity`, `computer_fee`, `exam_fee`, `medical_fund`, `hh_fee`, `depapidation_fee`, `delay_fine`, `breakage_fee`, `practical_fee`, `teaching_practice_fee`, `caution_fee`, `extension_fee_lecture`, `maintenace_fee`, `pop_edu_fee`, `building_fund`, `common_room_fee`, `identity_card_fee`, `magazine_fee`, `amalgamated_fund`, `red_cross_fee`, `other_fee`, `lib_security`, `poor_student_aid_fund`, `misc_fee`, `postal_charges`, `library_fee`, `exam_extra_fee`, `migration_fee`, `news_letter_fee`, `general_dev_fee`, `rent_viva`, `pcp`, `is_icdeol`, `status`) VALUES
(1, 'law', 'legal studies', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'com', 'Business Studies', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_login`
--

CREATE TABLE IF NOT EXISTS `m_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_type` int(11) NOT NULL COMMENT '3 read, 5 read-write, 7 admin',
  `department_id` varchar(20) NOT NULL COMMENT 'FK for Department',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '0=disable ,  1- enable',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_login`
--

INSERT INTO `m_login` (`id`, `fname`, `lname`, `userid`, `password`, `access_type`, `department_id`, `last_login`, `status`) VALUES
(1, 'Sunil', 'Verma', 'sverma', 'sverma', 5, 'law', '0000-00-00 00:00:00', 1),
(2, 'Prince', 'Sharma', 'psharma', 'psharma', 5, 'com', '0000-00-00 00:00:00', 1),
(3, 'Sanjay', 'Verma', 'sanjayv', 'sanjayv', 7, 'law', '2013-06-25 23:44:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_student`
--

CREATE TABLE IF NOT EXISTS `m_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(100) NOT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `f_fname` varchar(100) DEFAULT NULL,
  `f_lname` varchar(100) DEFAULT NULL,
  `m_fname` varchar(100) DEFAULT NULL,
  `m_lname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_no` (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_receipt`
--

CREATE TABLE IF NOT EXISTS `t_receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(100) NOT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `department_id` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL COMMENT 'CASH, DD, IPO',
  `amount` float NOT NULL,
  `received_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_receipt`
--

