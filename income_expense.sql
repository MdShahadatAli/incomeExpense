-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 11:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `income_expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'income'),
(2, 'expense');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `pname` varchar(2000) NOT NULL,
  `pprice` float NOT NULL,
  `uid` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `pname`, `pprice`, `uid`) VALUES
(1, 'Potato Chips', 20, 1),
(2, 'Chips', 20, 2),
(3, 'Book', 400, 3),
(4, 'Pen', 15, 3),
(5, 'Laptop', 500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(10) NOT NULL,
  `income` varchar(2000) NOT NULL,
  `tvalue` float NOT NULL,
  `uid` int(3) NOT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `income`, `tvalue`, `uid`, `cid`) VALUES
(1, 'Hack', 5000, 2, NULL),
(2, 'Pocket Money', 1000, 3, NULL),
(3, 'Won', 10000, 2, NULL),
(4, '2', 100000, 0, NULL),
(5, '2', 10000, 0, NULL),
(6, '3', 10000000, 0, NULL),
(7, '1', 2000, 8, NULL),
(8, '1', 100000, 8, NULL),
(9, '1', 2000, 8, NULL),
(10, '2', 5000, 8, NULL),
(11, '1', 50, 8, NULL),
(12, '2', 200000, 8, NULL),
(13, '2', 100000, 11, NULL),
(14, '1', 100000, 11, NULL),
(15, '1', 52525, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(8) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `uemail` varchar(80) NOT NULL,
  `upass` varchar(32) NOT NULL,
  `Creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`, `Creation_date`) VALUES
(4, 'asdf', 'whatever@gmail.com', '1234', '2022-05-21 18:49:01'),
(6, 'leo', 'shahadat@gmail.com', '1111', '2022-05-21 21:53:30'),
(8, 'wick', 'wick@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '2022-05-22 01:23:25'),
(10, 'cucumber', 'cucumber@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', '2022-05-22 01:27:12'),
(11, 'johny', 'johnnysins@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', '2022-05-22 15:26:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
