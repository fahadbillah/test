-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2013 at 08:47 PM
-- Server version: 5.5.30-30.2
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zulkerv8_task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_scm_to_office`
--

CREATE TABLE IF NOT EXISTS `acc_scm_to_office` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `location_id` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `acc_scm_to_office`
--

INSERT INTO `acc_scm_to_office` (`id`, `user_id`, `location_id`, `date_added`) VALUES
(1, 13, '60011', '2013-06-09 21:41:22'),
(2, 13, '60012', '2013-06-09 22:04:32'),
(3, 10, '60012', '2013-06-09 22:32:54'),
(4, 9, '60011', '2013-06-09 22:33:14'),
(5, 9, '60012', '2013-06-09 22:33:27'),
(6, 9, '60022', '2013-06-27 08:02:34'),
(7, 9, '60021', '2013-06-27 08:03:01'),
(8, 17, '60022', '2013-06-27 08:13:45'),
(9, 17, '60021', '2013-06-27 08:14:07'),
(10, 20, '60031', '2013-06-27 10:53:57'),
(11, 20, '60032', '2013-06-27 10:54:08'),
(12, 9, '60031', '2013-06-27 10:54:26'),
(13, 9, '60032', '2013-06-27 10:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `relation_to_req` varchar(100) NOT NULL,
  `req_id` int(100) NOT NULL,
  `activities` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `relation_to_req`, `req_id`, `activities`, `status`, `date`) VALUES
(1, 6, 'Raiser', 106, 'requisition raised,06-06-2013 17:47:05|Received,06-06-2013 17:57:04', 'Received', '2013-06-06 11:57:04'),
(2, 11, 'Boss', 106, 'admin added,06-06-2013 17:50:03|Approved,06-06-2013 17:54:05', 'Approved', '2013-06-06 11:54:05'),
(3, 10, 'Accountant', 106, 'accountant added,06-06-2013 17:54:05|Document Received,06-06-2013 18:00:23|Closed,06-06-2013 18:00:31', 'Closed', '2013-06-06 12:00:31'),
(4, 9, 'SCM', 106, 'scm added,06-06-2013 17:54:05|Delivered,06-06-2013 17:56:14|Document Delivered,06-06-2013 18:00:04', 'Document Delivered', '2013-06-06 12:00:04'),
(5, 6, 'Raiser', 107, 'requisition raised,08-06-2013 02:58:39', 'New', '2013-06-07 20:58:39'),
(6, 10, 'Boss', 107, 'admin added,08-06-2013 04:04:38', 'New', '2013-06-07 22:04:38'),
(7, 6, 'Raiser', 108, 'requisition raised,08-06-2013 04:34:47|Partially Received,08-06-2013 05:35:09|Received,08-06-2013 05:54:58', 'Received', '2013-06-07 23:54:58'),
(8, 11, 'Boss', 108, 'admin added,08-06-2013 04:35:31|Approved,08-06-2013 04:41:11', 'Approved', '2013-06-07 22:41:11'),
(9, 10, 'Accountant', 108, 'accountant added,08-06-2013 04:41:11|Document Received,08-06-2013 06:13:20|Closed,08-06-2013 06:31:52', 'Closed', '2013-06-08 00:31:52'),
(10, 9, 'SCM', 108, 'scm added,08-06-2013 04:41:11|Partially Delivered,08-06-2013 04:46:18|Delivered,08-06-2013 05:54:26|Document Delivered,08-06-2013 06:12:49', 'Document Delivered', '2013-06-08 00:12:49'),
(11, 6, 'Raiser', 109, 'requisition raised,08-06-2013 16:53:18|Received,08-06-2013 17:09:13', 'Received', '2013-06-08 11:09:13'),
(12, 11, 'Boss', 109, 'admin added,08-06-2013 16:59:13|Approved,08-06-2013 16:59:40', 'Approved', '2013-06-08 10:59:40'),
(13, 10, 'Accountant', 109, 'accountant added,08-06-2013 16:59:40|Document Received,08-06-2013 17:11:11|Closed,08-06-2013 17:11:31', 'Closed', '2013-06-08 11:11:31'),
(14, 9, 'SCM', 109, 'scm added,08-06-2013 16:59:40|Delivered,08-06-2013 17:06:39|Document Delivered,08-06-2013 17:10:06', 'Document Delivered', '2013-06-08 11:10:06'),
(15, 6, 'Raiser', 110, 'requisition raised,09-06-2013 16:39:38|Received,09-06-2013 16:57:58', 'Received', '2013-06-09 10:57:58'),
(16, 11, 'Boss', 110, 'admin added,09-06-2013 16:44:30|Approved,09-06-2013 16:46:53', 'Approved', '2013-06-09 10:46:53'),
(17, 10, 'Accountant', 110, 'accountant added,09-06-2013 16:46:53|Document Received,09-06-2013 17:05:35|Closed,09-06-2013 17:06:45', 'Closed', '2013-06-09 11:06:45'),
(18, 9, 'SCM', 110, 'scm added,09-06-2013 16:46:53|Delivered,09-06-2013 16:55:38|Document Delivered,09-06-2013 17:02:32', 'Document Delivered', '2013-06-09 11:02:32'),
(19, 6, 'Raiser', 111, 'requisition raised,10-06-2013 04:10:15', 'New', '2013-06-09 22:10:15'),
(20, 0, 'Boss', 111, 'admin added,10-06-2013 04:12:11', 'New', '2013-06-09 22:12:11'),
(21, 6, 'Raiser', 112, 'requisition raised,10-06-2013 04:15:15', 'New', '2013-06-09 22:15:15'),
(22, 11, 'Boss', 112, 'admin added,10-06-2013 04:15:42|Approved,10-06-2013 04:16:18', 'Approved', '2013-06-09 22:16:18'),
(23, 0, 'Accountant', 112, 'accountant added,10-06-2013 04:16:18', 'Approved', '2013-06-09 22:16:18'),
(24, 9, 'SCM', 112, 'scm added,10-06-2013 04:16:18', 'Approved', '2013-06-09 22:16:18'),
(25, 6, 'Raiser', 113, 'requisition raised,10-06-2013 04:34:42', 'New', '2013-06-09 22:34:42'),
(26, 11, 'Boss', 113, 'admin added,10-06-2013 04:34:55|Approved,10-06-2013 04:35:53', 'Approved', '2013-06-09 22:35:53'),
(27, 0, 'Accountant', 113, 'accountant added,10-06-2013 04:35:53', 'Approved', '2013-06-09 22:35:53'),
(28, 9, 'SCM', 113, 'scm added,10-06-2013 04:35:53|Delivered,10-06-2013 04:36:33', 'Delivered', '2013-06-09 22:36:33'),
(29, 6, 'Raiser', 114, 'requisition raised,10-06-2013 05:01:24', 'New', '2013-06-09 23:01:24'),
(30, 11, 'Boss', 114, 'admin added,10-06-2013 05:01:46|Approved,10-06-2013 05:02:24', 'Approved', '2013-06-09 23:02:24'),
(31, 0, 'Accountant', 114, 'accountant added,10-06-2013 05:02:24', 'Approved', '2013-06-09 23:02:24'),
(32, 9, 'SCM', 114, 'scm added,10-06-2013 05:02:24', 'Approved', '2013-06-09 23:02:24'),
(33, 6, 'Raiser', 115, 'requisition raised,10-06-2013 05:19:51|Received,10-06-2013 05:42:17', 'Received', '2013-06-09 23:42:17'),
(34, 11, 'Boss', 115, 'admin added,10-06-2013 05:21:49|Approved,10-06-2013 05:22:41', 'Approved', '2013-06-09 23:22:41'),
(35, 10, 'Accountant', 115, 'accountant added,10-06-2013 05:22:41|Document Received,10-06-2013 05:43:23|Closed,10-06-2013 05:43:31', 'Closed', '2013-06-09 23:43:31'),
(36, 9, 'SCM', 115, 'scm added,10-06-2013 05:22:41|Delivered,10-06-2013 05:41:55|Document Delivered,10-06-2013 05:43:07', 'Document Delivered', '2013-06-09 23:43:07'),
(37, 6, 'Raiser', 116, 'requisition raised,10-06-2013 15:49:08', 'New', '2013-06-10 09:49:08'),
(38, 11, 'Boss', 116, 'admin added,10-06-2013 15:51:49|Approved,10-06-2013 15:52:16', 'Approved', '2013-06-10 09:52:16'),
(39, 10, 'Accountant', 116, 'accountant added,10-06-2013 15:52:16', 'Approved', '2013-06-10 09:52:16'),
(40, 9, 'SCM', 116, 'scm added,10-06-2013 15:52:16', 'Approved', '2013-06-10 09:52:16'),
(41, 6, 'Raiser', 117, 'requisition raised,17-06-2013 22:28:03', 'New', '2013-06-17 16:28:03'),
(42, 6, 'Raiser', 118, 'requisition raised,25-06-2013 17:14:59', 'New', '2013-06-25 11:14:59'),
(43, 6, 'Raiser', 119, 'requisition raised,25-06-2013 19:20:55', 'New', '2013-06-25 13:20:55'),
(44, 6, 'Raiser', 120, 'requisition raised,26-06-2013 19:19:43', 'New', '2013-06-26 13:19:43'),
(45, 11, 'Boss', 120, 'admin added,26-06-2013 20:01:53|Reject,26-06-2013 20:14:07', 'Reject', '2013-06-26 14:14:07'),
(46, 15, 'Boss', 121, 'admin added,27-06-2013 05:57:45', 'New', '2013-06-26 23:57:45'),
(47, 15, 'Raiser', 121, 'requisition raised,27-06-2013 05:57:45', 'New', '2013-06-26 23:57:45'),
(48, 15, 'Boss', 122, 'admin added,27-06-2013 13:49:15|View,27-06-2013 13:56:38', 'View', '2013-06-27 07:56:38'),
(49, 16, 'Raiser', 122, 'requisition raised,27-06-2013 13:49:15|Received,27-06-2013 14:42:22', 'Received', '2013-06-27 08:42:22'),
(50, 11, 'Boss', 122, 'admin added,27-06-2013 13:58:12|Approved,27-06-2013 14:25:37', 'Approved', '2013-06-27 08:25:37'),
(51, 17, 'Accountant', 122, 'accountant added,27-06-2013 14:25:37|Document Received,27-06-2013 14:46:20|Closed,27-06-2013 14:46:27', 'Closed', '2013-06-27 08:46:27'),
(52, 9, 'SCM', 122, 'scm added,27-06-2013 14:25:37|Delivered,27-06-2013 14:33:42|Document Delivered,27-06-2013 14:46:03', 'Document Delivered', '2013-06-27 08:46:03'),
(53, 18, 'Boss', 123, 'admin added,27-06-2013 17:04:24|Approved,27-06-2013 17:05:53', 'Approved', '2013-06-27 11:05:54'),
(54, 19, 'Raiser', 123, 'requisition raised,27-06-2013 17:04:24', 'New', '2013-06-27 11:04:24'),
(55, 0, 'Accountant', 123, 'accountant added,27-06-2013 17:05:53', 'Approved', '2013-06-27 11:05:53'),
(56, 0, 'SCM', 123, 'scm added,27-06-2013 17:05:53', 'Approved', '2013-06-27 11:05:53'),
(57, 18, 'Boss', 124, 'admin added,27-06-2013 17:15:07|View,27-06-2013 17:15:32', 'View', '2013-06-27 11:15:32'),
(58, 19, 'Raiser', 124, 'requisition raised,27-06-2013 17:15:07|Received,27-06-2013 17:26:40', 'Received', '2013-06-27 11:26:40'),
(59, 18, 'Boss', 125, 'admin added,27-06-2013 17:16:26', 'New', '2013-06-27 11:16:26'),
(60, 19, 'Raiser', 125, 'requisition raised,27-06-2013 17:16:26', 'New', '2013-06-27 11:16:26'),
(61, 11, 'Boss', 124, 'admin added,27-06-2013 17:21:24|Approved,27-06-2013 17:22:07', 'Approved', '2013-06-27 11:22:07'),
(62, 20, 'Accountant', 124, 'accountant added,27-06-2013 17:22:07|Document Received,27-06-2013 17:29:33|Closed,27-06-2013 17:30:04', 'Closed', '2013-06-27 11:30:04'),
(63, 9, 'SCM', 124, 'scm added,27-06-2013 17:22:07|Delivered,27-06-2013 17:25:07|Document Delivered,27-06-2013 17:28:19', 'Document Delivered', '2013-06-27 11:28:20'),
(64, 18, 'Boss', 126, 'admin added,28-06-2013 09:21:49', 'New', '2013-06-28 03:21:49'),
(65, 19, 'Raiser', 126, 'requisition raised,28-06-2013 09:21:49', 'New', '2013-06-28 03:21:49'),
(66, 18, 'Boss', 127, 'admin added,29-06-2013 14:06:54|View,29-06-2013 22:36:16', 'View', '2013-06-29 16:36:16'),
(67, 19, 'Raiser', 127, 'requisition raised,29-06-2013 14:06:54', 'New', '2013-06-29 08:06:54'),
(68, 18, 'Boss', 128, 'admin added,29-06-2013 14:15:01|View,29-06-2013 22:35:20', 'View', '2013-06-29 16:35:20'),
(69, 19, 'Raiser', 128, 'requisition raised,29-06-2013 14:15:01', 'New', '2013-06-29 08:15:01'),
(70, 18, 'Boss', 129, 'admin added,29-06-2013 21:55:17|View,29-06-2013 22:33:28', 'View', '2013-06-29 16:33:28'),
(71, 19, 'Raiser', 129, 'requisition raised,29-06-2013 21:55:17', 'New', '2013-06-29 15:55:17'),
(72, 11, 'Boss', 127, 'admin added,30-06-2013 18:42:44|Approved,03-07-2013 14:22:30', 'Approved', '2013-07-03 08:22:30'),
(73, 11, 'Boss', 128, 'admin added,30-06-2013 18:44:53|Reject,03-07-2013 14:24:31', 'Reject', '2013-07-03 08:24:31'),
(74, 11, 'Boss', 129, 'admin added,30-06-2013 18:45:43|Approved,01-07-2013 14:58:19', 'Approved', '2013-07-01 08:58:19'),
(75, 20, 'Accountant', 129, 'accountant added,01-07-2013 14:58:19', 'Approved', '2013-07-01 08:58:19'),
(76, 9, 'SCM', 129, 'scm added,01-07-2013 14:58:19', 'Approved', '2013-07-01 08:58:19'),
(77, 20, 'Accountant', 127, 'accountant added,03-07-2013 14:22:30', 'Approved', '2013-07-03 08:22:30'),
(78, 9, 'SCM', 127, 'scm added,03-07-2013 14:22:30', 'Approved', '2013-07-03 08:22:30'),
(79, 18, 'Boss', 130, 'admin added,06-07-2013 08:57:03|View,06-07-2013 09:38:33', 'View', '2013-07-06 03:38:33'),
(80, 19, 'Raiser', 130, 'requisition raised,06-07-2013 08:57:03', 'New', '2013-07-06 02:57:04'),
(81, 18, 'Boss', 131, 'admin added,06-07-2013 09:12:24|View,06-07-2013 09:39:38', 'View', '2013-07-06 03:39:38'),
(82, 19, 'Raiser', 131, 'requisition raised,06-07-2013 09:12:24', 'New', '2013-07-06 03:12:24'),
(83, 18, 'Boss', 132, 'admin added,06-07-2013 09:18:24|View,06-07-2013 09:37:27', 'View', '2013-07-06 03:37:27'),
(84, 19, 'Raiser', 132, 'requisition raised,06-07-2013 09:18:24', 'New', '2013-07-06 03:18:24'),
(85, 18, 'Boss', 133, 'admin added,06-07-2013 09:24:02|View,06-07-2013 09:36:25', 'View', '2013-07-06 03:36:25'),
(86, 19, 'Raiser', 133, 'requisition raised,06-07-2013 09:24:02', 'New', '2013-07-06 03:24:02'),
(87, 18, 'Boss', 134, 'admin added,06-07-2013 09:34:19|View,06-07-2013 09:35:30', 'View', '2013-07-06 03:35:30'),
(88, 19, 'Raiser', 134, 'requisition raised,06-07-2013 09:34:19', 'New', '2013-07-06 03:34:19'),
(89, 11, 'Boss', 130, 'admin added,07-07-2013 14:31:41|Approved,10-07-2013 14:01:33', 'Approved', '2013-07-10 08:01:33'),
(90, 23, 'Boss', 131, 'admin added,07-07-2013 14:32:09|Approved,08-07-2013 01:12:06', 'Approved', '2013-07-07 19:12:06'),
(91, 11, 'Boss', 132, 'admin added,07-07-2013 14:33:27|Approved,10-07-2013 13:58:06', 'Approved', '2013-07-10 07:58:06'),
(92, 11, 'Boss', 133, 'admin added,07-07-2013 14:35:11|Approved,10-07-2013 14:01:53', 'Approved', '2013-07-10 08:01:53'),
(93, 23, 'Boss', 134, 'admin added,07-07-2013 14:38:18|Approved,08-07-2013 01:09:05', 'Approved', '2013-07-07 19:09:05'),
(94, 20, 'Accountant', 134, 'accountant added,08-07-2013 01:09:05', 'Approved', '2013-07-07 19:09:05'),
(95, 9, 'SCM', 134, 'scm added,08-07-2013 01:09:05', 'Approved', '2013-07-07 19:09:05'),
(96, 20, 'Accountant', 131, 'accountant added,08-07-2013 01:12:06', 'Approved', '2013-07-07 19:12:06'),
(97, 9, 'SCM', 131, 'scm added,08-07-2013 01:12:06', 'Approved', '2013-07-07 19:12:06'),
(98, 6, 'Raiser', 135, 'requisition raised,08-07-2013 02:28:14', 'New', '2013-07-07 20:28:14'),
(99, 25, 'Boss', 135, 'admin added,08-07-2013 02:28:47', 'New', '2013-07-07 20:28:47'),
(100, 6, 'Raiser', 136, 'requisition raised,08-07-2013 02:30:00', 'New', '2013-07-07 20:30:00'),
(101, 25, 'Boss', 136, 'admin added,08-07-2013 02:30:28|Approved,08-07-2013 20:24:08', 'Approved', '2013-07-08 14:24:08'),
(102, 10, 'Accountant', 136, 'accountant added,08-07-2013 20:24:08', 'Approved', '2013-07-08 14:24:08'),
(103, 9, 'SCM', 136, 'scm added,08-07-2013 20:24:08', 'Approved', '2013-07-08 14:24:08'),
(104, 18, 'Boss', 137, 'admin added,09-07-2013 09:19:01|View,12-07-2013 17:13:08', 'View', '2013-07-12 11:13:08'),
(105, 19, 'Raiser', 137, 'requisition raised,09-07-2013 09:19:01', 'New', '2013-07-09 03:19:01'),
(106, 18, 'Boss', 138, 'admin added,09-07-2013 09:27:12|Approved,12-07-2013 17:12:03', 'Approved', '2013-07-12 11:12:03'),
(107, 19, 'Raiser', 138, 'requisition raised,09-07-2013 09:27:12', 'New', '2013-07-09 03:27:13'),
(108, 18, 'Boss', 139, 'admin added,09-07-2013 09:28:50|Approved,16-07-2013 20:46:40', 'Approved', '2013-07-16 14:46:40'),
(109, 19, 'Raiser', 139, 'requisition raised,09-07-2013 09:28:50', 'New', '2013-07-09 03:28:50'),
(110, 20, 'Accountant', 132, 'accountant added,10-07-2013 13:58:06', 'Approved', '2013-07-10 07:58:06'),
(111, 9, 'SCM', 132, 'scm added,10-07-2013 13:58:06', 'Approved', '2013-07-10 07:58:06'),
(112, 20, 'Accountant', 130, 'accountant added,10-07-2013 14:01:33', 'Approved', '2013-07-10 08:01:33'),
(113, 9, 'SCM', 130, 'scm added,10-07-2013 14:01:33', 'Approved', '2013-07-10 08:01:33'),
(114, 20, 'Accountant', 133, 'accountant added,10-07-2013 14:01:53', 'Approved', '2013-07-10 08:01:53'),
(115, 9, 'SCM', 133, 'scm added,10-07-2013 14:01:53', 'Approved', '2013-07-10 08:01:53'),
(116, 18, 'Boss', 140, 'admin added,11-07-2013 15:22:55|View,12-07-2013 17:08:44', 'View', '2013-07-12 11:08:44'),
(117, 19, 'Raiser', 140, 'requisition raised,11-07-2013 15:22:55', 'New', '2013-07-11 09:22:55'),
(118, 0, 'Accountant', 138, 'accountant added,12-07-2013 17:12:03', 'Approved', '2013-07-12 11:12:03'),
(119, 0, 'SCM', 138, 'scm added,12-07-2013 17:12:03', 'Approved', '2013-07-12 11:12:03'),
(120, 11, 'Boss', 137, 'admin added,14-07-2013 16:36:29', 'New', '2013-07-14 10:36:29'),
(121, 11, 'Boss', 140, 'admin added,14-07-2013 16:37:15', 'New', '2013-07-14 10:37:15'),
(122, 0, 'Accountant', 139, 'accountant added,16-07-2013 20:46:40', 'Approved', '2013-07-16 14:46:40'),
(123, 0, 'SCM', 139, 'scm added,16-07-2013 20:46:40', 'Approved', '2013-07-16 14:46:40'),
(124, 18, 'Boss', 141, 'admin added,24-07-2013 07:52:30', 'New', '2013-07-24 01:52:30'),
(125, 19, 'Raiser', 141, 'requisition raised,24-07-2013 07:52:30', 'New', '2013-07-24 01:52:30'),
(126, 18, 'Boss', 142, 'admin added,24-07-2013 08:04:16', 'New', '2013-07-24 02:04:16'),
(127, 19, 'Raiser', 142, 'requisition raised,24-07-2013 08:04:16', 'New', '2013-07-24 02:04:16'),
(128, 18, 'Boss', 143, 'admin added,24-07-2013 08:38:29', 'New', '2013-07-24 02:38:29'),
(129, 19, 'Raiser', 143, 'requisition raised,24-07-2013 08:38:29', 'New', '2013-07-24 02:38:29'),
(130, 18, 'Boss', 144, 'admin added,24-07-2013 08:51:40|View,26-07-2013 00:09:02', 'View', '2013-07-25 18:09:02'),
(131, 19, 'Raiser', 144, 'requisition raised,24-07-2013 08:51:40', 'New', '2013-07-24 02:51:40'),
(132, 18, 'Boss', 145, 'admin added,24-07-2013 08:59:55|View,26-07-2013 00:08:07', 'View', '2013-07-25 18:08:07'),
(133, 19, 'Raiser', 145, 'requisition raised,24-07-2013 08:59:55', 'New', '2013-07-24 02:59:55'),
(134, 18, 'Boss', 146, 'admin added,24-07-2013 09:09:33|Approved,26-07-2013 00:07:05', 'Approved', '2013-07-25 18:07:05'),
(135, 19, 'Raiser', 146, 'requisition raised,24-07-2013 09:09:33', 'New', '2013-07-24 03:09:33'),
(136, 18, 'Boss', 147, 'admin added,24-07-2013 09:14:02|View,26-07-2013 00:05:50', 'View', '2013-07-25 18:05:50'),
(137, 19, 'Raiser', 147, 'requisition raised,24-07-2013 09:14:02', 'New', '2013-07-24 03:14:02'),
(138, 18, 'Boss', 148, 'admin added,24-07-2013 09:16:38|View,26-07-2013 00:03:47', 'View', '2013-07-25 18:03:47'),
(139, 19, 'Raiser', 148, 'requisition raised,24-07-2013 09:16:38', 'New', '2013-07-24 03:16:38'),
(140, 18, 'Boss', 149, 'admin added,24-07-2013 09:26:16|View,26-07-2013 00:02:52', 'View', '2013-07-25 18:02:52'),
(141, 19, 'Raiser', 149, 'requisition raised,24-07-2013 09:26:16', 'New', '2013-07-24 03:26:16'),
(142, 18, 'Boss', 150, 'admin added,24-07-2013 09:48:22|Approved,26-07-2013 00:01:58', 'Approved', '2013-07-25 18:01:58'),
(143, 19, 'Raiser', 150, 'requisition raised,24-07-2013 09:48:22', 'New', '2013-07-24 03:48:22'),
(144, 18, 'Boss', 151, 'admin added,24-07-2013 09:52:26|View,25-07-2013 23:23:52', 'View', '2013-07-25 17:23:52'),
(145, 19, 'Raiser', 151, 'requisition raised,24-07-2013 09:52:26', 'New', '2013-07-24 03:52:26'),
(146, 18, 'Boss', 152, 'admin added,25-07-2013 14:51:20|View,25-07-2013 23:22:41', 'View', '2013-07-25 17:22:41'),
(147, 19, 'Raiser', 152, 'requisition raised,25-07-2013 14:51:20', 'New', '2013-07-25 08:51:20'),
(148, 18, 'Boss', 153, 'admin added,25-07-2013 14:54:07|View,25-07-2013 23:21:10', 'View', '2013-07-25 17:21:10'),
(149, 19, 'Raiser', 153, 'requisition raised,25-07-2013 14:54:07', 'New', '2013-07-25 08:54:07'),
(150, 0, 'Accountant', 150, 'accountant added,26-07-2013 00:01:58', 'Approved', '2013-07-25 18:01:58'),
(151, 0, 'SCM', 150, 'scm added,26-07-2013 00:01:58', 'Approved', '2013-07-25 18:01:58'),
(152, 0, 'Accountant', 146, 'accountant added,26-07-2013 00:07:05', 'Approved', '2013-07-25 18:07:05'),
(153, 0, 'SCM', 146, 'scm added,26-07-2013 00:07:05', 'Approved', '2013-07-25 18:07:05'),
(154, 18, 'Boss', 154, 'admin added,19-08-2013 08:49:45', 'New', '2013-08-19 02:49:45'),
(155, 19, 'Raiser', 154, 'requisition raised,19-08-2013 08:49:45', 'New', '2013-08-19 02:49:45'),
(156, 18, 'Boss', 155, 'admin added,19-08-2013 09:04:03', 'New', '2013-08-19 03:04:03'),
(157, 19, 'Raiser', 155, 'requisition raised,19-08-2013 09:04:03', 'New', '2013-08-19 03:04:03'),
(158, 18, 'Boss', 156, 'admin added,19-08-2013 09:26:26', 'New', '2013-08-19 03:26:26'),
(159, 19, 'Raiser', 156, 'requisition raised,19-08-2013 09:26:26', 'New', '2013-08-19 03:26:26'),
(160, 18, 'Boss', 157, 'admin added,19-08-2013 10:22:28', 'New', '2013-08-19 04:22:28'),
(161, 19, 'Raiser', 157, 'requisition raised,19-08-2013 10:22:28', 'New', '2013-08-19 04:22:28'),
(162, 18, 'Boss', 158, 'admin added,19-08-2013 10:38:54', 'New', '2013-08-19 04:38:54'),
(163, 19, 'Raiser', 158, 'requisition raised,19-08-2013 10:38:54', 'New', '2013-08-19 04:38:54'),
(164, 18, 'Boss', 159, 'admin added,19-08-2013 10:55:53', 'New', '2013-08-19 04:55:53'),
(165, 19, 'Raiser', 159, 'requisition raised,19-08-2013 10:55:53', 'New', '2013-08-19 04:55:53'),
(166, 18, 'Boss', 160, 'admin added,19-08-2013 11:05:04', 'New', '2013-08-19 05:05:04'),
(167, 19, 'Raiser', 160, 'requisition raised,19-08-2013 11:05:04', 'New', '2013-08-19 05:05:04'),
(168, 18, 'Boss', 161, 'admin added,19-08-2013 11:10:06', 'New', '2013-08-19 05:10:06'),
(169, 19, 'Raiser', 161, 'requisition raised,19-08-2013 11:10:06', 'New', '2013-08-19 05:10:06'),
(170, 18, 'Boss', 162, 'admin added,19-08-2013 11:27:44', 'New', '2013-08-19 05:27:44'),
(171, 19, 'Raiser', 162, 'requisition raised,19-08-2013 11:27:44', 'New', '2013-08-19 05:27:44'),
(172, 18, 'Boss', 163, 'admin added,22-08-2013 14:25:44', 'New', '2013-08-22 08:25:44'),
(173, 19, 'Raiser', 163, 'requisition raised,22-08-2013 14:25:44', 'New', '2013-08-22 08:25:44'),
(174, 18, 'Boss', 164, 'admin added,01-09-2013 08:47:06', 'New', '2013-09-01 02:47:06'),
(175, 19, 'Raiser', 164, 'requisition raised,01-09-2013 08:47:06', 'New', '2013-09-01 02:47:06'),
(176, 18, 'Boss', 165, 'admin added,01-09-2013 08:55:36', 'New', '2013-09-01 02:55:36'),
(177, 19, 'Raiser', 165, 'requisition raised,01-09-2013 08:55:36', 'New', '2013-09-01 02:55:36'),
(178, 18, 'Boss', 166, 'admin added,01-09-2013 09:03:23', 'New', '2013-09-01 03:03:23'),
(179, 19, 'Raiser', 166, 'requisition raised,01-09-2013 09:03:23', 'New', '2013-09-01 03:03:23'),
(180, 18, 'Boss', 167, 'admin added,01-09-2013 09:54:20', 'New', '2013-09-01 03:54:20'),
(181, 19, 'Raiser', 167, 'requisition raised,01-09-2013 09:54:20', 'New', '2013-09-01 03:54:20'),
(182, 18, 'Boss', 168, 'admin added,03-09-2013 14:33:39', 'New', '2013-09-03 08:33:39'),
(183, 19, 'Raiser', 168, 'requisition raised,03-09-2013 14:33:39', 'New', '2013-09-03 08:33:39'),
(184, 18, 'Boss', 169, 'admin added,03-09-2013 14:38:48', 'New', '2013-09-03 08:38:48'),
(185, 19, 'Raiser', 169, 'requisition raised,03-09-2013 14:38:48', 'New', '2013-09-03 08:38:48'),
(186, 18, 'Boss', 170, 'admin added,03-09-2013 14:43:22', 'New', '2013-09-03 08:43:22'),
(187, 19, 'Raiser', 170, 'requisition raised,03-09-2013 14:43:22', 'New', '2013-09-03 08:43:22'),
(188, 18, 'Boss', 171, 'admin added,03-09-2013 15:00:38', 'New', '2013-09-03 09:00:38'),
(189, 19, 'Raiser', 171, 'requisition raised,03-09-2013 15:00:38', 'New', '2013-09-03 09:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `authenticating_steps`
--

CREATE TABLE IF NOT EXISTS `authenticating_steps` (
  `name_of_requisition` varchar(100) NOT NULL,
  `name_of_auth_step` varchar(100) NOT NULL,
  `step_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authority_level`
--

CREATE TABLE IF NOT EXISTS `authority_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `authority_level`
--

