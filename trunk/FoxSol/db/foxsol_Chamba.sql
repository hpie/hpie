-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:23 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Chamba`
--

-- --------------------------------------------------------

--
-- Table structure for table `bark_store`
--

CREATE TABLE IF NOT EXISTS `bark_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `year` int(11) NOT NULL,
  `frmdate` int(11) NOT NULL,
  `frmmonth` int(11) NOT NULL,
  `frmyear` int(11) NOT NULL,
  `todate` int(11) NOT NULL,
  `tomonth` int(11) NOT NULL,
  `toyear` int(11) NOT NULL,
  `nblazes` int(11) NOT NULL,
  `nmazdoor` int(11) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `frange` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cropset` varchar(250) NOT NULL,
  `mancar` varchar(250) NOT NULL,
  `mulcar` varchar(250) NOT NULL,
  `traccar` varchar(250) NOT NULL,
  `matecom` varchar(250) NOT NULL,
  `emptinR` varchar(250) NOT NULL,
  `emptinsolR` varchar(250) NOT NULL,
  `trate25` varchar(250) NOT NULL,
  `trateb25` varchar(250) NOT NULL,
  `lrate50` varchar(250) NOT NULL,
  `lrateb50` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `current_lsm`
--

CREATE TABLE IF NOT EXISTS `current_lsm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `alotdate` date NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `ratecar` varchar(250) NOT NULL,
  `ratetrans` varchar(250) NOT NULL,
  `LSMName` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enum`
--

CREATE TABLE IF NOT EXISTS `enum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `forest` varchar(250) NOT NULL,
  `blazen` int(11) NOT NULL,
  `year` varchar(250) NOT NULL,
  `frange` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_enum` (`lotno`,`forest`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fcorporation`
--

