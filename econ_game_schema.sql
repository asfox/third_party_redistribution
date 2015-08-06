SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `economicgame2`
--

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(255) NOT NULL,
  `p1_id` varchar(255) DEFAULT NULL,
  `p2_id` varchar(255) DEFAULT NULL,
  `p3_id` varchar(255) DEFAULT NULL,
  `p1_pass` int(11) DEFAULT NULL,
  `p3_pass` int(11) DEFAULT NULL,
  `p1_1` int(11) DEFAULT NULL,
  `p1_2` int(11) DEFAULT NULL,
  `p1_3` int(11) DEFAULT NULL,
  `p2_1` int(11) DEFAULT NULL,
  `p2_2` int(11) DEFAULT NULL,
  `p2_3` int(11) DEFAULT NULL,
  `p3_1` int(11) DEFAULT NULL,
  `p3_2` int(11) DEFAULT NULL,
  `p3_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=544 ;