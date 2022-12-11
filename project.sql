-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2022 at 11:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(15) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `name`, `email`, `phone_number`, `gender`, `date_of_birth`, `department`) VALUES
(111, 'Thomas', 'Thomas@gmail.com', '353877112111', 'male', '1999-02-01', 'Software Engineer'),
(112, 'Charles', 'Charles@gmail.com', '353877112112', 'male', '1999-02-02', 'Computer Training'),
(113, 'Christopher', 'Christopher@gmail.com', '353877112113', 'female', '1999-02-03', 'Operations Support'),
(114, 'Daniel', 'Daniel@gmail.com', '353877112114', 'male', '1999-02-04', 'Machine Learning'),
(115, 'Matthew', 'Matthew@gmail.com', '353877112115', 'male', '1999-11-15', 'Machine Learning'),
(116, 'Anthony', 'Anthony@gmail.com', '353877112116', 'male', '1999-02-06', ' Network application'),
(117, 'Mark', 'Mark@gmail.com', '353877112117', 'male', '1999-02-07', 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `id` int(15) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `award_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`id`, `name`, `email`, `phone_number`, `gender`, `date_of_birth`, `department`, `salary`, `award_id`) VALUES
(211, 'Tom', 'tom@gmail.com', '353877111111', 'male', '1999-01-01', 'Software Engineer', 10000, 311),
(212, 'Alice', 'Alice@gmail.com', '353877111112', 'female', '1999-01-02', 'Software Engineer', 20000, 312),
(213, 'James', 'James@gmail.com', '353877111113', 'male', '1999-01-03', 'Cloud Engineer', 20000, 311),
(214, 'James', 'James@gmail.com', '353877111113', 'male', '1999-01-03', 'Cloud Engineer', 20000, NULL),
(215, 'Robert', 'Robert@gmail.com', '353877111114', 'male', '1999-01-04', 'Cloud Engineer', 20000, 313),
(216, 'John', 'John@gmail.com', '353877111115', 'male', '1999-01-05', 'Java Engineer', 20000, 315),
(217, 'David', 'David@gmail.com', '353877111116', 'male', '1999-01-06', 'Java Engineer', 20000, 314),
(218, 'William', 'William@gmail.com', '353877111117', 'male', '1999-01-07', 'Web Engineer', 10000, 315),
(219, 'Richard', 'Richard@gmail.com', '353877111118', 'male', '1999-01-08', 'Web Engineer', 10000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Employee_attendance`
--

CREATE TABLE `Employee_attendance` (
  `employee_id` int(15) NOT NULL,
  `attendance_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee_attendance`
--

INSERT INTO `Employee_attendance` (`employee_id`, `attendance_time`) VALUES
(211, '2022-12-10 10:00:00'),
(212, '2022-12-10 10:00:00'),
(213, '2022-12-10 10:00:00'),
(214, '2022-12-11 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Employee_leave`
--

CREATE TABLE `Employee_leave` (
  `employee_id` int(15) NOT NULL,
  `leave_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee_leave`
--

INSERT INTO `Employee_leave` (`employee_id`, `leave_time`) VALUES
(216, '2022-12-11 17:00:00'),
(217, '2022-12-11 17:00:00'),
(218, '2022-12-11 17:00:00'),
(219, '2022-12-11 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Performance`
--

CREATE TABLE `Performance` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Performance`
--

INSERT INTO `Performance` (`award_id`, `award_name`) VALUES
(311, 'Precious Gem Award'),
(312, 'Superstar Award'),
(313, 'Prime Player Award'),
(314, 'Shining Star Award'),
(315, 'Cloud Collaborator'),
(316, 'Pinnacle Performer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `award_id` (`award_id`);

--
-- Indexes for table `Employee_attendance`
--
ALTER TABLE `Employee_attendance`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `Employee_leave`
--
ALTER TABLE `Employee_leave`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `Performance`
--
ALTER TABLE `Performance`
  ADD PRIMARY KEY (`award_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`award_id`) REFERENCES `performance` (`award_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Employee_attendance`
--
ALTER TABLE `Employee_attendance`
  ADD CONSTRAINT `employee_attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Employee_leave`
--
ALTER TABLE `Employee_leave`
  ADD CONSTRAINT `employee_leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
