-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 08:17 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `question_no` int(100) NOT NULL,
  `Q` varchar(200) NOT NULL,
  `A` varchar(200) NOT NULL,
  `B` varchar(200) NOT NULL,
  `C` varchar(200) NOT NULL,
  `D` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `user_id` int(11) NOT NULL,
  `topic1` tinyint(1) NOT NULL,
  `topic2` tinyint(1) NOT NULL,
  `topic3` tinyint(1) NOT NULL,
  `topic4` tinyint(1) NOT NULL,
  `topic5` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`user_id`, `topic1`, `topic2`, `topic3`, `topic4`, `topic5`) VALUES
(13, 0, 0, 1, 1, 1),
(13, 0, 0, 1, 1, 1),
(13, 0, 0, 1, 1, 1),
(14, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic_sugg`
--

CREATE TABLE `topic_sugg` (
  `user_id` int(11) NOT NULL,
  `topic_sugg` varchar(200) CHARACTER SET utf16le NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_sugg`
--

INSERT INTO `topic_sugg` (`user_id`, `topic_sugg`) VALUES
(13, 'fret'),
(13, 'tret'),
(13, 'fret'),
(13, 'tret'),
(14, 'rtyrty'),
(14, '65765'),
(14, 'uikuik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `phone`) VALUES
(6, 'admin', '9895410360', 2147483647),
(7, 'admin', '9895410360', 2147483647),
(8, 'admin', '9895410360', 2147483647),
(9, 'admin', '9895410360', 2147483647),
(10, 'admin', '9895410360', 2147483647),
(11, 'admin', '9895410360', 2147483647),
(12, 'admin', '9895410360', 2147483647),
(13, 'rakesh', 'rakesh@gmail.com', 35435),
(14, 'test', 're', 56756);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
