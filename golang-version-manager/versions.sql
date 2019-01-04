/*
Navicat MySQL Data Transfer

Source Server         : localhost_
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-09 18:54:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for versions
-- ----------------------------
DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version_number` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `version_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `version_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of versions
-- ----------------------------
INSERT INTO `versions` VALUES ('17', '1.11.16', null, '2017-09-09 17:41:10');
INSERT INTO `versions` VALUES ('18', '1.11.17', 'deneme\r\n', '2017-09-09 14:41:44');

-- ----------------------------
-- Table structure for versions_change
-- ----------------------------
DROP TABLE IF EXISTS `versions_change`;
CREATE TABLE `versions_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version_id` int(11) DEFAULT NULL,
  `change` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `new_propertions` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of versions_change
-- ----------------------------
INSERT INTO `versions_change` VALUES ('16', '18', null, 'category and location and tag taxamoie add\r\n');
