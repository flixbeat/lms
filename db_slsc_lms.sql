-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 04:05 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_slsc_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `id` int(11) NOT NULL,
  `author` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_authors`
--

INSERT INTO `tbl_authors` (`id`, `author`) VALUES
(1, 'Haduca, Carmelita P.'),
(2, 'Garcia Ana R. et. al.'),
(3, 'Labatete Isabelita L. et. al.'),
(4, 'Oliveros, yolanda B. et. al.'),
(5, 'Mendoza, Perla B. et. al.'),
(6, 'Arcinas, Raquel S. et. al.'),
(7, 'Mendoza, Ma. Corazon, et. al.'),
(8, 'Saludsod, Emma C. '),
(9, 'Ferrer, Porfiria F.'),
(10, 'De Guzman, Aladdin,  et. al.'),
(14, 'new author test1'),
(15, 'new author test12'),
(16, 'ming ming'),
(17, 'De Guzman, Aladdin,  et. al.xx'),
(18, 'ms. tia'),
(19, 'super 8'),
(20, 'mr. 8'),
(21, 'floyd'),
(22, 'inya'),
(23, 'dave'),
(24, 'dave123'),
(25, 'James Raid'),
(26, 'Mendel Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `book_number` int(11) NOT NULL COMMENT 'a unique identifier for books aside from id',
  `title` varchar(150) DEFAULT NULL,
  `edition` varchar(80) DEFAULT NULL COMMENT 'fk - tbl_editions.id',
  `author` int(11) DEFAULT NULL COMMENT 'fk - tbl_authors.id',
  `pages` int(11) DEFAULT NULL,
  `publisher` int(11) DEFAULT NULL COMMENT 'fk - tbl_publishers.id',
  `book_year` smallint(6) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `source_of_fund` int(11) DEFAULT NULL COMMENT 'fk - tbl_source_of_funds.id',
  `cost_price` float DEFAULT '0',
  `remarks` int(11) DEFAULT NULL COMMENT 'fk - tbl_remarks.id',
  `isbn` varchar(100) DEFAULT NULL,
  `class` int(11) DEFAULT NULL COMMENT 'fk - tbl_classes.id',
  `qty` int(11) DEFAULT NULL COMMENT 'number of stocks',
  `short_text` mediumtext,
  `availability` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `copy` int(11) DEFAULT NULL,
  `special_features` varchar(100) DEFAULT NULL,
  `tracing` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `book_number`, `title`, `edition`, `author`, `pages`, `publisher`, `book_year`, `date_received`, `source_of_fund`, `cost_price`, `remarks`, `isbn`, `class`, `qty`, `short_text`, `availability`, `status`, `copy`, `special_features`, `tracing`) VALUES
(1, 1, 'Experiencing Language Nxx4', '1', 14, 179, 14, 2001, '2000-10-30', 1, 123, 3, '123-123-123', 14, 1, 'sample', 1, 'A', 1, 'Special Feature 310', 'Philippine Tracing Test 456'),
(2, 2, 'Experiencing Language K', '1', 1, 142, 1, 1997, '1998-09-28', 1, 123, 2, '456-456-456', 1, 1, 'sample123', 0, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(3, 3, 'Experiencing Language N', '1', 6, 123, 1, 1993, '0000-00-00', 2, 33, 1, '123-123-123', 7, 1, '''TEXT OVEVIEW''', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(4, 4, 'Experiencing Language N', '1', 6, 123, 1, 1993, '2016-06-05', 2, 33, 1, '123-123-123', 7, 1, '''TEXT OVEVIEW''', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(5, 5, 'Experiencing Language K', '1', 1, 1, 1, 1993, '2016-06-05', 1, 123, 1, '123-123-123', 1, 1, 'asdfasdfasdf', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(8, 6, 'test123', '1', 12, 123, 6, 1993, '2016-06-05', 6, 2, 3, '123-123-123', 2, 1, 'hello im the short description of this book', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(9, 7, 'Experiencing Language Nxx', '1', 14, 123, 8, 1985, '2016-06-05', 2, 123, 2, '123-123-123''', 2, 1, 'asdf', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(10, 8, 'hello men', '1st', 5, 410, 3, 2012, '1998-09-28', 1, 350, 3, '500-500-500', 3, 5, 'desc', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(11, 9, 'ming ming', '3', 16, 350, 2, 1993, '2016-06-10', 1, 3, 2, '550-550-550', 5, 1, 'hello', 1, 'U', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(12, 10, 'ming ming', '3', 16, 350, 2, 1993, '2016-06-10', 1, 3, 1, '550-550-550', 5, 1, 'hello', 1, 'U', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(13, 11, 'Experiencing Language Nxx', '3', 17, 314, 3, 2001, '2016-06-10', 3, 5, 1, '456-456-456', 2, 3, 'asfd', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(14, 12, 'Experiencing Language Nxx', '3', 17, 314, 3, 2001, '2016-06-10', 3, 5, 1, '456-456-456', 2, 3, 'asfd', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(16, 14, 'the 8''s', '8', 20, 88, 13, 1888, '1998-08-08', 7, 888, 5, '888-888-888', 2, 8, 'all about 8''s', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(17, 15, 'Experiencing Language Nxx', '1', 6, 123, 9, 2020, '2016-06-30', 2, 123, 4, '123-123-123', 14, 1, 'asd', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(18, 16, 'floyd stroy 102', '1', 16, 100, 16, 2000, '2016-06-30', 1, 900, 2, '990-123-900', 4, 10, 'about the book''s abstract', 1, 'A', NULL, 'Special Feature 308', 'Philippine Tracing Test 123'),
(74, 17, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 1, 'Special Feature 308', 'Philippine Tracing Test 123'),
(75, 18, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 2, 'Special Feature 308', 'Philippine Tracing Test 123'),
(76, 19, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 3, 'Special Feature 308', 'Philippine Tracing Test 123'),
(77, 20, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 4, 'Special Feature 308', 'Philippine Tracing Test 123'),
(78, 21, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 5, 'Special Feature 308', 'Philippine Tracing Test 123'),
(79, 22, 'yep', '', 10, 0, 8, 0, '2016-07-27', 8, 0, 1, '456-456-456', 9, 1, '', 1, 'A', 6, 'Special Feature 308', 'Philippine Tracing Test 123'),
(83, 23, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'U', 1, 'Special Feature 308', 'Philippine Tracing Test 123'),
(84, 24, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 2, 'Special Feature 308', 'Philippine Tracing Test 123'),
(85, 25, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 3, 'Special Feature 308', 'Philippine Tracing Test 123'),
(86, 26, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 4, 'Special Feature 308', 'Philippine Tracing Test 123'),
(87, 27, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 5, 'Special Feature 308', 'Philippine Tracing Test 123'),
(88, 28, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 6, 'Special Feature 308', 'Philippine Tracing Test 123'),
(89, 29, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 7, 'Special Feature 308', 'Philippine Tracing Test 123'),
(90, 30, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 8, 'Special Feature 308', 'Philippine Tracing Test 123'),
(91, 31, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 9, 'Special Feature 308', 'Philippine Tracing Test 123'),
(92, 32, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 10, 'Special Feature 308', 'Philippine Tracing Test 123'),
(93, 33, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 11, 'Special Feature 308', 'Philippine Tracing Test 123'),
(94, 34, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 12, 'Special Feature 308', 'Philippine Tracing Test 123'),
(95, 35, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 13, 'Special Feature 308', 'Philippine Tracing Test 123'),
(96, 36, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 14, 'Special Feature 308', 'Philippine Tracing Test 123'),
(97, 37, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 15, 'Special Feature 308', 'Philippine Tracing Test 123'),
(98, 38, 'The big dog', '2', 25, 301, 20, 2003, '2016-07-27', 2, 899, 2, '3123-551-61', 50, 1, 'sample abstract', 1, 'A', 16, 'Special Feature 308', 'Philippine Tracing Test 123'),
(99, 39, 'Another Bottle', '1', 26, 300, 6, 2010, '2016-07-28', 1, 900, 2, '123-456-789', 51, 1, 'Sample Abstract', 1, 'A', 1, 'Special Offerday', 'Le Heading of This'),
(100, 40, 'Another Bottle', '1', 26, 300, 6, 2010, '2016-07-28', 1, 900, 2, '123-456-789', 51, 1, 'Sample Abstract', 1, 'A', 2, 'Special Offerday', 'Le Heading of This'),
(101, 41, 'Another Bottle', '1', 26, 300, 6, 2010, '2016-07-28', 1, 900, 2, '123-456-789', 51, 1, 'Sample Abstract', 1, 'A', 3, 'Special Offerday', 'Le Heading of This'),
(102, 42, 'The one sixty', '1', 21, 160, 15, 1600, '2016-08-02', 1, 160, 3, '160-160-160', 52, 1, 'siga ka isu?', 1, 'A', 1, 'Special Offerday 160', 'Principles of 160'),
(103, 43, 'The one sixty', '1', 21, 160, 15, 1600, '2016-08-02', 1, 160, 3, '160-160-160', 52, 1, 'siga ka isu?', 1, 'A', 2, 'Special Offerday 160', 'Principles of 160');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrowing_logbook`
--

