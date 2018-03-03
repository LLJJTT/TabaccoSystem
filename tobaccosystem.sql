/*
 Navicat Premium Data Transfer

 Source Server         : lijinghuan
 Source Server Type    : MySQL
 Source Server Version : 100110
 Source Host           : localhost
 Source Database       : tobaccosystem

 Target Server Type    : MySQL
 Target Server Version : 100110
 File Encoding         : utf-8

 Date: 03/03/2018 18:33:22 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `already_handle_order`
-- ----------------------------
DROP TABLE IF EXISTS `already_handle_order`;
CREATE TABLE `already_handle_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `order_quantity` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `orderer` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `gid` varchar(11) DEFAULT NULL,
  `type` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `already_handle_order`
-- ----------------------------
BEGIN;
INSERT INTO `already_handle_order` VALUES ('23', '2018022701', '2018-02-28-12', '长白山', '10', '120元', '1200元', '王友强', '哈尔滨呼兰区', '13812345678', '无', '8', '正常订单'), ('24', '2018022813', '2018-02-28-07', '长白山', '3', '120', '360', '李志鑫', '哈尔滨呼兰区', '15252525252', '不想买了', '8', '退货订单');
COMMIT;

-- ----------------------------
--  Table structure for `invertory_goods_list`
-- ----------------------------
DROP TABLE IF EXISTS `invertory_goods_list`;
CREATE TABLE `invertory_goods_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `number1` int(11) DEFAULT NULL,
  `in_price` varchar(255) DEFAULT NULL,
  `sell_price` varchar(255) DEFAULT NULL,
  `profit` int(255) DEFAULT NULL,
  `profit_all` int(255) DEFAULT NULL,
  `good_address` varchar(255) DEFAULT NULL,
  `type1` varchar(255) DEFAULT NULL,
  `type2` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_phone` varchar(255) DEFAULT NULL,
  `supplier_address` varchar(255) DEFAULT NULL,
  `add_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `invertory_goods_list`
-- ----------------------------
BEGIN;
INSERT INTO `invertory_goods_list` VALUES ('5', '南京', '180', '100', '130', '30', '6000', '南京卷烟厂', '细根', '硬盒', '张三', '18712345678', '江苏省南京市北京路41号', '赵辉'), ('6', '中华', '200', '410', '577', '167', '33400', '上海卷烟厂', '粗根', '软盒', '李四', '13812345678', '上海市利民大街123号', '赵辉'), ('7', '玉溪', '200', '248', '314', '66', '13200', '云南省玉溪市', '粗根', '软盒', '王五', '18745727272', '云南省玉溪市', '李井欢'), ('8', '长白山', '186', '80', '120', '40', '8000', '吉林烟草工业有限责任公司延吉卷烟厂', '粗根', '硬盒', '赵六', '19812345678', '吉林延吉卷烟厂', '赵辉');
COMMIT;

-- ----------------------------
--  Table structure for `no_handle_order`
-- ----------------------------
DROP TABLE IF EXISTS `no_handle_order`;
CREATE TABLE `no_handle_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `order_quantity` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `orderer` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `no_handle_order`
-- ----------------------------
BEGIN;
INSERT INTO `no_handle_order` VALUES ('2', '2018022702', '2018-02-27-12', '南京', '20', '130', '2600元', '李志鑫', '哈尔滨呼兰区', '15252525252', '无', '5'), ('3', '2018022703', '2018-02-27-13', '中华', '5', '577元', '2885元', '李跃民', '哈尔滨呼兰区', '15212345678', '无', '6');
COMMIT;

-- ----------------------------
--  Table structure for `return_order`
-- ----------------------------
DROP TABLE IF EXISTS `return_order`;
CREATE TABLE `return_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `order_quantity` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `orderer` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `return_order`
-- ----------------------------
BEGIN;
INSERT INTO `return_order` VALUES ('2', '2018022801', '2018-02-28-07', '玉溪', '5', '120', '李跃民', '600', '哈尔滨呼兰区', '152525121212', '不想买了', '7');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', '', ''), ('2', 'lijgjnhuan', 'lijinghuan'), ('3', 'lijinghuan', 'lijinghuan'), ('4', 'zhaohui', 'zhaohui'), ('5', 'ahdhqwdwq', 'lijinghuan'), ('6', 'lijingtao', 'lijingtao');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
