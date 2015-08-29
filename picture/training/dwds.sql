-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2014 at 08:32 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dwds`
--

-- --------------------------------------------------------

--
-- Table structure for table `appraisals`
--

CREATE TABLE IF NOT EXISTS `appraisals` (
  `Appraisals_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Q1` varchar(500) NOT NULL,
  `Q2` varchar(500) NOT NULL,
  `Q3` varchar(500) NOT NULL,
  `Q4` varchar(500) NOT NULL,
  `Q5` varchar(500) NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Date_In` date NOT NULL,
  PRIMARY KEY (`Appraisals_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `appraisals`
--

INSERT INTO `appraisals` (`Appraisals_ID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Supervisor_ID`, `Employees_ID`, `Date_In`) VALUES
(9, '6', '6', '6', '7', '7', 6, 10, '2014-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `Assessment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Assessment_type` varchar(300) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  `Issuing_Date` date NOT NULL,
  PRIMARY KEY (`Assessment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`Assessment_ID`, `Assessment_type`, `Description`, `Employees_ID`, `Supervisor_ID`, `Issuing_Date`) VALUES
(1, 'warning', 'Late for 3 times in a week', 10, 6, '2014-05-11'),
(2, 'merit', 'Did a great job on Cleaning Project', 10, 6, '2014-05-11'),
(3, 'warning', 'come suck my dick', 7, 6, '2014-05-13'),
(4, 'merit', 'diam la, fucking chinese', 7, 6, '2014-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department_Name` varchar(300) NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  PRIMARY KEY (`Department_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `Supervisor_ID`) VALUES
(3, 'Internet Technology  ', 12),
(4, 'Cleaner ', 6),
(7, 'Accounting', 13),
(8, 'Infrastructure ', 14);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `Employees_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(300) NOT NULL,
  `Identification_Card` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Contact_No` varchar(100) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `Experience` varchar(300) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Recruitment_Date` date NOT NULL,
  `Privilege` varchar(100) NOT NULL,
  PRIMARY KEY (`Employees_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employees_ID`, `FullName`, `Identification_Card`, `Address`, `Contact_No`, `Email`, `Salary`, `Experience`, `Gender`, `Recruitment_Date`, `Privilege`) VALUES
(5, 'Hans', 'A1000', 'Savana', '0160000000            ', 'hans@gmail.com', '1000', '2', 'Male', '2014-05-06', 'admin'),
(6, 'Gabriel Eng Cun Yek', '9302120292889', 'A-14-3 Savanna Condominium \r\nBukit Jalil, Kuala Lumpur 57000', '0102983992', 'gabriel@hotmail.com', '8000', '2', 'male', '2014-05-06', 'supervisor'),
(7, 'David Lee Zheng-Ying', '333444466666666666', 'Vista B', '0161111111                                                                                          ', 'ZY@hotmail.comss', '1000', '2', 'Female', '2014-05-06', 'normal'),
(10, 'Michael Koh Yung Hong ', '970521136110', 'C2-20-3 Vista Komanwel, Bukit Jalil, Kuala Lumpur 57000', '0169999999', 'Mic@hotmail.com', '3000', '2', 'male', '2014-02-12', 'normal'),
(11, 'hasbullah', 'Aaaaddd2244', 'serdang', '0177777777', 'qiang@hotmail.com', '6000', '2', 'female', '2014-05-06', 'admin'),
(12, 'Admin', '123123', 'vista C', '0199998888', 'admin@hotmail.com', '4000', '3', 'female', '2014-05-06', 'supervisor'),
(13, 'KAWASAKI', '444444444', 'arena green', '0199999999', 'kawasaki@hotmail.com', '400', '2', 'male', '2014-05-06', 'supervisor'),
(14, 'ninja', '5555555', 'japan', '0162222222', 'ninja@hotmail.com', '555', '2', 'male', '2014-05-06', 'supervisor'),
(17, 'Low Meng Keong', '122238388383', 'A-sajssjkaajsk', '0102937738', 'hansbrians@gmail.comm', '3000', '3', 'male', '2014-05-11', 'admin'),
(18, 'micheal koh', 'A91911991', 'vista c', '01999999999', 'mic@mic.cim', '3000', '20', '', '2014-01-31', 'supervisor'),
(19, 'Ironman', '18282', 'savana', '01999999999', 'ironman@gmail.com', '1200', '12', '', '2014-05-03', 'supervisor'),
(20, 'Ironman', '18282', 'savana', '01999999999', 'ironman@gmail.com', '1200', '12', 'Female', '2014-05-03', 'supervisor'),
(21, 'Lina Gan', '1922', 'vista CC', '019', '444@hotmail.com', '40000', '3', 'Female', '2014-05-09', 'normal'),
(22, 'Ironman', '18282', 'savana', '01999999999', 'ironman@gmail.com', '1200', '12', 'Female', '2014-05-03', 'supervisor'),
(23, 'kin sun', '122238388383', 'PJ', '01999999999', 'hansbrians@gmail.comm', '2000', '12', 'Male', '2014-01-10', 'supervisor'),
(24, 'kin sun', '122238388383', 'PJ', '01999999999', 'hansbrians@gmail.comm', '2000', '12', 'Male', '2014-01-10', 'supervisor'),
(25, 'kin sun', '122238388383', 'PJ', '01999999999', 'hansbrians@gmail.comm', '2000', '12', 'Male', '2014-01-10', 'supervisor'),
(26, 'ssss', '122238388383', 'A-sajssjkaajsk', '0105095446', 'hansbrians@gmail.comm', '4000', '21', 'Male', '2014-01-31', 'supervisor'),
(27, 'ssss', '122238388383', 'A-sajssjkaajsk', '0105095446            ', 'hansbrians@gmail.comm', '4000', '21', 'Male', '2014-01-31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees_department`
--

CREATE TABLE IF NOT EXISTS `employees_department` (
  `EmpDepart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  PRIMARY KEY (`EmpDepart_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employees_department`
--

INSERT INTO `employees_department` (`EmpDepart_ID`, `Employees_ID`, `Department_ID`) VALUES
(1, 6, 4),
(2, 12, 3),
(3, 7, 4),
(4, 10, 4),
(5, 0, 4),
(7, 17, 3),
(8, 13, 4),
(9, 14, 4),
(10, 18, 3),
(11, 21, 4),
(12, 22, 3),
(13, 25, 3),
(14, 26, 3),
(15, 27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees_leave`
--

CREATE TABLE IF NOT EXISTS `employees_leave` (
  `EmpLeave_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Leave_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  PRIMARY KEY (`EmpLeave_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employees_leave`
--

INSERT INTO `employees_leave` (`EmpLeave_ID`, `Leave_ID`, `Employees_ID`) VALUES
(1, 2, 7),
(2, 1, 10),
(3, 3, 6),
(5, 6, 12),
(6, 7, 7),
(7, 8, 7),
(8, 9, 7),
(9, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `employees_training`
--

CREATE TABLE IF NOT EXISTS `employees_training` (
  `EmpTraining_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Program_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Apply_Date` date NOT NULL,
  PRIMARY KEY (`EmpTraining_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `employees_training`
--

INSERT INTO `employees_training` (`EmpTraining_ID`, `Program_ID`, `Employees_ID`, `Apply_Date`) VALUES
(9, 1, 7, '2014-05-01'),
(10, 2, 10, '2014-05-07'),
(11, 3, 7, '2014-05-07'),
(15, 1, 6, '2014-05-21'),
(16, 2, 6, '2014-05-21'),
(17, 3, 6, '2014-05-21'),
(18, 4, 6, '2014-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `Leaves_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Duration` varchar(300) NOT NULL,
  `Starting_Date` date NOT NULL,
  `Reason` varchar(300) NOT NULL,
  PRIMARY KEY (`Leaves_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`Leaves_ID`, `Duration`, `Starting_Date`, `Reason`) VALUES
(1, '3', '2014-04-24', 'shit'),
(2, '6', '2014-04-30', 'fuck'),
(3, '1', '2014-04-23', 'boss'),
(6, '1', '2014-05-02', 'fuck micheal'),
(7, '2', '2014-05-01', 'go back jb'),
(8, '3', '2014-05-07', 'go back jb'),
(9, '2', '2014-05-16', 'go back jb'),
(10, '2', '2014-05-16', 'go back jb');

-- --------------------------------------------------------

--
-- Table structure for table `leave_track`
--

CREATE TABLE IF NOT EXISTS `leave_track` (
  `LeaveTrack_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Approval` varchar(300) NOT NULL,
  `Approve_By` int(11) NOT NULL,
  `EmpLeave_ID` int(11) NOT NULL,
  PRIMARY KEY (`LeaveTrack_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `leave_track`
--

INSERT INTO `leave_track` (`LeaveTrack_ID`, `Approval`, `Approve_By`, `EmpLeave_ID`) VALUES
(17, 'Approve', 6, 1),
(18, 'Approve', 6, 2),
(23, 'Approve', 6, 6),
(27, 'Not Approve', 6, 7),
(28, 'Not Approve', 6, 8),
(29, 'Not Approve', 6, 9),
(31, 'Approve', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Login_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`Login_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Login_ID`, `UserName`, `Password`, `Employee_ID`) VALUES
(1, 'hanstf', 'htfhtf', 5),
(2, 'Gab', '11', 6),
(3, 'david', 'gg', 7),
(6, 'keong', '1234', 17),
(7, 'micehal', 'mic123', 10),
(8, 'Lina', '22', 21),
(9, 'ironman', 'ssss', 22),
(10, 'kinsun', 'sss', 25),
(11, 'sss', 'sss', 26),
(12, 'sss', '12333', 27);

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE IF NOT EXISTS `performances` (
  `Performances_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Leave_Amount` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  PRIMARY KEY (`Performances_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `performances`
--

INSERT INTO `performances` (`Performances_ID`, `Leave_Amount`, `Employees_ID`) VALUES
(1, 3, 10),
(4, 14, 17),
(5, 13, 6),
(6, 14, 25),
(7, 14, 26),
(8, 14, 27);

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE IF NOT EXISTS `training_programs` (
  `Program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(300) NOT NULL,
  `Quota` int(11) NOT NULL,
  `Total_Joined` int(11) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Trainer` varchar(300) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`Program_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`Program_ID`, `Title`, `Quota`, `Total_Joined`, `Duration`, `Trainer`, `Description`) VALUES
(1, 'Java training', 20, 12, '5', 'Hans Tjipto', 'Very good training for java'),
(2, 'C++ discovery', 20, 2, '6', 'Gabriel', 'C++ is very good for people who dont know about IT'),
(3, 'Public speaking  ', 2, 0, '1', 'ZY', 'Public speaking is very important for every employees'),
(4, 'Cashflow course', 10, 2, '1', 'Hasbullah', 'That is impossible for u ');

-- --------------------------------------------------------

--
-- Table structure for table `training_result`
--

CREATE TABLE IF NOT EXISTS `training_result` (
  `TrainingResult_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Score` varchar(100) NOT NULL,
  `EmpTraining_ID` int(11) NOT NULL,
  PRIMARY KEY (`TrainingResult_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `training_result`
--

INSERT INTO `training_result` (`TrainingResult_ID`, `Score`, `EmpTraining_ID`) VALUES
(1, '89', 9),
(2, '44', 10),
(4, '93', 11),
(5, '40', 12);

-- --------------------------------------------------------

--
-- Table structure for table `training_track`
--

CREATE TABLE IF NOT EXISTS `training_track` (
  `TrainingTrack_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Approval` varchar(300) NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  `EmpTraining_ID` int(11) NOT NULL,
  PRIMARY KEY (`TrainingTrack_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `training_track`
--

INSERT INTO `training_track` (`TrainingTrack_ID`, `Approval`, `Supervisor_ID`, `EmpTraining_ID`) VALUES
(8, 'Approve', 6, 12),
(9, 'Approve', 6, 10),
(10, 'Approve', 6, 10),
(11, 'Not Approve', 6, 9),
(12, 'Not Approve', 6, 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
