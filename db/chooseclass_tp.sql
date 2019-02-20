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
  `clocation` varchar(30) default NULL,
  `callowgrade` varchar(20) default '0',
  PRIMARY KEY  (`cid`),
  KEY `cteacher` (`cteacher`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`cteacher`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '美术课', '1', '2019', '40', '4', '1','shanghai luoxiulu','0');
INSERT INTO `course` VALUES ('2', '手工课', '1', '2019', '2', '21', '0','shanghai luoxiulu 2','3');

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
  `sgender` varchar(20) default NULL,
  `semail` varchar(255) default NULL,
  `stel` varchar(255) default NULL,
  `saddress` varchar(255) default NULL,
  `isspecial` varchar(10) default '0',
  `specialreason` varchar(50) default NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '测试账号1','20001', '1','1', '2018','3','male','admin@test.net', '13167422813', 'aaaaas','0','a');
INSERT INTO `student` VALUES ('2', '测试账号2','20002', '2','1', '2018','2','female','admin@test.net', '13167422814', 'aaaaas2','1','已加入特殊名单，不能选课');

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
INSERT INTO `teacher` VALUES ('1', '管理员', '1');
