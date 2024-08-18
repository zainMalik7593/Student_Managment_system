-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 12:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsat`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_graphic_designing`
--

CREATE TABLE `advanced_graphic_designing` (
  `id` int NOT NULL,
  `Photoshop` tinyint(1) NOT NULL DEFAULT '0',
  `Illustrator` tinyint(1) NOT NULL DEFAULT '0',
  `Indesign` tinyint(1) NOT NULL DEFAULT '0',
  `Inpage` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `advanced_graphic_designing`
--

INSERT INTO `advanced_graphic_designing` (`id`, `Photoshop`, `Illustrator`, `Indesign`, `Inpage`) VALUES
(10, 0, 0, 0, 0),
(14, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(35, 0, 0, 0, 0),
(42, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('present','absent') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cit`
--

CREATE TABLE `cit` (
  `id` int NOT NULL,
  `Word` tinyint(1) NOT NULL DEFAULT '0',
  `PPT` tinyint(1) NOT NULL DEFAULT '0',
  `Excel` tinyint(1) NOT NULL DEFAULT '0',
  `Advanced_Excel` tinyint(1) NOT NULL DEFAULT '0',
  `Photoshop` tinyint(1) NOT NULL DEFAULT '0',
  `Flash` tinyint(1) NOT NULL DEFAULT '0',
  `Dreamweaver` tinyint(1) NOT NULL DEFAULT '0',
  `VScode_basic` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cit`
--

INSERT INTO `cit` (`id`, `Word`, `PPT`, `Excel`, `Advanced_Excel`, `Photoshop`, `Flash`, `Dreamweaver`, `VScode_basic`) VALUES
(8, 0, 0, 0, 1, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int NOT NULL,
  `class` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE `class_time` (
  `id` int NOT NULL,
  `timing` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`id`, `timing`, `start_time`, `end_time`) VALUES
(1, '3 to 4', '15:00:00', '16:00:00'),
(2, '4 to 5', '16:00:00', '17:00:00'),
(3, '5 to 6', '17:00:00', '18:00:00'),
(4, '6 to 7', '18:00:00', '19:00:00'),
(5, '7 to 8', '19:00:00', '20:00:00'),
(6, '8 to 9', '20:00:00', '21:00:00'),
(7, '9 to 10', '21:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `graphic_designing`
--

CREATE TABLE `graphic_designing` (
  `id` int NOT NULL,
  `Photoshop` tinyint(1) NOT NULL DEFAULT '0',
  `Illustrator` tinyint(1) NOT NULL DEFAULT '0',
  `Inpage` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `graphic_designing`
--

INSERT INTO `graphic_designing` (`id`, `Photoshop`, `Illustrator`, `Inpage`) VALUES
(12, 0, 0, 0),
(31, 0, 0, 0),
(38, 0, 0, 0),
(44, 0, 0, 0),
(47, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `office_automation`
--

CREATE TABLE `office_automation` (
  `id` int NOT NULL,
  `Word` tinyint(1) NOT NULL DEFAULT '0',
  `PPT` tinyint(1) NOT NULL DEFAULT '0',
  `Excel` tinyint(1) NOT NULL DEFAULT '0',
  `Advanced_Excel` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `office_automation`
--

INSERT INTO `office_automation` (`id`, `Word`, `PPT`, `Excel`, `Advanced_Excel`) VALUES
(5, 0, 0, 0, 0),
(16, 0, 0, 0, 0),
(22, 0, 0, 0, 0),
(32, 0, 0, 0, 0),
(41, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pcit`
--

CREATE TABLE `pcit` (
  `id` int NOT NULL,
  `Word` tinyint(1) NOT NULL DEFAULT '0',
  `PPT` tinyint(1) NOT NULL DEFAULT '0',
  `Excel` tinyint(1) NOT NULL DEFAULT '0',
  `Access` tinyint(1) NOT NULL DEFAULT '0',
  `PhotoShop` tinyint(1) NOT NULL DEFAULT '0',
  `CoralDraw` tinyint(1) NOT NULL DEFAULT '0',
  `HTML` tinyint(1) NOT NULL DEFAULT '0',
  `CSS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pcit`
--

INSERT INTO `pcit` (`id`, `Word`, `PPT`, `Excel`, `Access`, `PhotoShop`, `CoralDraw`, `HTML`, `CSS`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pro_web`
--

CREATE TABLE `pro_web` (
  `id` int NOT NULL,
  `Photoshop` tinyint(1) NOT NULL DEFAULT '0',
  `VSCode` tinyint(1) NOT NULL DEFAULT '0',
  `HTML5` tinyint(1) NOT NULL DEFAULT '0',
  `CSS3` tinyint(1) NOT NULL DEFAULT '0',
  `JavaScript` tinyint(1) NOT NULL DEFAULT '0',
  `Jquery` tinyint(1) NOT NULL DEFAULT '0',
  `Jquery_Plugins` tinyint(1) NOT NULL DEFAULT '0',
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0',
  `PHP` tinyint(1) NOT NULL DEFAULT '0',
  `MySQL` tinyint(1) NOT NULL DEFAULT '0',
  `Ajax` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pro_web`
--

INSERT INTO `pro_web` (`id`, `Photoshop`, `VSCode`, `HTML5`, `CSS3`, `JavaScript`, `Jquery`, `Jquery_Plugins`, `Bootstrap`, `PHP`, `MySQL`, `Ajax`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserved_seats`
--

CREATE TABLE `reserved_seats` (
  `id` int NOT NULL DEFAULT '0',
  `timeid` int NOT NULL,
  `classid` int NOT NULL,
  `seat_number` int DEFAULT NULL,
  `reserved` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserved_seats`
--

INSERT INTO `reserved_seats` (`id`, `timeid`, `classid`, `seat_number`, `reserved`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 0),
(3, 1, 1, 3, 0),
(4, 1, 1, 4, 0),
(5, 1, 1, 5, 0),
(6, 1, 1, 6, 0),
(7, 1, 2, 1, 1),
(8, 1, 2, 2, 1),
(9, 1, 2, 3, 1),
(10, 1, 2, 4, 1),
(11, 1, 2, 5, 1),
(12, 1, 2, 6, 1),
(13, 1, 3, 1, 1),
(14, 1, 3, 2, 0),
(15, 1, 3, 3, 1),
(16, 1, 3, 4, 1),
(17, 1, 3, 5, 1),
(18, 1, 3, 6, 1),
(19, 1, 4, 1, 0),
(20, 1, 4, 2, 1),
(21, 1, 4, 3, 1),
(22, 1, 4, 4, 0),
(23, 1, 4, 5, 1),
(24, 1, 4, 6, 1),
(25, 2, 1, 1, 1),
(26, 2, 1, 2, 0),
(27, 2, 1, 3, 0),
(28, 2, 1, 4, 0),
(29, 2, 1, 5, 0),
(30, 2, 1, 6, 0),
(31, 2, 2, 1, 1),
(32, 2, 2, 2, 1),
(33, 2, 2, 3, 1),
(34, 2, 2, 4, 1),
(35, 2, 2, 5, 1),
(36, 2, 2, 6, 1),
(37, 2, 3, 1, 0),
(38, 2, 3, 2, 1),
(39, 2, 3, 3, 0),
(40, 2, 3, 4, 0),
(41, 2, 3, 5, 0),
(42, 2, 3, 6, 0),
(43, 2, 4, 1, 0),
(44, 2, 4, 2, 0),
(45, 2, 4, 3, 0),
(46, 2, 4, 4, 0),
(47, 2, 4, 5, 0),
(48, 2, 4, 6, 0),
(49, 3, 1, 1, 0),
(50, 3, 1, 2, 0),
(51, 3, 1, 3, 0),
(52, 3, 1, 4, 0),
(53, 3, 1, 5, 0),
(54, 3, 1, 6, 0),
(55, 3, 2, 1, 0),
(56, 3, 2, 2, 1),
(57, 3, 2, 3, 1),
(58, 3, 2, 4, 1),
(59, 3, 2, 5, 0),
(60, 3, 2, 6, 0),
(61, 3, 3, 1, 0),
(62, 3, 3, 2, 0),
(63, 3, 3, 3, 0),
(64, 3, 3, 4, 0),
(65, 3, 3, 5, 0),
(66, 3, 3, 6, 0),
(67, 3, 4, 1, 0),
(68, 3, 4, 2, 0),
(69, 3, 4, 3, 0),
(70, 3, 4, 4, 0),
(71, 3, 4, 5, 0),
(72, 3, 4, 6, 0),
(73, 4, 1, 1, 0),
(74, 4, 1, 2, 0),
(75, 4, 1, 3, 0),
(76, 4, 1, 4, 0),
(77, 4, 1, 5, 0),
(78, 4, 1, 6, 0),
(79, 4, 2, 1, 0),
(80, 4, 2, 2, 1),
(81, 4, 2, 3, 0),
(82, 4, 2, 4, 0),
(83, 4, 2, 5, 0),
(84, 4, 2, 6, 0),
(85, 4, 3, 1, 0),
(86, 4, 3, 2, 0),
(87, 4, 3, 3, 0),
(88, 4, 3, 4, 1),
(89, 4, 3, 5, 0),
(90, 4, 3, 6, 0),
(91, 4, 4, 1, 0),
(92, 4, 4, 2, 0),
(93, 4, 4, 3, 0),
(94, 4, 4, 4, 0),
(95, 4, 4, 5, 0),
(96, 4, 4, 6, 0),
(97, 5, 1, 1, 0),
(98, 5, 1, 2, 0),
(99, 5, 1, 3, 0),
(100, 5, 1, 4, 0),
(101, 5, 1, 5, 0),
(102, 5, 1, 6, 0),
(103, 5, 2, 1, 0),
(104, 5, 2, 2, 1),
(105, 5, 2, 3, 1),
(106, 5, 2, 4, 0),
(107, 5, 2, 5, 0),
(108, 5, 2, 6, 0),
(109, 5, 3, 1, 0),
(110, 5, 3, 2, 0),
(111, 5, 3, 3, 0),
(112, 5, 3, 4, 0),
(113, 5, 3, 5, 0),
(114, 5, 3, 6, 0),
(115, 5, 4, 1, 0),
(116, 5, 4, 2, 0),
(117, 5, 4, 3, 0),
(118, 5, 4, 4, 0),
(119, 5, 4, 5, 0),
(120, 5, 4, 6, 0),
(121, 6, 1, 1, 0),
(122, 6, 1, 2, 0),
(123, 6, 1, 3, 0),
(124, 6, 1, 4, 0),
(125, 6, 1, 5, 0),
(126, 6, 1, 6, 0),
(127, 6, 2, 1, 0),
(128, 6, 2, 2, 1),
(129, 6, 2, 3, 0),
(130, 6, 2, 4, 0),
(131, 6, 2, 5, 0),
(132, 6, 2, 6, 0),
(133, 6, 3, 1, 0),
(134, 6, 3, 2, 0),
(135, 6, 3, 3, 0),
(136, 6, 3, 4, 0),
(137, 6, 3, 5, 0),
(138, 6, 3, 6, 0),
(139, 6, 4, 1, 0),
(140, 6, 4, 2, 1),
(141, 6, 4, 3, 0),
(142, 6, 4, 4, 0),
(143, 6, 4, 5, 1),
(144, 6, 4, 6, 0),
(145, 7, 1, 1, 0),
(146, 7, 1, 2, 0),
(147, 7, 1, 3, 0),
(148, 7, 1, 4, 0),
(149, 7, 1, 5, 0),
(150, 7, 1, 6, 0),
(151, 7, 2, 1, 0),
(152, 7, 2, 2, 1),
(153, 7, 2, 3, 1),
(154, 7, 2, 4, 1),
(155, 7, 2, 5, 0),
(156, 7, 2, 6, 0),
(157, 7, 3, 1, 1),
(158, 7, 3, 2, 0),
(159, 7, 3, 3, 0),
(160, 7, 3, 4, 1),
(161, 7, 3, 5, 0),
(162, 7, 3, 6, 0),
(163, 7, 4, 1, 0),
(164, 7, 4, 2, 0),
(165, 7, 4, 3, 0),
(166, 7, 4, 4, 0),
(167, 7, 4, 5, 0),
(168, 7, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int NOT NULL,
  `seatno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `seatno`) VALUES
(1, 'No # 1'),
(2, 'No # 2'),
(3, 'No # 3'),
(4, 'No # 4'),
(5, 'No # 5'),
(6, 'No # 6');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `course` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timeid` int NOT NULL,
  `classid` int NOT NULL,
  `seat_number` int DEFAULT NULL,
  `date` date NOT NULL,
  `stage_id` int NOT NULL DEFAULT '1',
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_stage`
--

CREATE TABLE `student_stage` (
  `id` int NOT NULL,
  `stage` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_stage`
--

INSERT INTO `student_stage` (`id`, `stage`) VALUES
(1, 'Continue'),
(2, 'Complete'),
(3, 'Left'),
(4, 'Freez');

-- --------------------------------------------------------

--
-- Table structure for table `web_designing`
--

CREATE TABLE `web_designing` (
  `id` int NOT NULL,
  `Photoshop` tinyint(1) NOT NULL DEFAULT '0',
  `VSCode` tinyint(1) NOT NULL DEFAULT '0',
  `HTML5` tinyint(1) NOT NULL DEFAULT '0',
  `CSS3` tinyint(1) NOT NULL DEFAULT '0',
  `JavaScript` tinyint(1) NOT NULL DEFAULT '0',
  `Jquery` tinyint(1) NOT NULL DEFAULT '0',
  `Jquery_Plugins` tinyint(1) NOT NULL DEFAULT '0',
  `Bootstrap` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `web_designing`
--

INSERT INTO `web_designing` (`id`, `Photoshop`, `VSCode`, `HTML5`, `CSS3`, `JavaScript`, `Jquery`, `Jquery_Plugins`, `Bootstrap`) VALUES
(4, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced_graphic_designing`
--
ALTER TABLE `advanced_graphic_designing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cit`
--
ALTER TABLE `cit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time`
--
ALTER TABLE `class_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graphic_designing`
--
ALTER TABLE `graphic_designing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_automation`
--
ALTER TABLE `office_automation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcit`
--
ALTER TABLE `pcit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_web`
--
ALTER TABLE `pro_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved_seats`
--
ALTER TABLE `reserved_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_stage`
--
ALTER TABLE `student_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_designing`
--
ALTER TABLE `web_designing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_stage`
--
ALTER TABLE `student_stage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
