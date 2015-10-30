-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 11:03 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(3, 'M.Com'),
(2, 'MBA'),
(1, 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` varchar(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `department_id`) VALUES
('13DVSCC001', 'MR.Robart', 2),
('13DVSCC002', 'MR.Joy', 2),
('13DVSCC003', 'Ms.Bella', 2),
('13DVSCC004', 'Ms.Bano', 2),
('13DVSCC005', 'Mr.Sam', 2),
('13DVSCC006', 'MS.Jessi', 2),
('13DVSCC007', 'Mr.Carry', 2),
('13DVSCD001', 'Mr.Sumith', 1),
('13DVSCD002', 'Ms.Jessica', 1),
('13DVSCD003', 'MR.Michal', 1),
('13DVSCD004', 'MR.Jhon', 1),
('13DVSCD005', 'Ms.Nikita', 1),
('13DVSCD006', 'Mr.Morgan', 1),
('13DVSCD007', 'Ms.Alexgendra', 1),
('13DVSCE001', 'Mr.Jimi', 3),
('13DVSCE002', 'Mr.Simi', 3),
('13DVSCE003', 'Ms.Jessy', 3),
('13DVSCE004', 'Ms.Benrji', 3),
('13DVSCE005', 'Mr.Tom', 3),
('13DVSCE006', 'Mr.Zoy', 3),
('13DVSCE007', 'Mr.Bob', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(5000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`) VALUES
(1, 'Personality\r\n\r\n'),
(2, 'Punctuality'),
(3, 'Temperament'),
(4, 'Discipline'),
(5, 'Approach towards students'),
(6, 'Regularity'),
(7, 'Moral influence in moulding the character'),
(8, 'Subject and General Knowledge'),
(9, 'Presentation Skill'),
(10, 'Clarity of speech'),
(11, 'Pedagoy'),
(12, 'Subject Orientation'),
(13, 'Interest Creating'),
(14, 'Handing of question'),
(15, 'Discussion & Interaction'),
(16, 'Explanation & Class Note if any'),
(17, 'Syllabus Completion'),
(18, 'Handling of Laboratory exercise'),
(19, 'Curricular & Co-curricular activities'),
(20, 'Overall Assessment about your teacher');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(20) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `stu_name`, `department_id`, `semester`) VALUES
('13DSVCB004', 'Lovely', 3, 5),
('13DVCSB008', 'Ava', 3, 5),
('13DVCSB010', 'Terry', 3, 5),
('13DVSCA001', 'Jai', 1, 5),
('13DVSCA0010', 'Jacky', 1, 5),
('13DVSCA002', 'Sam', 1, 5),
('13DVSCA003', 'Micky', 1, 5),
('13DVSCA004', 'John', 1, 5),
('13DVSCA005', 'Jerry', 1, 5),
('13DVSCA006', 'Barry', 1, 5),
('13DVSCA007', 'Alex', 1, 5),
('13DVSCA008', 'Ramesh', 1, 5),
('13DVSCA009', 'Rajesh', 1, 5),
('13DVSCB001', 'Aejx', 3, 5),
('13DVSCB002', 'Nibal', 3, 5),
('13DVSCB003', 'Zerry', 3, 5),
('13DVSCB005', 'Sem', 3, 5),
('13DVSCB006', 'Semi', 3, 5),
('13DVSCB007', 'Ellie', 3, 5),
('13DVSCB009', 'Stephni', 3, 5),
('13DVSCM001', 'Jack', 2, 5),
('13DVSCM002', 'Vijay', 2, 5),
('13DVSCM003', 'Ajex', 2, 5),
('13DVSCM004', 'Kim', 2, 5),
('13DVSCM005', 'Cali', 2, 5),
('13DVSCM006', 'Jimi', 2, 5),
('13DVSCM007', 'Susan', 2, 5),
('13DVSCM008', 'Merry', 2, 5),
('13DVSCM009', 'Heather', 2, 5),
('13DVSCM010', 'Begi', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(7) NOT NULL,
  `department` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `department`, `subject_name`, `subject_code`) VALUES
(1, 1, 'computer graphic', '5mca1'),
(2, 1, 'computer network', '5mca2'),
(3, 1, 'fundamental of algorithm', '5mca3'),
(4, 1, 'web technology', '5mca4'),
(5, 1, 'simulation and modelong', '5mca5'),
(6, 1, 'internet programming', '5mca6'),
(7, 1, 'artificial intelligence', '5mca7'),
(8, 2, 'management &organisational behaviour', '3mba11'),
(9, 2, 'economics for managers', '3mba12'),
(10, 2, 'account for manager', '3mba3'),
(11, 2, 'business analytics', '3mba4'),
(12, 2, 'marketing mangement', '3mba5'),
(13, 2, 'managerial communitation', '3mba6'),
(14, 2, 'human resource management', '4mba1'),
(15, 2, 'finance management', '4mba2'),
(16, 2, 'research methods', '4mba3'),
(17, 3, 'business,government and society', '1mcom1'),
(18, 3, 'strategic management', '1mcom2'),
(19, 3, 'entrepreneurial development', '1mcom3'),
(20, 3, 'consumer behavior', '1mcom4'),
(21, 3, 'retail management', '1mcom5');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `university_id` int(11) NOT NULL,
  `university` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university`) VALUES
(1, 'Bangalore University'),
(2, 'Visvesvaraya Technological University'),
(3, 'Bharti University');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `sn` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `category` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `username`, `password`, `category`) VALUES
(1, 'Manoj', '5e81f9859d223ea420aca993c647b839', 'admin'),
(2, 'Ravi', '63dd3e154ca6d948fc380fa576343ba6', ''),
(3, 'anil', 'anil123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
