-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:15 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Mandi`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bark_store`
--

INSERT INTO `bark_store` (`id`, `lotno`, `division`, `year`, `frmdate`, `frmmonth`, `frmyear`, `todate`, `tomonth`, `toyear`, `nblazes`, `nmazdoor`, `remark`, `frange`) VALUES
(4, '1', 'Jogindernagar', 2013, 1, 4, 2013, 30, 4, 2013, 3305, 5, '', ''),
(5, '8', 'Mandi', 2013, 1, 4, 2013, 30, 4, 2013, 10038, 16, '\r\n', ''),
(6, '3', 'Jogindernagar', 2013, 1, 3, 2013, 30, 3, 2013, 8084, 8, '', '');

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
(1, '1873', '42', '34', '1.152', '20', '32.25', '2.10', '28.8', '.40', '96.90', '113.05');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `current_lsm`
--

INSERT INTO `current_lsm` (`id`, `lotno`, `division`, `year`, `alotdate`, `fromdate`, `todate`, `ratecar`, `ratetrans`, `LSMName`) VALUES
(1, '1/2013', 'Jogindernagar', '2013', '2013-03-15', '2013-03-15', '0000-00-00', '1990', '0', 'Hari Singh'),
(2, '8/2013', 'Mandi', '2013', '2013-03-06', '2013-03-08', '2013-05-15', '1500', '0', 'Rakesh kumar'),
(3, '8/2013', 'Mandi', '2013', '2013-04-16', '2013-04-18', '2013-05-30', '1500', '0', 'Rakesh Kumar'),
(4, '8/2013', 'Mandi', '2013', '2013-03-06', '2013-03-07', '2013-05-15', '1500', '0', 'Rakesh Kumar'),
(5, '3/2013-', 'Jogindernagar', '2013', '2013-03-15', '2013-03-17', '0000-00-00', '1995', '0', 'Hari Singh');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `lotno`, `division`, `forest`, `blazen`, `year`, `frange`, `unit`) VALUES
(1, '1/2013(J)', 'Jogindernagar', 'GHORA', 905, '2013', 'Jogindernagar', 'Jogindernagar'),
(2, '1/2013(J)', 'Jogindernagar', ' MAKORA', 2000, '2013', 'Jogindernagar', 'Jogindernagar'),
(3, '1/2013(J)', 'Jogindernagar', ' KHAJRON', 400, '2013', 'Jogindernagar', 'Jogindernagar'),
(4, '1/2013', 'Jogindernagar', 'GHORA', 905, '2013', 'Jogindernagar', 'Jogindenagar'),
(5, '1/2013', 'Jogindernagar', 'MAKORA', 2000, '2013', 'Jogindernagar', 'Jogindenagar'),
(6, '1/2013', 'Jogindernagar', 'KHAROUN', 400, '2013', 'Jogindernagar', 'Jogindenagar'),
(7, '2', 'Jogindernagar', 'GHATTA C-I', 698, '2013', 'Jogindernagar', 'Jogindernagar'),
(8, '2', 'Jogindernagar', 'GHATTAC-2', 589, '2013', 'Jogindernagar', 'Jogindernagar'),
(9, '2', 'Jogindernagar', 'BHAJRALA C-1', 2000, '2013', 'Jogindernagar', 'Jogindernagar'),
(10, '2', 'Jogindernagar', ' BHAJRALA C-2', 1377, '2013', 'Jogindernagar', 'Jogindernagar'),
(11, '2', 'Jogindernagar', ' BHAJRALA C-3', 730, '2013', 'Jogindernagar', 'Jogindernagar'),
(12, '4/2013', 'Jogindernagar', 'Ramsi', 1530, '2013', 'Jogindernagar', 'Jogindernagar'),
(13, '4/2013', 'Jogindernagar', 'Kamehar', 1600, '2013', 'Jogindernagar', 'Jogindernagar'),
(14, '4/2013', 'Jogindernagar', 'Jamothi', 1020, '2013', 'Jogindernagar', 'Jogindernagar'),
(15, '4/2013', 'Jogindernagar', 'Jalpa', 1950, '2013', 'Jogindernagar', 'Jogindernagar'),
(16, '4/2013', 'Jogindernagar', 'Jol', 330, '2013', 'Jogindernagar', 'Jogindernagar'),
(17, '4/2013', 'Jogindernagar', 'Druble', 403, '2013', 'Jogindernagar', 'Jogindernagar'),
(18, '4/2013', 'Jogindernagar', 'Drahal Ist', 450, '2013', 'Jogindernagar', 'Jogindernagar'),
(19, '4/2013', 'Jogindernagar', 'Drahal 2nd\r\n', 1550, '2013', 'Jogindernagar', 'Jogindernagar'),
(20, '8/2013', 'Mandi', 'Rewalsar', 1830, '2013', 'Mandi', 'Mandi'),
(21, '8/2013', 'Mandi', 'Chohardhar', 1948, '2013', 'Mandi', 'Mandi'),
(22, '8/2013', 'Mandi', 'Jalpadhar', 2000, '2013', 'Mandi', 'Mandi'),
(23, '8/2013', 'Mandi', 'Majhyali', 1565, '2013', 'Mandi', 'Mandi'),
(24, '8/2013', 'Mandi', 'Pipli', 1215, '2013', 'Mandi', 'Mandi'),
(25, '8/2013', 'Mandi', 'Chowkichandrahan', 1480, '2013', 'Mandi', 'Mandi'),
(26, '26/2013', 'Nachan', 'Balhidhar ', 14708, '2013', 'Pandoh', 'Mandi'),
(27, '3/2013-', 'Jogindernagar', 'Bihun', 1570, '2013', 'Jogimdernagar', 'Jogindernagar'),
(28, '3/2013-', 'Jogindernagar', 'Nainpur', 3833, '2013', 'Jogimdernagar', 'Jogindernagar'),
(29, '3/2013-', 'Jogindernagar', 'Shilh', 1950, '2013', 'Jogimdernagar', 'Jogindernagar'),
(30, '3/2013-', 'Jogindernagar', 'Chanahar', 225, '2013', 'Jogimdernagar', 'Jogindernagar'),
(31, '3/2013-', 'Jogindernagar', 'Har', 470, '2013', 'Jogimdernagar', 'Jogindernagar');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lot_desc`
--

INSERT INTO `lot_desc` (`id`, `lotno`, `exten`, `frange`, `forests`, `type_area`, `extract_method`, `rsd`, `unit`, `division`) VALUES
(8, '1/2013', 'Jogindenagar', 'Jogindernagar', 'GHORA,MAKORA,KHAROUN', 'Moderatly hot', 'Rill', 'Nagan', 'Jogindenagar', 'Jogindernagar'),
(3, '2', 'Jogindernagar', 'Jogindernagar', 'GHATTA C-I,GHATTAC-2,BHAJRALA C-1, BHAJRALA C-2, BHAJRALA C-3', 'Moderately hot', 'Rill', 'Ghatta', 'Jogindernagar', 'Jogindernagar'),
(4, '2/2013', 'Jogindernagar 2/2013', 'Jogindernagar', 'Ghatta C-1,Ghatta C-2, Bhajrala C-1,Bhajrala C-2,Bhajrala C-3', 'moderately hot', 'Rill', 'Nagan', 'Jogindernagar', 'Jogindernagar'),
(5, '4/2013', 'Jogindernagar', 'Jogindernagar', 'Ramsi,Kamehar,Jamothi,Jalpa,Jol,Druble,Drahal Ist,Drahal 2nd\r\n', 'Moderately hot', 'Rill', 'Bihun', 'Jogindernagar', 'Jogindernagar'),
(6, '8/2013', 'Mandi', 'Mandi', 'Rewalsar,Chohardhar,Jalpadhar,Majhyali,Pipli,Chowkichandrahan', 'Moderately hot', 'Rill', 'Garloni', 'Mandi', 'Mandi'),
(7, '26/2013', 'Nachan', 'Pandoh', 'Balhidhar ', 'Moderately hot', 'Rill', 'Tawa', 'Mandi', 'Nachan'),
(9, '3/2013-', 'Jogindernagar', 'Jogimdernagar', 'Bihun,Nainpur,Shilh,Chanahar,Har', 'Modertely hot', 'Rill', 'Bihun', 'Jogindernagar', 'Jogindernagar');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tap_store`
--

