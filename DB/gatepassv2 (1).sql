-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 07:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatepassv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `aadhar` varchar(250) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `location` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`id`, `aadhar`, `type`, `location`, `created_at`) VALUES
(15, '382154172012', 'TRUCK', '004827QHHA', '2021-09-23 20:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `id` int(11) NOT NULL,
  `location_code` varchar(20) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_address` varchar(240) DEFAULT NULL,
  `location_email` varchar(100) DEFAULT NULL,
  `location_phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`id`, `location_code`, `location_name`, `location_address`, `location_email`, `location_phone`) VALUES
(1, '004827QHHA', 'JSR', 'Ajmnh askdj jahskd', 'danroy48@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `mac_id` varchar(600) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `mac_id`, `date`) VALUES
(1, '0A-00-27-00-00-1E', '2020-04-04 16:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `labour_data`
--

CREATE TABLE `labour_data` (
  `id` int(11) NOT NULL,
  `party` varchar(250) DEFAULT NULL,
  `truck_no` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `adhar_no` varchar(250) DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `fathers_name` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `yob` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `house` varchar(250) DEFAULT NULL,
  `dl_no` varchar(250) DEFAULT NULL,
  `issueing_rto` varchar(250) DEFAULT NULL,
  `eye_sight` varchar(250) DEFAULT NULL,
  `from_j` varchar(250) DEFAULT NULL,
  `from_h` varchar(250) DEFAULT NULL,
  `police_verification` varchar(250) DEFAULT NULL,
  `ref` varchar(250) DEFAULT NULL,
  `police_station` varchar(250) DEFAULT NULL,
  `valid_from` varchar(250) DEFAULT NULL,
  `valid_to` varchar(250) DEFAULT NULL,
  `valid_from_training` varchar(250) DEFAULT NULL,
  `valid_to_training` varchar(250) DEFAULT NULL,
  `upload_documents` varchar(250) DEFAULT NULL,
  `issue_date` varchar(250) DEFAULT NULL,
  `insuranse_rs_1` varchar(250) DEFAULT NULL,
  `insuranse_rs_2` varchar(250) DEFAULT NULL,
  `nominee` varchar(250) DEFAULT NULL,
  `bank_account` varchar(250) DEFAULT NULL,
  `hiv_test` varchar(250) DEFAULT NULL,
  `fitness_test` varchar(250) DEFAULT NULL,
  `created_date` varchar(250) DEFAULT NULL,
  `create_user` varchar(250) DEFAULT NULL,
  `attach_document` varchar(250) DEFAULT NULL,
  `location_code` varchar(250) DEFAULT NULL,
  `card_number` varchar(250) DEFAULT NULL,
  `temp` varchar(250) DEFAULT NULL,
  `process_stage` int(11) DEFAULT NULL,
  `hg_training` varchar(250) DEFAULT NULL,
  `upload_photo_documents` varchar(250) DEFAULT NULL,
  `valid_up_to` varchar(250) DEFAULT NULL,
  `blood_group` varchar(250) DEFAULT NULL,
  `insurance_twelve_rupee` varchar(250) DEFAULT NULL,
  `insurance_three_thirty_rupee` varchar(250) DEFAULT NULL,
  `nominee_name` varchar(250) DEFAULT NULL,
  `bank_ac` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labour_data`
--

INSERT INTO `labour_data` (`id`, `party`, `truck_no`, `type`, `adhar_no`, `full_name`, `fathers_name`, `gender`, `yob`, `mobile`, `house`, `dl_no`, `issueing_rto`, `eye_sight`, `from_j`, `from_h`, `police_verification`, `ref`, `police_station`, `valid_from`, `valid_to`, `valid_from_training`, `valid_to_training`, `upload_documents`, `issue_date`, `insuranse_rs_1`, `insuranse_rs_2`, `nominee`, `bank_account`, `hiv_test`, `fitness_test`, `created_date`, `create_user`, `attach_document`, `location_code`, `card_number`, `temp`, `process_stage`, `hg_training`, `upload_photo_documents`, `valid_up_to`, `blood_group`, `insurance_twelve_rupee`, `insurance_three_thirty_rupee`, `nominee_name`, `bank_ac`) VALUES
(1, '1', '4', 'Driver', '600140023262', 'ASHOK SHIT', 'AMIT SHIT', NULL, '1976-12-12', NULL, 'ENGLISH BAZZAR MALDA', '234579/1999', 'MALDAH', 'OK', 'Yes', 'No', 'Yes', '20/207', 'MALDAH', '2021-04-09', '2021-10-10', NULL, NULL, NULL, '1999-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'JAMP10000', '0', 2, 'No', '6070476a854d7.png', NULL, 'A', 'Yes', 'No', 'NAMITA SHIT', '1123445678903'),
(2, '3', NULL, NULL, '6001400232645', 'Drake', 'dutta ka papa', NULL, '2021-04-16', '7050024999', 'ENGLISH BAZZAR MALDA', NULL, NULL, 'OK', 'Yes', 'No', 'Yes', 'bkkjb', 'MALDAH', '2021-04-30', '2021-04-13', NULL, NULL, NULL, '2021-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-04-14', 'B', NULL, NULL, NULL, NULL),
(3, '2', NULL, 'Guard', NULL, 'Drake', 'dutta ka papa', NULL, '2021-04-16', '7050024999', 'ENGLISH BAZZAR MALDA', NULL, NULL, 'OK', 'Yes', 'No', 'Yes', 'bkkjb', 'MALDAH', '2021-04-30', '2021-04-13', NULL, NULL, NULL, '2021-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '60742e054ae64.png', '2021-04-14', 'B', NULL, NULL, NULL, NULL),
(4, '3', NULL, '1', '382154172012', 'Abhinav Roy', 'asdasda', NULL, '2021-07-09', '07903826151', 'laldih ghstshila near panchayat bhawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'P10003', '0', 1, NULL, NULL, '2021-07-08', 'A', 'No', 'Yes', NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004827QHHA', 'P10004', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004827QHHA', 'P10005', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004827QHHA', 'JSRP10006', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004827QHHA', 'JSRP10007', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2', NULL, '1', '382154172020', 'SAm', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004827QHHA', 'JSRP10008', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labour_type`
--

CREATE TABLE `labour_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labour_type`
--

INSERT INTO `labour_type` (`id`, `name`, `created_at`) VALUES
(1, 'GUARD', '2021-07-12 16:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'JAMSHEDPUR');

-- --------------------------------------------------------

--
-- Table structure for table `log_in_log`
--

CREATE TABLE `log_in_log` (
  `id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `user_id` varchar(500) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_in_log`
--

INSERT INTO `log_in_log` (`id`, `table_id`, `user_id`, `date`) VALUES
(1, 1, 'drake0306', '2020-04-04 15:59:40'),
(2, 2, 'demo123', '2020-04-04 16:02:35'),
(3, 2, 'demo123', '2020-04-04 16:03:07'),
(4, 1, 'drake0306', '2020-04-04 16:20:14'),
(5, 1, 'drake0306', '2020-04-04 18:10:58'),
(6, 1, 'drake0306', '2020-04-13 07:47:46'),
(7, 1, 'drake0306', '2020-04-14 08:11:03'),
(8, 1, 'drake0306', '2020-04-14 09:40:02'),
(9, 2, 'demo123', '2020-04-14 10:21:33'),
(10, 1, 'drake0306', '2020-04-14 10:30:00'),
(11, 1, 'drake0306', '2020-04-15 07:53:05'),
(12, 2, 'demo123', '2020-04-15 08:08:50'),
(13, 1, 'drake0306', '2020-04-15 08:09:50'),
(14, 1, 'drake0306', '2020-04-15 08:40:33'),
(15, 2, 'demo123', '2020-04-15 08:45:07'),
(16, 1, 'drake0306', '2020-04-15 08:49:11'),
(17, 2, 'demo123', '2020-04-15 08:58:25'),
(18, 1, 'drake0306', '2020-04-15 09:13:59'),
(19, 1, 'drake0306', '2020-04-16 06:17:12'),
(20, 9, 'drake123456', '2020-04-16 08:55:04'),
(21, 1, 'drake0306', '2020-04-16 09:02:58'),
(22, 10, 'dummy1', '2020-04-16 09:04:45'),
(23, 1, 'drake0306', '2020-04-16 09:09:19'),
(24, 1, 'drake0306', '2020-04-17 04:35:15'),
(25, 2, 'demo123', '2020-04-17 04:40:03'),
(26, 1, 'drake0306', '2020-04-17 07:32:40'),
(27, 1, 'drake0306', '2020-04-17 07:32:52'),
(28, 1, 'drake0306', '2020-04-17 07:36:16'),
(29, 1, 'drake0306', '2020-04-17 07:37:08'),
(30, 2, 'demo123', '2020-04-17 07:38:02'),
(31, 1, 'drake0306', '2020-04-17 07:42:10'),
(32, 1, 'drake0306', '2020-04-17 07:43:35'),
(33, 1, 'drake0306', '2020-04-17 07:44:17'),
(34, 1, 'drake0306', '2020-04-17 07:46:16'),
(35, 1, 'drake0306', '2020-04-17 07:46:17'),
(36, 1, 'drake0306', '2020-04-17 07:47:41'),
(37, 1, 'drake0306', '2020-04-17 07:47:59'),
(38, 1, 'drake0306', '2020-04-17 07:50:07'),
(39, 1, 'drake0306', '2020-04-17 07:54:28'),
(40, 1, 'drake0306', '2020-04-18 12:16:16'),
(41, 1, 'drake0306', '2020-04-19 12:59:20'),
(42, 1, 'admin', '2020-04-19 13:14:34'),
(43, 2, 'demo123', '2020-04-24 19:37:00'),
(44, 1, 'admin', '2020-04-29 13:09:43'),
(45, 1, 'admin', '2020-04-29 13:20:15'),
(46, 1, 'admin', '2020-05-02 17:27:39'),
(47, 1, 'admin', '2020-06-09 05:52:16'),
(48, 1, 'admin', '2020-06-09 14:28:39'),
(49, 1, 'admin', '2020-07-29 12:09:28'),
(50, 1, 'admin', '2020-07-29 12:52:28'),
(51, 1, 'admin', '2020-07-29 14:00:19'),
(52, 1, 'admin', '2020-07-31 13:35:10'),
(53, 1, 'admin', '2020-08-25 06:46:59'),
(54, 1, 'admin', '2020-08-25 06:47:38'),
(55, 1, 'admin', '2020-08-25 15:52:17'),
(56, 1, 'admin', '2020-08-25 16:04:11'),
(57, 1, 'admin', '2020-09-21 11:01:38'),
(58, 1, 'admin', '2020-09-27 14:48:41'),
(59, 1, 'admin', '2021-02-12 10:58:40'),
(60, 1, 'admin', '2021-02-12 10:58:59'),
(61, 1, 'admin', '2021-02-12 11:07:46'),
(62, 1, 'admin', '2021-02-25 10:54:04'),
(63, 1, 'admin', '2021-03-02 10:58:54'),
(64, 1, 'admin', '2021-03-05 11:12:48'),
(65, 1, 'admin', '2021-03-06 11:14:02'),
(66, 1, 'admin', '2021-03-07 11:20:00'),
(67, 1, 'admin', '2021-03-07 12:16:33'),
(68, 1, 'admin', '2021-03-11 10:48:44'),
(69, 1, 'admin', '2021-03-12 12:49:43'),
(70, 1, 'admin', '2021-03-12 12:53:14'),
(71, 1, 'admin', '2021-03-15 10:52:52'),
(72, 1, 'admin', '2021-03-15 10:52:52'),
(73, 1, 'admin', '2021-03-16 11:11:55'),
(74, 1, 'admin', '2021-03-18 12:05:21'),
(75, 1, 'admin', '2021-03-20 11:12:29'),
(76, 1, 'admin', '2021-03-20 11:52:13'),
(77, 1, 'admin', '2021-03-20 12:58:37'),
(78, 1, 'admin', '2021-03-20 17:43:49'),
(79, 1, 'admin', '2021-03-22 11:15:14'),
(80, 1, 'admin', '2021-03-24 11:34:48'),
(81, 1, 'admin', '2021-03-26 04:32:50'),
(82, 1, 'admin', '2021-03-31 06:16:17'),
(83, 1, 'admin', '2021-04-01 11:46:47'),
(84, 1, 'admin', '2021-04-02 05:05:56'),
(85, 1, 'admin', '2021-04-03 04:05:26'),
(86, 1, 'admin', '2021-04-07 04:07:14'),
(87, 1, 'admin', '2021-04-09 10:24:06'),
(88, 1, 'admin', '2021-04-09 12:05:03'),
(89, 1, 'admin', '2021-04-12 10:28:12'),
(90, 1, 'admin', '2021-07-12 16:14:23'),
(91, 1, 'admin', '2021-07-12 16:47:01'),
(92, 1, 'admin', '2021-07-12 17:17:12'),
(93, 1, 'admin', '2021-07-12 17:31:27'),
(94, 1, 'admin', '2021-07-12 17:44:16'),
(95, 1, 'admin', '2021-07-12 17:49:25'),
(96, 1, 'admin', '2021-07-12 17:49:43'),
(97, 1, 'admin', '2021-07-12 17:50:11'),
(98, 16, 'sam0306', '2021-07-12 17:51:22'),
(99, 1, 'admin', '2021-07-12 17:51:34'),
(100, 16, 'guard0306', '2021-07-12 17:51:57'),
(101, 1, 'admin', '2021-07-12 17:52:08'),
(102, 17, 'head0306', '2021-07-12 17:52:39'),
(103, 16, 'guard0306', '2021-07-12 17:53:06'),
(104, 1, 'admin', '2021-07-12 17:54:03'),
(105, 18, 'subhead0306', '2021-07-12 17:54:26'),
(106, 1, 'admin', '2021-07-12 17:55:58'),
(107, 1, 'admin', '2021-07-28 08:20:36'),
(108, 1, 'admin', '2021-07-28 08:21:10'),
(109, 1, 'admin', '2021-07-28 08:24:22'),
(110, 1, 'admin', '2021-07-28 08:52:43'),
(111, 1, 'admin', '2021-07-28 08:55:38'),
(112, 1, 'admin', '2021-07-28 09:03:03'),
(113, 1, 'admin', '2021-07-28 18:37:21'),
(114, 1, 'admin', '2021-08-06 07:10:22'),
(115, 1, 'admin', '2021-08-06 07:11:45'),
(116, 1, 'admin', '2021-08-06 07:18:37'),
(117, 1, 'admin', '2021-08-06 13:01:31'),
(118, 1, 'admin', '2021-08-07 06:03:49'),
(119, 1, 'admin', '2021-08-07 10:24:19'),
(120, 1, 'admin', '2021-08-07 10:40:32'),
(121, 1, 'admin', '2021-08-07 16:45:13'),
(122, 1, 'admin', '2021-08-07 17:02:47'),
(123, 1, 'admin', '2021-08-07 17:12:22'),
(124, 1, 'admin', '2021-08-07 17:20:00'),
(125, 1, 'admin', '2021-09-22 13:26:55'),
(126, 1, 'admin', '2021-09-23 07:39:35'),
(127, 1, 'admin', '2021-09-23 17:06:27'),
(128, 1, 'admin', '2021-09-23 17:07:35'),
(129, 1, 'admin', '2021-09-23 17:10:53'),
(130, 1, 'admin', '2021-09-23 18:34:51'),
(131, 1, 'admin', '2021-09-23 18:36:27'),
(132, 1, 'admin', '2021-09-23 18:49:53'),
(133, 1, 'admin', '2021-09-23 18:55:11'),
(134, 1, 'admin', '2021-09-23 18:56:41'),
(135, 1, 'admin', '2021-09-23 19:07:05'),
(136, 1, 'admin', '2021-09-23 19:08:49'),
(137, 1, 'admin', '2021-09-23 19:09:36'),
(138, 1, 'admin', '2021-09-23 19:11:30'),
(139, 1, 'admin', '2021-09-23 19:12:59'),
(140, 1, 'admin', '2021-09-23 19:15:44'),
(141, 1, 'admin', '2021-09-23 19:53:17'),
(142, 1, 'admin', '2021-09-23 20:02:25'),
(143, 1, 'admin', '2021-09-24 06:45:32'),
(144, 1, 'admin', '2021-09-24 06:49:26'),
(145, 1, 'admin', '2021-09-24 08:35:39'),
(146, 1, 'admin', '2021-09-24 08:38:51'),
(147, 1, 'admin', '2021-09-24 08:45:50'),
(148, 1, 'admin', '2021-09-24 08:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_visit`
--

CREATE TABLE `no_of_visit` (
  `id` int(11) NOT NULL,
  `uid` varchar(500) DEFAULT NULL,
  `visitor_id` varchar(500) DEFAULT NULL,
  `in_or_out` varchar(500) DEFAULT NULL,
  `visit_reason` longtext DEFAULT NULL,
  `company_details` varchar(500) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `company_website` varchar(500) DEFAULT NULL,
  `company_mobile` varchar(500) DEFAULT NULL,
  `whome_to_meet` varchar(500) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `department` varchar(500) DEFAULT NULL,
  `company_email` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `in_out` datetime DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `out_time` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_of_visit`
--

INSERT INTO `no_of_visit` (`id`, `uid`, `visitor_id`, `in_or_out`, `visit_reason`, `company_details`, `company_address`, `company_website`, `company_mobile`, `whome_to_meet`, `details`, `department`, `company_email`, `designation`, `created_at`, `in_out`, `in_time`, `image`, `out_time`) VALUES
(29, '382154172012', '15', NULL, 'work', 'Microsoft', 'laldhi,ghatshila,near panchayat bhavan', 'www', '08084342203', 'Satinal nandlala', 'work', NULL, 'www', 'CEO', '2020-03-24 16:46:09', '0000-00-00 00:00:00', '2020-03-24 04:46:09', '6037827cc9df9.png', NULL),
(31, '382154172012', '15', NULL, 'work', 'Microsoft', 'laldhi,ghatshila,near panchayat bhavan', 'www', '08084342203', 'Satinal nandlala', 'work', NULL, 'www', 'CEO', '2020-03-24 18:09:44', '0000-00-00 00:00:00', '2020-03-24 06:09:44', NULL, NULL),
(32, '382154172012', '15', NULL, 'work', 'Microsoft', 'laldhi,ghatshila,near panchayat bhavan', 'www', '08084342203', 'Satinal nandlala', 'work', NULL, 'www', 'CEO', '2020-03-24 18:10:38', '0000-00-00 00:00:00', '2020-03-24 06:10:38', NULL, NULL),
(33, '247780532648', '16', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1970', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:11:42', '0000-00-00 00:00:00', '2020-03-25 12:11:42', NULL, NULL),
(34, '247780532648', '16', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1970', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:12:23', '0000-00-00 00:00:00', '2020-03-25 12:12:23', NULL, NULL),
(35, '247780532648', '16', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1970', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:15:51', '0000-00-00 00:00:00', '2020-03-25 12:15:51', NULL, NULL),
(36, '247780532648', '16', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1970', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:16:40', '0000-00-00 00:00:00', '2020-03-25 12:16:40', NULL, NULL),
(37, '247780532648', '16', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1970', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:18:21', '0000-00-00 00:00:00', '2020-03-25 12:18:21', '5e7b4d155bc22.png', NULL),
(38, '382154172012', '15', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', '1964', '08084342203', 'Satinal nandlala', 'work', NULL, 'danroy48@gmail.com', 'CEO', '2020-03-25 12:41:12', '0000-00-00 00:00:00', '2020-03-25 12:41:12', '5e7b52289ffbb.png', NULL),
(39, '382154172012', '15', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', NULL, NULL, 'Satinal nandlala', 'work', NULL, NULL, 'CEO', '2020-03-25 12:47:32', '0000-00-00 00:00:00', '2020-03-25 12:47:32', '5e7b59313fc37.png', NULL),
(40, '382154172012', '15', NULL, 'work', '1964', 'LALDIH', NULL, NULL, 'Satinal nandlala', 'work', NULL, NULL, 'CEO', '2020-03-25 16:22:15', '0000-00-00 00:00:00', '2020-03-25 04:22:15', '5e7b954a5e129.png', NULL),
(41, '247780532648', '16', NULL, 'work', '1970', 'LALDIH', NULL, NULL, 'Satinal nandlala', 'work', NULL, NULL, 'CEO', '2020-03-31 07:38:34', '2020-03-31 07:44:35', '2020-03-31 07:38:34', '5e82f386f3285.png', NULL),
(42, '382154172012', '15', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', NULL, NULL, 'Satinal nandlala', 'work', NULL, 'danroy48@hotmail.com', 'CEO', '2020-04-13 08:21:30', '2020-04-13 00:00:00', '2020-04-13 08:21:30', '5e958c70efcfa.png', NULL),
(43, '382154172012', '15', NULL, 'work', '1997', 'laldhi,ghatshila,near panchayat bhavan', NULL, '08084342203', 'Satinal nandlala', 'work', 'CEO Office', 'danroy48@hotmail.com', 'CEO', '2020-04-13 08:27:33', '2020-04-13 00:00:00', '2020-04-13 08:27:33', '5e958b46915f5.png', NULL),
(44, '382154172012', '15', NULL, 'work for home info', 'FORD', 'laldhi,ghatshila,near panchayat bhavan', 'www.lication.com', '08084342203', 'Sam', 'work for home info', 'head of department of motors', 'famestar0306@gmail.com', 'cheaf exiutive', '2020-04-14 10:54:55', '0000-00-00 00:00:00', '2020-04-14 10:54:55', '5e959c560a8c5.png', NULL),
(45, 'asjhdgjhasjhags', '17', NULL, 'sajhjdh', 'asjhdgjahd', 'ahsjdgjha', 'ajhgjhsd', 'dajhsg', 'jhgajhsd', 'sajhjdh', 'ajhdsjhd', 'dajshsjhda', 'dajhsgdjha', '2021-02-12 10:59:45', NULL, '2021-02-12 10:59:45', '60265fa97ad1b.png', NULL),
(46, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 11:45:24', NULL, '2021-03-20 11:45:24', NULL, NULL),
(47, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 11:45:54', NULL, '2021-03-20 11:45:54', NULL, NULL),
(48, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 11:50:19', NULL, '2021-03-20 11:50:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `party_master`
--

CREATE TABLE `party_master` (
  `id` int(11) NOT NULL,
  `party_type` varchar(20) DEFAULT NULL,
  `sap_code` varchar(20) DEFAULT NULL,
  `party_name` varchar(100) DEFAULT NULL,
  `party_address` varchar(240) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `location_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party_master`
--

INSERT INTO `party_master` (`id`, `party_type`, `sap_code`, `party_name`, `party_address`, `phone`, `email`, `location_code`) VALUES
(1, 'Contractor', '10113735', 'COMSYSIT', '507 SUPRITA APARMENT PLOT - 20 , SECTOR 10 DWARKA NEW DELHI 110075', '9212450030', 'comsys@mail.com', '101'),
(2, 'Contractor', '11011413', 'DAKSHIN DINAJPUR FUELS', 'NADIA', '1', 'comsys@mail.com', '101'),
(3, 'Transporter', '11010866', 'NORTH  BENGAL STATE TRANSPORT CORP', 'GHATSILA', '6207659052', 'prabal.biswas@comsysit.in', '101'),
(4, 'Contractor', '11011398', 'RAMESHWAR PRASAD', 'TATANAGAR', '3', 'comsys@mail.com', '101'),
(5, 'Contractor', '11940297', 'SANKARLAL AGARWAL', 'DWARIKA', '6207659052', 'comsys@mail.com', '101');

-- --------------------------------------------------------

--
-- Table structure for table `party_wise_tt`
--

CREATE TABLE `party_wise_tt` (
  `id` int(11) NOT NULL,
  `sap_code` varchar(20) DEFAULT NULL,
  `truck_no` varchar(50) DEFAULT NULL,
  `calibration_date` date DEFAULT NULL,
  `green_card` varchar(5) DEFAULT NULL,
  `gc_valid_form` date DEFAULT NULL,
  `gc_valid_to` date DEFAULT NULL,
  `location_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party_wise_tt`
--

INSERT INTO `party_wise_tt` (`id`, `sap_code`, `truck_no`, `calibration_date`, `green_card`, `gc_valid_form`, `gc_valid_to`, `location_code`) VALUES
(1, '11011413', 'WB61A7070', '2021-04-09', 'Yes', '2021-04-09', '2021-04-09', '101'),
(2, '11011398', 'WB61A7070', '2021-04-09', 'Yes', '2021-04-09', '2021-04-09', '101'),
(3, '11011398', 'WB61A7070', '2021-04-09', 'Yes', '2021-04-09', '2021-04-09', '101'),
(4, '11010866', 'WB633653', '2021-04-09', 'Yes', '2021-04-09', '2021-04-09', '101');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `role_name` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `edit_in_out` int(11) DEFAULT NULL,
  `read_in_out` int(11) DEFAULT NULL,
  `delete_in_out` int(11) DEFAULT NULL,
  `read_visitor` int(11) DEFAULT NULL,
  `edit_visitor` int(11) DEFAULT NULL,
  `delete_visitor` int(11) DEFAULT NULL,
  `in_entry` int(11) DEFAULT NULL,
  `out_entry` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `role_name`, `role_id`, `user_id`, `edit_in_out`, `read_in_out`, `delete_in_out`, `read_visitor`, `edit_visitor`, `delete_visitor`, `in_entry`, `out_entry`, `created_at`) VALUES
(1, 'Admin', 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-04-13 18:30:00'),
(2, '', 0, 2, 0, 1, 0, 1, 0, 0, 1, 0, '2020-04-13 18:30:00'),
(3, '', 0, 9, 0, 0, 0, 1, 1, 0, 1, 1, '2020-04-16 08:54:31'),
(4, '', 0, 10, 1, 1, 0, 0, 0, 0, 1, 1, '2020-04-16 09:04:22'),
(5, '', 0, 11, 1, 1, 0, 1, 0, 0, 1, 1, '2020-04-29 13:14:25'),
(6, '', 0, 12, 1, 1, 0, 1, 0, 0, 1, 1, '2021-07-12 16:50:27'),
(7, 'sub head', 9, 13, 0, 0, 0, 1, 1, 0, 1, 1, '2021-07-12 17:01:45'),
(8, 'head', 7, 14, 1, 1, 0, 1, 0, 0, 1, 1, '2021-07-12 17:05:09'),
(9, 'sub head', 9, 15, 0, 0, 0, 1, 1, 0, 1, 1, '2021-07-12 17:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE `profile_master` (
  `profile_code` bigint(20) NOT NULL,
  `profile_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `truck_data`
--

CREATE TABLE `truck_data` (
  `id` int(11) NOT NULL,
  `party` varchar(250) DEFAULT NULL,
  `truck_no` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `adhar_no` varchar(250) DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `fathers_name` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `yob` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `house` varchar(250) DEFAULT NULL,
  `dl_no` varchar(250) DEFAULT NULL,
  `issueing_rto` varchar(250) DEFAULT NULL,
  `eye_sight` varchar(250) DEFAULT NULL,
  `from_j` varchar(250) DEFAULT NULL,
  `from_h` varchar(250) DEFAULT NULL,
  `police_verification` varchar(250) DEFAULT NULL,
  `ref` varchar(250) DEFAULT NULL,
  `police_station` varchar(250) DEFAULT NULL,
  `valid_from` varchar(250) DEFAULT NULL,
  `valid_to` varchar(250) DEFAULT NULL,
  `valid_from_training` varchar(250) DEFAULT NULL,
  `valid_to_training` varchar(250) DEFAULT NULL,
  `upload_documents` varchar(250) DEFAULT NULL,
  `issue_date` varchar(250) DEFAULT NULL,
  `insuranse_rs_1` varchar(250) DEFAULT NULL,
  `insuranse_rs_2` varchar(250) DEFAULT NULL,
  `nominee` varchar(250) DEFAULT NULL,
  `bank_account` varchar(250) DEFAULT NULL,
  `hiv_test` varchar(250) DEFAULT NULL,
  `fitness_test` varchar(250) DEFAULT NULL,
  `created_date` varchar(250) DEFAULT NULL,
  `create_user` varchar(250) DEFAULT NULL,
  `attach_document` varchar(250) DEFAULT NULL,
  `location_code` varchar(250) DEFAULT NULL,
  `card_number` varchar(250) DEFAULT NULL,
  `temp` varchar(250) DEFAULT NULL,
  `process_stage` int(11) DEFAULT NULL,
  `hg_training` varchar(250) DEFAULT NULL,
  `upload_photo_documents` varchar(250) DEFAULT NULL,
  `valid_up_to` varchar(250) DEFAULT NULL,
  `blood_group` varchar(250) DEFAULT NULL,
  `insurance_twelve_rupee` varchar(250) DEFAULT NULL,
  `insurance_three_thirty_rupee` varchar(250) DEFAULT NULL,
  `nominee_name` varchar(250) DEFAULT NULL,
  `bank_ac` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck_data`
--

INSERT INTO `truck_data` (`id`, `party`, `truck_no`, `type`, `adhar_no`, `full_name`, `fathers_name`, `gender`, `yob`, `mobile`, `house`, `dl_no`, `issueing_rto`, `eye_sight`, `from_j`, `from_h`, `police_verification`, `ref`, `police_station`, `valid_from`, `valid_to`, `valid_from_training`, `valid_to_training`, `upload_documents`, `issue_date`, `insuranse_rs_1`, `insuranse_rs_2`, `nominee`, `bank_account`, `hiv_test`, `fitness_test`, `created_date`, `create_user`, `attach_document`, `location_code`, `card_number`, `temp`, `process_stage`, `hg_training`, `upload_photo_documents`, `valid_up_to`, `blood_group`, `insurance_twelve_rupee`, `insurance_three_thirty_rupee`, `nominee_name`, `bank_ac`) VALUES
(1, '11010866', '4', 'Driver', '600140023262', 'ASHOK SHIT', 'AMIT SHIT', NULL, '1976-12-12', NULL, 'ENGLISH BAZZAR MALDA', '234579/1999', 'MALDAH', 'OK', 'Yes', 'No', 'Yes', '20/207', 'MALDAH', '2021-04-09', '2021-10-10', NULL, NULL, NULL, '1999-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'JAMP10000', '0', 2, 'No', '6070476a854d7.png', NULL, 'A', 'Yes', 'No', 'NAMITA SHIT', '1123445678903'),
(2, '11011413', '1', 'Helper', '382154172012', 'Abhinav Roy', 'Dan Sam', NULL, NULL, '07903826151', 'laldih ghstshila near panchayat bhawan', 'JH052626A', 'ONE', 'OK', 'Yes', 'No', 'Yes', '1156A', 'JSR', '2021-07-08', '2021-07-10', '2021-07-22', '2021-07-30', '1632473365.pdf', '2021-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'JAMP10001', '0', 2, 'Yes', '60ec6bac06bee.png', '2021-07-07', 'B', 'Yes', 'Yes', 'James', '2134324523545'),
(3, '11011413', '1', 'Driver', '123445679000', 'Amit Sardar', 'Vikash Sardar', NULL, '1997-07-08', '9998007600', 'Raiganj', 'WBDL3456', 'Raiganj', 'OK', 'Yes', 'Yes', 'Yes', '2267890', 'Raiganj', '2021-07-28', '2021-12-28', NULL, NULL, NULL, '2020-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10002', '0', 2, 'No', '1627463292.jpg', '2021-09-28', 'A', 'Yes', 'Yes', 'Meena', '235690080'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10003', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '10113735', NULL, 'Driver', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10004', '0', 2, NULL, '1628255059.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '11011398', '2', 'Driver', '5455525663454', 'RAJESH', 'SURESG', NULL, '1975-08-12', '9504956934', 'DWARKA', '566556', 'PANIPAT', NULL, 'Yes', 'Yes', 'Yes', 'T5454', 'PANIPAT', '2021-08-07', '2021-11-12', '2021-08-07', '2021-10-23', NULL, '1989-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10005', '0', 2, 'Yes', '1628316622.jpg', NULL, 'A', 'Yes', 'Yes', 'SUNUTA', NULL),
(7, NULL, NULL, NULL, '38215417201123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10006', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10007', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10008', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '11011413', '1', 'Driver', '382154172012', 'Abhinav Roy', 'asdasda', NULL, '2021-08-01', '07903826151', 'laldih ghstshila near panchayat bhawan', 'JH052626A', NULL, NULL, NULL, NULL, NULL, '1156A', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10009', '0', 1, NULL, NULL, '2021-08-13', 'O', NULL, NULL, 'James', NULL),
(11, '11011413', '1', 'Driver', '123456789023', 'Malfoy', NULL, NULL, '2021-09-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '004827QHHA', 'JSRP10010', '0', 2, NULL, '1632473280.png', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `edit_in_out` int(11) DEFAULT 0,
  `read_in_out` int(11) DEFAULT 0,
  `delete_in_out` int(11) DEFAULT 0,
  `read_visitor` int(11) DEFAULT 0,
  `edit_visitor` int(11) DEFAULT 0,
  `delete_visitor` int(11) DEFAULT 0,
  `in_entry` int(11) DEFAULT 0,
  `out_entry` int(11) DEFAULT 0,
  `updatet_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `edit_in_out`, `read_in_out`, `delete_in_out`, `read_visitor`, `edit_visitor`, `delete_visitor`, `in_entry`, `out_entry`, `updatet_at`, `created_at`) VALUES
(6, 'Guard', 1, 1, 0, 1, 1, 0, 1, 1, NULL, '2020-04-16 07:34:20'),
(7, 'head', 1, 1, 0, 1, 0, 0, 1, 1, NULL, '2020-04-16 07:34:46'),
(9, 'sub head', 0, 0, 0, 1, 1, 0, 1, 1, NULL, '2020-04-16 07:36:42'),
(10, 'audit', 1, 1, 0, 0, 0, 0, 1, 1, NULL, '2020-04-16 09:03:52'),
(11, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2020-04-29 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `user_id` longtext DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `user_code` varchar(25) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `location_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `user_id`, `password`, `type`, `user_type`, `user_code`, `cname`, `phone`, `email`, `location_code`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin123', 11, NULL, NULL, NULL, NULL, NULL, '004827QHHA', '0000-00-00 00:00:00'),
(16, 'Sam Ual', 'guard0306', 'Abhinav6', 6, NULL, NULL, NULL, NULL, NULL, 'JSR', '2021-07-12 17:51:17'),
(17, 'Head', 'head0306', 'Abhinav6', 7, NULL, NULL, NULL, NULL, NULL, 'JSR', '2021-07-12 17:52:30'),
(18, 'subhead', 'subhead0306', 'Abhinav6', 9, NULL, NULL, NULL, NULL, NULL, 'JSR', '2021-07-12 17:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `uid` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `gender` varchar(256) DEFAULT NULL,
  `yob` date DEFAULT NULL,
  `co` varchar(500) DEFAULT NULL,
  `house` varchar(500) DEFAULT NULL,
  `street` varchar(500) DEFAULT NULL,
  `lm` longtext DEFAULT NULL,
  `vtc` varchar(500) DEFAULT NULL,
  `po` varchar(500) DEFAULT NULL,
  `dist` varchar(500) DEFAULT NULL,
  `state` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `company_details` varchar(500) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `company_website` varchar(500) DEFAULT NULL,
  `company_email` varchar(500) DEFAULT NULL,
  `company_mobile` varchar(500) DEFAULT NULL,
  `whome_to_meet` varchar(500) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `department` varchar(500) DEFAULT NULL,
  `pc` varchar(500) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `uid`, `name`, `gender`, `yob`, `co`, `house`, `street`, `lm`, `vtc`, `po`, `dist`, `state`, `mobile_no`, `email`, `company_details`, `company_address`, `designation`, `company_website`, `company_email`, `company_mobile`, `whome_to_meet`, `details`, `department`, `pc`, `created_date`) VALUES
(15, '382154172012', 'Abhinav Roy', 'M', '1997-09-30', NULL, '116 GOURI VILLA LALDIH NEAR PANCHAYAT BHAWAN Ghatshila Purbi Singhbhum Jharkhand', NULL, NULL, NULL, NULL, NULL, NULL, '7903826151', 'danroy48@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-24 16:46:09'),
(16, '247780532648', 'Purnima Roy', 'F', '1667-09-09', NULL, 'LALDIH', NULL, NULL, NULL, NULL, NULL, NULL, '7903826151', 'donaroy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-25 12:11:42'),
(17, 'asjhdgjhasjhags', 'asjhdjahs', 'M', '1970-01-01', NULL, 'jhagdsjhga', NULL, NULL, NULL, NULL, NULL, NULL, 'jhasdj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-12 10:59:45'),
(18, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 11:45:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_data`
--
ALTER TABLE `labour_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_type`
--
ALTER TABLE `labour_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_in_log`
--
ALTER TABLE `log_in_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_of_visit`
--
ALTER TABLE `no_of_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_master`
--
ALTER TABLE `party_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_wise_tt`
--
ALTER TABLE `party_wise_tt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD PRIMARY KEY (`profile_code`);

--
-- Indexes for table `truck_data`
--
ALTER TABLE `truck_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labour_data`
--
ALTER TABLE `labour_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `labour_type`
--
ALTER TABLE `labour_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_in_log`
--
ALTER TABLE `log_in_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `no_of_visit`
--
ALTER TABLE `no_of_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `party_master`
--
ALTER TABLE `party_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `party_wise_tt`
--
ALTER TABLE `party_wise_tt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `profile_code` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_data`
--
ALTER TABLE `truck_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
