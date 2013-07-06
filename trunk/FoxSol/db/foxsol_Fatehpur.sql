-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:21 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Fatehpur`
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
(1, '1873', '42.00', '34.00', '-', '20.00', '32.25', '2.10', '28.80', '28.80', '96.90', '113.05');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `current_lsm`
--

INSERT INTO `current_lsm` (`id`, `lotno`, `division`, `year`, `alotdate`, `fromdate`, `todate`, `ratecar`, `ratetrans`, `LSMName`) VALUES
(1, '2/R/2013/N', 'Nurpur', '2013', '2013-03-18', '2013-05-01', '2013-11-30', '1650', '4900', 'Kuldeep Singh'),
(2, '13/R-2013/Kotla', 'Nurpur', '2013', '2013-03-19', '2013-05-01', '0000-00-00', '1625', '4900', 'Vinay Verma'),
(3, '14/R-2013/Kotla', 'Nurpur', '2013', '2013-03-18', '2013-04-01', '2013-11-30', '1670', '4900', 'Sher Singh'),
(4, '15/R-2013/Kotla', 'Nurpur', '2013', '2013-03-19', '2013-05-01', '2013-11-30', '1825', '4900', 'Vinay Verma'),
(5, '10-R-2013/Kotla', 'Nurpur', '2013', '2013-03-19', '2013-05-01', '0000-00-00', '1725', '4900', 'Vinay varma'),
(6, '14/R-2013/Kotla', 'Nurpur', '2013', '2013-03-18', '2013-04-01', '0000-00-00', '1670', '4900', 'Sher Singh'),
(7, '15/R-2013/Kotla', 'Nurpur', '2013', '2013-03-19', '2013-05-01', '0000-00-00', '1825', '4900', 'Vinay varma'),
(8, '16/R-2013/Kotla', 'Nurpur', '2013', '2013-03-18', '2013-05-01', '0000-00-00', '1625', '4900', 'Bishan Singh'),
(9, '2/R/2013/N', 'Nurpur', '2013', '2013-03-18', '2013-05-01', '0000-00-00', '930', '4900', 'Kuldeep Singh'),
(10, '17/R/2013/Kotla', 'Nurpur', '2013', '2013-03-22', '2013-04-01', '2013-11-30', '1620', '4900', 'Gagan Singh');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `lotno`, `division`, `forest`, `blazen`, `year`, `frange`, `unit`) VALUES
(1, '2/R/2013/N', 'Nurpur', 'P-39N Ther Kuther C-1C ', 363, '2013', 'Nurpur', 'Nurpur'),
(2, '2/R/2013/N', 'Nurpur', ' P-39 Ther Kuther C-1D ', 567, '2013', 'Nurpur', 'Nurpur'),
(3, '021', 'Dehra', 'dehra', 11, '2013', '23', 'd'),
(4, '021', 'Dehra', ' fatehpur', 10, '2013', '23', 'd'),
(5, '14/R-2013/Kotla', 'Nurpur', 'UP-55 Bhall i  	C-5	                 354\r\n	                  C-7	                  525\r\n	                  C-8	                 2207\r\n	                   C-9                              154\r\n                                     C-13 	               ', 5951, '2013', 'Kotla', 'Kotla'),
(6, '10-R-2013/Kotla', 'Nurpur', 'U-55-Bhali	C-15     	291\r\n	C-17	257\r\n	C-18	492\r\n	C-19	146\r\n	C-20	390\r\n	C-21	703\r\nU-53 Seuni	C-6	192\r\n	Total	2471\r\n', 2471, '2013', 'Kotla', 'Kotla'),
(7, '11-R-2012/Kotla', 'Nurpur', 'U-52 Soldha	C-9	512\r\n	C-10	524\r\n	Total	1036\r\n', 1036, '2013', 'Kotla', 'Kotla'),
(8, '13/R-2013/Kotla', 'Nurpur', 'UP-82    Sermani             c-3             591\r\n	                   C-4	 530\r\n                   	Total	1121\r\n', 1121, '2013', 'kotla', 'Kotla'),
(9, '15/R-2013/Kotla', 'Nurpur', 'U-50 Kathi Wanda	C-9	215\r\n	                  C-12	 591         \r\n	Total	                    805\r\n', 805, '2013', 'Kotla', 'Kotla'),
(10, '16/R-2013/Kotla', 'Nurpur', 'U-47N Anuhi	C-2	523\r\nUP-51 Anuh   i	C-4	223\r\n	                   C-5	115\r\n	                   C-9	98\r\n	                  C-10	230\r\n		\r\n		\r\n	                 Total	1189\r\n', 1189, '2013', 'Kotla', 'Kotla'),
(11, '17/R-2013/Kotla', 'Nurpur', 'P-46.NBol	C-1	130\r\nUP.54.\r\nBol	C-2	 405\r\n	C-9	   31\r\n	C-10	  230\r\n	C-11	  510\r\n	C-13             132    \r\n                  C-14               78	\r\n\r\n	Total	  1516\r\n', 1516, '2013', 'Kotla', 'Kotla'),
(12, '4-R-2013/NPR', 'Nurpur', '\r\nChokki	     C-2	 382\r\n	     C-4	 135\r\n4-12 Mirkh\r\n	     C-6b	188\r\n	     C-5 	561\r\n                    C-6-a	88\r\n                  	C-2-d	125\r\n	Total	1479\r\n', 1479, '2013', 'Nurpur', 'Nurpur'),
(13, '17/R/2013/Kotla', 'Nurpur', 'P46N BOL/ C1  =130 ', 130, '2013', 'Kotla', 'Kotla'),
(14, '17/R/2013/Kotla', 'Nurpur', ' UP54 BOL/ C2  =405', 405, '2013', 'Kotla', 'Kotla'),
(15, '17/R/2013/Kotla', 'Nurpur', ' C9  =31', 31, '2013', 'Kotla', 'Kotla'),
(16, '17/R/2013/Kotla', 'Nurpur', ' C10  =230 ', 230, '2013', 'Kotla', 'Kotla'),
(17, '17/R/2013/Kotla', 'Nurpur', ' C11  =510 ', 510, '2013', 'Kotla', 'Kotla'),
(18, '17/R/2013/Kotla', 'Nurpur', ' C13  =132 ', 132, '2013', 'Kotla', 'Kotla'),
(19, '17/R/2013/Kotla', 'Nurpur', ' C14  =78 ', 78, '2013', 'Kotla', 'Kotla'),
(20, '17/R/2013/Kotla', 'Nurpur', '  TOTAL  =1516', 1516, '2013', 'Kotla', 'Kotla');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `lot_desc`
--

INSERT INTO `lot_desc` (`id`, `lotno`, `exten`, `frange`, `forests`, `type_area`, `extract_method`, `rsd`, `unit`, `division`) VALUES
(2, '2/R/2013/N', 'Gurchal in Lot 2/R/13', 'Nurpur', 'P-39N Ther Kuther C-1C , P-39 Ther Kuther C-1D ', 'Hot Area', 'Rill', 'Gurchal', 'Nurpur', 'Nurpur'),
(3, '021', 'sh in lot 021-2013', '23', 'dehra, fatehpur', 'k', 'Rill', 'sd', 'd', 'Dehra'),
(6, '10-R-2013/Kotla', 'Bhali 10/R-2013/Kotla', 'Kotla', 'U-55-Bhali	C-15     	291\r\n	C-17	257\r\n	C-18	492\r\n	C-19	146\r\n	C-20	390\r\n	C-21	703\r\nU-53 Seuni	C-6	192\r\n	Total	2471\r\n', 'Hot area', 'Rill', 'Bhali', 'Kotla', 'Nurpur'),
(8, '13/R-2013/Kotla', 'Kotla in lot13/R-2013/Kotla', 'kotla', 'UP-82    Sermani             c-3             591\r\n	                   C-4	 530\r\n                   	Total	1121\r\n', 'hot area', 'Rill', 'Kotla', 'Kotla', 'Nurpur'),
(9, '14/R-2013/Kotla', 'Bhali in lot14/R-2013/Kotla', 'Kotla', 'UP-55 Bhall i  	C-5	                 354\r\n	                  C-7	                  525\r\n	                  C-8	                 2207\r\n	                   C-9                              154\r\n                                     C-13 	               ', 'Hot area', 'Rill', 'Bhali', 'Kotla', 'Nurpur'),
(10, '15/R-2013/Kotla', 'Manghar in lot 15/R-2013/Kotla', 'Kotla', 'U-50 Kathi Wanda	C-9	215\r\n	                  C-12	 591         \r\n	Total	                    805\r\n', 'Hot area', 'Rill', 'Manghar', 'Kotla', 'Nurpur'),
(11, '16/R-2013/Kotla', 'Rajol in lot 16/R-2013/Kotla', 'Kotla', 'U-47N Anuhi	C-2	523\r\nUP-51 Anuh   i	C-4	223\r\n	                   C-5	115\r\n	                   C-9	98\r\n	                  C-10	230\r\n		\r\n		\r\n	                 Total	1189\r\n', 'Hot area', 'Rill', 'Rajol', 'Kotla', 'Nurpur'),
(15, '17/R/2013/Kotla', 'Kotla in Lot 17/R/2013(Kotla)', 'Kotla', 'P46N BOL/ C-1 130 , UP54 BOL/ C-2 405, C-9 31, C-10 230 , C-11 510 , C-13 132 , C-14 78   Total   1516  ', 'Hot area', 'Rill', 'Trilokpur', 'Kotla', 'Nurpur');

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
(1, '2', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 930, 1, '', 0, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0'),
(2, '10-R-2013', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 2471, 2, '', 0, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0'),
(3, '13', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 1121, 2, '', 0, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0'),
(4, '15', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 805, 1, '', 0, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0'),
(5, '14', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 1121, 2, '', 5, 5, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0.85', '0.85', '0', '0'),
(6, '16', 'Nurpur', 0, 1, 4, 2013, 30, 4, 2013, 1189, 1, '', 0, 0, 0, 0, 0, '', 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `upset_price`
--

INSERT INTO `upset_price` (`id`, `lotno`, `division`, `tenblazes`, `yieldfixed`, `rate`, `Year`, `numman`, `nummul`, `numtrac`, `leadmanD`, `leadmulD`, `leadtracD`, `leadmanQ`, `leadmulQ`, `leadtracQ`, `cropsetR`, `ResinEx`, `matecom`, `mancar`, `mulcar`, `traccar`, `tool`, `emptinnum`, `emptindis`, `emptinsolR`, `emptinR`, `trate25`, `trateb25`, `distancefact`, `tchargeavg`, `lrate50`, `lrateb50`, `distanceload`) VALUES
(1, '2/R/2013/N', 'Nurpur', '930', '42', '1872.63', '2013', 3, 3, 0, ',,', '3 km,,', '', ',,', '39.99,,', '', '1873', '1650', '20.00', '42.00', '34.00', '-', '', '230', '32.25', '2.10', '32.25', '28.80', '28.80', '80 km', '9502.48', '96.90', '113.05', '25 km'),
(2, '17/R/2013/Kotla', 'Nurpur', '1516', '39', '60.38', '2013', 0, 0, 0, '', '', '', '', '', '', '1873', '', '20.00', '42.00', '34.00', '-', '', '348', '', '2.10', '32.25', '28.80', '28.80', '', '175.22', '96.90', '113.05', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `lotno`, `frange`, `tarea`, `mext`, `rsd`, `forest`, `blaze`, `year`, `division`, `blazen`) VALUES
(1, '2/R/2013/N', 'Nurpur', 'Hot Area', 'Rill', 'Gurchal', 'P-39N Ther Kuther C-1C ', 363, '2013', 'Nurpur', 363),
(2, '2/R/2013/N', 'Nurpur', 'Hot Area', 'Rill', 'Gurchal', ' P-39 Ther Kuther C-1D ', 567, '2013', 'Nurpur', 567),
(3, '10-R-2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Bhali', 'U-55-Bhali	C-15     	291\r\n	C-17	257\r\n	C-18	492\r\n	C-19	146\r\n	C-20	390\r\n	C-21	703\r\nU-53 Seuni	C-6	192\r\n	Total	2471\r\n', 2471, '2013', 'Nurpur', 2471),
(4, '13/R-2013/Kotla', 'kotla', 'hot area', 'Rill', 'Kotla', 'UP-82    Sermani             c-3             591\r\n	                   C-4	 530\r\n                   	Total	1121\r\n', 1121, '2013', 'Nurpur', 1121),
(5, '15/R-2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Manghar', 'U-50 Kathi Wanda	C-9	215\r\n	                  C-12	 591         \r\n	Total	                    805\r\n', 0, '2013', 'Nurpur', 805),
(6, '14/R-2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Bhali', 'UP-55 Bhall i  	C-5	                 354\r\n	                  C-7	                  525\r\n	                  C-8	                 2207\r\n	                   C-9                              154\r\n                                     C-13 	               ', 5951, '2013', 'Nurpur', 5951),
(7, '16/R-2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Rajol', 'U-47N Anuhi	C-2	523\r\nUP-51 Anuh   i	C-4	223\r\n	                   C-5	115\r\n	                   C-9	98\r\n	                  C-10	230\r\n		\r\n		\r\n	                 Total	1189\r\n', 1189, '2013', 'Nurpur', 1189),
(9, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', 'P46N BOL/ C1  =130 ', 0, '2013', 'Nurpur', 130),
(10, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' UP54 BOL/ C2  =405', 0, '2013', 'Nurpur', 405),
(11, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' C9  =31', 0, '2013', 'Nurpur', 31),
(12, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' C10  =230 ', 0, '2013', 'Nurpur', 230),
(13, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' C11  =510 ', 0, '2013', 'Nurpur', 510),
(14, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' C13  =132 ', 0, '2013', 'Nurpur', 132),
(15, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', ' C14  =78 ', 0, '2013', 'Nurpur', 78),
(16, '17/R/2013/Kotla', 'Kotla', 'Hot area', 'Rill', 'Trilokpur', '  TOTAL  =1516', 0, '2013', 'Nurpur', 1516);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '2/R/13/N', '42', '2013', 'Nurpur'),
(2, '2/R/2013/N', '42', '2013', 'Nurpur'),
(3, '10-R-2013/Kotla', '42', '2013', 'Nurpur'),
(4, '13/R-2013/Kotla', '42', '2013', 'Nurpur'),
(5, '14/R-2013/Kotla', '42', '2013', 'Nurpur'),
(6, '15/R-2013/Kotla', '40', '2013', 'Nurpur'),
(7, '16/R-2013/Kotla', '43', '2013', 'Nurpur'),
(8, '17/R/2013/Kotla', '39', '2013', 'Nurpur');

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
