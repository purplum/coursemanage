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
  `ccurrent` int(20) default '0',
  `clocation` varchar(30) default NULL,
  `callowgrade` int(11) default '0',
  `cvalid` int(5) default 0,   -- 0: valid
  PRIMARY KEY  (`cid`),
  KEY `cteacher` (`cteacher`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`cteacher`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '美术课', '1', '2019', '40', '4', '1','shanghai luoxiulu','0','0');
INSERT INTO `course` VALUES ('2', '手工课', '1', '2019', '2', '21', '0','shanghai luoxiulu 2','3','0');
INSERT INTO `course` VALUES ('3', '陶艺课', '1', '2018', '5', '21', '0','shanghai luoxiulu 3','1','0');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` int(11) NOT NULL auto_increment,
  `sname` varchar(20) default '',
  `studentid` varchar(20) NOT NULL,
  `spersonid` varchar(20) NOT NULL,
  `spassword` varchar(50) default '1',
  `sgrade` varchar(20) default '',
  `sclass` varchar(20) default '',
  `sgender` varchar(20) default '',
  `semail` varchar(255) default '',
  `stel` varchar(255) default '',
  `saddress` varchar(255) default '',
  `isspecial` varchar(10) default '0',
  `specialreason` varchar(50) default '',
  `isreg` varchar(10) default '1', -- 0-已注册  1- 未注册
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '测试账号1','20001', '1','1', '2018','3','male','admin@test.net', '13167422813', 'aaaaas','0','a','0');
INSERT INTO `student` VALUES ('2', '测试账号2','20002', '2','1', '2018','2','female','admin2@test.net', '13167422814', 'aaaaas2','1','已加入特殊名单，不能选课','0');
INSERT INTO `student` VALUES ('3', '测试账号3','20003', '3','1', '2018','2','female','admin3@test.net', '13167422815', 'aaaaas3','0','','0');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL auto_increment,
  `tname` varchar(20) NOT NULL,
  `tpassword` varchar(255) default '123',
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '管理员', 'test123');
INSERT INTO `teacher` VALUES ('101', '测试老师1', '1');

DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
                         `aid` int(11) NOT NULL auto_increment,
                         `aname` varchar(20) default '',
                         `isopen` varchar(10) default '1', -- 0-已开放  1- 未开放
                         PRIMARY KEY  (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `admininfo` VALUES ('10001', '默认信息', '1');
