-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2013 at 07:36 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-04:00";

--
-- Database: `stevensing`
--
CREATE DATABASE IF NOT EXISTS `stevensing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stevensing`;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `title`, `content`, `timestamp`) VALUES
(4, 21, 'Hi!', 'Hi Guys,I recommend a great course, CS546! ', '2013-12-11 14:33:12'),
(5, 22, 'Great day!', 'Have a great day!', '2013-12-11 15:17:14'),
(6, 27, 'qwe', 'qweqwe', '2013-12-11 16:32:39'),
(7, 26, 'asdf', 'sadf', '2013-12-11 16:35:29'),
(8, 24, 'How to cook', 'Cooking has come a long way from when our ancestors roasted wild game and local vegetation over an open fire. We''ve discovered an infinite number of ways to prepare and season food, but the nature of cooking remains the same: Apply heat to make food taste better. The rest is really just details that can be learned from an inquisitive spirit, creativity, and trial and error.', '2013-12-12 23:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_id` int(11) NOT NULL,
  `feed_type` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(600) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(3) NOT NULL,
  `number` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(6000) DEFAULT NULL,
  `professor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `department`, `number`, `name`, `description`, `professor`) VALUES
(1, 'CS', 546, 'Web Programming', 'web progm', 'Stevens Gabbrro'),
(2, 'CS', 570, 'Programming in C++', 'c++ pro', 'David Pfeffer'),
(3, 'FE', 546, 'Accounting', 'Accounting is thousands of years old. Accounting records, which date back more than 7,000 years, were found in Mesopotamia (Assyrians). The people of that time relied on primitive accounting methods to record the growth of crops and herds. Accounting evolved, improving over the years and advancing as business advanced.', 'Smith Kim');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

DROP TABLE IF EXISTS `course_list`;
CREATE TABLE IF NOT EXISTS `course_list` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`course_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`course_id`, `user_id`, `role`) VALUES
(1, 20, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 1),
(1, 24, 1),
(1, 27, 1),
(2, 23, 1),
(2, 26, 1),
(2, 27, 1),
(3, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `entity_type` tinyint(4) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(600) NOT NULL,
  `starttime` timestamp NULL DEFAULT NULL,
  `endtime` timestamp NULL DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `entity_id`, `entity_type`, `title`, `content`, `starttime`, `endtime`, `number`, `timestamp`) VALUES
(1, 10, 1, 'hello', 'h', '2013-12-10 02:01:53', NULL, 2, '2013-12-10 02:20:25'),
(2, 10, 1, 'bye', 'b', '2013-12-10 02:02:11', NULL, 3, '2013-12-10 02:20:25'),
(3, 10, 1, 'Discuss', 'cs546 project', '2013-02-13 02:24:10', '2013-02-13 02:24:10', 2, '2013-12-10 07:45:37'),
(4, 10, 1, 'Discuss', 'cs546 project', '2013-02-13 02:24:10', '2013-02-13 02:24:10', 2, '2013-12-10 07:54:18'),
(5, 10, 1, 'Discuss', 'cs546 project', '2013-02-13 02:24:10', '2013-02-13 02:24:10', 2, '2013-12-10 07:54:29'),
(6, 10, 1, 'Discuss', 'cs546 project', '2013-02-13 02:24:10', '2013-02-13 02:24:10', 2, '2013-12-10 07:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

DROP TABLE IF EXISTS `event_list`;
CREATE TABLE IF NOT EXISTS `event_list` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`),
  KEY `user_id5` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

DROP TABLE IF EXISTS `friend_list`;
CREATE TABLE IF NOT EXISTS `friend_list` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`user_id`, `friend_id`, `timestamp`, `status`) VALUES
(20, 21, '2013-12-11 15:05:28', 2),
(20, 23, '2013-12-11 15:39:43', 1),
(21, 20, '2013-12-11 15:05:28', 2),
(21, 22, '2013-12-11 15:31:58', 2),
(22, 20, '2013-12-11 15:29:57', 1),
(22, 21, '2013-12-11 15:31:58', 2),
(22, 23, '2013-12-11 15:39:43', 1),
(24, 27, '2013-12-11 16:33:28', 1),
(26, 27, '2013-12-11 16:34:07', 2),
(27, 26, '2013-12-11 16:34:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(2048) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `middlename` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `major` varchar(6) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `entry_year` smallint(6) NOT NULL,
  `entry_semester` tinyint(4) NOT NULL,
  `picture_id` varchar(2000) DEFAULT './upload/picture/0.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `firstname`, `middlename`, `lastname`, `gender`, `dob`, `major`, `degree`, `entry_year`, `entry_semester`, `picture_id`) VALUES
(20, 'qian', 'qian', 'Jia', 'F', '2012-09-02', 'BME', 'Master', 2012, 1, './upload/picture/0.jpg'),
(21, 'Eve', '', 'Jia', 'F', '1989-12-19', 'BME', 'Master', 2012, 1, './upload/picture/0.jpg'),
(22, 'qian', '', 'qian', 'M', '2013-12-01', 'BME', 'Master', 1234, 1, './upload/picture/0.jpg'),
(23, 'zhi', 'zhi', 'zhi', 'M', '2013-12-01', 'BME', 'Master', 1235, 1, './upload/picture/0.jpg'),
(24, 'Zhi', '', 'Qian', 'M', '1990-11-05', 'CPE', 'Master', 2012, 1, './upload/picture/24.jpg'),
(25, 'xiao', '', 'han', 'F', '2013-12-03', 'BME', 'Master', 2012, 1, './upload/picture/0.jpg'),
(26, 'qwert', 'asdf', 'o''hara', 'M', '2013-12-01', 'BME', 'Master', 1234, 1, './upload/picture/0.jpg'),
(27, 'zhi', '', 'qian', 'M', '2013-12-10', 'CS', 'Master', 1000, 1, './upload/picture/27.jpg'),
(28, 'qwer', '', 'qwer', 'M', '2013-12-04', 'BME', 'Master', 1234, 1, './upload/picture/28.jpg'),
(29, 'qwer', '', 'qwer', 'M', '2013-12-04', 'BME', 'Master', 1234, 1, './upload/picture/0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(2048) NOT NULL,
  `title` varchar(100) NOT NULL,
  `catalog` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`resource_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `course_id`, `user_id`, `score`, `content`, `timestamp`) VALUES
