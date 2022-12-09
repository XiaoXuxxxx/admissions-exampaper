/*
 Navicat Premium Data Transfer

 Source Server         : macbook-db
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : localhost:3306
 Source Schema         : ben

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 27/01/2022 23:51:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for examData
-- ----------------------------
DROP TABLE IF EXISTS `examData`;
CREATE TABLE `examData` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_type` int DEFAULT NULL,
  `subject` varchar(4) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `box_id` varchar(20) DEFAULT NULL,
  `start_id` varchar(20) DEFAULT NULL,
  `end_id` varchar(20) DEFAULT NULL,
  `paper` int DEFAULT NULL,
  `paper_extra` int DEFAULT NULL,
  `paper_backup` int DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  `verify` int DEFAULT NULL,
  `extra1` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `extra3` varchar(255) DEFAULT NULL,
  `extra4` varchar(255) DEFAULT NULL,
  `extra5` varchar(255) DEFAULT NULL,
  `attend` int DEFAULT NULL,
  `no_attend` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of examData
-- ----------------------------
BEGIN;
INSERT INTO `examData`(
  id,
  exam_type,
  subject,
  school,
  box_id,
  start_id,
  end_id,
  paper,
  paper_extra,
  paper_backup,
  post_id,
  verify,
  extra1,
  extra2,
  extra3,
  extra4,
  extra5,
  attend,
  no_attend
) VALUES (28, 1, 'o3', 'เทพศิรินทร์สมุทรปราการ', '1/29', '00001', '00002', 1, 1,1, 3, NULL, '1', '1','1','1','1', NULL, NULL);
-- INSERT INTO `examData` VALUES (29, 2, 'g2', 'ทวีธาภิเศก', '1/29', '1', '1', 1, 1, 3, 1, '1','1','1','1', '1', 1, 1);
-- INSERT INTO `examData` VALUES (30, 2, 'p1', 'บางปะกอกวิทยาคม', '1/29', '1', '1', 1, 0, 3, 1, '1', '1','1','1','1', 1, 2);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (3, 'admin', 'admin', 'วราณัฐ สุทธิการณ์', 1);
INSERT INTO `users` VALUES (4, 'super', 'admin', 'aomwara 2 admin', 2);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
