-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:09 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_Shimla`
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
(1, '200', '600', '200', '400', '0', '500', '40', '500', '50', '20', '40');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `current_lsm`
--

INSERT INTO `current_lsm` (`id`, `lotno`, `division`, `year`, `alotdate`, `fromdate`, `todate`, `ratecar`, `ratetrans`, `LSMName`) VALUES
(1, '1/2013', 'Shimla', '2013', '2013-04-01', '2013-04-06', '0000-00-00', '50', '20', 'asd'),
(2, '7/2013', 'Shimla', '2013', '2013-03-08', '2013-03-15', '2013-10-30', '1322', '456', 'Sanjay Sood');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `lotno`, `division`, `forest`, `blazen`, `year`, `frange`, `unit`) VALUES
(1, '123', 'Shimla', 'abc1', 100, '2013', 'abc', 'Shimla'),
(2, '123', 'Shimla', 'dsa', 1000, '2013', 'abc', 'Shimla'),
(3, '1/2013', 'Shimla', 'Shimla', 100, '2013', 'shimla', 'shimla'),
(4, '1/2013', 'Shimla', 's1', 20, '2013', 'shimla', 'shimla'),
(5, '1/2013', 'Shimla', 's2', 50, '2013', 'shimla', 'shimla'),
(6, '1/2013', 'Shimla', 's3', 40, '2013', 'shimla', 'shimla'),
(7, '3/2012', 'Shimla', 'U-271 Tungla', 43, '2013', 'Koti', 'Shimla'),
(8, '3/2012', 'Shimla', ' U-273 Rakharh', 476, '2013', 'Koti', 'Shimla'),
(9, '3/2012', 'Shimla', ' U-274 Phanewal', 1080, '2013', 'Koti', 'Shimla'),
(10, '3/2012', 'Shimla', ' U-267 Thund', 1896, '2013', 'Koti', 'Shimla'),
(11, '7/2013', 'Shimla', 'D-210Girbe-C-II', 865, '2013', 'Taradevi', 'Construction'),
(12, '7/2013', 'Shimla', ' D-206 Chamon', 771, '2013', 'Taradevi', 'Construction'),
(13, '7/2013', 'Shimla', ' D-205 Naug Goehha', 313, '2013', 'Taradevi', 'Construction'),
(14, '7/2013', 'Shimla', ' G.C.L. Bhawana', 438, '2013', 'Taradevi', 'Construction'),
(15, '7/2013', 'Shimla', ' G.C.L. KhairiJhakri', 174, '2013', 'Taradevi', 'Construction'),
(16, '7/2013', 'Shimla', ' G.C.L. Panti', 113, '2013', 'Taradevi', 'Construction'),
(17, '7/2013', 'Shimla', ' GCL Baghali', 330, '2013', 'Taradevi', 'Construction'),
(18, '7/2013', 'Shimla', ' GCL Dhanokhari', 128, '2013', 'Taradevi', 'Construction'),
(19, '7/2013', 'Shimla', ' GCL Manjolha', 220, '2013', 'Taradevi', 'Construction'),
(20, '7/2013', 'Shimla', ' GCL Bagana', 53, '2013', 'Taradevi', 'Construction'),
(21, '7/2013', 'Shimla', ' D-215 Jhajia', 650, '2013', 'Taradevi', 'Construction'),
(22, '7/2013', 'Shimla', ' GCL Kanda', 130, '2013', 'Taradevi', 'Construction'),
(23, '7/2013', 'Shimla', ' R-28 Kareroo', 270, '2013', 'Taradevi', 'Construction'),
(24, '7/2013', 'Shimla', ' D-223 Badhari', 308, '2013', 'Taradevi', 'Construction'),
(25, '7/2013', 'Shimla', ' R-30 Magaltoo', 930, '2013', 'Taradevi', 'Construction');

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
(3, 'Shimla', 'Kotgarh'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lot_desc`
--