INSERT INTO `tap_store` (`id`, `lotno`, `division`, `year`, `frmdate`, `frmmonth`, `frmyear`, `todate`, `tomonth`, `toyear`, `nblazes`, `nmazdoor`, `remark`, `tin_collect`, `tin_carried`, `tin_dispatch`, `tin_dispatch_o`, `tin_lost_fi`, `frange`, `tin_lost_f`, `tin_lost_t`, `tin_lost_o`, `tin_lost_t_w`, `tin_lost_o_w`, `tin_lost_fi_w`, `tin_lost_f_w`, `tin_collect_w`, `tin_carried_w`, `tin_dispatch_w`, `tin_dispatch_o_w`) VALUES
(5, '8', 'Mandi', 2013, 1, 4, 2013, 30, 4, 2013, 10038, 16, '\r\n', 40, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '6.80', '0', '0', '0'),
(4, '1', 'Jogindernagar', 2013, 1, 4, 2013, 30, 4, 2013, 3305, 5, '', 8, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '1.36', '0', '0', '0'),
(6, '3', 'Jogindernagar', 2013, 1, 3, 2013, 30, 3, 2013, 8048, 8, '', 15, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '2.55', '0', '0', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `upset_price`
--

INSERT INTO `upset_price` (`id`, `lotno`, `division`, `tenblazes`, `yieldfixed`, `rate`, `Year`, `numman`, `nummul`, `numtrac`, `leadmanD`, `leadmulD`, `leadtracD`, `leadmanQ`, `leadmulQ`, `leadtracQ`, `cropsetR`, `ResinEx`, `matecom`, `mancar`, `mulcar`, `traccar`, `tool`, `emptinnum`, `emptindis`, `emptinsolR`, `emptinR`, `trate25`, `trateb25`, `distancefact`, `tchargeavg`, `lrate50`, `lrateb50`, `distanceload`) VALUES
(7, '3/2013-', 'Jogindernagar', '8048', '41', '1449.74', '2013', 0, 1, 0, '', '8', '', '', '329.968', '', '1873', '1018', '20', '42', '34', '1.152', '66.53', '1941', '8', '2.10', '32.25', '28.8', '.40', '141', '448.06', '96.90', '113.05', '50'),
(4, '1/2013', 'Jogindernagar', '3305', '49', '1420.69', '2013', 0, 1, 0, '', '6.8', '', '', '161.945', '', '1873', '1068', '20', '42', '34', '1.152', '58', '953', '6.8', '2.10', '32.25', '28.8', '.40', '110', '375.26', '96.90', '113.05', '50'),
(6, '8/2013', 'Mandi', '10038', '34', '1127.6', '2013', 0, 6, 5, '', '2.3,3.8,3,3,3.2,4.1', '3,5,2.5,3,10', '', '62.22,66.232,68.00,53.21,41.31,50.32', '62.22,66.232,53.21,41.31,50.32', '1873', '835', '20', '42', '34', '1.152', '78', '2008', '7.15', '2.10', '32.25', '28.8', '.40', '70', '281.05', '96.90', '113.05', '50 mtr');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `lotno`, `frange`, `tarea`, `mext`, `rsd`, `forest`, `blaze`, `year`, `division`, `blazen`) VALUES
(22, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Chowkichandrahan', 0, '2013', 'Mandi', 1480),
(21, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Pipli', 0, '2013', 'Mandi', 1215),
(20, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Majhyali', 0, '2013', 'Mandi', 1565),
(19, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Jalpadhar', 0, '2013', 'Mandi', 2000),
(18, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Chohardhar', 0, '2013', 'Mandi', 1948),
(17, '8/2013', 'Mandi', 'Moderately hot', 'Rill', 'Garloni', 'Rewalsar', 0, '2013', 'Mandi', 1830),
(16, '1/2013', 'Jogindernagar', 'Moderatly hot', 'Rill', 'Nagan', 'KHAROUN', 400, '2013', 'Jogindernagar', 400),
(14, '1/2013', 'Jogindernagar', 'Moderatly hot', 'Rill', 'Nagan', 'GHORA', 905, '2013', 'Jogindernagar', 905),
(15, '1/2013', 'Jogindernagar', 'Moderatly hot', 'Rill', 'Nagan', 'MAKORA', 2000, '2013', 'Jogindernagar', 2000),
(23, '3/2013-', 'Jogimdernagar', 'Modertely hot', 'Rill', 'Bihun', 'Bihun', 1570, '2013', 'Jogindernagar', 1570),
(24, '3/2013-', 'Jogimdernagar', 'Modertely hot', 'Rill', 'Bihun', 'Nainpur', 3833, '2013', 'Jogindernagar', 3833),
(25, '3/2013-', 'Jogimdernagar', 'Modertely hot', 'Rill', 'Bihun', 'Shilh', 1950, '2013', 'Jogindernagar', 1950),
(26, '3/2013-', 'Jogimdernagar', 'Modertely hot', 'Rill', 'Bihun', 'Chanahar', 225, '2013', 'Jogindernagar', 225),
(27, '3/2013-', 'Jogimdernagar', 'Modertely hot', 'Rill', 'Bihun', 'Har', 470, '2013', 'Jogindernagar', 470);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '1/2013', '49', '2013', 'Jogindernagar'),
(2, '8/2013', '34', '2013', 'Mandi'),
(3, '26/2013', '38', '2013', 'Nachan'),
(4, '2', '1200', '2013', 'Jogindernagar'),
(5, '2/2013', '0', '2013', 'Jogindernagar'),
(6, '4/2013', '0', '2013', 'Jogindernagar'),
(7, '3/2013-', '41', '2013', 'Jogindernagar');

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