INSERT INTO `authority_level` (`id`, `name`) VALUES
(1, 'Raise'),
(2, 'Recommend'),
(3, 'Approve'),
(4, 'Execute'),
(5, 'View'),
(6, 'Admin'),
(7, 'Hub Admin');

-- --------------------------------------------------------

--
-- Table structure for table `central_admins`
--

CREATE TABLE IF NOT EXISTS `central_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `central_admins`
--

INSERT INTO `central_admins` (`id`, `user_id`, `date_added`) VALUES
(1, 11, '2013-02-18 17:35:08'),
(2, 12, '2013-02-18 17:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `comment_by` varchar(11) NOT NULL,
  `comment_to` varchar(20) NOT NULL,
  `flag` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `comment_by`, `comment_to`, `flag`, `date`) VALUES
(1, 'sample comment 1', '71', '18', 'read', '2012-12-30 06:47:07'),
(2, 'sample comment 2', '71', '18', 'read', '2012-12-28 18:46:31'),
(3, 'sample comment 3', '73', '18', 'read', '2012-12-30 06:20:43'),
(4, 'sample comment 4', '73', '18', 'read', '2012-12-30 06:20:45'),
(5, 'sample comment 1\r\n', '73', '21', 'unread', '2012-12-18 19:18:17'),
(6, 'sample comment 2', '73', '21', 'unread', '2012-12-18 19:18:28'),
(7, 'sample comment 3', '73', '21', 'unread', '2012-12-18 19:05:01'),
(8, 'sample comment 1', '75', '20', 'read', '2012-12-28 18:31:07'),
(9, 'ho ho ho.........', '73', '19', 'unread', '2012-12-18 19:15:29'),
(10, 'ho ho ho.........', '73', '19', 'unread', '2012-12-18 18:46:18'),
(11, 'yoyooyoy', '73', '21', 'unread', '2012-12-21 22:50:57'),
(12, '1234', '75', '2', 'unread', '2012-12-22 00:05:53'),
(13, 'self by admin', '75', '18', 'read', '2012-12-28 18:46:56'),
(14, 'wow no body comment but me!!!!', '75', '20', 'read', '2012-12-28 18:31:14'),
(15, 'sample admins own comment....................................................', '75', '20', 'read', '2012-12-28 18:31:21'),
(16, 'comment 1 by super admin', '76', '22', 'read', '2012-12-28 18:30:32'),
(17, 'comment 2 by user', '73', '22', 'unread', '2012-12-24 23:26:14'),
(18, 'new comment by sample user 1', '73', '18', 'read', '2012-12-30 06:20:48'),
(19, 'another comment by user 1\r\n', '73', '18', 'unread', '2012-12-30 06:08:11'),
(20, 'comment 1', '73', '23', 'unread', '2012-12-30 06:39:55'),
(21, 'response 1', '76', '23', 'read', '2012-12-30 06:09:31'),
(22, '', '73', '23', 'unread', '2013-01-07 11:46:07'),
(23, 'wow', '73', '27', 'read', '2013-01-14 06:44:33'),
(24, 'noww', '84', '27', 'read', '2013-01-14 06:44:54'),
(25, '', '', '', 'unread', '2013-01-20 21:35:39'),
(26, '', '', '', 'unread', '2013-01-20 22:05:28'),
(27, 'any comment', '', '37', 'unread', '2013-01-20 22:08:12'),
(28, 'anycomment 1\r\n', '', '37', 'unread', '2013-01-20 22:09:42'),
(29, 'wow\r\n', '98', '37', 'unread', '2013-01-20 22:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `idcomments` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `flag` varchar(45) NOT NULL,
  `tasks_idtasks` int(11) NOT NULL,
  `tasks_users_idusers` int(11) NOT NULL,
  `tasks_feedbacks_idfeedbacks` int(11) NOT NULL,
  PRIMARY KEY (`idcomments`,`tasks_idtasks`,`tasks_users_idusers`,`tasks_feedbacks_idfeedbacks`),
  KEY `fk_comments_tasks1_idx` (`tasks_idtasks`,`tasks_users_idusers`,`tasks_feedbacks_idfeedbacks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE IF NOT EXISTS `corporate` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `name`, `designation`, `office`) VALUES
