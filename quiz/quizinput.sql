-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 03:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizinput`
--

-- --------------------------------------------------------

--
-- Table structure for table `passagelist`
--

CREATE TABLE IF NOT EXISTS `passagelist` (
  `pass_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `passage` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `quesno` int(5) NOT NULL,
  PRIMARY KEY (`pass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `passagelist`
--

INSERT INTO `passagelist` (`pass_id`, `passage`, `date`, `quesno`) VALUES
(28, '<p>nnj</p>', '2017-03-26', 1),
(29, '<p>hbjhb</p>', '2017-03-26', 1),
(33, '<p>jknkjn</p>', '2017-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questiondata`
--

CREATE TABLE IF NOT EXISTS `questiondata` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `pass_id` bigint(20) NOT NULL,
  `question` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `one` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `two` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `three` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `four` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ans` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `exp` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `questiondata`
--

INSERT INTO `questiondata` (`id`, `pass_id`, `question`, `one`, `two`, `three`, `four`, `ans`, `exp`) VALUES
(2, 11, 'haha', '1', '2', '2', '4', '2', '45'),
(3, 11, 'jiji', 'jn', 'nkjn', 'kjnknjk', 'kjn', '1', 'nkjnk'),
(4, 1, '5', '5', '5', '5', '55', '1', '4'),
(5, 0, 'gjhvhg', 'vhv', 'vghv', 'vvhgvhv', 'gv  ', '1', 'lijklnkjn'),
(6, 14, 'hbb', 'bhb', 'bhbhb', 'hbhbhbhb', 'bh', 'a', 'bhjbjhbhj'),
(7, 15, '424', '212', '1221', '442', '2424', 'A', '\r\n564654'),
(8, 16, 'jhbjn', 'bjhbjhb', 'jhbjhbhj', 'bjhb', 'jhb', 'A', 'uhuihiuh'),
(9, 16, 'hhbhyuh', 'hu', 'huyh', 'uh', 'uhh', 'B', 'uyghuyghuyg'),
(10, 20, 'klmlkm', 'mkmlkm', 'lkmklmlk', 'mlmlkmlk', 'mlkm', 'A', 'kmlkm'),
(11, 22, 'ujghjh', 'bjhbj', 'hbjhbhjb', 'jhbjhb', 'jhbjb', 'A', 'jhbjb'),
(12, 22, 'bjhbjhb', 'jhbj', 'hjhb', 'jhb', 'jhb', 'A', 'jhb'),
(13, 22, 'ujghjh', 'bjhbj', 'hbjhbhjb', 'jhbjhb', 'jhbjb', 'A', 'jhbjb'),
(14, 22, 'bjhbjhb', 'jhbj', 'hjhb', 'jhb', 'jhb', 'A', 'jhb'),
(15, 22, 'ujghjh', 'bjhbj', 'hbjhbhjb', 'jhbjhb', 'jhbjb', 'A', 'jhbjb'),
(16, 22, 'bjhbjhb', 'jhbj', 'hjhb', 'jhb', 'jhb', 'A', 'jhb'),
(17, 25, '<ul><li>kljklmm</li></ul>', '<ul><li>lkmlmkklm</li></ul>', '<ul><li>olml;ml</li></ul>', '<ul><li>kuhnknjk</li></ul>', '<ul><li>uhbjuhbjhb</li></ul>', 'A', '<p>jhbb<strong>kjhkjhnjk</strong></p>'),
(18, 26, '<p>jhbjmbmj<strong>jknjknjn</strong></p>', '<p>knkn</p>', '<p>kjn</p>', '<p>kjn</p>', '<p>nkjnkjn</p>', 'A', '<p>jnjknkj</p>'),
(19, 27, '<p>lklkml</p><p>kjnklm</p><p>knlknm</p>', '<p>kmlkmkl</p>', '<p>kmlkm</p>', '<p>klmlkmklm</p>', '<p>kmklm</p>', 'A', '<p>kmlkm</p>'),
(20, 28, '<p>jnkjnk<strong>njkn</strong></p>', '<p>nkjnkjn</p>', '<p>nkjnkj</p>', '<p>nkjnkjnkjn</p>', '<p>kjnkjnkj</p>', 'A', '<p>jknkjn</p>'),
(21, 29, '<p>uhnkjn</p>', '<p>nkjn</p>', '<p>kjnkjn</p>', '<p>kjn</p>', '<p>kjnkj</p>', 'C', '<p>nkjnkj<strong>ijiji</strong></p>'),
(23, 32, '<p>hay huh jnj balle balle?</p>', '<p>Qwerty Apple Mago</p>', '<p>kjbnkjn jnkjnkjnkj kjnknkjnjkn</p>', '<p>nkjnkjn nknkjnk</p>', '<p>&nbsp;nknknkjnkjn</p>', 'A', '<p>ljioji lilkjil</p>'),
(24, 33, '<p>jknkjn</p>', '<p>njknjkn</p>', '<p>nkjnk</p>', '<p>jnjnjn</p>', '<p>nkjnjk</p>', 'A', '<p>jknjkn</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
