-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2013 at 06:42 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admins`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(23, 'Hub Admin', 'MAPL', '2013-05-06 23:01:22');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(17, 'Laksham', 'LCDLP', 'MAPL', '10013', '', '2013-04-05 14:41:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_category`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_master`
--


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
  `limit` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money_limit`
--

INSERT INTO `money_limit` (`limit`, `user_id`, `date_modified`, `type`) VALUES
(50000, 0, '0000-00-00 00:00:00', 'Local Purchase'),
(10000, 0, '0000-00-00 00:00:00', 'default'),
(500000, 12, '2013-04-28 07:24:13', ''),
(50000, 24, '2013-04-28 07:33:33', ''),
(50000, 21, '2013-04-28 07:33:33', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `subject`, `message`, `sender`, `receiver`, `flag`, `date`) VALUES
(1, 'sample pm', 'sample pm', 73, 73, '', '2013-01-09 23:19:45'),
(2, 'yoo', 'noo', 73, 73, 'new', '2013-01-09 23:25:27'),
(3, 'hahah', 'hahahahah', 73, 73, 'new', '2013-01-09 23:27:00'),
(4, 'so,', 'so,', 73, 73, 'new', '2013-01-09 23:29:20'),
(5, 'erewr', 'ewrwrew', 73, 73, 'new', '2013-01-09 23:29:50'),
(6, 'yoo', 'noo', 73, 73, 'new', '2013-01-10 00:11:14'),
(7, 'new ', 'message\n', 73, 73, 'new', '2013-01-10 00:07:10'),
(8, 'qqq', 'wwww', 73, 73, 'new', '2013-01-10 00:09:23'),
(9, 'hhh', 'nnnn', 73, 73, 'new', '2013-01-09 23:46:10'),
(10, 'jjj', 'ffff', 73, 73, 'new', '2013-01-09 23:47:20'),
(11, 'aaaa', 'asdfasdf', 73, 73, 'new', '2013-01-09 23:53:14'),
(12, 'aaaaa', 'asdfasdf', 0, 0, 'new', '2013-01-10 00:04:14'),
(13, 'asfasfds', 'asdfasfasfasfasf', 73, 73, 'new', '2013-01-10 00:05:00'),
(14, 'wow', 'again wow', 73, 73, 'new', '2013-01-10 00:06:02'),
(15, 'wow', 'noww', 73, 76, 'new', '2013-01-13 23:36:16');

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
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type_of_req` varchar(100) NOT NULL,
  `admin` varchar(11) NOT NULL,
  `recurring_nonrecurring` varchar(100) NOT NULL,
  `costing` int(30) NOT NULL,
  `actual_cost_by_scm` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `title`, `description`, `type_of_req`, `admin`, `recurring_nonrecurring`, `costing`, `actual_cost_by_scm`, `user_id`, `location_id`, `status`, `submission_date`, `deadline`) VALUES
(27, 'sample req11', 'No designation available', 'sample req type 9', '84', 'recurring', 134567, 0, 73, '0', 'Pending', '2013-01-09 23:29:02', '16/12/2012'),
(31, 'buy computer new', 'buy computer new', 'sample req type 9', '73', 'non-recurring', 1345673, 0, 86, '0', 'New', '2013-01-20 01:12:13', '16/12/2012'),
(32, 'buy computer new', 'buy computer new', 'sample req type 9', '73', 'recurring', 1345673, 0, 86, '0', 'New', '2013-01-20 01:28:41', '16/12/2012'),
(34, 'sample req11', 'sample req11', 'sample req type 2', '', 'recurring', 1345673, 0, 99, '41201', 'Pending', '2013-01-20 15:45:15', '16/12/2012'),
(35, 'sample req11', 'sample req11', 'sample req type 2', '', 'recurring', 1345673, 0, 99, '41201', 'Modify', '2013-01-20 15:50:38', '16/12/2012'),
(36, 'sample req11', 'sample req11', 'sample req type 2', '', 'recurring', 1345673, 0, 99, '41201', 'Solved', '2013-01-20 15:50:53', '16/12/2012'),
(37, 'sample req11', 'sample req11', 'sample req type 2', '', 'recurring', 1345673, 0, 99, '41201', 'Pending', '2013-01-20 15:51:09', '16/12/2012'),
(38, 'sample req11', 'sample req11', 'sample req type 2', '', 'recurring', 1345673, 0, 99, '41201', 'Pending', '2013-01-20 16:01:14', '16/12/2012'),
(39, 'buy computer new', 'buy computer new', 'sample req type 9', '', 'non-recurring', 1345673, 0, 5, '41201', 'Approved', '2013-02-11 02:33:49', '16/12/2012'),
(45, 'asdfasf', 'sdfsadfasf', 'Local Purchase', '', '', 1231333, 0, 5, '41201', 'Delivered', '2013-02-18 11:14:24', '16/12/2012'),
(48, 'fffff', 'fffff', 'Local Purchase', '', '', 5000, 0, 5, '41201', 'Clear From Accounts', '2013-02-11 02:52:44', '16/12/2012'),
(56, 'vdvdvdv', 'vdvdvdvd', 'Fund', '', '', 5000, 0, 5, '41201', 'Solved', '2013-02-11 02:18:28', '16/12/2012'),
(57, 'asdffffffffffffff', 'asdfdfdfdfffff', 'Local Purchase', '', '', 23432424, 0, 5, '41201', 'Delivered', '2013-02-18 11:13:45', '16/12/2012'),
(58, 'testing for central', 'testing for central', 'Service Charge', '', '', 100000000, 0, 5, '41201', 'Delivered', '2013-02-18 11:39:36', '16/12/2012'),
(59, 'testing for local', 'testing for local', 'Local Purchase', '', '', 5000, 0, 5, '41201', 'Delivered', '2013-02-18 11:50:19', '16/12/2012'),
(60, 'testing for central 2', 'testing for central 2', 'Recruitment', '', '', 1000000, 0, 5, '41201', 'Delivered', '2013-02-18 11:43:13', '16/12/2012'),
(61, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 23, '10011', 'New', '2013-04-09 23:00:40', '16/12/2012'),
(62, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 23, '10011.5', 'New', '2013-04-09 23:01:57', '16/12/2012'),
(63, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 23, '10011.5', 'New', '2013-04-09 23:21:52', '16/12/2012'),
(64, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 23, '10011.5', 'New', '2013-04-09 23:28:55', '16/12/2012'),
(65, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', '', 5000, 0, 27, '10011.5', 'Approved', '2013-04-09 22:59:17', '16/12/2012'),
(66, 'local purchase by 185 saff2', 'local purchase by 185 saff2. mushfiq vai said to write some word.', 'Local Purchase', '', '', 5000, 0, 28, '10011.5', 'Closed', '2013-04-18 23:03:56', '16/12/2012'),
(67, 'local purchase by 185 saff2', 'local purchase by 185 saff2', 'Local Purchase', '', '', 500000, 0, 28, '10011.5', 'New', '2013-04-18 23:43:20', '16/12/2012'),
(68, 'local purchase by 185 saff2 123', 'local purchase by 185 saff2 123', 'Local Purchase', '', '', 500000, 0, 28, '10011.5', 'Closed', '2013-04-18 22:51:42', '16/12/2012'),
(69, 'requisition by staff 12', 'need to buy pc locally', 'Local Purchase', '', '', 5000, 0, 28, '10011.5', 'New', '2013-04-20 07:44:57', '16/12/2012'),
(70, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 41, 'site manage', 'New', '2013-04-20 06:49:40', '16/12/2012'),
(71, 'local purchase new', 'local purchase new', 'Spare Parts', '', '', 5000, 0, 41, '10011.6', 'New', '2013-04-20 06:51:44', '16/12/2012'),
(72, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 41, '10013.6', 'New', '2013-04-20 06:53:00', '16/12/2012'),
(73, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 27, '10011.5', 'New', '2013-04-25 22:58:46', '16/12/2012'),
(74, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 27, '10011.4', 'New', '2013-04-25 22:59:45', '16/12/2012'),
(75, 'local purchase new', 'local purchase new', 'Local Purchase', '', '', 5000, 0, 27, '10011.4', 'Approved', '2013-04-27 03:48:38', '16/12/2012'),
(76, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', '', 5000, 0, 27, '10011.5', 'New', '2013-04-27 03:03:44', '16/12/2012'),
(77, 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', '', 5000, 0, 27, '10011.5', 'New', '2013-04-27 03:15:39', '16/12/2012'),
(78, 'local purchase new', 'local purchase by 185 saff1', 'Local Purchase', '', '', 5000, 5050, 27, '10011.5', 'Solved', '2013-05-02 17:56:06', '16/12/2012'),
(79, 'local purchase by 185 saff1 123123', 'local purchase by 185 saff1 123123', 'Local Purchase', '', '', 40000, 0, 27, '10011.5', 'Closed', '2013-04-28 07:43:29', '16/12/2012'),
(80, 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', '', 50001, 0, 27, '10011.5', 'Redirect', '2013-04-28 07:28:41', '16/12/2012'),
(81, 'local purchase new central test', 'local purchase new central test', 'Local Purchase', '', '', 500000, 345666, 27, '10011.5', 'Solved', '2013-05-02 02:04:03', '16/12/2012'),
(82, 'local purchase test', 'i need money for buying something\r\n', 'Local Purchase', '', '', 40000, 0, 27, '10011.5', 'Solved', '2013-05-02 01:59:18', '16/12/2012'),
(83, 'local purchase by 185 saff1', 'local purchase by 185 saff1', 'Local Purchase', '', '', 5000, 0, 27, '10011.5', 'Solved', '2013-05-02 01:59:03', '16/12/2012'),
(84, 'local purchase new for central', 'local purchase new for central', 'Local Purchase', '', '', 500000, 0, 27, '10011.5', 'Solved', '2013-05-02 02:03:41', '16/12/2012'),
(85, 'Fund req', 'Fund req 123', 'Fund', '', '', 10000, 0, 27, 'MAPL->LCDLP', 'New', '2013-05-02 17:46:53', '16/12/2012'),
(86, 'local purchase new', 'local purchase new desc', 'Fund', '', '', 10000, 0, 27, 'MAPL->LCDLP', 'New', '2013-05-02 17:47:55', '16/12/2012'),
(87, 'new fund', 'new fund', 'Fund', '', '', 5000, 0, 27, '10011.5', 'New', '2013-05-02 18:01:56', '16/12/2012'),
(88, 'salary of january', 'salary of january...................', 'Fund', '', '', 2000000, 1500000, 27, '10011.5', 'Closed', '2013-05-02 17:50:44', '16/12/2012');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `requisition_user`
--

INSERT INTO `requisition_user` (`id`, `user_id`, `location_id`, `post`, `active`, `date_added`) VALUES
(1, 1, 'central', 'Hub Admin', 'active', '2013-05-06 23:07:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

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
(46, 88, 'central', '2013-05-02 18:11:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login_details`
--

INSERT INTO `user_login_details` (`id`, `user_id`, `email`, `password`, `date`) VALUES
(1, 1, 'ahk.tuhin@gmail.com', 'Fkvhiqrb/UDXyzf3kE6AqDNrLX0qNjMlRGYqI0A=', '2013-05-06 22:09:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `designation`, `office_code`, `authorization_level`, `user_since`, `active_status`) VALUES
(1, 'Tuhin', 'Hub Admin', '00000', 'Hub Admin', '2013-05-06 23:07:35', 'active');

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