CREATE TABLE `tbl_borrowing_logbook` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `cur_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `over_due_status` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` int(11) DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_borrowing_logbook`
--

INSERT INTO `tbl_borrowing_logbook` (`id`, `book_id`, `student_id`, `cur_date`, `due_date`, `over_due_status`, `return_date`, `return_status`, `school_year_id`) VALUES
(37, 99, 3, '2016-08-02', '2016-08-01', 1, '2016-08-02', 1, 2),
(38, 99, 3, '2016-08-02', '2016-08-03', NULL, '2016-08-02', 1, 2),
(39, 3, 3, '2016-08-02', '2016-08-03', NULL, '2016-08-02', 1, 2),
(40, 2, 3, '2017-08-04', '2017-08-07', NULL, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id` int(11) NOT NULL,
  `class` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `class`) VALUES
(1, '418-H117-1997'),
(2, '414-6165-1997'),
(3, '414-L111-1997'),
(4, '414-012-1997'),
(5, '414-M523-1997'),
(6, '414-Ar26-1997'),
(7, 'Fil 370.114-Sa148-1997'),
(8, 'Fil 340.11-F414-1997'),
(9, 'Fil 370.114-D34'),
(10, 'Fil 370.114-J328-1997'),
(11, 'Fil 370.114-J284-1997'),
(12, 'Fil 370.114-N514-1997'),
(13, 'Fil 418-C888-1997'),
(14, 'KO 123-IK0-2000'),
(50, '416-223-195'),
(51, 'SHID-123-456'),
(52, 'FLOYD-160');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_editions`
--

CREATE TABLE `tbl_editions` (
  `id` int(11) NOT NULL,
  `edition` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_editions`
