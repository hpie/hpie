-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 208.91.198.197:3306
-- Generation Time: Jul 05, 2013 at 08:16 AM
-- Server version: 5.5.30-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foxsol_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_detail`
--

CREATE TABLE IF NOT EXISTS `login_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `category` text NOT NULL,
  `fwd` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `login_detail`
--

INSERT INTO `login_detail` (`id`, `fname`, `lname`, `username`, `password`, `category`, `fwd`) VALUES
(1, 'Admin', 'Shimla', 'admin', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Shimla'),
(2, 'User', 'Chamba', 'chamba', '2be70f6897e5e8bb554828cfdd09917f', 'client', 'Chamba'),
(3, 'User', 'Chopal', 'chopal', 'c4f49cce9573ccee3bb8b0477e256055', 'client', 'Chopal'),
(4, 'User', 'Dharamsala', 'dharamsala', '471e3a446997b62eb780e641a8593d32', 'client', 'Dharamsala'),
(5, 'User', 'Fatehpur', 'fatehpur', '7b45d5cf2eb40eee83f5181e9878b8da', 'client', 'Fatehpur'),
(6, 'User', 'Hamirpur', 'hamirpur', '5699dd828b0471208fd7915fe405a7ab', 'client', 'Hamirpur'),
(7, 'User', 'Kullu', 'kullu', '600d40f0e5eeb8d47299b7661284decb', 'client', 'Kullu'),
(8, 'User', 'Mandi', 'mandi', 'b45203151a9f2a7368ea53ab8c51d3a7', 'client', 'Mandi'),
(9, 'User', 'Nahan', 'nahan', '65368e319c522edcb2981b90189e115d', 'client', 'Nahan'),
(10, 'User', 'Rampur', 'rampur', 'e4353b8889087deaf0c684a60065c9cd', 'client', 'Rampur'),
(11, 'User', 'Sawra', 'sawra', '0e1cc7c95ff39b0b79fccf310103be86', 'client', 'Sawra'),
(12, 'User', 'Shimla', 'shimla', '340b2cdaf0720e1cabe4f9270474ef39', 'client', 'Shimla'),
(13, 'User', 'Solan', 'solan', '794bde2ceefa657be4b59ee162b48eb4', 'client', 'Solan'),
(14, 'User', 'SunderNagar', 'sundernagar', '30190339abe8cd55aa8ed242ea14415a', 'client', 'SunderNagar'),
(15, 'User', 'Una', 'una', '3fff14fd3bef9016d6d7a83beabf6aac', 'client', 'Una'),
(16, 'Admin', 'Shimla', 'adminshimla', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Shimla'),
(17, 'Admin', 'Chamba', 'adminchamba', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Chamba'),
(18, 'Admin', 'Chopal', 'adminchopal', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Chopal'),
(19, 'Admin', 'Dharamsala', 'admindharamsala', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Dharamsala'),
(20, 'Admin', 'Fatehpur', 'adminfatehpur', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Fatehpur'),
(21, 'Admin', 'Hamirpur', 'adminhamirpur', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Hamirpur'),
(22, 'Admin', 'Kullu', 'adminkullu', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Kullu'),
(23, 'Admin', 'Mandi', 'adminmandi', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Mandi'),
(24, 'Admin', 'Nahan', 'adminnahan', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Nahan'),
(25, 'Admin', 'Rampur', 'adminrampur', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Rampur'),
(26, 'Admin', 'Sawra', 'adminsawra', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Sawra'),
(27, 'Admin', 'Solan', 'adminsolan', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Solan'),
(28, 'Admin', 'SunderNagar', 'adminsundernagar', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'SunderNagar'),
(29, 'Admin', 'Una', 'adminuna', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin', 'Una');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
