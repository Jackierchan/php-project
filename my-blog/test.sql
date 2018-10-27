/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : utf-8

 Date: 10/27/2018 14:08:25 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_blog`
-- ----------------------------
DROP TABLE IF EXISTS `t_blog`;
CREATE TABLE `t_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_content` text,
  `post_time` datetime DEFAULT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_blog`
-- ----------------------------
BEGIN;
INSERT INTO `t_blog` VALUES ('1', '人机大队长', '落地成盒', '2018-10-21 14:09:00', '2', '2', '1'), ('2', '测试数据', '测试数据', '2018-10-11 15:30:25', '1', '2', '6');
COMMIT;

-- ----------------------------
--  Table structure for `t_blog_catalog`
-- ----------------------------
DROP TABLE IF EXISTS `t_blog_catalog`;
CREATE TABLE `t_blog_catalog` (
  `catalog_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`catalog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_blog_catalog`
-- ----------------------------
BEGIN;
INSERT INTO `t_blog_catalog` VALUES ('1', '工作日志', '2'), ('2', '技术贴', '2');
COMMIT;

-- ----------------------------
--  Table structure for `t_collect`
-- ----------------------------
DROP TABLE IF EXISTS `t_collect`;
CREATE TABLE `t_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_collect`
-- ----------------------------
BEGIN;
INSERT INTO `t_collect` VALUES ('1', '1', '1'), ('2', '1', '2'), ('3', '1', '3'), ('4', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `post_time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_comment`
-- ----------------------------
BEGIN;
INSERT INTO `t_comment` VALUES ('1', '太棒了', '2018-10-21 15:34:28', '3', '1'), ('2', 'nice', '2018-10-21 15:34:53', '4', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_message`
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `post_time` datetime DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_del` int(1) DEFAULT '0',
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `sex` varchar(1) DEFAULT NULL COMMENT '0:男  1:女',
  `province` varchar(50) DEFAULT NULL COMMENT '省',
  `mood` varchar(255) DEFAULT NULL COMMENT '个人心情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('2', 'lisi', '0', '123', 'lisi@163.com', null, null, null), ('3', '111', '0', '111', '', null, null, null), ('4', '222', '0', '222', '', null, null, null), ('5', '444', '0', '44', '', null, null, null), ('6', '444', '0', '55', '', null, null, null), ('7', '666', '0', '666', '', null, null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
