/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : house

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-11-20 18:37:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
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

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '30024167@qq.com', '1705', '1111111111111111', '1478168611', '1');
INSERT INTO `admin` VALUES ('3', 'test', '098f6bcd4621d373cade4e832627b4f6', '30024167@qq.com', '1315336', 'testkkk', '1478184399', '2');

-- ----------------------------
-- Table structure for `appointment`
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `hid` mediumint(9) unsigned DEFAULT NULL COMMENT '房子id',
  `uid` mediumint(9) unsigned DEFAULT NULL COMMENT '预约者id',
  `time` int(11) unsigned DEFAULT NULL COMMENT '时间',
  `remark` varchar(50) DEFAULT NULL COMMENT '其他要求',
  `other` varchar(100) DEFAULT NULL COMMENT '要求',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appointment
-- ----------------------------
INSERT INTO `appointment` VALUES ('4', '8', '2', '1478693760', '', '能住两人,能养宠物,能做饭,有独卫');
INSERT INTO `appointment` VALUES ('5', '8', '3', '1478693760', '1', null);
INSERT INTO `appointment` VALUES ('6', '8', '3', '1478693760', '11111', '能住两人,能养宠物,能做饭,有独卫');

-- ----------------------------
-- Table structure for `collect`
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `hid` mediumint(9) unsigned DEFAULT NULL COMMENT '房子id',
  `uid` mediumint(9) unsigned DEFAULT NULL COMMENT '预约者id',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
INSERT INTO `collect` VALUES ('14', '8', '2', '1478655458');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `from_id` mediumint(9) unsigned DEFAULT NULL COMMENT '评论用户id',
  `to_id` mediumint(9) unsigned DEFAULT NULL COMMENT '房东id',
  `option` varchar(40) DEFAULT NULL COMMENT '选项',
  `content` varchar(200) DEFAULT NULL COMMENT '内容',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `anonymity` tinyint(1) unsigned DEFAULT '0' COMMENT '是否匿名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '2', '1', '还不错', '111111111111', '1478584152', '0');
INSERT INTO `comment` VALUES ('2', '3', '4', '有待改善', '还不错....', '1478585259', '0');
INSERT INTO `comment` VALUES ('3', '4', '4', '问题很多', '这是一条测试数据', '1478586733', '1');
INSERT INTO `comment` VALUES ('4', '1', '4', '值得推荐', 'vivo手机发布测试', '1478587014', '0');
INSERT INTO `comment` VALUES ('5', '1', '4', '有待改善', '测试数据', '1478588045', '0');
INSERT INTO `comment` VALUES ('6', '2', '4', '有待改善', '55555', '1478590515', '0');
INSERT INTO `comment` VALUES ('7', '2', '4', '值得推荐', '111111111', '1478606792', '1');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
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

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', '12', '1211111', '121111', '1211111111', '121111111', 'Uploads/20161106/581f38bbb93ad.png');

-- ----------------------------
-- Table structure for `house`
-- ----------------------------
DROP TABLE IF EXISTS `house`;
CREATE TABLE `house` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(60) NOT NULL,
  `rent` enum('床位','日租','单间','整租','合租') NOT NULL DEFAULT '合租' COMMENT '租住类型',
  `number` tinyint(4) unsigned NOT NULL COMMENT '楼号，栋号',
  `floor` varchar(20) DEFAULT NULL COMMENT '楼号',
  `nums` tinyint(4) unsigned DEFAULT NULL COMMENT '门牌号',
  `type` varchar(20) DEFAULT NULL COMMENT '户型',
  `direction` varchar(20) DEFAULT NULL COMMENT '方向',
  `area` varchar(10) DEFAULT NULL COMMENT '面积',
  `money` decimal(10,2) unsigned DEFAULT NULL COMMENT '租金',
  `decoration` varchar(20) DEFAULT NULL COMMENT '装修',
  `room_type` varchar(10) DEFAULT NULL COMMENT '房间类型',
  `clapboard` tinyint(1) unsigned DEFAULT NULL COMMENT '隔板',
  `pay_ren` varchar(20) DEFAULT NULL,
  `facilities` varchar(100) DEFAULT NULL COMMENT '设施',
  `demand` varchar(100) DEFAULT NULL COMMENT '要求',
  `location` varchar(100) DEFAULT NULL COMMENT '位置',
  `street` varchar(100) DEFAULT NULL COMMENT '街道',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `uid` mediumint(10) unsigned DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of house