CREATE TABLE IF NOT EXISTS `fcorporation` (
  `id` varchar(250) NOT NULL,
  `corporation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fdivision`
--

CREATE TABLE IF NOT EXISTS `fdivision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corporation` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `fdivision`
--

INSERT INTO `fdivision` (`id`, `corporation`, `division`) VALUES
(1, 'Shimla', 'Shimla'),
(2, 'Shimla', 'Theog'),
(3, 'Shimla', 'Kumarsain'),
(4, 'Kullu', 'Kullu'),
(5, 'Kullu', 'Parvati'),
(6, 'Kullu', 'Seraj'),
(7, 'Kullu', 'Lahoul'),
(8, 'Dharamsala', 'Dharamsala'),
(9, 'Dharamsala', 'Palampur'),
(10, 'Fatehpur', 'Nurpur'),
(11, 'Fatehpur', 'Dehra'),
(12, 'Mandi', 'Nachan'),
(13, 'Mandi', 'Jogindernagar'),
(14, 'Mandi', 'Mandi'),
(15, 'Sundernagar', 'Sundernagar'),
(16, 'Sundernagar', 'Karsog'),
(17, 'Hamirpur', 'Hamirpur'),
(18, 'Una', 'Una'),
(19, 'Chopal', 'Chopal'),
(20, 'Chamba', 'Chamba'),
(21, 'Nahan', 'Nahan'),
(22, 'Rampur', 'Rampur'),
(23, 'Rampur', 'Kotgarh'),
(24, 'Rampur', 'Kinnaur'),
(25, 'Rampur', 'Anni'),
(26, 'Sawra', 'Rohroo'),
(27, 'Solan', 'Solan'),
(28, 'Solan', 'Nalagarh'),
(29, 'Solan', 'Kunihar'),
(30, 'Solan', 'Rajgarh');

-- --------------------------------------------------------

--
-- Table structure for table `login_detail`
--

CREATE TABLE IF NOT EXISTS `login_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `fwd` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_login` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lot_desc`
--

CREATE TABLE IF NOT EXISTS `lot_desc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `exten` varchar(250) NOT NULL,
  `frange` varchar(250) NOT NULL,
  `forests` varchar(250) NOT NULL,
  `type_area` varchar(250) NOT NULL,
  `extract_method` varchar(250) NOT NULL,
  `rsd` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_lot` (`lotno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ssyield_obtained`
--

CREATE TABLE IF NOT EXISTS `ssyield_obtained` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `yield_obtained` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tap_store`
--

CREATE TABLE IF NOT EXISTS `tap_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `year` int(11) NOT NULL,
  `frmdate` int(11) NOT NULL,
  `frmmonth` int(11) NOT NULL,
  `frmyear` int(11) NOT NULL,
  `todate` int(11) NOT NULL,
  `tomonth` int(11) NOT NULL,
  `toyear` int(11) NOT NULL,
  `nblazes` int(11) NOT NULL,
  `nmazdoor` int(11) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `tin_collect` int(11) NOT NULL,
  `tin_carried` int(11) NOT NULL,
  `tin_dispatch` int(11) NOT NULL,
  `tin_dispatch_o` int(11) NOT NULL,
  `tin_lost_fi` int(11) NOT NULL,
  `frange` varchar(250) NOT NULL,
  `tin_lost_f` int(11) NOT NULL,
  `tin_lost_t` int(11) NOT NULL,
  `tin_lost_o` int(11) NOT NULL,
  `tin_lost_t_w` varchar(250) NOT NULL,
  `tin_lost_o_w` varchar(250) NOT NULL,
  `tin_lost_fi_w` varchar(250) NOT NULL,
  `tin_lost_f_w` varchar(250) NOT NULL,
  `tin_collect_w` varchar(250) NOT NULL,
  `tin_carried_w` varchar(250) NOT NULL,
  `tin_dispatch_w` varchar(250) NOT NULL,
  `tin_dispatch_o_w` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upset_price`
--

CREATE TABLE IF NOT EXISTS `upset_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `tenblazes` varchar(250) NOT NULL,
  `yieldfixed` varchar(250) NOT NULL,
  `rate` varchar(250) NOT NULL,
  `Year` varchar(250) NOT NULL,
  `numman` int(11) NOT NULL,
  `nummul` int(11) NOT NULL,
  `numtrac` int(11) NOT NULL,
  `leadmanD` varchar(250) NOT NULL,
  `leadmulD` varchar(250) NOT NULL,
  `leadtracD` varchar(250) NOT NULL,
  `leadmanQ` varchar(250) NOT NULL,
  `leadmulQ` varchar(250) NOT NULL,
  `leadtracQ` varchar(250) NOT NULL,
  `cropsetR` varchar(250) NOT NULL,
  `ResinEx` varchar(250) NOT NULL,
  `matecom` varchar(250) NOT NULL,
  `mancar` varchar(250) NOT NULL,
  `mulcar` varchar(250) NOT NULL,
  `traccar` varchar(250) NOT NULL,
  `tool` varchar(250) NOT NULL,
  `emptinnum` varchar(250) NOT NULL,
  `emptindis` varchar(250) NOT NULL,
  `emptinsolR` varchar(250) NOT NULL,
  `emptinR` varchar(250) NOT NULL,
  `trate25` varchar(250) NOT NULL,
  `trateb25` varchar(250) NOT NULL,
  `distancefact` varchar(250) NOT NULL,
  `tchargeavg` varchar(250) NOT NULL,
  `lrate50` varchar(250) NOT NULL,
  `lrateb50` varchar(250) NOT NULL,
  `distanceload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE IF NOT EXISTS `verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `frange` varchar(250) NOT NULL,
  `tarea` varchar(250) NOT NULL,
  `mext` varchar(250) NOT NULL,
  `rsd` varchar(250) NOT NULL,
  `forest` varchar(250) NOT NULL,
  `blaze` int(11) NOT NULL,
  `year` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `blazen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yield_fixed`
--

CREATE TABLE IF NOT EXISTS `yield_fixed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `yield_fixed` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yield_obtained`
--

CREATE TABLE IF NOT EXISTS `yield_obtained` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotno` varchar(250) NOT NULL,
  `yield_obtained` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
