-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 10:55 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user`, `password`) VALUES
(1, 'admin', 'admin@m', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `project_id`, `user_id`, `title`) VALUES
(1, 1, 1, 2),
(2, 1, 4, 3),
(3, 1, 3, 3),
(4, 1, 2, 1),
(5, 2, 4, 2),
(6, 2, 2, 3),
(7, 2, 1, 3),
(8, 3, 3, 2),
(9, 3, 2, 3),
(10, 3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(199) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL DEFAULT '0000-00-00',
  `project_type` text NOT NULL,
  `summary` text NOT NULL,
  `progress` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `start_date`, `deadline`, `project_type`, `summary`, `progress`) VALUES
(1, 'Android Task Manager App', '2017-12-05', '2017-12-20', 'Android Application', 'Simple task management app', 70),
(2, 'Employee Management System', '2017-12-05', '2017-12-27', '.NET Application', 'Manage all employees', 100),
(3, 'IQ Tester', '2017-12-05', '2017-12-28', 'Java Application', 'Test your IQ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(50) NOT NULL,
  `review` tinyint(1) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `label`, `category`, `start_date`, `deadline`, `description`, `review`, `done`, `member_id`) VALUES
(1, 'asdf', 'asdf', '2017-12-21 20:33:13', '0000-00-00 00:00:00', 'asdf', 1, 0, 1),
(2, 'Work Hard', 'Work', '2017-12-21 20:37:12', '2017-12-19 18:00:00', 'Work', 2, 1, 1),
(3, 'Data Scientist', 'data', '2017-12-21 20:33:26', '2017-12-26 18:00:00', 'asdf', 1, 0, 1),
(4, 'New', '', '2017-12-21 20:55:26', '0000-00-00 00:00:00', '', 0, 0, 0),
(5, 'Job Done', '', '2017-12-21 20:55:35', '0000-00-00 00:00:00', '', 0, 0, 0),
(6, 'o.c', '', '2017-12-21 21:04:40', '0000-00-00 00:00:00', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` mediumblob NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `present_address` varchar(50) NOT NULL,
  `permanent_address` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `rating` double NOT NULL,
  `birth_date` date NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `image_name`, `phone`, `email`, `title`, `emp_id`, `nid`, `department`, `present_address`, `permanent_address`, `salary`, `rating`, `birth_date`, `joining_date`, `user`, `password`) VALUES
(1, 'Tanveer Hoque', '', '', '', '', 'Web Developer', 'SFT-001', '', 'Software', '', '', 20000, 4.5, '1995-08-17', '2017-12-10 09:47:45', 'tanveer', 'tanveer'),
(2, 'Omayer Khan', '', '', '', '', 'Data Analyst', 'SFT-002', '', 'Software', '', '', 25000, 4.7, '1995-07-21', '2017-12-10 09:47:45', 'omayer', 'omayer'),
(3, 'Sagar Basak', '', '', '', '', 'Web Designer', 'SFT-003', '', 'Design', '', '', 20000, 4.8, '1994-02-17', '2017-12-10 09:47:45', 'sagar', 'sagar'),
(4, 'Johora Akter Polin', '', '', '', '', 'Software Developer', 'SFT-004', '', 'Software', '', '', 20000, 4.6, '1995-12-18', '2017-12-10 09:47:45', 'polin', 'polin'),
(5, 'Shafiur Rahman Uchchash', '', '', '', '', 'Web Designer & Developer', 'SFT-005', '', 'Software', '', '', 20000, 3.9, '1995-10-01', '2017-12-10 09:47:45', 'shafiur', 'shafiur'),
(6, 'Abdullah Wasif', '', '', '', '', 'Software Developer', 'SFT-006', '', 'Software', '', '', 20000, 3.8, '1998-03-02', '2017-12-10 09:47:45', 'wasif', 'wasif'),
(7, 'Abdullah Afnan', '', '', '', '', 'Sr. Designer', 'SFT-007', '', 'Design', '', '', 25000, 2.1, '1995-12-07', '2017-12-10 09:47:45', 'afnan', 'afnan'),
(8, 'Rashidul Habib', '', '', '', '', 'Jr. Java Developer', 'SFT-008', '', 'Software', '', '', 20000, 4.2, '1993-12-13', '2017-12-10 09:47:45', 'rashidul', 'rashidul'),
(9, 'Nipul Kumar Muni', '', '', '', '', 'Problem Solver', 'SFT-009', '', 'Software', '', '', 40000, 4.5, '1995-01-17', '2017-12-10 09:47:45', 'nipul', 'nipul'),
(12, 'asdf', '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '2017-12-10 09:47:45', '', ''),
(13, 'asdf', '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '2017-12-10 09:47:45', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `member_id` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
