-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 04:24 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hpseb_pension`
--

-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_ID` varchar(50) NOT NULL,
  `employee_first_name` varchar(50) NOT NULL,
  `employee_middle_name` varchar(50) DEFAULT NULL,
  `employee_last_name` varchar(50) NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_dor` date NOT NULL,
  `employee_retire_desig` varchar(50) NOT NULL,
  `employee_bank` varchar(50) NOT NULL,
  `employee_bank_branch` varchar(50) DEFAULT NULL,
  `employee_bank_acc_no` varchar(50) NOT NULL,
  `employee_bank_ppo_no` varchar(50) NOT NULL,
  `employee_pension_type` varchar(50) NOT NULL,
  `employee_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hpseb_employee`
--

INSERT INTO `hpseb_employee` (`ID`, `employee_ID`, `employee_first_name`, `employee_middle_name`, `employee_last_name`, `employee_dob`, `employee_dor`, `employee_retire_desig`, `employee_bank`, `employee_bank_branch`, `employee_bank_acc_no`, `employee_bank_ppo_no`, `employee_pension_type`, `employee_iseditable`, `status_CD`, `created_DT`, `crated_BY`, `last_updated_DT`, `last_updated_BY`) VALUES
(1, '999', 'Sunil', 'C', 'Verma', '1978-03-24', '2000-03-24', 'FA', 'ICICI', 'Chandigarh', '123456789', '111', 'PN', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(2, '888', 'Sanjay', '', 'Sharma', '1982-03-24', '2010-03-24', 'FA', 'HDFC', 'Shimla', '987654321', '112', 'PN', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, '777', 'Prince', '', 'Sharma', '1986-03-24', '2012-03-24', 'FA', 'SBI', 'Shimla', '112233445', '113', 'PN', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(4, '666', 'Prince', 'Ki', 'GF', '1980-03-24', '2000-03-24', 'FA', 'CITY', 'Chandigarh', '554433221', '114', 'PN', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(5, '555', 'Jagdeep', '', 'Singh', '1984-03-24', '2012-03-24', 'FA', 'PNB', 'Chandigarh', '121212121', '115', 'PN', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee_bank_pension`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee_bank_pension` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_bank_ppo_no` varchar(50) NOT NULL,
  `employee_bank_basic` decimal(10,0) NOT NULL,
  `employee_bank_dearness_allo` decimal(10,0) NOT NULL,
  `employee_bank_medical_allo` decimal(10,0) NOT NULL,
  `employee_bank_oldage_allo` decimal(10,0) NOT NULL,
  `employee_bank_arrear` decimal(10,0) NOT NULL,
  `employee_bank_ltc` decimal(10,0) NOT NULL,
  `employee_bank_other_allo` decimal(10,0) NOT NULL,
  `employee_bank_gross` decimal(10,0) NOT NULL COMMENT 'Basic Pension + Dearness+ Medical + LTC+ Other + Old allownace',
  `employee_bank_commute_val` decimal(10,0) NOT NULL,
  `employee_bank_adjustment` decimal(10,0) DEFAULT '0',
  `employee_bank_total_deductions` decimal(10,0) NOT NULL COMMENT 'Commute Val + Adjustment',
  `employee_bank_net_payable` decimal(10,0) NOT NULL COMMENT 'Gross - Deductions',
  `employee_bank_pension_period` date NOT NULL COMMENT 'Pension for the month of',
  `employee_bank_comments` varchar(200) DEFAULT NULL,
  `employee_bank_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hpseb_employee_bank_pension`
--

