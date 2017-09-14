/*
 Navicat Premium Data Transfer

 Source Server         : 本地数据库
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : 127.0.0.1
 Source Database       : zcg

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : utf-8

 Date: 09/12/2017 18:47:40 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `pre_activity_advert`
-- ----------------------------
DROP TABLE IF EXISTS `pre_activity_advert`;
CREATE TABLE `pre_activity_advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `advert_title` varchar(100) NOT NULL COMMENT '标题',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '类型 1 图片 2 视频',
  `file_url` varchar(255) NOT NULL COMMENT '链接地址',
  `activity_id` int(10) NOT NULL COMMENT '关联的活动id',
  `link_url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `target` int(11) DEFAULT NULL COMMENT '打开方式',
  `user_id` int(5) NOT NULL COMMENT '操作人',
  `position` int(2) NOT NULL DEFAULT '1' COMMENT '位置 1顶部 2底部',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '状态 1停用 2启用',
  `created_at` int(13) NOT NULL COMMENT '创建时间',
  `updated_at` int(13) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_activity_advert`
-- ----------------------------
BEGIN;
INSERT INTO `pre_activity_advert` VALUES ('4', '测试广告', '2', 'http://advert.ztwliot.com/QB1505033315', '2', 'http://www.baidu.com', '1', '3', '2', '2', '1504935509', '1505149843'), ('5', '首页广告1', '1', 'http://advert.ztwliot.com/QB1505149871', '2', '', '1', '3', '1', '2', '1505149882', '1505149882'), ('6', '首页广告', '1', 'http://advert.ztwliot.com/QB1505149920', '2', '', '1', '3', '1', '2', '1505149933', '1505149933');
COMMIT;

-- ----------------------------
--  Table structure for `pre_activity_base`
-- ----------------------------
DROP TABLE IF EXISTS `pre_activity_base`;
CREATE TABLE `pre_activity_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `activity_desc` varchar(255) NOT NULL COMMENT '活动简介',
  `activity_rules` varchar(255) NOT NULL COMMENT '活动规则',
  `start_time` int(13) NOT NULL COMMENT '开始时间',
  `end_time` int(13) NOT NULL COMMENT '结束时间',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '状态 1 未启用2 启用',
  `is_delete` int(2) NOT NULL DEFAULT '1' COMMENT '是否删除 1 未删除 2已删除',
  `user_id` int(10) NOT NULL COMMENT '操作人',
  `created_at` int(13) NOT NULL COMMENT '创建时间',
  `updated_at` int(13) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_activity_base`
-- ----------------------------
BEGIN;
INSERT INTO `pre_activity_base` VALUES ('2', '测试活动', 'test。。。。。。。。。。', '服务费哇发发发无聊乏味放假啊我了', '1504656000', '1506729600', '2', '1', '3', '1504765232', '1504765232');
COMMIT;

-- ----------------------------
--  Table structure for `pre_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin_log`;
CREATE TABLE `pre_admin_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `operation_type` varchar(20) NOT NULL,
  `description` text,
  `created_at` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_admin_log`
-- ----------------------------
BEGIN;
INSERT INTO `pre_admin_log` VALUES ('1', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=17 的记录', '1502088505', '3'), ('2', '/admin/menu/update.html?id=17', '{{%menu}}', 'update', 'alex修改了 id=17 的 data 为 {\"icon\": \"fa fa-envelope\", \"visible\": true}  [ 原始数据:  ]', '1502088646', '3'), ('3', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=18 的记录', '1502088811', '3'), ('4', '/admin/menu/update.html?id=18', '{{%menu}}', 'update', 'alex修改了 id=18 的 order 为 1  [ 原始数据:  ]', '1502088820', '3'), ('5', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=19 的记录', '1502089135', '3'), ('6', '/admin/menu/delete.html?id=18', '{{%menu}}', 'delete', 'alex删除了 id=18 的记录', '1502092403', '3'), ('7', '/admin/menu/delete.html?id=19', '{{%menu}}', 'delete', 'alex删除了 id=19 的记录', '1502092417', '3'), ('8', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=20 的记录', '1502125922', '3'), ('9', '/admin/menu/update.html?id=20', '{{%menu}}', 'update', 'alex修改了 id=20 的 order 为 1  [ 原始数据:  ]', '1502125932', '3'), ('10', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=21 的记录', '1502125972', '3'), ('11', '/admin/user/delete.html?id=5', '{{%user}}', 'delete', 'alex删除了 id=5 的记录', '1502180812', '3'), ('12', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=3 的记录', '1502197593', '3'), ('13', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=4 的记录', '1502197623', '3'), ('14', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=5 的记录', '1502197679', '3'), ('15', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=6 的记录', '1502199077', '3'), ('16', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=6 的 status 为 3  [ 原始数据:  ]', '1502199078', '3'), ('17', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=7 的记录', '1502199107', '3'), ('18', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=7 的 status 为 2  [ 原始数据:  ]', '1502199107', '3'), ('19', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=11 的记录', '1502201308', '3'), ('20', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=11 的 status 为 2  [ 原始数据:  ]', '1502201308', '3'), ('21', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=2 的 updated_at 为 1502201420  [ 原始数据: 1502162179 ]', '1502201420', '3'), ('22', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=2 的 status 为 2  [ 原始数据: 1 ]', '1502201420', '3'), ('23', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=12 的记录', '1502201477', '3'), ('24', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=12 的 status 为 2  [ 原始数据:  ]', '1502201477', '3'), ('25', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 updated_at 为 1502203034  [ 原始数据: 1502202857 ]', '1502203034', '3'), ('26', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 status 为 2  [ 原始数据: 1 ]', '1502203034', '3'), ('27', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 status 为 1  [ 原始数据: 2 ],updated_at 为 1502203040  [ 原始数据: 1502203034 ]', '1502203040', '3'), ('28', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 status 为 2  [ 原始数据: 1 ]', '1502203040', '3'), ('29', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 content 为 杭州天气hahhahahahahha  [ 原始数据: 杭州天气 ],status 为 1  [ 原始数据: 2 ],updated_at 为 1502203111  [ 原始数据: 1502203040 ]', '1502203111', '3'), ('30', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=13 的 status 为 2  [ 原始数据: 1 ]', '1502203111', '3'), ('31', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=15 的记录', '1502203464', '3'), ('32', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=15 的 status 为 2  [ 原始数据:  ]', '1502203464', '3'), ('33', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=6 的 status 为 1  [ 原始数据: 3 ],updated_at 为 1502204314  [ 原始数据: 1502199077 ]', '1502204314', '3'), ('34', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=6 的 status 为 2  [ 原始数据: 1 ]', '1502204314', '3'), ('35', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=14 的 updated_at 为 1502208696  [ 原始数据: 1502202858 ]', '1502208696', '3'), ('36', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=14 的 status 为 2  [ 原始数据: 1 ]', '1502208697', '3'), ('37', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=16 的记录', '1502209166', '3'), ('38', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=16 的 status 为 2  [ 原始数据:  ]', '1502209167', '3'), ('39', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=17 的记录', '1502209269', '3'), ('40', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=17 的 status 为 2  [ 原始数据:  ]', '1502209270', '3'), ('41', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=19 的记录', '1502279697', '3'), ('42', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=19 的 status 为 3  [ 原始数据:  ]', '1502279697', '3'), ('43', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=19 的 status 为 1  [ 原始数据: 3 ],updated_at 为 1502279721  [ 原始数据: 1502279697 ]', '1502279721', '3'), ('44', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=19 的 status 为 2  [ 原始数据: 1 ]', '1502279722', '3'), ('45', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=20 的记录', '1502282033', '3'), ('46', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=20 的 status 为 3  [ 原始数据:  ]', '1502282033', '3'), ('47', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=20 的 title 为 1111111111  [ 原始数据:  ],content 为 <p>11111111111</p>  [ 原始数据:  ],status 为 1  [ 原始数据: 3 ],updated_at 为 1502282095  [ 原始数据: 1502282033 ]', '1502282095', '3'), ('48', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=20 的 status 为 2  [ 原始数据: 1 ]', '1502282095', '3'), ('49', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=21 的记录', '1502282203', '3'), ('50', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=21 的 status 为 2  [ 原始数据:  ]', '1502282203', '3'), ('51', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=22 的记录', '1502282258', '3'), ('52', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=22 的 status 为 2  [ 原始数据:  ]', '1502282258', '3'), ('53', '/ajax/message/deal-mail', '{{%message}}', 'create', 'alex创建了 id=23 的记录', '1502283282', '3'), ('54', '/ajax/message/deal-mail', '{{%message}}', 'update', 'alex修改了 id=23 的 status 为 2  [ 原始数据:  ]', '1502283283', '3'), ('55', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=1 的记录', '1502355973', '3'), ('56', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=2 的记录', '1502356014', '3'), ('57', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=3 的记录', '1502356119', '3'), ('58', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=4 的记录', '1502356213', '3'), ('59', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=5 的记录', '1502356304', '3'), ('60', '/ajax/message/deal-message-group', '{{%message_group}}', 'update', 'alex修改了 id=1 的 members 为 [\"qiubo@qq.com\",\"pozm@qq.com\"]  [ 原始数据: [\"alex.qiubo@qq.com\",\"qiubo@qq.com\",\"pozm@qq.com\"] ],updated_at 为 1502360121  [ 原始数据: 1502355973 ]', '1502360121', '3'), ('61', '/ajax/message/deal-message-group', '{{%message_group}}', 'update', 'alex修改了 id=1 的 members 为 [\"pozm@qq.com\"]  [ 原始数据: [\"qiubo@qq.com\",\"pozm@qq.com\"] ],updated_at 为 1502380919  [ 原始数据: 1502360121 ]', '1502380919', '3'), ('62', '/ajax/message/deal-message-group', '{{%message_group}}', 'create', 'alex创建了 id=6 的记录', '1502436531', '3'), ('63', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=22 的记录', '1504711940', '3'), ('64', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=23 的记录', '1504712073', '3'), ('65', '/activity/default/create.html', '{{%activity_base}}', 'create', 'alex创建了 id=1 的记录', '1504712501', '3'), ('66', '/activity/default/update.html?id=1', '{{%activity_base}}', 'update', 'alex修改了 id=1 的 end_time 为 1506643200  [ 原始数据: 1504656000 ],created_at 为 1504712630  [ 原始数据: 1504712501 ],updated_at 为 1504712630  [ 原始数据: 1504712501 ]', '1504712630', '3'), ('67', '/activity/default/update.html?id=1', '{{%activity_base}}', 'update', 'alex修改了 id=1 的 created_at 为 1504712644  [ 原始数据: 1504712630 ],updated_at 为 1504712644  [ 原始数据: 1504712630 ]', '1504712644', '3'), ('68', '/activity/record/create.html', '{{%apply_record}}', 'create', 'alex创建了 id=1 的记录', '1504713004', '3'), ('69', '/activity/default/update.html?id=1', '{{%activity_base}}', 'update', 'alex修改了 id=1 的 status 为 2  [ 原始数据: 1 ],updated_at 为 1504746676  [ 原始数据: 1504712644 ]', '1504746676', '3'), ('70', '/activity/default/create.html', '{{%activity_base}}', 'create', 'alex创建了 id=2 的记录', '1504765232', '3'), ('71', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=1 的记录', '1504769979', '3'), ('72', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=2 的记录', '1504770163', '3'), ('73', '/activity/default/delete.html?id=1', '{{%activity_base}}', 'delete', 'alex删除了 id=1 的记录', '1504792195', '3'), ('74', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=3 的记录', '1504887906', '3'), ('75', '/activity/advert/delete.html?id=1', '{{%activity_advert}}', 'delete', 'alex删除了 id=1 的记录', '1504935452', '3'), ('76', '/activity/advert/delete.html?id=2', '{{%activity_advert}}', 'delete', 'alex删除了 id=2 的记录', '1504935456', '3'), ('77', '/activity/advert/delete.html?id=3', '{{%activity_advert}}', 'delete', 'alex删除了 id=3 的记录', '1504935460', '3'), ('78', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=4 的记录', '1504935509', '3'), ('79', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://images.ztwliot.com/QB1504943547  [ 原始数据: http://ovw3449de.bkt.clouddn.com/QB1504935504 ],updated_at 为 1504943553  [ 原始数据: 1504935509 ]', '1504943553', '3'), ('80', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://images.ztwliot.com/QB1504943781  [ 原始数据: http://images.ztwliot.com/QB1504943547 ],updated_at 为 1504943784  [ 原始数据: 1504943553 ]', '1504943784', '3'), ('81', '/admin/menu/update.html?id=23', '{{%menu}}', 'update', 'alex修改了 id=23 的 order 为 1  [ 原始数据:  ]', '1504944308', '3'), ('82', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=24 的记录', '1504944338', '3'), ('83', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://images.ztwliot.com/QB1504944691  [ 原始数据: http://images.ztwliot.com/QB1504943781 ],updated_at 为 1504944723  [ 原始数据: 1504943784 ]', '1504944723', '3'), ('84', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1504969314  [ 原始数据: 1504944723 ]', '1504969314', '3'), ('85', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1504969337  [ 原始数据: 1504969314 ]', '1504969337', '3'), ('86', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://images.ztwliot.com/QB1504969844  [ 原始数据: http://images.ztwliot.com/QB1504944691 ],updated_at 为 1504969867  [ 原始数据: 1504969337 ]', '1504969867', '3'), ('87', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1504970183  [ 原始数据: http://images.ztwliot.com/QB1504969844 ],updated_at 为 1504970187  [ 原始数据: 1504969867 ]', '1504970187', '3'), ('88', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1504971599  [ 原始数据: http://advert.ztwliot.com/QB1504970183 ],updated_at 为 1504971608  [ 原始数据: 1504970187 ]', '1504971608', '3'), ('89', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505012444  [ 原始数据: 1505012345 ]', '1505012444', '3'), ('90', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505012477  [ 原始数据: 1505012444 ]', '1505012477', '3'), ('91', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1505012491  [ 原始数据: http://advert.ztwliot.com/QB1505011985 ],updated_at 为 1505012497  [ 原始数据: 1505012477 ]', '1505012497', '3'), ('92', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505013241  [ 原始数据: 1505012497 ]', '1505013241', '3'), ('93', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1505013283  [ 原始数据: http://advert.ztwliot.com/QB1505012491 ],updated_at 为 1505013293  [ 原始数据: 1505013241 ]', '1505013293', '3'), ('94', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505013340  [ 原始数据: 1505013293 ]', '1505013340', '3'), ('95', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1505013380  [ 原始数据: http://advert.ztwliot.com/QB1505013283 ],updated_at 为 1505013383  [ 原始数据: 1505013340 ]', '1505013383', '3'), ('96', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505014571  [ 原始数据: 1505013383 ]', '1505014571', '3'), ('97', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 type 为 2  [ 原始数据: 1 ],updated_at 为 1505015110  [ 原始数据: 1505014571 ]', '1505015110', '3'), ('98', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 updated_at 为 1505019321  [ 原始数据: 1505015110 ]', '1505019321', '3'), ('99', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1505032589  [ 原始数据: http://advert.ztwliot.com/QB1505013380 ],updated_at 为 1505032866  [ 原始数据: 1505019321 ]', '1505032866', '3'), ('100', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 file_url 为 http://advert.ztwliot.com/QB1505033315  [ 原始数据: http://advert.ztwliot.com/QB1505032589 ],updated_at 为 1505033591  [ 原始数据: 1505032866 ]', '1505033591', '3'), ('101', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 status 为 2  [ 原始数据: 1 ]', '1505049359', '3'), ('102', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 apply_name 为 alex  [ 原始数据: 发尾发完饭 ]', '1505049738', '3'), ('103', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 apply_name 为 仇波  [ 原始数据: alex ]', '1505051182', '3'), ('104', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 recommend 为 我自己推荐的  [ 原始数据: 发尾发 ]', '1505051897', '3'), ('105', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 self_media 为 http://yinyueshiting.baidu.com/data2/music/57a8cbc4b8e45f7e66ececd916730db3/257539247/257535276216000128.mp3?xcode=2f35db8e521b1ef3c85f964b2abbb8a2  [ 原始数据: 发发 ]', '1505054348', '3'), ('106', '/activity/record/update.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 self_desc 为 对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。  [ 原始数据: 哇分啊我飞舞 ],self_picture 为 https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg  [ 原始数据: 发恶风 ]', '1505054390', '3'), ('107', '/activity/record/audit.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 status 为 2  [ 原始数据: 1 ]', '1505060990', '3'), ('108', '/activity/record/audit.html?id=1', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 status 为 2  [ 原始数据: 1 ]', '1505061072', '3'), ('109', '/admin/menu/create.html', '{{%menu}}', 'create', 'alex创建了 id=25 的记录', '1505121803', '3'), ('110', '/activity/record/audit.html?id=1&status=3', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 status 为 3  [ 原始数据: 1 ]', '1505135790', '3'), ('111', '/activity/record/audit.html?id=1&status=2', '{{%apply_record}}', 'update', 'alex修改了 id=1 的 status 为 2  [ 原始数据: 1 ]', '1505136039', '3'), ('112', '/activity/advert/update.html?id=4', '{{%activity_advert}}', 'update', 'alex修改了 id=4 的 position 为 2  [ 原始数据: 1 ],updated_at 为 1505149843  [ 原始数据: 1505033591 ]', '1505149843', '3'), ('113', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=5 的记录', '1505149882', '3'), ('114', '/activity/advert/create.html', '{{%activity_advert}}', 'create', 'alex创建了 id=6 的记录', '1505149933', '3');
COMMIT;

-- ----------------------------
--  Table structure for `pre_api_base`
-- ----------------------------
DROP TABLE IF EXISTS `pre_api_base`;
CREATE TABLE `pre_api_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `api_name` varchar(100) NOT NULL COMMENT 'api名称',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT 'api域名地址',
  `url_path` varchar(100) DEFAULT NULL COMMENT 'api地址后路径',
  `request_method` varchar(10) NOT NULL DEFAULT 'get' COMMENT '请求方式',
  `query_string` varchar(50) NOT NULL DEFAULT '' COMMENT '请求参数',
  `invoke_string` varchar(255) DEFAULT NULL COMMENT '调用支付的关键字',
  `status` tinyint(10) NOT NULL DEFAULT '2' COMMENT 'api运行状态 1关闭 2启用',
  `created_at` int(20) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(20) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `is_default` tinyint(5) NOT NULL DEFAULT '1' COMMENT '是否是默认api   1否 2是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_api_base`
-- ----------------------------
BEGIN;
INSERT INTO `pre_api_base` VALUES ('1', 'Robot', 'http://jisuznwd.market.alicloudapi.com/', 'iqa/query', 'get', 'question', '', '1', '1498813421', '1498813421', '1'), ('2', 'ipQuery', 'https://dm-81.data.aliyun.com/', 'rest/160601/ip/getIpInfo.json', 'get', 'ip', 'ip,', '2', '1498813427', '1498813427', '1'), ('3', 'weather', 'http://saweather.market.alicloudapi.com/', 'area-to-id', 'get', 'area', '天气,', '2', '1498813427', '1498813427', '1'), ('4', 'Turing', 'http://www.tuling123.com/', 'openapi/api', 'post', 'info', '', '2', '0', '0', '2');
COMMIT;

-- ----------------------------
--  Table structure for `pre_apply_record`
-- ----------------------------
DROP TABLE IF EXISTS `pre_apply_record`;
CREATE TABLE `pre_apply_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `apply_name` varchar(20) NOT NULL COMMENT '申请人',
  `gender` int(2) NOT NULL COMMENT '性别',
  `phone` int(20) NOT NULL COMMENT '电话号码',
  `self_desc` varchar(255) NOT NULL COMMENT '自我介绍',
  `self_picture` varchar(255) NOT NULL COMMENT '照片',
  `self_media` varchar(255) NOT NULL COMMENT '语音',
  `activity_id` int(13) NOT NULL,
  `recommend` varchar(100) DEFAULT NULL COMMENT '推荐单位',
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '状态 1待审核 2已通过 3已拒绝',
  `created_at` int(13) NOT NULL COMMENT '创建时间',
  `updated_at` int(13) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_apply_record`
-- ----------------------------
BEGIN;
INSERT INTO `pre_apply_record` VALUES ('1', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('2', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('3', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('4', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('5', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('6', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('7', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('8', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('9', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('10', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('11', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647'), ('12', '仇波', '1', '2147483647', '对于不需要强调的inline或block类型的文本，使用 <small> 标签包裹，其内的文本将被设置为父容器字体大小的 85%。标题元素中嵌套的 <small> 元素被设置不同的 font-size 。  你还可以为行内元素赋予 .small 类以代替任何 <small> 元素。', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', 'http://apply-user.ztwliot.com/VL1505122227', '2', '我自己推荐的', '2', '2147483647', '2147483647');
COMMIT;

-- ----------------------------
--  Table structure for `pre_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_assignment`;
CREATE TABLE `pre_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `pre_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `pre_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `pre_auth_assignment` VALUES ('用户管理员', '4', '1492320748'), ('超级管理员', '3', '1496134842'), ('超级管理员', '6', '1492950138');
COMMIT;

-- ----------------------------
--  Table structure for `pre_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_item`;
CREATE TABLE `pre_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `pre_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `pre_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `pre_auth_item` VALUES ('/*', '2', null, null, null, '1500518236', '1500518236'), ('/activity/*', '2', null, null, null, '1504944249', '1504944249'), ('/activity/advert/*', '2', null, null, null, '1504944222', '1504944222'), ('/activity/advert/create', '2', null, null, null, '1504944222', '1504944222'), ('/activity/advert/delete', '2', null, null, null, '1504944222', '1504944222'), ('/activity/advert/index', '2', null, null, null, '1504944222', '1504944222'), ('/activity/advert/update', '2', null, null, null, '1504944222', '1504944222'), ('/activity/advert/view', '2', null, null, null, '1504944222', '1504944222'), ('/activity/default/*', '2', null, null, null, '1504711794', '1504711794'), ('/activity/default/create', '2', null, null, null, '1504711794', '1504711794'), ('/activity/default/delete', '2', null, null, null, '1504711794', '1504711794'), ('/activity/default/index', '2', null, null, null, '1504711794', '1504711794'), ('/activity/default/update', '2', null, null, null, '1504711794', '1504711794'), ('/activity/default/view', '2', null, null, null, '1504711794', '1504711794'), ('/activity/record/*', '2', null, null, null, '1505121707', '1505121707'), ('/activity/record/audit', '2', null, null, null, '1505121707', '1505121707'), ('/activity/record/index', '2', null, null, null, '1505121707', '1505121707'), ('/admin/*', '2', null, null, null, '1501994514', '1501994514'), ('/admin/default/*', '2', null, null, null, '1500518232', '1500518232'), ('/admin/default/index', '2', null, null, null, '1500518231', '1500518231'), ('/admin/menu/*', '2', null, null, null, '1500518232', '1500518232'), ('/admin/menu/create', '2', null, null, null, '1500518232', '1500518232'), ('/admin/menu/delete', '2', null, null, null, '1500518232', '1500518232'), ('/admin/menu/index', '2', null, null, null, '1500518232', '1500518232'), ('/admin/menu/update', '2', null, null, null, '1500518232', '1500518232'), ('/admin/menu/view', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/*', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/assign', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/create', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/delete', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/index', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/remove', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/update', '2', null, null, null, '1500518232', '1500518232'), ('/admin/permission/view', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/*', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/assign', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/create', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/delete', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/index', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/remove', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/update', '2', null, null, null, '1500518232', '1500518232'), ('/admin/role/view', '2', null, null, null, '1500518232', '1500518232'), ('/admin/route/*', '2', null, null, null, '1500518233', '1500518233'), ('/admin/route/assign', '2', null, null, null, '1500518233', '1500518233'), ('/admin/route/create', '2', null, null, null, '1500518233', '1500518233'), ('/admin/route/index', '2', null, null, null, '1500518232', '1500518232'), ('/admin/route/refresh', '2', null, null, null, '1500518233', '1500518233'), ('/admin/route/remove', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/*', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/create', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/delete', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/index', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/update', '2', null, null, null, '1500518233', '1500518233'), ('/admin/rule/view', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/*', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/activate', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/assign', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/change-password', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/delete', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/index', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/login', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/logout', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/request-password-reset', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/reset-password', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/revoke', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/signup', '2', null, null, null, '1500518233', '1500518233'), ('/admin/user/update', '2', null, null, null, '1502088123', '1502088123'), ('/admin/user/view', '2', null, null, null, '1500518233', '1500518233'), ('/ajax/*', '2', null, null, null, '1500518234', '1500518234'), ('/ajax/activity/*', '2', null, null, null, '1504944240', '1504944240'), ('/ajax/activity/ajax-delete', '2', null, null, null, '1504944240', '1504944240'), ('/ajax/activity/ajax-upload', '2', null, null, null, '1504944240', '1504944240'), ('/ajax/base/*', '2', null, null, null, '1502204162', '1502204162'), ('/ajax/default/*', '2', null, null, null, '1500518234', '1500518234'), ('/ajax/default/index', '2', null, null, null, '1500518234', '1500518234'), ('/ajax/message/*', '2', null, null, null, '1502204162', '1502204162'), ('/ajax/message/add-new-mail', '2', null, null, null, '1502509680', '1502509680'), ('/ajax/message/assign', '2', null, null, null, '1502509680', '1502509680'), ('/ajax/message/deal-mail', '2', null, null, null, '1502204162', '1502204162'), ('/ajax/message/deal-message-group', '2', null, null, null, '1502509680', '1502509680'), ('/ajax/message/refresh', '2', null, null, null, '1502509680', '1502509680'), ('/ajax/message/remove', '2', null, null, null, '1502509680', '1502509680'), ('/api/*', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/*', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/create', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/delete', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/index', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/update', '2', null, null, null, '1500518235', '1500518235'), ('/api/default/view', '2', null, null, null, '1500518235', '1500518235'), ('/debug/*', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/*', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/db-explain', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/download-mail', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/index', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/toolbar', '2', null, null, null, '1500518235', '1500518235'), ('/debug/default/view', '2', null, null, null, '1500518235', '1500518235'), ('/debug/user/*', '2', null, null, null, '1505121731', '1505121731'), ('/debug/user/reset-identity', '2', null, null, null, '1505121731', '1505121731'), ('/debug/user/set-identity', '2', null, null, null, '1505121731', '1505121731'), ('/gii/*', '2', null, null, null, '1500518236', '1500518236'), ('/gii/default/*', '2', null, null, null, '1500518236', '1500518236'), ('/gii/default/action', '2', null, null, null, '1500518236', '1500518236'), ('/gii/default/diff', '2', null, null, null, '1500518235', '1500518235'), ('/gii/default/index', '2', null, null, null, '1500518235', '1500518235'), ('/gii/default/preview', '2', null, null, null, '1500518235', '1500518235'), ('/gii/default/view', '2', null, null, null, '1500518235', '1500518235'), ('/log/*', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/*', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/create', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/delete', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/index', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/update', '2', null, null, null, '1500518235', '1500518235'), ('/log/default/view', '2', null, null, null, '1500518235', '1500518235'), ('/message/*', '2', null, null, null, '1502088468', '1502088468'), ('/message/default/*', '2', null, null, null, '1502088468', '1502088468'), ('/message/default/chat', '2', null, null, null, '1505121731', '1505121731'), ('/message/default/create', '2', null, null, null, '1502204162', '1502204162'), ('/message/default/delete', '2', null, null, null, '1502204173', '1502204173'), ('/message/default/index', '2', null, null, null, '1502088467', '1502088467'), ('/message/default/update', '2', null, null, null, '1502204162', '1502204162'), ('/message/default/view', '2', null, null, null, '1502204161', '1502204161'), ('/message/message-group/*', '2', null, null, null, '1502125892', '1502125892'), ('/message/message-group/create', '2', null, null, null, '1502509671', '1502509671'), ('/message/message-group/delete', '2', null, null, null, '1505121731', '1505121731'), ('/message/message-group/index', '2', null, null, null, '1502125892', '1502125892'), ('/message/message-group/update', '2', null, null, null, '1502509671', '1502509671'), ('/message/message-group/view', '2', null, null, null, '1505121731', '1505121731'), ('/product/*', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/*', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/create', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/delete', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/index', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/update', '2', null, null, null, '1500518234', '1500518234'), ('/product/category/view', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/*', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/ajax-upload', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/create', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/delete', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/index', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/update', '2', null, null, null, '1500518234', '1500518234'), ('/product/default/view', '2', null, null, null, '1500518234', '1500518234'), ('/site/*', '2', null, null, null, '1500518234', '1500518234'), ('/site/beanstalk/*', '2', null, null, null, '1502509708', '1502509708'), ('/site/default/*', '2', null, null, null, '1500518234', '1500518234'), ('/site/default/error', '2', null, null, null, '1500518234', '1500518234'), ('/site/default/flush-cache', '2', null, null, null, '1500518234', '1500518234'), ('/site/default/index', '2', null, null, null, '1500518234', '1500518234'), ('/site/default/login', '2', null, null, null, '1500518234', '1500518234'), ('/site/default/logout', '2', null, null, null, '1500518234', '1500518234'), ('API管理', '2', 'API管理', null, null, '1499002398', '1500519077'), ('后台首页', '2', '后台首页', null, null, '1492321379', '1500518426'), ('商品管理', '2', '商品管理', null, null, '1492322274', '1500518456'), ('广告管理', '2', '广告管理', null, null, '1504944416', '1504944416'), ('操作日志', '2', '操作日志', null, null, '1492954823', '1500518492'), ('普通用户', '1', '普通用户', null, null, '1492910565', '1502088999'), ('权限管理', '2', '权限管理', null, null, '1492256128', '1500519779'), ('活动申请管理', '2', '活动申请管理', null, null, '1505121877', '1505121877'), ('活动管理', '2', '活动管理', null, null, '1504711968', '1505121832'), ('消息管理', '2', '消息管理', null, null, '1502088679', '1502092433'), ('用户管理', '2', '用户管理', null, null, '1492254906', '1502088938'), ('用户管理员', '1', '用户管理员', null, null, '1492320710', '1502089034'), ('超级管理员', '1', '拥有所有权限', null, null, '1492254999', '1505121908');
COMMIT;

-- ----------------------------
--  Table structure for `pre_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_item_child`;
CREATE TABLE `pre_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `pre_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pre_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pre_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `pre_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `pre_auth_item_child` VALUES ('活动管理', '/activity/*'), ('广告管理', '/activity/advert/*'), ('广告管理', '/activity/advert/create'), ('广告管理', '/activity/advert/delete'), ('广告管理', '/activity/advert/index'), ('广告管理', '/activity/advert/update'), ('广告管理', '/activity/advert/view'), ('活动管理', '/activity/default/*'), ('活动管理', '/activity/default/create'), ('活动管理', '/activity/default/delete'), ('活动管理', '/activity/default/index'), ('活动管理', '/activity/default/update'), ('活动管理', '/activity/default/view'), ('活动申请管理', '/activity/record/*'), ('活动申请管理', '/activity/record/audit'), ('活动申请管理', '/activity/record/index'), ('权限管理', '/admin/default/*'), ('权限管理', '/admin/default/index'), ('权限管理', '/admin/menu/*'), ('权限管理', '/admin/menu/create'), ('权限管理', '/admin/menu/delete'), ('权限管理', '/admin/menu/index'), ('权限管理', '/admin/menu/update'), ('权限管理', '/admin/menu/view'), ('权限管理', '/admin/permission/*'), ('权限管理', '/admin/permission/assign'), ('权限管理', '/admin/permission/create'), ('权限管理', '/admin/permission/delete'), ('权限管理', '/admin/permission/index'), ('权限管理', '/admin/permission/remove'), ('权限管理', '/admin/permission/update'), ('权限管理', '/admin/permission/view'), ('权限管理', '/admin/role/*'), ('权限管理', '/admin/role/assign'), ('权限管理', '/admin/role/create'), ('权限管理', '/admin/role/delete'), ('权限管理', '/admin/role/index'), ('权限管理', '/admin/role/remove'), ('权限管理', '/admin/role/update'), ('权限管理', '/admin/role/view'), ('权限管理', '/admin/route/*'), ('权限管理', '/admin/route/assign'), ('权限管理', '/admin/route/create'), ('权限管理', '/admin/route/index'), ('权限管理', '/admin/route/refresh'), ('权限管理', '/admin/route/remove'), ('权限管理', '/admin/rule/*'), ('权限管理', '/admin/rule/create'), ('权限管理', '/admin/rule/delete'), ('权限管理', '/admin/rule/index'), ('权限管理', '/admin/rule/update'), ('权限管理', '/admin/rule/view'), ('权限管理', '/admin/user/*'), ('用户管理', '/admin/user/*'), ('权限管理', '/admin/user/activate'), ('用户管理', '/admin/user/activate'), ('权限管理', '/admin/user/assign'), ('用户管理', '/admin/user/assign'), ('权限管理', '/admin/user/change-password'), ('用户管理', '/admin/user/change-password'), ('权限管理', '/admin/user/delete'), ('用户管理', '/admin/user/delete'), ('权限管理', '/admin/user/index'), ('用户管理', '/admin/user/index'), ('权限管理', '/admin/user/login'), ('用户管理', '/admin/user/login'), ('权限管理', '/admin/user/logout'), ('用户管理', '/admin/user/logout'), ('权限管理', '/admin/user/request-password-reset'), ('用户管理', '/admin/user/request-password-reset'), ('权限管理', '/admin/user/reset-password'), ('用户管理', '/admin/user/reset-password'), ('权限管理', '/admin/user/revoke'), ('用户管理', '/admin/user/revoke'), ('权限管理', '/admin/user/signup'), ('用户管理', '/admin/user/signup'), ('权限管理', '/admin/user/view'), ('用户管理', '/admin/user/view'), ('API管理', '/api/*'), ('API管理', '/api/default/*'), ('API管理', '/api/default/create'), ('API管理', '/api/default/delete'), ('API管理', '/api/default/index'), ('API管理', '/api/default/update'), ('API管理', '/api/default/view'), ('操作日志', '/log/*'), ('操作日志', '/log/default/*'), ('操作日志', '/log/default/create'), ('操作日志', '/log/default/delete'), ('操作日志', '/log/default/index'), ('操作日志', '/log/default/update'), ('操作日志', '/log/default/view'), ('消息管理', '/message/*'), ('消息管理', '/message/default/*'), ('消息管理', '/message/default/index'), ('商品管理', '/product/*'), ('商品管理', '/product/category/*'), ('商品管理', '/product/category/create'), ('商品管理', '/product/category/delete'), ('商品管理', '/product/category/index'), ('商品管理', '/product/category/update'), ('商品管理', '/product/category/view'), ('商品管理', '/product/default/*'), ('商品管理', '/product/default/ajax-upload'), ('商品管理', '/product/default/create'), ('商品管理', '/product/default/delete'), ('商品管理', '/product/default/index'), ('商品管理', '/product/default/update'), ('商品管理', '/product/default/view'), ('后台首页', '/site/*'), ('后台首页', '/site/default/*'), ('后台首页', '/site/default/error'), ('后台首页', '/site/default/flush-cache'), ('后台首页', '/site/default/index'), ('后台首页', '/site/default/login'), ('后台首页', '/site/default/logout'), ('超级管理员', 'API管理'), ('普通用户', '后台首页'), ('用户管理员', '后台首页'), ('超级管理员', '后台首页'), ('超级管理员', '广告管理'), ('超级管理员', '操作日志'), ('用户管理员', '普通用户'), ('超级管理员', '普通用户'), ('超级管理员', '权限管理'), ('超级管理员', '活动申请管理'), ('超级管理员', '活动管理'), ('普通用户', '消息管理'), ('用户管理员', '消息管理'), ('超级管理员', '消息管理'), ('用户管理员', '用户管理'), ('超级管理员', '用户管理'), ('超级管理员', '用户管理员');
COMMIT;

-- ----------------------------
--  Table structure for `pre_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_rule`;
CREATE TABLE `pre_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `pre_category`
-- ----------------------------
DROP TABLE IF EXISTS `pre_category`;
CREATE TABLE `pre_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_category`
-- ----------------------------
BEGIN;
INSERT INTO `pre_category` VALUES ('1', '麻将机', '0000-00-00 00:00:01'), ('2', '捕鱼机', '2011-11-11 11:11:01'), ('8', '娃娃机', '2011-11-11 11:11:01');
COMMIT;

-- ----------------------------
--  Table structure for `pre_files`
-- ----------------------------
DROP TABLE IF EXISTS `pre_files`;
CREATE TABLE `pre_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 image   2 video',
  `product_id` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_files`
-- ----------------------------
BEGIN;
INSERT INTO `pre_files` VALUES ('1', '1', '12', '2017042123564084310695271.jpg', '1492819173');
COMMIT;

-- ----------------------------
--  Table structure for `pre_menu`
-- ----------------------------
DROP TABLE IF EXISTS `pre_menu`;
CREATE TABLE `pre_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `pre_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pre_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_menu`
-- ----------------------------
BEGIN;
INSERT INTO `pre_menu` VALUES ('1', '系统设置', null, '/admin/default/index', '999', 0x7b2269636f6e223a202266612066612d636f6773222c202276697369626c65223a20747275657d), ('2', '用户管理', '1', '/admin/user/index', '3', 0x7b2269636f6e223a202266612066612d75736572222c202276697369626c65223a20747275657d), ('3', '菜单', '4', '/admin/menu/index', '0', null), ('4', '权限控制', '1', '/admin/default/index', '1', 0x7b2269636f6e223a202266612066612d6b6579222c202276697369626c65223a20747275657d), ('5', '路由', '4', '/admin/route/index', '1', null), ('6', '权限', '4', '/admin/permission/index', '2', null), ('7', '角色', '4', '/admin/role/index', '3', null), ('9', '首页', null, '/site/default/index', '1', 0x7b2269636f6e223a202266612066612d686f6d65222c202276697369626c65223a20747275657d), ('11', '商品管理', null, '/product/default/index', '2', 0x7b2269636f6e223a202266612066612d6d6f6e6579222c202276697369626c65223a20747275657d), ('12', '分类', '11', '/product/category/index', '1', 0x7b2269636f6e223a202266612066612d66696c746572222c202276697369626c65223a20747275657d), ('13', '产品', '11', '/product/default/index', '2', 0x7b2269636f6e223a202266612066612d7461626c6574222c202276697369626c65223a20747275657d), ('14', '操作日志', '1', '/log/default/index', '4', 0x7b2269636f6e223a202266612066612d6c6170746f70222c202276697369626c65223a20747275657d), ('15', '接口管理（API)', null, '/api/default/index', '3', 0x7b2269636f6e223a202266612066612d65786368616e6765222c202276697369626c65223a20747275657d), ('16', '规则', '4', '/admin/rule/index', '4', null), ('17', '消息管理', null, '/message/default/index', '4', 0x7b2269636f6e223a202266612066612d656e76656c6f7065222c202276697369626c65223a20747275657d), ('20', '邮件', '17', '/message/default/index', '1', null), ('21', '用户组', '17', '/message/message-group/index', '2', null), ('22', '活动管理', null, '/activity/default/index', '5', 0x7b2269636f6e223a202266612066612d62616c616e63652d7363616c65222c202276697369626c65223a20747275657d), ('23', '活动列表', '22', '/activity/default/index', '1', null), ('24', '广告管理', '22', '/activity/advert/index', '2', null), ('25', '申请列表', '22', '/activity/record/index', '3', null);
COMMIT;

-- ----------------------------
--  Table structure for `pre_message`
-- ----------------------------
DROP TABLE IF EXISTS `pre_message`;
CREATE TABLE `pre_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(5) NOT NULL DEFAULT '1' COMMENT '1 email 2message',
  `title` varchar(50) NOT NULL,
  `from_user_id` int(20) DEFAULT NULL COMMENT '发件人id',
  `to_user_id` int(20) DEFAULT NULL COMMENT '收件人ID',
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1 未发送 2已发送3暂不发送（草稿）',
  `is_read` tinyint(1) DEFAULT '2' COMMENT '是否被读  1未读 2已读',
  `is_del` int(2) NOT NULL DEFAULT '1' COMMENT '1未删除 2已删除',
  `created_at` int(20) NOT NULL DEFAULT '0',
  `updated_at` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_message`
-- ----------------------------
BEGIN;
INSERT INTO `pre_message` VALUES ('1', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月8日,雷阵雨 西南风,最低气温27度，最高气温37度', '2', '2', '1', '1502162056', '1502162056'), ('2', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月8日,雷阵雨 西南风,最低气温27度，最高气温37度', '2', '2', '1', '1502162179', '1502201420'), ('6', '1', '哈哈哈', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>测试测试</p>', '2', '2', '1', '1502199077', '1502204314'), ('7', '1', '哈哈哈', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>测试测试</p>', '2', '2', '1', '1502199106', '1502199106'), ('8', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月8日,雷阵雨 西南风,最低气温28度，最高气温38度', '2', '2', '1', '1502200570', '1502200570'), ('9', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月8日,雷阵雨 西南风,最低气温28度，最高气温38度', '2', '2', '1', '1502200592', '1502200592'), ('10', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月8日,雷阵雨 西南风,最低气温28度，最高气温38度', '2', '2', '1', '1502201018', '1502201018'), ('11', '1', 'testing', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>这是一个测试页面 &nbsp;哈哈哈哈哈哈哈哈</p>', '2', '2', '1', '1502201308', '1502201308'), ('12', '1', 'jquery code demo', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p><div><code>&lt;</code><code>script</code>&nbsp;<code>src</code><code>=</code><code>\"http://code.jquery.com/jquery-1.8.3.min.js\"</code><code>&gt;&lt;/</code><code>script</code><code>&gt;</code></div><div><code>&lt;</code><code>script</code><code>&gt;</code></div><div><code>$(function(){</code></div><div><code>&nbsp; &nbsp; </code><code>$(\"#demo\").val(123);//将textarea中的内容修改为123</code></div><div><code>&nbsp; &nbsp; </code><code>$(\"#demo\").text(456);//将textarea中的内容修改为456</code></div><div><code>&nbsp; &nbsp; </code><code>//最后获取到的和页面上显示的都是123</code></div><div><code>&nbsp; &nbsp; </code><code>//可以尝试将上面修改的方法的顺序颠倒一下，最后的结果还是123</code></div><div><code>&nbsp; &nbsp; </code><code>alert($(\"#demo\").val());//弹出textarea的值</code></div><div><code>});</code></div><div><code>&lt;/</code><code>script</code><code>&gt;</code></div><div><code>&lt;</code><code>textarea</code>&nbsp;<code>id</code><code>=</code><code>\"demo\"</code><code>&gt;sss&lt;/</code><code>textarea</code><code>&gt;</code></div>﻿<br></p>', '2', '2', '1', '1502201477', '1502201477'), ('13', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州天气hahhahahahahha', '2', '2', '1', '1502202857', '1502203111'), ('14', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州天气', '2', '2', '1', '1502202858', '1502208696'), ('15', '1', '这是一个测试邮件', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>这是一个测试邮件</p>', '2', '2', '1', '1502203464', '1502203464'), ('16', '1', 'demo mail', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>feawefawf</p>', '2', '2', '1', '1502209166', '1502209166'), ('17', '1', '明天天气怎么样呢', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>我特么怎么知道？</p><p>你是咋逗我么，干</p>', '2', '2', '1', '1502209269', '1502209269'), ('18', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周三 8月9日,阵雨 西南风,最低气温27度，最高气温32度', '2', '2', '1', '1502233201', '1502233201'), ('19', '1', '猜猜我是谁', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>哈哈哈哈哈哈</p>', '2', '2', '1', '1502279697', '1502279721'), ('20', '1', '1111111111', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>11111111111</p>', '2', '2', '1', '1502282033', '1502282095'), ('21', '1', '测试分页样式是个什么样', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>发违法未发完</p>', '2', '2', '1', '1502282203', '1502282203'), ('22', '1', 'wfewafeawfawf', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '<p>fawefawfawfeawfeawef</p>', '2', '2', '1', '1502282258', '1502282258'), ('23', '1', 'fawefwaf', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '', '2', '2', '1', '1502283282', '1502283282'), ('24', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西南风,最低气温27度，最高气温34度', '2', '2', '1', '1502319602', '1502319602'), ('25', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371299', '1502371299'), ('26', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371665', '1502371665'), ('27', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371668', '1502371668'), ('28', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371670', '1502371670'), ('29', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371672', '1502371672'), ('30', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502371695', '1502371695'), ('31', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502372690', '1502372690'), ('32', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502373402', '1502373402'), ('33', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502374861', '1502374861'), ('34', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502374865', '1502374865'), ('35', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月10日,多云 西风,最低气温27度，最高气温34度', '2', '2', '1', '1502374869', '1502374869'), ('36', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月11日,多云 东南风,最低气温27度，最高气温36度', '2', '2', '1', '1502406002', '1502406002'), ('37', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 西南风,最低气温27度，最高气温34度', '2', '2', '1', '1502492401', '1502492401'), ('38', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 东南风,最低气温27度，最高气温32度', '2', '2', '1', '1502514173', '1502514173'), ('39', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 东南风,最低气温27度，最高气温32度', '2', '2', '1', '1502514176', '1502514176'), ('40', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 东南风,最低气温27度，最高气温32度', '2', '2', '1', '1502514178', '1502514178'), ('41', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 东南风,最低气温27度，最高气温32度', '2', '2', '1', '1502514180', '1502514180'), ('42', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月12日,雷阵雨 东南风,最低气温27度，最高气温32度', '2', '2', '1', '1502514182', '1502514182'), ('43', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周日 8月13日,多云 东南风,最低气温28度，最高气温37度', '2', '2', '1', '1502578802', '1502578802'), ('44', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周一 8月14日,雷阵雨 西南风,最低气温27度，最高气温35度', '2', '2', '1', '1502665202', '1502665202'), ('45', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月15日,雷阵雨 西南风,最低气温26度，最高气温33度', '2', '2', '1', '1502751601', '1502751601'), ('46', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周三 8月16日,雷阵雨 西南风,最低气温26度，最高气温33度', '2', '2', '1', '1502838003', '1502838003'), ('47', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月17日,雷阵雨 东风,最低气温26度，最高气温33度', '2', '2', '1', '1502924402', '1502924402'), ('48', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温27度，最高气温36度', '2', '2', '1', '1503010802', '1503010802'), ('49', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044762', '1503044762'), ('50', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044764', '1503044764'), ('51', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044764', '1503044764'), ('52', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044765', '1503044765'), ('53', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044766', '1503044766'), ('54', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044767', '1503044767'), ('55', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044768', '1503044768'), ('56', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044769', '1503044769'), ('57', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044769', '1503044769'), ('58', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044770', '1503044770'), ('59', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044995', '1503044995'), ('60', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503044998', '1503044998'), ('61', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045001', '1503045001'), ('62', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045002', '1503045002'), ('63', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045005', '1503045005'), ('64', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045006', '1503045006'), ('65', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045008', '1503045008'), ('66', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045009', '1503045009'), ('67', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045011', '1503045011'), ('68', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045012', '1503045012'), ('69', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月18日,阵雨 西南风,最低气温26度，最高气温36度', '2', '2', '1', '1503045014', '1503045014'), ('70', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月19日,雷阵雨 南风,最低气温27度，最高气温36度', '2', '2', '1', '1503097201', '1503097201'), ('71', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月19日,多云 西南风,最低气温27度，最高气温36度', '2', '2', '1', '1503122604', '1503122604'), ('72', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月19日,多云 西南风,最低气温27度，最高气温36度', '2', '2', '1', '1503123246', '1503123246'), ('73', '2', '用户消息', '6', '4', '0', '0', '1111111111', '2', '1', '1', '1503123171', '1503123171'), ('74', '2', '用户消息', '6', '4', '0', '0', '111111111', '2', '1', '1', '1503136795', '1503136795'), ('75', '2', '用户消息', '6', '4', '0', '0', '111111111', '2', '1', '1', '1503136800', '1503136800'), ('76', '2', '用户消息', '6', '4', '0', '0', '1111', '2', '1', '1', '1503138523', '1503138523'), ('77', '2', '用户消息', '6', '4', '0', '0', '3333', '2', '1', '1', '1503138559', '1503138559'), ('78', '2', '用户消息', '3', '4', '0', '0', '3333', '2', '1', '1', '1503138561', '1503138561'), ('79', '2', '用户消息', '3', '4', '0', '0', '3333', '2', '1', '1', '1503138562', '1503138562'), ('80', '2', '用户消息', '4', '3', '0', '0', '1111', '2', '1', '1', '1503140125', '1503140125'), ('81', '2', '用户消息', '4', '3', '0', '0', '1111', '2', '1', '1', '1503140209', '1503140209'), ('82', '2', '用户消息', '4', '3', '0', '0', '111', '2', '1', '1', '1503140257', '1503140257'), ('83', '2', '用户消息', '4', '3', '0', '0', '111', '2', '1', '1', '1503140259', '1503140259'), ('84', '2', '用户消息', '4', '3', '0', '0', '111', '2', '1', '1', '1503140259', '1503140259'), ('85', '2', '用户消息', '4', '3', '0', '0', '111', '2', '1', '1', '1503140353', '1503140353'), ('86', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142712', '1503142712'), ('87', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142725', '1503142725'), ('88', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142726', '1503142726'), ('89', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142727', '1503142727'), ('90', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142728', '1503142728'), ('91', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142728', '1503142728'), ('92', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142728', '1503142728'), ('93', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142729', '1503142729'), ('94', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142729', '1503142729'), ('95', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142729', '1503142729'), ('96', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142729', '1503142729'), ('97', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142730', '1503142730'), ('98', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142730', '1503142730'), ('99', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142731', '1503142731'), ('100', '2', '用户消息', '3', '4', '0', '0', '你好呀', '2', '1', '1', '1503142731', '1503142731'), ('101', '2', '用户消息', '3', '4', '0', '0', '111', '2', '1', '1', '1503142820', '1503142820'), ('102', '2', '用户消息', '4', '3', '0', '0', '2232', '2', '1', '1', '1503142824', '1503142824'), ('103', '2', '用户消息', '3', '4', '0', '0', '222', '2', '1', '1', '1503143002', '1503143002'), ('104', '2', '用户消息', '4', '3', '0', '0', '1111', '2', '1', '1', '1503143030', '1503143030'), ('105', '2', '用户消息', '4', '3', '0', '0', '1111发文发我份爱无法', '2', '1', '1', '1503143033', '1503143033'), ('106', '2', '用户消息', '4', '3', '0', '0', '42424', '2', '2', '1', '1503143403', '1503143403'), ('107', '2', '用户消息', '3', '4', '0', '0', '242343', '2', '2', '1', '1503143419', '1503143419'), ('108', '2', '用户消息', '3', '4', '0', '0', '242343飞娃儿发放', '2', '2', '1', '1503143424', '1503143424'), ('109', '2', '用户消息', '4', '3', '0', '0', '42424飞娃儿发', '2', '2', '1', '1503143427', '1503143427'), ('110', '2', '用户消息', '4', '3', '0', '0', '333', '2', '2', '1', '1503143529', '1503143529'), ('111', '2', '用户消息', '3', '4', '0', '0', '333', '2', '2', '1', '1503143540', '1503143540'), ('112', '2', '用户消息', '3', '4', '0', '0', '333发文服务费', '2', '2', '1', '1503143544', '1503143544'), ('113', '2', '用户消息', '4', '3', '0', '0', '发未发完', '2', '2', '1', '1503143743', '1503143743'), ('114', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143762', '1503143762'), ('115', '2', '用户消息', '4', '3', '0', '0', '发未发完', '2', '2', '1', '1503143769', '1503143769'), ('116', '2', '用户消息', '4', '3', '0', '0', '发未发完', '2', '2', '1', '1503143770', '1503143770'), ('117', '2', '用户消息', '4', '3', '0', '0', '发未发完', '2', '2', '1', '1503143771', '1503143771'), ('118', '2', '用户消息', '4', '3', '0', '0', '发未发完', '2', '2', '1', '1503143771', '1503143771'), ('119', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143772', '1503143772'), ('120', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143772', '1503143772'), ('121', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143773', '1503143773'), ('122', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143773', '1503143773'), ('123', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143774', '1503143774'), ('124', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143775', '1503143775'), ('125', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143775', '1503143775'), ('126', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143776', '1503143776'), ('127', '2', '用户消息', '3', '4', '0', '0', '啥', '2', '2', '1', '1503143776', '1503143776'), ('128', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周日 8月20日,雷阵雨 西南风,最低气温26度，最高气温35度', '2', '2', '1', '1503183602', '1503183602'), ('129', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周一 8月21日,雷阵雨 东风,最低气温26度，最高气温34度', '2', '2', '1', '1503270002', '1503270002'), ('130', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月22日,雷阵雨 东南风,最低气温27度，最高气温34度', '2', '2', '1', '1503356401', '1503356401'), ('131', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周三 8月23日,多云 东南风,最低气温27度，最高气温37度', '2', '2', '1', '1503442802', '1503442802'), ('132', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月24日,多云 东南风,最低气温27度，最高气温37度', '2', '2', '1', '1503529203', '1503529203'), ('133', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 8月25日,雷阵雨 西风,最低气温27度，最高气温36度', '2', '2', '1', '1503615602', '1503615602'), ('134', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 8月26日,雷阵雨 东北风,最低气温26度，最高气温33度', '2', '2', '1', '1503702001', '1503702001'), ('135', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周日 8月27日,多云 东风,最低气温26度，最高气温34度', '2', '2', '1', '1503788402', '1503788402'), ('136', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周一 8月28日,晴 东风,最低气温27度，最高气温38度', '2', '2', '1', '1503874803', '1503874803'), ('137', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周二 8月29日,雷阵雨 南风,最低气温26度，最高气温35度', '2', '2', '1', '1503961202', '1503961202'), ('138', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周三 8月30日,多云 东风,最低气温25度，最高气温34度', '2', '2', '1', '1504047602', '1504047602'), ('139', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周四 8月31日,多云 东北风,最低气温24度，最高气温30度', '2', '2', '1', '1504134002', '1504134002'), ('140', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周五 9月1日,多云 东北风,最低气温23度，最高气温30度', '2', '2', '1', '1504220402', '1504220402'), ('141', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周六 9月2日,多云 东北风,最低气温24度，最高气温30度', '2', '2', '1', '1504306802', '1504306802'), ('142', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周日 9月3日,阵雨 东北风,最低气温24度，最高气温30度', '2', '2', '1', '1504393202', '1504393202'), ('143', '1', '杭州天气', '3', null, 'alex.qiubo@qq.com', 'alex.qiubo@qq.com', '杭州:周一 9月4日,多云 东风,最低气温25度，最高气温33度', '2', '2', '1', '1504479601', '1504479601');
COMMIT;

-- ----------------------------
--  Table structure for `pre_message_group`
-- ----------------------------
DROP TABLE IF EXISTS `pre_message_group`;
CREATE TABLE `pre_message_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(45) NOT NULL,
  `user_id` varchar(100) NOT NULL COMMENT '创建人ID',
  `type` tinyint(5) NOT NULL DEFAULT '1' COMMENT '1 email 2 message',
  `members` text NOT NULL COMMENT '组成员',
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '状态 1 关闭 2激活',
  `created_at` int(20) NOT NULL DEFAULT '0',
  `updated_at` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_message_group`
-- ----------------------------
BEGIN;
INSERT INTO `pre_message_group` VALUES ('1', '管理员组', '3', '1', '[\"pozm@qq.com\"]', '2', '1502355973', '1502380919'), ('2', '瞎几把乱来组', '3', '1', '[\"pozm@qq.com\"]', '2', '1502356014', '1502356014'), ('3', '瞎几把乱来组', '3', '1', '[\"pozm@qq.com\"]', '2', '1502356119', '1502356119'), ('4', '发微风', '3', '1', '[\"qiubo@qq.com\",\"pozm@qq.com\"]', '2', '1502356213', '1502356213'), ('5', '发额安抚费', '3', '1', '[\"pozm@qq.com\"]', '2', '1502356304', '1502356304'), ('6', '分阿尔法', '3', '1', '[\"alex.qiubo@qq.com\"]', '2', '1502436531', '1502436531');
COMMIT;

-- ----------------------------
--  Table structure for `pre_news`
-- ----------------------------
DROP TABLE IF EXISTS `pre_news`;
CREATE TABLE `pre_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `pre_product`
-- ----------------------------
DROP TABLE IF EXISTS `pre_product`;
CREATE TABLE `pre_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `content` text,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_product`
-- ----------------------------
BEGIN;
INSERT INTO `pre_product` VALUES ('9', 'awefawef', '1', '5400', 'fawfewafe', '1492819107'), ('10', 'awefawef', '1', '5400', 'fawfewafe', '1492819136'), ('11', 'awefawef', '1', '5400', 'fawfewafe', '1492819148'), ('12', 'awefawef', '1', '5400', 'fawfewafe', '1492819173');
COMMIT;

-- ----------------------------
--  Table structure for `pre_relate_activity_apply`
-- ----------------------------
DROP TABLE IF EXISTS `pre_relate_activity_apply`;
CREATE TABLE `pre_relate_activity_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `activity_id` int(11) NOT NULL COMMENT '活动id',
  `apply_id` int(11) NOT NULL COMMENT '申请人ID',
  `votes` int(255) unsigned zerofill NOT NULL COMMENT '得票数',
  `created_at` int(13) NOT NULL COMMENT '创建时间',
  `updated_at` int(13) NOT NULL COMMENT '更新时间',
  `vote_user` varchar(50) NOT NULL DEFAULT '' COMMENT '投票人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `pre_user`
-- ----------------------------
DROP TABLE IF EXISTS `pre_user`;
CREATE TABLE `pre_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pre_user`
-- ----------------------------
BEGIN;
INSERT INTO `pre_user` VALUES ('3', 'alex', 'qYLhupf2yY5TKFfx-BMV37rozjZUhS4Y', '$2y$13$fPN7C4LFaPDv0X.o6/e3pOHMIYZ3dhumEZqU.7G3e4E7sS.LYkjle', null, 'alex.qiubo@qq.com', '10', '10', '1491809952', '1492349814'), ('4', 'qiubo', 'EvdmRgHHz8ndL_XsO_7Ia1XQfUT_t--2', '$2y$13$pkrmTvdPt1EPK0DuQrADtO.MFTDCKKuAEICvvRLkFcRoo2KzPpVN.', null, 'qiubo@qq.com', '10', '10', '1491812922', '1492345882'), ('6', 'pozm', 'JYfAzMtwnyJsU7OZv62LWrNLqEKLuHVd', '$2y$13$xmUau.fC6hC3WlhunqGTYOqLjrM3kVhIjb8GCvK2INv.YNgDHOXXi', null, 'pozm@qq.com', '10', '10', '1492519331', '1492519331');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
