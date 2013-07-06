-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 07:58 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Una`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bark_store`
--

INSERT INTO `bark_store` (`id`, `lotno`, `division`, `year`, `frmdate`, `frmmonth`, `frmyear`, `todate`, `tomonth`, `toyear`, `nblazes`, `nmazdoor`, `remark`, `frange`) VALUES
(1, '1', 'Una', 0, 12, 3, 2013, 30, 11, 2013, 520, 1, '', ''),
(2, '1', 'Una', 0, 12, 3, 2013, 31, 3, 2013, 520, 1, '', ''),
(3, '1', 'Una', 0, 1, 4, 2013, 30, 4, 2013, 520, 1, '', ''),
(4, '2', 'Una', 0, 1, 4, 2013, 30, 4, 2013, 708, 1, '', ''),
(5, '3\\R\\2013', 'Una', 2013, 1, 4, 2013, 30, 4, 2013, 1590, 3, '', 'Bharwain');

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
(1, '1873', '42', '34', '28.80', '20', '32.25', '2.10', '28.80', '0.40', '96.90', '113.05');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `current_lsm`
--

INSERT INTO `current_lsm` (`id`, `lotno`, `division`, `year`, `alotdate`, `fromdate`, `todate`, `ratecar`, `ratetrans`, `LSMName`) VALUES
(1, '1/R/2013', 'Una', '2013', '2013-01-30', '2013-03-12', '2013-11-30', '1575.00', '0.00', 'Sulatan Mohd '),
(2, '2/R/2013', 'Una', '2013', '2013-01-30', '2013-03-04', '2013-11-30', '1550', '0.00', 'Keshav Dutt'),
(3, '2/R/2013', 'Una', '2013', '2013-01-30', '2013-03-04', '0000-00-00', '1550', '0.00', 'Keshav Dutt'),
(4, '3\\R\\2013', 'Una', '2013', '2013-01-30', '2013-03-04', '0000-00-00', '1590', '0.00', 'Raj Kumar');

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
(1, '1\\R\\2013', 'Una', 'R-II Lohara BC-I to 4 S.L. BAg Muhan& LC Kotli LC Mawa & Thinkpura.', 520, '2013', 'Bharwain', 'Bharwain'),
(2, '1/R/2013', 'Una', 'Bharwain', 520, '2013', 'Bharwain', 'Bharwain'),
(3, '2/R/2013', 'Una', 'Bharwain', 708, '2013', 'Bharwain', 'Bharwain'),
(4, '3\\R\\2013', 'Una', 'BC-8', 340, '2013', 'Bharwain', 'Bharwain'),
(5, '3\\R\\2013', 'Una', 'BC-9', 434, '2013', 'Bharwain', 'Bharwain'),
(6, '3\\R\\2013', 'Una', 'BC-10', 400, '2013', 'Bharwain', 'Bharwain'),
(7, '3\\R\\2013', 'Una', 'BC-11', 467, '2013', 'Bharwain', 'Bharwain'),
(8, '3\\R\\2013', 'Una', 'E.Ambali', 172, '2013', 'Bharwain', 'Bharwain');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lot_desc`
--

INSERT INTO `lot_desc` (`id`, `lotno`, `exten`, `frange`, `forests`, `type_area`, `extract_method`, `rsd`, `unit`, `division`) VALUES
(9, '2/R/2013', '2/R/2013 Bharwain', 'Bharwain', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'Bharwain', 'Una'),
(10, '3\\R\\2013', '3R2013 Bharwain', 'Bharwain', 'BC-8,BC-9,BC-10,BC-11,E.Ambali', 'Hot', 'Rill', 'Saloi', 'Bharwain', 'Una'),
(6, '1/R/2013', 'Bharwain 1/R/2013', 'Bharwain', 'Bharwain', 'Hot', 'Rill', 'Sidhchalet', 'Bharwain', 'Una');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tap_store`
--

INSERT INTO `tap_store` (`id`, `lotno`, `division`, `year`, `frmdate`, `frmmonth`, `frmyear`, `todate`, `tomonth`, `toyear`, `nblazes`, `nmazdoor`, `remark`, `tin_collect`, `tin_carried`, `tin_dispatch`, `tin_dispatch_o`, `tin_lost_fi`, `frange`, `tin_lost_f`, `tin_lost_t`, `tin_lost_o`, `tin_lost_t_w`, `tin_lost_o_w`, `tin_lost_fi_w`, `tin_lost_f_w`, `tin_collect_w`, `tin_carried_w`, `tin_dispatch_w`, `tin_dispatch_o_w`) VALUES
(1, '1', 'Una', 0, 12, 3, 2013, 31, 3, 2013, 520, 1, '', 1, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0.17', '0', '0', '0'),
(2, '1', 'Una', 0, 1, 4, 2013, 30, 4, 2013, 520, 1, '', 1, 1, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0.17', '0.17', '0', '0');

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
(2, '1\\R\\2013', 'Una', '520', '41', '1025.61', '2013', 0, 0, 0, '', '', '', '', '', '', '1873', '908', '20', '42', '34', '28.80', '35', '125', '13', '2.10', '32.25', '28.80', '0.40', '149', '465.34', '96.90', '113.05', '0'),
(5, '2/R/2013', 'Una', '708', '41', '1144.17', '2013', 1, 0, 1, '2', '', '4', '17.26', '', '17.26', '1873', '908', '20', '42', '34', '28.80', '35', '171', '13', '2.10', '32.25', '28.80', '0.40', '149', '467.55', '96.90', '113.05', '0'),
(4, '1/R/2013', 'Una', '520', '41', '1439.59', '2013', 1, 0, 1, '3', '', '10', '21.32', '', '21.32', '1873', '908', '20', '42', '34', '28.80', '35', '125', '13', '2.10', '32.25', '28.80', '0.40', '149', '465.34', '96.90', '113.05', '0'),
(6, '3\\R\\2013', 'Una', '1813', '41', '1235.67', '2013', 2, 0, 0, '5,', '', '', '74.33,', '', '', '1873', '908', '20', '42', '34', '28.80', '35', '437', '13', '2.10', '32.25', '28.80', '0.40', '149', '466.61', '96.90', '113.05', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `lotno`, `frange`, `tarea`, `mext`, `rsd`, `forest`, `blaze`, `year`, `division`, `blazen`) VALUES
(2, '1/R/2013', 'Bharwain', 'Hot', 'Rill', 'Sidhchalet', 'Bharwain', 520, '2013', 'Una', 520),
(3, '2/R/2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'Bharwain', 708, '2013', 'Una', 708),
(4, '3\\R\\2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'BC-8', 340, '2013', 'Una', 340),
(5, '3\\R\\2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'BC-9', 434, '2013', 'Una', 434),
(6, '3\\R\\2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'BC-10', 400, '2013', 'Una', 400),
(7, '3\\R\\2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'BC-11', 467, '2013', 'Una', 467),
(8, '3\\R\\2013', 'Bharwain', 'Hot', 'Rill', 'Saloi', 'E.Ambali', 172, '2013', 'Una', 172);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '1\\R\\2013', '41', '2013', 'Una'),
(2, '023', '0', '2013', 'Una'),
(3, '2\\R\\2013', '0', '2013', 'Una'),
(4, '1/R/2013', '41', '2013', 'Una'),
(5, '2/R/2013', '41', '2013', 'Una'),
(6, '3\\R\\2013', '41', '2013', 'Una');

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
