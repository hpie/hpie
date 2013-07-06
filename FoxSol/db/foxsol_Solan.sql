-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:04 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Solan`
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
(1, '1873', '42', '34', '14.78', '20', '32.25', '2.10', '28.80', '0.40', '96.90', '113.06');

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
(1, '1/2013', 'Nalagarh', '2013', '2013-02-27', '2013-03-26', '2013-11-30', '806.16', '1', 'Bhuri Lal'),
(2, '1/2013', 'Nalagarh', '2013', '2013-02-27', '2013-03-26', '2013-11-30', '806.16', '0', 'Bhuri Lal'),
(3, '2/2013', 'Nalagarh', '2013', '2013-02-27', '2013-03-26', '0000-00-00', '796.26', '0', 'Bhuri Lal'),
(4, '8/2013', 'Nalagarh', '2013', '2013-02-27', '2013-03-26', '0000-00-00', '811.20', '0', 'Bhuri Lal'),
(5, '1/2013', 'Nalagarh', '2013', '2013-02-27', '2013-03-26', '0000-00-00', '806.16', '0', 'Bhuri Lal');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `lotno`, `division`, `forest`, `blazen`, `year`, `frange`, `unit`) VALUES
(1, '1/2013', 'Nalagarh', 'DPF Suna C-2b 528  C-2c 424  Suna(S) 546 ', 1498, '2013', 'Kohu', 'Nalagarh'),
(2, '8/2013', 'Nalagarh', 'DPF Kotkhai/ C-1 1848 C-2a 433 C-2f 550 C-2h 411 C-2I 407', 3649, '2013', 'Kohu', 'Nalagarh'),
(3, '8/2013', 'Nalagarh', ' Tunsu (S) 486', 486, '2013', 'Kohu', 'Nalagarh'),
(4, '8/2013', 'Nalagarh', ' Tyamu (S) 283', 283, '2013', 'Kohu', 'Nalagarh'),
(5, '8/2013', 'Nalagarh', ' Baila (S) 409', 409, '2013', 'Kohu', 'Nalagarh'),
(6, '8/2013', 'Nalagarh', ' Baddu (S) 235', 235, '2013', 'Kohu', 'Nalagarh'),
(7, '2/2013', 'Nalagarh', 'DPF Chalwana C-1', 543, '2013', 'Kohu', 'Nalagarh'),
(8, '2/2013', 'Nalagarh', 'C-2a', 387, '2013', 'Kohu', 'Nalagarh'),
(9, '2/2013', 'Nalagarh', 'C-2b', 329, '2013', 'Kohu', 'Nalagarh'),
(10, '2/2013', 'Nalagarh', 'C-2c', 449, '2013', 'Kohu', 'Nalagarh'),
(11, '2/2013', 'Nalagarh', ' DPF Maloun', 622, '2013', 'Kohu', 'Nalagarh'),
(12, '2/2013', 'Nalagarh', ' Fogen (S)', 99, '2013', 'Kohu', 'Nalagarh'),
(13, '2/2013', 'Nalagarh', ' Plloun(S)', 305, '2013', 'Kohu', 'Nalagarh'),
(14, '2/2013', 'Nalagarh', ' Sainj(S)', 99, '2013', 'Kohu', 'Nalagarh'),
(15, '2/2013', 'Nalagarh', ' Kohu Nichla(S)', 254, '2013', 'Kohu', 'Nalagarh'),
(16, '3/2013', 'Nalagarh', 'DPFSurjpur C-1 251', 251, '2013', 'Kohu', 'Nalagarh'),
(17, '3/2013', 'Nalagarh', 'C-3 512', 512, '2013', 'Kohu', 'Nalagarh'),
(18, '3/2013', 'Nalagarh', ' C-4a 130 ', 130, '2013', 'Kohu', 'Nalagarh'),
(19, '3/2013', 'Nalagarh', 'C-4b 459', 459, '2013', 'Kohu', 'Nalagarh'),
(20, '3/2013', 'Nalagarh', ' C-4C 724', 724, '2013', 'Kohu', 'Nalagarh'),
(21, '3/2013', 'Nalagarh', ' Lag(S)196', 196, '2013', 'Kohu', 'Nalagarh'),
(22, '3/2013', 'Nalagarh', 'Kiyarghat(S)17', 17, '2013', 'Kohu', 'Nalagarh'),
(23, '3/2013', 'Nalagarh', 'Bhinkhari(S)725', 725, '2013', 'Kohu', 'Nalagarh'),
(24, '3/2013', 'Nalagarh', 'Manjijhary(S)140', 140, '2013', 'Kohu', 'Nalagarh'),
(25, '3/2013', 'Nalagarh', 'Banahan(S)109', 109, '2013', 'Kohu', 'Nalagarh'),
(26, '3/2013', 'Nalagarh', 'Rajwaha(S) C-1 329', 329, '2013', 'Kohu', 'Nalagarh'),
(27, '3/2013', 'Nalagarh', 'Rajwaha (S) C-2  153 ', 153, '2013', 'Kohu', 'Nalagarh'),
(28, '3/2013', 'Nalagarh', 'Bharech(S) 131', 131, '2013', 'Kohu', 'Nalagarh');

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
(1, '8/2013', 'Nalagarh', 'Kohu', 'DPF Kotkhai/ C-1 1848 C-2a 433 C-2f 550 C-2h 411 C-2I 407, Tunsu (S) 486, Tyamu (S) 283, Baila (S) 409, Baddu (S) 235', 'Hot ', 'Rill', 'Chhachhi', 'Nalagarh', 'Nalagarh'),
(2, '1/2013', 'Nalagarh', 'Kohu', 'DPF Suna C-2b 528  C-2c 424  Suna(S) 546 ', 'Hot ', 'Rill', 'Loharghat', 'Nalagarh', 'Nalagarh'),
(3, '2/2013', 'Nalagarh in lot 2/2013', 'Kohu', 'DPF Chalwana C-1,C-2a,C-2b,C-2c, DPF Maloun, Fogen (S), Plloun(S), Sainj(S), Kohu Nichla(S)', 'Hot ', 'Rill', 'Loharghat', 'Nalagarh', 'Nalagarh'),
(4, '3/2013', 'Nalagarh', 'Kohu', 'DPFSurjpur C-1 251,C-3 512, C-4a 130 ,C-4b 459, C-4C 724, Lag(S)196,Kiyarghat(S)17,Bhinkhari(S)725,Manjijhary(S)140,Banahan(S)109,Rajwaha(S) C-1 329,Rajwaha (S) C-2  153 ,Bharech(S) 131', 'Hot ', 'Rill', 'Loharghat', 'Nalagarh', 'Nalagarh');

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
(1, '1', 'Nalagarh', 2013, 1, 5, 2013, 31, 5, 2013, 1498, 3, '', 68, 68, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '11.56', '11.56', '0', '0'),
(2, '1', 'Nalagarh', 2013, 1, 6, 2013, 30, 6, 2013, 1498, 3, '', 68, 68, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '11.56', '11.56', '0', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `upset_price`
--

INSERT INTO `upset_price` (`id`, `lotno`, `division`, `tenblazes`, `yieldfixed`, `rate`, `Year`, `numman`, `nummul`, `numtrac`, `leadmanD`, `leadmulD`, `leadtracD`, `leadmanQ`, `leadmulQ`, `leadtracQ`, `cropsetR`, `ResinEx`, `matecom`, `mancar`, `mulcar`, `traccar`, `tool`, `emptinnum`, `emptindis`, `emptinsolR`, `emptinR`, `trate25`, `trateb25`, `distancefact`, `tchargeavg`, `lrate50`, `lrateb50`, `distanceload`) VALUES
(10, '1/2013', 'Nalagarh', '1498', '43', '1136.71', '2013', 1, 1, 1, '1', '3', '1', '64.41', '64.41', '64.41', '1873', '908', '20', '42', '34', '28.80', '0', '379', '0', '2.10', '32.25', '28.80', '0.40', '155', '481.11', '96.90', '113.06', '0'),
(7, '2/2013', 'Nalagarh', '3087', '45', '1139.98', '2013', 1, 1, 0, '1', '4', '', '138.92', '138.92', '', '1873', '908', '20', '42', '34', '14.78', '0', '817', '0', '2.10', '32.25', '28.80', '0.40', '155', '480.91', '96.90', '113.06', '0'),
(9, '3/2013', 'Nalagarh', '3876', '45', '1134.78', '2013', 1, 1, 1, '1', '3', '1', '174.42', '174.42', '174.42', '1873', '908', '20', '42', '34', '28.80', '0', '1026', '0', '2.10', '32.25', '28.80', '0.40', '155', '480.99', '96.90', '113.06', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `lotno`, `frange`, `tarea`, `mext`, `rsd`, `forest`, `blaze`, `year`, `division`, `blazen`) VALUES
(1, '1/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'DPF Suna C-2b 528  C-2c 424  Suna(S) 546 ', 1498, '2013', 'Nalagarh', 1498),
(2, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'DPF Chalwana C-1', 543, '2013', 'Nalagarh', 543),
(3, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'C-2a', 387, '2013', 'Nalagarh', 387),
(4, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'C-2b', 329, '2013', 'Nalagarh', 329),
(5, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'C-2c', 449, '2013', 'Nalagarh', 449),
(6, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' DPF Maloun', 622, '2013', 'Nalagarh', 622),
(7, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' Fogen (S)', 99, '2013', 'Nalagarh', 99),
(8, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' Plloun(S)', 305, '2013', 'Nalagarh', 305),
(9, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' Sainj(S)', 99, '2013', 'Nalagarh', 99),
(10, '2/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' Kohu Nichla(S)', 254, '2013', 'Nalagarh', 254),
(20, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' C-4C 724', 724, '2013', 'Nalagarh', 724),
(19, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'C-4b 459', 459, '2013', 'Nalagarh', 459),
(18, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' C-4a 130 ', 130, '2013', 'Nalagarh', 130),
(17, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'C-3 512', 512, '2013', 'Nalagarh', 512),
(16, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'DPFSurjpur C-1 251', 251, '2013', 'Nalagarh', 251),
(21, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', ' Lag(S)196', 196, '2013', 'Nalagarh', 196),
(22, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Kiyarghat(S)17', 17, '2013', 'Nalagarh', 17),
(23, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Bhinkhari(S)725', 725, '2013', 'Nalagarh', 725),
(24, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Manjijhary(S)140', 140, '2013', 'Nalagarh', 140),
(25, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Banahan(S)109', 109, '2013', 'Nalagarh', 109),
(26, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Rajwaha(S) C-1 329', 329, '2013', 'Nalagarh', 329),
(27, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Rajwaha (S) C-2  153 ', 153, '2013', 'Nalagarh', 153),
(28, '3/2013', 'Kohu', 'Hot ', 'Rill', 'Loharghat', 'Bharech(S) 131', 131, '2013', 'Nalagarh', 131);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '8/2013', '34', '2013', 'Nalagarh'),
(2, '1/2013', '43', '2013', 'Nalagarh'),
(3, '2/2013', '45', '2013', 'Nalagarh'),
(4, '3/2013', '45', '2013', 'Nalagarh');

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
