-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 04:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `applyId` int(11) NOT NULL,
  `candidateId` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `candidateStatus` int(10) NOT NULL,
  `candidateDrop` enum('0','1') NOT NULL,
  `candidateAddTime` varchar(20) NOT NULL,
  `dropReason` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dropDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`applyId`, `candidateId`, `jobId`, `candidateStatus`, `candidateDrop`, `candidateAddTime`, `dropReason`, `dropDate`) VALUES
(126, 9, 203, 1, '0', '2021-06-04 11:48:42', NULL, NULL),
(140, 5, 209, 1, '0', '2021-06-07 14:26:27', NULL, NULL),
(142, 14, 209, 3, '0', '2021-06-07 14:37:39', NULL, NULL),
(143, 14, 82, 6, '1', '2021-06-08 10:53:44', 'Did not attend the interview, Not available, Not Qualified, Reference check failed', '2021-06-08'),
(155, 5, 222, 1, '0', '2021-06-11 17:36:42', NULL, NULL),
(156, 9, 82, 1, '0', '2021-09-04 13:23:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidateId` int(11) NOT NULL,
  `candidateName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `candidateEmail` varchar(50) DEFAULT NULL,
  `nationnality` varchar(20) DEFAULT NULL,
  `candidateCreateDate` date DEFAULT NULL,
  `EnglishProficiency` enum('Good','Bad','','') CHARACTER SET utf8 DEFAULT NULL,
  `currentSalary` int(11) DEFAULT NULL,
  `expectSalary` int(11) DEFAULT NULL,
  `TotalExperience` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `NoticePeriod` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MajorSkill` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `SecondarySkill` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidateId`, `candidateName`, `phoneNumber`, `candidateEmail`, `nationnality`, `candidateCreateDate`, `EnglishProficiency`, `currentSalary`, `expectSalary`, `TotalExperience`, `NoticePeriod`, `MajorSkill`, `SecondarySkill`, `startDate`, `description`, `tId`) VALUES
(5, 'arxxarmy1', '0123456789', 'picharm05@gmail.com', 'Thai', '2021-05-24', 'Good', 15000, 50000, '7', '12/05/44 - 12/06/45', 'Java', 'Mysql', '2021-06-03', '', 116),
(9, 'Light', '0123456789', 'picharm05@hotmail.com', '', '2021-05-25', '', 0, 0, '', '9', '1', '5', '0000-00-00', '', NULL),
(14, 'brave', '', '', 'thai', '2021-06-05', 'Good', 0, 0, NULL, NULL, NULL, NULL, '0000-00-00', '  ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidateresume`
--

CREATE TABLE `candidateresume` (
  `tId` int(11) NOT NULL,
  `tName` varchar(255) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidateresume`
--

INSERT INTO `candidateresume` (`tId`, `tName`, `mime`) VALUES
(109, '123.pdf', 'application/pdf'),
(110, '222.pdf', 'application/pdf'),
(111, '__$Light Blue Simple Minimalist Resume-converted.pdf', 'application/pdf'),
(112, 'Resume.pdf', 'application/pdf'),
(113, 'Transcript.pdf', 'application/pdf'),
(114, 'Resume.pdf', 'application/pdf'),
(115, '__$Light Blue Simple Minimalist Resume-converted.pdf', 'application/pdf'),
(116, '123.pdf', 'application/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `candidatestatus`
--

CREATE TABLE `candidatestatus` (
  `candidateStatusId` int(10) NOT NULL,
  `candidateStatusName` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidatestatus`
--

INSERT INTO `candidatestatus` (`candidateStatusId`, `candidateStatusName`) VALUES
(1, 'New Candidates'),
(2, 'Interested'),
(3, 'Shortlisted'),
(4, 'Client Submission'),
(5, 'Client Interview'),
(6, 'Offered'),
(7, 'Hired'),
(8, 'Started'),
(9, 'Probation passed');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientId` int(11) NOT NULL,
  `clientName` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `businessTypeId` int(11) DEFAULT NULL,
  `businessType` varchar(250) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `clientCreateDate` date DEFAULT NULL,
  `template` enum('1','2','3','4') NOT NULL,
  `percent` double DEFAULT NULL,
  `extra` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientId`, `clientName`, `location`, `businessTypeId`, `businessType`, `id`, `clientCreateDate`, `template`, `percent`, `extra`) VALUES
(2, 'vongolar family', 'italy', NULL, '', 39, '2021-04-22', '2', NULL, NULL),
(3, 'maley', 'paradise island', NULL, '', 39, '2021-04-22', '2', 20, 1500),
(4, 'kiki', '111', NULL, '', 40, '2021-04-22', '3', NULL, NULL),
(5, 'eldia', 'paradise island', NULL, '', 39, '2021-04-23', '1', NULL, NULL),
(6, 'a company', '123', NULL, 'Food', 40, '2021-04-28', '1', NULL, NULL),
(8, 'kingdom', '', NULL, '', 50, '2021-06-03', '1', NULL, NULL),
(10, 'q', '', NULL, '', 50, '2021-06-03', '1', NULL, NULL),
(11, 'yogirl', '', NULL, '', 50, '2021-06-03', '1', NULL, NULL),
(12, 'xxxxx', 'xxxx', NULL, 'xxxxx', 51, '2021-06-07', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contractdetail`
--

CREATE TABLE `contractdetail` (
  `contractDetailId` int(11) NOT NULL,
  `contractDetail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractdetail`
--

INSERT INTO `contractdetail` (`contractDetailId`, `contractDetail`) VALUES
(1, 'Contract 6 months'),
(2, 'Contract 1 year'),
(3, 'Permanent with client'),
(4, 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `dropreason`
--

CREATE TABLE `dropreason` (
  `dropReasonId` int(11) NOT NULL,
  `dropReason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dropreason`
--

INSERT INTO `dropreason` (`dropReasonId`, `dropReason`) VALUES
(1, 'Above budget'),
(2, 'Accepted another offer'),
(3, 'Cultural fit'),
(4, 'Did not attend the interview'),
(5, 'Not available'),
(6, 'Not Qualified'),
(7, 'Other'),
(8, 'Overqualified'),
(9, 'Reference check failed'),
(10, 'Rejected the offer'),
(11, 'Technical test failed'),
(12, 'Unresponsive');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `industryId` int(11) NOT NULL,
  `industry` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industryId`, `industry`) VALUES
(1, 'Banking'),
(2, 'Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobId` int(11) NOT NULL,
  `position` varchar(100) DEFAULT NULL COMMENT 'job name',
  `keySkill` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `maximumBudget` double DEFAULT NULL,
  `contractDetailId` int(11) DEFAULT NULL,
  `jobLocation` varchar(100) DEFAULT NULL,
  `qualifications` varchar(1000) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `industryId` int(11) DEFAULT NULL,
  `jobStatusId` int(11) DEFAULT NULL,
  `contract` varchar(100) DEFAULT NULL,
  `emailOfContact` varchar(30) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `jobCreateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `position`, `keySkill`, `quantity`, `maximumBudget`, `contractDetailId`, `jobLocation`, `qualifications`, `level`, `industryId`, `jobStatusId`, `contract`, `emailOfContact`, `clientId`, `id`, `jobCreateDate`) VALUES
(82, 'JAVA Backend Developer', 'Java SpringBoot', 20, 60000, 1, 'BTS Chongnonsri   ', '• Minimum 2 years in JAVA programming, backend development\r\n• Experience in banking project (optional)\r\n• Fair English communication', '2 years', 1, 5, 'sirapat.p@vannessplus.com', 'bbravel3@hotmail.com', 2, NULL, '2021-05-12'),
(201, 'JAVA Backend Developer', 'Java SpringBoot', 20, 60000, 1, 'BTS Chongnonsri', '• Minimum 2 years in JAVA programming, backend development\n• Experience in banking project (optional)\n• Fair English communication', '2 years', 1, 5, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-03'),
(202, 'Business Analyst', 'Finacial/Insurance', 2, 100000, 2, 'BTS Silom', '• IT Experiences at least 2 years\n• Business Analyst (BA) Experiences in Bank or Insurance or finance business****\n• Has experience at least 1 year for develop business requirement specification or analyze & design Use Case\n• Has experience at least 1 year for Business Process of Business Requirement and be able to create in Business Requirement document and functional specification and user story\n• Have technical background would be a plus (custom development, web application, mobile application etc.)\n• Thai speaker with Fair to Good command of English', '2 years', 2, 4, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-03'),
(203, 'Senior Business Analyst', 'Lead Team', 1, 120000, 4, 'Sukhumvit', '', 'Senior', 1, 6, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-03'),
(204, 'xx', 'xx', 24, 12345, 4, 'xx', 'xx', 'Senior', 1, 1, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-03'),
(205, 'JAVA Backend Developer', 'Java SpringBoot', 20, 60000, 1, 'BTS Chongnonsri', '• Minimum 2 years in JAVA programming, backend development\n• Experience in banking project (optional)\n• Fair English communication', '2 years', 1, 5, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-04'),
(206, 'Business Analyst', 'Finacial/Insurance', 2, 100000, 2, 'BTS Silom', '• IT Experiences at least 2 years\n• Business Analyst (BA) Experiences in Bank or Insurance or finance business****\n• Has experience at least 1 year for develop business requirement specification or analyze & design Use Case\n• Has experience at least 1 year for Business Process of Business Requirement and be able to create in Business Requirement document and functional specification and user story\n• Have technical background would be a plus (custom development, web application, mobile application etc.)\n• Thai speaker with Fair to Good command of English', '2 years', 2, 4, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-04'),
(207, 'Senior Business Analyst', 'Lead Team', 1, 120000, 4, 'Sukhumvit', '', 'Senior', 1, 6, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-04'),
(208, 'xx', 'xx', 24, 12345, 4, 'xx', 'xx', 'Senior', 1, 1, 'sirapat.p@vannessplus.com (สมมุติว่าเป็นลูกค้า)', '', NULL, NULL, '2021-06-04'),
(209, '1234', '', 0, 0, NULL, '   ', '', '', NULL, 1, 'light', 'lightofficialstudio@gmail.com', 3, NULL, '2021-06-07'),
(210, 'Gago', 'Java SpringBoot', 20, 60000, 1, 'BTS Chongnonsri', '• Minimum 2 years in JAVA programming, backend development\n• Experience in banking project (optional)\n• Fair English communication', '2 years', 1, 1, NULL, 'sirapat.p@vannessplus.com (สมม', NULL, NULL, '2021-06-07'),
(211, 'YAWA', 'Finacial/Insurance', 2, 100000, 2, 'BTS Silom', '• IT Experiences at least 2 years\n• Business Analyst (BA) Experiences in Bank or Insurance or finance business****\n• Has experience at least 1 year for develop business requirement specification or analyze & design Use Case\n• Has experience at least 1 year for Business Process of Business Requirement and be able to create in Business Requirement document and functional specification and user story\n• Have technical background would be a plus (custom development, web application, mobile application etc.)\n• Thai speaker with Fair to Good command of English', '2 years', 2, 4, NULL, 'sirapat.p@vannessplus.com (สมม', NULL, NULL, '2021-06-07'),
(216, 'juju', '', 0, 0, NULL, ' ', '', '', NULL, 1, 'xx', 'picharm05@hotmail.com', 3, 42, '2021-06-09'),
(219, 'JAVA Backend Developer', 'Java SpringBoot', 20, 60000, 1, 'BTS Chongnonsri', '• Minimum 2 years in JAVA programming, backend development\n• Experience in banking project (optional)\n• Fair English communication', '2 years', 1, 5, NULL, 'sirapat.p@vannessplus.com (สมม', NULL, 42, '2021-06-09'),
(220, 'Business Analyst', 'Finacial/Insurance', 2, 100000, 2, 'BTS Silom', '• IT Experiences at least 2 years\n• Business Analyst (BA) Experiences in Bank or Insurance or finance business****\n• Has experience at least 1 year for develop business requirement specification or analyze & design Use Case\n• Has experience at least 1 year for Business Process of Business Requirement and be able to create in Business Requirement document and functional specification and user story\n• Have technical background would be a plus (custom development, web application, mobile application etc.)\n• Thai speaker with Fair to Good command of English', '2 years', 2, 4, NULL, 'sirapat.p@vannessplus.com (สมม', NULL, 42, '2021-06-09'),
(221, 'zxcvbn', '', 0, 0, NULL, '', NULL, '', NULL, 2, 'zxc', 'picharm05@hotmail.com', NULL, 43, '2021-06-09'),
(222, 'test', '', 0, 0, NULL, '', NULL, '', NULL, 1, 'picharm', 'picharm05@gmail.com', 3, NULL, '2021-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `jobstatus`
--

CREATE TABLE `jobstatus` (
  `jobStatusId` int(11) NOT NULL,
  `jobStatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobstatus`
--

INSERT INTO `jobstatus` (`jobStatusId`, `jobStatus`) VALUES
(1, 'Active'),
(2, 'Hold'),
(3, 'Priority'),
(4, 'Critical'),
(5, 'Super Critical'),
(6, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `id` int(11) NOT NULL,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `title`, `mess`, `time`) VALUES
(947, ' ', 'successfully uploaded candidate', '2021-06-08 16:57:57'),
(948, ' ', 'successfully uploaded candidate', '2021-06-08 16:58:57'),
(949, 'aaa', 'login now', '2021-06-09 09:03:44'),
(950, 'pichakorn maneesil', 'login now', '2021-06-09 09:03:53'),
(951, ' pichakorn maneesil', 'added candidate to ', '2021-06-09 09:11:40'),
(952, ' pichakorn maneesil', 'move 1 candidates to Interested', '2021-06-09 09:12:05'),
(953, 'aaa', 'login now', '2021-06-09 09:49:59'),
(954, 'hun ki', 'login now', '2021-06-09 09:59:32'),
(955, ' hun ki', 'added candidate to ', '2021-06-09 10:08:18'),
(956, ' hun ki', 'add juju to job', '2021-06-09 10:16:33'),
(957, 'pichakorn maneesil', 'login now', '2021-06-09 10:17:43'),
(958, ' pichakorn maneesil', 'edit juju from job', '2021-06-09 10:17:56'),
(959, ' hun ki', 'add asdqweert to job', '2021-06-09 10:18:23'),
(960, ' hun ki', 'add asdfgh to job', '2021-06-09 10:25:00'),
(961, ' hun ki', 'successfully uploaded 2 job', '2021-06-09 10:30:17'),
(962, ' hun ki', 'update status Senior Business Analyst to Active ', '2021-06-09 10:33:08'),
(963, ' hun ki', 'update status Senior Business Analyst to Hold ', '2021-06-09 10:34:49'),
(964, 'hunka', 'login now', '2021-06-09 10:41:14'),
(965, ' hunka', 'add zxcvbn to job', '2021-06-09 10:41:39'),
(966, ' hunka', 'update status zxcvbn to Hold ', '2021-06-09 10:41:56'),
(967, ' hun ki', 'edit Senior Business Analyst from job', '2021-06-09 10:50:33'),
(968, ' hun ki', 'edit Senior Business Analyst from job', '2021-06-09 10:50:52'),
(969, ' hun ki', 'delete asdfgh from job', '2021-06-09 10:53:39'),
(970, 'pichakorn maneesil', 'login now', '2021-06-09 10:53:53'),
(971, ' hun ki', 'edit Senior Business Analyst from job', '2021-06-09 11:02:31'),
(972, ' hun ki', 'edit Senior Business Analyst from job', '2021-06-09 11:06:24'),
(973, ' hun ki', 'edit asdqweert from job', '2021-06-09 11:12:23'),
(974, ' hun ki', 'delete asdqweert from job', '2021-06-09 11:12:58'),
(975, ' hun ki', 'added candidate to ', '2021-06-09 11:23:45'),
(976, ' hun ki', 'move 1 candidates to New Candidates', '2021-06-09 11:24:22'),
(977, ' hun ki', 'move 1 candidates to Interested', '2021-06-09 11:30:46'),
(978, ' hun ki', 'move 2 candidates to Shortlisted', '2021-06-09 11:31:01'),
(979, ' hun ki', 'move 2 candidates to New Candidates', '2021-06-09 11:31:25'),
(980, ' hun ki', 'drop 1 candidates', '2021-06-09 11:33:00'),
(981, ' hun ki', 'remove 1 candidates', '2021-06-09 11:35:36'),
(982, ' pichakorn maneesil', 'edit arxxarmy from candidate', '2021-06-09 11:38:00'),
(983, ' hun ki', 'edit Senior Business Analyst from job', '2021-06-09 11:38:40'),
(984, ' hun ki', 'sent email to K.Boonyapit Tiawiset ', '2021-06-09 11:38:59'),
(985, ' hun ki', 'undo drop brave candidate', '2021-06-09 11:43:18'),
(986, ' hun ki', 'undo drop dsadas candidate', '2021-06-09 11:44:34'),
(987, ' hun ki', 'drop 1 candidates', '2021-06-09 11:46:05'),
(988, ' hun ki', 'undo drop brave candidate', '2021-06-09 11:46:10'),
(989, ' hun ki', 'undo drop dsa candidate', '2021-06-09 11:52:48'),
(990, ' hun ki', 'drop 2 candidates', '2021-06-09 11:55:41'),
(991, ' hun ki', 'undo drop noname candidate', '2021-06-09 11:56:56'),
(992, ' hun ki', 'undo drop sdsad candidate', '2021-06-09 11:57:07'),
(993, ' pichakorn maneesil', 'drop 1 candidates', '2021-06-09 11:58:47'),
(994, ' pichakorn maneesil', 'undo drop dsa candidate', '2021-06-09 11:58:51'),
(995, ' hun ki', 'undo drop brave candidate', '2021-06-09 12:00:18'),
(996, ' hun ki', 'drop 1 candidates', '2021-06-09 12:00:50'),
(997, ' hun ki', 'undo drop sdsad candidate', '2021-06-09 12:02:12'),
(998, ' pichakorn maneesil', 'drop 1 candidates', '2021-06-09 12:02:47'),
(999, ' pichakorn maneesil', 'remove brave candidate', '2021-06-09 12:03:08'),
(1000, ' hun ki', 'drop noname candidate', '2021-06-09 12:13:06'),
(1001, ' hun ki', 'drop sdsad candidate', '2021-06-09 12:13:19'),
(1002, ' hun ki', 'remove dsadas candidate', '2021-06-09 12:20:55'),
(1003, ' hun ki', 'undo drop sdsad candidate', '2021-06-09 12:21:02'),
(1004, ' hun ki', 'remove noname candidate', '2021-06-09 12:21:08'),
(1005, ' hun ki', 'remove sdsad candidate', '2021-06-09 12:21:16'),
(1006, ' pichakorn maneesil', 'added candidate to ', '2021-06-09 12:22:09'),
(1007, ' pichakorn maneesil', 'remove noname candidate', '2021-06-09 12:22:16'),
(1008, ' hun ki', 'update status Senior Business Analyst to Priority ', '2021-06-09 12:31:24'),
(1009, ' hun ki', 'edit noname from candidate', '2021-06-09 12:43:20'),
(1010, ' hun ki', 'edit arxxarmy from candidate', '2021-06-09 12:43:48'),
(1011, ' hun ki', 'remove brave from candidate', '2021-06-09 12:47:20'),
(1012, ' hun ki', 'remove dsa from candidate', '2021-06-09 12:50:51'),
(1013, ' pichakorn maneesil', 'remove dsadas from candidate', '2021-06-09 12:51:21'),
(1014, ' hun ki', 'edit arxxarmy from candidate', '2021-06-09 12:54:17'),
(1015, ' hun ki', 'add test to candidate', '2021-06-09 12:58:55'),
(1016, ' hun ki', 'remove test from candidate', '2021-06-09 12:59:21'),
(1017, 'xxx', 'login now', '2021-06-09 13:03:20'),
(1018, 'pichakorn maneesil', 'login now', '2021-06-09 13:05:54'),
(1019, 'hunka', 'login now', '2021-06-09 13:06:07'),
(1020, 'hun ki', 'login now', '2021-06-09 13:35:56'),
(1021, ' pichakorn maneesil', 'promote <b> hunka </b>to super admin', '2021-06-09 13:36:48'),
(1022, 'hunka', 'login now', '2021-06-09 13:37:13'),
(1023, 'hun ki', 'login now', '2021-06-09 13:37:36'),
(1024, ' hun ki', 'undo drop qwertxxx candidate', '2021-06-09 13:56:23'),
(1025, ' pichakorn maneesil', 'added candidate to ', '2021-06-09 14:03:32'),
(1026, ' hun ki', 'added candidate to ', '2021-06-09 14:42:50'),
(1027, ' pichakorn maneesil', 'added candidate to ', '2021-06-09 14:43:15'),
(1028, ' hun ki', 'remove sdsad candidate', '2021-06-09 14:45:08'),
(1029, ' hun ki', 'added candidate to ', '2021-06-09 14:45:15'),
(1030, 'hun ki', 'login now', '2021-06-09 14:59:41'),
(1031, 'xxx', 'login now', '2021-06-09 15:00:31'),
(1032, 'xxx', 'login now', '2021-06-09 15:00:48'),
(1033, 'hun ki', 'login now', '2021-06-09 15:01:04'),
(1034, ' pichakorn maneesil', 'remove sdsad candidate', '2021-06-09 15:07:59'),
(1035, ' hun ki', 'remove noname candidate', '2021-06-09 15:08:07'),
(1036, 'hun ki', 'login now', '2021-06-09 15:08:21'),
(1037, 'hun ki', 'login now', '2021-06-09 15:08:53'),
(1038, 'hun ki', 'login now', '2021-06-10 09:52:11'),
(1039, ' ', 'successfully uploaded candidate', '2021-06-10 10:58:29'),
(1040, ' ', 'added resume of qwertxxx', '2021-06-10 12:52:24'),
(1041, ' ', 'added resume of sdsad', '2021-06-10 12:57:18'),
(1042, 'boonyapit', 'login now', '2021-06-10 13:08:46'),
(1043, 'Boonyapit Tiawiset', 'login now', '2021-06-10 13:09:10'),
(1044, ' Boonyapit Tiawiset', 'promote <b> boonyapit </b>to super admin', '2021-06-10 13:09:32'),
(1045, 'boonyapit', 'login now', '2021-06-10 13:10:44'),
(1046, 'boonyapit', 'login now', '2021-06-10 13:18:17'),
(1047, 'boonyapit', 'login now', '2021-06-10 13:43:45'),
(1048, 'Boonyapit Tiawiset', 'login now', '2021-06-10 13:44:22'),
(1049, 'Boonyapit Tiawiset', 'login now', '2021-06-10 14:22:31'),
(1050, 'boonyapit', 'login now', '2021-06-10 15:04:50'),
(1051, ' Boonyapit Tiawiset', 'edit Senior Business Analyst from job', '2021-06-10 15:05:39'),
(1052, ' Boonyapit Tiawiset', 'delete gg from job', '2021-06-10 15:07:11'),
(1053, ' Boonyapit Tiawiset', 'delete duration from job', '2021-06-10 15:07:17'),
(1054, ' Boonyapit Tiawiset', 'delete industry from job', '2021-06-10 15:07:20'),
(1055, ' Boonyapit Tiawiset', 'added candidate to ', '2021-06-10 15:43:41'),
(1056, ' Boonyapit Tiawiset', 'move 1 candidates to New Candidates', '2021-06-10 15:43:54'),
(1057, ' Boonyapit Tiawiset', 'drop 3 candidates', '2021-06-10 15:44:01'),
(1058, ' Boonyapit Tiawiset', 'added candidate to ', '2021-06-10 15:44:15'),
(1059, ' Boonyapit Tiawiset', 'drop 1 candidates', '2021-06-10 15:44:20'),
(1060, ' Boonyapit Tiawiset', 'added candidate to ', '2021-06-10 15:51:22'),
(1061, ' ', 'added resume of noname', '2021-06-10 16:19:27'),
(1062, ' Boonyapit Tiawiset', 'edit Senior Business Analyst from job', '2021-06-10 16:22:27'),
(1063, ' Boonyapit Tiawiset', 'edit Senior Business Analyst from job', '2021-06-10 16:22:35'),
(1064, 'Boonyapit Tiawiset', 'login now', '2021-06-11 12:01:03'),
(1065, 'Boonyapit Tiawiset', 'login now', '2021-06-11 12:02:42'),
(1066, ' ', 'added resume of arxxarmy', '2021-06-11 12:35:53'),
(1067, ' Boonyapit Tiawiset', 'add pich to candidate', '2021-06-11 14:52:08'),
(1068, 'boonyapit', 'login now', '2021-06-11 14:53:45'),
(1069, ' boonyapit', 'add kabo to candidate', '2021-06-11 14:53:58'),
(1070, 'Boonyapit Tiawiset', 'login now', '2021-06-11 15:00:13'),
(1071, ' Boonyapit Tiawiset', 'edit qwertxxx from candidate', '2021-06-11 15:17:20'),
(1072, ' Boonyapit Tiawiset', 'edit qwertxxx from candidate', '2021-06-11 15:17:25'),
(1073, ' Boonyapit Tiawiset', 'edit qwertxxx from candidate', '2021-06-11 15:17:30'),
(1074, 'boonyapit', 'login now', '2021-06-11 15:18:24'),
(1075, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:19:22'),
(1076, ' boonyapit', 'edit arxxarmy from candidate', '2021-06-11 15:19:37'),
(1077, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:19:56'),
(1078, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:20:06'),
(1079, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:20:19'),
(1080, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:20:29'),
(1081, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:23:33'),
(1082, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:23:39'),
(1083, 'Boonyapit Tiawiset', 'login now', '2021-06-11 15:23:55'),
(1084, ' Boonyapit Tiawiset', 'edit noname from candidate', '2021-06-11 15:24:00'),
(1085, ' Boonyapit Tiawiset', 'edit noname from candidate', '2021-06-11 15:24:03'),
(1086, ' Boonyapit Tiawiset', 'edit noname from candidate', '2021-06-11 15:24:06'),
(1087, ' Boonyapit Tiawiset', 'edit noname from candidate', '2021-06-11 15:24:06'),
(1088, ' Boonyapit Tiawiset', 'edit noname from candidate', '2021-06-11 15:24:08'),
(1089, ' boonyapit', 'edit noname from candidate', '2021-06-11 15:26:14'),
(1090, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:27:45'),
(1091, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:27:49'),
(1092, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:28:01'),
(1093, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:28:07'),
(1094, ' boonyapit', 'edit arxxarmy1 from candidate', '2021-06-11 15:29:21'),
(1095, ' Boonyapit Tiawiset', 'edit Senior Business Analyst from job', '2021-06-11 15:29:51'),
(1096, ' boonyapit', 'undo drop arxxarmy1 candidate', '2021-06-11 15:30:10'),
(1097, ' boonyapit', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:30:24'),
(1098, ' Boonyapit Tiawiset', 'edit maley from client', '2021-06-11 15:30:57'),
(1099, ' boonyapit', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:31:11'),
(1100, ' boonyapit', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:33:09'),
(1101, ' Boonyapit Tiawiset', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:33:18'),
(1102, ' Boonyapit Tiawiset', 'edit maley from client', '2021-06-11 15:33:46'),
(1103, ' boonyapit', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:34:00'),
(1104, ' Boonyapit Tiawiset', 'sent email to K.Boonyapit Tiawiset ', '2021-06-11 15:34:06'),
(1105, ' Boonyapit Tiawiset', 'delete Senior Business Analyst from job', '2021-06-11 15:55:50'),
(1106, 'pichakorn maneesil', 'login now', '2021-06-11 17:19:54'),
(1107, 'pichakorn maneesil', 'login now', '2021-06-11 17:20:16'),
(1108, 'hun ki', 'login now', '2021-06-11 17:34:53'),
(1109, 'pichakorn maneesil', 'login now', '2021-06-11 17:35:14'),
(1110, ' pichakorn maneesil', 'add test to job', '2021-06-11 17:36:15'),
(1111, ' pichakorn maneesil', 'edit maley from client', '2021-06-11 17:36:24'),
(1112, ' pichakorn maneesil', 'added candidate to ', '2021-06-11 17:36:42'),
(1113, ' pichakorn maneesil', 'sent email to K.picharm ', '2021-06-11 17:37:26'),
(1114, 'Thanat Prompiriya', 'login now', '2021-08-14 11:37:43'),
(1115, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:43:43'),
(1116, ' Thanat Prompiriya', 'remove kabo from candidate', '2021-08-14 13:43:52'),
(1117, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:52:13'),
(1118, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:54:48'),
(1119, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:57:09'),
(1120, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:57:15'),
(1121, ' Thanat Prompiriya', 'remove  from candidate', '2021-08-14 13:58:26'),
(1122, ' Thanat Prompiriya', 'remove sdsad from candidate', '2021-08-14 14:01:24'),
(1123, ' Thanat Prompiriya', 'remove pich from candidate', '2021-08-14 14:05:48'),
(1124, 'Thanat Prompiriya', 'login now', '2021-08-14 14:25:14'),
(1125, ' Thanat Prompiriya', 'remove Thanat from parser_resume_data', '2021-08-14 14:31:20'),
(1126, ' Thanat Prompiriya', 'remove Light from parser_resume_data', '2021-08-14 16:39:14'),
(1127, ' ', 'added resume of ', '2021-08-14 17:18:16'),
(1128, 'Thanat Prompiriya', 'login now', '2021-08-28 11:35:35'),
(1129, ' Thanat Prompiriya', 'edit  from candidate', '2021-08-28 12:24:38'),
(1130, ' Thanat Prompiriya', 'edit xd from candidate', '2021-08-28 12:24:50'),
(1131, 'Thanat Prompiriya', 'login now', '2021-08-28 13:30:23'),
(1132, ' Thanat Prompiriya', 'remove Test1 from parser_resume_data', '2021-08-28 13:51:07'),
(1133, 'Thanat Prompiriya', 'login now', '2021-09-04 13:22:49'),
(1134, ' Thanat Prompiriya', 'added candidate to ', '2021-09-04 13:23:51'),
(1135, ' Thanat Prompiriya', 'edit  from candidate', '2021-09-04 13:32:07'),
(1136, ' Thanat Prompiriya', 'edit  from candidate', '2021-09-04 13:35:50'),
(1137, ' Thanat Prompiriya', 'edit noname from candidate', '2021-09-04 13:46:24'),
(1138, ' Thanat Prompiriya', 'edit noname from candidate', '2021-09-04 13:46:28'),
(1139, ' Thanat Prompiriya', 'edit nonamete from candidate', '2021-09-04 13:46:34'),
(1140, ' Thanat Prompiriya', 'edit Light from candidate', '2021-09-04 14:15:08'),
(1141, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 14:46:29'),
(1142, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 14:46:37'),
(1143, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 14:51:34'),
(1144, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 14:51:38'),
(1145, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 14:59:02'),
(1146, ' Thanat Prompiriya', 'edit nonameteทดสอบ from candidate', '2021-09-04 15:00:24'),
(1147, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:09:35'),
(1148, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:15:35'),
(1149, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:15:42'),
(1150, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:16:11'),
(1151, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:16:22'),
(1152, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:17:00'),
(1153, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:17:06'),
(1154, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:27:42'),
(1155, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 15:27:58'),
(1156, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:38:52'),
(1157, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:39:22'),
(1158, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:39:47'),
(1159, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:43:13'),
(1160, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:43:28'),
(1161, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:44:32'),
(1162, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:44:44'),
(1163, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:45:15'),
(1164, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:45:35'),
(1165, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:46:07'),
(1166, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:46:31'),
(1167, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:46:56'),
(1168, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:47:09'),
(1169, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:49:26'),
(1170, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:51:43'),
(1171, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:51:48'),
(1172, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:52:02'),
(1173, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:52:37'),
(1174, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:55:11'),
(1175, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:55:42'),
(1176, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 16:56:58'),
(1177, 'Thanat Prompiriya', 'login now', '2021-09-04 23:12:12'),
(1178, ' Thanat Prompiriya', 'edit  from parser_resume_data', '2021-09-04 23:27:52'),
(1179, 'Thanat Prompiriya', 'login now', '2021-09-11 12:16:46'),
(1180, ' Thanat Prompiriya', 'remove Patrick from parser_resume_data', '2021-09-11 12:32:32'),
(1181, 'Thanat Prompiriya', 'login now', '2021-09-11 18:39:06'),
(1182, 'Thanat Prompiriya', 'login now', '2021-09-11 19:13:29'),
(1183, 'A', 'login now', '2021-09-11 19:14:02'),
(1184, 'ธนัท พรหมพิริยา', 'login now', '2021-11-17 23:28:00'),
(1185, 'ธนัท พรหมพิริยา', 'login now', '2021-11-17 23:30:01'),
(1186, 'Thanat Prompiriya', 'login now', '2021-11-17 23:32:21'),
(1187, 'Thanat Prompiriya', 'login now', '2021-11-17 23:36:26'),
(1188, ' Thanat Prompiriya', 'remove nonameteทดสอบ from candidate', '2021-11-17 23:37:57'),
(1189, ' Thanat Prompiriya', 'remove Patrick from parser_resume_data', '2021-11-17 23:38:01'),
(1190, 'Thanat Prompiriya', 'login now', '2021-11-20 22:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `parser_resume_data`
--

CREATE TABLE `parser_resume_data` (
  `id` int(255) NOT NULL,
  `data_position` varchar(100) DEFAULT NULL,
  `data_name_first` varchar(100) DEFAULT NULL,
  `data_name_last` varchar(100) DEFAULT NULL,
  `data_name_first_thai` varchar(100) DEFAULT NULL,
  `data_name_last_thai` varchar(100) DEFAULT NULL,
  `data_specialized_background` text DEFAULT NULL,
  `data_project_record` text DEFAULT NULL,
  `data_extra_experiences` text DEFAULT NULL,
  `data_soft_skill` text DEFAULT NULL,
  `data_operating_system` text DEFAULT NULL,
  `data_programing_language` text DEFAULT NULL,
  `data_database` text DEFAULT NULL,
  `data_toolsIDE` text DEFAULT NULL,
  `data_database_features` text DEFAULT NULL,
  `data_database_tools` text DEFAULT NULL,
  `data_application_servers` text DEFAULT NULL,
  `data_networks` text DEFAULT NULL,
  `data_securities` text DEFAULT NULL,
  `data_java_technologies` text DEFAULT NULL,
  `data_java_script_technologies` text DEFAULT NULL,
  `data_version_control_system` text DEFAULT NULL,
  `data_report` text DEFAULT NULL,
  `data_design_tools` text DEFAULT NULL,
  `data_methodologies` text DEFAULT NULL,
  `data_devops_technologies` text DEFAULT NULL,
  `data_cloud_technologies` text DEFAULT NULL,
  `data_tech_stack` text DEFAULT NULL,
  `data_others` text DEFAULT NULL,
  `data_company_work_experiences` text DEFAULT NULL,
  `data_education` text DEFAULT NULL,
  `data_certification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parser_resume_data`
--

INSERT INTO `parser_resume_data` (`id`, `data_position`, `data_name_first`, `data_name_last`, `data_name_first_thai`, `data_name_last_thai`, `data_specialized_background`, `data_project_record`, `data_extra_experiences`, `data_soft_skill`, `data_operating_system`, `data_programing_language`, `data_database`, `data_toolsIDE`, `data_database_features`, `data_database_tools`, `data_application_servers`, `data_networks`, `data_securities`, `data_java_technologies`, `data_java_script_technologies`, `data_version_control_system`, `data_report`, `data_design_tools`, `data_methodologies`, `data_devops_technologies`, `data_cloud_technologies`, `data_tech_stack`, `data_others`, `data_company_work_experiences`, `data_education`, `data_certification`) VALUES
(4, '', 'Kanaga', 'Kagami', 'คานากะ', 'คากามิ', 'OBJECTIVE \r\nREAL PROGRAMMER \r\n# STUDY ABOUT C,C++,PYTHON,JAVA AND GOING TO BE REAL PROGRAMMER! \r\nREAL WORK EXPERIENCE \r\n# WORK HARD TO DEVELOP MYSELF. \r\nENG', 'TX', '1.) EXPERIENCE \r\nWORK EXPERIENCE | WEB DEVELOPER & DESIGN \r\n- DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE \r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING. \r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND | \r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER \r\nWORK EXPERIENCE | MARKET RESEARCHER \r\n- FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY \r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING. \r\nWORK EXPERIENCE | MANGA & CARTOON TRANSLATOR \r\n- TRANSLATE MANGA & CARTOON FROM ENGLISH BASE. \r\nWORK EXPERIENCE | DELIVERY DRIVER \r\n- GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\n', '1.) Research\r\n2.) English Language\r\n3.) Microsoft Wordc\r\n4.) Microsoft PowerPoint\r\n5.) Mandarin Chinese\r\n', 'OS SKILL', 'JavaScript (Programming Language)\r\nJava (Programming Language)\r\nC (Programming Language)\r\n', 'DB SKILL', 'Adobe Photoshop\r\nAdobe XD\r\nMicrosoft Word\r\nMicrosoft PowerPoint\r\n', 'DB F', 'DB T', 'APS', 'NET', 'SEC', 'JAVA TEC', 'JST', 'VCS', 'REPORT', '1.) Adobe XD\r\n', 'METHO', 'DEV OPS', 'cloud', 'TEC S', 'OTHE', '1.) EIEI\r\nPOSITION : WEB DEVELOPER & DESIGN\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE\r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING.\r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND\r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER\r\n2.) \r\nPOSITION : MARKET RESEARCHER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY\r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING.\r\n3.) \r\nPOSITION : MANGA & CARTOON TRANSLATOR\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - TRANSLATE MANGA & CARTOON FROM ENGLISH BASE.\r\n4.) \r\nPOSITION : DELIVERY DRIVER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\nREAL WORK EXPERIENCE\r\n', 'jij', 'dsad ทดสอบ'),
(5, '', 'Diluc', 'Kae', '', '', 'OBJECTIVE \r\nREAL PROGRAMMER \r\n# STUDY ABOUT C,C++,PYTHON,JAVA AND GOING TO BE REAL PROGRAMMER! \r\nREAL WORK EXPERIENCE \r\n# WORK HARD TO DEVELOP MYSELF. \r\nENG', '', '1.) EXPERIENCE \r\nWORK EXPERIENCE | WEB DEVELOPER & DESIGN \r\n- DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE \r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING. \r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND | \r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER \r\nWORK EXPERIENCE | MARKET RESEARCHER \r\n- FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY \r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING. \r\nWORK EXPERIENCE | MANGA & CARTOON TRANSLATOR \r\n- TRANSLATE MANGA & CARTOON FROM ENGLISH BASE. \r\nWORK EXPERIENCE | DELIVERY DRIVER \r\n- GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\n', '1.) Research\r\n2.) English Language\r\n3.) Microsoft Word\r\n4.) Microsoft PowerPoint\r\n5.) Mandarin Chinese\r\n', '', 'JavaScript (Programming Language)\r\nJava (Programming Language)\r\nC (Programming Language)\r\n', '', 'Adobe Photoshop\r\nAdobe XD\r\nMicrosoft Word\r\nMicrosoft PowerPoint\r\n', '', '', '', '', '', '', '', '', '', '1.) Adobe XD\r\n', '', '', '', '', '', '1.) \r\nPOSITION : WEB DEVELOPER & DESIGN\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE\r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING.\r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND\r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER\r\n2.) \r\nPOSITION : MARKET RESEARCHER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY\r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING.\r\n3.) \r\nPOSITION : MANGA & CARTOON TRANSLATOR\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - TRANSLATE MANGA & CARTOON FROM ENGLISH BASE.\r\n4.) \r\nPOSITION : DELIVERY DRIVER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\nREAL WORK EXPERIENCE\r\n', 'ADDED', ''),
(6, '', 'Kaeya', '', '', '', 'OBJECTIVE \r\nREAL PROGRAMMER \r\n# STUDY ABOUT C,C++,PYTHON,JAVA AND GOING TO BE REAL PROGRAMMER! \r\nREAL WORK EXPERIENCE \r\n# WORK HARD TO DEVELOP MYSELF. \r\nENG', '', '1.) EXPERIENCE \r\nWORK EXPERIENCE | WEB DEVELOPER & DESIGN \r\n- DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE \r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING. \r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND | \r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER \r\nWORK EXPERIENCE | MARKET RESEARCHER \r\n- FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY \r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING. \r\nWORK EXPERIENCE | MANGA & CARTOON TRANSLATOR \r\n- TRANSLATE MANGA & CARTOON FROM ENGLISH BASE. \r\nWORK EXPERIENCE | DELIVERY DRIVER \r\n- GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\n', '1.) Research\r\n2.) English Language\r\n3.) Microsoft Word\r\n4.) Microsoft PowerPoint\r\n5.) Mandarin Chinese\r\n', '', 'JavaScript (Programming Language)\r\nJava (Programming Language)\r\nC (Programming Language)\r\n', '', 'Adobe Photoshop\r\nAdobe XD\r\nMicrosoft Word\r\nMicrosoft PowerPoint\r\n', '', '', '', '', '', '', '', '', '', '1.) Adobe XD\r\n', '', '', '', '', '', '1.) \r\nPOSITION : WEB DEVELOPER & DESIGN\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE\r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING.\r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND\r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER\r\n2.) \r\nPOSITION : MARKET RESEARCHER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY\r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING.\r\n3.) \r\nPOSITION : MANGA & CARTOON TRANSLATOR\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - TRANSLATE MANGA & CARTOON FROM ENGLISH BASE.\r\n4.) \r\nPOSITION : DELIVERY DRIVER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\nREAL WORK EXPERIENCE\r\n', '1.) Department : \r\nOrganization : KING\'S MONGKUT UNIVERSITY OF NORTH BANKOK\r\nComplete Date : no data\r\n2.) Department : \r\nOrganization : BENCHAMARACHUTHIT SCHOOL CHANTHABURI\r\nComplete Date : 2018-01-01\r\n3.) Department : \r\nOrganization : BENJAMANUSON SCHOOL CHANTHABURI\r\nComplete Date : 2015-01-01\r\n', '1.) Certification : REAL PROGRAMMER\r\n2.) Certification : STUDY ABOUT C C PYTHON JAVA AND GOING TO BE REAL PROGRAMMER\r\n'),
(7, '', 'Kaya', '', 'ทดสอบ', '', 'OBJECTIVE \r\nREAL PROGRAMMER \r\n# STUDY ABOUT C,C++,PYTHON,JAVA AND GOING TO BE REAL PROGRAMMER! \r\nREAL WORK EXPERIENCE \r\n# WORK HARD TO DEVELOP MYSELF. \r\nENG', '', '1.) EXPERIENCE \r\nWORK EXPERIENCE | WEB DEVELOPER & DESIGN \r\n- DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE \r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING. \r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND | \r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER \r\nWORK EXPERIENCE | MARKET RESEARCHER \r\n- FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY \r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING. \r\nWORK EXPERIENCE | MANGA & CARTOON TRANSLATOR \r\n- TRANSLATE MANGA & CARTOON FROM ENGLISH BASE. \r\nWORK EXPERIENCE | DELIVERY DRIVER \r\n- GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\n', '1.) Research\r\n2.) English Language\r\n3.) Microsoft Word\r\n4.) Microsoft PowerPoint\r\n5.) Mandarin Chinese\r\n', '', 'JavaScript (Programming Language)\r\nJava (Programming Language)\r\nC (Programming Language)\r\n', '', 'Adobe Photoshop\r\nAdobe XD\r\nMicrosoft Word\r\nMicrosoft PowerPoint\r\n', '', '', '', '', '', '', '', '', '', '1.) Adobe XD\r\n', '', '', '', '', '', '1.) \r\nPOSITION : WEB DEVELOPER & DESIGN\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE\r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING.\r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND\r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER\r\n2.) \r\nPOSITION : MARKET RESEARCHER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY\r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING.\r\n3.) \r\nPOSITION : MANGA & CARTOON TRANSLATOR\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - TRANSLATE MANGA & CARTOON FROM ENGLISH BASE.\r\n4.) \r\nPOSITION : DELIVERY DRIVER\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\nREAL WORK EXPERIENCE\r\n', '1.) Department : \r\nOrganization : KING\'S MONGKUT UNIVERSITY OF NORTH BANKOK\r\nComplete Date : no data\r\n2.) Department : \r\nOrganization : BENCHAMARACHUTHIT SCHOOL CHANTHABURI\r\nComplete Date : 2018-01-01\r\n3.) Department : \r\nOrganization : BENJAMANUSON SCHOOL CHANTHABURI\r\nComplete Date : 2015-01-01\r\n', '1.) Certification : REAL PROGRAMMER\r\n2.) Certification : STUDY ABOUT C C PYTHON JAVA AND GOING TO BE REAL PROGRAMMER\r\n'),
(10, 'WebDev', 'Thanat', 'Prompiriya', 'ธนัท', 'พรหมพิริยา', 'OBJECTIVE \r\nREAL PROGRAMMER \r\n# STUDY ABOUT C,C++,PYTHON,JAVA AND GOING TO BE REAL PROGRAMMER! \r\nREAL WORK EXPERIENCE \r\n# WORK HARD TO DEVELOP MYSELF. \r\nENG', '', '1.) EXPERIENCE \r\nWORK EXPERIENCE | WEB DEVELOPER & DESIGN \r\n- DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE \r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING. \r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND | \r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER \r\nWORK EXPERIENCE | MARKET RESEARCHER \r\n- FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY \r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING. \r\nWORK EXPERIENCE | MANGA & CARTOON TRANSLATOR \r\n- TRANSLATE MANGA & CARTOON FROM ENGLISH BASE. \r\nWORK EXPERIENCE | DELIVERY DRIVER \r\n- GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\n', '1.) Research\r\n2.) English Language\r\n3.) Microsoft Word\r\n4.) Microsoft PowerPoint\r\n5.) Mandarin Chinese\r\n', '', 'JavaScript (Programming Language)\r\nJava (Programming Language)\r\nC (Programming Language)\r\n', '', 'Adobe Photoshop\r\nAdobe XD\r\nMicrosoft Word\r\nMicrosoft PowerPoint\r\n', '', '', '', '', '', '', '', '', '', '1.) Adobe XD\r\n', '', '', '', '', '', '1.) \r\nPOSITION : WEB DEVELOPER & DESIGN\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - DEVELOP BLOGGER , HTML, CSS , BASIC JAVASCRIPT AND HAVE KNOWLEDGE\r\nABOUT ADOBE DREAMWEVER TO DEVELOP WEBSITE TO SELLING.\r\n- DESIGN WEBSITE FROM ADOBE PHOTOSHOP AND ADOBE XD MIX THAT AND\r\nHAVE FINISH PROTOTYPE THEN GO CODING IN ADOBE DREAMWEVER\r\n2.) \r\nPOSITION : Market Researcher\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - FOR EXAMPLE RESEARCH ABOUT CIGARETTE WHY PEOPLE LOVE L&M BRAND WHY\r\nNOT BUY OTHERS BRAND.THIS IS WILL MAKE EMPLOYER HAVE ADVANTAGE MARKETING.\r\n3.) \r\nPOSITION : Manga & Cartoon Translator\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - TRANSLATE MANGA & CARTOON FROM ENGLISH BASE.\r\n4.) \r\nPOSITION : Delivery Driver\r\nORGANIZATION : no data\r\nSTART DATE : no data\r\nEND DATE : no data\r\nJOB DETAIL : - GO DELIVERY FOOD , EXPRESS THAT MAKE ME HAVE KNOWLEDGE BANGKOK MAP.\r\nREAL WORK EXPERIENCE\r\n', '1.) Department : \r\nOrganization : KING\'S MONGKUT UNIVERSITY OF NORTH BANKOK\r\nComplete Date : no data\r\n2.) Department : \r\nOrganization : BENCHAMARACHUTHIT SCHOOL CHANTHABURI\r\nComplete Date : 2018-01-01\r\n3.) Department : \r\nOrganization : BENJAMANUSON SCHOOL CHANTHABURI\r\nComplete Date : 2015-01-01\r\n', '1.) Certification : REAL PROGRAMMER\r\n2.) Certification : STUDY ABOUT C C PYTHON JAVA AND GOING TO BE REAL PROGRAMMER\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `data_position` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`data_position`) VALUES
('test'),
('22'),
(''),
(''),
('testcasdasd'),
('T@T');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `last_login` bigint(20) NOT NULL,
  `userStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `nickname`, `phoneNumber`, `email`, `password`, `code`, `status`, `last_login`, `userStatus`) VALUES
(37, 'brave', NULL, NULL, 'bravebbb1@hotmail.com', '$2y$10$IbVmJatoRCyEACyKUw921O34.rOVGYmD6Xym9wD4coDatTvCg6ZYW', 565868, 'notverified', 0, NULL),
(39, 'บุญพิชญ์ เตียวิเศษ', NULL, NULL, 'pichakorn.m@vannessplus.com', '$2y$10$VN93SJD7itTRsPM7qf.m2.mF0thgG3mI5W/7NuylBXn9RkpkRcMji', 0, 'verified', 1620280890, 1),
(40, 'pichakorn maneesil', NULL, NULL, 'picharm.m@vannessplus.com', '$2y$10$exiPoBXr6GMYr5We.5bLH.YI4mkDsclgzohBFmDLHKRbce1sVb2w6', 0, 'verified', 1623407983, 2),
(41, 'Super Recruit', NULL, NULL, 'superrecruit123@gmail.com', '$2y$10$exiPoBXr6GMYr5We.5bLH.YI4mkDsclgzohBFmDLHKRbce1sVb2w6', 0, 'verified', 0, 3),
(42, 'hun ki', NULL, NULL, 'hunki@vannessplus.com', '$2y$10$exiPoBXr6GMYr5We.5bLH.YI4mkDsclgzohBFmDLHKRbce1sVb2w6', 0, 'verified', 1623299508, 1),
(43, 'hunka', NULL, NULL, 'hunka@vannessplus.com', '$2y$10$exiPoBXr6GMYr5We.5bLH.YI4mkDsclgzohBFmDLHKRbce1sVb2w6', 0, 'verified', 1623220536, 1),
(47, 'boonyapit', NULL, NULL, 'boonyapit.t@ku.th', '$2y$10$kOBgNkwocOSoxIevwZuugOgL0XgfrE09I/hqLcN7avChhgwECfHSS', 0, 'verified', 1623401762, 1),
(50, 'Boonyapit Tiawiset', 'Brave', '0909941252', 'bbravel3@hotmail.com', '$2y$10$ErDdUkvNofvEKxBfznaleeJZYQ6g/iNXqBfq0FVPVyjztA0jf.PoW', 0, 'verified', 1623401761, 2),
(51, 'aaa', 'aaa', '0123456789', 'lightofficialstudio@gmail.com', '$2y$10$lo/REydz5qEqnk56UDk3UOlXwEcy3HsXgeD/vruaTHN7dSO8IE0C.', 0, 'verified', 1623207572, 1),
(53, 'xxx', 'xxx', '0123456789', 'picharm05@gmail.com', '$2y$10$s/X3FZjxmK/cr8Oabg2lluNoVTb46WnHSs0vbRT5qXu71Z.Q.bFkK', 0, 'verified', 1623225667, 1),
(54, 'Thanat Prompiriya', 'Lighties', '0646356524', 'lightofficialstudio@vannessplus.com', '$2y$10$gzexMoGL1IKn9IR7m.rGuenhAdSAQxhkDYRhvzv4bDHX7/gFpkRf2', 0, 'verified', 1637422070, 3),
(55, 'Thanat Prompiriya', 'Lightdrago', '0646356524', 'lightofficialstudiox@vannessplus.com', '$2y$10$di/SElL1AvFIjr/baA/A9O0aeONACAQv0Sh0.R7v3hy.rViGSsNY.', 259553, 'notverified', 0, 3),
(56, 'A', 'A', '0811111111', 'abc@vannessplus.com', '$2y$10$AhCqAKfBn4GZjhKOiQmgH.zi9yaqdDtarWSiYJFlFDBqkEUuHbHLm', 0, 'verified', 1631365752, NULL),
(57, 'Thanat Prompiriya', 'Guil', '0646356523', 'cxzcabc@vannessplus.com', '$2y$10$RPu3uRpyBCC0kVITmkDPy.8CXr7XTH7EnEQscpvYjNjKI.6WT3MZO', 826189, 'notverified', 0, NULL),
(58, 'Kirito Sagamio', 'Sagano', '0991287789', 'tester_001@vannessplus.com', '$2y$10$U.gJKDt9aD8NYa1RfBOyEuNAUfGJ3nA6iPNmG1fkDnYrinVb7SiVa', 195405, 'notverified', 0, NULL),
(59, 'Tage Michi', 'Sagao', '0994567898', 'tester_002@vannessplus.com', '$2y$10$3zdQnXfJL1EKk63usia5V.4Yua9Mj/GF/6.bjJK7DPklM5zB0yw9y', 432102, 'notverified', 0, NULL),
(60, 'Somchai Boi', 'BoBo', '0641362289', 'tester_003@vannessplus.com', '$2y$10$3JE2t378pHiZkC8oTnXEVuWaScY.kjraxt8yNARItj5fQOzT900H6', 216264, 'notverified', 0, NULL),
(63, 'ธนัท พรหมพิริยา', 'ไลท์', '0641462299', 'lightofficialstudio@hotmail.com', '$2y$10$eUpr3Vq./a9wIa27y1EepOZvZWxEt4r.JqUh5vRcg2fML7HGnLoHO', 0, 'verified', 1637166600, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`applyId`),
  ADD KEY `candidateId` (`candidateId`),
  ADD KEY `jobId` (`jobId`),
  ADD KEY `candidateStatus` (`candidateStatus`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidateId`),
  ADD KEY `tId` (`tId`);

--
-- Indexes for table `candidateresume`
--
ALTER TABLE `candidateresume`
  ADD PRIMARY KEY (`tId`);

--
-- Indexes for table `candidatestatus`
--
ALTER TABLE `candidatestatus`
  ADD PRIMARY KEY (`candidateStatusId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`),
  ADD KEY `id` (`id`),
  ADD KEY `businessTypeId` (`businessTypeId`);

--
-- Indexes for table `contractdetail`
--
ALTER TABLE `contractdetail`
  ADD PRIMARY KEY (`contractDetailId`);

--
-- Indexes for table `dropreason`
--
ALTER TABLE `dropreason`
  ADD PRIMARY KEY (`dropReasonId`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industryId`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `clientId` (`clientId`,`id`),
  ADD KEY `industryId` (`industryId`),
  ADD KEY `contractDetailId` (`contractDetailId`),
  ADD KEY `id` (`id`),
  ADD KEY `jobStatusId` (`jobStatusId`);

--
-- Indexes for table `jobstatus`
--
ALTER TABLE `jobstatus`
  ADD PRIMARY KEY (`jobStatusId`);

--
-- Indexes for table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parser_resume_data`
--
ALTER TABLE `parser_resume_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `applyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `candidateresume`
--
ALTER TABLE `candidateresume`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contractdetail`
--
ALTER TABLE `contractdetail`
  MODIFY `contractDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dropreason`
--
ALTER TABLE `dropreason`
  MODIFY `dropReasonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `jobstatus`
--
ALTER TABLE `jobstatus`
  MODIFY `jobStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loginlogs`
--
ALTER TABLE `loginlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1191;

--
-- AUTO_INCREMENT for table `parser_resume_data`
--
ALTER TABLE `parser_resume_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD CONSTRAINT `applyjob_ibfk_1` FOREIGN KEY (`candidateId`) REFERENCES `candidate` (`candidateId`),
  ADD CONSTRAINT `applyjob_ibfk_2` FOREIGN KEY (`jobId`) REFERENCES `job` (`jobId`),
  ADD CONSTRAINT `applyjob_ibfk_3` FOREIGN KEY (`candidateStatus`) REFERENCES `candidatestatus` (`candidateStatusId`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`tId`) REFERENCES `candidateresume` (`tId`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_3` FOREIGN KEY (`id`) REFERENCES `usertable` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `client` (`clientId`),
  ADD CONSTRAINT `job_ibfk_10` FOREIGN KEY (`id`) REFERENCES `usertable` (`id`),
  ADD CONSTRAINT `job_ibfk_11` FOREIGN KEY (`jobStatusId`) REFERENCES `jobstatus` (`jobStatusId`),
  ADD CONSTRAINT `job_ibfk_8` FOREIGN KEY (`industryId`) REFERENCES `industry` (`industryId`),
  ADD CONSTRAINT `job_ibfk_9` FOREIGN KEY (`contractDetailId`) REFERENCES `contractdetail` (`contractDetailId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