-- ----------------------------
INSERT INTO `house` VALUES ('7', '蓝湾国际三室仅2200元每月 家电齐全 拎包入住', '整租', '16', '5/16', '255', '2室2厅2卫', '南', '100', '1500.00', '普通装修', '主卧', '0', '付一押一', '冰箱,洗衣机,宽带,电视机,厨房,热水器', '不喝酒,不吸烟,爱干净,作息规律', '山东省-临沂市-兰山区', '临沂市兰山区涑河北街111号', '1478515995', '4');
INSERT INTO `house` VALUES ('8', '交运永恒华府沿河边教育房', '整租', '16', '7/20', '255', '3室2厅1卫', '南北 ', '110', '1200.00', '普通装修', '主卧', '0', '半年一付', '冰箱,洗衣机,宽带,电视机,厨房,热水器', '不喝酒,不吸烟,爱干净', '山东省-临沂市-兰山区', '解放路与滨河西路', '1478519851', '4');

-- ----------------------------
-- Table structure for `house_img`
-- ----------------------------
DROP TABLE IF EXISTS `house_img`;
CREATE TABLE `house_img` (
  `hid` mediumint(9) unsigned DEFAULT NULL,
  `path` varchar(40) DEFAULT NULL COMMENT '路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='房子图片';

-- ----------------------------
-- Records of house_img
-- ----------------------------
INSERT INTO `house_img` VALUES ('7', 'Uploads/20161107/58205d1b9b24d.jpg');
INSERT INTO `house_img` VALUES ('7', 'Uploads/20161107/58205d1b9c5d6.jpg');
INSERT INTO `house_img` VALUES ('8', 'Uploads/20161107/58206c2c0a4d0.jpg');
INSERT INTO `house_img` VALUES ('8', 'Uploads/20161107/58206c2c0cbe1.jpg');
INSERT INTO `house_img` VALUES ('8', 'Uploads/20161107/58206c2c0e351.jpg');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(9) unsigned NOT NULL COMMENT '用户id',
  `name` varchar(40) NOT NULL COMMENT '名字',
  `desc` varchar(200) NOT NULL COMMENT '描述',
  `time` int(11) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='日志表';

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('1', '1', 'admin', '修改 [ 邮箱 ] 配置', '1478343738');
INSERT INTO `log` VALUES ('2', '1', 'admin', '修改 [ 网站设置 ] ', '1478343846');
INSERT INTO `log` VALUES ('4', '1', 'admin', '添加 id 为  [ 轮播图片 ] ', '1478344173');
INSERT INTO `log` VALUES ('5', '1', 'admin', '修改 id 为 2 [ 轮播图片 ] ', '1478344185');
INSERT INTO `log` VALUES ('6', '1', 'admin', '备份数据表 [ node,role,log,admin,slider,config ] 成功', '1478348453');
INSERT INTO `log` VALUES ('7', '1', 'admin', '下载备份文件 [ 2016_11_05_20_20_45.sql ] 成功', '1478348460');
INSERT INTO `log` VALUES ('8', '1', 'admin', '删除 [ 数据表优化 ] 权限节点', '1478350533');
INSERT INTO `log` VALUES ('9', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478355067');
INSERT INTO `log` VALUES ('10', '1', 'admin', '修改 id 为 2 [ 轮播图片 ] ', '1478438915');
INSERT INTO `log` VALUES ('11', '1', 'admin', '修改 [ 网站设置 ] ', '1478439428');
INSERT INTO `log` VALUES ('12', '1', 'admin', '修改 [ 网站设置 ] ', '1478439435');
INSERT INTO `log` VALUES ('13', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478439744');
INSERT INTO `log` VALUES ('14', '1', 'admin', '添加 id 为 3 [ 轮播图片 ] ', '1478439755');
INSERT INTO `log` VALUES ('15', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478440854');
INSERT INTO `log` VALUES ('16', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478441012');
INSERT INTO `log` VALUES ('17', '1', 'admin', '修改 id 为 2 [ 轮播图片 ] ', '1478441021');
INSERT INTO `log` VALUES ('18', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478441034');
INSERT INTO `log` VALUES ('19', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478441103');
INSERT INTO `log` VALUES ('20', '1', 'admin', '修改 id 为 3 [ 轮播图片 ] ', '1478441117');
INSERT INTO `log` VALUES ('21', '1', 'admin', '修改 [ 网站设置 ] ', '1478441130');
INSERT INTO `log` VALUES ('22', '1', 'admin', '修改 [ 网站设置 ] ', '1478441140');
INSERT INTO `log` VALUES ('23', '1', 'admin', '修改 [ 网站设置 ] ', '1478441147');
INSERT INTO `log` VALUES ('24', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478510890');
INSERT INTO `log` VALUES ('25', '1', 'admin', '修改 id 为 2 [ 轮播图片 ] ', '1478510897');
INSERT INTO `log` VALUES ('26', '1', 'admin', '修改 id 为 3 [ 轮播图片 ] ', '1478510908');
INSERT INTO `log` VALUES ('27', '1', 'admin', '修改 id 为 1 [ 轮播图片 ] ', '1478510919');
INSERT INTO `log` VALUES ('28', '1', 'admin', '删除 [ 58同城采集 ] 权限节点', '1478692681');
INSERT INTO `log` VALUES ('29', '1', 'admin', '删除 [ 赶集网采集 ] 权限节点', '1478692681');
INSERT INTO `log` VALUES ('30', '1', 'admin', '删除 [ 百姓网采集 ] 权限节点', '1478692681');
INSERT INTO `log` VALUES ('31', '1', 'admin', '删除 [ 链家网采集 ] 权限节点', '1478692682');
INSERT INTO `log` VALUES ('32', '1', 'admin', '删除 [ 安居客采集 ] 权限节点', '1478692682');
INSERT INTO `log` VALUES ('33', '1', 'admin', '删除 [ 数据采集 ] 权限节点', '1478692682');
INSERT INTO `log` VALUES ('34', '1', 'admin', '下载备份文件 [ 2016_11_05_20_20_45.sql ] 成功', '1479187146');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `to_id` mediumint(9) unsigned DEFAULT NULL,
  `from_id` mediumint(9) unsigned DEFAULT NULL,
  `add_time` int(11) unsigned DEFAULT NULL,
  `content` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('2', '4', '2', '1478693760', '111111111');
INSERT INTO `message` VALUES ('3', '4', '3', '1478693760', '你已经成功预约<a href=\"boolean.51vip.biz:20140/house/index.php/House/info/id/8 \">交运永恒华府沿河边教育房</a>');

-- ----------------------------
-- Table structure for `node`
-- ----------------------------
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

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('4', '权限管理', 'Auth', '', '0', '1478178703');
INSERT INTO `node` VALUES ('5', '管理员列表', 'Admin', 'index', '4', '1478178703');
INSERT INTO `node` VALUES ('6', '管理员日志', 'Log', 'index', '4', '1478178703');
INSERT INTO `node` VALUES ('7', '角色管理', 'Role', 'index', '4', '1478178703');
INSERT INTO `node` VALUES ('8', '权限节点', 'Node', 'index', '4', '1478178703');
INSERT INTO `node` VALUES ('9', '系统管理', '', '', '0', '1478178703');
INSERT INTO `node` VALUES ('11', '系统设置', 'Config', 'index', '9', '1478178703');
INSERT INTO `node` VALUES ('12', '数据库管理', 'Database', '', '0', '1478178703');
INSERT INTO `node` VALUES ('13', '数据库备份', 'Database', '', '12', '1478178703');
INSERT INTO `node` VALUES ('14', '执行SQL', 'Database', 'sql', '12', '1478178703');
INSERT INTO `node` VALUES ('16', '轮播设置', 'Slider', 'index', '9', '1478178703');
INSERT INTO `node` VALUES ('23', '邮箱设置', 'Email', 'index', '9', '1478258011');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '角色名称',
  `node_ids` varchar(250) NOT NULL COMMENT '权限节点id',
  `remark` varchar(200) DEFAULT NULL,
  `add_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('2', '系统管理员', '9,11,16', '系统管理员。。。', '1478176941');
INSERT INTO `role` VALUES ('3', '数据库管理员', '13,14,15', '数据库管理员', '1478176941');
INSERT INTO `role` VALUES ('4', '系统数据库管理', '10,11,16,13,14,15', '系统数据库管理', '1478178647');
INSERT INTO `role` VALUES ('6', '11', '4,5,6,7,8,9,16,12,15', '111', '1478178720');
INSERT INTO `role` VALUES ('8', 'sql', '12,13,14', 'sql', '1478179393');

-- ----------------------------
-- Table structure for `slider`
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `link` varchar(250) DEFAULT NULL COMMENT '链接地址',
  `img` varchar(200) NOT NULL COMMENT '轮播图片',
  `sort_id` tinyint(4) unsigned NOT NULL DEFAULT '10',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示 0 隐藏 1显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='轮播表';

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', 'mui1', 'http://dev.dcloud.net.cn/mui/', 'Uploads/20161106/581f388f61be7.jpg', '10', '1');
INSERT INTO `slider` VALUES ('2', '11', 'http://dev.dcloud.net.cn/mui/', 'Uploads/20161106/581f383d96731.jpg', '10', '1');
INSERT INTO `slider` VALUES ('3', 'mui', 'http://dev.dcloud.net.cn/mui/', 'Uploads/20161106/581f389d701bc.jpg', '10', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `reg_time` int(11) unsigned NOT NULL COMMENT '注册时间',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'bool', 'c506ff134babdd6e68ab3e6350e95305', '1478416006', '0');
INSERT INTO `user` VALUES ('2', 'sloan', 'cdca073392fab3dcd984554f0a383dbb', '1478416083', '0');
INSERT INTO `user` VALUES ('3', 'role', '29a7e96467b69a9f5a93332e29e9b0de', '1478416673', '0');
INSERT INTO `user` VALUES ('4', 'test', '098f6bcd4621d373cade4e832627b4f6', '1478432356', '0');
INSERT INTO `user` VALUES ('5', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1478672974', '0');
INSERT INTO `user` VALUES ('6', 'maozhongyu', 'd155f11ab17903fedda7418c05a9a9ee', '1478773241', '0');

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `uid` mediumint(9) unsigned NOT NULL,
  `head` varchar(40) NOT NULL COMMENT '头像',
  `nickname` varchar(40) NOT NULL COMMENT '昵称',
  `sex` tinyint(1) unsigned NOT NULL COMMENT '0女 1男',
  `age` tinyint(3) unsigned NOT NULL COMMENT '年龄',
  `area` varchar(30) NOT NULL COMMENT '区域',
  `phone` varchar(12) DEFAULT NULL COMMENT '手机',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `desc` varchar(200) DEFAULT NULL COMMENT '描述',
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'Uploads/20161108/58217efb8528a.jpg', 'bool', '1', '22', '山东省-临沂市-费县', '17052850083', '8101985@qq.com', '我的个人信息说明');
INSERT INTO `userinfo` VALUES ('2', 'Uploads/20161108/58217fef681b8.jpg', '临时用户2', '1', '24', '河北省-石家庄市-长安区', '17500002', '81001985@qq.com', '111111111111111');
INSERT INTO `userinfo` VALUES ('3', 'Uploads/20161108/582179d0d181e.jpg', '33', '1', '12', '北京市-北京市-东城区', '155556', '210001408@qq.com', '111111111');
INSERT INTO `userinfo` VALUES ('4', 'Uploads/20161106/581f377f975d7.jpg', '布尔', '1', '20', '山东省-临沂市-兰山区', '17052850083', '81001985@qq.com', 'hi,大家好，我是布尔。。。');
INSERT INTO `userinfo` VALUES ('5', '', '暂未填写', '0', '0', '暂未填写', '18888888888', 'admin@qq.com', null);
INSERT INTO `userinfo` VALUES ('6', '', '暂未填写', '0', '0', '暂未填写', '18758327958', '595106153@qq.com', null);
