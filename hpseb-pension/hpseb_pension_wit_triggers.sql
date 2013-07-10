-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2013 at 04:00 PM
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
  `employee_middle_name` varchar(50) NULL,
  `employee_last_name` varchar(50) NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_dor` date NOT NULL,
  `employee_retire_desig` varchar(50) NOT NULL,
  `employee_bank` varchar(50) NOT NULL,
  `employee_bank_branch` varchar(50) NULL,
  `employee_bank_acc_no` varchar(50) NOT NULL,
  `employee_bank_ppo_no` varchar(50) NOT NULL,
  `employee_pension_type` varchar(50) NOT NULL,
  `employee_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------
-- Trigger update_employee_trig

DELIMITER &&
  CREATE TRIGGER `update_employee_trig`
    AFTER UPDATE ON `hpseb_employee` FOR EACH ROW
      BEGIN
          INSERT INTO hpseb_employee_audit (hpseb_employee_ID, employee_ID, employee_first_name, employee_middle_name, employee_last_name, employee_dob, employee_dor, employee_retire_desig, employee_bank, employee_bank_branch, employee_bank_acc_no, employee_bank_ppo_no, employee_pension_type, status_CD, last_updated_BY, last_updated_DT) 
          VALUES (NEW.ID, NEW.employee_ID, NEW.employee_first_name, NEW.employee_middle_name, NEW.employee_last_name, NEW.employee_dob, NEW.employee_dor, NEW.employee_retire_desig, NEW.employee_bank, NEW.employee_bank_branch, NEW.employee_bank_acc_no, NEW.employee_bank_ppo_no, NEW.employee_pension_type, NEW.status_CD, NEW.last_updated_BY, now() );
      END&&
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee_audit` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hpseb_employee_ID` bigint(20) unsigned NOT NULL,
  `employee_ID` varchar(50) NOT NULL,
  `employee_first_name` varchar(50) NOT NULL,
  `employee_middle_name` varchar(50) NULL,
  `employee_last_name` varchar(50) NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_dor` date NOT NULL,
  `employee_retire_desig` varchar(50) NOT NULL,
  `employee_bank` varchar(50) NOT NULL,
  `employee_bank_branch` varchar(50) NULL,
  `employee_bank_acc_no` varchar(50) NOT NULL,
  `employee_bank_ppo_no` varchar(50) NOT NULL,
  `employee_pension_type` varchar(50) NOT NULL,
  `employee_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;





--
-- Table structure for table `hpseb_employee_details`
--

CREATE TABLE IF NOT EXISTS `hpseb_employee_details` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_ID` bigint(20) unsigned NOT NULL,
  `employee_address_one` varchar(50) NOT NULL,
  `employee_address_two` varchar(50) NULL,
  `employee_city` varchar(50) NULL,
  `employee_state` varchar(50) NOT NULL,
  `employee_pin` varchar(20) NULL,
  `employee_phone` varchar(50) NOT NULL,
  `employee_mobile` varchar(50) NOT NULL,
  `employee_email` varchar(50) NULL,
  `employee_iscurrent` int(1) NOT NULL DEFAULT '0' COMMENT '0-No 1-Yes',
  `employee_detail_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee_pension`
--


 CREATE TABLE IF NOT EXISTS `hpseb_employee_pension` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_ID` bigint(20) unsigned NOT NULL,
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
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



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
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `hpseb_employee_records_master`
--

 CREATE TABLE IF NOT EXISTS `hpseb_employee_records_master` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `records_master_name` varchar(50) NOT NULL COMMENT 'Identifier for the record non editable',
  `records_master_value` varchar(50) NOT NULL COMMENT 'Value for the record editable and loggable',
  `records_master_group` varchar(50) NOT NULL DEFAULT 'NA' COMMENT 'Group Name if record if part of group',
  `hpseb_employee_ID` bigint(20) unsigned NOT NULL  DEFAULT '0' COMMENT '0 if record is not employee specific else employee_ID',
  `records_master_comments` varchar(500) NULL COMMENT 'Description about the master',
  `records_master_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) DEFAULT NULL,
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
-- Trigger update_records_master_trig

DELIMITER &&
  CREATE TRIGGER `update_records_master_trig`
    AFTER UPDATE ON `hpseb_employee_records_master` FOR EACH ROW
      BEGIN
        IF NEW.records_master_name <> OLD.records_master_name OR NEW.records_master_value <> OLD.records_master_value OR  NEW.records_master_group <> OLD.records_master_group THEN
          INSERT INTO hpseb_employee_records_master_audit (employee_records_master_ID, records_master_name, records_master_value, records_master_group, hpseb_employee_ID, last_updated_BY, last_updated_DT) 
          VALUES (NEW.ID, NEW.records_master_name, NEW.records_master_value, NEW.records_master_group, NEW.hpseb_employee_ID, NEW.records_master_comments, NEW.last_updated_BY, now() );
        END IF;
      END&&
DELIMITER ;


--
-- Table structure for table `hpseb_employee_records_master_audit`
--

 CREATE TABLE IF NOT EXISTS `hpseb_employee_records_master` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_records_master_ID` bigint(20) unsigned NOT NULL,
  `records_master_name` varchar(50) NOT NULL COMMENT 'Identifier for the record non editable',
  `records_master_value` varchar(50) NOT NULL COMMENT 'Value for the record editable and loggable',
  `records_master_group` varchar(50) NOT NULL DEFAULT 'NA' COMMENT 'Group Name if record if part of group',
  `hpseb_employee_ID` bigint(20) unsigned NOT NULL  DEFAULT '0' COMMENT '0 if record is not employee specific else employee_ID',
  `records_master_comments` varchar(500) NULL COMMENT 'Description about the master',
  `records_master_iseditable` int(1) NOT NULL DEFAULT '1' COMMENT '0-No 1-Yes',
  `status_CD` varchar(5) DEFAULT NULL,
  `created_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crated_BY` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `last_updated_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_BY` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `hpseb_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL DEFAULT '',
  `lname` varchar(25) NOT NULL DEFAULT '',
  `ulogin` varchar(25) NOT NULL DEFAULT '',
  `upassword` varchar(25) NOT NULL DEFAULT '',
  `ugroup` varchar(25) NOT NULL DEFAULT '',
  `utype` int(11) NOT NULL DEFAULT '0',
  `uemail` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `hpseb_users` (`ID`, `fname`, `lname`, `ulogin`, `upassword`,  `ugroup`,  `utype`, `uemail`) VALUES
(1, 'Sunil', 'Verma', 'admin', 'admin', 'A', 0, 'sunil@cdacshimla.com'),
(2, 'Prince', 'Sharma', 'prince', 'password', 'A', 0, 'prince@cdacshimla.com'),
(3, 'Sanjay', 'Verma', 'sanjay', 'secret', 'A', 0, 'sanjay@cdacshimla.com'),
(4, 'Test', 'Test', 'test', 'test', 'A', 1, 'test@test.com');



--
-- Sample procedure
--

DELIMITER // 
CREATE PROCEDURE GetStudentBySchool(IN schoolName VARCHAR(255)) 
BEGIN 
SELECT student_id, student_name 
FROM tbl_school 
WHERE school_name = schoolName; 
END // 
DELIMITER ;