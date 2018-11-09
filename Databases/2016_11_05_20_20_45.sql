-- -----------------------------
--Bool MySQL Data Transfer--
-- 日期：2016-11-05 20:20:53 --
-- -----------------------------

-- -----------------------------------
-- Table structure for `node` --
-- -----------------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '节点名称',
  `controller` varchar(40) NOT NULL COMMENT '控制器',
  `action` varchar(40) NOT NULL COMMENT '方法',
  `pid` tinyint(4) unsigned NOT NULL COMMENT '父类id',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='节点表';


-- -----------------------------------
-- Table structure for `role` --
-- -----------------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '角色名称',
  `node_ids` varchar(250) NOT NULL COMMENT '权限节点id',
  `remark` varchar(200) DEFAULT NULL,
  `add_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='角色表';


-- -----------------------------------
-- Table structure for `log` --
-- -----------------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(9) unsigned NOT NULL COMMENT '用户id',
  `name` varchar(40) NOT NULL COMMENT '名字',
  `desc` varchar(200) NOT NULL COMMENT '描述',
  `time` int(11) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='日志表';


-- -----------------------------------
-- Table structure for `admin` --
-- -----------------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `email` varchar(40) NOT NULL COMMENT '邮箱',
  `phone` int(12) unsigned NOT NULL,
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `role_id` varchar(250) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员表';


-- -----------------------------------
-- Table structure for `slider` --
-- -----------------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `link` varchar(250) DEFAULT NULL COMMENT '链接地址',
  `img` varchar(200) NOT NULL COMMENT '轮播图片',
  `sort_id` tinyint(4) unsigned NOT NULL DEFAULT '10',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示 0 隐藏 1显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='轮播表';


-- -----------------------------------
-- Table structure for `config` --
-- -----------------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(250) DEFAULT NULL COMMENT '标题',
  `desc` mediumtext COMMENT '描述',
  `keyword` mediumtext COMMENT '关键字',
  `copy` varchar(250) DEFAULT NULL COMMENT '备案',
  `statistics` mediumtext COMMENT '统计',
  `logo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='配置表';


-- ---------------------------------
-- insert of `node` --
-- ---------------------------------
 INSERT INTO `node` VALUES ('4','权限管理','Auth','','0','1478178703');
 INSERT INTO `node` VALUES ('5','管理员列表','Admin','index','4','1478178703');
 INSERT INTO `node` VALUES ('6','管理员日志','Log','index','4','1478178703');
 INSERT INTO `node` VALUES ('7','角色管理','Role','index','4','1478178703');
 INSERT INTO `node` VALUES ('8','权限节点','Node','index','4','1478178703');
 INSERT INTO `node` VALUES ('9','系统管理','','','0','1478178703');
 INSERT INTO `node` VALUES ('11','系统设置','Config','index','9','1478178703');
 INSERT INTO `node` VALUES ('12','数据库管理','Database','','0','1478178703');
 INSERT INTO `node` VALUES ('13','数据库备份','Database','','12','1478178703');
 INSERT INTO `node` VALUES ('14','执行SQL','Database','','12','1478178703');
 INSERT INTO `node` VALUES ('15','数据表优化','Database','','12','1478178703');
 INSERT INTO `node` VALUES ('16','轮播设置','Slider','index','9','1478178703');
 INSERT INTO `node` VALUES ('17','数据采集','Collect','','0','0');
 INSERT INTO `node` VALUES ('18','58同城采集','','','17','0');
 INSERT INTO `node` VALUES ('19','赶集网采集','','','17','0');
 INSERT INTO `node` VALUES ('20','百姓网采集','','','17','0');
 INSERT INTO `node` VALUES ('21','链家网采集','','','17','0');
 INSERT INTO `node` VALUES ('22','安居客采集','','','17','0');
 INSERT INTO `node` VALUES ('23','邮箱设置','Email','index','9','1478258011');
-- ---------------------------------
-- insert of `role` --
-- ---------------------------------
 INSERT INTO `role` VALUES ('2','系统管理员','10,11,16','系统管理员。。。','1478176941');
 INSERT INTO `role` VALUES ('3','数据库管理员','13,14,15','数据库管理员','1478176941');
 INSERT INTO `role` VALUES ('4','系统数据库管理','10,11,16,13,14,15','系统数据库管理','1478178647');
 INSERT INTO `role` VALUES ('6','11','4,5,6,7,8,9,16,12,15','111','1478178720');
 INSERT INTO `role` VALUES ('8','sql','12,13,14','sql','1478179393');
-- ---------------------------------
-- insert of `log` --
-- ---------------------------------
 INSERT INTO `log` VALUES ('1','1','admin','修改 [ 邮箱 ] 配置','1478343738');
 INSERT INTO `log` VALUES ('2','1','admin','修改 [ 网站设置 ] ','1478343846');
 INSERT INTO `log` VALUES ('4','1','admin','添加 id 为  [ 轮播图片 ] ','1478344173');
 INSERT INTO `log` VALUES ('5','1','admin','修改 id 为 2 [ 轮播图片 ] ','1478344185');
-- ---------------------------------
-- insert of `admin` --
-- ---------------------------------
 INSERT INTO `admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','30024167@qq.com','1705','1111111111111111','1478168611','1');
 INSERT INTO `admin` VALUES ('3','test','098f6bcd4621d373cade4e832627b4f6','30024167@qq.com','1315336','testkkk','1478184399','1');
-- ---------------------------------
-- insert of `slider` --
-- ---------------------------------
 INSERT INTO `slider` VALUES ('1','11','11111111111111111111','Uploads/2016_11_04/581c95e5add7c.jpg','10','1');
 INSERT INTO `slider` VALUES ('2','11','111111','Uploads/20161105/581dbdeda62f0.jpg','10','1');
-- ---------------------------------
-- insert of `config` --
-- ---------------------------------
 INSERT INTO `config` VALUES ('1','12','1211111','121111','1211111111','121111111','Uploads/20161105/581db441ea0a1.png');
