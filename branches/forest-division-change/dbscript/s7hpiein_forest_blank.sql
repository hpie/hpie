-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2013 at 12:47 PM
-- Server version: 5.5.32-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s7hpiein_forest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `street_address` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(64) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `countries_id` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `division` varchar(200) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_super_admin` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id1`, `first_name`, `last_name`, `street_address`, `profile`, `city`, `state`, `zip`, `countries_id`, `email`, `login`, `password`, `division`, `status`, `registered_on`, `modified_on`, `is_super_admin`) VALUES
('1', 1, 'Admin', 'Chamba', '', '', '', '', '', '0', 'admin@forest.com', 'adminchamba', 'system', 'Chamba', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('2', 2, 'Admin', 'Chopal', '', '', '', '', '', '0', 'admin@forest.com', 'adminchopal', 'system', 'Chopal', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('3', 3, 'Admin', 'Dharamsala', '', '', '', '', '', '0', 'admin@forest.com', 'admindsala', 'system', 'Dharamsala', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('4', 4, 'Admin', 'Fatehpur', '', '', '', '', '', '0', 'admin@forest.com', 'adminfpur', 'system', 'Fatehpur', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('5', 5, 'Admin', 'Hamirpur', '', '', '', '', '', '0', 'admin@forest.com', 'adminhpur', 'system', 'Hamirpur', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('6', 6, 'Admin', 'Kullu', '', '', '', '', '', '0', 'admin@forest.com', 'adminkullu', 'system', 'Kullu', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('7', 7, 'Admin', 'Mandi', '', '', '', '', '', '0', 'admin@forest.com', 'adminmandi', 'system', 'Mandi', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('8', 8, 'Admin', 'Nahan', '', '', '', '', '', '0', 'admin@forest.com', 'adminnahan', 'system', 'Nahan', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('9', 9, 'Admin', 'Rampur', '', '', '', '', '', '0', 'admin@forest.com', 'adminrpur', 'system', 'Rampur', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('10', 10, 'Admin', 'Sawra', '', '', '', '', '', '0', 'admin@forest.com', 'adminsawra', 'system', 'Sawra', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('11', 11, 'Admin', 'Shimla', '', '', '', '', '', '0', 'admin@forest.com', 'adminshimla', 'system', 'Shimla', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('12', 12, 'Admin', 'Solan', '', '', '', '', '', '0', 'admin@forest.com', 'adminsolan', 'system', 'Solan', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('13', 13, 'Admin', 'SunderNagar', '', '', '', '', '', '0', 'admin@forest.com', 'adminsnagar', 'system', 'SunderNagar', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1),
('14', 14, 'Admin', 'Una', '', '', '', '', '', '0', 'admin@forest.com', 'adminuna', 'system', 'Una', 'y', '2013-07-09 15:03:58', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contractor_detail`
--

CREATE TABLE IF NOT EXISTS `contractor_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `contractor_name` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `gf` varchar(25) NOT NULL,
  `license` varchar(25) NOT NULL,
  `licence_exp_date` date NOT NULL,
  `contractor_class` varchar(25) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip_address` varchar(15) NOT NULL DEFAULT '000.000.000.000',
  `last_login` varchar(255) NOT NULL,
  `i_status` tinyint(1) DEFAULT '1',
  `bankname` varchar(255) NOT NULL,
  `accountnumber` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `nfntno` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `licenseno` varchar(255) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_category_timber`
--

CREATE TABLE IF NOT EXISTS `c_category_timber` (
  `id` varchar(200) DEFAULT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_value_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for %age 0 for Rs',
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_conversion_felling`
--

CREATE TABLE IF NOT EXISTS `c_conversion_felling` (
  `id` varchar(200) DEFAULT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_conversion` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_conversion_charges` int(11) NOT NULL COMMENT 'converio  charges',
  `i_value_type` tinyint(4) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_filling_detail`
--

CREATE TABLE IF NOT EXISTS `c_filling_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_contractor_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `i_previous_count` float NOT NULL,
  `i_previous_volume` float NOT NULL,
  `i_current_count` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_marked_opening_price`
--

CREATE TABLE IF NOT EXISTS `c_marked_opening_price` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_value` int(11) NOT NULL,
  `i_royality_price` float NOT NULL,
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_marked_opening_volume`
--

CREATE TABLE IF NOT EXISTS `c_marked_opening_volume` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_tree_volume` float NOT NULL,
  `i_economics_conversion` int(11) NOT NULL,
  `i_economics_volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_conversion_charges` float NOT NULL,
  `i_product_persentage` int(11) NOT NULL,
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  `i_royality` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_marked_price`
--

CREATE TABLE IF NOT EXISTS `c_marked_price` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_value` int(11) NOT NULL,
  `i_royality_price` float NOT NULL,
  `i_total_royality` float NOT NULL,
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_marked_volume`
--

CREATE TABLE IF NOT EXISTS `c_marked_volume` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_tree_volume` float NOT NULL,
  `i_economics_conversion` int(11) NOT NULL,
  `i_economics_volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_conversion_charges` float NOT NULL,
  `i_product_persentage` int(11) NOT NULL,
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  `i_royality` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_mark_detail`
--

CREATE TABLE IF NOT EXISTS `c_mark_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_division_id` varchar(200) NOT NULL,
  `i_forest_id` varchar(200) NOT NULL,
  `i_table_id` varchar(200) NOT NULL,
  `dt_fromDate` date NOT NULL,
  `dt_toDate` date NOT NULL,
  `f_area` float NOT NULL,
  `dt_created` date NOT NULL,
  `dt_updated` date NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_user_id` varchar(200) NOT NULL,
  `i_unit_id` varchar(200) NOT NULL,
  `i_overhead_status` int(11) NOT NULL COMMENT '0 = pending , 1= done',
  `i_conversion_status` int(11) NOT NULL COMMENT '0 = pending , 1= done',
  `i_fixed_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 for not fixed,1 for fixed',
  `vc_lotno` varchar(255) DEFAULT NULL,
  `dt_completionDate` date DEFAULT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_overhead_detail`
--

CREATE TABLE IF NOT EXISTS `c_overhead_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_applicable` int(11) NOT NULL COMMENT '1=yes ,0=no',
  `f_rate` float NOT NULL,
  `i_stateOfExpence` int(11) NOT NULL,
  `i_treeType_id` varchar(200) NOT NULL,
  `vc_source` varchar(11) NOT NULL,
  `vc_destination` varchar(11) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_tree_filling`
--

CREATE TABLE IF NOT EXISTS `c_tree_filling` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_prev_count` float NOT NULL,
  `i_current_count` float NOT NULL,
  `i_prev_volume` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_volume_detail`
--

CREATE TABLE IF NOT EXISTS `c_volume_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_table_id` varchar(200) NOT NULL,
  `i_tree_type_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_conversion_charges` float NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_category_conversion`
--

CREATE TABLE IF NOT EXISTS `ecnomics_category_conversion` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_category_felling`
--

CREATE TABLE IF NOT EXISTS `ecnomics_category_felling` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_conversion_charges` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_category_timber`
--

CREATE TABLE IF NOT EXISTS `ecnomics_category_timber` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_category_timber_temp`
--

CREATE TABLE IF NOT EXISTS `ecnomics_category_timber_temp` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_forest_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_conversion_detail`
--

CREATE TABLE IF NOT EXISTS `ecnomics_conversion_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_extracharges`
--

CREATE TABLE IF NOT EXISTS `ecnomics_extracharges` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `vc_source` varchar(255) NOT NULL,
  `vc_destination` varchar(255) NOT NULL,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_value` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_felling_chargs`
--

CREATE TABLE IF NOT EXISTS `ecnomics_felling_chargs` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_felling_charges` float NOT NULL COMMENT 'forest department key',
  `i_commission` int(11) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_overhead`
--

CREATE TABLE IF NOT EXISTS `ecnomics_overhead` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `vc_source` varchar(255) NOT NULL,
  `vc_destination` varchar(255) NOT NULL,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_commission` float NOT NULL,
  `i_distance` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_sale_price`
--

CREATE TABLE IF NOT EXISTS `ecnomics_sale_price` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_sale_pice` float NOT NULL COMMENT 'forest department key',
  `i_mark_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_schedule_rates`
--

CREATE TABLE IF NOT EXISTS `ecnomics_schedule_rates` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_total_volume` float NOT NULL,
  `i_scedule_rate` float NOT NULL,
  `i_amount` float NOT NULL,
  `i_sm` float NOT NULL,
  `i_sm_value` float NOT NULL,
  `i_matecomission` float NOT NULL,
  `i_comission_value` float NOT NULL,
  `i_total_cost` float NOT NULL,
  `i_average` float NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_timber_price_detail`
--

CREATE TABLE IF NOT EXISTS `ecnomics_timber_price_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_transportation_detail`
--

CREATE TABLE IF NOT EXISTS `ecnomics_transportation_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_contract_id` varchar(200) NOT NULL,
  `vc_from` varchar(200) NOT NULL COMMENT '1=yes ,0=no',
  `vc_destination` varchar(200) NOT NULL,
  `i_volume` float NOT NULL,
  `i_count` float NOT NULL,
  `i_charges` int(11) NOT NULL,
  `i_distance` float NOT NULL,
  `i_exit` varchar(11) NOT NULL,
  `i_comission` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ecnomics_transportation_detail_rsd`
--

CREATE TABLE IF NOT EXISTS `ecnomics_transportation_detail_rsd` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_ecnomics_master_id` varchar(200) NOT NULL,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_contract_id` varchar(200) NOT NULL,
  `vc_from` varchar(100) NOT NULL COMMENT '1=yes ,0=no',
  `vc_destination` varchar(100) NOT NULL,
  `i_volume` float NOT NULL,
  `i_count` float NOT NULL,
  `i_charges` int(11) NOT NULL,
  `i_distance` float NOT NULL,
  `i_exit` varchar(11) NOT NULL,
  `i_comission` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `economics_master`
--

CREATE TABLE IF NOT EXISTS `economics_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `dt_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_detail`
--

CREATE TABLE IF NOT EXISTS `inventory_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_inventory_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_selling_price` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_exit_id` varchar(200) NOT NULL,
  `i_location_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_master`
--

CREATE TABLE IF NOT EXISTS `inventory_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  `i_total_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marking_master_detail`
--

CREATE TABLE IF NOT EXISTS `marking_master_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `from_vc_month` float NOT NULL,
  `from_vc_year` float NOT NULL,
  `to_vc_month` float NOT NULL,
  `to_vc_year` float NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_category`
--

CREATE TABLE IF NOT EXISTS `m_category` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_contractor_work`
--

CREATE TABLE IF NOT EXISTS `m_contractor_work` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `i_felling` int(11) NOT NULL,
  `i_conversion` int(11) NOT NULL,
  `i_carriage` int(11) NOT NULL,
  `i_transportation` int(11) NOT NULL,
  `i_work_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_division`
--

CREATE TABLE IF NOT EXISTS `m_division` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `m_division`
--

INSERT INTO `m_division` (`id`, `id1`, `vc_name`, `i_status`) VALUES
('1', 1, 'Chamba', 1),
('2', 2, 'Chopal', 2),
('3', 3, 'Dharamsala', 1),
('4', 4, 'Fatehpur', 1),
('5', 5, 'Hamirpur', 1),
('6', 6, 'Kullu', 1),
('7', 7, 'Mandi', 1),
('8', 8, 'Nahan', 1),
('9', 9, 'Rampur', 1),
('10', 10, 'Sawra', 1),
('11', 11, 'Shimla', 1),
('12', 12, 'Solan', 1),
('13', 13, 'SunderNagar', 1),
('14', 14, 'Una', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_exit_types`
--

CREATE TABLE IF NOT EXISTS `m_exit_types` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(255) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_forest`
--

CREATE TABLE IF NOT EXISTS `m_forest` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_department_id` varchar(200) NOT NULL,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_forest_corporation`
--

CREATE TABLE IF NOT EXISTS `m_forest_corporation` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_forest_department`
--

CREATE TABLE IF NOT EXISTS `m_forest_department` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_division_id` varchar(150) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_forest_points`
--

CREATE TABLE IF NOT EXISTS `m_forest_points` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_type` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_forest_volume`
--

CREATE TABLE IF NOT EXISTS `m_forest_volume` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_overhead_entities`
--

CREATE TABLE IF NOT EXISTS `m_overhead_entities` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `vc_value` int(11) NOT NULL DEFAULT '0',
  `i_forest_id` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_department_id` varchar(200) NOT NULL,
  `i_value_type` tinyint(4) NOT NULL,
  `i_overhead_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_price`
--

CREATE TABLE IF NOT EXISTS `m_price` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_timber`
--

CREATE TABLE IF NOT EXISTS `m_timber` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_timber_price`
--

CREATE TABLE IF NOT EXISTS `m_timber_price` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_forest_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_timber_type`
--

CREATE TABLE IF NOT EXISTS `m_timber_type` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_timber_id` varchar(200) NOT NULL,
  `vc_name` varchar(200) NOT NULL,
  `volume` float NOT NULL,
  `standard` int(11) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_trees`
--

CREATE TABLE IF NOT EXISTS `m_trees` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_treetype`
--

CREATE TABLE IF NOT EXISTS `m_treetype` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_department_id` varchar(200) NOT NULL,
  `vc_name` varchar(200) NOT NULL,
  `i_default` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_units`
--

CREATE TABLE IF NOT EXISTS `m_units` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `vc_name` varchar(200) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_conversion_detail`
--

CREATE TABLE IF NOT EXISTS `opening_progress_conversion_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_conversion_charges` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_conversion_master`
--

CREATE TABLE IF NOT EXISTS `opening_progress_conversion_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_felling_charges`
--

CREATE TABLE IF NOT EXISTS `opening_progress_felling_charges` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_felling_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_felling_detail`
--

CREATE TABLE IF NOT EXISTS `opening_progress_felling_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_count` int(11) NOT NULL,
  `i_volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_felling_master`
--

CREATE TABLE IF NOT EXISTS `opening_progress_felling_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_transportation_detail`
--

CREATE TABLE IF NOT EXISTS `opening_progress_transportation_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_progress_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_contract_id` varchar(200) NOT NULL,
  `vc_from` varchar(255) NOT NULL COMMENT '1=yes ,0=no',
  `vc_destination` varchar(255) NOT NULL,
  `i_volume` float NOT NULL,
  `i_count` float NOT NULL,
  `i_charges` int(11) NOT NULL,
  `i_distance` float NOT NULL,
  `i_exit` varchar(11) NOT NULL,
  `i_comission` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_progress_transportation_master`
--

CREATE TABLE IF NOT EXISTS `opening_progress_transportation_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_charges` int(11) NOT NULL,
  `i_total_exit` int(11) NOT NULL,
  `i_type` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_keyword` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `seach_name` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_conversion_actual_detail`
--

CREATE TABLE IF NOT EXISTS `progress_conversion_actual_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_count` int(11) NOT NULL,
  `i_volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_table_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_conversion_actual_master`
--

CREATE TABLE IF NOT EXISTS `progress_conversion_actual_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_conversion_charges`
--

CREATE TABLE IF NOT EXISTS `progress_conversion_charges` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_felling_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_conversion_detail`
--

CREATE TABLE IF NOT EXISTS `progress_conversion_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `i_current_volume` float NOT NULL,
  `i_conversion_charges` float NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_conversion_master`
--

CREATE TABLE IF NOT EXISTS `progress_conversion_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_felling_charges`
--

CREATE TABLE IF NOT EXISTS `progress_felling_charges` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_felling_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_felling_detail`
--

CREATE TABLE IF NOT EXISTS `progress_felling_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_progress_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_count` int(11) NOT NULL,
  `i_volume` float NOT NULL,
  `i_felling_charges` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_felling_master`
--

CREATE TABLE IF NOT EXISTS `progress_felling_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_overhead_detail`
--

CREATE TABLE IF NOT EXISTS `progress_overhead_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_progress_id` varchar(200) NOT NULL,
  `i_mark_id` varchar(200) NOT NULL,
  `i_applicable` int(11) NOT NULL COMMENT '1=yes ,0=no',
  `f_rate` float NOT NULL,
  `i_stateOfExpence` int(11) NOT NULL,
  `i_treeType_id` varchar(200) NOT NULL,
  `vc_source` varchar(11) NOT NULL,
  `vc_destination` varchar(11) NOT NULL,
  `i_status` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_overhead_master`
--

CREATE TABLE IF NOT EXISTS `progress_overhead_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `i_contractor_id` varchar(200) NOT NULL,
  `i_current_count` float NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_marked` int(11) NOT NULL,
  `i_total_Volume` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_transportation_detail`
--

CREATE TABLE IF NOT EXISTS `progress_transportation_detail` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_overhead_id` varchar(200) NOT NULL,
  `i_progress_id` varchar(200) NOT NULL,
  `i_tree_id` varchar(200) NOT NULL,
  `i_timber_id` varchar(200) NOT NULL,
  `i_timber_type_id` varchar(200) NOT NULL,
  `i_contract_id` varchar(200) NOT NULL,
  `vc_from` varchar(255) NOT NULL COMMENT '1=yes ,0=no',
  `vc_destination` varchar(255) NOT NULL,
  `i_volume` float NOT NULL,
  `i_count` float NOT NULL,
  `i_charges` int(11) NOT NULL,
  `i_distance` float NOT NULL,
  `i_exit` varchar(11) NOT NULL,
  `i_comission` float NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_transportation_master`
--

CREATE TABLE IF NOT EXISTS `progress_transportation_master` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_mark_id` varchar(200) NOT NULL,
  `vc_month` float NOT NULL,
  `vc_year` float NOT NULL,
  `i_total_charges` int(11) NOT NULL,
  `i_total_exit` int(11) NOT NULL,
  `i_type` int(11) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_tree_category`
--

CREATE TABLE IF NOT EXISTS `r_tree_category` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_tree_id` varchar(200) NOT NULL,
  `i_tree_type_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_mark_detail_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_volume` float NOT NULL,
  `i_total_count` int(11) NOT NULL,
  `i_entry_type` int(11) NOT NULL,
  `i_ecnomics_pesentage` int(11) DEFAULT NULL COMMENT 'updated when ecnomics is generated',
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_tree_opening_category`
--

CREATE TABLE IF NOT EXISTS `r_tree_opening_category` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_tree_id` varchar(200) NOT NULL,
  `i_tree_type_id` varchar(200) NOT NULL,
  `i_category_id` varchar(200) NOT NULL,
  `i_mark_detail_id` varchar(200) NOT NULL,
  `i_value` float NOT NULL,
  `i_volume` float NOT NULL,
  `i_total_count` int(11) NOT NULL,
  `i_entry_type` int(11) NOT NULL,
  `i_ecnomics_pesentage` int(11) DEFAULT NULL COMMENT 'updated when ecnomics is generated',
  `i_master_id` varchar(200) NOT NULL,
  `vc_year` varchar(255) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(200) NOT NULL,
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `i_division_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `user_name` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `phone_no` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip_address` varchar(15) NOT NULL DEFAULT '000.000.000.000',
  `last_login` varchar(255) NOT NULL,
  `division` varchar(200) DEFAULT NULL,
  `i_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id1`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id1`, `i_division_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `phone_no`, `mobile_no`, `joined_on`, `modified_on`, `ip_address`, `last_login`, `division`, `i_status`) VALUES
('1', 11, '', 'priyanka', 'test', 'Priyanka', '', 'test', '', '', '2013-05-27 11:30:48', '0000-00-00 00:00:00', '000.000.000.000', '', NULL, 1),
('2', 12, '', 'jagdeep', 'singh', 'jagdeep', 'jagdeep.hsp@gmail.com', '123456', '', '', '2013-05-27 11:30:48', '0000-00-00 00:00:00', '000.000.000.000', '', NULL, 1),
('3', 13, '', 'Chopal', 'User', 'chopal', 'fchopal@hpie.in', 'chopal123', '', '', '2013-07-05 14:18:34', '0000-00-00 00:00:00', '000.000.000.000', '', 'Chopal', 1),
('4', 14, '', 'Chamba', 'User', 'chamba', 'fchamba@hpie.in', 'chamba123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Chamba', 1),
('5', 15, '', 'Dharamsala', 'User', 'dsala', 'fchamba@hpie.in', 'dsala123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Dharamsala', 1),
('6', 16, '', 'Fatehpur', 'User', 'fpur', 'fchamba@hpie.in', 'fpur123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Fatehpur', 1),
('7', 17, '', 'Hamirpur', 'User', 'hpur', 'fchamba@hpie.in', 'hpur123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Hamirpur', 1),
('8', 18, '', 'Kullu', 'User', 'kullu', 'fchamba@hpie.in', 'kullu123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Kullu', 1),
('8', 19, '', 'Mandi', 'User', 'mandi123', 'fchamba@hpie.in', 'mandi123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Mandi', 1),
('10', 20, '', 'Nahan', 'User', 'nahan', 'fchamba@hpie.in', 'nahan123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Nahan', 1),
('11', 21, '', 'Rampur', 'User', 'rpur', 'fchamba@hpie.in', 'rpur123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Rampur', 1),
('12', 22, '', 'Sawra', 'User', 'sawra', 'fchamba@hpie.in', 'sawra123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Sawra', 1),
('13', 23, '', 'Shimla', 'User', 'shimla', 'fchamba@hpie.in', 'shimla123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Shimla', 1),
('14', 24, '', 'Solan', 'User', 'solan', 'fchamba@hpie.in', 'solan123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Solan', 1),
('15', 25, '', 'SunderNagar', 'User', 'snagar', 'fchamba@hpie.in', 'snagar123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'SunderNagar', 1),
('16', 26, '', 'Una', 'User', 'una123', 'fchamba@hpie.in', 'una123', '', '', '2013-05-27 06:00:48', '0000-00-00 00:00:00', '000.000.000.000', '0000-00-00 00:00:00', 'Una', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