INSERT INTO `hpseb_employee_bank_pension` (`ID`, `employee_bank_ppo_no`, `employee_bank_basic`, `employee_bank_dearness_allo`, `employee_bank_medical_allo`, `employee_bank_oldage_allo`, `employee_bank_arrear`, `employee_bank_ltc`, `employee_bank_other_allo`, `employee_bank_gross`, `employee_bank_commute_val`, `employee_bank_adjustment`, `employee_bank_total_deductions`, `employee_bank_net_payable`, `employee_bank_pension_period`, `employee_bank_comments`, `employee_bank_iseditable`, `status_CD`, `created_DT`, `crated_BY`, `last_updated_DT`, `last_updated_BY`) VALUES
(1, '111', '10000', '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '0000-00-00', 'Test ', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(2, '112', '10000', '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '0000-00-00', 'Test ', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, '113', '10000', '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '0000-00-00', 'Test ', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(4, '114', '10000', '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '0000-00-00', 'Test ', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(5, '115', '10000', '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '0000-00-00', 'Test ', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee_details`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee_details` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hpseb_employee_ID` bigint(20) unsigned NOT NULL,
  `employee_address_one` varchar(50) NOT NULL,
  `employee_address_two` varchar(50) DEFAULT NULL,
  `employee_city` varchar(50) DEFAULT NULL,
  `employee_state` varchar(50) NOT NULL,
  `employee_pin` varchar(20) DEFAULT NULL,
  `employee_phone` varchar(50) NOT NULL,
  `employee_mobile` varchar(50) NOT NULL,
  `employee_email` varchar(50) DEFAULT NULL,
  `employee_detail_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hpseb_employee_details`
--

INSERT INTO `hpseb_employee_details` (`ID`, `hpseb_employee_ID`, `employee_address_one`, `employee_address_two`, `employee_city`, `employee_state`, `employee_pin`, `employee_phone`, `employee_mobile`, `employee_email`, `employee_detail_iseditable`, `status_CD`, `created_DT`, `crated_BY`, `last_updated_DT`, `last_updated_BY`) VALUES
(1, 999, 'Bangalore', 'T', 'Shimla', 'HP', '171001', '10101010', '981111111', 'sunil@cdacshimla.com', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(2, 888, 'Khilini', 'T', 'Shimla', 'HP', '171001', '20202020', '982222222', 'sanjay@cdacshimla.com', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, 777, 'Sanjauli', 'T', 'Shimla', 'HP', '171001', '30303030', '983333333', 'prince@cdacshimla.com', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(4, 666, 'Mall', 'T', 'Shimla', 'HP', '171001', '40404040', '984444444', 'unknown@cdacshimla.com', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(5, 555, 'Denmark', 'T', 'Shimla', 'HP', '171001', '50505050', '985555555', 'jagdeep@cdacshimla.com', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee_pension`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee_pension` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hpseb_employee_ID` bigint(20) unsigned NOT NULL,
  `employee_pension_basic` decimal(10,0) NOT NULL,
  `employee_pension_dearness_per` int(11) NOT NULL,
  `employee_pension_dearness_allo` decimal(10,0) NOT NULL,
  `employee_pension_medical_allo` decimal(10,0) NOT NULL,
  `employee_pension_oldage_allo` decimal(10,0) NOT NULL,
  `employee_pension_arrear` decimal(10,0) NOT NULL,
  `employee_pension_ltc` decimal(10,0) NOT NULL,
  `employee_pension_other_allo` decimal(10,0) NOT NULL,
  `employee_pension_gross` decimal(10,0) NOT NULL COMMENT 'Basic Pension + Dearness+ Medical + LTC+ Other + Old allownace',
  `employee_pension_commute_val` decimal(10,0) NOT NULL,
  `employee_pension_adjustment` decimal(10,0) DEFAULT '0',
  `employee_pension_total_deductions` decimal(10,0) NOT NULL COMMENT 'Commute Val + Adjustment',
  `employee_pension_net_payable` decimal(10,0) NOT NULL COMMENT 'Gross - Deductions',
  `employee_pension_period` date NOT NULL COMMENT 'Pension for the month of',
  `employee_pension_comments` varchar(200) DEFAULT NULL,
  `employee_pension_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hpseb_employee_pension`
--

INSERT INTO `hpseb_employee_pension` (`ID`, `hpseb_employee_ID`, `employee_pension_basic`, `employee_pension_dearness_per`, `employee_pension_dearness_allo`, `employee_pension_medical_allo`, `employee_pension_oldage_allo`, `employee_pension_arrear`, `employee_pension_ltc`, `employee_pension_other_allo`, `employee_pension_gross`, `employee_pension_commute_val`, `employee_pension_adjustment`, `employee_pension_total_deductions`, `employee_pension_net_payable`, `employee_pension_period`, `employee_pension_comments`, `employee_pension_iseditable`, `status_CD`, `created_DT`, `crated_BY`, `last_updated_DT`, `last_updated_BY`) VALUES
(1, 999, '10000', 10, '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '2013-03-24', 'Pension given', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(2, 888, '10000', 10, '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '2013-03-24', 'Pension given', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, 777, '10000', 10, '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '2013-03-24', 'Pension given', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(4, 666, '10000', 10, '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '2013-03-24', 'Pension given', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(5, 555, '10000', 10, '2000', '1000', '500', '1000', '1000', '500', '0', '100', '400', '0', '0', '2013-03-24', 'Pension given', 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL);