INSERT INTO `lot_desc` (`id`, `lotno`, `exten`, `frange`, `forests`, `type_area`, `extract_method`, `rsd`, `unit`, `division`) VALUES
(1, '123', 'ABCD', 'abc', 'abc1,dsa', 'cold', 'Rill', 'RSD Shimla', 'Shimla', 'Shimla'),
(2, '1/2013', '1/2013 shimla', 'shimla', 'Shimla,s1,s2,s3', 'cool', 'Rill', 'shimla2', 'shimla', 'Shimla'),
(3, '1/2012', 'Koti Lot 1/2012', 'Koti', 'U-268, Jhandi, D-95 Karoli CIII(a), D-95 Karoli CIII(b), D-95 Karoli CIV, U-267 Satlai, D-95 Karoli CI(a), D-95 Karoli CI(b), U-270 Khandhar', 'Moderately', 'Rill', 'Neen', 'Shimla', 'Shimla'),
(4, '3/2012', 'Koti 3/2013', 'Koti', 'U-271 Tungla, U-273 Rakharh, U-274 Phanewal, U-267 Thund', 'Modertely hot', 'Rill', 'Jathiadevi, Taradevi', 'Shimla', 'Shimla'),
(5, '7/2013', 'Taradevi 7/2013', 'Taradevi', 'D-210Girbe-C-II, D-206 Chamon, D-205 Naug Goehha, G.C.L. Bhawana, G.C.L. KhairiJhakri, G.C.L. Panti, GCL Baghali, GCL Dhanokhari, GCL Manjolha, GCL Bagana, D-215 Jhajia, GCL Kanda, R-28 Kareroo, D-223 Badhari, R-30 Magaltoo', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', 'Construction', 'Shimla');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `upset_price`
--

INSERT INTO `upset_price` (`id`, `lotno`, `division`, `tenblazes`, `yieldfixed`, `rate`, `Year`, `numman`, `nummul`, `numtrac`, `leadmanD`, `leadmulD`, `leadtracD`, `leadmanQ`, `leadmulQ`, `leadtracQ`, `cropsetR`, `ResinEx`, `matecom`, `mancar`, `mulcar`, `traccar`, `tool`, `emptinnum`, `emptindis`, `emptinsolR`, `emptinR`, `trate25`, `trateb25`, `distancefact`, `tchargeavg`, `lrate50`, `lrateb50`, `distanceload`) VALUES
(1, '1/2013', 'Shimla', '210', '40', '111828.81', '2013', 2, 0, 1, '20,40', '', '50', '2,4', '', '40', '200', '500', '0', '600', '200', '400', '400', '49', '40', '40', '500', '500', '50', '40', '7294', '20', '40', '60'),
(2, '3/2012', 'Shimla', '3495', '35', '415790.84', '2013', 2, 2, 15, '2km,', '2km,', ',,,,,,,,,,,,,,', '122.33,', '122.33,', ',,,,,,,,,,,,,,', '200', '835', '20', '42', '34', '400', '250', '720', '14078', '40', '500', '28.80', '0.40', '158', '489.3', '113.05', '113.05', '100mt'),
(4, '7/2013', 'Shimla', '5693', '28', '1322.04', '2013', 2, 4, 0, '1.50,', '4,,,', '', '159.40,', '159.40,,,', '', '1873', '773', '20', '42', '34', '400', '250', '938', '5.50', '2.10', '2.48', '28.80', '.40', '144', '456.22', '0', '113.05', '100mtrs'),
(5, '7/2013', 'Shimla', '5693', '28', '1322.04', '2013', 2, 4, 0, '1.50,', '4,,,', '', '159.40,', '159.40,,,', '', '1873', '773', '20', '42', '34', '400', '250', '938', '5.50', '2.10', '2.48', '28.80', '.40', '144', '456.22', '0', '113.05', '100mtrs');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `lotno`, `frange`, `tarea`, `mext`, `rsd`, `forest`, `blaze`, `year`, `division`, `blazen`) VALUES
(1, '1/2013', 'shimla', 'cool', 'Rill', 'shimla2', 'Shimla', 98, '2013', 'Shimla', 100),
(2, '1/2013', 'shimla', 'cool', 'Rill', 'shimla2', 's1', 15, '2013', 'Shimla', 20),
(3, '1/2013', 'shimla', 'cool', 'Rill', 'shimla2', 's2', 40, '2013', 'Shimla', 50),
(4, '1/2013', 'shimla', 'cool', 'Rill', 'shimla2', 's3', 40, '2013', 'Shimla', 40),
(5, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', 'D-210Girbe-C-II', 865, '2013', 'Shimla', 865),
(6, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' D-206 Chamon', 771, '2013', 'Shimla', 771),
(7, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' D-205 Naug Goehha', 313, '2013', 'Shimla', 313),
(8, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' G.C.L. Bhawana', 438, '2013', 'Shimla', 438),
(9, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' G.C.L. KhairiJhakri', 174, '2013', 'Shimla', 174),
(10, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' G.C.L. Panti', 113, '2013', 'Shimla', 113),
(11, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' GCL Baghali', 330, '2013', 'Shimla', 330),
(12, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' GCL Dhanokhari', 128, '2013', 'Shimla', 128),
(13, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' GCL Manjolha', 220, '2013', 'Shimla', 220),
(14, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' GCL Bagana', 53, '2013', 'Shimla', 53),
(15, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' D-215 Jhajia', 650, '2013', 'Shimla', 650),
(16, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' GCL Kanda', 130, '2013', 'Shimla', 130),
(17, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' R-28 Kareroo', 270, '2013', 'Shimla', 270),
(18, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' D-223 Badhari', 308, '2013', 'Shimla', 308),
(19, '7/2013', 'Taradevi', 'Moderately hot', 'Rill', 'Jathiadevi/Taradevi', ' R-30 Magaltoo', 930, '2013', 'Shimla', 930);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `yield_fixed`
--

INSERT INTO `yield_fixed` (`id`, `lotno`, `yield_fixed`, `year`, `division`) VALUES
(1, '123', '20', '2013', 'Shimla'),
(2, '1/2013', '40', '2013', 'Shimla'),
(3, '1/2012', '35', '2013', 'Shimla'),
(4, '3/2012', '35', '2013', 'Shimla'),
(5, '7/2013', '28', '2013', 'Shimla');

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
