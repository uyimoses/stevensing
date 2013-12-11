/*
MySQL Data Transfer
Source Host: localhost
Source Database: stevensing
Target Host: localhost
Target Database: stevensing
Date: 12/11/2013 06:20:10
*/

SET FOREIGN_KEY_CHECKS=0;
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
-- Records 
-- ----------------------------
INSERT INTO `profiles` VALUES ('10', 'qwer', 'qwer', 'qwer', 'M', '2013-12-05', 'CS', 'Master', '2012', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('11', 'we', '', 'qwe', 'M', '2013-12-03', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('12', 'Zhi', '', 'Qian', 'M', '2013-12-03', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('13', 'Zhi', '', 'Qian', 'M', '2013-12-02', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('14', 'Zhi', '', 'Qian', 'F', '2013-12-03', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('15', 'qian', '', 'zhi', 'F', '2013-12-01', 'BME', 'Master', '1234', '1', './upload/picture/15.jpg');
INSERT INTO `profiles` VALUES ('16', 'qian', '', 'zhi', 'F', '2013-12-03', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('17', 'qwer', '', 'qwer', 'M', '2013-12-04', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('18', 'ruo', '', 'jia', 'F', '2013-12-02', 'BME', 'Master', '1234', '1', './upload/picture/0.jpg');
INSERT INTO `profiles` VALUES ('19', 'qwert', '', 'qwetr', 'F', '2013-12-01', 'BME', 'Master', '2012', '1', './upload/picture/0.jpg');
