-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2013 at 03:48 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `acc_scm_to_office`
--

INSERT INTO `acc_scm_to_office` (`id`, `user_id`, `location_id`, `date_added`) VALUES
(2, 37, '60021', '2013-06-01 01:30:20'),
(3, 37, '60011', '2013-06-01 01:34:03'),
(5, 37, '10011.5', '2013-06-01 01:26:02'),
(6, 39, '30013', '2013-09-12 00:22:53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=284 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `relation_to_req`, `req_id`, `activities`, `status`, `date`) VALUES
(62, 6, 'Boss', 59, 'admin added,18-02-2013 11:21:08|Approved,18-02-2013 11:49:21', 'Approved', '2013-04-25 23:09:06'),
(63, 5, 'Raiser', 59, 'requisition raised,18-02-2013 11:21:08', 'New', '2013-04-28 07:02:23'),
(73, 11, 'Boss', 58, 'admin added,18-02-2013 11:38:26|Approved,18-02-2013 11:38:33', 'Approved', '2013-04-25 23:09:06'),
(74, 13, '', 58, 'Clear From Accounts,18-02-2013 11:38:51', 'Clear From Accounts', '2013-02-18 11:38:51'),
(76, 11, 'Boss', 60, 'admin added,18-02-2013 11:42:01|Approved,18-02-2013 11:42:32', 'Approved', '2013-04-25 23:09:06'),
(79, 9, 'Accountant', 59, 'accountant added,18-02-2013 11:49:21|Clear From Accounts,18-02-2013 11:50:10', 'Clear From Accounts', '2013-04-25 23:08:04'),
(80, 10, 'SCM', 59, 'scm added,18-02-2013 11:49:21|Delivered,18-02-2013 11:50:19', 'Delivered', '2013-04-25 23:25:15'),
(81, 0, 'Boss', 61, 'admin added,09-04-2013 23:00:40', 'New', '2013-04-25 23:09:06'),
(82, 23, 'Raiser', 61, 'requisition raised,09-04-2013 23:00:40', 'New', '2013-04-28 07:02:23'),
(88, 21, 'Boss', 65, 'admin added,09-04-2013 23:26:12', 'New', '2013-04-25 23:09:06'),
(89, 0, 'Boss', 64, 'admin added,09-04-2013 23:28:55', 'New', '2013-04-25 23:09:06'),
(90, 23, 'Raiser', 64, 'requisition raised,09-04-2013 23:28:55', 'New', '2013-04-28 07:02:23'),
(91, 21, 'Boss', 70, 'admin added,09-04-2013 23:33:38', 'New', '2013-04-25 23:09:06'),
(92, 21, 'Boss', 70, 'admin added,09-04-2013 23:34:00', 'New', '2013-04-25 23:09:06'),
(93, 24, 'Boss', 65, 'admin added,09-04-2013 23:22:32|Approved,09-04-2013 23:36:41|Approved,09-04-2013 22:59:17', 'Approved', '2013-04-25 23:09:06'),
(94, 27, 'Raiser', 65, 'requisition raised,09-04-2013 23:22:32', 'New', '2013-04-28 07:02:23'),
(97, 25, 'Accountant', 65, 'accountant added,09-04-2013 22:59:17', 'New', '2013-04-25 23:08:04'),
(98, 26, 'SCM', 65, 'scm added,09-04-2013 22:59:17', 'New', '2013-04-25 23:25:15'),
(99, 24, 'Boss', 66, 'admin added,18-04-2013 23:41:11|Approved,18-04-2013 22:52:17', 'Approved', '2013-04-25 23:09:06'),
(100, 28, 'Raiser', 66, 'requisition raised,18-04-2013 23:41:11|Solved,18-04-2013 23:31:06', 'Solved', '2013-04-28 07:02:23'),
(101, 28, 'Raiser', 67, 'requisition raised,18-04-2013 23:43:21', 'New', '2013-04-28 07:02:23'),
(102, 25, 'Accountant', 66, 'accountant added,18-04-2013 22:52:17|Clear From Accounts,18-04-2013 22:59:47|Closed,18-04-2013 23:03:56', 'Closed', '2013-04-25 23:08:04'),
(103, 26, 'SCM', 66, 'scm added,18-04-2013 22:52:17|Delivered,18-04-2013 23:03:01', 'Delivered', '2013-04-25 23:25:15'),
(104, 28, 'Raiser', 68, 'requisition raised,18-04-2013 23:18:14|Solved,18-04-2013 22:50:40', 'Solved', '2013-04-28 07:02:23'),
(105, 35, 'Boss', 68, 'admin added,18-04-2013 23:24:01|Approved,18-04-2013 23:36:52', 'Approved', '2013-04-25 23:09:06'),
(106, 13, '', 68, 'Clear From Accounts,18-04-2013 23:38:27|Closed,18-04-2013 22:53:38', 'Closed', '2013-04-18 22:53:38'),
(107, 37, '', 68, 'Delivered,18-04-2013 23:41:24', 'Delivered', '2013-04-18 23:41:24'),
(108, 25, 'Boss', 69, 'admin added,20-04-2013 06:44:57', 'New', '2013-04-25 23:09:06'),
(109, 28, 'Raiser', 69, 'requisition raised,20-04-2013 06:44:57', 'New', '2013-04-28 07:02:23'),
(110, 0, 'Boss', 70, 'admin added,20-04-2013 06:49:40', 'New', '2013-04-25 23:09:06'),
(111, 41, 'Raiser', 70, 'requisition raised,20-04-2013 06:49:40', 'New', '2013-04-28 07:02:23'),
(112, 0, 'Boss', 71, 'admin added,20-04-2013 06:51:44', 'New', '2013-04-25 23:09:06'),
(113, 41, 'Raiser', 71, 'requisition raised,20-04-2013 06:51:44', 'New', '2013-04-28 07:02:23'),
(114, 42, 'Boss', 72, 'admin added,20-04-2013 06:53:00', 'New', '2013-04-25 23:09:06'),
(115, 41, 'Raiser', 72, 'requisition raised,20-04-2013 06:53:01', 'New', '2013-04-28 07:02:23'),
(116, 0, 'Accountant', 115, 'accountant added,20-04-2013 07:00:29', 'New', '2013-04-25 23:08:04'),
(117, 0, 'SCM', 115, 'scm added,20-04-2013 07:00:29', 'New', '2013-04-25 23:25:15'),
(118, 0, 'Accountant', 115, 'accountant added,20-04-2013 07:06:47', 'New', '2013-04-25 23:08:04'),
(119, 0, 'SCM', 115, 'scm added,20-04-2013 07:06:47', 'New', '2013-04-25 23:25:15'),
(120, 0, 'Accountant', 115, 'accountant added,20-04-2013 07:06:58', 'New', '2013-04-25 23:08:04'),
(121, 0, 'SCM', 115, 'scm added,20-04-2013 07:06:58', 'New', '2013-04-25 23:25:15'),
(122, 0, 'Accountant', 10012, 'accountant added,20-04-2013 07:17:52', 'New', '2013-04-25 23:08:04'),
(123, 0, 'SCM', 10012, 'scm added,20-04-2013 07:17:52', 'New', '2013-04-25 23:25:15'),
(126, 25, 'Accountant', 115, 'accountant added,20-04-2013 07:19:17', 'New', '2013-04-25 23:08:04'),
(127, 27, 'SCM', 115, 'scm added,20-04-2013 07:19:17', 'New', '2013-04-25 23:25:15'),
(128, 25, 'Accountant', 115, 'accountant added,20-04-2013 07:20:06', 'New', '2013-04-25 23:08:04'),
(129, 27, 'SCM', 115, 'scm added,20-04-2013 07:20:06', 'New', '2013-04-25 23:25:15'),
(130, 25, 'Boss', 73, 'admin added,25-04-2013 22:58:47', 'New', '2013-04-25 23:09:06'),
(131, 27, 'Raiser', 73, 'requisition raised,25-04-2013 22:58:47', 'New', '2013-04-28 07:02:23'),
(132, 23, 'Boss', 74, 'admin added,25-04-2013 22:59:45', 'New', '2013-04-25 23:09:07'),
(133, 27, 'Raiser', 74, 'requisition raised,25-04-2013 22:59:45', 'New', '2013-04-28 07:02:23'),
(134, 23, 'Boss', 75, 'admin added,27-04-2013 02:43:34', 'New', '2013-04-27 02:43:34'),
(135, 27, 'Raiser', 75, 'requisition raised,27-04-2013 02:43:34|Approved,27-04-2013 03:48:38', 'Approved', '2013-04-28 07:02:23'),
(136, 0, 'Accountant', 75, 'accountant added,27-04-2013 03:48:38', 'New', '2013-04-27 03:48:38'),
(137, 0, 'SCM', 75, 'scm added,27-04-2013 03:48:38', 'New', '2013-04-27 03:48:38'),
(138, 25, 'Boss', 76, 'admin added,27-04-2013 03:03:44', 'New', '2013-04-27 03:03:44'),
(139, 27, 'Raiser', 76, 'requisition raised,27-04-2013 03:03:44', 'New', '2013-04-28 07:02:23'),
(140, 25, 'Boss', 77, 'admin added,27-04-2013 03:15:39', 'New', '2013-04-27 03:15:39'),
(141, 27, 'Raiser', 77, 'requisition raised,27-04-2013 03:15:39', 'New', '2013-04-28 07:02:23'),
(142, 24, 'Boss', 78, 'admin added,27-04-2013 03:26:30|Approved,27-04-2013 03:31:14|Approved,27-04-2013 03:02:54|Approved,28-04-2013 07:29:29|Approved,02-05-2013 17:51:27', 'Approved', '2013-05-02 17:51:27'),
(143, 27, 'Raiser', 78, 'requisition raised,27-04-2013 03:26:30|Solved,02-05-2013 01:32:47|Solved,02-05-2013 17:56:06', 'Solved', '2013-05-02 17:56:06'),
(150, 25, 'Accountant', 78, 'accountant added,28-04-2013 07:29:29|Clear From Accounts,28-04-2013 07:29:58|Clear From Accounts,02-05-2013 17:54:10', 'Clear From Accounts', '2013-05-02 17:54:10'),
(151, 26, 'SCM', 78, 'scm added,28-04-2013 07:29:29|Delivered,28-04-2013 07:41:58|Delivered,02-05-2013 17:55:32', 'Delivered', '2013-05-02 17:55:32'),
(152, 24, 'Boss', 79, 'admin added,28-04-2013 07:22:54|Approved,28-04-2013 07:30:41', 'Approved', '2013-04-28 07:30:41'),
(153, 27, 'Raiser', 79, 'requisition raised,28-04-2013 07:22:54|Solved,28-04-2013 07:33:57|Solved,28-04-2013 07:43:10', 'Solved', '2013-04-28 07:43:10'),
(154, 25, 'Accountant', 79, 'accountant added,28-04-2013 07:30:41|Clear From Accounts,28-04-2013 07:32:50|decision1,28-04-2013 07:40:06|Closed,28-04-2013 07:43:29|Closed,28-04-2013 06:44:45', 'Closed', '2013-04-28 06:44:45'),
(155, 26, 'SCM', 79, 'scm added,28-04-2013 07:30:41|Delivered,28-04-2013 07:33:41|Delivered,28-04-2013 07:42:54', 'Delivered', '2013-04-28 07:42:54'),
(156, 27, 'Raiser', 80, 'requisition raised,28-04-2013 06:47:46', 'New', '2013-04-28 06:47:46'),
(157, 39, 'Boss', 80, 'admin added,28-04-2013 06:59:20|Approved,28-04-2013 07:25:24', 'New', '2013-04-28 07:30:04'),
(160, 27, 'Raiser', 81, 'requisition raised,28-04-2013 07:31:29|Solved,02-05-2013 01:28:44|Solved,02-05-2013 02:04:03', 'Solved', '2013-05-02 02:04:03'),
(161, 39, 'Boss', 81, 'admin added,28-04-2013 07:32:01|Approved,28-04-2013 07:32:17', 'Clear From Accounts', '2013-04-28 07:42:24'),
(162, 36, 'Accountant', 81, 'accountant added,28-04-2013 07:32:17|Clear From Accounts,28-04-2013 07:32:29|Clear From Accounts,28-04-2013 07:35:05|Clear From Accounts,28-04-2013 07:37:10|Clear From Accounts,28-04-2013 07:38:46|Clear From Accounts,28-04-2013 06:45:49|Closed,02-05-2013 01:29:53', 'Closed', '2013-05-02 01:29:53'),
(163, 37, 'SCM', 81, 'scm added,28-04-2013 07:32:17|Delivered,28-04-2013 07:02:45', 'Delivered', '2013-04-28 07:02:45'),
(164, 24, 'Boss', 82, 'admin added,28-04-2013 07:33:54|Approved,28-04-2013 07:18:00', 'Approved', '2013-04-28 07:18:00'),
(165, 27, 'Raiser', 82, 'requisition raised,28-04-2013 07:33:54|Solved,28-04-2013 06:44:16|Solved,02-05-2013 01:59:18', 'Solved', '2013-05-02 01:59:18'),
(166, 24, 'Boss', 83, 'admin added,28-04-2013 07:04:32|Approved,01-05-2013 03:53:24', 'Approved', '2013-05-01 03:53:24'),
(167, 27, 'Raiser', 83, 'requisition raised,28-04-2013 07:04:32|Solved,01-05-2013 03:25:31|Solved,02-05-2013 01:59:03', 'Solved', '2013-05-02 01:59:03'),
(168, 25, 'Accountant', 82, 'accountant added,28-04-2013 07:18:00|Clear From Accounts,28-04-2013 07:28:16|Closed,28-04-2013 06:49:28', 'Closed', '2013-04-28 06:49:28'),
(169, 26, 'SCM', 82, 'scm added,28-04-2013 07:18:00|Delivered,28-04-2013 07:35:00', 'Delivered', '2013-04-28 07:35:00'),
(170, 25, 'Accountant', 83, 'accountant added,01-05-2013 03:53:24|Clear From Accounts,01-05-2013 03:23:34|Closed,01-05-2013 03:25:42', 'Closed', '2013-05-01 03:25:42'),
(171, 26, 'SCM', 83, 'scm added,01-05-2013 03:53:24|Delivered,01-05-2013 03:25:21', 'Delivered', '2013-05-01 03:25:21'),
(172, 27, 'Raiser', 84, 'requisition raised,02-05-2013 01:23:09|Solved,02-05-2013 01:29:00|Solved,02-05-2013 02:03:41', 'Solved', '2013-05-02 02:03:41'),
(173, 39, 'Boss', 84, 'admin added,02-05-2013 01:25:00|Approved,02-05-2013 01:25:52', 'Approved', '2013-05-02 01:25:52'),
(174, 36, 'Accountant', 84, 'accountant added,02-05-2013 01:25:52|Clear From Accounts,02-05-2013 01:26:39|Closed,02-05-2013 01:29:12', 'Closed', '2013-05-02 01:29:12'),
(175, 37, 'SCM', 84, 'scm added,02-05-2013 01:25:52|Delivered,02-05-2013 01:28:08', 'Delivered', '2013-05-02 01:28:08'),
(176, 0, 'Boss', 85, 'admin added,02-05-2013 17:46:53', 'New', '2013-05-02 17:46:53'),
(177, 27, 'Raiser', 85, 'requisition raised,02-05-2013 17:46:53', 'New', '2013-05-02 17:46:53'),
(178, 0, 'Boss', 86, 'admin added,02-05-2013 17:47:55', 'New', '2013-05-02 17:47:55'),
(179, 27, 'Raiser', 86, 'requisition raised,02-05-2013 17:47:55', 'New', '2013-05-02 17:47:55'),
(180, 25, 'Accountant', 78, 'accountant added,28-04-2013 07:29:29|Clear From Accounts,28-04-2013 07:29:58|Clear From Accounts,02-05-2013 17:54:10', 'Clear From Accounts', '2013-05-02 17:54:10'),
(181, 26, 'SCM', 78, 'scm added,28-04-2013 07:29:29|Delivered,28-04-2013 07:41:58|Delivered,02-05-2013 17:55:32', 'Delivered', '2013-05-02 17:55:32'),
(182, 24, 'Boss', 87, 'admin added,02-05-2013 18:01:57', 'New', '2013-05-02 18:01:57'),
(183, 27, 'Raiser', 87, 'requisition raised,02-05-2013 18:01:57', 'New', '2013-05-02 18:01:57'),
(184, 27, 'Raiser', 88, 'requisition raised,02-05-2013 18:11:34|Solved,02-05-2013 17:50:33', 'Solved', '2013-05-02 17:50:33'),
(185, 39, 'Boss', 88, 'admin added,02-05-2013 18:17:43|Approved,02-05-2013 17:46:19', 'Approved', '2013-05-02 17:46:19'),
(186, 36, 'Accountant', 88, 'accountant added,02-05-2013 17:46:19|Clear From Accounts,02-05-2013 17:48:11|Closed,02-05-2013 17:50:44', 'Closed', '2013-05-02 17:50:44'),
(187, 37, 'SCM', 88, 'scm added,02-05-2013 17:46:19|Delivered,02-05-2013 17:50:11', 'Delivered', '2013-05-02 17:50:11'),
(188, 24, 'Boss', 89, 'admin added,15-05-2013 06:52:25|Approved,25-05-2013 00:34:50|View,25-05-2013 01:01:10', 'View', '2013-05-25 01:01:10'),
(189, 27, 'Raiser', 89, 'requisition raised,15-05-2013 06:52:25', 'New', '2013-05-15 06:52:25'),
(194, 36, 'Accountant', 89, 'accountant added,25-05-2013 01:01:10', 'Approved', '2013-05-25 01:01:10'),
(195, 37, 'SCM', 89, 'scm added,25-05-2013 01:01:10', 'Approved', '2013-05-25 01:01:10'),
(196, 39, 'Boss', 89, 'admin added,25-05-2013 01:07:45', 'New', '2013-05-25 01:07:45'),
(199, 24, 'Boss', 91, 'admin added,25-05-2013 00:54:58', 'New', '2013-05-25 00:54:58'),
(200, 39, 'Raiser', 91, 'requisition raised,25-05-2013 00:54:58', 'New', '2013-05-25 00:54:58'),
(201, 24, 'Boss', 92, 'admin added,25-05-2013 01:02:17|View,25-05-2013 01:02:41', 'View', '2013-05-25 01:02:41'),
(202, 27, 'Raiser', 92, 'requisition raised,25-05-2013 01:02:17|Partially Received,12-09-2013 00:36:31', 'Partially Received', '2013-09-12 00:36:31'),
(203, 39, 'Boss', 92, 'admin added,25-05-2013 01:03:57|Approved,25-05-2013 01:04:47', 'Approved', '2013-05-25 01:04:47'),
(204, 36, 'Accountant', 92, 'accountant added,25-05-2013 01:04:47', 'Approved', '2013-05-25 01:04:47'),
(205, 37, 'SCM', 92, 'scm added,25-05-2013 01:04:47|Partially Delivered,15-07-2013 22:16:19', 'Partially Delivered', '2013-07-15 22:16:19'),
(206, 24, 'Boss', 93, 'admin added,29-05-2013 16:19:20|Approved,29-05-2013 16:21:24', 'Approved', '2013-05-29 16:21:24'),
(207, 27, 'Raiser', 93, 'requisition raised,29-05-2013 16:19:21|Received,01-06-2013 00:24:26', 'Received', '2013-06-01 00:24:26'),
(208, 25, 'Accountant', 93, 'accountant added,29-05-2013 16:21:24|Document Received,01-06-2013 00:32:23|Closed,01-06-2013 00:33:53', 'Closed', '2013-06-01 00:33:53'),
(209, 26, 'SCM', 93, 'scm added,29-05-2013 16:21:24|Delivered,01-06-2013 00:17:07|Document Delivered,01-06-2013 00:26:31', 'Document Delivered', '2013-06-01 00:26:31'),
(210, 24, 'Boss', 94, 'admin added,01-06-2013 00:39:16', 'New', '2013-06-01 00:39:16'),
(211, 27, 'Raiser', 94, 'requisition raised,01-06-2013 00:39:16', 'New', '2013-06-01 00:39:16'),
(212, 24, 'Boss', 95, 'admin added,01-06-2013 00:43:19|Approved,01-06-2013 00:44:04', 'Approved', '2013-06-01 00:44:04'),
(213, 27, 'Raiser', 95, 'requisition raised,01-06-2013 00:43:20|Partially Received,01-06-2013 00:51:45|Partially Received,01-06-2013 00:55:06|Received,01-06-2013 00:55:53', 'Received', '2013-06-01 00:55:53'),
(214, 25, 'Accountant', 95, 'accountant added,01-06-2013 00:44:04|Document Received,01-06-2013 00:56:39', 'Document Received', '2013-06-01 00:56:39'),
(215, 26, 'SCM', 95, 'scm added,01-06-2013 00:44:04|Partially Delivered,01-06-2013 00:49:58|Partially Delivered,01-06-2013 00:53:33|Delivered,01-06-2013 00:55:25|Document Delivered,01-06-2013 00:56:27|Document Delivered,01-06-2013 00:56:42|Document Delivered,01-06-2013 00:56:44|Document Delivered,01-06-2013 00:58:07', 'Document Delivered', '2013-06-01 00:58:07'),
(216, 24, 'Boss', 96, 'admin added,01-06-2013 01:02:16|Approved,01-06-2013 01:03:11', 'Approved', '2013-06-01 01:03:11'),
(217, 27, 'Raiser', 96, 'requisition raised,01-06-2013 01:02:16|Received,01-06-2013 01:03:56', 'Received', '2013-06-01 01:03:56'),
(218, 25, 'Accountant', 96, 'accountant added,01-06-2013 01:03:11', 'Approved', '2013-06-01 01:03:11'),
(219, 26, 'SCM', 96, 'scm added,01-06-2013 01:03:11|Delivered,01-06-2013 01:03:43|Delivered,01-06-2013 01:04:10', 'Delivered', '2013-06-01 01:04:10'),
(220, 24, 'Boss', 97, 'admin added,01-06-2013 01:05:30|Approved,01-06-2013 01:05:49', 'Approved', '2013-06-01 01:05:49'),
(221, 27, 'Raiser', 97, 'requisition raised,01-06-2013 01:05:30|Received,01-06-2013 01:06:42', 'Received', '2013-06-01 01:06:42'),
(222, 25, 'Accountant', 97, 'accountant added,01-06-2013 01:05:49|Document Received,01-06-2013 01:07:56|Closed,01-06-2013 01:08:30', 'Closed', '2013-06-01 01:08:31'),
(223, 26, 'SCM', 97, 'scm added,01-06-2013 01:05:49|Delivered,01-06-2013 01:06:11|Document Delivered,01-06-2013 01:07:14', 'Document Delivered', '2013-06-01 01:07:14'),
(224, 24, 'Boss', 98, 'admin added,01-06-2013 00:27:50', 'New', '2013-06-01 00:27:50'),
(225, 27, 'Raiser', 98, 'requisition raised,01-06-2013 00:27:50', 'New', '2013-06-01 00:27:50'),
(226, 24, 'Boss', 99, 'admin added,01-06-2013 00:27:59', 'New', '2013-06-01 00:27:59'),
(227, 27, 'Raiser', 99, 'requisition raised,01-06-2013 00:27:59', 'New', '2013-06-01 00:27:59'),
(228, 24, 'Boss', 100, 'admin added,01-06-2013 00:47:14|Approved,26-06-2013 07:37:21', 'Approved', '2013-06-26 07:37:21'),
(229, 27, 'Raiser', 100, 'requisition raised,01-06-2013 00:47:14', 'New', '2013-06-01 00:47:14'),
(230, 24, 'Boss', 101, 'admin added,01-06-2013 00:47:43|View,01-06-2013 00:53:41', 'View', '2013-06-01 00:53:41'),
(231, 27, 'Raiser', 101, 'requisition raised,01-06-2013 00:47:43|Partially Received,01-06-2013 00:22:55|Received,01-06-2013 00:23:33', 'Received', '2013-06-01 00:23:33'),
(232, 39, 'Boss', 101, 'admin added,01-06-2013 01:03:18|Approved,01-06-2013 00:12:55', 'Approved', '2013-06-01 00:12:55'),
(233, 36, 'Accountant', 101, 'accountant added,01-06-2013 00:12:54|Document Received,01-06-2013 00:24:09|Closed,01-06-2013 00:24:12', 'Closed', '2013-06-01 00:24:12'),
(234, 37, 'SCM', 101, 'scm added,01-06-2013 00:12:54|Partially Delivered,01-06-2013 00:13:42|Delivered,01-06-2013 00:23:15|Document Delivered,01-06-2013 00:23:52', 'Document Delivered', '2013-06-01 00:23:52'),
(235, 0, 'Boss', 102, 'admin added,01-06-2013 01:18:28', 'New', '2013-06-01 01:18:28'),
(236, 27, 'Raiser', 102, 'requisition raised,01-06-2013 01:18:28', 'New', '2013-06-01 01:18:28'),
(237, 27, 'Raiser', 103, 'requisition raised,01-06-2013 01:14:47|Received,01-06-2013 01:32:14', 'Received', '2013-06-01 01:32:14'),
(238, 39, 'Boss', 103, 'admin added,01-06-2013 01:25:45|Approved,01-06-2013 01:27:05', 'Approved', '2013-06-01 01:27:05'),
(239, 36, 'Accountant', 103, 'accountant added,01-06-2013 01:27:05|Document Received,01-06-2013 01:32:52|Closed,01-06-2013 01:32:57', 'Closed', '2013-06-01 01:32:57'),
(240, 37, 'SCM', 103, 'scm added,01-06-2013 01:27:05|Delivered,01-06-2013 01:31:39|Document Delivered,01-06-2013 01:32:32', 'Document Delivered', '2013-06-01 01:32:33'),
(241, 27, 'Raiser', 104, 'requisition raised,01-06-2013 01:16:47', 'New', '2013-06-01 01:16:47'),
(242, 46, 'Raiser', 105, 'requisition raised,01-06-2013 01:41:53', 'New', '2013-06-01 01:41:53'),
(243, 39, 'Boss', 105, 'admin added,01-06-2013 01:42:19|Approved,01-06-2013 01:44:52', 'Approved', '2013-06-01 01:44:52'),
(244, 36, 'Accountant', 105, 'accountant added,01-06-2013 01:44:52', 'Approved', '2013-06-01 01:44:52'),
(245, 37, 'SCM', 105, 'scm added,01-06-2013 01:44:52|Delivered,15-07-2013 22:15:58', 'Delivered', '2013-07-15 22:15:58'),
(246, 47, 'Raiser', 106, 'requisition raised,01-06-2013 01:48:48|Received,01-06-2013 01:22:34', 'Received', '2013-06-01 01:22:34'),
(247, 39, 'Boss', 106, 'admin added,01-06-2013 01:02:53|Approved,01-06-2013 01:21:40', 'Approved', '2013-06-01 01:21:40'),
(248, 36, 'Accountant', 106, 'accountant added,01-06-2013 01:21:40|Document Received,01-06-2013 01:23:27|Closed,01-06-2013 01:23:32', 'Closed', '2013-06-01 01:23:32'),
(249, 37, 'SCM', 106, 'scm added,01-06-2013 01:21:40|Delivered,01-06-2013 01:21:56|Document Delivered,01-06-2013 01:22:53', 'Document Delivered', '2013-06-01 01:22:53'),
(250, 47, 'Raiser', 107, 'requisition raised,01-06-2013 01:36:04', 'New', '2013-06-01 01:36:04'),
(251, 39, 'Boss', 107, 'admin added,01-06-2013 01:36:56|Reject,01-06-2013 01:37:11', 'Reject', '2013-06-01 01:37:11'),
(252, 47, 'Raiser', 108, 'requisition raised,01-06-2013 01:51:25', 'New', '2013-06-01 01:51:25'),
(253, 39, 'Boss', 108, 'admin added,01-06-2013 01:51:44|Approved,01-06-2013 01:53:25', 'Approved', '2013-06-01 01:53:25'),
(254, 36, 'Accountant', 108, 'accountant added,01-06-2013 01:53:25', 'Approved', '2013-06-01 01:53:25'),
(255, 37, 'SCM', 108, 'scm added,01-06-2013 01:53:25', 'Approved', '2013-06-01 01:53:25'),
(256, 47, 'Raiser', 109, 'requisition raised,01-06-2013 01:07:44|Partially Received,15-07-2013 22:31:32|Partially Received,15-07-2013 21:59:15|Partially Received,15-07-2013 22:30:49|Partially Received,15-07-2013 22:41:45|Partially Received,15-07-2013 22:54:35|Partially Received,15-07-2013 22:25:16|Partially Received,15-07-2013 22:17:57|Partially Received,15-07-2013 22:12:36', 'Partially Received', '2013-07-15 22:12:36'),
(257, 39, 'Boss', 109, 'admin added,01-06-2013 01:08:35|Approved,01-06-2013 01:09:44', 'Approved', '2013-06-01 01:09:44'),
(258, 36, 'Accountant', 109, 'accountant added,01-06-2013 01:09:44', 'Approved', '2013-06-01 01:09:44'),
(259, 37, 'SCM', 109, 'scm added,01-06-2013 01:09:44|Partially Delivered,15-07-2013 01:06:41|Partially Delivered,15-07-2013 22:31:45|Partially Delivered,15-07-2013 21:59:41|Partially Delivered,15-07-2013 22:31:52|Partially Delivered,15-07-2013 22:53:21|Partially Delivered,15-07-2013 22:54:56|Partially Delivered,15-07-2013 22:16:33|Partially Delivered,15-07-2013 22:18:41', 'Partially Delivered', '2013-07-15 22:18:41'),
(260, 24, 'Boss', 110, 'admin added,11-06-2013 22:40:07|View,26-06-2013 07:35:51', 'View', '2013-06-26 07:35:51'),
(261, 27, 'Raiser', 110, 'requisition raised,11-06-2013 22:40:07', 'New', '2013-06-11 22:40:07'),
(262, 24, 'Boss', 111, 'admin added,11-06-2013 23:24:38', 'New', '2013-06-11 23:24:38'),
(263, 27, 'Raiser', 111, 'requisition raised,11-06-2013 23:24:38', 'New', '2013-06-11 23:24:38'),
(264, 39, 'Boss', 104, 'admin added,13-06-2013 04:03:48', 'New', '2013-06-13 04:03:48'),
(265, 24, 'Boss', 112, 'admin added,14-06-2013 01:26:53', 'New', '2013-06-14 01:26:53'),
(266, 27, 'Raiser', 112, 'requisition raised,14-06-2013 01:26:53', 'New', '2013-06-14 01:26:53'),
(267, 24, 'Boss', 113, 'admin added,14-06-2013 01:46:23', 'New', '2013-06-14 01:46:23'),
(268, 27, 'Raiser', 113, 'requisition raised,14-06-2013 01:46:23', 'New', '2013-06-14 01:46:23'),
(269, 24, 'Boss', 114, 'admin added,14-06-2013 01:59:20|Approved,26-06-2013 07:29:40', 'Approved', '2013-06-26 07:29:40'),
(270, 27, 'Raiser', 114, 'requisition raised,14-06-2013 01:59:20|Partially Received,01-07-2013 02:34:55|Partially Received,02-07-2013 16:01:56|Partially Received,02-07-2013 15:35:15|Partially Received,02-07-2013 15:07:34|Partially Received,15-07-2013 22:25:28', 'Partially Received', '2013-07-15 22:25:28'),
(271, 24, 'Boss', 115, 'admin added,14-06-2013 02:00:04|View,26-06-2013 07:28:47', 'View', '2013-06-26 07:28:47'),
(272, 27, 'Raiser', 115, 'requisition raised,14-06-2013 02:00:04', 'New', '2013-06-14 02:00:04'),
(273, 25, 'Accountant', 114, 'accountant added,26-06-2013 07:29:39', 'Approved', '2013-06-26 07:29:39'),
(274, 26, 'SCM', 114, 'scm added,26-06-2013 07:29:39|Partially Delivered,01-07-2013 03:09:18|Partially Delivered,01-07-2013 02:43:20|Partially Delivered,02-07-2013 15:10:28|Partially Delivered,02-07-2013 15:36:33|Partially Delivered,02-07-2013 15:08:16|Partially Delivered,12-09-2013 00:58:40', 'Partially Delivered', '2013-09-12 00:58:40'),
(275, 25, 'Accountant', 100, 'accountant added,26-06-2013 07:37:21', 'Approved', '2013-06-26 07:37:21'),
(276, 26, 'SCM', 100, 'scm added,26-06-2013 07:37:21', 'Approved', '2013-06-26 07:37:21'),
(277, 24, 'Boss', 116, 'admin added,26-06-2013 07:34:39', 'New', '2013-06-26 07:34:39'),
(278, 27, 'Raiser', 116, 'requisition raised,26-06-2013 07:34:39', 'New', '2013-06-26 07:34:39'),
(279, 47, 'Raiser', 117, 'requisition raised,15-07-2013 21:58:29', 'New', '2013-07-15 21:58:29'),
(280, 24, 'Boss', 118, 'admin added,27-07-2013 18:30:56|View,27-07-2013 18:15:18|View,27-07-2013 18:29:13', 'View', '2013-07-27 18:29:15'),
(281, 27, 'Raiser', 118, 'requisition raised,27-07-2013 18:30:56', 'New', '2013-07-27 18:30:56'),
(282, 24, 'Boss', 119, 'admin added,13-09-2013 09:18:08', 'New', '2013-09-13 09:18:08'),
(283, 27, 'Raiser', 119, 'requisition raised,13-09-2013 09:18:08', 'New', '2013-09-13 09:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `authenticating_steps`
--

CREATE TABLE IF NOT EXISTS `authenticating_steps` (
  `name_of_requisition` varchar(100) NOT NULL,
  `name_of_auth_step` varchar(100) NOT NULL,
  `step_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authenticating_steps`
--


-- --------------------------------------------------------

--
-- Table structure for table `authority_level`
--

CREATE TABLE IF NOT EXISTS `authority_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `authority_level`
--

INSERT INTO `authority_level` (`id`, `name`) VALUES
(1, 'Raise'),
(2, 'Recommend'),
(3, 'Approve'),
(4, 'Execute'),
(5, 'View'),
(6, 'Admin');

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
(1, 11, '2013-02-18 11:35:08'),
(2, 12, '2013-02-18 11:35:08');

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
(1, 'sample comment 1', '71', '18', 'read', '2012-12-30 00:47:07'),
(2, 'sample comment 2', '71', '18', 'read', '2012-12-28 12:46:31'),
(3, 'sample comment 3', '73', '18', 'read', '2012-12-30 00:20:43'),
(4, 'sample comment 4', '73', '18', 'read', '2012-12-30 00:20:45'),
(5, 'sample comment 1\r\n', '73', '21', 'unread', '2012-12-18 13:18:17'),
(6, 'sample comment 2', '73', '21', 'unread', '2012-12-18 13:18:28'),
(7, 'sample comment 3', '73', '21', 'unread', '2012-12-18 13:05:01'),
(8, 'sample comment 1', '75', '20', 'read', '2012-12-28 12:31:07'),
(9, 'ho ho ho.........', '73', '19', 'unread', '2012-12-18 13:15:29'),
(10, 'ho ho ho.........', '73', '19', 'unread', '2012-12-18 12:46:18'),
(11, 'yoyooyoy', '73', '21', 'unread', '2012-12-21 16:50:57'),
(12, '1234', '75', '2', 'unread', '2012-12-21 18:05:53'),
(13, 'self by admin', '75', '18', 'read', '2012-12-28 12:46:56'),
(14, 'wow no body comment but me!!!!', '75', '20', 'read', '2012-12-28 12:31:14'),
(15, 'sample admins own comment....................................................', '75', '20', 'read', '2012-12-28 12:31:21'),
(16, 'comment 1 by super admin', '76', '22', 'read', '2012-12-28 12:30:32'),
(17, 'comment 2 by user', '73', '22', 'unread', '2012-12-24 17:26:14'),
(18, 'new comment by sample user 1', '73', '18', 'read', '2012-12-30 00:20:48'),
(19, 'another comment by user 1\r\n', '73', '18', 'unread', '2012-12-30 00:08:11'),
(20, 'comment 1', '73', '23', 'unread', '2012-12-30 00:39:55'),
(21, 'response 1', '76', '23', 'read', '2012-12-30 00:09:31'),
(22, '', '73', '23', 'unread', '2013-01-07 05:46:07'),
(23, 'wow', '73', '27', 'read', '2013-01-14 00:44:33'),
(24, 'noww', '84', '27', 'read', '2013-01-14 00:44:54'),
(25, '', '', '', 'unread', '2013-01-20 15:35:39'),
(26, '', '', '', 'unread', '2013-01-20 16:05:28'),
(27, 'any comment', '', '37', 'unread', '2013-01-20 16:08:12'),
(28, 'anycomment 1\r\n', '', '37', 'unread', '2013-01-20 16:09:42'),
(29, 'wow\r\n', '98', '37', 'unread', '2013-01-20 16:13:44');

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

--
-- Dumping data for table `comments`
--


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
(1, 'Accounts & Finance', 'Max Automobile', '2013-01-07 00:33:08'),
(2, 'Accounts', 'Max Automobile', '2013-01-07 00:33:08'),
(3, 'Finance', 'Max Automobile', '2013-01-07 00:33:08'),
(4, 'Comercial', 'Max Automobile', '2013-01-07 00:33:08'),
(5, 'Marketing', 'Max Automobile', '2013-01-07 00:33:08'),
(6, 'IT', 'Max Automobile', '2013-01-07 00:33:08'),
(7, 'Supply Chain Management', 'Max Automobile', '2013-01-07 00:33:08'),
(8, 'Legal Affairs', 'Max Automobile', '2013-01-07 00:33:08'),
(9, 'Logigistic & Operation', 'Max Automobile', '2013-01-07 01:33:44'),
(10, 'HRD', 'Max Automobile', '2013-01-07 00:33:08'),
(11, 'HRD', 'Max Lubricant', '2013-01-07 00:59:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `designation_corporate`
--

INSERT INTO `designation_corporate` (`id`, `name`, `master`, `date`) VALUES
(1, 'GM', 'Max Automobile', '2013-01-07 01:41:04'),
(3, 'Manager', 'Max Automobile', '2013-01-07 01:41:04'),
(6, 'Additional Manager', 'Max Automobile', '2013-01-07 01:41:04'),
(9, 'Deputy Manager', 'Max Automobile', '2013-01-07 01:41:04'),
(10, 'Assistant Manager', 'Max Automobile', '2013-01-07 01:41:04'),
(12, 'Sr. Executive', 'Max Automobile', '2013-01-07 01:41:05'),
(14, 'Executive', 'Max Automobile', '2013-01-07 01:41:05'),
(16, 'Electric Engineer', 'Max Automobile', '2013-01-07 01:43:08'),
(17, 'Front Desk Executive', 'Max Automobile', '2013-01-07 01:43:08'),
(18, 'Advisor', 'Max Automobile', '2013-01-07 01:43:08'),
(19, 'Jr. Executive', 'Max Automobile', '2013-01-07 01:43:08'),
(20, 'Computer Operator', 'Max Automobile', '2013-01-07 01:43:17'),
(21, 'Project Co-ordinator', 'Max Automobile', '2013-01-07 01:44:13'),
(22, 'Cons.Manager', 'Max Automobile', '2013-01-07 01:44:13'),
(23, 'MD', '', '2013-06-11 22:33:12'),
(24, 'DGM', '', '2013-06-11 22:33:12'),
(25, 'Director', '', '2013-06-11 22:33:12'),
(26, 'Executive Director', '', '2013-06-11 22:33:12'),
(27, 'Hub Admin', '', '2013-07-01 02:32:41');

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
(6, 'some title ', 'some description', 74, 'finished', '2013-01-06 22:58:39'),
(7, '2nd title', '2nd feed\r\n', 72, 'pending', '2013-01-07 00:06:09'),
(8, '3rd', '3rd', 71, 'in process', '2013-01-06 23:36:31'),
(9, '3rd', '3rd', 75, 'pending', '2013-01-06 16:47:08'),
(10, '4th', '4th', 71, 'pending', '2013-01-06 16:47:08'),
(11, '5th', '5th', 76, 'finished', '2013-01-06 22:42:43'),
(12, 'new feedback', 'new feedback', 75, 'pending', '2013-01-06 16:37:43'),
(13, 'sample title', 'new feedback', 72, 'finished', '2013-01-06 22:43:21'),
(14, 'dsfgdsfg', 'new feedback', 76, 'pending', '2013-01-06 16:47:06'),
(15, 'from super admin', 'super admin', 71, 'in process', '2013-01-06 22:43:34'),
(16, 'from developer', '123', 75, 'finished', '2013-01-06 23:37:46'),
(17, 'another new feed', 'new feed', 71, 'pending', '2013-01-06 22:47:39'),
(18, 'new feedback', 'new', 71, 'in process', '2013-01-06 23:37:39'),
(19, 'sample user 20''s feedback', 'sample user 20''s feedback', 76, 'unread', '2013-01-20 01:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `idfeedbacks` int(11) NOT NULL AUTO_INCREMENT,
  `ratings` int(11) NOT NULL,
  PRIMARY KEY (`idfeedbacks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `feedbacks`
--


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

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `grn_master`
--

CREATE TABLE IF NOT EXISTS `grn_master` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `req_id` int(100) NOT NULL,
  `grn_id` varchar(100) NOT NULL,
  `grnReqType` varchar(200) NOT NULL,
  `grnRcvdLoc` varchar(200) NOT NULL,
  `grnRcvdBy` varchar(200) NOT NULL,
  `grnRcvdDate` varchar(100) NOT NULL,
  `grnChalanNo` varchar(200) NOT NULL,
  `grnNote` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `grn_master`
--

INSERT INTO `grn_master` (`id`, `req_id`, `grn_id`, `grnReqType`, `grnRcvdLoc`, `grnRcvdBy`, `grnRcvdDate`, `grnChalanNo`, `grnNote`, `date`) VALUES
(5, 114, '114.1', 'test', 'test', 'test', 'test', '30-07-2013', 'test', '2013-07-15 22:42:11'),
(6, 114, '114.2', 'test', 'test', 'test', 'test', '18-07-2013', 'test', '2013-07-15 22:46:39'),
(7, 114, '114.3', 'test', 'test', 'test', 'test', '03-07-2013', 'test', '2013-07-15 22:11:04'),
(8, 114, '114.4', 'test', 'test', 'test', 'test', '23-07-2013', 'test', '2013-07-15 22:14:15'),
(9, 114, '114.5', 'test', 'test', 'test', 'test', '10-07-2013', 'test', '2013-07-15 22:16:19'),
(10, 114, '114.6', 'test', 'test', 'test', 'test', '11-07-2013', 'test', '2013-07-15 22:17:55'),
(11, 114, '114.7', 'test', 'test', 'test', 'test', '26-07-2013', 'test', '2013-07-15 22:19:25'),
(12, 114, '114.8', 'test', 'test', 'test', 'test', '12-07-2013', 'test', '2013-07-15 22:20:07'),
(13, 114, '114.9', 'test', 'test', 'test', 'test', '25-07-2013', 'test', '2013-07-15 22:24:00'),
(14, 109, '109.1', 'test', 'test', 'test', 'test', '17-07-2013', 'test', '2013-07-15 22:31:25'),
(15, 109, '109.2', 'test', '1', 'test', 'test', '23-07-2013', 'test', '2013-07-15 21:58:10'),
(16, 109, '109.3', 'test', 'test', 'test', 'test', '10-07-2013', 'test', '2013-07-15 22:00:11'),
(17, 109, '109.4', 'test', 'test', 'test', 'test', '10-07-2013', 'test', '2013-07-15 22:01:37'),
(18, 109, '109.5', '123', '123', '132', '132', '29-07-2013', '123', '2013-07-15 22:41:42'),
(19, 109, '109.6', '123', '123', '123', '123', '24-07-2013', 'ffff', '2013-07-15 22:54:30'),
(20, 109, '109.7', 'test', 'test', 'test', 'test', '01-07-2013', 'test', '2013-07-15 22:25:06'),
(21, 109, '109.8', 'test', 'test', 'test', 'test', '17-07-2013', 'test', '2013-07-15 22:17:50'),
(23, 109, '109.9', 'test', 'test', 'test', 'test', '10-07-2013', 'test', '2013-07-15 22:12:29'),
(24, 92, '92.1', 'test grn', 'anytype', 'dhaka', 'me', '20-09-2013', '123456', '2013-09-12 00:36:19');

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
(1, '41201', 6, '', '2013-01-20 15:38:07'),
(2, '41202', 5, '', '2013-01-20 15:38:29'),
(3, '10011.4', 21, 'active', '2013-04-09 23:18:23'),
(4, '10011.5', 24, 'active', '2013-04-09 23:20:37'),
(12, 'central', 35, 'active', '2013-04-18 23:05:43'),
(13, 'central', 38, 'active', '2013-04-18 23:15:04'),
(14, 'central', 29, 'active', '2013-04-20 07:40:39'),
(15, 'central', 27, 'active', '2013-04-20 07:40:39');

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
(3, 5, '41201', 'active', '2013-02-05 01:39:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `site_factory`, `project`, `master`, `location_id`, `location_type`, `date_added`) VALUES
(9, 'chinki new', 'project with extra 0', 'new type with extra 0', '30011', 'Site', '2013-03-23 01:50:11'),
(10, 'chinki new new', 'project with extra 0', 'new type with extra 0', '30012', 'Site', '2013-03-23 01:50:34'),
(11, 'chinki new new new', 'project with extra 0', 'new type with extra 0', '30013', 'Site', '2013-03-23 01:52:54'),
(12, 'chinki new new new 4', 'project with extra 0', 'new type with extra 0', '30014', '', '2013-03-23 01:11:41'),
(13, 'chinki 123', 'project with extra 0 1', 'new type with extra 0 1', '40011', '', '2013-03-23 01:12:47'),
(15, 'Chinki Astana', 'LCDLP', 'MAPL', '10011', '', '2013-04-02 04:59:42'),
(16, 'Feni', 'LCDLP', 'MAPL', '10012', '', '2013-04-05 14:40:04'),
(17, 'Laksham', 'LCDLP', 'MAPL', '10013', '', '2013-04-05 14:41:58'),
(18, 'Lub House Dhaka Office', 'Lub House', 'Single Entity', '60011', 'Single Entity', '2013-06-01 01:39:20'),
(19, 'Press Tress Dhaka Office', 'Press Tress', 'Single Entity', '60021', 'Single Entity', '2013-06-01 01:42:30'),
(20, 'Lub House Factory', 'Lub House', 'Single Entity', '60012', 'Single Entity', '2013-06-01 01:43:00'),
(21, 'office', 'New 3rd Entity', 'Single Entity', '60031', 'Single Entity', '2013-06-01 01:44:39'),
(22, 'factory', 'New 3rd Entity', 'Single Entity', '60032', 'Single Entity', '2013-06-01 01:44:49'),
(23, 'Office', 'New Single Entity', 'Single Entity', '60041', 'Single Entity', '2013-06-01 01:39:29'),
(24, 'new site of lcdlp', 'LCDLP', 'MAPL', '10014', '', '2013-06-26 07:12:42');

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
('Max Automobile', 1),
('Max Builders Limited', 2),
('Max Lubricant', 3),
('new master 1', 5),
('Max Railway', 4),
('MBTL', 2000),
('new type with extra 0', 30000),
('new type with extra 0 1', 40000),
('MAPL', 10000),
('Single Entity', 60000),
('newTestLoc', 90000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `material_category`
--

INSERT INTO `material_category` (`id`, `name`, `type`, `sub_cat_of`, `date_added`) VALUES
(1, 'Building Material', 'Category', 0, '2013-05-06 22:09:25'),
(11, 'steel', 'Subcategory', 1, '2013-08-17 02:52:29');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `material_master`
--

INSERT INTO `material_master` (`id`, `name`, `category`, `subcategory`, `measurment_unit`, `m_description`, `cost_per_unit`, `date_added`) VALUES
(2, 'Rebar', 'Readymade Building Material', '', 'Ton', '60 grade', 50000, '2013-06-14 01:57:50'),
(3, 'Rail', 'Construction Material', 'Railway Construction', 'KG', '100 meters', 5000, '2013-06-14 02:17:08'),
(4, 'cement', 'Building Material', 'Concrete Mixture', 'kg', 'bosta!', 200, '2013-07-02 15:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `micro_site`
--

CREATE TABLE IF NOT EXISTS `micro_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `micro_site`
--

INSERT INTO `micro_site` (`id`, `name`, `site`) VALUES
(3, 'Chinki', 'Chinki Astana'),
(4, '181', 'Chinki Astana'),
(5, '185', 'Chinki Astana'),
(6, '207', 'Laksham');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `money_limit`
--

INSERT INTO `money_limit` (`id`, `bosslimit`, `user_id`, `date_modified`, `type`) VALUES
(1, 50000, 0, '0000-00-00 00:00:00', 'Local Purchase'),
(2, 10000, 0, '0000-00-00 00:00:00', 'default'),
(20, 50000, 24, '2013-09-07 00:31:24', ''),
(21, 50000, 24, '2013-09-07 00:31:35', ''),
(23, 50000, 42, '2013-09-07 00:32:06', ''),
(24, 50000, 24, '2013-09-06 23:55:00', '');

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
  `req_id` int(100) NOT NULL,
  `sender` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `subject`, `message`, `req_id`, `sender`, `date`) VALUES
(1, 'sample pm', 'sample pm', 0, 73, '2013-01-09 23:19:45'),
(2, 'yoo', 'noo', 0, 73, '2013-01-09 23:25:27'),
(3, 'hahah', 'hahahahah', 0, 73, '2013-01-09 23:27:00'),
(4, 'so,', 'so,', 0, 73, '2013-01-09 23:29:20'),
(5, 'erewr', 'ewrwrew', 0, 73, '2013-01-09 23:29:50'),
(6, 'yoo', 'noo', 0, 73, '2013-01-10 00:11:14'),
(7, 'new ', 'message\n', 0, 73, '2013-01-10 00:07:10'),
(8, 'qqq', 'wwww', 0, 73, '2013-01-10 00:09:23'),
(9, 'hhh', 'nnnn', 0, 73, '2013-01-09 23:46:10'),
(10, 'jjj', 'ffff', 0, 73, '2013-01-09 23:47:20'),
(11, 'aaaa', 'asdfasdf', 0, 73, '2013-01-09 23:53:14'),
(12, 'aaaaa', 'asdfasdf', 0, 0, '2013-01-10 00:04:14'),
(13, 'asfasfds', 'asdfasfasfasfasf', 0, 73, '2013-01-10 00:05:00'),
(14, 'wow', 'again wow', 0, 73, '2013-01-10 00:06:02'),
(15, 'wow', 'noww', 0, 73, '2013-01-13 23:36:16'),
(16, '444', '4444', 0, 27, '2013-06-26 07:43:33'),
(17, '', 'test', 0, 45, '2013-09-11 13:13:20'),
(21, '', 'test 2', 0, 45, '2013-09-11 13:22:36'),
(22, '', 'buttonLoadingOn', 0, 45, '2013-09-11 13:18:50'),
(23, '', 'buttonLoadingOn', 0, 45, '2013-09-11 13:19:16'),
(24, '', 'wowoww', 0, 45, '2013-09-11 13:31:28'),
(25, '', 'wowoowowow', 0, 45, '2013-09-11 13:00:15'),
(26, '', 'dddd', 0, 45, '2013-09-11 13:00:59'),
(27, '', 'asdfafs', 0, 45, '2013-09-12 00:11:34'),
(28, '', 'asdfasffff', 0, 45, '2013-09-12 00:11:47'),
(29, '', 'teeeeeeeeeeeeeeesy', 0, 45, '2013-09-12 00:46:02'),
(30, '', 'new message', 0, 45, '2013-09-12 00:17:19'),
(31, '', 'test', 0, 45, '2013-09-12 00:21:50'),
(32, '', 'fdsfsdfs', 0, 27, '2013-09-13 09:18:18'),
(33, '', 'testtesttesttesttest', 0, 27, '2013-09-13 09:19:39'),
(34, '', 'jkjkjk', 0, 27, '2013-09-13 08:51:06'),
(35, '', 'jhjk', 0, 27, '2013-09-13 08:51:50'),
(36, '', 'jghbjhbjbh', 0, 27, '2013-09-13 08:52:35'),
(37, '', 'sddddd', 0, 27, '2013-09-13 08:55:03'),
(38, '', 'kjhkjhkjhk', 0, 27, '2013-09-13 08:55:28'),
(39, '', 'test test', 0, 27, '2013-09-13 09:07:51'),
(40, '', 'tesssst', 0, 27, '2013-09-13 09:20:32'),
(41, '', 'test from chinki', 0, 27, '2013-09-13 09:22:36'),
(42, '', 'qwwerwert', 0, 27, '2013-09-13 08:36:15'),
(43, '', 'hooooo', 0, 45, '2013-09-13 08:43:22'),
(44, '', 'test message', 0, 45, '2013-09-13 08:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `pm_destination`
--

CREATE TABLE IF NOT EXISTS `pm_destination` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pm_id` int(100) NOT NULL,
  `receiver` int(11) NOT NULL,
  `read_unread` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pm_destination`
--

INSERT INTO `pm_destination` (`id`, `pm_id`, `receiver`, `read_unread`) VALUES
(1, 21, 27, 0),
(2, 22, 45, 0),
(3, 23, 45, 0),
(4, 24, 45, 0),
(5, 25, 27, 0),
(6, 26, 45, 0),
(7, 27, 45, 0),
(8, 28, 45, 0),
(9, 29, 37, 0),
(10, 30, 45, 0),
(11, 31, 40, 0),
(12, 32, 45, 0),
(13, 33, 46, 0),
(14, 34, 27, 0),
(15, 35, 48, 0),
(16, 36, 47, 0),
(17, 37, 44, 0),
(18, 38, 27, 0),
(19, 39, 27, 0),
(20, 40, 23, 0),
(21, 41, 45, 0),
(22, 42, 45, 0),
(23, 43, 27, 0),
(24, 44, 27, 0);

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
('sample project 1', 6, 'Max Builders Limited'),
('sample project 6', 4, 'Max Automobile'),
('sample project 5', 8, 'Max Automobile'),
('project mbtl', 2010, 'MBTL'),
('project mbtl new', 2020, 'MBTL'),
('project with extra 0', 30010, 'new type with extra 0'),
('project with extra 0 1', 40010, 'new type with extra 0 1'),
('LCDLP', 10010, 'MAPL'),
('Lub House', 60010, 'Single Entity'),
('Press Tress', 60020, 'Single Entity'),
('New 3rd Entity', 60030, 'Single Entity'),
('New Single Entity', 60040, 'Single Entity');

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
  `com_req_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type_of_req` varchar(100) NOT NULL,
  `admin` varchar(11) NOT NULL,
  `costing` int(30) NOT NULL,
  `material_cart` text NOT NULL,
  `po_info` text NOT NULL,
  `delivery_info` text NOT NULL,
  `actual_cost_by_scm` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_requested_by_info` varchar(100) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(30) NOT NULL,
  `delivery_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `com_req_id`, `title`, `description`, `type_of_req`, `admin`, `costing`, `material_cart`, `po_info`, `delivery_info`, `actual_cost_by_scm`, `user_id`, `user_requested_by_info`, `location_id`, `status`, `submission_date`, `deadline`, `delivery_date`) VALUES
(27, 'L10011.5U26R39', 'sample req11', 'No designation available', 'sample req type 9', '84', 134567, '', '', '', 0, 73, '', '0', 'Pending', '2013-07-27 17:53:57', '16/12/2012', ''),
(31, 'L10011.5U27R30', 'buy computer new', 'buy computer new', 'sample req type 9', '73', 1345673, '', '', '', 0, 86, '', '0', 'New', '2013-07-27 17:53:57', '16/12/2012', ''),
(32, 'L10011.5U27R29', 'buy computer new', 'buy computer new', 'sample req type 9', '73', 1345673, '', '', '', 0, 86, '', '0', 'New', '2013-07-27 17:53:57', '16/12/2012', ''),
(34, 'L10011.5U27R21', 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', '', 0, 99, '', '41201', 'Pending', '2013-07-27 17:53:57', '16/12/2012', ''),
(35, 'L10012.5U27R322', 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', '', 0, 99, '', '41201', 'Modify', '2013-07-27 17:53:57', '16/12/2012', ''),
(36, '0', 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', '', 0, 99, '', '41201', 'Solved', '2013-01-20 15:50:53', '16/12/2012', ''),
(37, '0', 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', '', 0, 99, '', '41201', 'Pending', '2013-01-20 15:51:09', '16/12/2012', ''),
(38, '0', 'sample req11', 'sample req11', 'sample req type 2', '', 1345673, '', '', '', 0, 99, '', '41201', 'Pending', '2013-01-20 16:01:14', '16/12/2012', ''),
(39, '0', 'buy computer new', 'buy computer new', 'sample req type 9', '', 1345673, '', '', '', 0, 5, '', '41201', 'Approved', '2013-02-11 02:33:49', '16/12/2012', ''),
(45, '0', 'asdfasf', 'sdfsadfasf', 'Local Purchase', '', 1231333, '', '', '', 0, 5, '', '41201', 'Delivered', '2013-02-18 11:14:24', '16/12/2012', ''),
(48, '0', 'fffff', 'fffff', 'Local Purchase', '', 5000, '', '', '', 0, 5, '', '41201', 'Clear From Accounts', '2013-02-11 02:52:44', '16/12/2012', ''),
(56, '0', 'vdvdvdv', 'vdvdvdvd', 'Fund', '', 5000, '', '', '', 0, 5, '', '41201', 'Solved', '2013-02-11 02:18:28', '16/12/2012', ''),
(57, '0', 'asdffffffffffffff', 'asdfdfdfdfffff', 'Local Purchase', '', 23432424, '', '', '', 0, 5, '', '41201', 'Delivered', '2013-02-18 11:13:45', '16/12/2012', ''),
(58, '0', 'testing for central', 'testing for central', 'Service Charge', '', 100000000, '', '', '', 0, 5, '', '41201', 'Delivered', '2013-06-11 23:02:18', '16/12/2012', '11-06-2013 22:56:14|11-06-2013 22:57:11|11-06-2013 22:58:16|11-06-2013 22:59:56|11-06-2013 23:00:30|'),
(59, '0', 'testing for local', 'testing for local', 'Local Purchase', '', 5000, '', '', '', 0, 5, '', '41201', 'Delivered', '2013-02-18 11:50:19', '16/12/2012', ''),
(60, '0', 'testing for central 2', 'testing for central 2', 'Recruitment', '', 1000000, '', '', '', 0, 5, '', '41201', 'Delivered', '2013-02-18 11:43:13', '16/12/2012', ''),
(61, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 23, '', '10011', 'New', '2013-04-09 23:00:40', '16/12/2012', ''),
(62, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 23, '', '10011.5', 'New', '2013-04-09 23:01:57', '16/12/2012', ''),
(63, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 23, '', '10011.5', 'New', '2013-04-09 23:21:52', '16/12/2012', ''),
(64, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 23, '', '10011.5', 'New', '2013-04-09 23:28:55', '16/12/2012', ''),
(65, '0', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'Approved', '2013-04-09 22:59:17', '16/12/2012', ''),
(66, '0', 'local purchase by 185 saff2', 'local purchase by 185 saff2. mushfiq vai said to write some word.', 'Local Purchase', '', 5000, '', '', '', 0, 28, '', '10011.5', 'Closed', '2013-04-18 23:03:56', '16/12/2012', ''),
(67, '0', 'local purchase by 185 saff2', 'local purchase by 185 saff2', 'Local Purchase', '', 500000, '', '', '', 0, 28, '', '10011.5', 'New', '2013-04-18 23:43:20', '16/12/2012', ''),
(68, '0', 'local purchase by 185 saff2 123', 'local purchase by 185 saff2 123', 'Local Purchase', '', 500000, '', '', '', 0, 28, '', '10011.5', 'Closed', '2013-04-18 22:51:42', '16/12/2012', ''),
(69, '0', 'requisition by staff 12', 'need to buy pc locally', 'Local Purchase', '', 5000, '', '', '', 0, 28, '', '10011.5', 'New', '2013-04-20 07:44:57', '16/12/2012', ''),
(70, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 41, '', 'site manage', 'New', '2013-04-20 06:49:40', '16/12/2012', ''),
(71, '0', 'local purchase new', 'local purchase new', 'Spare Parts', '', 5000, '', '', '', 0, 41, '', '10011.6', 'New', '2013-04-20 06:51:44', '16/12/2012', ''),
(72, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 41, '', '10013.6', 'New', '2013-04-20 06:53:00', '16/12/2012', ''),
(73, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-04-25 22:58:46', '16/12/2012', ''),
(74, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.4', 'New', '2013-04-25 22:59:45', '16/12/2012', ''),
(75, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.4', 'Approved', '2013-04-27 03:48:38', '16/12/2012', ''),
(76, '0', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-04-27 03:03:44', '16/12/2012', ''),
(77, '0', 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-04-27 03:15:39', '16/12/2012', ''),
(78, '0', 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 5050, 27, '', '10011.5', 'Solved', '2013-05-02 17:56:06', '16/12/2012', ''),
(79, '0', 'local purchase by 185 saff1 123123', 'local purchase by 185 saff1 123123', 'Local Purchase', '', 40000, '', '', '', 0, 27, '', '10011.5', 'Closed', '2013-04-28 07:43:29', '16/12/2012', ''),
(80, '0', 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 50001, '', '', '', 0, 27, '', '10011.5', 'Redirect', '2013-04-28 07:28:41', '16/12/2012', ''),
(81, '0', 'local purchase new central test', 'local purchase new central test', 'Local Purchase', '', 500000, '', '', '', 345666, 27, '', '10011.5', 'Solved', '2013-05-02 02:04:03', '16/12/2012', ''),
(82, '0', 'local purchase test', 'i need money for buying something\r\n', 'Local Purchase', '', 40000, '', '', '', 0, 27, '', '10011.5', 'Solved', '2013-05-02 01:59:18', '16/12/2012', ''),
(83, '0', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'Solved', '2013-05-02 01:59:03', '16/12/2012', ''),
(84, '0', 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 500000, '', '', '', 0, 27, '', '10011.5', 'Solved', '2013-05-02 02:03:41', '16/12/2012', ''),
(85, '0', 'Fund req', 'Fund req 123', 'Fund', '', 10000, '', '', '', 0, 27, '', 'MAPL->LCDLP', 'New', '2013-05-02 17:46:53', '16/12/2012', ''),
(86, '0', 'local purchase new', 'local purchase new desc', 'Fund', '', 10000, '', '', '', 0, 27, '', 'MAPL->LCDLP', 'New', '2013-05-02 17:47:55', '16/12/2012', ''),
(87, '0', 'new fund', 'new fund', 'Fund', '', 5000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-05-02 18:01:56', '16/12/2012', ''),
(88, '0', 'salary of january', 'salary of january...................', 'Fund', '', 2000000, '', '', '', 1500000, 27, '', '10011.5', 'Closed', '2013-05-02 17:50:44', '16/12/2012', ''),
(89, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 50001, '', '', '', 0, 27, '', '10011.5', 'Redirect', '2013-05-25 01:07:45', '31-05-2013', ''),
(90, '0', 'new looooo', 'new looooo', 'Local Purchase', '', 5000000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-05-25 00:53:38', '29-05-2013', ''),
(91, '0', 'new looooo', 'new looooo', 'Local Purchase', '', 59999999, '', '', '', 0, 39, '', '10011.5', 'New', '2013-05-25 00:54:58', '29-05-2013', ''),
(92, '0', 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', 200001, '', '', '', 0, 27, '', '10011.5', 'Partially Received', '2013-09-12 00:36:31', '28-05-2013', '15-07-2013 22:16:19'),
(93, '0', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '10011.5', 'Closed', '2013-06-01 00:33:53', '30-05-2013', ''),
(94, '0', 'Samsung Galaxy tab 2 7"', 'Samsung Galaxy tab 2 7"', 'Service Charge', '', 5000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-06-01 00:39:15', '30-06-2013', ''),
(95, '0', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 10000, '', '', '', 0, 27, '', '10011.5', 'Document Delivered', '2013-06-01 00:56:42', '23-07-2013', ''),
(96, '0', 'new test', 'new test', 'Local Purchase', '', 10000, '', '', '', 0, 27, '', '10011.5', 'Delivered', '2013-06-01 01:04:10', '30-06-2013', ''),
(97, '0', 'local purchase new', 'local purchase new', 'Material Supply', '', 5000, '', '', '', 0, 27, '', '10011.5', 'Closed', '2013-06-01 01:08:31', '16-06-2013', ''),
(100, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 10000, '', '', '', 0, 27, '', '10011.5', 'Approved', '2013-06-26 07:37:21', '05-06-2013', ''),
(101, '0', 'Samsung Galaxy tab 2 7"', 'Samsung Galaxy tab 2 7"', 'Spare Parts', '', 500000, '', '', '', 0, 27, '', '10011.5', 'Closed', '2013-06-01 01:20:37', '28-06-2013', ''),
(102, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 2000000, '', '', '', 0, 27, '', '60011.', 'New', '2013-06-01 01:18:28', '22-06-2013', ''),
(103, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 10000, '', '', '', 0, 27, '', '60011.', 'Closed', '2013-06-01 01:32:57', '15-06-2013', ''),
(104, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 5000, '', '', '', 0, 27, '', '60011.', 'Redirect', '2013-06-13 04:03:48', '15-06-2013', ''),
(105, '0', 'Requisition by se stuff', 'Requisition by se stuff', 'Local Purchase', '', 3333, '', 'a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:6:"test 1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"pc";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:7:"newwwww";s:4:"date";s:19:"01-06-2013 01:02:46";s:8:"poSubmit";s:6:"Submit";}|a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:5:"test1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"kg";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:5:"wwwww";s:4:"date";s:19:"01-06-2013 01:03:04";s:8:"poSubmit";s:6:"Submit";}', '', 0, 46, '', '60031', 'Delivered', '2013-07-15 22:15:58', '29-06-2013', '15-07-2013 22:15:58'),
(106, '0', 'Fund req', 'Fund req', 'Fund', '', 123444444, '', '', '', 0, 47, '', '60011', 'Closed', '2013-06-01 01:23:32', '15-06-2013', ''),
(107, '0', 'local purchase new', 'local purchase new', 'Local Purchase', '', 2000000, '', '', '', 0, 47, '', '60011', 'new', '2013-07-15 22:26:30', '27-06-2013', ''),
(108, '0', 'local purchase by lub', 'local purchase by lub', 'Local Purchase', '', 2000000, '', '', '', 0, 47, '', '60011', 'new', '2013-07-15 22:26:30', '14-06-2013', ''),
(109, '0', 'local purchase by 185 saff2', 'location', 'Local Purchase', '', 500000, '', '', '', 0, 47, '', '60011', 'Partially Received', '2013-07-15 22:12:36', '18-06-2013', '15-07-2013 01:06:41|15-07-2013 22:31:45|15-07-2013 21:59:41|15-07-2013 22:31:52|15-07-2013 22:53:21|15-07-2013 22:54:56|15-07-2013 22:16:33|15-07-2013 22:18:41'),
(110, '0', 'local purchase by 185 saff2', 'sdfasf', 'Local Purchase', '', 0, '', '', '', 0, 27, '', '10011.5', 'View', '2013-06-26 07:35:51', '20-06-2013', ''),
(111, '0', 'local purchase by 185 saff1', 'wow', 'Local Purchase', '', 500000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-06-13 03:47:19', '08-06-2013', '11-06-2013 22:56:14|11-06-2013 22:57:11|11-06-2013 22:58:16|11-06-2013 22:59:56|11-06-2013 23:00:30|'),
(112, '0', 'local purchase new', 'wow', 'Material', '', 1320, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,,No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Brick,10 Piece,12,120,,2,Brick,10 Piece,12,120,,3,Brick,10 Piece,12,120,,4,Brick,10 Piece,12,120,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,8,Brick,10 Piece,12,120,,9,Brick,10 Piece,12,120,,10,Brick,10 Piece,12,120,,11,Brick,10 Piece,12,120,,,,,Total Costing,1320,', '', '', 0, 27, '', '10011.5', 'New', '2013-06-14 01:26:53', '29-06-2013', ''),
(113, '0', 'local purchase new', 'wow', 'Material', '', 200360, 'No.,Item Name,Quantity,Unit Price,Item Total,Remove,1,Rail,10 KG,5000,50000,,2,Rail,10 KG,5000,50000,,3,Rail,10 KG,5000,50000,,4,Rail,10 KG,5000,50000,,5,Brick,10 Piece,12,120,,6,Brick,10 Piece,12,120,,7,Brick,10 Piece,12,120,,,,,Total Costing,200360,', '', '', 0, 27, '', '10011.5', 'New', '2013-06-14 01:46:23', '30-06-2013', ''),
(114, '0', 'local purchase new', 'wow', 'Local Purchase', '', 0, '', 'a:8:{s:2:"id";s:3:"114";s:4:"poNo";s:4:"2345";s:8:"poAmount";s:3:"324";s:6:"amount";s:3:"Ton";s:6:"poCost";s:6:"123456";s:9:"poDetails";s:7:"adsfsdf";s:4:"date";s:19:"26-06-2013 07:41:12";s:8:"poSubmit";s:6:"Submit";}', '', 0, 27, '', '10011.5', 'Partially Delivered', '2013-09-12 00:58:40', '30-06-2013', '01-07-2013 03:09:18|01-07-2013 02:43:20|02-07-2013 15:10:28|02-07-2013 15:36:33|02-07-2013 15:08:16|12-09-2013 00:58:40'),
(115, '0', 'local purchase new', 'now', 'Material', '', 220000, 'No.,Item Name,,Unit Price,Item Total,Edit,1,Rail,20,5000,100000,,2,Brick,10000,12,120000,,,,,Total Costing,220000,', '', '', 0, 27, '', '10011.5', 'View', '2013-06-26 07:28:47', '30-06-2013', ''),
(116, 'L10011.5U27R37', 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', 200000, '', '', '', 0, 27, '', '10011.5', 'New', '2013-07-27 17:53:57', '30-06-2013', ''),
(117, 'L10011.5U27R38', 'title with original requester info', 'afaaaa', 'Local Purchase', '', 12333, '', '', '', 0, 47, 'fahadbillah|01671026001', '60011', 'New', '2013-07-27 17:53:57', '18-07-2013', ''),
(118, 'L10011.5U27R39', 'new id test', 'test', 'Fund', '', 400000, '', '', '', 0, 27, 'somePeople|089098', '10011.5', 'View', '2013-07-27 18:29:15', '30-07-2013', ''),
(119, 'L10011.5U27R40', 'new test after a long time', 'test', 'Service Charge', '', 1234555, '', '', '', 0, 27, 'some guy|0171555555555', '10011.5', 'New', '2013-09-13 09:18:08', '26-09-2013', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `requisition_user`
--

INSERT INTO `requisition_user` (`id`, `user_id`, `location_id`, `post`, `active`, `date_added`) VALUES
(1, 23, '10011.4', 'SCM', 'active', '2013-04-09 22:57:02'),
(3, 26, '10011.5', 'SCM', 'active', '2013-04-09 23:15:13'),
(9, 37, 'central', 'SCM', 'active', '2013-04-18 23:08:30'),
(13, 24, '10011.5', 'Boss', 'active', '2013-04-20 07:40:49'),
(14, 39, 'central', 'Boss', 'active', '2013-04-20 07:42:33'),
(15, 40, 'central', 'Boss', 'active', '2013-04-20 07:43:17'),
(16, 42, '10013.6', 'Boss', 'active', '2013-04-20 07:38:20'),
(17, 43, '10013.6', 'SCM', 'active', '2013-04-20 07:39:48'),
(19, 24, '10011.6', 'Boss', 'active', '2013-04-25 23:54:11'),
(21, 28, '10011.5', 'Raiser', 'active', '2013-04-28 07:00:09'),
(23, 25, '10011.5', 'Accountant', 'active', '2013-04-27 03:22:45'),
(24, 27, '10011.5', 'Raiser', 'active', '2013-04-28 07:04:18'),
(25, 45, 'central', 'Hub Admin', 'active', '2013-06-01 01:33:29'),
(27, 46, '60031', 'Raiser', 'active', '2013-06-01 01:40:03'),
(29, 47, '60011', 'Raiser', 'active', '2013-06-01 01:47:24'),
(31, 24, '60012', 'Boss', 'active', '2013-06-26 07:13:47'),
(32, 48, 'central', 'Hub Admin', 'active', '2013-07-01 02:28:44'),
(34, 50, 'central', 'Hub Admin', 'active', '2013-07-01 02:56:54'),
(37, 27, '60011', 'Raiser', 'active', '2013-08-17 02:42:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `req_hub`
--

INSERT INTO `req_hub` (`id`, `req_id`, `location`, `date_updated`) VALUES
(1, 22, 'central', '2013-02-05 01:29:02'),
(2, 55, '40122', '2013-02-05 01:29:38'),
(3, 45, 'central', '2013-02-05 01:35:31'),
(4, 46, '41201', '2013-02-05 01:38:31'),
(5, 47, '41201', '2013-02-05 01:52:37'),
(6, 48, '41201', '2013-02-05 01:55:36'),
(7, 49, '41201', '2013-02-11 02:26:37'),
(8, 50, '41201', '2013-02-11 02:39:54'),
(9, 51, '41201', '2013-02-11 02:41:54'),
(10, 52, '41201', '2013-02-11 02:22:20'),
(11, 53, '41201', '2013-02-11 02:24:26'),
(12, 54, '41201', '2013-02-11 02:25:44'),
(13, 55, '41201', '2013-02-11 02:39:27'),
(14, 56, '41201', '2013-02-11 02:41:51'),
(15, 57, 'central', '2013-02-16 03:41:24'),
(16, 58, 'central', '2013-02-18 11:20:07'),
(17, 59, '41201', '2013-02-18 11:21:08'),
(18, 60, 'central', '2013-02-18 11:41:06'),
(19, 61, '10011', '2013-04-09 23:00:40'),
(20, 62, '10011.5', '2013-04-09 23:01:57'),
(21, 63, '10011.5', '2013-04-09 23:21:52'),
(22, 64, '10011.5', '2013-04-09 23:28:55'),
(23, 65, '10011.5', '2013-04-09 23:22:32'),
(24, 66, '10011.5', '2013-04-18 23:41:11'),
(25, 67, 'central', '2013-04-18 23:43:21'),
(26, 68, 'central', '2013-04-18 23:18:14'),
(27, 69, '10011.5', '2013-04-20 07:44:57'),
(28, 70, 'site manager', '2013-04-20 06:49:40'),
(29, 71, '10011.6', '2013-04-20 06:51:44'),
(30, 72, '10013.6', '2013-04-20 06:53:00'),
(31, 73, '10011.5', '2013-04-25 22:58:46'),
(32, 74, '10011.4', '2013-04-25 22:59:45'),
(33, 75, '10011.4', '2013-04-27 02:43:34'),
(34, 76, '10011.5', '2013-04-27 03:03:44'),
(35, 77, '10011.5', '2013-04-27 03:15:39'),
(36, 78, '10011.5', '2013-04-27 03:26:30'),
(37, 79, '10011.5', '2013-04-28 07:22:54'),
(38, 80, 'central', '2013-04-28 06:47:46'),
(39, 81, 'central', '2013-04-28 07:31:29'),
(40, 82, '10011.5', '2013-04-28 07:33:54'),
(41, 83, '10011.5', '2013-04-28 07:04:32'),
(42, 84, 'central', '2013-05-02 01:23:09'),
(43, 85, 'MAPL->LCDLP->Chinki Astana->185', '2013-05-02 17:46:53'),
(44, 86, 'MAPL->LCDLP->Chinki Astana->185', '2013-05-02 17:47:55'),
(45, 87, '10011.5', '2013-05-02 18:01:56'),
(46, 88, 'central', '2013-05-02 18:11:34'),
(47, 89, 'central', '2013-05-25 01:01:10'),
(48, 90, '10011.5', '2013-05-25 00:54:10'),
(49, 91, '10011.5', '2013-05-25 00:54:58'),
(50, 92, 'central', '2013-05-25 01:02:41'),
(51, 93, '10011.5', '2013-05-29 16:19:20'),
(52, 94, '10011.5', '2013-06-01 00:39:15'),
(53, 95, '10011.5', '2013-06-01 00:43:19'),
(54, 96, '10011.5', '2013-06-01 01:02:16'),
(55, 97, '10011.5', '2013-06-01 01:05:30'),
(56, 98, '10011.5', '2013-06-01 00:27:50'),
(57, 99, '10011.5', '2013-06-01 00:27:59'),
(58, 100, '10011.5', '2013-06-01 00:47:14'),
(59, 101, 'central', '2013-06-01 00:53:41'),
(60, 102, '60011.', '2013-06-01 01:18:28'),
(61, 103, 'central', '2013-06-01 01:14:47'),
(62, 104, 'central', '2013-06-01 01:16:47'),
(63, 105, 'central', '2013-06-01 01:41:53'),
(64, 106, 'central', '2013-06-01 01:48:48'),
(65, 107, 'central', '2013-06-01 01:36:04'),
(66, 108, 'central', '2013-06-01 01:51:25'),
(67, 109, 'central', '2013-06-01 01:07:44'),
(68, 110, 'central', '2013-06-26 07:35:51'),
(69, 111, '10011.5', '2013-06-11 23:24:38'),
(70, 112, '10011.5', '2013-06-14 01:26:53'),
(71, 113, '10011.5', '2013-06-14 01:46:23'),
(72, 114, '10011.5', '2013-06-14 01:59:20'),
(73, 115, 'central', '2013-06-26 07:28:47'),
(74, 116, '10011.5', '2013-06-26 07:34:39'),
(75, 117, 'central', '2013-07-15 21:58:28'),
(76, 118, 'central', '2013-07-27 18:15:18'),
(77, 119, '10011.5', '2013-09-13 09:18:08');

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

--
-- Dumping data for table `supplier_master`
--


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

--
-- Dumping data for table `tasks`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`id`, `name`, `date_added`) VALUES
(2, 'kg', '2013-05-25 01:07:00');

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
(72, 'sample user 7', 'sampleuser7@yahoo.com', '01710123333', 108023, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site supervisor', '47336_488967517815122_1966545043_n (2).jpg', '2012-12-24 16:46:37'),
(73, 'sample user 1', 'sampleuser1@yahoo.com', '01710123433', 104077, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 6', 'sample site 7', 'site manager', '47336_488967517815122_1966545043_n (3).jpg', '2012-12-24 16:51:43'),
(74, 'sample admin 1', 'sampleadmin1@yahoo.com', '01705007007', 888800, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'admin', '', '0000-00-00 00:00:00'),
(76, 'sample super admin 1', 'samplesuperadmin1@yahoo.com', '01710007007', 888888, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'super admin', '47336_488967517815122_1966545043_n.jpg', '0000-00-00 00:00:00'),
(77, 'fahad', 'fahadbillah@yahoo.com', '01671026001', 0, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', '', 'webdeveloper', '', '2013-01-06 16:14:27'),
(78, 'xyz', 'fahadbillah@yahoo.com', '01671026001', 155015, '', '', '', '', '', '', '', '2013-01-07 02:47:00'),
(79, 'sample corporate user', 'samplecorporateuser1@yahoo.com', '123456789', 100001, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', '', '', 'Manager', '', '2013-01-07 02:59:25'),
(80, 'sample corporate user', 'samplecorporateuser2@yahoo.com', '123456789', 199001, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Marketing', '', '', 'Deputy Manager', '47336_488967517815122_1966545043_n (4).jpg', '2013-01-07 03:08:37'),
(81, 'sample corporate user3', 'samplecorporateuser3@yahoo.com', '123456789', 199002, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Finance', '', '', 'Additional Manager', '', '2013-01-07 03:04:44'),
(82, 'sample corporate user4', 'samplecorporateuser4@yahoo.com', '123456789', 199003, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Finance', '', '', 'GM', '', '2013-01-07 03:23:16'),
(83, 'sample corporate user5', 'samplecorporateuser5@yahoo.com', '12345678', 199004, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Accounts', '', '', 'GM', '', '2013-01-07 03:24:28'),
(84, 'sample corporate user 6', 'samplecorporateuser6@yahoo.com', '12345678', 199005, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Accounts', '', '', 'Manager', '', '2013-01-07 03:48:32'),
(85, 'sample corporate user 9', 'samplecorporateuser9@yahoo.com', '123544235', 199006, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'Logigistic & Operation', '', '', 'GM', '', '2013-01-18 19:12:56'),
(86, 'sample user 20', 'sampleuser20@yahoo.com', '098787687', 108024, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site supervisor', '', '2013-01-20 01:28:11'),
(87, 'sample user 21', 'sampleuser21@yahoo.com', '0998987986', 108025, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', '', 'sample project 5', 'sample site 2', 'site manager', '', '2013-01-20 01:15:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_login_details`
--

INSERT INTO `user_login_details` (`id`, `user_id`, `email`, `password`, `date`) VALUES
(6, 11, 'arvin@yahoo.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-02-22 05:17:39'),
(9, 17, 'arvi34n@yahoo.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-02-22 05:29:57'),
(10, 12, 'sharif@yahoo.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-02-22 05:30:50'),
(11, 29, 'centralboss1@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:23:38'),
(12, 27, 'Chinki185staff1@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 06:54:54'),
(13, 39, 'testcentralboss@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:34:50'),
(14, 37, 'centralscm@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:35:33'),
(15, 36, 'centralacc@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:35:53'),
(16, 44, 'laksam207accountant@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:41:31'),
(17, 43, 'laksam207scm@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:42:05'),
(18, 42, 'laksam207boss@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:42:41'),
(19, 41, 'laksam207staff@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-20 07:43:13'),
(20, 24, 'chinkiboss185@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-27 03:14:07'),
(21, 25, 'chinkiaccountant185@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-27 03:27:12'),
(22, 26, 'chinkiscm185@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-04-27 03:29:47'),
(23, 45, 'ahk.tuhin@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-06-01 01:31:39'),
(24, 46, 'testsestuff@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-06-01 01:40:45'),
(25, 47, 'lubhouseraiser@yahoo.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-06-01 01:48:00'),
(27, 48, 'fahadcash1@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-07-01 02:34:08'),
(28, 49, 'anotheradmin@gmail.com', 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '2013-07-01 02:56:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `designation`, `office_code`, `authorization_level`, `user_since`, `active_status`) VALUES
(11, 'Mr. Arvin', 'MD', '10000', 'Central Hub Admin', '2013-02-18 11:31:12', 'active'),
(12, 'Mr. Sharif', 'GM', '10001', 'Central Hub Admin', '2013-02-18 11:31:50', 'active'),
(17, 'sample user 1', 'Manager', '121212', 'Raise', '2013-02-22 05:13:11', 'active'),
(18, 'Chinki boss', 'Manager', '12345', 'Approve', '2013-04-05 14:45:40', 'active'),
(19, 'Chinki accountant', 'accountant', '123456', 'View', '2013-04-05 14:47:15', 'active'),
(20, 'Chinki scm', 'SCM', '1234567', 'View', '2013-04-05 14:47:42', 'active'),
(21, 'Chinki 181 boss', 'Manager', '181', 'Approve', '2013-04-05 14:48:59', 'active'),
(22, 'Chinki 181 accountant', 'accountant', '1812', 'View', '2013-04-05 14:49:48', 'active'),
(23, 'Chinki 181 scm', 'SCM', '1813', 'View', '2013-04-05 14:50:12', 'active'),
(24, 'Chinki boss 185', 'Executive', '12345644', 'Approve', '2013-04-09 23:37:08', 'active'),
(25, 'Chinki accountant 185', 'Executive', '2134124', 'Execute', '2013-04-09 23:13:42', 'active'),
(26, 'Chinki scm 185', 'Executive', '45656', 'Execute', '2013-04-09 23:14:43', 'active'),
(27, 'Chinki 185 staff1', 'Executive', '12345', 'Raise', '2013-04-09 23:16:17', 'active'),
(29, 'Central boss 1', 'Manager', '987987', 'Approve', '2013-04-18 23:27:16', 'active'),
(37, 'test central scm', 'Manager', '43346436', 'Execute', '2013-04-18 23:08:30', 'active'),
(39, 'test central boss', 'Manager', '86987', 'Approve', '2013-04-20 07:42:33', 'active'),
(40, 'test central boss 2', 'Manager', '43346436', 'Approve', '2013-04-20 07:43:17', 'active'),
(41, 'sample user 12', 'Executive', '2131927', 'Raise', '2013-04-20 07:36:39', 'active'),
(42, 'laksam 207 boss', 'Manager', '123456', 'Approve', '2013-04-20 07:37:42', 'active'),
(43, 'laksam 207 scm', 'Executive', '12345644', 'Execute', '2013-04-20 07:38:43', 'active'),
(44, 'laksam 207 accountant', 'Executive', '1234567', 'Execute', '2013-04-20 07:39:06', 'active'),
(45, 'Mr. Tuhin', 'Hub Admin', '1000', 'Hub Admin', '2013-06-01 01:30:52', 'active'),
(46, 'New user for SE', 'Manager', '9798987', 'Raise', '2013-06-01 01:38:51', 'active'),
(47, 'Lub House Raiser', 'Manager', 'MAX Group L', 'Raise', '2013-06-01 01:47:03', 'active'),
(48, 'fahad hub', 'Hub Admin', '123', 'Admin', '2013-07-01 02:28:44', 'active');

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
