-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2020 at 04:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `performance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE IF NOT EXISTS `tbl_book` (
  `book_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pubname` varchar(50) NOT NULL,
  `pubdate` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `edition` varchar(11) NOT NULL,
  `category` int(11) NOT NULL,
  `copy_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`book_id`, `name`, `pubname`, `pubdate`, `subject`, `edition`, `category`, `copy_no`) VALUES
(2, 'seisdl', 'pear', 'Robbs', 'oa', '2009', 789456, 19),
(3, 'English 2nst', 'pearson', 'Jonh', 'English', '2006', 4567, 19),
(5, 'SDI', 'Tom', 'Tom Robbins', 'Science', '2019', 925, 20),
(9, 'JAVA', 'Tom', 'Jonh', 'CSE', '2020', 556, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrow`
--

DROP TABLE IF EXISTS `tbl_borrow`;
CREATE TABLE IF NOT EXISTS `tbl_borrow` (
  `book_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `current_date` date NOT NULL,
  `due_date` date NOT NULL,
  `copy_no` int(11) NOT NULL,
  `returned_on` date NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_borrow`
--

INSERT INTO `tbl_borrow` (`book_id`, `userid`, `category`, `current_date`, `due_date`, `copy_no`, `returned_on`, `fine`) VALUES
(8, 1, '72566', '2020-11-10', '2020-11-27', 2, '2020-12-02', 20),
(9, 1, '254', '2020-07-10', '2020-07-14', 1, '2020-07-20', 50),
(10, 1, '254', '2020-09-10', '2020-09-14', 3, '2020-09-13', 10),
(11, 2, '4545', '2020-08-10', '2020-08-13', 2, '2020-08-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_number` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `phn_number` int(200) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_number`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_number`, `name`, `address`, `street`, `city`, `phn_number`, `age`, `email`) VALUES
(1, 'nxx', 'nxnc', ' bcbc', 'ncn', 45, 534, 'jhg@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
