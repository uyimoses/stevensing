/*
MySQL Data Transfer
Source Host: localhost
Source Database: stevensing
Target Host: localhost
Target Database: stevensing
Date: 12/12/2013 18:00:01
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_id` int(11) NOT NULL,
  `feed_type` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(600) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for course_list
-- ----------------------------
DROP TABLE IF EXISTS `course_list`;
CREATE TABLE `course_list` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`course_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `course_list_ibfk_7` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  CONSTRAINT `course_list_ibfk_8` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(3) NOT NULL,
  `number` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(6000) DEFAULT NULL,
  `professor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for event_list
-- ----------------------------
DROP TABLE IF EXISTS `event_list`;
CREATE TABLE `event_list` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`),
  KEY `user_id5` (`user_id`),
  CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  CONSTRAINT `user_id5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for friend_list
-- ----------------------------
DROP TABLE IF EXISTS `friend_list`;
CREATE TABLE `friend_list` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `friend_id` (`friend_id`),
  CONSTRAINT `friend_id` FOREIGN KEY (`friend_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pictures
-- ----------------------------
DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(2048) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
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
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_id4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for resources
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(2048) NOT NULL,
  `title` varchar(100) NOT NULL,
  `catalog` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`resource_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `entity_type` tinyint(4) NOT NULL,
  `content` varchar(600) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `security_question` varchar(200) NOT NULL,
  `security_answer` varchar(200) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `blogs` VALUES ('4', '21', 'Hi!', 'Hi Guys,I recommend a great course, CS546! ', '2013-12-11 09:33:12');
INSERT INTO `blogs` VALUES ('5', '22', 'Great day!', 'Have a great day!', '2013-12-11 10:17:14');
INSERT INTO `blogs` VALUES ('6', '27', 'qwe', 'qweqwe', '2013-12-11 11:32:39');
INSERT INTO `blogs` VALUES ('7', '26', 'asdf', 'sadf', '2013-12-11 11:35:29');
INSERT INTO `course_list` VALUES ('1', '20', '1');
INSERT INTO `course_list` VALUES ('1', '21', '1');
INSERT INTO `course_list` VALUES ('1', '22', '1');
INSERT INTO `course_list` VALUES ('1', '23', '1');
INSERT INTO `course_list` VALUES ('1', '27', '1');
INSERT INTO `course_list` VALUES ('2', '23', '1');
INSERT INTO `course_list` VALUES ('2', '26', '1');
INSERT INTO `course_list` VALUES ('2', '27', '1');
INSERT INTO `courses` VALUES ('1', 'CS', '546', 'web', 'web progm', 'Stevens Gabbrro');
INSERT INTO `courses` VALUES ('2', 'CS', '570', 'c++', 'c++ pro', 'David Pfeffer');
INSERT INTO `courses` VALUES ('3', 'FE', '545', 'Accounting', 'Accounting is thousands of years old. Accounting records, which date back more than 7,000 years, were found in Mesopotamia (Assyrians). The people of that time relied on primitive accounting methods to record the growth of crops and herds. Accounting evolved, improving over the years and advancing as business advanced.', 'Smith Kim');
INSERT INTO `events` VALUES ('1', '10', '1', 'hello', 'h', '2013-12-09 21:01:53', null, '2', '2013-12-09 21:20:25');
INSERT INTO `events` VALUES ('2', '10', '1', 'bye', 'b', '2013-12-09 21:02:11', null, '3', '2013-12-09 21:20:25');
INSERT INTO `events` VALUES ('3', '10', '1', 'Discuss', 'cs546 project', '2013-02-12 21:24:10', '2013-02-12 21:24:10', '2', '2013-12-10 02:45:37');
INSERT INTO `events` VALUES ('4', '10', '1', 'Discuss', 'cs546 project', '2013-02-12 21:24:10', '2013-02-12 21:24:10', '2', '2013-12-10 02:54:18');
INSERT INTO `events` VALUES ('5', '10', '1', 'Discuss', 'cs546 project', '2013-02-12 21:24:10', '2013-02-12 21:24:10', '2', '2013-12-10 02:54:29');
INSERT INTO `events` VALUES ('6', '10', '1', 'Discuss', 'cs546 project', '2013-02-12 21:24:10', '2013-02-12 21:24:10', '2', '2013-12-10 02:54:49');
INSERT INTO `friend_list` VALUES ('20', '21', '2013-12-11 10:05:28', '2');
INSERT INTO `friend_list` VALUES ('20', '23', '2013-12-11 10:39:43', '1');
INSERT INTO `friend_list` VALUES ('21', '20', '2013-12-11 10:05:28', '2');
INSERT INTO `friend_list` VALUES ('21', '22', '2013-12-11 10:31:58', '2');
INSERT INTO `friend_list` VALUES ('22', '20', '2013-12-11 10:29:57', '1');
INSERT INTO `friend_list` VALUES ('22', '21', '2013-12-11 10:31:58', '2');
INSERT INTO `friend_list` VALUES ('22', '23', '2013-12-11 10:39:43', '1');
INSERT INTO `friend_list` VALUES ('24', '27', '2013-12-11 11:33:28', '1');
INSERT INTO `friend_list` VALUES ('26', '27', '2013-12-11 11:34:07', '2');
INSERT INTO `friend_list` VALUES ('27', '26', '2013-12-11 11:34:07', '2');
INSERT INTO `profiles` VALUES ('20', 'qian', 'qian', 'Jia', 'F', '2012-09-02', 'BME', 'Master', '2012', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('21', 'Eve', '', 'Jia', 'F', '1989-12-19', 'BME', 'Master', '2012', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('22', 'qian', '', 'qian', 'M', '2013-12-01', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('23', 'zhi', 'zhi', 'zhi', 'M', '2013-12-01', 'BME', 'Master', '1235', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('24', 'Zhi', '', 'Qian', 'M', '1990-11-05', 'CPE', 'Master', '2012', '1', './upload/picture/24.jpg');
INSERT INTO `profiles` VALUES ('25', 'xiao', '', 'han', 'F', '2013-12-03', 'BME', 'Master', '2012', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('26', 'qwert', 'asdf', 'o\'hara', 'M', '2013-12-01', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('27', 'zhi', '', 'qian', 'M', '2013-12-10', 'CS', 'Master', '1000', '1', './upload/picture/27.jpg');
INSERT INTO `reviews` VALUES ('2', '1', '21', '5', 'I love this course so much!', '2013-12-11 09:29:54');
INSERT INTO `reviews` VALUES ('3', '1', '22', '5', '546 is one of the best courses I have ever had.', '2013-12-11 10:25:05');
INSERT INTO `reviews` VALUES ('4', '1', '20', '5', '546 is one of the best courses I have ever had.', '2013-12-11 10:28:47');
INSERT INTO `reviews` VALUES ('5', '1', '20', '5', '546 is one of the best courses I have ever had.', '2013-12-11 10:28:57');
INSERT INTO `reviews` VALUES ('6', '1', '23', '5', 'Best ever!', '2013-12-11 10:42:28');
INSERT INTO `reviews` VALUES ('7', '2', '23', '3', 'Good!', '2013-12-11 10:43:15');
INSERT INTO `reviews` VALUES ('8', '1', '27', '5', 'qwer', '2013-12-11 11:30:20');
INSERT INTO `reviews` VALUES ('9', '2', '26', '2', 'asdfasdf', '2013-12-11 11:35:41');
INSERT INTO `statuses` VALUES ('1', '21', '1', 'Today is Wednesday!', '2013-12-11 09:28:47');
INSERT INTO `statuses` VALUES ('2', '1', '2', 'New status', '2013-12-11 09:30:47');
INSERT INTO `statuses` VALUES ('3', '1', '2', 'It\'s presentation Day!', '2013-12-11 09:44:32');
INSERT INTO `statuses` VALUES ('4', '1', '2', 'It\'s presentation Day!', '2013-12-11 09:45:04');
INSERT INTO `statuses` VALUES ('5', '22', '1', 'Great day!', '2013-12-11 10:16:51');
INSERT INTO `statuses` VALUES ('6', '1', '2', '546 is one of the best courses I have ever had.', '2013-12-11 10:22:15');
INSERT INTO `statuses` VALUES ('7', '1', '2', '546 is one of the best courses I have ever had.', '2013-12-11 10:28:35');
INSERT INTO `statuses` VALUES ('8', '1', '2', 'zhi', '2013-12-11 10:42:11');
INSERT INTO `statuses` VALUES ('9', '1', '2', 'sth', '2013-12-11 11:31:03');
INSERT INTO `statuses` VALUES ('10', '1', '2', 'sth', '2013-12-11 11:31:04');
INSERT INTO `statuses` VALUES ('11', '1', '2', 'sthasdf', '2013-12-11 11:31:36');
INSERT INTO `statuses` VALUES ('12', '1', '2', 'sthasdf', '2013-12-11 11:31:37');
INSERT INTO `statuses` VALUES ('13', '1', '2', 'sthasdf', '2013-12-11 11:32:03');
INSERT INTO `statuses` VALUES ('14', '27', '1', 'sadfasdfasdf', '2013-12-11 11:32:33');
INSERT INTO `statuses` VALUES ('15', '27', '1', 'sadfasdfasdfas', '2013-12-11 11:32:35');
INSERT INTO `statuses` VALUES ('16', '26', '1', 'wefaewf', '2013-12-11 11:35:22');
INSERT INTO `users` VALUES ('20', 'rjia@stevens.edu', '46bcb27274c3b40541d104afd608c2e54add79b0', '374977aee950b9e86a391213c47f38bb6b90cfa0', '6008c667543f66951fd5b20281ad77ede0f99c8c', '0');
INSERT INTO `users` VALUES ('21', 'rjia1@stevens.edu', '46bcb27274c3b40541d104afd608c2e54add79b0', 'e8b7ac7668dba39f13186bef837d722cc77de802', '6008c667543f66951fd5b20281ad77ede0f99c8c', '0');
INSERT INTO `users` VALUES ('22', 'zhi@stevens.edu', '7c222fb2927d828af22f592134e8932480637c0d', '75a196a61b96ec978eb98d19f959fed4b65a4836', 'c3a045db58f036f017503285898d26d1bb21135c', '0');
INSERT INTO `users` VALUES ('23', 'zhi1@stevens.edu', '7c222fb2927d828af22f592134e8932480637c0d', 'zhizhizhizhi', '465171765770dd55ae9ba3469e395f16830d2ad3', '0');
INSERT INTO `users` VALUES ('24', 'zqian@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'foodfood', '37e6442b1f721c459ee5378470f4dd6d97aeea3e', '0');
INSERT INTO `users` VALUES ('25', 'xiaohan@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '1234qwer', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '0');
INSERT INTO `users` VALUES ('26', 'qwer@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '1234qwer', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '0');
INSERT INTO `users` VALUES ('27', 'zqian2@stevens.edu', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'qwer1235', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', '0');
