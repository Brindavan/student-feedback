-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 08:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(1, 'MCA'),
(2, 'MBA'),
(3, 'M.Com');

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
('13DVSM001', 'Mr.john', 1),
('13DVSM002', 'Mr.Bob', 1),
('13DVSB003', 'Mr.Janin', 2),
('13DVSB004', 'Ms.Arpita', 2),
('12DVSC006', 'Mr.Rambo', 3),
('13DVSC007', 'Ms.Animika', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject`
--

CREATE TABLE IF NOT EXISTS `faculty_subject` (
`id` int(11) NOT NULL,
  `faculty_id` varchar(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_subject`
--

INSERT INTO `faculty_subject` (`id`, `faculty_id`, `subject_id`) VALUES
(1, '13DVSM001', 1),
(2, '13DVSM001', 2),
(3, '13DVSM001', 3),
(4, '13DVSM002', 4),
(5, '13DVSM002', 5),
(6, '13DVSM002', 6),
(7, '13DVSM002', 7),
(8, '13DVSB003', 8),
(9, '13DVSB003', 10),
(10, '13DVSB003', 12),
(11, '13DVSB004', 9),
(12, '13DVSB004', 11),
(13, '12DVSC006', 13),
(14, '12DVSC006', 14),
(15, '13DVSC007', 15),
(16, '13DVSC007', 16);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` varchar(15) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Stand-in structure for view `search_view`
--
CREATE TABLE IF NOT EXISTS `search_view` (
`student_id` varchar(20)
,`stu_name` varchar(50)
,`department_id` int(11)
,`semester` int(11)
);
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
('12DVSCA001', 'Ramu', 1, 5),
('12DVSCA002', 'Rahul', 1, 5),
('13DVSCB001', 'Rajan', 3, 2),
('13DVSCB002', 'Roshan', 3, 2),
('13DVSCD003', 'Rohit', 2, 3),
('13DVSCD004', 'sujata', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `department`, `sem`, `subject_name`, `subject_code`) VALUES
(1, 1, 5, 'COMPUTER GRAPHICS', '5MCA1'),
(2, 1, 5, 'SIMULATION AND MODELING', '5MCA2'),
(3, 1, 5, 'WEB TECHNOLOGY', '5MCA3'),
(4, 1, 5, 'INTERNET SECURITY', '5MCA4'),
(5, 1, 5, 'E-COMMERCE', '5MCA5'),
(6, 1, 5, 'SOFTWARE ENGINEERING ', '5MCA6'),
(7, 1, 5, 'FUNDAMENTAL OF ALGORITHM', '5MCA7'),
(8, 2, 3, 'ACCOUNTING FOR MANAGER', '3MBA1'),
(9, 2, 3, 'BUSINESS ANALYTIC', '3MBA2'),
(10, 2, 3, 'MARKETING MANAGEMENT ', '3MBA3'),
(11, 2, 3, 'HUMAN RESOURCE MANAGEMENT', '3MBA4'),
(12, 2, 3, 'FINANCIAL MANAGEMENT ', '3MBA5'),
(13, 3, 2, 'RESEARCH METHOD', '2MCOM1'),
(14, 3, 2, 'STRATEGIC MANAGEMENT', '2MCOM2'),
(15, 3, 2, 'CONSUMER BEHAVIOR', '2MCOM3'),
(16, 3, 2, 'MARKETING RESEARCH', '2MCOM4');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `university_id` int(11) NOT NULL,
  `university` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `username`, `password`, `Category`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(7, 'Rohit', '2d235ace000a3ad85f590e321c89bb99', 'user'),
(4, 'Rahul', '439ed537979d8e831561964dbbbd7413', 'user'),
(6, 'Ramu', '58ecfdc7967e35bac8738978c0070a2c', 'user'),
(8, 'Sujata', 'baa4abd4d84d871cb191be8ea05afa05', 'user'),
(5, 'Roshan', 'd6dfb33a2052663df81c35e5496b3b1b', 'user'),
(3, 'Rajan', 'f6565efd42846497a538b4d08a84bca8', 'user');

-- --------------------------------------------------------

--
-- Structure for view `search_view`
--
DROP TABLE IF EXISTS `search_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`student`@`localhost` SQL SECURITY DEFINER VIEW `search_view` AS select `student`.`student_id` AS `student_id`,`student`.`stu_name` AS `stu_name`,`student`.`department_id` AS `department_id`,`student`.`semester` AS `semester` from `student` where ((`student`.`student_id` like '%ramu%') or (`student`.`stu_name` like '%ramu%') or (`student`.`department_id` like '%ramu%') or (`student`.`semester` like '%ramu%'));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