(1, 'Md.Shamsuzzuha', 'PD,', 'Corporate'),
(2, 'Mohammed Shariful Islam', 'GM, Finance ', 'Corporate'),
(3, 'Muhammad Shahidul Islam Khan', 'Gm, Finance & Accounts', 'Corporate'),
(4, 'S.M Moinuddin Chowdhury', 'GM, Comercial', 'Corporate'),
(5, 'Wakil Ahmed', 'Deputy, Manager,', 'Corporate'),
(6, 'Kazi Jahangir Alam Kabir', 'Advisor,', 'Corporate'),
(7, 'J.B Gupta', 'Advisor,', 'Corporate'),
(8, 'Hasanuzzaman', 'Manager, Finance', 'Corporate'),
(9, 'Salauddin Mahmud', 'Deputy, Manager, Mkt', 'Corporate'),
(10, 'M.A Momen Sarker', 'Deputy, Manager, Mkt', 'Corporate'),
(11, 'Mohammad Omar faruk', 'Add, Manager, Acc', 'Corporate'),
(12, 'Ismail Hossain', 'Deputy, Manager, Acc', 'Corporate'),
(13, 'Mohammad Mahmud', 'Deputy, Manager, Acc', 'Corporate'),
(14, 'Mr. Rajan Sami', 'Deuty Manager, Accounts & Finance', 'Corporate'),
(15, 'A.H Kamal (Tuhin)', 'Manager, IT', 'Corporate'),
(16, 'Asif Noor Chowdhury', 'Deputy, Manager, Mkt', 'Corporate'),
(17, 'Mohamad Minhajul Masud', 'Deputy, Manager, Supply Chain Management', 'Corporate'),
(18, 'Ramendro Majumder', 'Asst , Manager,', 'Corporate'),
(19, 'Md. Mehedi Hasan', 'Asst, Manager, Legal Affairs', 'Corporate'),
(20, 'Ahmed Al-Hasan (Manik)', 'Sr. Executive, Logigistic & Opeeration', 'Corporate'),
(21, 'Anwar Hossain', 'Sr. Executive, Acc', 'Corporate'),
(22, 'Ali Akbar Hossain', 'Sr. Executive, Acc', 'Corporate'),
(23, 'Kazi Sakhawat Hossain', 'Electric Engineer,', 'Corporate'),
(24, 'Mohammad Mamunur Rahman', 'Sr. Executive, Acc', 'Corporate'),
(25, 'Tazul Islam Sikder', 'Front Desk, Executive,', 'Corporate'),
(26, 'Mr. Tapon Kumer Mojumder', 'Sr. Executive, Acc', 'Corporate'),
(27, 'Kabir Hossain', 'Sr. Executive, Acc', 'Corporate'),
(28, 'Md.Ikteer Uddin', 'Executive, HRD', 'Corporate'),
(29, 'Raihan Uddin', 'Executive, Mkt', 'Corporate'),
(30, 'Gobindo kumar Das', 'Executive, Acc', 'Corporate'),
(31, 'Monir Hossain', 'Executive, Commercial', 'Corporate'),
(32, 'Md.Muzahidul Islam', 'Sr. Executive, Acc', 'Corporate'),
(33, 'Wahidul Islam (Tarek)', 'Jr. Executive, Com', 'Corporate'),
(34, 'Alomgir Kobir Selim', 'Sr. Executive, Mkt', 'Corporate'),
(35, 'Kamal uddin', 'Jr.Executive, Mkt', 'Corporate'),
(36, 'Ariful Islam', 'Jr.Executive, Mkt', 'Corporate'),
(37, 'Obayad Ullah', 'Computer,Operator', 'Corporate'),
(38, 'Kazi Razib', 'Jr. Executive, Accounts', 'Corporate'),
(39, 'Mahmudur Rahman Khokan', 'Executive, Acc', 'Corporate'),
(40, 'Mehedi Zaman', 'Jr. Executive, Acc', 'Corporate'),
(41, 'Sayed Nasim Uddin mahmud', 'Executive, Mkt', 'Corporate'),
(42, 'Abul Mansur Shikder (MIL)', 'Asst. Manager,Mkt', 'Corporate'),
(43, 'Maruf Ahmed', 'Jr. Executive, Mkt', 'Corporate'),
(44, 'Sarwor Jahan', 'Jr. Executive, Acc', 'Corporate'),
(45, 'Majibur Rahman', 'Jr. Executive, log&Sup', 'Corporate'),
(46, 'Rezaul karim', 'Jr. Executive, Acc', 'Corporate'),
(47, 'Asadur Rahman', 'Executive, Mkt', 'Corporate'),
(48, 'Sanjib Kormokar', 'Executive, Mkt', 'Corporate'),
(49, 'Md.Ershadul Kabir', 'Executive, Mkt', 'Corporate'),
(NULL, 'Md. Abdul Wahab', 'Project,  Co-ordinator', NULL),
(NULL, 'Md. Abdullah', 'PM-LCDL', NULL),
(NULL, 'M.Ebrahim Khalil', 'PM-CSYR', NULL),
(NULL, 'Nhek Thivuth', 'Cons.Manager', NULL),
(NULL, 'Mr.Mahfuzzaman.Zoha', 'DPM-LCDL', NULL),
(NULL, 'Mr.Nazrul Islam Khan', 'QA/QC Manager', NULL),
(NULL, 'Mr.A M M Yahya', 'PM(S&T)', NULL),
(NULL, 'Amully Kumer Basak', 'Quality Surveyor', NULL),
(NULL, 'Md.Jahangir Hossain', 'Structural Engineer', NULL),
(NULL, 'Kandoker Deloer Hossain', 'Asst. Quality Searver', NULL),
(NULL, 'Md. Rashedul Islam Pavel', 'Chief.Accountant', NULL),
(NULL, 'Md.Habibur Rahman', 'Auto CAD Operator,', NULL),
(NULL, 'Md.Ziaul Haque Sarker', 'Auto CAD Operator,', NULL),
(NULL, 'Md. Hanif', 'Advisor,Bridge', NULL),
(NULL, 'Md. Ariful Rahman', 'IT, Engr.,', NULL),
(NULL, 'AZM Mafuzzaman', 'DPM-LCDL,', NULL),
(NULL, 'Proloy Kanti Saha', 'Executive, Acc', NULL),
(NULL, 'Md.Rofiqul Islam', 'Logistic, Manager,', NULL),
(NULL, 'Engr.Md.Shajahan Alam', 'Project, Director, Bridge&Culvert', NULL),
(NULL, 'Leonardo Rozario', 'Transport, Manager,', NULL),
(NULL, 'Md. Gulam Moula', 'Environment,  Specilist,', NULL),
(NULL, 'Abdul Kuddus', 'System, Analyst,', NULL),
(NULL, 'Shafiqul Islam', ',', NULL),
(NULL, 'Delowar', ',', NULL),
(NULL, 'Abdulla Al -mamun', 'Procurement, Manager,', NULL),
(NULL, 'Tarikul islam Rajib', 'Asst, Acc', NULL),
(NULL, 'Faruk Hossain', 'Comp, Opt(proj),', NULL),
(NULL, 'Mr. Asiqure Rahman', ',', NULL),
(NULL, 'Gouranga Sikder', 'Executive, Accounts', NULL),
(NULL, 'Joy Chatterjee', 'Asst, Manager,', NULL),
(NULL, 'Khurshed Alam', 'Sr.Exec, Accounts', NULL),
(NULL, 'Liton Kumar Shaha', 'Manager, Acc.(project)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `iddepartments` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddepartments`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`iddepartments`, `name`) VALUES
(1, 'HR'),
(2, 'Admin'),
(3, 'R & D'),
(4, 'Marketing ');

-- --------------------------------------------------------

--
-- Table structure for table `department_corporate`
--

CREATE TABLE IF NOT EXISTS `department_corporate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `master` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `department_corporate`
--

INSERT INTO `department_corporate` (`id`, `name`, `master`, `date`) VALUES
(1, 'Accounts & Finance', 'Max Automobile', '2013-01-07 06:33:08'),
(2, 'Accounts', 'Max Automobile', '2013-01-07 06:33:08'),
(3, 'Finance', 'Max Automobile', '2013-01-07 06:33:08'),
(4, 'Comercial', 'Max Automobile', '2013-01-07 06:33:08'),
(5, 'Marketing', 'Max Automobile', '2013-01-07 06:33:08'),
(6, 'IT', 'Max Automobile', '2013-01-07 06:33:08'),
(7, 'Supply Chain Management', 'Max Automobile', '2013-01-07 06:33:08'),
(8, 'Legal Affairs', 'Max Automobile', '2013-01-07 06:33:08'),
(9, 'Logigistic & Operation', 'Max Automobile', '2013-01-07 07:33:44'),
(10, 'HRD', 'Max Automobile', '2013-01-07 06:33:08'),
(11, 'HRD', 'Max Lubricant', '2013-01-07 06:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `designation_corporate`
--

CREATE TABLE IF NOT EXISTS `designation_corporate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `master` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `designation_corporate`
--

INSERT INTO `designation_corporate` (`id`, `name`, `master`, `date`) VALUES
(1, 'GM', 'Max Automobile', '2013-01-07 07:41:04'),
(3, 'Manager', 'Max Automobile', '2013-01-07 07:41:04'),
(6, 'Additional Manager', 'Max Automobile', '2013-01-07 07:41:04'),
(9, 'Deputy Manager', 'Max Automobile', '2013-01-07 07:41:04'),
(10, 'Assistant Manager', 'Max Automobile', '2013-01-07 07:41:04'),
(12, 'Sr. Executive', 'Max Automobile', '2013-01-07 07:41:05'),
(14, 'Executive', 'Max Automobile', '2013-01-07 07:41:05'),
(16, 'Electric Engineer', 'Max Automobile', '2013-01-07 07:43:08'),
(17, 'Front Desk Executive', 'Max Automobile', '2013-01-07 07:43:08'),
(18, 'Advisor', 'Max Automobile', '2013-01-07 07:43:08'),
(19, 'Jr. Executive', 'Max Automobile', '2013-01-07 07:43:08'),
(20, 'Computer Operator', 'Max Automobile', '2013-01-07 07:43:17'),
(21, 'Project Co-ordinator', 'Max Automobile', '2013-01-07 07:44:13'),
(22, 'Cons.Manager', 'Max Automobile', '2013-01-07 07:44:13'),
(23, 'Hub Admin', 'MAPL', '2013-05-07 04:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `designation_site_factory`
--

CREATE TABLE IF NOT EXISTS `designation_site_factory` (
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `site_factory_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation_site_factory`
--

INSERT INTO `designation_site_factory` (`name`, `level`, `site_factory_type`) VALUES
('site manager', 1, 'site'),
('site supervisor', 2, 'site'),
('factory manager', 1, 'factory'),
('factory supervisor', 2, 'factory');

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
  `id` int(1) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `designation` varchar(24) DEFAULT NULL,
  `office` varchar(22) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`id`, `name`, `designation`, `office`) VALUES
(1, 'Md. Mahade Hasan', 'Production, Manager', 'MAX (Noakhali Factory)'),
(2, 'Abdur Rahaman Shamsu', 'Senior, Forman', 'MAX (Noakhali Factory)'),
(3, 'Md. Zaber', 'Accounts, Executive', 'MAX (Noakhali Factory)'),
(4, 'Md. Akter Hossain', 'Asst.Accounts, Executive', 'MAX (Noakhali Factory)'),
(5, 'Md. Abul Khair', 'Store, Keeper', 'MAX (Noakhali Factory)'),
(6, 'Md. Feroz Alam Enam', 'Asst.Store, Keeper', 'MAX (Noakhali Factory)'),
(7, 'Md. Salauddin', 'Supervisor', 'MAX (Noakhali Factory)'),
(8, 'Ripon Chandra Pal', 'Purchaser', 'MAX (Noakhali Factory)'),
(9, 'Md.Hossain', 'Messenger', 'MAX (Noakhali Factory)');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `flag` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `title`, `description`, `iduser`, `flag`, `date`) VALUES
(6, 'some title ', 'some description', 74, 'finished', '2013-01-07 04:58:39'),
(7, '2nd title', '2nd feed\r\n', 72, 'pending', '2013-01-07 06:06:09'),
(8, '3rd', '3rd', 71, 'in process', '2013-01-07 05:36:31'),
(9, '3rd', '3rd', 75, 'pending', '2013-01-06 22:47:08'),
(10, '4th', '4th', 71, 'pending', '2013-01-06 22:47:08'),
(11, '5th', '5th', 76, 'finished', '2013-01-07 04:42:43'),
(12, 'new feedback', 'new feedback', 75, 'pending', '2013-01-06 22:37:43'),
(13, 'sample title', 'new feedback', 72, 'finished', '2013-01-07 04:43:21'),
(14, 'dsfgdsfg', 'new feedback', 76, 'pending', '2013-01-06 22:47:06'),
(15, 'from super admin', 'super admin', 71, 'in process', '2013-01-07 04:43:34'),
(16, 'from developer', '123', 75, 'finished', '2013-01-07 05:37:46'),
(17, 'another new feed', 'new feed', 71, 'pending', '2013-01-07 04:47:39'),
(18, 'new feedback', 'new', 71, 'in process', '2013-01-07 05:37:39'),
(19, 'sample user 20''s feedback', 'sample user 20''s feedback', 76, 'unread', '2013-01-20 07:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `idfeedbacks` int(11) NOT NULL AUTO_INCREMENT,
  `ratings` int(11) NOT NULL,
  PRIMARY KEY (`idfeedbacks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `idfiles` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `type` varchar(45) NOT NULL,
  `comments_idcomments` int(11) NOT NULL,
  `comments_tasks_idtasks` int(11) NOT NULL,
  `comments_tasks_users_idusers` int(11) NOT NULL,
  `comments_tasks_feedbacks_idfeedbacks` int(11) NOT NULL,
  `tasks_idtasks` int(11) NOT NULL,
  `tasks_users_idusers` int(11) NOT NULL,
  `tasks_feedbacks_idfeedbacks` int(11) NOT NULL,
  PRIMARY KEY (`idfiles`,`comments_idcomments`,`comments_tasks_idtasks`,`comments_tasks_users_idusers`,`comments_tasks_feedbacks_idfeedbacks`,`tasks_idtasks`,`tasks_users_idusers`,`tasks_feedbacks_idfeedbacks`),
  KEY `fk_files_comments1_idx` (`comments_idcomments`,`comments_tasks_idtasks`,`comments_tasks_users_idusers`,`comments_tasks_feedbacks_idfeedbacks`),
  KEY `fk_files_tasks1_idx` (`tasks_idtasks`,`tasks_users_idusers`,`tasks_feedbacks_idfeedbacks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `highest_local_authority`
--

CREATE TABLE IF NOT EXISTS `highest_local_authority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `highest_local_authority`
--

INSERT INTO `highest_local_authority` (`id`, `location_id`, `user_id`, `active`, `date`) VALUES
(1, '41201', 6, '', '2013-01-20 21:38:07'),
(2, '41202', 5, '', '2013-01-20 21:38:29'),
(3, '10011.4', 21, 'active', '2013-04-10 04:18:23'),
(4, '10011.5', 24, 'active', '2013-04-10 04:20:37'),
(12, 'central', 35, 'active', '2013-04-19 04:05:43'),
(13, 'central', 38, 'active', '2013-04-19 04:15:04'),
(14, 'central', 29, 'active', '2013-04-20 12:40:39'),
(15, 'central', 27, 'active', '2013-04-20 12:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `hub_admins`
--

CREATE TABLE IF NOT EXISTS `hub_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `current_status` varchar(100) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hub_admins`
--

INSERT INTO `hub_admins` (`id`, `user_id`, `location`, `current_status`, `date_updated`) VALUES
(1, 6, '41202', 'active', '0000-00-00 00:00:00'),
(2, 99, 'Main Hub', 'active', '0000-00-00 00:00:00'),
(3, 5, '41201', 'active', '2013-02-05 07:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_factory` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `master` varchar(100) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  `location_type` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `site_factory`, `project`, `master`, `location_id`, `location_type`, `date_added`) VALUES
(19, 'Pre-Stress DOHS Office', 'MAX Pre-Stress Ltd', 'Single Entity', '60011', 'Single Entity', '2013-06-06 10:57:40'),
(20, 'Pre-Stress Factory', 'MAX Pre-Stress Ltd', 'Single Entity', '60012', 'Single Entity', '2013-06-06 10:58:24'),
(21, 'LUB House DOHS Office', 'LUB House Industries Ltd', 'Single Entity', '60021', 'Single Entity', '2013-06-26 22:21:18'),
(22, 'Lubricant Factory', 'LUB House Industries Ltd', 'Single Entity', '60022', 'Single Entity', '2013-06-26 22:22:57'),
(23, 'DOHS Office MAX Industries', 'MAX Industries Ltd', 'Single Entity', '60031', 'Single Entity', '2013-06-27 10:33:51'),
(24, 'Manikgonj Factory', 'MAX Industries Ltd', 'Single Entity', '60032', 'Single Entity', '2013-06-27 10:34:38'),
(25, 'Chinki Astana', 'LCDLP', 'MAPL', '10011', '', '2013-07-03 10:37:34'),
(26, 'Feni', 'LCDLP', 'MAPL', '10012', '', '2013-07-03 10:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `master_business`
--

CREATE TABLE IF NOT EXISTS `master_business` (
  `name` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_business`
--

INSERT INTO `master_business` (`name`, `id`) VALUES
('Single Entity', 60000),
('MAPL', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `material_category`
--

CREATE TABLE IF NOT EXISTS `material_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sub_cat_of` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `material_category`
--

INSERT INTO `material_category` (`id`, `name`, `type`, `sub_cat_of`, `date_added`) VALUES
(4, 'Construction Material', 'Category', 0, '2013-06-09 20:07:23'),
(5, 'Building Material', 'Subcategory', 4, '2013-06-09 20:08:50'),
(6, 'Lub Oil', 'Category', 0, '2013-06-25 14:59:20'),
(7, 'Base Oil', 'Subcategory', 6, '2013-06-25 14:59:50'),
(8, 'Railway Track Material', 'Subcategory', 4, '2013-07-03 09:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `material_master`
--

CREATE TABLE IF NOT EXISTS `material_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `measurment_unit` varchar(100) NOT NULL,
  `m_description` varchar(100) NOT NULL,
  `cost_per_unit` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `material_master`
--

INSERT INTO `material_master` (`id`, `name`, `category`, `subcategory`, `measurment_unit`, `m_description`, `cost_per_unit`, `date_added`) VALUES
(1, 'wwwww', 'Baseqoil', 'BS150', 'KG', 'erererere', 345780, '2013-06-01 09:28:05'),
(2, 'Cement', 'Construction Material', 'Building Material', 'Select Measurement Unit', '', 400, '2013-06-09 20:12:59'),
(3, 'Rod', 'Construction Material', 'Building Material', 'ton', '', 59500, '2013-07-03 08:36:25'),
(4, 'Ballast', 'Construction Material', 'Railway Track Material', 'CFt', '', 125, '2013-07-03 09:24:29'),
(5, 'Tiles (RAK)', 'Construction Material', 'Building Material', 'sq ft', '', 60, '2013-07-03 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `micro_site`
--

CREATE TABLE IF NOT EXISTS `micro_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `micro_site`
--

INSERT INTO `micro_site` (`id`, `name`, `site`) VALUES
(1, '185 Bridge', 'Feni');

-- --------------------------------------------------------

--
-- Table structure for table `money_limit`
--

CREATE TABLE IF NOT EXISTS `money_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bosslimit` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `money_limit`
--

INSERT INTO `money_limit` (`id`, `bosslimit`, `user_id`, `date_modified`, `type`) VALUES
(1, 50000, 0, '0000-00-00 00:00:00', 'Local Purchase'),
(2, 10000, 0, '0000-00-00 00:00:00', 'default'),
(3, 500000, 12, '2013-04-28 12:24:13', ''),
(4, 50000, 24, '2013-04-28 12:33:33', ''),
(5, 50000, 21, '2013-04-28 12:33:33', ''),
(6, 5000, 15, '2013-06-26 23:51:04', ''),
(7, 2000, 18, '2013-06-27 10:42:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `pagination`
--

CREATE TABLE IF NOT EXISTS `pagination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `page_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pagination`
--

INSERT INTO `pagination` (`id`, `name`, `icon`, `url`, `user_type`, `page_order`) VALUES
(1, 'Home', '<i class="icon-home icon-white"></i>', 'super_admin.php', 'administration', 1),
(2, 'Requisition', '', 'list_of_req_super_admin.php', 'administration', 2),
(3, 'Profile', '<i class="icon-user icon-white"></i>', 'profile.php', 'administration', 3),
(4, 'Log Out', '', 'log_out.php', 'administration', 9),
(5, 'Home', '<i class="icon-home icon-white"></i>', 'user_home.php', 'staff', 1),
(6, 'Requisition', '', 'list_of_req_user.php', 'staff', 2),
(7, 'Profile', '<i class="icon-user icon-white"></i>', 'profile.php', 'staff', 3),
(8, 'Log Out', '', 'log_out.php', 'staff', 9),
(9, 'Log Out', '', 'log_out.php', '', 9),
(10, 'Profile', '<i class="icon-user icon-white"></i>', 'profile.php', 'site manager', 3),
(11, 'Profile', '<i class="icon-user icon-white"></i>', 'profile.php', 'admin', 3),
(12, 'Home', '<i class="icon-home icon-white"></i>', 'admin.php', 'admin', 1),
(13, 'Log Out', '', 'log_out.php', 'admin', 9),
(14, 'Home', '<i class="icon-home icon-white"></i>', 'user_home.php', 'site manager', 1),
(15, 'Requisition', '', 'list_of_req_user.php', '', 2),
(16, 'Admin Panel', '', 'admin_panel.php', 'admin', 2),
(18, 'Feedback', '', 'feedback.php', 'administration', 4),
(19, 'Feedback', '', 'feedback.php', 'staff', 4),
(20, 'Feedback', '', 'feedback.php', 'site supervisor', 4),
(21, 'Feedback', '', 'feedback.php', 'site manager', 4),
(23, 'Home', '', 'list_of_pages.php', 'webdeveloper', 1),
(24, 'Feedback', '', 'feedback.php', 'webdeveloper', 4),
(25, 'Log Out', '', 'log_out.php', 'webdeveloper', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `flag` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `subject`, `message`, `sender`, `receiver`, `flag`, `date`) VALUES
(1, 'sample pm', 'sample pm', 73, 73, '', '2013-01-10 05:19:45'),
(2, 'yoo', 'noo', 73, 73, 'new', '2013-01-10 05:25:27'),
(3, 'hahah', 'hahahahah', 73, 73, 'new', '2013-01-10 05:27:00'),
(4, 'so,', 'so,', 73, 73, 'new', '2013-01-10 05:29:20'),
(5, 'erewr', 'ewrwrew', 73, 73, 'new', '2013-01-10 05:29:50'),
(6, 'yoo', 'noo', 73, 73, 'new', '2013-01-10 06:11:14'),
(7, 'new ', 'message\n', 73, 73, 'new', '2013-01-10 06:07:10'),
(8, 'qqq', 'wwww', 73, 73, 'new', '2013-01-10 06:09:23'),
(9, 'hhh', 'nnnn', 73, 73, 'new', '2013-01-10 05:46:10'),
(10, 'jjj', 'ffff', 73, 73, 'new', '2013-01-10 05:47:20'),
(11, 'aaaa', 'asdfasdf', 73, 73, 'new', '2013-01-10 05:53:14'),
(12, 'aaaaa', 'asdfasdf', 0, 0, 'new', '2013-01-10 06:04:14'),
(13, 'asfasfds', 'asdfasfasfasfasf', 73, 73, 'new', '2013-01-10 06:05:00'),
(14, 'wow', 'again wow', 73, 73, 'new', '2013-01-10 06:06:02'),
(15, 'wow', 'noww', 73, 76, 'new', '2013-01-14 05:36:16'),
(16, 'Accepting requisition', 'Sir plz accept asap', 6, 0, 'new', '2013-06-07 21:10:23'),
(17, 'about 106', 'no fund available', 6, 0, 'new', '2013-06-07 21:15:28'),
(18, 'asdf', 'asdfasdfasdf', 6, 0, 'new', '2013-06-26 14:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `master` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`name`, `id`, `master`) VALUES
('MAX Pre-Stress Ltd', 60010, 'Single Entity'),
('LUB House Industries Ltd', 60020, 'Single Entity'),
('MAX Industries Ltd', 60030, 'Single Entity'),
('LCDLP', 10010, 'MAPL');

-- --------------------------------------------------------

--
-- Table structure for table `recurring_nonrecurring`
--

CREATE TABLE IF NOT EXISTS `recurring_nonrecurring` (
  `name` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recurring_nonrecurring`
--

INSERT INTO `recurring_nonrecurring` (`name`, `id`) VALUES
('recurring', 1),
('non-recurring', 2);

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE IF NOT EXISTS `requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_req_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type_of_req` varchar(100) NOT NULL,
  `admin` varchar(11) NOT NULL,
  `costing` int(30) NOT NULL,
  `material_cart` text NOT NULL,
  `po_info` text NOT NULL,
  `actual_cost_by_scm` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(30) NOT NULL,
  `delivery_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `com_req_id`, `title`, `description`, `type_of_req`, `admin`, `costing`, `material_cart`, `po_info`, `actual_cost_by_scm`, `user_id`, `location_id`, `status`, `submission_date`, `deadline`, `delivery_date`) VALUES
(27, 0, 'sample req11', 'No designation available', 'sample req type 9', '84', 134567, '', '', 0, 73, '0', 'Pending', '2013-01-10 05:29:02', '16/12/2012', ''),
(31, 0, 'buy computer new', 'buy computer new', 'sample req type 9', '73', 1345673, '', '', 0, 86, '0', 'New', '2013-01-20 07:12:13', '16/12/2012', ''),
(32, 0, 'buy computer new', 'buy computer new', 'sample req type 9', '73', 1345673, '', '', 0, 86, '0', 'New', '2013-01-20 07:28:41', '16/12/2012', ''),
(34, 0, 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', 0, 99, '41201', 'Pending', '2013-01-20 21:45:15', '16/12/2012', ''),
(35, 0, 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', 0, 99, '41201', 'Modify', '2013-01-20 21:50:38', '16/12/2012', ''),
(36, 0, 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', 0, 99, '41201', 'Solved', '2013-01-20 21:50:53', '16/12/2012', ''),
(37, 0, 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', 0, 99, '41201', 'Pending', '2013-01-20 21:51:09', '16/12/2012', ''),
(38, 0, 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', 0, 99, '41201', 'Pending', '2013-01-20 22:01:14', '16/12/2012', ''),
(39, 0, 'buy computer new', 'buy computer new', 'sample req type 9', '', 1345673, '', '', 0, 5, '41201', 'Approved', '2013-02-11 08:33:49', '16/12/2012', ''),
(45, 0, 'asdfasf', 'sdfsadfasf', 'Local Purchase', '', 1231333, '', '', 0, 5, '41201', 'Delivered', '2013-02-18 17:14:24', '16/12/2012', ''),
(48, 0, 'fffff', 'fffff', 'Local Purchase', '', 5000, '', '', 0, 5, '41201', 'Clear From Accounts', '2013-02-11 08:52:44', '16/12/2012', ''),
(56, 0, 'vdvdvdv', 'vdvdvdvd', 'Fund', '', 5000, '', '', 0, 5, '41201', 'Solved', '2013-02-11 08:18:28', '16/12/2012', ''),
(57, 0, 'asdffffffffffffff', 'asdfdfdfdfffff', 'Local Purchase', '', 23432424, '', '', 0, 5, '41201', 'Delivered', '2013-02-18 17:13:45', '16/12/2012', ''),
(58, 0, 'testing for central', 'testing for central', 'Service Charge', '', 100000000, '', '', 0, 5, '41201', 'Delivered', '2013-02-18 17:39:36', '16/12/2012', ''),
(59, 0, 'testing for local', 'testing for local', 'Local Purchase', '', 5000, '', '', 0, 5, '41201', 'Delivered', '2013-02-18 17:50:19', '16/12/2012', ''),
(60, 0, 'testing for central 2', 'testing for central 2', 'Recruitment', '', 1000000, '', '', 0, 5, '41201', 'Delivered', '2013-02-18 17:43:13', '16/12/2012', ''),
(61, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 23, '10011', 'New', '2013-04-10 04:00:40', '16/12/2012', ''),
(62, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 23, '10011.5', 'New', '2013-04-10 04:01:57', '16/12/2012', ''),
(63, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 23, '10011.5', 'New', '2013-04-10 04:21:52', '16/12/2012', ''),
(64, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 23, '10011.5', 'New', '2013-04-10 04:28:55', '16/12/2012', ''),
(65, 0, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'Approved', '2013-04-10 03:59:17', '16/12/2012', ''),
(66, 0, 'local purchase by 185 saff2', 'local purchase by 185 saff2. mushfiq vai said to write some word.', 'Local Purchase', '', 5000, '', '', 0, 28, '10011.5', 'Closed', '2013-04-19 04:03:56', '16/12/2012', ''),
(67, 0, 'local purchase by 185 saff2', 'local purchase by 185 saff2', 'Local Purchase', '', 500000, '', '', 0, 28, '10011.5', 'New', '2013-04-19 04:43:20', '16/12/2012', ''),
(68, 0, 'local purchase by 185 saff2 123', 'local purchase by 185 saff2 123', 'Local Purchase', '', 500000, '', '', 0, 28, '10011.5', 'Closed', '2013-04-19 03:51:42', '16/12/2012', ''),
(69, 0, 'requisition by staff 12', 'need to buy pc locally', 'Local Purchase', '', 5000, '', '', 0, 28, '10011.5', 'New', '2013-04-20 12:44:57', '16/12/2012', ''),
(70, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 41, 'site manage', 'New', '2013-04-20 11:49:40', '16/12/2012', ''),
(71, 0, 'local purchase new', 'local purchase new', 'Spare Parts', '', 5000, '', '', 0, 41, '10011.6', 'New', '2013-04-20 11:51:44', '16/12/2012', ''),
(72, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 41, '10013.6', 'New', '2013-04-20 11:53:00', '16/12/2012', ''),
(73, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-04-26 03:58:46', '16/12/2012', ''),
(74, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.4', 'New', '2013-04-26 03:59:45', '16/12/2012', ''),
(75, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.4', 'Approved', '2013-04-27 08:48:38', '16/12/2012', ''),
(76, 0, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-04-27 08:03:44', '16/12/2012', ''),
(77, 0, 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-04-27 08:15:39', '16/12/2012', ''),
(78, 0, 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 5050, 27, '10011.5', 'Solved', '2013-05-02 22:56:06', '16/12/2012', ''),
(79, 0, 'local purchase by 185 saff1 123123', 'local purchase by 185 saff1 123123', 'Local Purchase', '', 40000, '', '', 0, 27, '10011.5', 'Closed', '2013-04-28 12:43:29', '16/12/2012', ''),
(80, 0, 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 50001, '', '', 0, 27, '10011.5', 'Redirect', '2013-04-28 12:28:41', '16/12/2012', ''),
(81, 0, 'local purchase new central test', 'local purchase new central test', 'Local Purchase', '', 500000, '', '', 345666, 27, '10011.5', 'Solved', '2013-05-02 07:04:03', '16/12/2012', ''),
(82, 0, 'local purchase test', 'i need money for buying something\r\n', 'Local Purchase', '', 40000, '', '', 0, 27, '10011.5', 'Solved', '2013-05-02 06:59:18', '16/12/2012', ''),
(83, 0, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'Solved', '2013-05-02 06:59:03', '16/12/2012', ''),
(84, 0, 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 500000, '', '', 0, 27, '10011.5', 'Solved', '2013-05-02 07:03:41', '16/12/2012', ''),
(85, 0, 'Fund req', 'Fund req 123', 'Fund', '', 10000, '', '', 0, 27, 'MAPL->LCDLP', 'New', '2013-05-02 22:46:53', '16/12/2012', ''),
(86, 0, 'local purchase new', 'local purchase new desc', 'Fund', '', 10000, '', '', 0, 27, 'MAPL->LCDLP', 'New', '2013-05-02 22:47:55', '16/12/2012', ''),
(87, 0, 'new fund', 'new fund', 'Fund', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-05-02 23:01:56', '16/12/2012', ''),
(88, 0, 'salary of january', 'salary of january...................', 'Fund', '', 2000000, '', '', 1500000, 27, '10011.5', 'Closed', '2013-05-02 22:50:44', '16/12/2012', ''),
(89, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 50001, '', '', 0, 27, '10011.5', 'Redirect', '2013-05-25 06:07:45', '31-05-2013', ''),
(90, 0, 'new looooo', 'new looooo', 'Local Purchase', '', 5000000, '', '', 0, 27, '10011.5', 'New', '2013-05-25 05:53:38', '29-05-2013', ''),
(91, 0, 'new looooo', 'new looooo', 'Local Purchase', '', 59999999, '', '', 0, 39, '10011.5', 'New', '2013-05-25 05:54:58', '29-05-2013', ''),
(92, 0, 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 200001, '', '', 0, 27, '10011.5', 'Approved', '2013-05-25 06:04:47', '28-05-2013', ''),
(93, 0, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'Closed', '2013-06-01 05:33:53', '30-05-2013', ''),
(94, 0, 'Samsung Galaxy tab 2 7"', 'Samsung Galaxy tab 2 7"', 'Service Charge', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-06-01 05:39:15', '30-06-2013', ''),
(95, 0, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 10000, '', '', 0, 27, '10011.5', 'Document Delivered', '2013-06-01 05:56:42', '23-07-2013', ''),
(96, 0, 'new test', 'new test', 'Local Purchase', '', 10000, '', '', 0, 27, '10011.5', 'Delivered', '2013-06-01 06:04:10', '30-06-2013', ''),
(97, 0, 'local purchase new', 'local purchase new', 'Material Supply', '', 5000, '', '', 0, 27, '10011.5', 'Closed', '2013-06-01 06:08:31', '16-06-2013', ''),
(100, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 27, '10011.5', 'New', '2013-06-01 05:47:14', '05-06-2013', ''),
(101, 0, 'Samsung Galaxy tab 2 7"', 'Samsung Galaxy tab 2 7"', 'Spare Parts', '', 500000, '', '', 0, 27, '10011.5', 'Closed', '2013-06-01 06:20:37', '28-06-2013', ''),
(102, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 2000000, '', '', 0, 27, '60011.', 'New', '2013-06-01 06:18:28', '22-06-2013', ''),
(103, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 10000, '', '', 0, 27, '60011.', 'Closed', '2013-06-01 06:32:57', '15-06-2013', ''),
(104, 0, 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', 0, 27, '60011.', 'New', '2013-06-01 06:16:47', '15-06-2013', ''),
(105, 0, 'Requisition by se stuff', 'Requisition by se stuff', 'Local Purchase', '', 3333, '', 'a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:6:"test 1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"pc";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:7:"newwwww";s:4:"date";s:19:"01-06-2013 01:02:46";s:8:"poSubmit";s:6:"Submit";}|a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:5:"test1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"kg";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:5:"wwwww";s:4:"date";s:19:"01-06-2013 01:03:04";s:8:"poSubmit";s:6:"Submit";}', 0, 46, '60031', 'Approved', '2013-06-01 06:04:38', '29-06-2013', ''),
(106, 0, 'Salary and supplier payment', 'Salary and supplier payment', 'Fund', '', 200000, '', '', 0, 6, '60012', 'Closed', '2013-06-06 12:00:31', '10-06-2013', ''),
(107, 0, 'Generator servicing', 'Generator servicing', 'Service Charge', '', 2000, '', '', 0, 6, '60012', 'Redirect', '2013-06-07 22:04:38', '10-06-2013', ''),
(108, 0, 'Stone', 'Stone chips 1000 cft', 'Material', '', 100000, '', '', 0, 6, '60012', 'Closed', '2013-06-08 00:31:52', '16-06-2013', ''),
(109, 0, 'Brick', '1 No Brick 1000 Pcs', 'Local Purchase', '', 8000, '', '', 0, 6, '60012', 'Closed', '2013-06-08 11:11:31', '15-06-2013', ''),
(110, 0, 'Drum sheet', 'To be used for bridge 185 copper dam', 'Material', '', 500000, '', '', 0, 6, '60012', 'Closed', '2013-06-09 11:06:45', '20-06-2013', ''),
(111, 0, 'Stone Chips', 'For 3000 Sleeper Production', 'Material', '', 120000, '', '', 0, 6, '60012', 'Redirect', '2013-06-09 22:12:11', '25-06-2013', ''),
(112, 0, 'Rod', 'Rod for production', 'Material', '', 150000, '', '', 0, 6, '60012', 'Approved', '2013-06-09 22:16:18', '24-06-2013', ''),
(113, 0, 'lololo', 'lolololololo', 'Local Purchase', '', 100000, '', '', 0, 6, '60012', 'Delivered', '2013-06-09 22:36:33', '17-06-2013', ''),
(114, 0, 'Tie Rod', 'for machine', 'Local Purchase', '', 1000000, '', '', 0, 6, '60012', 'Approved', '2013-06-09 23:02:24', '18-06-2013', ''),
(115, 0, 'food', 'food for ramadan', 'Material', '', 300000, '', '', 0, 6, '60012', 'Closed', '2013-06-09 23:43:31', '17-06-2013', ''),
(116, 0, 'Lubricant', 'For machine', 'Material', '', 60000, '', '', 0, 6, '60012', 'Approved', '2013-06-10 09:52:16', '19-06-2013', ''),
(117, 0, 'wire', 'st wire', 'Material', '', 100000, '', '', 0, 6, '60012', 'New', '2013-06-17 16:28:03', '25-06-2013', ''),
(118, 0, 'material', 'material list', 'Material', '', 3461800, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,wwwww,10 KG,345780,3457800,,2,Cement,10 Select Measurement Unit,400,4000,,,,,Total Costing,3461800,', '', 0, 6, '60012', 'New', '2013-06-25 11:14:59', '30-06-2013', ''),
(119, 0, 'sdfsdf', 'asdfas', 'Material', '', 8000, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Cement,10 Select Measurement Unit,400,4000,,2,Cement,10 Select Measurement Unit,400,4000,,,,,Total Costing,8000,', '', 0, 6, '60012', 'New', '2013-06-25 13:20:55', '30-06-2013', ''),
(120, 0, 'sfdgsdf', 'dfg', 'Material', '', 160000, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Cement,400 Select Measurement Unit,400,160000,,,,,Total Costing,160000,', '', 0, 6, '60012', 'Reject', '2013-06-26 14:14:07', '30-06-2013', ''),
(121, 0, 'base oil', 'qafasf', 'Material', '', 3461800, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,wwwww,10 KG,345780,3457800,,2,Cement,10 Select Measurement Unit,400,4000,,,,,Total Costing,3461800,', '', 0, 15, '60022', 'New', '2013-06-26 23:57:45', '30-06-2013', ''),
(122, 0, 'bnmghmbvh', 'fasdfasdfasdfasdf', 'Material', '', 6400, 'No.,Item Name,,Unit Price,Item Total,Edit,1,Cement,1,400,400,,2,Cement,15,400,6000,,,,,Total Costing,6400,', 'a:14:{s:2:"id";s:3:"122";s:4:"poNo";s:4:"1212";s:8:"poAmount";s:2:"16";s:6:"amount";s:4:"Unit";s:6:"poCost";s:4:"6200";s:9:"poDetails";s:16:"i got 8%discount";s:4:"date";s:19:"27-06-2013 14:25:44";s:8:"poSubmit";s:6:"Submit";s:8:"__cfduid";s:43:"d41af1be040c368c3f4b85761f5eed9411370857570";s:9:"PHPSESSID";s:32:"d613fcddf963e5c71eaf50a2a8ec5d3e";s:6:"__utma";s:55:"239603743.1205956686.1370857574.1372257576.1372318614.7";s:6:"__utmb";s:26:"239603743.35.10.1372318614";s:6:"__utmc";s:9:"239603743";s:6:"__utmz";s:70:"239603743.1370857574.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)";}', 0, 16, '60022', 'Closed', '2013-06-27 08:46:27', '17-07-2013', '27-06-2013 14:33:42'),
(123, 0, 'Material', 'asdfasdf', 'Material', '', 2400, 'No.,Item Name,,Unit Price,Item Total,Edit,1,Cement,6,400,2400,,,,,Total Costing,2400,', '', 0, 19, '60032', 'Approved', '2013-06-27 11:05:54', '31-07-2013', ''),
(124, 0, 'mmmmm', 'dxfgsd', 'Local Purchase', '', 50000, '', '', 0, 19, '60032', 'Closed', '2013-06-27 11:30:04', '29-06-2013', '27-06-2013 17:25:08'),
(125, 0, 'sdfgsdfg', 'bgnmhjghjfyghj', 'Service Charge', '', 50, '', '', 0, 19, '60032', 'New', '2013-06-27 11:16:49', '24-07-2013', ''),
(126, 0, 'factory expences', 'cnchjkjb,j mvjh,', 'Fund', '', 5788, '', '', 0, 19, '60032', 'New', '2013-06-28 03:21:49', '01-12-2013', ''),
(127, 5, 'Purchase materials for new shed', 'Requisition raised by Mr. Mojid:\r\n01.M.S angle (2.5"x2.5")--200kg.\r\n02. Profile or Tin ---12feet --10pcs ', 'Local Purchase', '', 35000, '', '', 0, 19, '60032', 'Approved', '2013-07-03 08:22:30', '29-06-2013', ''),
(128, 6, 'factory expences', 'Requisition raised by Mr.Rafique ; 01.Local purchase--35ooo taka  ', 'Fund', '', 35000, '', '', 0, 19, '60032', 'Reject', '2013-07-03 08:24:31', '30-06-2013', ''),
(129, 7, 'Sticker Requsition for CrockeriesItems', 'Non-Magnetic Sticker Raised by Mr,Sawkat\r\n 1.5''''=5,00000 pieces,2''''=300000 pieces, & 2.5''''=3,ooooo pieces Total=11,00000 pieces', 'Other', '', 200000, '', '', 0, 19, '60032', 'Approved', '2013-07-01 08:58:19', '07-07-2013', ''),
(130, 8, 'Requisition for Poly Bag for Cr ockeries', 'Requisiton Rasied by Mr. Sawkat\r\n1.Poly Bag 12''''=3oo kg\r\n2. Poly bag  14''''=3oo kg\r\n3.Poly Bag 16''''=4oo kg\r\n4.  Poly Bag 18''''=5oo kg\r\n5.  Poly Bag 22''''=5oo kg\r\n6.Poly Bag 24''''=5oo kg\r\n7.Poly Bag 26''''=5oo kg\r\n8.Poly Bag 32''''=5oo kg\r\n          ', 'Other', '', 910000, '', '', 0, 19, '60032', 'Approved', '2013-07-10 08:01:33', '15-07-2013', ''),
(131, 9, 'Purchase materials for new shed', 'Requisition raised by Mr. Biplov\r\n1.M.S Angle (1.5"x1.5"x4mm)------300kg.\r\n2. M.S Angle (1"x1"x3mm)--------200kg.\r\n3.Profile/Tin--22''x44"------5Pcs.\r\n4.Profile/Tin--11''x44"------6Pcs\r\n5.Profile/Tin--19''x44"------6Pcs\r\n6.Profile/Tin--18''x44"------7Pcs\r\n7.Profile/Tin--13''x44"------4Pcs\r\n8.Profile/Tin--12''x44"------13Pcs', 'Local Purchase', '', 220000, '', '', 0, 19, '60032', 'Approved', '2013-07-07 19:12:06', '11-07-2013', ''),
(132, 10, 'Requisition for Local Materials for Crockeries', 'Requisition Raised by Mr. Shofiq(Polish Foreman)\r\n01.Costic----------5kg.\r\n02.Abrasive Sand-400n0-----50kg\r\n03.Wax------------------5kg.\r\n04.Chomok Buff-4"--------20Pcs', 'Local Purchase', '', 30000, '', '', 0, 19, '60032', 'Approved', '2013-07-10 07:58:06', '07-07-2013', ''),
(133, 11, 'Requisition for Poly Bag for SS pipe plant', 'Requisition raised by Mr. Mizan\r\n01.SS pipe poly bag-3/4"----300kg.\r\n2.SS pipe poly bag-1.25"----300kg.\r\n3.SS pipe poly bag-1.5"----300kg.\r\n4.SS pipe poly bag-2"----500kg.\r\n5.SS pipe poly bag-2.5"----500kg.\r\n6.SS pipe poly bag-1"----300kg.\r\n\r\n\r\n', 'Other', '', 550000, '', '', 0, 19, '60032', 'Approved', '2013-07-10 08:01:53', '15-07-2013', ''),
(134, 12, 'Requisition for Casting for Crockeries', 'Requisition raised by Mr.Ashok Singh (Forman)\r\n1.C.I. Casting dies=25 pcs -', 'Other', '', 120000, '', '', 0, 19, '60032', 'Approved', '2013-07-07 19:09:05', '15-07-2013', ''),
(135, 16, 'Cement & Rod needed for building purpose', 'ASAP', 'Material', '', 3115000, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Rod,50 ton,59500,2975000,,2,Cement,350 Select Measurement Unit,400,140000,,,,,Total Costing,3115000,', '', 0, 6, '60012', 'Redirect', '2013-07-07 20:28:47', '16-07-2013', ''),
(136, 17, 'Subcontractor Payment', 'For Platform in Irshardi', 'Expence', '', 1000000, '', '', 0, 6, '60012', 'Approved', '2013-07-08 14:24:08', '11-07-2013', ''),
(137, 13, 'Polish Motor reparing', 'Requisition Raised by Mr.Shagor(elec .forman)\r\n01.Super enameled copper Wire S.W.G-18=24 kg\r\n02.Super enameled copper Wire S.W.G-19=48 kg\r\n03.Super enameled copper Wire S.W.G-20=24 kg\r\n04. Wire. 2X40/76 (Round)              Coil     = 1 coil', 'Local Purchase', '', 130000, '', '', 0, 19, '60032', 'Redirect', '2013-07-14 10:36:29', '13-07-2013', ''),
(138, 14, 'Crockeries delivery note book', 'Requisition Raised by Mr.Ziaur Rahman (Prod. engineer )\r\n01. Crockeries delivery note book =20 pecs ', 'Other', '', 5000, '', '', 0, 19, '60032', 'Approved', '2013-07-12 11:12:03', '15-07-2013', ''),
(139, 15, 'Crockeries delivery note book', 'Requisition Raised by Mr.Ziaur Rahman (Prod. engineer )\r\n01. Crockeries delivery note book =20 pecs ', 'Other', '', 10000, '', '', 0, 19, '60032', 'Approved', '2013-07-16 14:46:40', '15-07-2013', ''),
(140, 16, 'Requisition For Polish Materials', 'Requisition raised by Mr.Mozid Floor Incharge (Crockeries)\r\n1.Shari -1000 Pcs', 'Other', '', 25000, '', '', 0, 19, '60032', 'Redirect', '2013-07-14 10:37:15', '13-07-2013', ''),
(141, 17, 'Requisition For Crockeries ', 'Requisition raised Mr.Biplov Kumar Roy (P.Manager)\r\n1.Life Buoy Soap------------------------------------------------------25 (Ctn)\r\n2.Wheel Soap---------------------------------------------------------20 (ctn)\r\n3.Scotch Tape 2"---------------------------------------------------- 20 Pcs\r\n4.Gas Cutting Nozzle-1/64mm-----------------------------------02 Pcs\r\n5.Cotton Hand Gloves----------------------------------------------50 Pairs\r\n6.Normal Hand Gloves---------------------------------------------200 Pairs\r\n7.Welding Hand Gloves--------------------------------------------200 pairs\r\n8.Lock------------------------------------------------------------------  04 pcs\r\n9.High speed Blade-------------------------------------------------36 pcs\r\n10.Stand fan 24"------------------------------------------------------02 Pcs\r\n11.Trolly Wheel 8"----------------------------------------------------02 pcs\r\n12.Bearing- 32206----------------------------------------------------06 Pcs\r\n13.Grinding stone-4"--------------------------------------------------20 Pcs\r\n14.Custing Dies-(105x1.2x16mm)---------------------------------20 Pcs\r\n15.Printer (Samsung)-------------------------------------------------01 Pcs\r\n', 'Other', '', 120000, '', '', 0, 19, '60032', 'New', '2013-07-24 01:52:30', '12-08-2013', ''),
(142, 18, 'Requisition For Crockeries New proposed Shed', 'Requisition raised by Mr.Biplov Kumar Roy\r\n1.Weldinr Rod(Vortic Marine)-4mm------------------------------40 Pack\r\n2.Weldinr Rod(Vortic Marine)-3.2 mm----------------------------15  Pack\r\n3.Grainding Stone-7"-------------------------------------------------60 Pcs\r\n4.Gas Cutting Nozzle-1/64 mm------------------------------------02 Pcs\r\n5.Matam-6"-------------------------------------------------------------01 Pcs\r\n6. Roller (S.S )-12"-----------------------------------------------------02 pcs\r\n7.Welding Holder------------------------------------------------------06 Pcs\r\n8.Welding Hand Gloves-----------------------------------------------10 Pairs\r\n9.Welding Glass(Black)-12 No----------------------------------------10 Pcs\r\n', 'Other', '', 55000, '', '', 0, 19, '60032', 'New', '2013-07-24 02:04:16', '12-08-2013', ''),
(143, 19, 'Requisition Industries For Electric Department', 'Requisition Raised By Mr.Sagor (Electric Fore Man)\r\n1.P.V.C Tape---------------------------------------------------------30 pcs\r\n2.100 W Bulb (Thread Type)-------------------------------------10 pcs\r\n3.200 W Bulb (Thread Type)-------------------------------------06 Pcs\r\n4. 400 W Halogen Marcary Lamp-------------------------------02 Pcs\r\n5. Two pin Socket -------------------------------------------------24 Pcs\r\n6.cable Tie (300 mm)---------------------------------------------05 pack\r\n7.cable Tie (250 mm) --------------------------------------------10 Pack\r\n8.cable Tie(200 mm)----------------------------------------------05 Pack\r\n9.cable Tie(150 mm)----------------------------------------------05 Pack\r\n10.Super Enameled Copper Wire (24 SWG)-------------------05 Kg\r\n11.Super Enameled Copper Wire (28 SWG)-------------------05 Kg\r\n12.Super Enameled Copper Wire (30 SwG)--------------------05 Kg\r\n13.Wire (1x4 RM)---------------------------------------------------03 Coil\r\n14 Wire (2x40/0.76 RM)--------------------------------------------02 Coil\r\n15.Capacitor (40 MF)-----------------------------------------------02 Pcs\r\n16.Capacitor (25 MF)-----------------------------------------------03 Pcs\r\n17.Capacitor (4.5 MF)----------------------------------------------06 Pcs\r\n18.Capacitor (3.5 MF)---------------------------------------------12 Pcs\r\n19.MCB (TP-10 A)--------------------------------------------------12 Pcs\r\n20. Pendant Holder (Thread Type)------------------------------24 pcs\r\n21.Carbon Brush-4"------------------------------------------------10 Pcs\r\n22. Royal Bolt-(10 No)---------------------------------------------50 Pcs\r\n23.Insulating Burnish(1 Litre)-------------------------------------15 Can\r\n24. Ampere Tube-(2 No)--------------------------------------------200 Pcs\r\n25.Soldering Iron(45 W)---------------------------------------------01 Pcs\r\n26.Soldering Shaker ---------------------------------------------------01 Pcs\r\n27. Rajon-----------------------------------------------------------------250 gm\r\n\r\n\r\n\r\n', 'Other', '', 95000, '', '', 0, 19, '60032', 'New', '2013-07-24 02:38:29', '12-08-2013', ''),
(144, 20, 'Requisition For S.S Pipe Plant', 'Requisition For Raised Mr.Biplov Kumar Roy.\r\n\r\n1.Cutting Disc-14"----------------------------------------100 Pcs\r\n2.Grease H.T----------------------------------------------- 0.5 Kg\r\n3.Cutting Oil------------------------------------------------05 Liter\r\n4.Hammer (5 lb)-------------------------------------------01 Pcs\r\n5.Vernier Clipper (6"-0.02 mm)------------------------01 Pcs\r\n6.V-Belt (A-24)---------------------------------------------20 Pcs\r\n7.V-Belt (B-43)---------------------------------------------30 Pcs\r\n8.V-Belt (B-36)---------------------------------------------30 Pcs\r\n9.V-Belt (B-49)---------------------------------------------10 Pcs\r\n10.Flat Belt-(1"x 6 mm)----------------------------------100 Ft\r\n11.Bearing (6205)-------------------------------------------20 Pcs\r\n12.Bearing (6206)-------------------------------------------10 Pcs\r\n13.Bearing (6207)-------------------------------------------05 Pcs', 'Other', '', 40000, '', '', 0, 19, '60032', 'View', '2013-07-25 18:09:02', '12-08-2013', ''),
(145, 21, 'Requisition For Entertainment(Office)', 'Requisition For raised Mr.rafiqul Islam (A/C)\r\n1. Sugger--------------------------------------------------30 Kg\r\n2.Biscuit--------------------------------------------------18 Ctn\r\n3.Tea-------------------------------------------------------05 Kg\r\n4.Facial Tissue Paper-----------------------------------06 Box\r\n5.Mum water---------------------------------------------12 Pcs\r\n6.Testy saline---------------------------------------------01 Ctn\r\n7.Register book(8 No)------------------------------------03 Pcs\r\n8.Adonil-----------------------------------------------------10 Pcs\r\n', 'Local Purchase', '', 11000, '', '', 0, 19, '60032', 'View', '2013-07-25 18:08:07', '12-08-2013', ''),
(146, 22, 'Requisition of Medicine For industries', 'Requisition For Raised  Al-Haz Sharif Abdul kayum (Factory Manager)\r\n1.Napa Extra-(500 mg)----------------------------------------------------------------400 Pcs\r\n2. Provisep lotion (100 ml)-----------------------------------------------------------15 Pcs\r\n3.Bandage -4"----------------------------------------------------------------------------96 pcs\r\n4.Cotton-----------------------------------------------------------------------------------20 Pack\r\n5. Haxisol-(250 ml)----------------------------------------------------------------------05 Pcs\r\n6.Moxacil-500 mg)-----------------------------------------------------------------------200 pcs\r\n7. Burnol Cream--------------------------------------------------------------------------05 Pcs\r\n', 'Local Purchase', '', 5000, '', '', 0, 19, '60032', 'Approved', '2013-07-25 18:07:05', '12-08-2013', ''),
(147, 23, 'Requisition For S.S pipe Plant ', 'Requisition For raised Mr.Biplov Kumar Roy\r\n1.Argon Gas (Mega Cylinder)-----------------------------408 Litre (Refill)\r\n', 'Local Purchase', '', 135000, '', '', 0, 19, '60032', 'View', '2013-07-25 18:05:50', '12-08-2013', ''),
(148, 24, 'Requisition For Crockeries New proposed Shed', 'Requisition For Raised By Mr.Biplov Kumar Roy\r\n1.Oxygen---------------------------------------------20 Cylinder\r\n2.L.P Gas---------------------------------------------02 Cylinder', 'Local Purchase', '', 13000, '', '', 0, 19, '60032', 'View', '2013-07-25 18:03:47', '12-08-2013', ''),
(149, 25, 'Requisition For Crockeries(Industries) ', 'Requisition For Raised Mr.Biplov Kumar Roy\r\n1.Bleaching Power------------------------------------05 Kg\r\n2.Harpic (500 ml)-------------------------------------24 Pcs\r\n3 .Diesel-------------------------------------------------1540 Litre\r\n4.kerosene----------------------------------------------10 Litre\r\n5.Gunny bag-(Big)--------------------------------------1500 Pcs\r\n6.Plastic Bag-(Big)--------------------------------------3500 pcs\r\n7.Plastic D hop-(Big)-----------------------------------2000 Pcs \r\n\r\n', 'Local Purchase', '', 226000, '', '', 0, 19, '60032', 'View', '2013-07-25 18:02:52', '12-08-2013', ''),
(150, 26, 'Requisition For Crockeries ', 'Requisition For raised Mr. Ashok Singh (Indian Fore Man)\r\n1.M.S Round Plate-(11.5"x1.5")------------------------------------02 Pcs\r\n2.M.S Round Plate-(12"x1.5")---------------------------------------01 Pcs\r\n3.M.S Round Plate-(11"x1.5")----------------------------------------01 Pcs\r\n4.M.S Round Plate-(13"x1.5")----------------------------------------01 Pcs\r\n5.M.S Round plate-(14"x1.5")---------------------------------------01 Pcs\r\n6.Oil Seal-(2 mm)------------------------------------------------------20 Miter\r\n7.Oil Seal-(3 mm)-------------------------------------------------------20 Miter\r\n8.Oil seal-(4 mm)-------------------------------------------------------20 Miter', 'Other', '', 10000, '', '', 0, 19, '60032', 'Approved', '2013-07-25 18:01:58', '25-07-2013', ''),
(151, 27, 'Requisition For Crockeries ', 'Requisition For raised Mr.Ashok Singh\r\n1.C.I Custing Dies-( Vearaities Size)------------------------------------33 Pcs', 'Other', '', 100000, '', '', 0, 19, '60032', 'View', '2013-07-25 17:23:52', '25-07-2013', ''),
(152, 28, 'Money Requisition For Salary Allowance & Eid Festival', 'Requisition For Raised Mr.Rafiqul Islam(A/C)\r\n1.Salary Allowance For the month of July-2013 =32,00,000\r\n', 'Fund', '', 3200000, '', '', 0, 19, '60032', 'View', '2013-07-25 17:22:41', '30-07-2013', ''),
(153, 29, 'Money Requisition For Eid Festival July-2013', 'Requisition For Raised Mr.Rafiqul Islam (A/C)\r\n1.Eid Festival Allowance -----------------------------=21,00,000\r\n2.Previous Loan Adjustment(P.F)------------------=  6,00,000', 'Fund', '', 2700000, '', '', 0, 19, '60032', 'View', '2013-07-25 17:21:10', '30-07-2013', ''),
(154, 30, 'Requisition For National Hydraulic Oil-68 (Hydraulic machine Purpose)', 'Requisition For Raised Mr.Biplov Kumar Roy (PM)\r\n\r\n1.National Hydraulic Oil-68--------5 Drum.', 'Other', '', 260000, '', '', 0, 19, '60032', 'New', '2013-08-19 02:49:45', '27-08-2013', ''),
(155, 31, 'Requisition Of A1 Max Stricker For Crockeries', 'Requisition For Raised Mr.Biplov Kimar Roy (PM)\r\n\r\n1. Sticker-1.5"(Non-Magnetic)---6,00,000 Pcs.\r\n2. Sticker-2.0" ( Non-Magnetic)--3,00,000 Pcs.\r\n3. Sticker--2.5"(Non-Magnetic)--1,00,000 Pcs.\r\n', 'Other', '', 750000, '', '', 0, 19, '60032', 'New', '2013-08-19 03:04:03', '03-08-2013', ''),
(156, 32, ' Requisition For C.I Custing Dies For Crockeries', 'Requisition For raised Mr. Ashok Singh (Fore Man) Crockeries\r\n\r\n1.C.I Custing Dies(Super Hard)--36 Pcs\r\n', 'Other', '', 250000, '', '', 0, 19, '60032', 'New', '2013-08-19 03:26:26', '07-08-2013', ''),
(157, 33, 'Requisition for Polish Materials for Crockeries', 'Requisition for Raised Mr. Mozid (F.In Charge Cro).\r\n1. Sari-----------------------------------------1,000 pcs.\r\n2. Colour Jute-------------------------------500 kgs', 'Other', '', 50000, '', '', 0, 19, '60032', 'New', '2013-08-19 04:22:28', '20-08-2013', ''),
(158, 34, 'Requisition for Polish & Other  Materials for Crockeries', 'Requisition for Raised by Mr.Biplob Kumer Roy (PM).\r\n1.Co lour Jute-----------------------------500 k gs.\r\n2.Iron Chalk------------------------------24 pecs.\r\n3.Scotch Tape- 2''''---------------------------20 pecs.\r\n4. Marker Pen(Dollar)----------------06 Dozen.\r\n5. Buff- 4''''--------------------------------50 pecs.\r\n\r\n\r\n', 'Other', '', 40000, '', '', 0, 19, '60032', 'New', '2013-08-19 04:38:54', '31-08-2013', ''),
(159, 35, 'Requisition for S S Pipe Plant', 'Requisition for Raised Eng Mr. Shahin Sarwar.(Asst. Eng. Prod).\r\n1. Jute Rope ----------------------------------------20 kg.\r\n2. Hose Pipe 10mm------------------------------50'' (Feet).\r\n3. Buff  -4'''' (120 No)-----------------------------20 pcs.\r\n4. Grinding Stone- 4''''----------------------------20 pcs.\r\n5. Fast Gum----------------------------------------10 pcs.\r\n 6. Argon Gas (7m3)-----------------------------10 Cylinder.\r\n  ', 'Other', '', 120000, '', '', 0, 19, '60032', 'New', '2013-08-19 04:55:53', '31-08-2013', ''),
(160, 36, 'Requisition for Polish Materials for Crockeries.', 'Requisition for Raised Mr. Mozid (F. In Charge).\r\n1.Electro Coated Abrasive -4''''xP 100 --------------------=1 Roll.\r\n2. Roller (s,s 24'''')-----------------------------------------------=02 pcs.', 'Other', '', 5000, '', '', 0, 19, '60032', 'New', '2013-08-19 05:05:04', '24-08-2013', ''),
(161, 37, 'Requisition for S S Pipe Plant', 'Requisition for Raised Mr. Mizanur Rahman(F. Supervisor).\r\n\r\n1. Cotton Hand Gloves------------------------=08 Dozen.', 'Other', '', 5000, '', '', 0, 19, '60032', 'New', '2013-08-19 05:10:06', '31-08-2013', ''),
(162, 38, 'Money Requisition for Industries', 'Requisition for Raised Mr. Rafiqul Islam (Account).\r\n1. Electricity Bill July -2013-------------------=900000.\r\n2. Entertainment (Fooding)-------------------=100000.\r\n3. Adv.a.Zakirul Group.\r\n           b.Asraful Group.\r\n           c.Wohab Group.\r\n           d. Shabu Group.\r\n           e. Earshad Group.  \r\n           f. Nurul Amin Group.\r\n          g. Jahangir Cont.-------------------------=300000.\r\n\r\n4. Local purchase(Soap, Plastic Bag\r\n  ,L.P Gas, Oxygen Gas etc---------------------=200000\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Fund', '', 1500000, '', '', 0, 19, '60032', 'New', '2013-08-19 05:27:44', '20-08-2013', ''),
(163, 39, 'Money Requisition for Industries', 'Requisition for Raised by Mr. Rafiqul Islam(Account).\r\n\r\n1. Advance money against New Shade work --------=500000\r\n2. Repair & Maintenance (Factory & Cover Van)----=100000\r\n3. Bricks , Broken Bricks sand & Sand-----------------= 100000', 'Fund', '', 700000, '', '', 0, 19, '60032', 'New', '2013-08-22 08:25:44', '22-08-2013', ''),
(164, 40, 'Requisition For New Shed ', 'Requisition For Raised By Mr.Biplob Kumar Roy (PM)\r\n1.Welding Rod 4.00mm................100 Pack\r\n2.Welding Rod 3.20mm................   10 Pack\r\n3.Red Oxide....................................  50 Liter\r\n4.Cup Brush 2"...............................   25 Pcs\r\n5.Welding Hand Gloves..................  20 Pair\r\n6.Normal Hand Gloves .................    50 Pair\r\n7.Print Brush 4"..............................     02 Pcs\r\n8.Print Brush 3"................................. 02 Pcs\r\n9.Print Brush 2"..................................02 Pcs\r\n10.Welding Holder............................  20 Pcs\r\n', 'Other', '', 150000, '', '', 0, 19, '60032', 'New', '2013-09-01 02:47:06', '05-09-2013', ''),
(165, 41, 'Requisition Of Polish Materials For Crockeries', 'Requisition For Raised By Mr.Mozid ( Floor In charge)\r\n1.Life Buoy Soap ......................25 cartons\r\n2.Wheel Soap........................... 20 cartons\r\n3.Bearing 6203......................... 20 Pcs\r\n4. Kerosene................................20 Liter\r\n5.Two pin Plug...........................24 Pcs\r\n6.G.I wire  16 No .......................05 Kg\r\n7.Plastic Rope............................10 Kg\r\n8.Plastic Bag Big Size..............1000 Pcs\r\n9.Plastic Bag (Droop)..............1000 Pcs\r\n10.Gunny Bag ..........................1000 Pcs\r\n \r\n', 'Other', '', 150000, '', '', 0, 19, '60032', 'New', '2013-09-01 02:55:36', '03-09-2013', ''),
(166, 42, 'Requisition Of Railing For New Office', 'Requisition For Raised By Mr.Biplob Kumar Roy (PM)\r\n1.S.S Pipe 1.25"--------------------------150 Feet\r\n2.S.S Pipe 2" * 2mm......................... 170 Feet\r\n3.S.S Pipe 1/2"...................................550 Feet\r\n', 'Other', '', 100000, '', '', 0, 19, '60032', 'New', '2013-09-01 03:03:23', '03-09-2013', ''),
(167, 43, 'Requisition of Electric Section for Polish Motor Bainding', 'Requisition for Raised Mr. Sagor (Electric Forman)\r\n1.Super Enamelled Copper Wire (SWG-19) ----------------48 kg\r\n2. Super Enamelled Copper Wire (SWG-20)-----------------48 kg\r\n3. Gear Polar 200 mm -------------------------------------------1Pc\r\n4. Ring / Dull 19 --------------------------------------------------2 Pcs \r\n5. Ring / Dull 21 -------------------------------------------------2 Pcs\r\n6. Cable Cutter ---------------------------------------------------1 Pc\r\n7. Volium 5K ------------------------------------------------------5 Pcs\r\n8. Volium 3K ------------------------------------------------------3 Pcs\r\n9. Volium 2K ------------------------------------------------------3 Pcs\r\n10. Resistance 3K ------------------------------------------------5 Pcs\r\n11. Scissor 10'''' ----------------------------------------------------1 Pc\r\n\r\n\r\n\r\n    ', 'Other', '', 100000, '', '', 0, 19, '60032', 'New', '2013-09-01 03:54:20', '10-09-2013', ''),
(168, 44, 'Requisition For S.S Pipe plant', 'Requisition For raised By Mr.Sagor (Electric Fore Man) & Mr.Shahin Srwar (Asst.Engr.S.S Pipe Plant)\r\n1.Magnetic Contractor (25 A & 220 v).........3 Pcs\r\n2. Volume (10 K ).........................................6 Pcs.\r\n3.G.F.C Stand Fan 24"...................................2 Pcs.\r\n4.Bearing 6205.............................................10 Pcs.\r\n5.Bearing 6207.............................................04 Pcs\r\n6.Compressor Oil --------------------------------01 Liter.\r\n7. 4" Hand Grinding machine........................01 Pcs\r\n \r\n ', 'Other', '', 15000, '', '', 0, 19, '60032', 'New', '2013-09-03 08:33:39', '05-09-2013', ''),
(169, 45, 'Requisition For Requisition Book.', 'Requisition For Raised By Mr.Biplov Kumar Roy.\r\n1.Material Requisition Book(Crockeries).....................50  book/Pcs\r\n2.Material Requisition Book ( S.S Pipe Plant)...............25 Book/Pcs', 'Other', '', 5000, '', '', 0, 19, '60032', 'New', '2013-09-03 08:38:48', '12-09-2013', ''),
(170, 46, 'Requisition Of Polythene Bag For Crockeries.', 'Requisition For Raised By Mr.Biplov Kumar Roy.\r\n1.polythene  Bag 12"...................300 Kg.\r\n2.polythene Bag 14"....................300 Kg.\r\n3.Polythene Bag 16".....................500 Kg.\r\n4.Polythene bag 20"......................500 Kg.\r\n', 'Other', '', 416000, '', '', 0, 19, '60032', 'New', '2013-09-03 08:43:22', '12-09-2013', ''),
(171, 47, 'Requisition Of Boot,Shocks etc. For security Guard.', 'Requisition For Raised By Mr.IftiKhar Uddin Security Chief.\r\n1.Boot (Size -8 No).................2 Pairs.\r\n2.Boot ( Size-9 No).................3 pairs.\r\n3.Boot(Size-10 No)..................1 pair.\r\n4.Shocks (Black).....................36 pairs.\r\n5.Belt......................................20 Pcs\r\n6.Applied Shoulder..................30 Pairs.\r\n7. Whistle ................................12 Pcs.\r\n8.Liner/Brush............................12 Pcs.\r\n9. Steeve Base..........................04 Pcs.\r\n10.Guarder For Boot..................36 pairs.\r\n11.Shoulder rank(Star)................04 Pairs.\r\n', 'Other', '', 15000, '', '', 0, 19, '60032', 'New', '2013-09-03 09:00:38', '05-09-2013', '');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_destination`
--

CREATE TABLE IF NOT EXISTS `requisition_destination` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_destination`
--

INSERT INTO `requisition_destination` (`name`, `id`) VALUES
('Finance', 1),
('Finance & Accounts', 2),
('Comercial', 3),
('Marketing', 4),
('Supply Chain Management', 5),
('Legal Affairs', 6),
('Logigistic & Opeeration', 7),
('HRD', 8);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_user`
--

CREATE TABLE IF NOT EXISTS `requisition_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `location_id` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `requisition_user`
--

INSERT INTO `requisition_user` (`id`, `user_id`, `location_id`, `post`, `active`, `date_added`) VALUES
(1, 1, 'central', 'Hub Admin', 'active', '2013-05-07 04:07:36'),
(3, 6, '60012', 'Raiser', 'active', '2013-06-06 11:01:21'),
(5, 7, '60011', 'Raiser', 'active', '2013-06-06 11:10:56'),
(6, 8, '60011', 'Raiser', 'active', '2013-06-06 11:18:51'),
(7, 8, '60011', 'Raiser', 'active', '2013-06-06 11:31:01'),
(8, 9, 'central', 'SCM', 'active', '2013-06-06 11:36:46'),
(9, 10, 'central', 'Accountant', 'active', '2013-06-06 11:37:17'),
(10, 11, 'central', 'Boss', 'active', '2013-06-06 11:39:26'),
(11, 13, 'central', 'Accountant', 'active', '2013-06-09 21:38:05'),
(13, 14, 'central', 'Accountant', 'active', '2013-06-09 23:47:09'),
(14, 15, '60022', 'Boss', 'active', '2013-06-26 22:39:35'),
(17, 16, '60022', 'Raiser', 'active', '2013-06-27 07:41:44'),
(18, 17, 'central', 'Accountant', 'active', '2013-06-27 08:08:00'),
(19, 18, '60032', 'Boss', 'active', '2013-06-27 10:42:10'),
(20, 19, '60032', 'Raiser', 'active', '2013-06-27 10:46:19'),
(21, 20, 'central', 'Accountant', 'active', '2013-06-27 10:53:41'),
(23, 22, 'central', 'Hub Admin', 'active', '2013-07-03 09:58:24'),
(24, 23, 'central', 'Boss', 'active', '2013-07-03 13:46:44'),
(25, 24, 'central', 'Boss', 'active', '2013-07-03 13:53:39'),
(26, 25, 'central', 'Boss', 'active', '2013-07-03 13:54:45'),
(27, 26, 'central', 'Hub Admin', 'active', '2013-07-10 11:34:06'),
(28, 27, 'central', 'Boss', 'active', '2013-07-18 08:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `req_hub`
--

CREATE TABLE IF NOT EXISTS `req_hub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `req_hub`
--

INSERT INTO `req_hub` (`id`, `req_id`, `location`, `date_updated`) VALUES
(1, 22, 'central', '2013-02-05 07:29:02'),
(2, 55, '40122', '2013-02-05 07:29:38'),
(3, 45, 'central', '2013-02-05 07:35:31'),
(4, 46, '41201', '2013-02-05 07:38:31'),
(5, 47, '41201', '2013-02-05 07:52:37'),
(6, 48, '41201', '2013-02-05 07:55:36'),
(7, 49, '41201', '2013-02-11 08:26:37'),
(8, 50, '41201', '2013-02-11 08:39:54'),
(9, 51, '41201', '2013-02-11 08:41:54'),
(10, 52, '41201', '2013-02-11 08:22:20'),
(11, 53, '41201', '2013-02-11 08:24:26'),
(12, 54, '41201', '2013-02-11 08:25:44'),
(13, 55, '41201', '2013-02-11 08:39:27'),
(14, 56, '41201', '2013-02-11 08:41:51'),
(15, 57, 'central', '2013-02-16 09:41:24'),
(16, 58, 'central', '2013-02-18 17:20:07'),
(17, 59, '41201', '2013-02-18 17:21:08'),
(18, 60, 'central', '2013-02-18 17:41:06'),
(19, 61, '10011', '2013-04-10 04:00:40'),
(20, 62, '10011.5', '2013-04-10 04:01:57'),
(21, 63, '10011.5', '2013-04-10 04:21:52'),
(22, 64, '10011.5', '2013-04-10 04:28:55'),
(23, 65, '10011.5', '2013-04-10 04:22:32'),
(24, 66, '10011.5', '2013-04-19 04:41:11'),
(25, 67, 'central', '2013-04-19 04:43:21'),
(26, 68, 'central', '2013-04-19 04:18:14'),
(27, 69, '10011.5', '2013-04-20 12:44:57'),
(28, 70, 'site manager', '2013-04-20 11:49:40'),
(29, 71, '10011.6', '2013-04-20 11:51:44'),
(30, 72, '10013.6', '2013-04-20 11:53:00'),
(31, 73, '10011.5', '2013-04-26 03:58:46'),
(32, 74, '10011.4', '2013-04-26 03:59:45'),
(33, 75, '10011.4', '2013-04-27 07:43:34'),
(34, 76, '10011.5', '2013-04-27 08:03:44'),
(35, 77, '10011.5', '2013-04-27 08:15:39'),
(36, 78, '10011.5', '2013-04-27 08:26:30'),
(37, 79, '10011.5', '2013-04-28 12:22:54'),
(38, 80, 'central', '2013-04-28 11:47:46'),
(39, 81, 'central', '2013-04-28 12:31:29'),
(40, 82, '10011.5', '2013-04-28 12:33:54'),
(41, 83, '10011.5', '2013-04-28 12:04:32'),
(42, 84, 'central', '2013-05-02 06:23:09'),
(43, 85, 'MAPL->LCDLP->Chinki Astana->185', '2013-05-02 22:46:53'),
(44, 86, 'MAPL->LCDLP->Chinki Astana->185', '2013-05-02 22:47:55'),
(45, 87, '10011.5', '2013-05-02 23:01:56'),
(46, 88, 'central', '2013-05-02 23:11:34'),
(47, 106, 'central', '2013-06-06 11:47:05'),
(48, 107, 'central', '2013-06-07 20:58:39'),
(49, 108, 'central', '2013-06-07 22:34:47'),
(50, 109, 'central', '2013-06-08 10:53:18'),
(51, 110, 'central', '2013-06-09 10:39:38'),
(52, 111, 'central', '2013-06-09 22:10:15'),
(53, 112, 'central', '2013-06-09 22:15:15'),
(54, 113, 'central', '2013-06-09 22:34:42'),
(55, 114, 'central', '2013-06-09 23:01:24'),
(56, 115, 'central', '2013-06-09 23:19:51'),
(57, 116, 'central', '2013-06-10 09:49:08'),
(58, 117, 'central', '2013-06-17 16:28:03'),
(59, 118, 'central', '2013-06-25 11:14:59'),
(60, 119, 'central', '2013-06-25 13:20:55'),
(61, 120, 'central', '2013-06-26 13:19:43'),
(62, 121, '60022', '2013-06-26 23:57:45'),
(63, 122, 'central', '2013-06-27 07:56:38'),
(64, 123, '60032', '2013-06-27 11:04:24'),
(65, 124, 'central', '2013-06-27 11:15:32'),
(66, 125, '60032', '2013-06-27 11:16:26'),
(67, 126, '60032', '2013-06-28 03:21:49'),
(68, 127, 'central', '2013-06-29 16:36:16'),
(69, 128, 'central', '2013-06-29 16:35:20'),
(70, 129, 'central', '2013-06-29 16:33:28'),
(71, 130, 'central', '2013-07-06 03:38:33'),
(72, 131, 'central', '2013-07-06 03:39:38'),
(73, 132, 'central', '2013-07-06 03:37:27'),
(74, 133, 'central', '2013-07-06 03:36:25'),
(75, 134, 'central', '2013-07-06 03:35:30'),
(76, 135, 'central', '2013-07-07 20:28:14'),
(77, 136, 'central', '2013-07-07 20:30:00'),
(78, 137, 'central', '2013-07-12 11:13:08'),
(79, 138, '60032', '2013-07-09 03:27:13'),
(80, 139, '60032', '2013-07-09 03:28:50'),
(81, 140, 'central', '2013-07-12 11:08:44'),
(82, 141, '60032', '2013-07-24 01:52:30'),
(83, 142, '60032', '2013-07-24 02:04:16'),
(84, 143, '60032', '2013-07-24 02:38:29'),
(85, 144, 'central', '2013-07-25 18:09:02'),
(86, 145, 'central', '2013-07-25 18:08:07'),
(87, 146, '60032', '2013-07-24 03:09:33'),
(88, 147, 'central', '2013-07-25 18:05:50'),
(89, 148, 'central', '2013-07-25 18:03:47'),
(90, 149, 'central', '2013-07-25 18:02:52'),
(91, 150, '60032', '2013-07-24 03:48:22'),
(92, 151, 'central', '2013-07-25 17:23:52'),
(93, 152, 'central', '2013-07-25 17:22:41'),
(94, 153, 'central', '2013-07-25 17:21:10'),
(95, 154, '60032', '2013-08-19 02:49:45'),
(96, 155, '60032', '2013-08-19 03:04:03'),
(97, 156, '60032', '2013-08-19 03:26:26'),
(98, 157, '60032', '2013-08-19 04:22:28'),
(99, 158, '60032', '2013-08-19 04:38:54'),
(100, 159, '60032', '2013-08-19 04:55:53'),
(101, 160, '60032', '2013-08-19 05:05:04'),
(102, 161, '60032', '2013-08-19 05:10:06'),
(103, 162, '60032', '2013-08-19 05:27:44'),
(104, 163, '60032', '2013-08-22 08:25:44'),
(105, 164, '60032', '2013-09-01 02:47:06'),
(106, 165, '60032', '2013-09-01 02:55:36'),
(107, 166, '60032', '2013-09-01 03:03:23'),
(108, 167, '60032', '2013-09-01 03:54:20'),
(109, 168, '60032', '2013-09-03 08:33:39'),
(110, 169, '60032', '2013-09-03 08:38:48'),
(111, 170, '60032', '2013-09-03 08:43:22'),
(112, 171, '60032', '2013-09-03 09:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `name`, `designation`, `office`) VALUES
(1, 'Md. Abdul Wahab', 'Project,  Co-ordinator', 'Cantonment Office (Site)'),
(2, 'Md. Abdullah', 'PM-LCDL', 'Cantonment Office (Site)'),
(3, 'M.Ebrahim Khalil', 'PM-CSYR', 'Cantonment Office (Site)'),
(4, 'Nhek Thivuth', 'Cons.Manager', 'Cantonment Office (Site)'),
(5, 'Mr.Mahfuzzaman.Zoha', 'DPM-LCDL', 'Cantonment Office (Site)'),
(6, 'Mr.Nazrul Islam Khan', 'QA/QC Manager', 'Cantonment Office (Site)'),
(7, 'Mr.A M M Yahya', 'PM(S&T)', 'Cantonment Office (Site)'),
(8, 'Amully Kumer Basak', 'Quality Surveyor', 'Cantonment Office (Site)'),
(9, 'Md.Jahangir Hossain', 'Structural Engineer', 'Cantonment Office (Site)'),
(10, 'Kandoker Deloer Hossain', 'Asst. Quality Searver', 'Cantonment Office (Site)'),
(11, 'Md. Rashedul Islam Pavel', 'Chief.Accountant', 'Cantonment Office (Site)'),
(12, 'Md.Habibur Rahman', 'Auto CAD Operator', 'Cantonment Office (Site)'),
(13, 'Md.Ziaul Haque Sarker', 'Auto CAD Operator', 'Cantonment Office (Site)'),
(14, 'Md. Hanif', 'Advisor,Bridge', 'Cantonment Office (Site)'),
(15, 'Md. Ariful Rahman', 'IT, Engr.', 'Cantonment Office (Site)'),
(16, 'AZM Mafuzzaman', 'DPM-LCDL', 'Cantonment Office (Site)'),
(17, 'Proloy Kanti Saha', 'Executive, Acc', 'Cantonment Office (Site)'),
(18, 'Md.Rofiqul Islam', 'Logistic, Manager', 'Cantonment Office (Site)'),
(19, 'Engr.Md.Shajahan Alam', 'Project, Director (Bridge&Culvert)', 'Cantonment Office (Site)'),
(20, 'Leonardo Rozario', 'Transport, Manager', 'Cantonment Office (Site)'),
(21, 'Md. Gulam Moula', 'Environment,  Specilist', 'Cantonment Office (Site)'),
(22, 'Abdul Kuddus', 'System, Analyst', 'Cantonment Office (Site)'),
(23, 'Shafiqul Islam', NULL, 'Cantonment Office (Site)'),
(24, 'Delowar', NULL, 'Cantonment Office (Site)'),
(25, 'Abdulla Al -mamun', 'Procurement, Manager', 'Cantonment Office (Site)'),
(26, 'Tarikul islam Rajib', 'Asst, Acc', 'Cantonment Office (Site)'),
(27, 'Faruk Hossain', 'Comp, Opt(proj)', 'Cantonment Office (Site)'),
(28, 'Mr. Asiqure Rahman', NULL, 'Cantonment Office (Site)'),
(29, 'Gouranga Sikder', 'Executive, Accounts', 'Cantonment Office (Site)'),
(30, 'Joy Chatterjee', 'Asst, Manager', 'Cantonment Office (Site)'),
(31, 'Khurshed Alam', 'Sr.Exec, Accounts', 'Cantonment Office (Site)'),
(32, 'Liton Kumar Shaha', 'Manager, Acc.(project)', 'Cantonment Office (Site)');

-- --------------------------------------------------------

--
-- Table structure for table `sites_factories`
--

CREATE TABLE IF NOT EXISTS `sites_factories` (
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites_factories`
--

INSERT INTO `sites_factories` (`name`, `type`, `id`, `project`) VALUES
('sample site 1', 'site', 1, 'sample project 1'),
('sample site 2', 'site', 2, 'sample project 1'),
('sample factory 1', 'factory', 1, 'Max Lubricant'),
('sample factory 2', 'factory', 2, 'Max Lubricant'),
('sample factory 3', 'factory', 3, 'Max Lubricant'),
('sample site 1', 'site', 1, 'sample project 2'),
('sample site 2', 'site', 2, 'sample project 5'),
('sample site 7', 'site', 7, 'sample project 6'),
('abc', '', 12, 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `staff_level`
--

CREATE TABLE IF NOT EXISTS `staff_level` (
  `designation` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_level`
--

INSERT INTO `staff_level` (`designation`, `level`) VALUES
('Chairman', '1'),
('MD', '2'),
('Manager', '3'),
('Supervisor', '4');

-- --------------------------------------------------------

--
-- Table structure for table `stages_of_requisition`
--

CREATE TABLE IF NOT EXISTS `stages_of_requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `instruction` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stages_of_requisition`
--

INSERT INTO `stages_of_requisition` (`id`, `name`, `instruction`) VALUES
(1, 'raise', 'raised by raisereee'),
(2, 'delivered', 'delivered by scm'),
(3, 'approve', 'approved by bossssss');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_master`
--

CREATE TABLE IF NOT EXISTS `supplier_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `idtasks` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `finish_date` varchar(20) NOT NULL,
  `status` varchar(45) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `users_idusers` int(11) NOT NULL,
  `feedbacks_idfeedbacks` int(11) NOT NULL,
  PRIMARY KEY (`idtasks`,`users_idusers`,`feedbacks_idfeedbacks`),
  UNIQUE KEY `users_idx` (`users_idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_staff`
--

CREATE TABLE IF NOT EXISTS `test_staff` (
  `test` int(11) NOT NULL,
  UNIQUE KEY `test` (`test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_staff`
--

INSERT INTO `test_staff` (`test`) VALUES
(104072),
(104073),
(104074),
(104076),
(106656),
(109047),
(122064),
(122066),
(204071),
(204072),
(204073),
(204074),
(206083),
(206084),
(206087),
(206442),
(300021),
(300094),
(300441),
(300443),
(300446);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_req`
--

CREATE TABLE IF NOT EXISTS `type_of_req` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `handled_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_req`
--

INSERT INTO `type_of_req` (`name`, `id`, `handled_by`) VALUES
('Local Purchase', 1, 'Local Hub'),
('Spare Parts', 2, 'Local Hub'),
('Service Charge', 3, 'Local Hub'),
('Recruitment', 4, 'Main Hub'),
('Expence', 5, 'Main Hub'),
('Fund', 6, 'Main Hub'),
('Material', 7, 'Main Hub'),
('Other', 8, 'Local Hub');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE IF NOT EXISTS `unit_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`id`, `name`, `date_added`) VALUES
(1, 'ton', '2013-05-25 06:07:00'),
(2, 'kg', '2013-05-25 06:07:00'),
(3, 'pc', '2013-05-25 06:07:00'),
(4, 'Unit', '2013-06-25 14:57:30'),
(5, 'CFt', '2013-06-25 14:58:03'),
(6, 'Container', '2013-06-25 14:58:24'),
(7, 'Liter', '2013-06-25 14:58:35'),
(8, 'sq ft', '2013-07-03 09:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `master` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `site_factory` varchar(100) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `last_update_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `name`, `email`, `contact`, `staff_id`, `password`, `master`, `department`, `project`, `site_factory`, `designation`, `image`, `last_update_date_time`) VALUES
(72, 'sample user 7', 'sampleuser7@yahoo.com', '01710123333', 108023, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site supervisor', '47336_488967517815122_1966545043_n (2).jpg', '2012-12-24 22:46:37'),
(73, 'sample user 1', 'sampleuser1@yahoo.com', '01710123433', 104077, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 6', 'sample site 7', 'site manager', '47336_488967517815122_1966545043_n (3).jpg', '2012-12-24 22:51:43'),
(74, 'sample admin 1', 'sampleadmin1@yahoo.com', '01705007007', 888800, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'admin', '', '0000-00-00 00:00:00'),
(76, 'sample super admin 1', 'samplesuperadmin1@yahoo.com', '01710007007', 888888, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'super admin', '47336_488967517815122_1966545043_n.jpg', '0000-00-00 00:00:00'),
(77, 'fahad', 'fahadbillah@yahoo.com', '01671026001', 0, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'webdeveloper', '', '2013-01-06 22:14:27'),
(78, 'xyz', 'fahadbillah@yahoo.com', '01671026001', 155015, '', '', '', '', '', '', '', '2013-01-07 08:47:00'),
(79, 'sample corporate user', 'samplecorporateuser1@yahoo.com', '123456789', 100001, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', '', '', 'Manager', '', '2013-01-07 08:59:25'),
(80, 'sample corporate user', 'samplecorporateuser2@yahoo.com', '123456789', 199001, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Marketing', '', '', 'Deputy Manager', '47336_488967517815122_1966545043_n (4).jpg', '2013-01-07 09:08:37'),
(81, 'sample corporate user3', 'samplecorporateuser3@yahoo.com', '123456789', 199002, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Finance', '', '', 'Additional Manager', '', '2013-01-07 09:04:44'),
(82, 'sample corporate user4', 'samplecorporateuser4@yahoo.com', '123456789', 199003, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Finance', '', '', 'GM', '', '2013-01-07 09:23:16'),
(83, 'sample corporate user5', 'samplecorporateuser5@yahoo.com', '12345678', 199004, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Accounts', '', '', 'GM', '', '2013-01-07 09:24:28'),
(84, 'sample corporate user 6', 'samplecorporateuser6@yahoo.com', '12345678', 199005, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Accounts', '', '', 'Manager', '', '2013-01-07 09:48:32'),
(85, 'sample corporate user 9', 'samplecorporateuser9@yahoo.com', '123544235', 199006, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Logigistic & Operation', '', '', 'GM', '', '2013-01-19 01:12:56'),
(86, 'sample user 20', 'sampleuser20@yahoo.com', '098787687', 108024, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site supervisor', '', '2013-01-20 07:28:11'),
(87, 'sample user 21', 'sampleuser21@yahoo.com', '0998987986', 108025, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site manager', '', '2013-01-20 07:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_by_location`
--

CREATE TABLE IF NOT EXISTS `user_by_location` (
  `user_id` int(11) NOT NULL,
  `location_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_by_location`
--

INSERT INTO `user_by_location` (`user_id`, `location_id`) VALUES
(5, '6'),
(5, '7'),
(6, '7'),
(7, '7'),
(9, '6'),
(10, '6'),
(11, '1000101002'),
(12, '1000101002'),
(12, '1000101002'),
(11, '10011'),
(11, '10011.3'),
(21, '10011.4'),
(22, '10011.4'),
(23, '10011.4'),
(23, '10011.6'),
(25, '10011.5'),
(26, '10011.5'),
(28, '10011.5'),
(24, '10011.5'),
(27, '10011.4'),
(41, '10013.6'),
(42, '10013.6'),
(43, '10013.6'),
(44, '10013.6');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_details`
--

CREATE TABLE IF NOT EXISTS `user_login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_login_details`
--

INSERT INTO `user_login_details` (`id`, `user_id`, `email`, `password`, `date`) VALUES
(1, 1, 'ahk.tuhin@gmail.com', 'Fkvhiqrb/UDXyzf3kE6AqDNrLX0qNjMlRGYqI0A=', '2013-05-07 03:09:48'),
(4, 4, 'fahadcash1@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-06-05 15:31:35'),
(5, 5, 'fahadbillah@yahoo.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-06-05 15:34:58'),
(6, 6, 'muniruddin19@yahoo.com', '8qcCC0vGqKT2CXD1+T/J3sWMAdoqNjMlRGYqI0A=', '2013-06-06 11:02:56'),
(9, 9, 'minhajscm.max@gmail.com', 'naBovlXFPebg3Umed/QpqQ1arroqNjMlRGYqI0A=', '2013-06-06 11:41:36'),
(10, 10, 'mxmuzahid@yahoo.com', 'ysBioCC1Y9Ddvtx+a7QqTBZVlwYqNjMlRGYqI0A=', '2013-06-06 11:42:03'),
(11, 11, 'zulkerv8@gmail.com', 'zE5XAFaTNZqupl/ziQmArV4xkaUqNjMlRGYqI0A=', '2013-06-06 11:42:26'),
(12, 13, 'omar@maxgroup-bd.com', '+Oa+dXVtWVuNWjG54kO5LWeJgiMqNjMlRGYqI0A=', '2013-06-09 21:50:47'),
(13, 15, 'dhar.dhaka@gmail.com', '5N+o7ozmPmaA5OvT1o7vums7whkqNjMlRGYqI0A=', '2013-06-26 23:53:14'),
(14, 16, 'saha.bhairab@gmail.com', 'ehodwEQDBmpYEaabjLavE6bvZSYqNjMlRGYqI0A=', '2013-06-27 07:44:55'),
(15, 17, 'mehedi.zaman05@gmail.com', 'IrQr9hnoZfTmkuehm0CIBIMUsDkqNjMlRGYqI0A=', '2013-06-27 08:15:22'),
(16, 18, 'biplov_007@yahoo.com', 'nC61pMTacYafT6qdCp/bx1CKYZUqNjMlRGYqI0A=', '2013-06-27 10:49:46'),
(17, 19, 'nizam486399@gmail.com', 'Sgz0KGsW1mcsW3TxWu99liu6414qNjMlRGYqI0A=', '2013-06-27 10:51:23'),
(18, 20, 'hossainkabir37@gmail.com', '4QeYYfVFf5uFP0rN9jnOK8uAPJsqNjMlRGYqI0A=', '2013-06-27 10:55:24'),
(21, 22, 'ikteer_max@yahoo.com', '1sSsUZbkFWiR4/EjjLP06Ih/BwgqNjMlRGYqI0A=', '2013-07-03 09:58:52'),
(22, 23, 'gmalomgir2@gmail.com', 'tCVXyOMjDGKjx4oPMl66eSd0iesqNjMlRGYqI0A=', '2013-07-03 13:48:02'),
(23, 25, 'zayed.rail72@gmail.com', 'ZEgJCKHnCah81y5s3W6UzJsyWvQqNjMlRGYqI0A=', '2013-07-03 13:57:11'),
(24, 26, 'sakhawat_max@yahoo.com', 'DFAB2FOUeZpSAkEsVRgQqAnAneMqNjMlRGYqI0A=', '2013-07-10 11:40:59'),
(25, 27, 'tulip_ilip@yahoo.com', '8AnmlWu1/ti1dtmBdo3C5tyevlgqNjMlRGYqI0A=', '2013-07-18 08:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `office_code` varchar(11) NOT NULL,
  `authorization_level` varchar(100) NOT NULL,
  `user_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active_status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `designation`, `office_code`, `authorization_level`, `user_since`, `active_status`) VALUES
(1, 'Tuhin', 'Hub Admin', '00000', 'Hub Admin', '2013-05-07 04:07:35', 'active'),
(6, 'Munir Uddin', 'GM', 'MAX Prestre', 'Approve', '2013-06-06 10:42:11', 'active'),
(9, 'Minhaj', 'Deputy Manager', 'Head Office', 'Execute', '2013-06-06 11:36:46', 'active'),
(10, 'Muzahidul Islam', 'Executive', 'DOHS Office', 'Execute', '2013-06-06 11:37:17', 'active'),
(11, 'Mohammed Zulkernine', 'GM', 'DOHS Office', 'Approve', '2013-06-06 11:39:26', 'active'),
(13, 'Omar Faruk', 'Additional Manager', 'DOHS Office', 'Execute', '2013-06-09 21:38:05', 'active'),
(14, 'arvin', 'GM', 'DOHS Office', 'View', '2013-06-09 23:47:09', 'active'),
(15, 'Bhaskar Dhar', 'Manager', '', 'Approve', '2013-06-26 22:26:09', 'active'),
(16, 'Subrata Saha', 'Sr. Executive', '', 'Raise', '2013-06-27 07:41:12', 'active'),
(17, 'Mehedi Zaman', 'Executive', 'DOHS Office', 'Execute', '2013-06-27 08:08:00', 'active'),
(18, 'Biplov Kumar Roy', 'Manager', '', 'Approve', '2013-06-27 10:41:32', 'active'),
(19, 'MD. Nizam Uddin', 'Sr. Executive', '', 'Raise', '2013-06-27 10:45:25', 'active'),
(20, 'Kabir Hossain', 'Sr. Executive', 'DOHS Office', 'Execute', '2013-06-27 10:53:41', 'active'),
(22, 'Ikteer Uddin', 'Hub Admin', '', 'Hub Admin', '2013-07-03 09:58:24', 'active'),
(23, 'Ghulam Mohammed', 'GM', '', 'Approve', '2013-07-03 13:46:44', 'active'),
(24, 'zayed_rail@yahoo.com', 'GM', '', 'Approve', '2013-07-03 13:53:39', 'active'),
(25, 'Zayedur Rahaman', 'GM', '', 'Approve', '2013-07-03 13:54:45', 'active'),
(26, 'Sakhawat Hossain', 'Hub Admin', '', 'Hub Admin', '2013-07-10 11:34:06', 'active'),
(27, 'Kaniz Saleha (Ilip)', 'Manager', '', 'Approve', '2013-07-18 08:30:02', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_tasks1` FOREIGN KEY (`tasks_idtasks`, `tasks_users_idusers`, `tasks_feedbacks_idfeedbacks`) REFERENCES `tasks` (`idtasks`, `users_idusers`, `feedbacks_idfeedbacks`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_files_comments1` FOREIGN KEY (`comments_idcomments`, `comments_tasks_idtasks`, `comments_tasks_users_idusers`, `comments_tasks_feedbacks_idfeedbacks`) REFERENCES `comments` (`idcomments`, `tasks_idtasks`, `tasks_users_idusers`, `tasks_feedbacks_idfeedbacks`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_files_tasks1` FOREIGN KEY (`tasks_idtasks`, `tasks_users_idusers`, `tasks_feedbacks_idfeedbacks`) REFERENCES `tasks` (`idtasks`, `users_idusers`, `feedbacks_idfeedbacks`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_users` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