(2, 1, 21, 5, 'I love this course so much!', '2013-12-11 14:29:54'),
(3, 1, 22, 5, '546 is one of the best courses I have ever had.', '2013-12-11 15:25:05'),
(4, 1, 20, 5, '546 is one of the best courses I have ever had.', '2013-12-11 15:28:47'),
(5, 1, 20, 5, '546 is one of the best courses I have ever had.', '2013-12-11 15:28:57'),
(6, 1, 23, 5, 'Best ever!', '2013-12-11 15:42:28'),
(7, 2, 23, 3, 'Good!', '2013-12-11 15:43:15'),
(8, 1, 27, 5, 'qwer', '2013-12-11 16:30:20'),
(9, 2, 26, 2, 'asdfasdf', '2013-12-11 16:35:41'),
(10, 3, 28, 3, 'nothing', '2013-12-12 23:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `entity_type` tinyint(4) NOT NULL,
  `content` varchar(600) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `entity_id`, `entity_type`, `content`, `timestamp`) VALUES
(1, 21, 1, 'Today is Wednesday!', '2013-12-11 14:28:47'),
(2, 1, 2, 'New status', '2013-12-11 14:30:47'),
(3, 1, 2, 'It''s presentation Day!', '2013-12-11 14:44:32'),
(4, 1, 2, 'It''s presentation Day!', '2013-12-11 14:45:04'),
(5, 22, 1, 'Great day!', '2013-12-11 15:16:51'),
(6, 1, 2, '546 is one of the best courses I have ever had.', '2013-12-11 15:22:15'),
(7, 1, 2, '546 is one of the best courses I have ever had.', '2013-12-11 15:28:35'),
(8, 1, 2, 'zhi', '2013-12-11 15:42:11'),
(9, 1, 2, 'sth', '2013-12-11 16:31:03'),
(10, 1, 2, 'sth', '2013-12-11 16:31:04'),
(11, 1, 2, 'sthasdf', '2013-12-11 16:31:36'),
(12, 1, 2, 'sthasdf', '2013-12-11 16:31:37'),
(13, 1, 2, 'sthasdf', '2013-12-11 16:32:03'),
(14, 27, 1, 'sadfasdfasdf', '2013-12-11 16:32:33'),
(15, 27, 1, 'sadfasdfasdfas', '2013-12-11 16:32:35'),
(16, 26, 1, 'wefaewf', '2013-12-11 16:35:22'),
(17, 24, 1, 'Just want to say hello to everyone:)', '2013-12-12 23:28:58'),
(18, 3, 2, 'd', '2013-12-12 23:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `security_question` varchar(200) NOT NULL,
  `security_answer` varchar(200) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `security_question`, `security_answer`, `status`) VALUES
(20, 'rjia@stevens.edu', '46bcb27274c3b40541d104afd608c2e54add79b0', '374977aee950b9e86a391213c47f38bb6b90cfa0', '6008c667543f66951fd5b20281ad77ede0f99c8c', 0),
(21, 'rjia1@stevens.edu', '46bcb27274c3b40541d104afd608c2e54add79b0', 'e8b7ac7668dba39f13186bef837d722cc77de802', '6008c667543f66951fd5b20281ad77ede0f99c8c', 0),
(22, 'zhi@stevens.edu', '7c222fb2927d828af22f592134e8932480637c0d', '75a196a61b96ec978eb98d19f959fed4b65a4836', 'c3a045db58f036f017503285898d26d1bb21135c', 0),
(23, 'zhi1@stevens.edu', '7c222fb2927d828af22f592134e8932480637c0d', 'zhizhizhizhi', '465171765770dd55ae9ba3469e395f16830d2ad3', 0),
(24, 'zqian@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'foodfood', '37e6442b1f721c459ee5378470f4dd6d97aeea3e', 0),
(25, 'xiaohan@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '1234qwer', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 0),
(26, 'qwer@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '1234qwer', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 0),
(27, 'zqian2@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'qwer1235', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 0),
(28, 'qwer3@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '1234qwer', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 0),
(29, 'qwer4@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '12341234qwe', 'b9f2cd271d13f7efc74b6f1ae52e8c4589a45c89', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_list`
--
ALTER TABLE `course_list`
  ADD CONSTRAINT `course_list_ibfk_7` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_list_ibfk_8` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `event_list`
--
ALTER TABLE `event_list`
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD CONSTRAINT `friend_id` FOREIGN KEY (`friend_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_id4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;