--

INSERT INTO `tbl_editions` (`id`, `edition`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, 'revised'),
(11, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_levels`
--

CREATE TABLE `tbl_grade_levels` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade_levels`
--

INSERT INTO `tbl_grade_levels` (`id`, `grade_level`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Graduated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `school_year_id` int(11) NOT NULL,
  `log_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id`, `student_id`, `school_year_id`, `log_date`) VALUES
(8, 1, 2, '2016-04-05'),
(9, 2, 2, '2016-04-05'),
(10, 2, 2, '2016-04-06'),
(11, 3, 2, '2016-04-06'),
(12, 4, 2, '2016-04-06'),
(13, 5, 2, '2016-04-12'),
(14, 6, 2, '2016-04-12'),
(15, 6, 2, '2016-04-12'),
(16, 1, 2, '2016-06-23'),
(17, 8, 2, '2016-06-23'),
(18, 1, 2, '2016-06-23'),
(19, 1, 2, '2016-06-23'),
(20, 2, 2, '2016-06-23'),
(21, 5, 2, '2016-06-23'),
(22, 7, 2, '2016-06-23'),
(24, 8, 2, '0000-00-00'),
(25, 2, 2, '2016-06-26'),
(26, 2, 2, '2016-06-26'),
(27, 2, 2, '2016-06-26'),
(28, 12, 2, '2016-07-20'),
(29, 12, 2, '2016-07-20'),
(30, 12, 2, '2016-07-20'),
(31, 12, 2, '2016-07-20'),
(32, 12, 2, '2016-07-20'),
(33, 12, 2, '2016-07-20'),
(34, 12, 2, '2016-07-20'),
(35, 12, 2, '2016-07-20'),
(36, 12, 2, '2016-07-20'),
(37, 12, 2, '2016-07-20'),
(38, 12, 2, '2016-07-20'),
(39, 12, 2, '2016-07-20'),
(40, 12, 2, '2016-07-20'),
(41, 12, 2, '2016-07-20'),
(42, 12, 2, '2016-07-20'),
(43, 12, 2, '2016-07-20'),
(44, 12, 2, '2016-07-20'),
(45, 13, 2, '2016-07-20'),
(46, 13, 2, '2016-07-20'),
(47, 13, 2, '2016-07-20'),
(48, 13, 2, '2016-07-20'),
(49, 13, 2, '2016-07-20'),
(50, 13, 2, '2016-07-20'),
(51, 11, 2, '2016-07-20'),
(52, 11, 2, '2016-07-20'),
(53, 11, 2, '2016-07-20'),
(54, 11, 2, '2016-07-20'),
(55, 11, 2, '2016-07-20'),
(56, 11, 2, '2016-07-20'),
(57, 11, 2, '2016-07-20'),
(58, 11, 2, '2016-07-20'),
(59, 11, 2, '2016-07-20'),
(60, 11, 2, '2016-07-20'),
(113, 10, 2, '2016-07-20'),
(114, 10, 2, '2016-07-20'),
(115, 10, 2, '2016-07-20'),
(116, 10, 2, '2016-07-20'),
(117, 10, 2, '2016-07-20'),
(118, 10, 2, '2016-07-20'),
(119, 10, 2, '2016-07-20'),
(120, 10, 2, '2016-07-20'),
(121, 10, 2, '2016-07-20'),
(122, 10, 2, '2016-07-20'),
(123, 10, 2, '2016-07-20'),
(124, 10, 2, '2016-07-20'),
(125, 10, 2, '2016-07-20'),
(126, 10, 2, '2016-07-20'),
(127, 10, 2, '2016-07-20'),
(128, 10, 2, '2016-07-20'),
(129, 10, 2, '2016-07-20'),
(130, 10, 2, '2016-07-20'),
(131, 10, 2, '2016-07-20'),
(132, 10, 2, '2016-07-20'),
(133, 10, 2, '2016-07-20'),
(134, 10, 2, '2016-07-20'),
(135, 9, 2, '2016-07-20'),
(136, 9, 2, '2016-07-20'),
(137, 9, 2, '2016-07-20'),
(138, 9, 2, '2016-07-20'),
(139, 9, 2, '2016-07-20'),
(140, 9, 2, '2016-07-20'),
(141, 9, 2, '2016-07-20'),
(142, 9, 2, '2016-07-20'),
(143, 9, 2, '2016-07-20'),
(144, 9, 2, '2016-07-20'),
(145, 9, 2, '2016-07-20'),
(146, 9, 2, '2016-07-20'),
(147, 9, 2, '2016-07-20'),
(148, 9, 2, '2016-07-20'),
(149, 9, 2, '2016-07-20'),
(150, 14, 2, '2016-07-20'),
(151, 14, 2, '2016-07-20'),
(152, 14, 2, '2016-07-20'),
(153, 14, 2, '2016-07-20'),
(154, 14, 2, '2016-07-20'),
(155, 14, 2, '2016-07-20'),
(156, 14, 2, '2016-07-20'),
(157, 15, 2, '2016-07-20'),
(158, 15, 2, '2016-07-20'),
(159, 15, 2, '2016-07-20'),
(160, 16, 2, '2016-07-21'),
(161, 17, 2, '2016-07-21'),
(165, 3, 3, '2017-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lrc`
--

CREATE TABLE `tbl_lrc` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) DEFAULT NULL COMMENT 'fk - tbl_students.id',
  `date_entered` date DEFAULT NULL COMMENT 'logs of date student entered the library'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overdue_fines`
--

CREATE TABLE `tbl_overdue_fines` (
  `id` int(11) NOT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `date_return` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_overdue_fines`
--

INSERT INTO `tbl_overdue_fines` (`id`, `borrow_id`, `student_id`, `due_date`, `date_return`, `amount`, `school_year_id`) VALUES
(1, 37, 3, '2016-08-01', '2016-08-02', 500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publishers`
--

CREATE TABLE `tbl_publishers` (
  `id` int(11) NOT NULL,
  `publisher` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_publishers`
--

INSERT INTO `tbl_publishers` (`id`, `publisher`) VALUES
(1, 'JO-ES PUBLISHING'),
(2, 'FNB EDUCATIONAL'),
(3, 'ABIVA PUBLISHING'),
(4, 'SALESIANA'),
(6, 'new publisher test'),
(8, 'JO-ES PUBLISHING1'),
(9, 'test_publisher1'),
(10, 'test_publisher13'),
(11, 'JO-ES PUBLISHINGxx'),
(13, '8 publishing co'),
(14, 'JO-ES PUBLISHING 523'),
(15, 'floyd publishing corp'),
(16, 'floy''s publishing corp'),
(17, 'test_publisher'),
(18, 'unya'),
(19, 'dave'),
(20, 'Green Pub Corp.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remarks`
--

CREATE TABLE `tbl_remarks` (
  `id` int(11) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_remarks`
--

INSERT INTO `tbl_remarks` (`id`, `remarks`) VALUES
(1, 'N/A'),
(2, 'Textbook'),
(3, 'Book Section'),
(4, 'Missing'),
(5, 'Discarded');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id` int(11) NOT NULL,
  `rule` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`id`, `rule`, `value`) VALUES
(1, 'rule1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `id` int(11) NOT NULL,
  `sy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `sy`) VALUES
(1, '2015-2016'),
(2, '2016-2017'),
(3, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`id`, `section`) VALUES
(1, '1-1'),
(2, '1-2'),
(3, '1-3'),
(4, '1-4'),
(5, '1-5'),
(6, '1-6'),
(7, '1-7'),
(8, '2-1'),
(9, '2-2'),
(10, '2-3'),
(11, '2-4'),
(12, '2-5'),
(13, '2-6'),
(14, '2-7'),
(15, '3-1'),
(16, '3-2'),
(17, '3-3'),
(18, '3-4'),
(19, '3-5'),
(20, '3-6'),
(21, '3-7'),
(22, '4-1'),
(23, '4-2'),
(24, '4-3'),
(25, '4-4'),
(26, '4-5'),
(27, '4-6'),
(28, '4-7'),
(29, '5-1'),
(30, '5-2'),
(31, '5-3'),
(32, '5-4'),
(33, '5-5'),
(34, '5-6'),
(35, '5-7'),
(36, '6-1'),
(37, '6-2'),
(38, '6-3'),
(39, '6-4'),
(40, '6-5'),
(41, '6-6'),
(42, '6-7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_source_of_funds`
--

CREATE TABLE `tbl_source_of_funds` (
  `id` int(11) NOT NULL,
  `source_of_fund` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_source_of_funds`
--

INSERT INTO `tbl_source_of_funds` (`id`, `source_of_fund`) VALUES
(1, 'Examination Copy'),
(2, 'Complimentary Copy'),
(3, 'Purchased Copy'),
(4, 'Evaluation Copy'),
(7, 'new source of fund test103'),
(8, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `student_num` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `student_num`, `student_name`, `grade_level_id`, `section_id`, `date`, `status`) VALUES
(1, 1001, 'Von David', 1, 2, NULL, NULL),
(2, 2001, 'Czar Karet', 2, 8, NULL, NULL),
(3, 3002, 'Arnie Sibuyan', 3, 17, NULL, NULL),
(4, 4601, 'Floyd Derek', 4, 28, NULL, NULL),
(5, 5000, 'Karl Louie', 5, 32, NULL, NULL),
(6, 6000, 'Edmark Perez', 6, 40, NULL, NULL),
(7, 1002, 'John', 1, 3, NULL, NULL),
(8, 1321, 'Sherbey', 1, 4, NULL, NULL),
(9, 1520, 'Smoke', 1, 6, NULL, NULL),
(10, 1921, 'Elmer', 1, 7, NULL, NULL),
(11, 1010, 'Myuki', 1, 1, NULL, NULL),
(12, 1672, 'Marjorie', 1, 3, NULL, NULL),
(13, 1677, 'Marco', 1, 5, NULL, NULL),
(14, 1111, 'Carlos', 1, 4, NULL, NULL),
(15, 1090, 'Jords', 1, 6, NULL, NULL),
(16, 9090, 'Miko Bur-ao', 2, 5, NULL, NULL),
(17, 30065, 'Floyd Panget', 2, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `uname` varchar(80) DEFAULT NULL,
  `pword` varchar(32) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `uname`, `pword`, `modified`, `created`, `user_type_id`, `name`, `position`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-06-12 11:43:11', '2016-06-12 11:43:16', 1, 'mr. admin', 'System Admin', '2016-08-04'),
(2, 'dave', '1610838743cc90e3e4fdda748282d9b8', '2016-08-01 00:00:00', '2016-08-01 00:00:00', 2, 'von', 'Librarian', '2016-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertypes`
--

CREATE TABLE `tbl_usertypes` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertypes`
--

INSERT INTO `tbl_usertypes` (`id`, `user_type`) VALUES
(1, 'Administrator'),
(2, 'Librarian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`,`book_number`);

--
-- Indexes for table `tbl_borrowing_logbook`
--
ALTER TABLE `tbl_borrowing_logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_editions`
--
ALTER TABLE `tbl_editions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade_levels`
--
ALTER TABLE `tbl_grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lrc`
--
ALTER TABLE `tbl_lrc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_overdue_fines`
--
ALTER TABLE `tbl_overdue_fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_remarks`
--
ALTER TABLE `tbl_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_source_of_funds`
--
ALTER TABLE `tbl_source_of_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `tbl_borrowing_logbook`
--
ALTER TABLE `tbl_borrowing_logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tbl_editions`
--
ALTER TABLE `tbl_editions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_grade_levels`
--
ALTER TABLE `tbl_grade_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `tbl_lrc`
--
ALTER TABLE `tbl_lrc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_overdue_fines`
--
ALTER TABLE `tbl_overdue_fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_remarks`
--
ALTER TABLE `tbl_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_source_of_funds`
--
ALTER TABLE `tbl_source_of_funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
