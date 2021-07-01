-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 01:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aarogya`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE IF NOT EXISTS `accountant` (
  `id` char(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `firstName`, `lastName`, `email`, `mobile`, `is_deleted`) VALUES
('ACN001', 'Dulmini', 'Sandunika', 'dulmini@gmail.com', '0752478523', 0),
('ACN002', 'Tharindu', 'Madushanka', 'tharindu@gmail.com', '0723589412', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` char(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `email`, `mobile`, `is_deleted`) VALUES
('ADM001', 'Madushan', 'Sandaruwan', 'madushansandaru@gmail.com', '0771637551', 0),
('ADM002', 'Yasuru', 'Dineth', 'dinethyasuru@gmail.com', '0782686549', 0),
('ADM003', 'Kelum', 'Nagodavithana', 'kelumnagodavithana1997@gmail.com', '0772741450', 0),
('ADM004', 'Ilyas', 'Rifnas', 'ilyasrifnas@gmail.com', '0702482847', 0),
('ADM005', 'Supun', 'Chalaka', 'supunchalaka@gmail.com', '0771712924', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorId` char(6) NOT NULL,
  `clientId` char(6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorId`, `clientId`, `date`, `time`, `is_deleted`) VALUES
(1, 'DOC001', 'P0006', '2019-09-08', '15:50:00', 0),
(2, 'DOC001', 'P0004', '2019-09-20', '07:40:00', 0),
(3, 'DOC004', 'C00001', '2019-09-16', '14:45:00', 0),
(4, 'DOC002', 'C00001', '2019-10-29', '19:45:00', 0),
(5, 'DOC001', 'C00001', '2019-02-05', '14:58:00', 0),
(6, 'DOC001', 'C00001', '2019-10-06', '13:34:00', 0),
(7, 'DOC001', 'C00005', '2019-10-13', '09:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE IF NOT EXISTS `bloodbank` (
  `bloodGroup` varchar(3) NOT NULL,
  `noOfBag` int(10) NOT NULL,
  PRIMARY KEY (`bloodGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`bloodGroup`, `noOfBag`) VALUES
('A+', 15),
('A-', 22),
('AB+', 47),
('AB-', 142),
('B+', 85),
('B-', 3),
('O+', 54),
('O-', 14);

-- --------------------------------------------------------

--
-- Table structure for table `blooddonor`
--

CREATE TABLE IF NOT EXISTS `blooddonor` (
  `id` char(5) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `bloodGroup` varchar(3) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddonor`
--

INSERT INTO `blooddonor` (`id`, `firstName`, `lastName`, `gender`, `age`, `address`, `mobile`, `bloodGroup`, `is_deleted`) VALUES
('BD001', 'Rashmini', 'Nayanathara', 'Female', 22, 'Galle', '0712354128', 'A+', 0),
('BD002', 'Achini', 'Nisansala', 'Female', 21, 'Mathale', '0702354112', 'O-', 0),
('BD003', 'Fathima', 'Minha', 'Female', 23, 'Mawanella', '0758241235', 'AB+', 0),
('BD004', 'T', 'Priyanka', 'Female', 25, 'Jaffna', '0775824123', 'B+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` char(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `lastName`, `email`, `mobile`, `is_deleted`) VALUES
('C00001', 'Supun', 'Chalaka', 'supunchalaka@gmail.com', '0771231232', 0),
('C00002', 'Ravindu', 'Lakshitha', 'lakshitha@gmail.com', '0702541235', 0),
('C00003', 'Sampath', 'Sandaruwan', 'sampath@gmail.com', '0785234120', 0),
('C00004', 'Ishara', 'Dilini', 'ishara@gmail.com', '0701123547', 0),
('C00005', 'Supun', 'Chalaka', 'supunchalaka@gmail.com', '0777888122', 0),
('C00006', 'Ccn', 'Vnv', 'madushansandaru1@gmail.com', '0771637551', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` char(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `department_head` char(6) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `department_head`, `is_deleted`) VALUES
('D01', 'Accident and emergency (A&E)', 'Also called Casualty Department, where you''re likely to be taken if you have arrived in an ambulance or emergency situation.', 'DOC001', 0),
('D02', 'Intensive Care Unit (ICU)', '(Intensive Therapy Unit, Intensive Treatment Unit (ITU), Critical Care Unit (CCU) - A special department of a hospital or health care facility that provides intensive treatment medicine and caters to patients with severe and life-threatening illnesses and injuries, which require constant, close monitoring and support from specialist equipment and medications.', 'DOC002', 0),
('D03', 'Microbiology', 'The microbiology department provides an extensive clinical service, including mycology, parasitology, mycobacteriology, a high security pathology unit, and a healthcare associated infection investigation unit, as well as routine bacteriology and an expanding molecular diagnostic repertoire.', 'DOC005', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` char(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `department` char(3) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstName`, `lastName`, `email`, `mobile`, `department`, `is_deleted`) VALUES
('DOC001', 'Mithila', 'Madushanka', 'mithila@gmail.com', '0771234567', 'D01', 0),
('DOC002', 'Manura', 'Lakshan', 'manura@gmail.com', '0785412300', 'D02', 0),
('DOC003', 'Ruvindu', 'Madushanka', 'ruvindu@gmail.com', '0713952001', 'D02', 0),
('DOC004', 'Hameesha', 'Rantharu', 'hameesha@gmail.com', '0723541230', 'D01', 0),
('DOC005', 'Ravindu', 'Lakmal', 'ravindu@gmail.com', '0752478144', 'D03', 0),
('DOC006', 'Yasiru', 'Nimnada', 'yasiru@gmail.com', '0762140125', 'D02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` char(6) NOT NULL,
  `patientId` char(6) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `creationDate` date NOT NULL,
  `is_paid` varchar(6) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `patientId`, `amount`, `creationDate`, `is_paid`, `is_deleted`) VALUES
('I00001', 'C00004', 1500.00, '2019-09-10', 'Unpaid', 0),
('I00002', 'C00003', 2045.00, '2019-09-02', 'Paid', 0),
('I00003', 'C00002', 2500.00, '2119-05-08', 'Unpaid', 0),
('I00004', 'P0008', 5400.00, '2019-01-05', 'Unpaid', 0),
('I00005', 'C00001', 1000.00, '2019-02-05', 'Paid', 0),
('I00006', 'C00001', 2500.00, '2019-02-05', 'Paid', 0),
('I00007', 'C00001', 200.00, '2019-05-01', 'Unpaid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE IF NOT EXISTS `laboratorist` (
  `id` char(6) NOT NULL,
  `firstName` char(20) NOT NULL,
  `lastName` char(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `firstName`, `lastName`, `email`, `mobile`, `is_deleted`) VALUES
('LBT001', 'Rifnas', 'Ilyas', 'Ilyasrifnas97@gmail.com', '0712354123', 0),
('LBT002', 'Zainab', 'Nizhan', 'zainab@gmail.com', '0785412300', 0),
('LBT003', 'Pawan', 'Sandeepa', 'pawan@gmail.com', '0701235845', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE IF NOT EXISTS `nurse` (
  `id` char(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `department` char(3) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `firstName`, `lastName`, `email`, `mobile`, `department`, `is_deleted`) VALUES
('NRS001', 'Ishanka', 'Hewapathirana', 'ishanka@gmail.com', '0714258320', 'D01', 0),
('NRS002', 'Jithmi', 'Dasunika', 'jithmi@gmail.com', '0772589354', 'D02', 0),
('NRS003', 'Shashani', 'Danujika', 'shashani@gmail.com', '0785241239', 'D03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` char(5) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` char(10) NOT NULL,
  `bloodGroup` varchar(3) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstName`, `lastName`, `gender`, `age`, `address`, `mobile`, `bloodGroup`, `is_deleted`) VALUES
('P0001', 'Sachin', 'Rasanjana', 'Male', 25, 'Anuradhapura', '0772103254', 'A+', 0),
('P0002', 'Harshani', 'Wathasha', 'Female', 23, 'Buththala', '0753524120', 'B-', 0),
('P0003', 'Zulmi', 'Zulfikar', 'Male', 24, 'Ambalanthota', '0712543995', 'O+', 0),
('P0004', 'Chamika', 'Lakmali', 'Female', 25, 'Matara', '0772589352', 'AB+', 0),
('P0005', 'Sahan', 'Chamika', 'Male', 27, 'Matara', '0723512437', 'B+', 0),
('P0006', 'Ruwan', 'Chamikara', 'Male', 21, 'Mathugama', '0715395241', 'A+', 0),
('P0007', 'Dishan', 'Wanaguru', 'Male', 20, 'Malabe', '0785234120', 'A-', 0),
('P0008', 'Uddika', 'Ishara', 'Male', 24, 'Matara', '0705128524', 'B-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` char(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `patientId` char(6) NOT NULL,
  `file` varchar(9999) NOT NULL,
  `date` date NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `type`, `description`, `patientId`, `file`, `date`, `is_deleted`) VALUES
('R00001', 'Birth', 'This report is dictated by the operating physician and contains detailed information regarding an operative procedure.', 'C00001', '../report/VIRTUAL UNIVERSITY INDUSTR.pdf', '2019-09-17', 0),
('R00002', 'Operation', 'This report is dictated by the admitting physician at the end of the patientâ€™s stay in the hospital.', 'P0007', '', '2019-09-02', 0),
('R00003', 'Operation', 'This report is dictated by the admitting physician at the end of the patientâ€™s stay in the hospital.', 'P0003', '../report/handbook.pdf', '2019-09-30', 0),
('R00004', 'Death', 'This report is dictated by the admitting physician at the end of the patientâ€™s stay in the hospital.', 'C00002', '', '2019-06-04', 0),
('R00005', 'Operation', 'This report is dictated by the admitting physician at the end of the patientâ€™s stay in the hospital.', 'P0005', '', '2018-11-28', 0),
('R00006', 'Birth', 'trrgjjjjjjjjjjjfgfghd', 'C00001', '../report/VIRTUAL UNIVERSITY INDUSTR.pdf', '2019-10-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestedappointment`
--

CREATE TABLE IF NOT EXISTS `requestedappointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorId` char(6) NOT NULL,
  `clientId` char(6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `requestedappointment`
--

INSERT INTO `requestedappointment` (`id`, `doctorId`, `clientId`, `date`, `time`, `is_deleted`) VALUES
(1, 'DOC004', 'C00001', '2019-09-16', '14:45:00', 0),
(2, 'DOC001', 'C00001', '2019-02-05', '14:58:00', 1),
(3, 'DOC001', 'C00001', '2019-10-06', '13:34:00', 1),
(4, 'DOC004', 'C00001', '2019-10-24', '09:30:00', 0),
(5, 'DOC001', 'C00005', '2019-10-13', '09:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` char(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `is_deleted`) VALUES
('ACN001', 'dulmini@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'accountant', 0),
('ACN002', 'tharindu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'accountant', 0),
('ADM001', 'madushansandaru@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('ADM002', 'dinethyasuru@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('ADM003', 'kelumnagodavithana1997@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('ADM004', 'ilyasrifnas@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('ADM005', 'supunchalaka@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('C00001', 'supunchalaka@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'client', 0),
('C00002', 'lakshitha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'client', 0),
('C00003', 'sampath@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'client', 0),
('C00004', 'ishara@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'client', 0),
('C00005', 'supunchalaka@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'client', 0),
('C00006', 'madushansandaru1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'client', 0),
('DOC001', 'mithila@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('DOC002', 'manura@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('DOC003', 'ruvindu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('DOC004', 'hameesha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('DOC005', 'ravindu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('DOC006', 'yasiru@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', 0),
('LBT001', 'Ilyasrifnas97@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'laboratorist', 0),
('LBT002', 'zainab@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'laboratorist', 0),
('LBT003', 'pawan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'laboratorist', 0),
('NRS001', 'ishanka@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nurse', 0),
('NRS002', 'jithmi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nurse', 0),
('NRS003', 'shashani@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nurse', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
