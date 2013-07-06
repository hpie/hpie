-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:18 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Hamirpur`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `cropset`, `mancar`, `mulcar`, `traccar`, `matecom`, `emptinR`, `emptinsolR`, `trate25`, `trateb25`, `lrate50`, `lrateb50`) VALUES
(1, '1869', '42', '34', '150', ' 0', '32.25', '2.10', '24', '0.33', '96.90', '113.05');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `lotno`, `division`, `forest`, `blazen`, `year`, `frange`, `unit`) VALUES
(1, '1/R/13', 'Hamirpur', 'P-25 Khansra c4', 94, '2013', 'Bijhari', 'Bijhari'),
(2, '1/R/13', 'Hamirpur', 'U-80 Dugwar C2', 155, '2013', 'Bijhari', 'Bijhari'),
(3, '1/R/13', 'Hamirpur', 'U.80 Dugwar C1', 45, '2013', 'Bijhari', 'Bijhari'),
(4, '1/R/13', 'Hamirpur', 'U.84 Chak', 70, '2013', 'Bijhari', 'Bijhari'),
(5, '2/R-13', 'Hamirpur', 'U90 Bijhari C5', 470, '2013', 'Bijhari', 'Bijhari'),
(6, '2/R-13', 'Hamirpur', 'U89 Kanoh', 170, '2013', 'Bijhari', 'Bijhari'),
(7, '2/R-13', 'Hamirpur', 'P20 Kharal C3', 32, '2013', 'Bijhari', 'Bijhari'),
(8, '2/R-13', 'Hamirpur', 'U87 Sohari C2 P20 Kharal C1', 68, '2013', 'Bijhari', 'Bijhari');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lot_desc`
--

INSERT INTO `lot_desc` (`id`, `lotno`, `exten`, `frange`, `forests`, `type_area`, `extract_method`, `rsd`, `unit`, `division`) VALUES
(4, '1/R/13', 'Bijhari 1/R/13(Bijhari)', 'Bijhari', 'p-25 khansra c4,p-25 khansra c3,Up chowa c2,U-77,U-80 Dugwar c2,u80 dugwar c1,u-84 changar,upf Dugwar ', 'Hot', 'Rill', 'Padhian', 'Bijhari', 'Hamirpur');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `upset_price`
--

INSERT INTO `upset_price` (`id`, `lotno`, `division`, `tenblazes`, `yieldfixed`, `rate`, `Year`, `numman`, `nummul`, `numtrac`, `leadmanD`, `leadmulD`, `leadtracD`, `leadmanQ`, `leadmulQ`, `leadtracQ`, `cropsetR`, `ResinEx`, `matecom`, `mancar`, `mulcar`, `traccar`, `tool`, `emptinnum`, `emptindis`, `emptinsolR`, `emptinR`, `trate25`, `trateb25`, `distancefact`, `tchargeavg`, `lrate50`, `lrateb50`, `distanceload`) VALUES
(6, '1/R/13', 'Hamirpur', '364', '40', '3716.28', '2013', 1, 1, 1, '0.200', '.0200', '.0200', '39.92', '39.92', '39.92', '1869', '810', ' 0', '42', '34', '150', '2814', '86', '0', '2.10', '32.25', '24', '0.33', '70', '235.19', '96.90', '113.05', '5');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '1/R/13', '40', '2013', 'Hamirpur');

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
