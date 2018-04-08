-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 10:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_sl` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `regester_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_sl`, `name`, `email`, `password`, `regester_date`) VALUES
(1, 'Tanvir', 'tanvir@gmail.com', '31b9e0f8d37656b8039a1bcf1c81ff71', '2018-02-08 21:32:07'),
(2, 'Sharfi Rahman', 'sharfi@gmail.com', 'eb0505b7a48dd9d9f96a5678b3072838', '2018-02-09 13:52:55'),
(3, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2018-04-06 12:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `assignedcourse`
--

CREATE TABLE `assignedcourse` (
  `serial_no` int(11) NOT NULL,
  `instructor_id` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `section` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedcourse`
--

INSERT INTO `assignedcourse` (`serial_no`, `instructor_id`, `course_code`, `section`, `semester`) VALUES
(1, '100', 'CSE105', 1, 'spring15'),
(3, '101', 'CSE105', 2, 'spring15'),
(4, '102', 'CSE105', 3, 'spring15'),
(5, '102', 'CSE207', 1, 'spring15'),
(6, '100', 'CSE205', 1, 'spring15'),
(7, '102', 'CSE477', 1, 'spring18'),
(8, '1', 'CSE498', 1, 'spring18');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_sl` int(11) NOT NULL,
  `course_sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_mark`
--

CREATE TABLE `assignment_mark` (
  `sl_no` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `assignment_sl` int(11) NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_mark`
--

INSERT INTO `assignment_mark` (`sl_no`, `student_id`, `assignment_sl`, `mark`) VALUES
(13, '1001', 1, 5),
(14, '1001', 6, 8),
(16, '	2015-1-60-000', 6, 6),
(17, '2015-1-60-003', 5, 10),
(18, '2015-1-60-000', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_sl` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(50) DEFAULT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_sl`, `course_code`, `course_title`, `credit`) VALUES
(1, 'CSE105', 'Structured Programming', 4),
(3, 'CSE107', 'Object Oriented Programming', 4),
(4, 'CSE205', 'Discrete Mathematics', 3),
(5, 'CSE207', 'Data Structure', 4),
(6, 'CSE477', 'Data Mining', 3),
(7, 'CSE498', 'Ethics', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `student_id` varchar(30) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`student_id`, `serial_no`, `activate`) VALUES
('1001', 1, 1),
('1001', 2, 1),
('1001', 5, 1),
('1001', 7, 1),
('2015-1-60-000', 1, 1),
('2015-1-60-000', 7, 1),
('2015-1-60-000', 8, 1),
('2015-1-60-002', 7, 1),
('2015-1-60-003', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_sl` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_sl`, `name`, `id`, `email`, `password`) VALUES
(1, 'Razwan', '100', 'tanvir@gmail.com', '31b9e0f8d37656b8039a1bcf1c81ff71'),
(2, 'Shantanu', '101', 'shantanu@gmail.com', 'b3347abacd45c286a4fdb6154e1dc069'),
(3, 'Sharfi Rahman', '102', 'sharfi@gmail.com', '31b9e0f8d37656b8039a1bcf1c81ff71'),
(4, 'Andrew NG', 'I-001', 'andrew@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Demo Instructor', '1', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `offered_assignment`
--

CREATE TABLE `offered_assignment` (
  `assignment_sl` int(11) NOT NULL,
  `course_sl` int(11) NOT NULL,
  `assignment_title` text NOT NULL,
  `submission_date` date NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered_assignment`
--

INSERT INTO `offered_assignment` (`assignment_sl`, `course_sl`, `assignment_title`, `submission_date`, `password`) VALUES
(1, 1, 'Loop and Functions', '2018-03-16', 'tanvir'),
(2, 1, 'Assignment on Structure', '2018-03-22', 'tanvir'),
(5, 5, 'Logical Operators', '2018-03-31', 'tanvir'),
(6, 7, 'K-NN', '2018-04-19', '123456'),
(7, 8, 'Basic Ethical Issues', '2018-04-20', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `serial_no` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`serial_no`, `name`, `student_id`, `email`, `password`) VALUES
(1, 'Tanvir', '1001', 'tanvir@gmail.com', '5db85fe4d7c285f5b49749b7a411daf6'),
(2, 'sharfi', '1002', 'sharfi@gmail.com', 'eac5bc0e6a1f53f714320b0229b31487'),
(3, 'Demo', '2015-1-60-000', 'demostudent@me.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'User', '2015-1-60-001', 'user@gmail.com', '5db85fe4d7c285f5b49749b7a411daf6'),
(8, 'Shantanu', '2015-1-60-002', 'shantanu@gmail.com', '2e9cc0cc73d64cd2bcdc602eaa8f0759'),
(9, 'Mark', '2015-1-60-003', 'mark@gmail.com', '6d295738eb6579053ac46a9ca1902583');

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
  `submission_sl` int(11) NOT NULL,
  `assignment_sl` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `file` varchar(100) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`submission_sl`, `assignment_sl`, `student_id`, `file`, `file_type`, `size`, `submission_date`) VALUES
(5, 2, '1001', '42234-lyrics.docx', 'application/vnd.open', 12069, '0000-00-00'),
(6, 2, '1001', '37056-MS_Word_full.docx', 'application/vnd.open', 30504, '2018-03-19'),
(14, 6, '1001', '64154-cse360MoorsLaw.docx', 'application/vnd.open', 15705, '2018-04-06'),
(15, 6, '2015-1-60-000', '31471-info.docx', 'application/vnd.open', 14297, '2018-04-06'),
(16, 5, '2015-1-60-003', '61094-info.docx', 'application/vnd.open', 14297, '2018-04-07'),
(17, 7, '2015-1-60-000', '72347-Assignment.docx', 'application/vnd.open', 16583, '2018-04-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_sl`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  ADD PRIMARY KEY (`serial_no`,`instructor_id`,`course_code`,`section`,`semester`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_sl`);

--
-- Indexes for table `assignment_mark`
--
ALTER TABLE `assignment_mark`
  ADD PRIMARY KEY (`sl_no`,`student_id`,`assignment_sl`),
  ADD UNIQUE KEY `student_id` (`student_id`,`assignment_sl`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_sl`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`student_id`,`serial_no`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_sl`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `offered_assignment`
--
ALTER TABLE `offered_assignment`
  ADD PRIMARY KEY (`assignment_sl`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `submitted`
--
ALTER TABLE `submitted`
  ADD PRIMARY KEY (`submission_sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_mark`
--
ALTER TABLE `assignment_mark`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offered_assignment`
--
ALTER TABLE `offered_assignment`
  MODIFY `assignment_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `submission_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  ADD CONSTRAINT `assignedcourse_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
