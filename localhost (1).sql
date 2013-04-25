-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2012 at 10:22 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task_manager`
--
CREATE DATABASE `task_manager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `task_manager`;

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
('Max Lubricant', 3);

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
('sample project 2', 12, 'Max Builders Limited'),
('sample project 6', 4, 'Max Automobile'),
('sample project 5', 8, 'Max Automobile');

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
  `recurring_nonrecurring` varchar(100) NOT NULL,
  `costing` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `title`, `description`, `type_of_req`, `recurring_nonrecurring`, `costing`, `user_id`, `status`, `submission_date`, `deadline`) VALUES
(1, 'YOUR ARGUMENT IS INVALID', 'llk', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 04:43:32', '12/22/23'),
(2, 'sadfas', 'adsfsdf', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 04:48:00', '12/22/23'),
(3, 'sadfas', 'adsfsdf', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 04:48:17', '12/22/23'),
(4, 'sadfas', 'adsfsdf', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 04:49:23', '12/22/23'),
(5, 'sadfas', 'adsfsdf', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 04:50:37', '12/22/23'),
(6, 'sadfas', 'adsfsdf', 'sample req type 3', 'non-recurring', 123131, 34, 'Pending', '2012-12-08 05:02:22', '12/22/23'),
(7, 'sample requisition 1', 'sample requisition 1 description', 'sample req type 2', 'recurring', 50000, 36, 'Pending', '2012-12-08 04:23:45', '22/12/2012'),
(8, 'sample requisition 2', 'sample requisition 2 Description', 'sample req type 4', 'non-recurring', 100000, 36, 'Pending', '2012-12-08 04:39:36', '1/1/2013'),
(9, 'sample requisition 3', 'sample requisition 3 description', 'sample req type 5', 'non-recurring', 20000, 36, 'Pending', '2012-12-08 04:41:00', '25/12/2012'),
(10, 'sample requisition 7', 'sample requisition 7 Description', 'sample req type 3', 'recurring', 50000, 36, 'Pending', '2012-12-08 04:36:45', '22/12/2012'),
(11, 'sample requisition 8', 'sample requisition 8 Description', 'sample req type 1', 'recurring', 100000, 71, 'Pending', '2012-12-09 23:57:44', '22/12/2012'),
(12, 'sample requisition 9', 'sample requisition 9', 'sample req type 7', 'non-recurring', 100000, 71, 'Pending', '2012-12-10 00:08:20', '22/12/2012'),
(13, 'sample requisition 10', 'sample requisition 10', 'sample req type 4', 'non-recurring', 131212, 71, 'Pending', '2012-12-10 00:09:25', '22/12/2012'),
(14, 'sample requisition 11', 'sample requisition 11', 'sample req type 2', 'non-recurring', 123456, 73, 'Modify', '2012-12-10 14:44:48', '22/12/2012'),
(17, 'sample requisition 13', 'sample requisition 13 Description', 'sample req type 5', 'recurring', 131212, 73, 'Solved', '2012-12-10 14:48:28', '22/12/2012'),
(18, 'sample requisition 14', 'sample requisition 14', 'sample req type 3', 'recurring', 123456, 73, 'Modify', '2012-12-10 14:48:36', '22/12/2012'),
(19, 'sample requisition 15', 'sample requisition 15', 'sample req type 6', 'recurring', 100000, 73, 'Pending', '2012-12-10 15:08:36', '22/12/2012'),
(20, 'sample requisition 15', 'sample requisition 15', 'sample req type 5', 'recurring', 123131, 73, 'Pending', '2012-12-10 15:12:20', '22/12/2012');

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
('destination 1', 1),
('destination 2', 2),
('destination 3', 3),
('destination 4', 4);

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
('sample site 7', 'site', 7, 'sample project 6');

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
('sample req type 1', 1, 'hrm'),
('sample req type 2', 2, 'hrm'),
('sample req type 3', 3, 'accounts'),
('sample req type 4', 4, 'accounts'),
('sample req type 5', 5, 'marketing'),
('sample req type 6', 6, 'sales'),
('sample req type 7', 7, 'finance');

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
  `project` varchar(100) NOT NULL,
  `site_factory` varchar(100) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `name`, `email`, `contact`, `staff_id`, `password`, `master`, `project`, `site_factory`, `designation`, `image`) VALUES
(70, 'sample user 2', 'sampleuser2@yahoo.com', '01710123433', 104076, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'sample project 6', 'sample site 7', 'site supervisor', ''),
(71, 'sample user 6', 'sampleuser6@yahoo.com', '01710123433', 108022, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'sample project 5', 'sample site 2', 'site manager', ''),
(72, 'sample user 7', 'sampleuser7@yahoo.com', '01710123333', 108023, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'sample project 5', 'sample site 2', 'site supervisor', ''),
(73, 'sample user 1', 'sampleuser1@yahoo.com', '01710123433', 104077, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', 'Max Automobile', 'sample project 6', 'sample site 7', 'site manager', ''),
(74, 'sample admin 1', 'sampleadmin1@yahoo.com', '01705007007', 888800, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', 'admin', ''),
(75, 'sample super admin 1', 'samplesuperadmin1@yahoo.com', '01710007007', 888888, 'Pz16DwE60yTpZg4iuS0ICTMy0/4qNjMlRGYqI0A=', '', '', '', 'super admin', '');

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
