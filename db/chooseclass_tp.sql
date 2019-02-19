/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50018
Source Host           : 127.0.0.1:3306
Source Database       : chooseclass_tp

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2019-02-19 12:21:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cc
-- ----------------------------
DROP TABLE IF EXISTS `cc`;
CREATE TABLE `cc` (
  `xid` int(11) NOT NULL auto_increment,
  `sid` int(11) default NULL,
  `cid` int(11) default NULL,
  `cscore` int(9) default 0,
  PRIMARY KEY  (`xid`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`),
  CONSTRAINT `cc_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`),
  CONSTRAINT `cc_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc
-- ----------------------------
INSERT INTO `cc` VALUES ('1', '1', '1', '0');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `cid` int(11) NOT NULL auto_increment,
  `cname` varchar(20) default NULL,
  `cteacher` int(11) default NULL,
  `ctime` varchar(50) default NULL,
  `cmax` int(20) default NULL,
  `cxueshi` int(5) default NULL,
  `ccurrent` int(20) default NULL,
  PRIMARY KEY  (`cid`),
  KEY `cteacher` (`cteacher`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`cteacher`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '美术课', '1', '2019', '40', '4', '1');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` int(11) NOT NULL auto_increment,
  `sname` varchar(20) default NULL,
  `studentid` varchar(20) NOT NULL,
  `spersonid` varchar(20) NOT NULL,
  `spassword` varchar(50) default NULL,
  `sgrade` varchar(20) default NULL,
  `sclass` varchar(20) default NULL,
  `semail` varchar(255) default NULL,
  `stel` varchar(255) default NULL,
  `saddress` varchar(255) default NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '测试账号1','20001', '1','1', '2','3','admin@tanpeng.net', '13167422813', 'aaaaas');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `tname` varchar(20) default NULL,
  `tpassword` varchar(255) default NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'jiaoshi1', '1');
