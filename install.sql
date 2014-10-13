-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 24 日 08:04
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `vanet`
--

-- --------------------------------------------------------

--
-- 表的结构 `end_admin`
--

CREATE TABLE IF NOT EXISTS `end_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rights_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `end_admin`
--

INSERT INTO `end_admin` (`admin_id`, `rights_id`, `name`, `password`, `email`, `status`) VALUES
(38, 1, 'admin', '66be5f1f1b43bdb2e337c6749ac1228c0b9d1e24', '', NULL),
(37, 1, 'longbill', '55d7e24398e9cc418e630d1602a6609f43cefef0', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `end_category`
--

CREATE TABLE IF NOT EXISTS `end_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'link',
  `page_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `system` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `item_count` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `short_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `category_id` (`category_id`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `end_category`
--

INSERT INTO `end_category` (`category_id`, `parent_id`, `name`, `description`, `keywords`, `order_id`, `status`, `update_time`, `create_time`, `url`, `content`, `target`, `page_title`, `alias`, `system`, `item_count`, `image`, `short_name`) VALUES
(1, 0, '用户数据管理', NULL, NULL, 2, 'user_list', 1371106085, 1368157543, '2013-05-14-21-22-04', '', '', '', '', 'no', 0, '', NULL),
(2, 22, '参考预算', NULL, NULL, 0, 'cankaoyusuan_list', 1374393535, 1368180735, '参考预算', '', '', '', '', 'no', 0, '', NULL),
(3, 22, '参与人数', NULL, NULL, 0, 'canyurenshu_list', 1368246928, 1368181195, '参与人数', '', '', '', '', 'yes', 0, '', NULL),
(4, 22, '参与人员', NULL, NULL, 0, 'canyurenyuan_list', 1368246930, 1368181498, '参与人员', '', '', '', '', 'yes', 0, '', NULL),
(5, 22, '测评方式', NULL, NULL, 0, 'cepingfangshi_list', 1368246932, 1368182103, '测评方式', '', '', '', '', 'yes', 0, '', NULL),
(6, 22, '测评工具', NULL, NULL, 0, 'cepinggongju_list', 1368246933, 1368182129, '测评工具', '', '', '', '', 'yes', 0, '', NULL),
(7, 22, '场地要求', NULL, NULL, 0, 'changdiyaoqiu_list', 1368246935, 1368182179, '场地要求', '', '', '', '', 'yes', 0, '', NULL),
(8, 22, '活动类型', NULL, NULL, 0, 'huodongleixing_list', 1368246936, 1368182194, '活动类型', '', '', '', '', 'yes', 0, '', NULL),
(9, 22, '活动时间', NULL, NULL, 0, 'huodongshijian_list', 1368246938, 1368182215, '活动时间', '', '', '', '', 'yes', 0, '', NULL),
(10, 22, '活动形式', NULL, NULL, 0, 'huodongxingshi_list', 1368246939, 1368182255, '活动形式', '', '', '', '', 'yes', 0, '', NULL),
(11, 22, '适用范围', NULL, NULL, 0, 'shiyongfanwei_list', 1368246941, 1368182267, '适用范围', '', '', '', '', 'yes', 0, '', NULL),
(20, 22, '素质培养点', NULL, NULL, 0, 'suzhipeiyangdian_list', 1368246942, 1368186736, '素质培养点', '', '', '', '', 'yes', 0, '', NULL),
(42, 0, '车辆信息', NULL, NULL, 0, 'vanet_car_list', 1374660877, 1374660874, '车辆信息', '', '', '', '', 'no', 0, '', NULL),
(37, 0, '用户/设备交互管理', NULL, NULL, 0, 'udmessage_list', 1371351679, 1371351677, '用户/设备交互管理', '', '', '', '', 'no', 0, '', NULL),
(26, 25, '前台角色列表', NULL, NULL, 0, 'user_role_list', 1369156610, 1369156609, '前台角色列表', '', '', '', '', 'no', 0, '', NULL),
(43, 0, 'token信息', NULL, NULL, 0, 'vanet_token_list', 1374663337, 1374663335, 'token信息', '', '', '', '', 'no', 0, '', NULL),
(36, 0, '车辆状态', NULL, NULL, 0, 'carstatus_list', 1371214157, 1371214155, '车辆状态', '', '', '', '', 'no', 0, '', NULL),
(35, 0, '车载设备管理', NULL, NULL, 0, 'cardevice_list', 1371173752, 1371171212, 'device', '', '', '', '', 'no', 0, '', NULL),
(45, 0, 'user&car映射表', NULL, NULL, 0, 'vanet_usercar_list', 1374984414, 1374984412, 'user&car映射表', '', '', '', '', 'no', 0, '', NULL),
(38, 0, '用户访问历史管理', NULL, NULL, 0, 'accesslog_list', 1371372567, 1371372563, '用户访问历史管理', '', '', '', '', 'no', 0, '', NULL),
(48, 0, '用户&车辆&NOBD视图', NULL, NULL, 0, 'vanet_v_ucn_list', 1375174941, 1375174939, '用户&车辆&NOBD视图', '', '', '', '', 'no', 0, '', NULL),
(47, 0, '车辆&NOBD视图', NULL, NULL, 0, 'vanet_v_car_nobd_list', 1375171864, 1375171862, '车辆&NOBD视图', '', '', '', '', 'no', 0, '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `end_config`
--

CREATE TABLE IF NOT EXISTS `end_config` (
  `config_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='admin settings' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `end_config`
--

INSERT INTO `end_config` (`config_id`, `category_id`, `name`, `value`, `updated_at`, `type`, `description`, `order_id`) VALUES
(17, 0, 'site_name', '车联网云平台', '2013-06-15 02:41:06', 'text', '站点名字', 0);

-- --------------------------------------------------------

--
-- 表的结构 `end_data`
--

CREATE TABLE IF NOT EXISTS `end_data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `stuid` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `end_data`
--

INSERT INTO `end_data` (`data_id`, `event_id`, `stuid`, `create_time`, `score`) VALUES
(1, 13, '2', 1369840847, 0),
(2, 13, '1', 1369840847, 0),
(3, 14, '1', 1369844383, 0),
(4, 14, '2701309015', 1369844383, 0),
(5, 14, '2701309014', 1369844383, 0),
(6, 14, '2701309013', 1369844383, 0),
(7, 14, '2701309012', 1369844383, 0);

-- --------------------------------------------------------

--
-- 表的结构 `end_data_item`
--

CREATE TABLE IF NOT EXISTS `end_data_item` (
  `data_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `point_id` tinyint(11) unsigned NOT NULL,
  `score` float unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`data_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- 转存表中的数据 `end_data_item`
--

INSERT INTO `end_data_item` (`data_item_id`, `data_id`, `event_id`, `point_id`, `score`, `status`) VALUES
(1, 1, 13, 22, 0, 2),
(2, 1, 13, 23, 0, 2),
(3, 1, 13, 32, 0, 3),
(4, 1, 13, 20, 0, 2),
(5, 1, 13, 31, 0, 3),
(6, 1, 13, 19, 0, 2),
(7, 1, 13, 30, 0, 3),
(8, 1, 13, 34, 0, 3),
(9, 1, 13, 33, 0, 3),
(10, 2, 13, 22, 0, 2),
(11, 2, 13, 23, 0, 2),
(12, 2, 13, 32, 0, 3),
(13, 2, 13, 20, 0, 2),
(14, 2, 13, 31, 0, 3),
(15, 2, 13, 19, 0, 2),
(16, 2, 13, 30, 0, 3),
(17, 2, 13, 34, 0, 3),
(18, 2, 13, 33, 0, 3),
(19, 3, 14, 23, 0, 2),
(20, 3, 14, 33, 0, 3),
(21, 3, 14, 34, 0, 3),
(22, 3, 14, 12, 0, 1),
(23, 3, 14, 3, 0, 0),
(24, 3, 14, 19, 0, 2),
(25, 3, 14, 20, 0, 2),
(26, 3, 14, 31, 0, 3),
(27, 3, 14, 11, 0, 1),
(28, 3, 14, 30, 0, 3),
(29, 3, 14, 32, 0, 3),
(30, 3, 14, 25, 0, 2),
(31, 3, 14, 22, 0, 2),
(32, 3, 14, 16, 0, 1),
(33, 3, 14, 24, 0, 2),
(34, 3, 14, 15, 0, 1),
(35, 3, 14, 10, 0, 1),
(36, 3, 14, 29, 0, 3),
(37, 3, 14, 14, 0, 1),
(38, 4, 14, 23, 0, 2),
(39, 4, 14, 33, 0, 3),
(40, 4, 14, 34, 0, 3),
(41, 4, 14, 12, 0, 1),
(42, 4, 14, 3, 0, 0),
(43, 4, 14, 19, 0, 2),
(44, 4, 14, 20, 0, 2),
(45, 4, 14, 31, 0, 3),
(46, 4, 14, 11, 0, 1),
(47, 4, 14, 30, 0, 3),
(48, 4, 14, 32, 0, 3),
(49, 4, 14, 25, 0, 2),
(50, 4, 14, 22, 0, 2),
(51, 4, 14, 16, 0, 1),
(52, 4, 14, 24, 0, 2),
(53, 4, 14, 15, 0, 1),
(54, 4, 14, 10, 0, 1),
(55, 4, 14, 29, 0, 3),
(56, 4, 14, 14, 0, 1),
(57, 5, 14, 23, 0, 2),
(58, 5, 14, 33, 0, 3),
(59, 5, 14, 34, 0, 3),
(60, 5, 14, 12, 0, 1),
(61, 5, 14, 3, 0, 0),
(62, 5, 14, 19, 0, 2),
(63, 5, 14, 20, 0, 2),
(64, 5, 14, 31, 0, 3),
(65, 5, 14, 11, 0, 1),
(66, 5, 14, 30, 0, 3),
(67, 5, 14, 32, 0, 3),
(68, 5, 14, 25, 0, 2),
(69, 5, 14, 22, 0, 2),
(70, 5, 14, 16, 0, 1),
(71, 5, 14, 24, 0, 2),
(72, 5, 14, 15, 0, 1),
(73, 5, 14, 10, 0, 1),
(74, 5, 14, 29, 0, 3),
(75, 5, 14, 14, 0, 1),
(76, 6, 14, 23, 0, 2),
(77, 6, 14, 33, 0, 3),
(78, 6, 14, 34, 0, 3),
(79, 6, 14, 12, 0, 1),
(80, 6, 14, 3, 0, 0),
(81, 6, 14, 19, 0, 2),
(82, 6, 14, 20, 0, 2),
(83, 6, 14, 31, 0, 3),
(84, 6, 14, 11, 0, 1),
(85, 6, 14, 30, 0, 3),
(86, 6, 14, 32, 0, 3),
(87, 6, 14, 25, 0, 2),
(88, 6, 14, 22, 0, 2),
(89, 6, 14, 16, 0, 1),
(90, 6, 14, 24, 0, 2),
(91, 6, 14, 15, 0, 1),
(92, 6, 14, 10, 0, 1),
(93, 6, 14, 29, 0, 3),
(94, 6, 14, 14, 0, 1),
(95, 7, 14, 23, 0, 2),
(96, 7, 14, 33, 0, 3),
(97, 7, 14, 34, 0, 3),
(98, 7, 14, 12, 0, 1),
(99, 7, 14, 3, 0, 0),
(100, 7, 14, 19, 0, 2),
(101, 7, 14, 20, 0, 2),
(102, 7, 14, 31, 0, 3),
(103, 7, 14, 11, 0, 1),
(104, 7, 14, 30, 0, 3),
(105, 7, 14, 32, 0, 3),
(106, 7, 14, 25, 0, 2),
(107, 7, 14, 22, 0, 2),
(108, 7, 14, 16, 0, 1),
(109, 7, 14, 24, 0, 2),
(110, 7, 14, 15, 0, 1),
(111, 7, 14, 10, 0, 1),
(112, 7, 14, 29, 0, 3),
(113, 7, 14, 14, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `end_log`
--

CREATE TABLE IF NOT EXISTS `end_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu` tinyint(4) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `info` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1119 ;

--
-- 转存表中的数据 `end_log`
--

INSERT INTO `end_log` (`log_id`, `admin_id`, `controller`, `url`, `menu`, `time`, `info`) VALUES
(1, 36, '', '/pingce/admin.php', 0, 1369843876, ''),
(2, 36, 'extension', '/pingce/admin.php?p=extension', 0, 1369843877, ''),
(3, 36, 'extension', '/pingce/admin.php?p=extension&extension=import_student', 0, 1369843878, ''),
(4, 36, 'extension', '/pingce/admin.php?p=extension&extension=import_student&do=import', 0, 1369843986, ''),
(5, 36, 'extension', '/pingce/admin.php?p=extension&extension=import_student', 0, 1369843990, ''),
(6, 36, 'extension', '/pingce/admin.php?p=extension&extension=import_student&do=import', 0, 1369843994, ''),
(7, 36, 'extension', '/pingce/admin.php?p=extension&extension=import_student&do=save', 0, 1369843995, ''),
(8, 36, 'extension', '/pingce/admin.php?p=extension', 0, 1369843997, ''),
(9, 36, 'item', '/pingce/admin.php?p=item', 0, 1369844000, ''),
(10, 36, 'item', 'admin.php?p=item&category_id=1', 1, 1369844001, ' 内容管理&gt;学生数据管理'),
(11, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371046641, ''),
(12, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371046644, ''),
(1040, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=46', 0, 1375171840, ''),
(1041, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1375171862, ''),
(1042, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=47', 0, 1375171862, ''),
(1043, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=47', 0, 1375171864, ''),
(1044, 38, 'category', 'admin.php?p=category', 1, 1375171865, ' 栏目管理'),
(1045, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171865, ''),
(1046, 38, 'admin', 'admin.php?p=admin', 1, 1375171867, ' 管理员'),
(1047, 38, 'rights', 'admin.php?p=rights', 1, 1375171868, '角色/权限'),
(1048, 38, 'rights', 'admin.php?p=rights', 1, 1375171869, '角色/权限'),
(1050, 38, 'rights', 'admin.php?p=rights', 1, 1375171874, '角色/权限'),
(1051, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171875, ''),
(1052, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=47', 0, 1375171877, ''),
(1053, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171879, ''),
(1054, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=47', 0, 1375171881, ''),
(1055, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171883, ''),
(1056, 38, 'admin', 'admin.php?p=admin', 1, 1375171884, ' 管理员'),
(1057, 38, 'rights', 'admin.php?p=rights', 1, 1375171885, '角色/权限'),
(1058, 38, 'rights', 'admin.php?p=rights', 1, 1375171887, '角色/权限'),
(1059, 38, 'rights', 'admin.php?p=rights', 1, 1375171891, '角色/权限'),
(1060, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1375171904, ''),
(1061, 38, 'rights', 'admin.php?p=rights', 1, 1375171906, '角色/权限'),
(35, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371104081, ''),
(36, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371104082, ''),
(1062, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171907, ''),
(1063, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=47', 0, 1375171909, ''),
(1064, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171911, ''),
(1065, 38, 'admin', 'admin.php?p=admin', 1, 1375171947, ' 管理员'),
(1067, 38, 'rights', 'admin.php?p=rights', 1, 1375171950, '角色/权限'),
(1069, 38, 'rights', 'admin.php?p=rights', 1, 1375171956, '角色/权限'),
(1071, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375171959, ' 内容管理&gt;车辆&NOBD视图'),
(1072, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375171964, ''),
(1073, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375171976, ' 内容管理&gt;车辆&NOBD视图'),
(1074, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375171994, ''),
(1075, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172000, ' 内容管理&gt;车辆&NOBD视图'),
(1077, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172007, ' 内容管理&gt;车辆&NOBD视图'),
(1079, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375172042, ''),
(1080, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172045, ' 内容管理&gt;车辆&NOBD视图'),
(1082, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172049, ' 内容管理&gt;车辆&NOBD视图'),
(1083, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172079, ' 内容管理&gt;车辆&NOBD视图'),
(1085, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172131, ''),
(1086, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172134, ' 内容管理&gt;车辆&NOBD视图'),
(1088, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375172202, ''),
(1089, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172206, ' 内容管理&gt;车辆&NOBD视图'),
(1091, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172212, ''),
(1092, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172214, ''),
(1093, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172216, ' 内容管理&gt;车辆&NOBD视图'),
(1096, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172291, ' 内容管理&gt;车辆&NOBD视图'),
(1098, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172295, ' 内容管理&gt;车辆&NOBD视图'),
(1099, 38, 'category', 'admin.php?p=category', 1, 1375174932, ' 栏目管理'),
(1100, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375174932, ''),
(1101, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1375174939, ''),
(1102, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=48', 0, 1375174939, ''),
(1103, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=48', 0, 1375174941, ''),
(1104, 38, 'category', 'admin.php?p=category', 1, 1375174942, ' 栏目管理'),
(1105, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375174942, ''),
(1106, 38, 'admin', 'admin.php?p=admin', 1, 1375174944, ' 管理员'),
(1107, 38, 'rights', 'admin.php?p=rights', 1, 1375174946, '角色/权限'),
(1108, 38, 'rights', 'admin.php?p=rights', 1, 1375174947, '角色/权限'),
(1109, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1375174950, ''),
(1110, 38, 'rights', 'admin.php?p=rights', 1, 1375174953, '角色/权限'),
(1111, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375174954, ''),
(1112, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375174956, ' 内容管理&gt;用户&车辆&NOBD视图'),
(1114, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375175018, ' 内容管理&gt;用户&车辆&NOBD视图'),
(1115, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375175019, ' 内容管理&gt;用户&车辆&NOBD视图'),
(1117, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375184810, ' 内容管理&gt;用户&车辆&NOBD视图'),
(95, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371105736, ' 内容管理&gt;活动数据管理'),
(96, 38, 'config', '/vanet/admin.php?p=config', 0, 1371105741, ''),
(97, 38, 'category', 'admin.php?p=category', 1, 1371105743, ' 栏目管理'),
(98, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371105743, ''),
(99, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get&category_id=30&depth=1', 0, 1371105750, ''),
(100, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=29', 0, 1371105755, ''),
(101, 38, 'item', '/vanet/admin.php?p=item', 0, 1371105757, ''),
(102, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371105759, ''),
(103, 38, 'item', '/vanet/admin.php?p=item', 0, 1371105764, ''),
(104, 38, 'category', 'admin.php?p=category', 1, 1371105783, ' 栏目管理'),
(105, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371105786, ''),
(106, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=30', 0, 1371105791, ''),
(107, 38, 'category', 'admin.php?p=category', 1, 1371105797, ' 栏目管理'),
(108, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get&category_id=30&depth=1', 0, 1371105962, ''),
(109, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get&category_id=22&depth=1', 0, 1371105965, ''),
(110, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get&category_id=2&depth=2', 0, 1371105966, ''),
(111, 38, 'config', '/vanet/admin.php?p=config', 0, 1371105970, ''),
(112, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=1', 0, 1371105983, ''),
(113, 38, 'config', '/vanet/admin.php?p=config', 0, 1371105990, ''),
(114, 38, 'category', 'admin.php?p=category', 1, 1371105995, ' 栏目管理'),
(115, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371105998, ''),
(116, 38, 'config', '/vanet/admin.php?p=config', 0, 1371105999, ''),
(117, 38, 'category', 'admin.php?p=category', 1, 1371106026, ' 栏目管理'),
(118, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106029, ''),
(119, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=category&column=order_id&id=30', 0, 1371106038, ''),
(120, 38, 'category', 'admin.php?p=category', 1, 1371106040, ' 栏目管理'),
(121, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106040, ''),
(122, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106045, ''),
(123, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371106048, ''),
(124, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106052, ''),
(125, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371106056, ' 内容管理&gt;活动数据管理'),
(126, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106059, ' 内容管理&gt;学生数据管理'),
(127, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106062, ' 内容管理&gt;学生数据管理'),
(128, 38, 'category', 'admin.php?p=category', 1, 1371106068, ' 栏目管理'),
(129, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106072, ''),
(130, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=1', 0, 1371106075, ''),
(131, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=1', 0, 1371106084, ''),
(132, 38, 'category', 'admin.php?p=category', 1, 1371106088, ' 栏目管理'),
(133, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106092, ''),
(134, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=1', 0, 1371106106, ''),
(135, 38, 'category', 'admin.php?p=category', 1, 1371106110, ' 栏目管理'),
(136, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=30', 0, 1371106120, ''),
(137, 38, 'category', 'admin.php?p=category', 1, 1371106124, ' 栏目管理'),
(138, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get&category_id=30&depth=1', 0, 1371106133, ''),
(139, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106139, ''),
(140, 38, 'category', 'admin.php?p=category', 1, 1371106144, ' 栏目管理'),
(141, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106144, ''),
(142, 38, 'config', '/vanet/admin.php?p=config', 0, 1371106149, ''),
(143, 38, 'category', 'admin.php?p=category', 1, 1371106153, ' 栏目管理'),
(144, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371106154, ''),
(145, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106172, ''),
(146, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106177, ' 内容管理&gt;用户数据管理'),
(147, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371106183, ''),
(148, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371106217, ''),
(149, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371106305, ''),
(150, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371106313, ''),
(151, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371106568, ''),
(152, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106572, ' 内容管理&gt;用户数据管理'),
(153, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=user&id=2', 0, 1371106585, ''),
(154, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371106587, ''),
(155, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371106607, ''),
(156, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106611, ' 内容管理&gt;用户数据管理'),
(157, 38, 'item', '/vanet/admin.php?p=item&action=view_item&category_id=1&item_id=3', 0, 1371106621, ''),
(158, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106626, ' 内容管理&gt;用户数据管理'),
(159, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=1&item_id=3', 0, 1371106634, ''),
(160, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106639, ' 内容管理&gt;用户数据管理'),
(161, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106644, ''),
(162, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371106750, ''),
(163, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106756, ''),
(164, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371106856, ''),
(165, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106861, ''),
(166, 38, 'admin', 'admin.php?p=admin', 1, 1371106898, ' 管理员'),
(167, 38, 'rights', 'admin.php?p=rights', 1, 1371106902, '角色/权限'),
(168, 38, 'admin', 'admin.php?p=admin', 1, 1371106930, ' 管理员'),
(169, 38, 'item', '/vanet/admin.php?p=item', 0, 1371106935, ''),
(170, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106947, ' 内容管理&gt;用户数据管理'),
(171, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371106970, ''),
(172, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371106975, ' 内容管理&gt;用户数据管理'),
(173, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107050, ' 内容管理&gt;前台角色列表'),
(174, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=26&item_id=8', 0, 1371107058, ''),
(175, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107071, ' 内容管理&gt;前台角色列表'),
(176, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107155, ''),
(177, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107155, ''),
(178, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107175, ' 内容管理&gt;前台角色列表'),
(179, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107195, ' 内容管理&gt;前台角色列表'),
(180, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107237, ''),
(181, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107243, ' 内容管理&gt;前台角色列表'),
(182, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107376, ''),
(183, 38, 'item', 'admin.php?p=item&category_id=26', 1, 1371107411, ' 内容管理&gt;前台角色列表'),
(184, 38, 'category', 'admin.php?p=category', 1, 1371107493, ' 栏目管理'),
(185, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371107499, ''),
(186, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=category&column=url&id=30', 0, 1371107534, ''),
(187, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=30', 0, 1371107540, ''),
(188, 38, 'category', 'admin.php?p=category', 1, 1371107552, ' 栏目管理'),
(189, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371107565, ''),
(190, 38, 'item', '/vanet/admin.php?p=item', 0, 1371107605, ''),
(191, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107615, ''),
(192, 38, 'item', '/vanet/admin.php?p=item', 0, 1371107627, ''),
(193, 38, 'item', '/vanet/admin.php?p=item', 0, 1371107690, ''),
(194, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371107704, ''),
(195, 38, 'item', '/vanet/admin.php?p=item', 0, 1371107715, ''),
(196, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371108019, ''),
(197, 38, 'item', '/vanet/admin.php?p=item', 0, 1371108059, ''),
(198, 38, 'admin', 'admin.php?p=admin', 1, 1371108200, ' 管理员'),
(199, 38, 'admin', 'admin.php?p=admin', 1, 1371108220, ' 管理员'),
(200, 38, 'item', '/vanet/admin.php?p=item', 0, 1371108541, ''),
(201, 38, 'item', '/vanet/admin.php?p=item', 0, 1371108587, ''),
(202, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108587, ' 内容管理&gt;用户数据管理'),
(203, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108610, ' 内容管理&gt;用户数据管理'),
(204, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108787, ' 内容管理&gt;用户数据管理'),
(205, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108789, ' 内容管理&gt;用户数据管理'),
(206, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=1&item_id=3', 0, 1371108806, ''),
(207, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108821, ' 内容管理&gt;用户数据管理'),
(208, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=1&item_id=3', 0, 1371108825, ''),
(209, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108828, ' 内容管理&gt;用户数据管理'),
(210, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108849, ' 内容管理&gt;用户数据管理'),
(211, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371108861, ''),
(212, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108863, ' 内容管理&gt;用户数据管理'),
(213, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371108960, ''),
(214, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371108963, ' 内容管理&gt;用户数据管理'),
(215, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109088, ''),
(216, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371109091, ' 内容管理&gt;用户数据管理'),
(217, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371109096, ' 内容管理&gt;用户数据管理'),
(218, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109097, ''),
(219, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371109100, ' 内容管理&gt;用户数据管理'),
(220, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109131, ''),
(221, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371109134, ' 内容管理&gt;用户数据管理'),
(222, 38, 'category', 'admin.php?p=category', 1, 1371109140, ' 栏目管理'),
(223, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371109141, ''),
(224, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=30', 0, 1371109144, ''),
(225, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=30', 0, 1371109148, ''),
(226, 38, 'category', 'admin.php?p=category', 1, 1371109150, ' 栏目管理'),
(227, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371109151, ''),
(228, 38, 'item', '/vanet/admin.php?p=item', 0, 1371109153, ''),
(229, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109155, ''),
(230, 38, 'item', '/vanet/admin.php?p=item', 0, 1371109158, ''),
(231, 38, 'login', '/vanet/admin.php?p=login&m=logout&module=admin&backurl=index.php', 0, 1371109225, ''),
(232, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371109232, ''),
(233, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371109234, ''),
(234, 38, '', '/vanet/admin.php?', 0, 1371109234, ''),
(235, 38, 'item', '/vanet/admin.php?p=item', 0, 1371109237, ''),
(236, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109240, ''),
(237, 38, 'item', '/vanet/admin.php?p=item', 0, 1371109243, ''),
(238, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371109483, ''),
(239, 38, 'item', '/vanet/admin.php?p=item', 0, 1371109487, ''),
(240, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371139323, ''),
(241, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371139325, ''),
(242, 38, '', '/vanet/admin.php?', 0, 1371139326, ''),
(243, 38, 'item', '/vanet/admin.php?p=item', 0, 1371139328, ''),
(244, 38, 'item', '/vanet/admin.php?p=item&category_id=30', 0, 1371139330, ''),
(245, 38, 'item', '/vanet/admin.php?p=item', 0, 1371139333, ''),
(246, 38, 'category', 'admin.php?p=category', 1, 1371139404, ' 栏目管理'),
(247, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371139405, ''),
(248, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=30', 0, 1371139411, ''),
(249, 38, 'category', 'admin.php?p=category', 1, 1371139425, ' 栏目管理'),
(250, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=30', 0, 1371139428, ''),
(251, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371139453, ''),
(252, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=31', 0, 1371139453, ''),
(253, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=31', 0, 1371139458, ''),
(254, 38, 'category', 'admin.php?p=category', 1, 1371139460, ' 栏目管理'),
(255, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371139460, ''),
(256, 38, 'item', '/vanet/admin.php?p=item', 0, 1371139461, ''),
(257, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371139463, ''),
(258, 38, 'item', '/vanet/admin.php?p=item', 0, 1371139467, ''),
(259, 38, 'category', 'admin.php?p=category', 1, 1371139740, ' 栏目管理'),
(260, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371139741, ''),
(261, 38, 'item', '/vanet/admin.php?p=item', 0, 1371140094, ''),
(262, 38, 'item', 'admin.php?p=item&category_id=28', 1, 1371140096, ' 内容管理&gt;教师数据管理'),
(263, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371140098, ''),
(264, 38, 'item', 'admin.php?p=item&category_id=28', 1, 1371140101, ' 内容管理&gt;教师数据管理'),
(265, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371140102, ''),
(266, 38, 'item', 'admin.php?p=item&category_id=28', 1, 1371140105, ' 内容管理&gt;教师数据管理'),
(267, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371140110, ' 内容管理&gt;用户数据管理'),
(268, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371140114, ''),
(269, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371140116, ' 内容管理&gt;用户数据管理'),
(270, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371140184, ''),
(271, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371140188, ' 内容管理&gt;用户数据管理'),
(272, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371167270, ' 内容管理&gt;活动数据管理'),
(273, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371167276, ''),
(274, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371167279, ' 内容管理&gt;活动数据管理'),
(275, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371167399, ' 内容管理&gt;活动数据管理'),
(276, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371167442, ' 内容管理&gt;用户数据管理'),
(277, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371167444, ''),
(278, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371167447, ' 内容管理&gt;用户数据管理'),
(279, 38, 'item', '/vanet/admin.php?p=item&category_id=31', 0, 1371167561, ''),
(280, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371167565, ' 内容管理&gt;用户数据管理'),
(281, 38, 'category', 'admin.php?p=category', 1, 1371167621, ' 栏目管理'),
(282, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371167622, ''),
(283, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=31', 0, 1371167629, ''),
(284, 38, 'category', 'admin.php?p=category', 1, 1371167676, ' 栏目管理'),
(285, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371167677, ''),
(286, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371167705, ''),
(287, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=32', 0, 1371167705, ''),
(288, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=32', 0, 1371167707, ''),
(289, 38, 'category', 'admin.php?p=category', 1, 1371167710, ' 栏目管理'),
(290, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371167710, ''),
(291, 38, '', '/vanet/admin.php', 0, 1371167714, ''),
(292, 38, 'item', '/vanet/admin.php?p=item', 0, 1371167717, ''),
(293, 38, 'item', '/vanet/admin.php?p=item&category_id=32', 0, 1371167719, ''),
(294, 38, 'item', '/vanet/admin.php?p=item', 0, 1371167723, ''),
(295, 38, 'item', '/vanet/admin.php?p=item', 0, 1371167723, ''),
(296, 38, 'category', 'admin.php?p=category', 1, 1371167995, ' 栏目管理'),
(297, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371167997, ''),
(298, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371168006, ''),
(299, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=33', 0, 1371168006, ''),
(300, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=33', 0, 1371168008, ''),
(301, 38, 'category', 'admin.php?p=category', 1, 1371168011, ' 栏目管理'),
(302, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371168012, ''),
(303, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168014, ''),
(304, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168017, ''),
(305, 38, 'item', '/vanet/admin.php?p=item&category_id=33', 0, 1371168020, ''),
(306, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168024, ''),
(307, 38, 'item', '/vanet/admin.php?p=item&category_id=32', 0, 1371168027, ''),
(308, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168032, ''),
(309, 38, 'item', '/vanet/admin.php?p=item&category_id=33', 0, 1371168035, ''),
(310, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168039, ''),
(311, 38, 'category', 'admin.php?p=category', 1, 1371168050, ' 栏目管理'),
(312, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371168050, ''),
(313, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=33', 0, 1371168058, ''),
(314, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=32', 0, 1371168061, ''),
(315, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371168095, ''),
(316, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=34', 0, 1371168095, ''),
(317, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=34', 0, 1371168100, ''),
(318, 38, 'category', 'admin.php?p=category', 1, 1371168104, ' 栏目管理'),
(319, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371168104, ''),
(320, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168109, ''),
(321, 38, 'item', '/vanet/admin.php?p=item&category_id=34', 0, 1371168114, ''),
(322, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168118, ''),
(323, 38, 'item', '/vanet/admin.php?p=item&category_id=34', 0, 1371168129, ''),
(324, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168134, ''),
(325, 38, 'category', 'admin.php?p=category', 1, 1371168149, ' 栏目管理'),
(326, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371168150, ''),
(327, 38, 'config', '/vanet/admin.php?p=config', 0, 1371168157, ''),
(328, 38, 'extension', '/vanet/admin.php?p=extension', 0, 1371168162, ''),
(329, 38, 'extension', '/vanet/admin.php?p=extension&extension=end_show_log', 0, 1371168188, ''),
(330, 38, '', '/vanet/admin.php', 0, 1371168223, ''),
(331, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168225, ''),
(332, 38, 'category', 'admin.php?p=category', 1, 1371168230, ' 栏目管理'),
(333, 38, 'config', '/vanet/admin.php?p=config', 0, 1371168236, ''),
(334, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168241, ''),
(335, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371168253, ' 内容管理&gt;活动数据管理'),
(336, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371168609, ''),
(337, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371168612, ''),
(338, 38, '', '/vanet/admin.php?', 0, 1371168612, ''),
(339, 38, 'category', 'admin.php?p=category', 1, 1371168615, ' 栏目管理'),
(340, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371168616, ''),
(341, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168616, ''),
(342, 38, 'item', '/vanet/admin.php?p=item&category_id=34', 0, 1371168618, ''),
(343, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168620, ''),
(344, 38, 'item', '/vanet/admin.php?p=item&category_id=34', 0, 1371168622, ''),
(345, 38, 'item', '/vanet/admin.php?p=item', 0, 1371168625, ''),
(346, 38, 'category', '/vanet/admin.php?p=category', 0, 1371171067, ''),
(347, 38, 'category', 'admin.php?p=category', 1, 1371171165, ' 栏目管理'),
(348, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371171166, ''),
(349, 38, 'category', 'admin.php?p=category', 1, 1371171199, ' 栏目管理'),
(350, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371171200, ''),
(351, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371171212, ''),
(352, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=35', 0, 1371171212, ''),
(353, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=35', 0, 1371171214, ''),
(354, 38, 'category', 'admin.php?p=category', 1, 1371171216, ' 栏目管理'),
(355, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371171216, ''),
(356, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171217, ''),
(357, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371171219, ''),
(358, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171222, ''),
(359, 38, 'category', 'admin.php?p=category', 1, 1371171222, ' 栏目管理'),
(360, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171606, ''),
(361, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371171618, ''),
(362, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171621, ''),
(363, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371171666, ''),
(364, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171669, ''),
(365, 38, 'item', '/vanet/admin.php?p=item&category_id=34', 0, 1371171672, ''),
(366, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171674, ''),
(367, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371171676, ''),
(368, 38, 'item', '/vanet/admin.php?p=item', 0, 1371171679, ''),
(369, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173078, ''),
(370, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173082, ''),
(371, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173108, ''),
(372, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173111, ''),
(373, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173153, ''),
(374, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173156, ''),
(375, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173376, ''),
(376, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173379, ''),
(377, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173393, ''),
(378, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173396, ''),
(379, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173426, ''),
(380, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173441, ''),
(381, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371173443, ''),
(382, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173548, ''),
(383, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371173550, ' 内容管理&gt;device'),
(384, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371173553, ' 内容管理&gt;maker'),
(385, 38, 'item', 'admin.php?p=item&category_id=23', 1, 1371173555, ' 内容管理&gt;活动数据管理'),
(386, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371173561, ' 内容管理&gt;用户数据管理'),
(387, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371173617, ' 内容管理&gt;maker'),
(388, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=34&item_id=1', 0, 1371173625, ''),
(389, 38, 'category', 'admin.php?p=category', 1, 1371173709, ' 栏目管理'),
(390, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371173709, ''),
(391, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=category&column=name&id=34', 0, 1371173733, ''),
(392, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=category&column=name&id=35', 0, 1371173752, ''),
(393, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=category&column=name&id=34', 0, 1371173760, ''),
(394, 38, 'item', '/vanet/admin.php?p=item', 0, 1371173770, ''),
(395, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371173772, ' 内容管理&gt;制造商管理'),
(396, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371173776, ' 内容管理&gt;车载设备管理'),
(397, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371174916, ''),
(398, 38, 'item', '/vanet/admin.php?p=item&category_id=35', 0, 1371174958, ''),
(399, 38, 'rights', 'admin.php?p=rights', 1, 1371175333, '角色/权限'),
(400, 38, 'rights', 'admin.php?p=rights', 1, 1371175340, '角色/权限'),
(401, 38, 'rights', '/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1371175420, ''),
(402, 38, 'rights', 'admin.php?p=rights', 1, 1371175450, '角色/权限'),
(403, 38, 'rights', '/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1371175456, ''),
(404, 38, 'rights', 'admin.php?p=rights', 1, 1371175460, '角色/权限'),
(405, 38, 'item', '/vanet/admin.php?p=item', 0, 1371175473, ''),
(406, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371175476, ' 内容管理&gt;制造商管理'),
(407, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371175481, ' 内容管理&gt;车载设备管理'),
(408, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371175485, ' 内容管理&gt;制造商管理'),
(409, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371175501, ' 内容管理&gt;制造商管理'),
(410, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371175504, ' 内容管理&gt;车载设备管理'),
(411, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371175571, ' 内容管理&gt;制造商管理'),
(412, 38, 'item', '/vanet/admin.php?p=item&action=view_item&category_id=34&item_id=1', 0, 1371175576, ''),
(413, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371175579, ' 内容管理&gt;制造商管理'),
(414, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=34&item_id=1', 0, 1371175583, ''),
(415, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371175603, ' 内容管理&gt;车载设备管理'),
(416, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=35', 0, 1371175829, ''),
(417, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371213891, ''),
(418, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371213893, ''),
(419, 38, '', '/vanet/admin.php?', 0, 1371213893, ''),
(420, 38, 'category', 'admin.php?p=category', 1, 1371213896, ' 栏目管理'),
(421, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371213896, ''),
(422, 38, 'item', '/vanet/admin.php?p=item', 0, 1371213971, ''),
(423, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371213972, ' 内容管理&gt;制造商管理'),
(424, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371213974, ' 内容管理&gt;车载设备管理'),
(425, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371213975, ' 内容管理&gt;制造商管理'),
(426, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371213977, ' 内容管理&gt;车载设备管理'),
(427, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=35', 0, 1371213978, ''),
(428, 38, 'category', 'admin.php?p=category', 1, 1371213986, ' 栏目管理'),
(429, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371213986, ''),
(430, 38, 'category', 'admin.php?p=category', 1, 1371214034, ' 栏目管理'),
(431, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371214034, ''),
(432, 38, 'category', '/vanet/admin.php?p=category', 0, 1371214116, ''),
(433, 38, 'category', 'admin.php?p=category', 1, 1371214139, ' 栏目管理'),
(434, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371214140, ''),
(435, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371214155, ''),
(436, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=36', 0, 1371214155, ''),
(437, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=36', 0, 1371214157, ''),
(438, 38, 'category', 'admin.php?p=category', 1, 1371214159, ' 栏目管理'),
(439, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371214159, ''),
(440, 38, 'admin', 'admin.php?p=admin', 1, 1371214160, ' 管理员'),
(441, 38, 'rights', 'admin.php?p=rights', 1, 1371214167, '角色/权限'),
(442, 38, 'rights', 'admin.php?p=rights', 1, 1371214169, '角色/权限'),
(443, 38, 'rights', '/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1371214175, ''),
(444, 38, 'rights', 'admin.php?p=rights', 1, 1371214178, '角色/权限'),
(445, 38, 'item', '/vanet/admin.php?p=item', 0, 1371214180, ''),
(446, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371214182, ' 内容管理&gt;车辆状态'),
(447, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=36', 0, 1371214186, ''),
(448, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=36', 0, 1371214225, ''),
(449, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371214229, ' 内容管理&gt;车辆状态'),
(450, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=36', 0, 1371214236, ''),
(451, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371214240, ' 内容管理&gt;车辆状态'),
(452, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371214264, ' 内容管理&gt;车辆状态'),
(453, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371214266, ' 内容管理&gt;车载设备管理'),
(454, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371214269, ' 内容管理&gt;制造商管理'),
(455, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371214271, ' 内容管理&gt;车辆状态'),
(456, 38, '', '/vanet/admin.php', 0, 1371214470, ''),
(457, 38, 'admin', 'admin.php?p=admin', 1, 1371214473, ' 管理员'),
(458, 38, 'config', '/vanet/admin.php?p=config', 0, 1371214474, ''),
(459, 38, 'category', 'admin.php?p=category', 1, 1371214476, ' 栏目管理'),
(460, 38, 'category', 'admin.php?p=category', 1, 1371214477, ' 栏目管理'),
(461, 38, 'config', '/vanet/admin.php?p=config', 0, 1371214479, ''),
(462, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=1', 0, 1371214488, ''),
(463, 38, 'category', 'admin.php?p=category', 1, 1371214499, ' 栏目管理'),
(464, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371214500, ''),
(465, 38, 'config', '/vanet/admin.php?p=config', 0, 1371214501, ''),
(466, 38, 'config', '/vanet/admin.php?p=config', 0, 1371214501, ''),
(467, 38, 'config', '/vanet/admin.php?p=config', 0, 1371214503, ''),
(468, 38, 'admin', 'admin.php?p=admin', 1, 1371214507, ' 管理员'),
(469, 38, 'extension', '/vanet/admin.php?p=extension', 0, 1371214509, ''),
(470, 38, 'extension', '/vanet/admin.php?p=extension&extension=end_show_log', 0, 1371214515, ''),
(471, 38, 'extension', '/vanet/admin.php?p=extension', 0, 1371214519, ''),
(472, 38, 'extension', '/vanet/admin.php?p=extension&extension=import_student', 0, 1371214521, ''),
(473, 38, 'extension', '/vanet/admin.php?p=extension', 0, 1371214524, ''),
(474, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371281966, ''),
(475, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371281967, ''),
(476, 38, '', '/vanet/admin.php?', 0, 1371281967, ''),
(477, 38, 'item', '/vanet/admin.php?p=item', 0, 1371281973, ''),
(478, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371281976, ' 内容管理&gt;车辆状态'),
(479, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=36', 0, 1371281978, ''),
(480, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371281983, ' 内容管理&gt;车辆状态'),
(481, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371281985, ' 内容管理&gt;车载设备管理'),
(482, 38, 'item', '/vanet/admin.php?p=item&category_id=28', 0, 1371282813, ''),
(483, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371282818, ' 内容管理&gt;车载设备管理'),
(484, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371282821, ' 内容管理&gt;制造商管理'),
(485, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371282823, ' 内容管理&gt;车载设备管理'),
(486, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371282824, ' 内容管理&gt;车辆状态'),
(487, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371282825, ' 内容管理&gt;车载设备管理'),
(488, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371282826, ' 内容管理&gt;车载设备管理'),
(489, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371282827, ' 内容管理&gt;制造商管理'),
(490, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371286021, ' 内容管理&gt;车载设备管理'),
(491, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371286023, ' 内容管理&gt;制造商管理'),
(492, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371286024, ' 内容管理&gt;车辆状态'),
(493, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371286026, ' 内容管理&gt;车载设备管理'),
(494, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371286027, ' 内容管理&gt;制造商管理'),
(495, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371286029, ' 内容管理&gt;车载设备管理'),
(496, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371286030, ' 内容管理&gt;制造商管理'),
(497, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371286032, ' 内容管理&gt;车载设备管理'),
(498, 38, 'category', 'admin.php?p=category', 1, 1371288066, ' 栏目管理'),
(499, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371288067, ''),
(500, 38, 'category', 'admin.php?p=category', 1, 1371288083, ' 栏目管理'),
(501, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371288084, ''),
(502, 38, 'item', '/vanet/admin.php?p=item', 0, 1371288090, ''),
(503, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371288093, ' 内容管理&gt;用户数据管理'),
(504, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371288095, ''),
(505, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371288110, ''),
(506, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371288112, ' 内容管理&gt;用户数据管理'),
(507, 38, 'admin', 'admin.php?p=admin', 1, 1371289087, ' 管理员'),
(508, 38, 'config', '/vanet/admin.php?p=config', 0, 1371289089, ''),
(509, 38, 'config', '/vanet/admin.php?m=new_config&p=config', 0, 1371289114, ''),
(510, 38, 'config', '/vanet/admin.php?p=config', 0, 1371289117, ''),
(511, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=config&id=1', 0, 1371289136, ''),
(512, 38, 'ajax', '/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=2', 0, 1371289147, ''),
(513, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=config&id=2', 0, 1371289151, ''),
(514, 38, 'config', '/vanet/admin.php?m=new_config&p=config', 0, 1371289164, ''),
(515, 38, 'config', '/vanet/admin.php?p=config', 0, 1371289167, ''),
(516, 38, 'config', '/vanet/admin.php?p=config', 0, 1371289177, ''),
(517, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=config&id=1', 0, 1371289184, ''),
(518, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=config&id=2', 0, 1371289185, ''),
(519, 38, 'config', '/vanet/admin.php?p=config', 0, 1371289188, ''),
(520, 38, 'config', '/vanet/admin.php?p=config', 0, 1371292749, ''),
(521, 38, 'config', '/vanet/admin.php?p=config', 0, 1371292869, ''),
(522, 38, '', '/vanet/admin.php', 0, 1371292986, ''),
(523, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371308552, ''),
(524, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371308556, ''),
(525, 38, '', '/vanet/admin.php?', 0, 1371308556, ''),
(526, 38, 'item', '/vanet/admin.php?p=item', 0, 1371308558, ''),
(527, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371308561, ' 内容管理&gt;车载设备管理'),
(528, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371308563, ' 内容管理&gt;车辆状态'),
(529, 38, 'category', 'admin.php?p=category', 1, 1371308660, ' 栏目管理'),
(530, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371308661, ''),
(531, 38, 'config', '/vanet/admin.php?p=config', 0, 1371308662, ''),
(532, 38, 'admin', 'admin.php?p=admin', 1, 1371308670, ' 管理员'),
(533, 38, 'extension', '/vanet/admin.php?p=extension', 0, 1371308672, ''),
(534, 38, '', '/vanet/admin.php', 0, 1371308675, ''),
(535, 38, '', '/vanet/admin.php', 0, 1371310843, ''),
(536, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371351419, ''),
(537, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371351420, ''),
(538, 38, '', '/vanet/admin.php?', 0, 1371351420, ''),
(539, 38, 'item', '/vanet/admin.php?p=item', 0, 1371351422, ''),
(540, 38, 'item', '/vanet/admin.php?p=item', 0, 1371351438, ''),
(541, 38, 'admin', 'admin.php?p=admin', 1, 1371351441, ' 管理员'),
(542, 38, 'rights', 'admin.php?p=rights', 1, 1371351442, '角色/权限'),
(543, 38, 'rights', 'admin.php?p=rights', 1, 1371351444, '角色/权限'),
(544, 38, 'rights', '/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1371351449, ''),
(545, 38, 'rights', 'admin.php?p=rights', 1, 1371351452, '角色/权限'),
(546, 38, 'category', 'admin.php?p=category', 1, 1371351453, ' 栏目管理'),
(547, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351454, ''),
(548, 38, 'category', 'admin.php?p=category', 1, 1371351544, ' 栏目管理'),
(549, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351544, ''),
(550, 38, 'category', 'admin.php?p=category', 1, 1371351562, ' 栏目管理'),
(551, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351563, ''),
(552, 38, 'admin', 'admin.php?p=admin', 1, 1371351570, ' 管理员'),
(553, 38, 'rights', 'admin.php?p=rights', 1, 1371351572, '角色/权限'),
(554, 38, 'rights', 'admin.php?p=rights', 1, 1371351574, '角色/权限'),
(555, 38, 'category', 'admin.php?p=category', 1, 1371351580, ' 栏目管理'),
(556, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351581, ''),
(557, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=category&id=23', 0, 1371351600, ''),
(558, 38, 'category', 'admin.php?p=category', 1, 1371351641, ' 栏目管理'),
(559, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351642, ''),
(560, 38, 'category', 'admin.php?p=category', 1, 1371351663, ' 栏目管理'),
(561, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351663, ''),
(562, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371351677, ''),
(563, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=37', 0, 1371351677, ''),
(564, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=37', 0, 1371351679, ''),
(565, 38, 'category', 'admin.php?p=category', 1, 1371351681, ' 栏目管理'),
(566, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371351681, ''),
(567, 38, 'item', '/vanet/admin.php?p=item', 0, 1371351682, ''),
(568, 38, 'item', 'admin.php?p=item&category_id=37', 1, 1371351683, ' 内容管理&gt;用户/设备交互管理'),
(569, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=37', 0, 1371351686, ''),
(570, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371351699, ' 内容管理&gt;车载设备管理'),
(571, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371351702, ' 内容管理&gt;车辆状态'),
(572, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371351703, ' 内容管理&gt;车载设备管理'),
(573, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371351705, ' 内容管理&gt;车辆状态'),
(574, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371351707, ' 内容管理&gt;车载设备管理'),
(575, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=35', 0, 1371351708, ''),
(576, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=35', 0, 1371351720, ''),
(577, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371351722, ' 内容管理&gt;车载设备管理'),
(578, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=35&item_id=1', 0, 1371351728, ''),
(579, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371351733, ' 内容管理&gt;车辆状态'),
(580, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371351764, ' 内容管理&gt;用户数据管理'),
(581, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371351768, ''),
(582, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371351782, ''),
(583, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371351787, ' 内容管理&gt;用户数据管理'),
(584, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371368722, ' 内容管理&gt;用户数据管理'),
(585, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371368725, ''),
(586, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371368735, ''),
(587, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371368737, ' 内容管理&gt;用户数据管理'),
(588, 38, '', '/vanet/admin.php', 0, 1371368989, ''),
(589, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371369030, ''),
(590, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371369039, ''),
(591, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371369042, ' 内容管理&gt;用户数据管理'),
(592, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371369043, ' 内容管理&gt;用户数据管理'),
(593, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371371301, ''),
(594, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371371313, ' 内容管理&gt;制造商管理'),
(595, 38, 'admin', 'admin.php?p=admin', 1, 1371372519, ' 管理员'),
(596, 38, 'category', 'admin.php?p=category', 1, 1371372522, ' 栏目管理');
INSERT INTO `end_log` (`log_id`, `admin_id`, `controller`, `url`, `menu`, `time`, `info`) VALUES
(597, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371372523, ''),
(598, 38, 'admin', 'admin.php?p=admin', 1, 1371372526, ' 管理员'),
(599, 38, 'rights', 'admin.php?p=rights', 1, 1371372531, '角色/权限'),
(600, 38, 'rights', 'admin.php?p=rights', 1, 1371372535, '角色/权限'),
(601, 38, 'rights', '/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1371372540, ''),
(602, 38, 'rights', 'admin.php?p=rights', 1, 1371372544, '角色/权限'),
(603, 38, 'category', 'admin.php?p=category', 1, 1371372546, ' 栏目管理'),
(604, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371372547, ''),
(605, 38, 'category', '/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1371372563, ''),
(606, 38, 'category', '/vanet/admin.php?p=category&action=edit_category&category_id=38', 0, 1371372563, ''),
(607, 38, 'category', '/vanet/admin.php?m=edit_category&p=category&category_id=38', 0, 1371372567, ''),
(608, 38, 'category', 'admin.php?p=category', 1, 1371372570, ' 栏目管理'),
(609, 38, 'category', '/vanet/admin.php?p=category&action=ajax_get', 0, 1371372571, ''),
(610, 38, 'item', '/vanet/admin.php?p=item', 0, 1371372574, ''),
(611, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371372579, ' 内容管理&gt;用户访问历史管理'),
(612, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371373342, ' 内容管理&gt;用户数据管理'),
(613, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=1', 0, 1371373347, ''),
(614, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=1', 0, 1371373361, ''),
(615, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371373364, ' 内容管理&gt;用户数据管理'),
(616, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371373894, ' 内容管理&gt;用户访问历史管理'),
(617, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371373971, ' 内容管理&gt;用户访问历史管理'),
(618, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371373993, ' 内容管理&gt;用户访问历史管理'),
(619, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1371375409, ' 内容管理&gt;用户数据管理'),
(620, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371378932, ' 内容管理&gt;制造商管理'),
(621, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=34', 0, 1371378936, ''),
(622, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=34', 0, 1371378967, ''),
(623, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371378970, ' 内容管理&gt;制造商管理'),
(624, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371379089, ' 内容管理&gt;车载设备管理'),
(625, 38, 'item', '/vanet/admin.php?p=item&action=new_item&category_id=35', 0, 1371379095, ''),
(626, 38, 'item', '/vanet/admin.php?m=new_item&p=item&category_id=35', 0, 1371379110, ''),
(627, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371379114, ' 内容管理&gt;车载设备管理'),
(628, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371379131, ' 内容管理&gt;车载设备管理'),
(629, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371379174, ' 内容管理&gt;车载设备管理'),
(630, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371379208, ' 内容管理&gt;车载设备管理'),
(631, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371380389, ' 内容管理&gt;制造商管理'),
(632, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371381039, ' 内容管理&gt;制造商管理'),
(633, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371381350, ' 内容管理&gt;车载设备管理'),
(634, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371381364, ' 内容管理&gt;车载设备管理'),
(635, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=35&item_id=1', 0, 1371381373, ''),
(636, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371383319, ' 内容管理&gt;制造商管理'),
(637, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=34&item_id=1', 0, 1371383328, ''),
(638, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371383434, ' 内容管理&gt;制造商管理'),
(639, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=34&item_id=1', 0, 1371383439, ''),
(640, 38, 'item', '/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=34', 0, 1371383452, ''),
(641, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371383458, ' 内容管理&gt;制造商管理'),
(642, 38, 'item', '/vanet/admin.php?p=item&action=edit_item&category_id=34&item_id=1', 0, 1371383469, ''),
(643, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371383474, ' 内容管理&gt;制造商管理'),
(644, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371384406, ' 内容管理&gt;用户访问历史管理'),
(645, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371396757, ' 内容管理&gt;用户访问历史管理'),
(646, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371396911, ' 内容管理&gt;用户访问历史管理'),
(647, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1371397272, ' 内容管理&gt;用户访问历史管理'),
(648, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371453907, ''),
(649, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371453912, ''),
(650, 38, '', '/vanet/admin.php?', 0, 1371453912, ''),
(651, 38, 'item', '/vanet/admin.php?p=item', 0, 1371453915, ''),
(652, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371453919, ' 内容管理&gt;车载设备管理'),
(653, 38, 'ajax', '/vanet/admin.php?p=ajax&m=delete&table=cardevice&id=2', 0, 1371454035, ''),
(654, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371457715, ' 内容管理&gt;车载设备管理'),
(655, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1371457844, ' 内容管理&gt;车载设备管理'),
(656, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371458361, ' 内容管理&gt;车辆状态'),
(657, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371458401, ' 内容管理&gt;车辆状态'),
(658, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371458511, ' 内容管理&gt;车辆状态'),
(659, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371458648, ' 内容管理&gt;车辆状态'),
(660, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1371458708, ' 内容管理&gt;车辆状态'),
(661, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1372513878, ''),
(662, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374333654, ''),
(663, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1374333656, ''),
(664, 38, '', '/vanet/vanet/admin.php?', 0, 1374333656, ''),
(665, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374333659, ''),
(666, 38, 'category', 'admin.php?p=category', 1, 1374333660, ' 栏目管理'),
(667, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374333661, ''),
(668, 38, 'category', 'admin.php?p=category', 1, 1374333726, ' 栏目管理'),
(669, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374333727, ''),
(670, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374333729, ''),
(671, 38, '', '/vanet/vanet/admin.php', 0, 1374375043, ''),
(672, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374375050, ''),
(673, 38, 'category', 'admin.php?p=category', 1, 1374375154, ' 栏目管理'),
(674, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374375154, ''),
(675, 38, 'admin', 'admin.php?p=admin', 1, 1374375160, ' 管理员'),
(676, 38, 'rights', 'admin.php?p=rights', 1, 1374375163, '角色/权限'),
(677, 38, 'admin', 'admin.php?p=admin', 1, 1374375166, ' 管理员'),
(678, 38, 'rights', 'admin.php?p=rights', 1, 1374375168, '角色/权限'),
(679, 38, 'rights', 'admin.php?p=rights', 1, 1374375169, '角色/权限'),
(680, 38, '', '/vanet/vanet/admin.php', 0, 1374375177, ''),
(681, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374382066, ''),
(682, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374382098, ''),
(683, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393401, ''),
(684, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393460, ''),
(685, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1374393462, ' 内容管理&gt;用户数据管理'),
(686, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=2', 0, 1374393465, ''),
(687, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1374393469, ' 内容管理&gt;用户数据管理'),
(688, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=2', 0, 1374393472, ''),
(689, 38, 'item', 'admin.php?p=item&category_id=1', 1, 1374393480, ' 内容管理&gt;用户数据管理'),
(690, 38, 'category', 'admin.php?p=category', 1, 1374393519, ' 栏目管理'),
(691, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374393520, ''),
(692, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=22&depth=1', 0, 1374393522, ''),
(693, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=22', 0, 1374393530, ''),
(694, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=category&column=system&id=2', 0, 1374393535, ''),
(695, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=2&depth=2', 0, 1374393540, ''),
(696, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=3&depth=2', 0, 1374393541, ''),
(697, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=4&depth=2', 0, 1374393542, ''),
(698, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=5&depth=2', 0, 1374393543, ''),
(699, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=6&depth=2', 0, 1374393543, ''),
(700, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=7&depth=2', 0, 1374393544, ''),
(701, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=8&depth=2', 0, 1374393544, ''),
(702, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=10&depth=2', 0, 1374393546, ''),
(703, 38, 'category', 'admin.php?p=category', 1, 1374393547, ' 栏目管理'),
(704, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374393547, ''),
(705, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=25&depth=1', 0, 1374393550, ''),
(706, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=1&depth=1', 0, 1374393554, ''),
(707, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=28', 0, 1374393564, ''),
(708, 38, 'category', 'admin.php?p=category', 1, 1374393569, ' 栏目管理'),
(709, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374393570, ''),
(710, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393570, ''),
(711, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=26', 0, 1374393574, ''),
(712, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393580, ''),
(713, 38, 'category', 'admin.php?p=category', 1, 1374393584, ' 栏目管理'),
(714, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374393584, ''),
(715, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=25', 0, 1374393588, ''),
(716, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393590, ''),
(717, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=34', 0, 1374393593, ''),
(718, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374393596, ''),
(719, 38, 'category', 'admin.php?p=category', 1, 1374393598, ' 栏目管理'),
(720, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374393598, ''),
(721, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=34', 0, 1374393602, ''),
(722, 38, 'category', 'admin.php?p=category', 1, 1374409271, ' 栏目管理'),
(723, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374409271, ''),
(724, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374410219, ''),
(725, 38, 'admin', 'admin.php?p=admin', 1, 1374410223, ' 管理员'),
(726, 38, 'rights', 'admin.php?p=rights', 1, 1374410227, '角色/权限'),
(727, 38, 'admin', 'admin.php?p=admin', 1, 1374410232, ' 管理员'),
(728, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374410242, ''),
(729, 38, 'category', 'admin.php?p=category', 1, 1374410312, ' 栏目管理'),
(730, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374410313, ''),
(731, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=36&depth=1', 0, 1374410326, ''),
(732, 38, '', '/vanet/vanet/admin.php', 0, 1374497267, ''),
(733, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374497274, ''),
(734, 38, '', '/vanet/vanet/admin.php', 0, 1374497276, ''),
(735, 38, 'category', 'admin.php?p=category', 1, 1374497279, ' 栏目管理'),
(736, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374497280, ''),
(737, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=1&depth=1', 0, 1374497283, ''),
(738, 38, 'admin', 'admin.php?p=admin', 1, 1374497297, ' 管理员'),
(739, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374497298, ''),
(740, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374497303, ''),
(741, 38, 'admin', 'admin.php?p=admin', 1, 1374497307, ' 管理员'),
(742, 38, '', '/vanet/vanet/admin.php', 0, 1374497309, ''),
(743, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=26', 0, 1374497311, ''),
(744, 38, '', '/vanet/vanet/admin.php', 0, 1374497313, ''),
(745, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=38', 0, 1374497315, ''),
(746, 38, '', '/vanet/vanet/admin.php', 0, 1374497317, ''),
(747, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=23', 0, 1374497319, ''),
(748, 38, '', '/vanet/vanet/admin.php', 0, 1374497320, ''),
(749, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374497322, ''),
(750, 38, '', '/vanet/vanet/admin.php', 0, 1374593351, ''),
(751, 38, '', '/vanet/vanet/admin.php', 0, 1374656906, ''),
(752, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374656915, ''),
(753, 38, '', '/vanet/vanet/admin.php', 0, 1374656917, ''),
(754, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374656922, ''),
(755, 38, 'category', 'admin.php?p=category', 1, 1374656926, ' 栏目管理'),
(756, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656926, ''),
(757, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374656927, ''),
(758, 38, 'category', 'admin.php?p=category', 1, 1374656928, ' 栏目管理'),
(759, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656928, ''),
(760, 38, 'admin', 'admin.php?p=admin', 1, 1374656933, ' 管理员'),
(761, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374656935, ''),
(762, 38, 'category', 'admin.php?p=category', 1, 1374656937, ' 栏目管理'),
(763, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656937, ''),
(764, 38, 'category', 'admin.php?p=category', 1, 1374660427, ' 栏目管理'),
(765, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660428, ''),
(766, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374660439, ''),
(767, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=39', 0, 1374660439, ''),
(768, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=39', 0, 1374660549, ''),
(769, 38, 'category', 'admin.php?p=category', 1, 1374660554, ' 栏目管理'),
(770, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660554, ''),
(771, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374660564, ''),
(772, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=40', 0, 1374660564, ''),
(773, 38, 'category', 'admin.php?p=category', 1, 1374660587, ' 栏目管理'),
(774, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660587, ''),
(775, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374660600, ''),
(776, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=41', 0, 1374660600, ''),
(777, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=41', 0, 1374660604, ''),
(778, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=41', 0, 1374660742, ''),
(779, 38, 'category', 'admin.php?p=category', 1, 1374660744, ' 栏目管理'),
(780, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660744, ''),
(781, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=39', 0, 1374660751, ''),
(782, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=40', 0, 1374660753, ''),
(783, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=41', 0, 1374660757, ''),
(784, 38, 'category', 'admin.php?p=category', 1, 1374660861, ' 栏目管理'),
(785, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660862, ''),
(786, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374660874, ''),
(787, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=42', 0, 1374660874, ''),
(788, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=42', 0, 1374660877, ''),
(789, 38, 'category', 'admin.php?p=category', 1, 1374660878, ' 栏目管理'),
(790, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660878, ''),
(791, 38, 'admin', 'admin.php?p=admin', 1, 1374660880, ' 管理员'),
(792, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374660885, ''),
(793, 38, 'admin', 'admin.php?p=admin', 1, 1374660886, ' 管理员'),
(794, 38, 'category', 'admin.php?p=category', 1, 1374660889, ' 栏目管理'),
(795, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660889, ''),
(796, 38, 'admin', 'admin.php?p=admin', 1, 1374660890, ' 管理员'),
(797, 38, 'admin', 'admin.php?p=admin', 1, 1374660895, ' 管理员'),
(798, 38, 'admin', 'admin.php?p=admin', 1, 1374660898, ' 管理员'),
(799, 38, 'admin', 'admin.php?p=admin', 1, 1374660899, ' 管理员'),
(800, 38, 'rights', 'admin.php?p=rights', 1, 1374660906, '角色/权限'),
(801, 38, 'rights', 'admin.php?p=rights', 1, 1374660908, '角色/权限'),
(802, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374660930, ''),
(803, 38, 'rights', 'admin.php?p=rights', 1, 1374660932, '角色/权限'),
(804, 38, 'category', 'admin.php?p=category', 1, 1374660934, ' 栏目管理'),
(805, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374660934, ''),
(806, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374660936, ''),
(807, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=42', 0, 1374660937, ''),
(808, 38, '', '/vanet/vanet/admin.php', 0, 1374662386, ''),
(809, 38, '', '/vanet/vanet/admin.php', 0, 1374662386, ''),
(810, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374663318, ''),
(811, 38, 'category', 'admin.php?p=category', 1, 1374663320, ' 栏目管理'),
(812, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663321, ''),
(813, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374663335, ''),
(814, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=43', 0, 1374663335, ''),
(815, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=43', 0, 1374663336, ''),
(816, 38, 'category', 'admin.php?p=category', 1, 1374663338, ' 栏目管理'),
(817, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663338, ''),
(818, 38, 'admin', 'admin.php?p=admin', 1, 1374663339, ' 管理员'),
(819, 38, 'rights', 'admin.php?p=rights', 1, 1374663341, '角色/权限'),
(820, 38, 'rights', 'admin.php?p=rights', 1, 1374663343, '角色/权限'),
(821, 38, 'admin', 'admin.php?p=admin', 1, 1374663384, ' 管理员'),
(822, 38, 'admin', 'admin.php?p=admin', 1, 1374663408, ' 管理员'),
(823, 38, 'admin', 'admin.php?p=admin', 1, 1374663411, ' 管理员'),
(824, 38, 'rights', 'admin.php?p=rights', 1, 1374663412, '角色/权限'),
(825, 38, 'rights', 'admin.php?p=rights', 1, 1374663414, '角色/权限'),
(826, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663418, ''),
(827, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=43', 0, 1374663420, ''),
(828, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663422, ''),
(829, 38, 'category', 'admin.php?p=category', 1, 1374663423, ' 栏目管理'),
(830, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663423, ''),
(831, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374663425, ''),
(832, 38, 'admin', 'admin.php?p=admin', 1, 1374663426, ' 管理员'),
(833, 38, 'rights', 'admin.php?p=rights', 1, 1374663428, '角色/权限'),
(834, 38, 'rights', 'admin.php?p=rights', 1, 1374663431, '角色/权限'),
(835, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374663450, ''),
(836, 38, 'rights', 'admin.php?p=rights', 1, 1374663452, '角色/权限'),
(837, 38, 'category', 'admin.php?p=category', 1, 1374663454, ' 栏目管理'),
(838, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663454, ''),
(839, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663455, ''),
(840, 38, 'category', 'admin.php?p=category', 1, 1374663460, ' 栏目管理'),
(841, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663461, ''),
(842, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663465, ''),
(843, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374663466, ''),
(844, 38, 'category', 'admin.php?p=category', 1, 1374663468, ' 栏目管理'),
(845, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663468, ''),
(846, 38, 'category', 'admin.php?p=category', 1, 1374663591, ' 栏目管理'),
(847, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663592, ''),
(848, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=43&depth=1', 0, 1374663593, ''),
(849, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=43', 0, 1374663597, ''),
(850, 38, 'category', 'admin.php?p=category', 1, 1374663602, ' 栏目管理'),
(851, 38, 'admin', 'admin.php?p=admin', 1, 1374663619, ' 管理员'),
(852, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374663621, ''),
(853, 38, 'admin', 'admin.php?p=admin', 1, 1374663623, ' 管理员'),
(854, 38, 'rights', 'admin.php?p=rights', 1, 1374663624, '角色/权限'),
(855, 38, 'rights', 'admin.php?p=rights', 1, 1374663626, '角色/权限'),
(856, 38, 'admin', 'admin.php?p=admin', 1, 1374663638, ' 管理员'),
(857, 38, 'admin', 'admin.php?p=admin', 1, 1374663666, ' 管理员'),
(858, 38, 'rights', 'admin.php?p=rights', 1, 1374663668, '角色/权限'),
(859, 38, 'rights', 'admin.php?p=rights', 1, 1374663669, '角色/权限'),
(860, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374663675, ''),
(861, 38, 'rights', 'admin.php?p=rights', 1, 1374663677, '角色/权限'),
(862, 38, 'category', 'admin.php?p=category', 1, 1374663678, ' 栏目管理'),
(863, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663678, ''),
(864, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663679, ''),
(865, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374663680, ' 内容管理&gt;token信息'),
(866, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1374663682, ''),
(867, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374663696, ' 内容管理&gt;token信息'),
(868, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663709, ' 内容管理&gt;车辆信息'),
(869, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374663710, ' 内容管理&gt;token信息'),
(870, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663712, ' 内容管理&gt;车辆信息'),
(871, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=38', 0, 1374663713, ''),
(872, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663716, ' 内容管理&gt;车辆信息'),
(873, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374663720, ' 内容管理&gt;token信息'),
(874, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663720, ' 内容管理&gt;车辆信息'),
(875, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374663721, ' 内容管理&gt;token信息'),
(876, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374663723, ''),
(877, 38, 'category', 'admin.php?p=category', 1, 1374663724, ' 栏目管理'),
(878, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663725, ''),
(879, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=38&depth=1', 0, 1374663727, ''),
(880, 38, 'category', 'admin.php?p=category', 1, 1374663748, ' 栏目管理'),
(881, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374663748, ''),
(882, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374663754, ''),
(883, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663755, ' 内容管理&gt;车辆信息'),
(884, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=42', 0, 1374663757, ''),
(885, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374663761, ' 内容管理&gt;车辆信息'),
(886, 38, 'login', '/vanet/vanet/admin.php?p=login&m=logout&module=admin&backurl=index.php', 0, 1374674008, ''),
(887, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374739650, ''),
(888, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1374739654, ''),
(889, 38, '', '/vanet/vanet/admin.php?', 0, 1374739654, ''),
(890, 38, 'category', 'admin.php?p=category', 1, 1374739657, ' 栏目管理'),
(891, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374739658, ''),
(892, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374739658, ''),
(893, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=1', 0, 1374739660, ''),
(894, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374739662, ''),
(895, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=37', 0, 1374739667, ''),
(896, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374739668, ''),
(897, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374739670, ' 内容管理&gt;车辆信息'),
(898, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=42', 0, 1374739673, ''),
(899, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374739684, ' 内容管理&gt;车辆信息'),
(900, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374739686, ' 内容管理&gt;token信息'),
(901, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=38', 0, 1374739687, ''),
(902, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374739689, ' 内容管理&gt;token信息'),
(903, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=36', 0, 1374739692, ''),
(904, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374739693, ' 内容管理&gt;token信息'),
(905, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=35', 0, 1374739695, ''),
(906, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374739698, ' 内容管理&gt;token信息'),
(907, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374739988, ''),
(908, 38, 'admin', 'admin.php?p=admin', 1, 1374739989, ' 管理员'),
(909, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374739991, ''),
(910, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374739993, ''),
(911, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374739994, ''),
(912, 38, '', '/vanet/vanet/admin.php', 0, 1374739996, ''),
(913, 38, '', '/vanet/vanet/admin.php', 0, 1374973158, ''),
(914, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374973164, ''),
(915, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374973168, ' 内容管理&gt;车辆信息'),
(916, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=42', 0, 1374973170, ''),
(917, 38, '', '/vanet/vanet/admin.php', 0, 1374977781, ''),
(918, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374977784, ''),
(919, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374977785, ' 内容管理&gt;token信息'),
(920, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1374977788, ''),
(921, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374977791, ' 内容管理&gt;token信息'),
(922, 38, 'admin', 'admin.php?p=admin', 1, 1374977798, ' 管理员'),
(923, 38, 'rights', 'admin.php?p=rights', 1, 1374977801, '角色/权限'),
(924, 38, 'rights', 'admin.php?p=rights', 1, 1374977804, '角色/权限'),
(925, 38, 'rights', 'admin.php?p=rights', 1, 1374977810, '角色/权限'),
(926, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374983596, ''),
(927, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374983598, ' 内容管理&gt;token信息'),
(928, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=36', 0, 1374983600, ''),
(929, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374983602, ' 内容管理&gt;token信息'),
(930, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374983603, ' 内容管理&gt;车辆信息'),
(931, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=42&item_id=1', 0, 1374983606, ''),
(932, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374983613, ' 内容管理&gt;车辆信息'),
(933, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=42&item_id=1', 0, 1374983615, ''),
(934, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374983622, ' 内容管理&gt;车辆信息'),
(935, 38, 'admin', 'admin.php?p=admin', 1, 1374984238, ' 管理员'),
(936, 38, 'category', 'admin.php?p=category', 1, 1374984239, ' 栏目管理'),
(937, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984240, ''),
(938, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984241, ''),
(939, 38, 'category', 'admin.php?p=category', 1, 1374984242, ' 栏目管理'),
(940, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984242, ''),
(941, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374984252, ''),
(942, 38, 'category', 'admin.php?p=category', 1, 1374984254, ' 栏目管理'),
(943, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984255, ''),
(944, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374984280, ''),
(945, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=44', 0, 1374984280, ''),
(946, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=44', 0, 1374984283, ''),
(947, 38, 'category', 'admin.php?p=category', 1, 1374984285, ' 栏目管理'),
(948, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984285, ''),
(949, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374984287, ''),
(950, 38, 'admin', 'admin.php?p=admin', 1, 1374984288, ' 管理员'),
(951, 38, 'rights', 'admin.php?p=rights', 1, 1374984291, '角色/权限'),
(952, 38, 'rights', 'admin.php?p=rights', 1, 1374984292, '角色/权限'),
(953, 38, 'rights', 'admin.php?p=rights', 1, 1374984338, '角色/权限'),
(954, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374984347, ''),
(955, 38, 'rights', 'admin.php?p=rights', 1, 1374984349, '角色/权限'),
(956, 38, 'category', 'admin.php?p=category', 1, 1374984351, ' 栏目管理'),
(957, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984351, ''),
(958, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984352, ''),
(959, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=44', 0, 1374984354, ''),
(960, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=44', 0, 1374984381, ''),
(961, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=44', 0, 1374984383, ''),
(962, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984385, ''),
(963, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984386, ''),
(964, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=44', 0, 1374984387, ''),
(965, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984390, ''),
(966, 38, 'category', 'admin.php?p=category', 1, 1374984392, ' 栏目管理'),
(967, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984392, ''),
(968, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=44', 0, 1374984396, ''),
(969, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374984412, ''),
(970, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=45', 0, 1374984412, ''),
(971, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=45', 0, 1374984414, ''),
(972, 38, 'category', 'admin.php?p=category', 1, 1374984415, ' 栏目管理'),
(973, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374984415, ''),
(974, 38, 'admin', 'admin.php?p=admin', 1, 1374984417, ' 管理员'),
(975, 38, 'rights', 'admin.php?p=rights', 1, 1374984419, '角色/权限'),
(976, 38, 'rights', 'admin.php?p=rights', 1, 1374984420, '角色/权限'),
(977, 38, 'rights', 'admin.php?p=rights', 1, 1374984427, '角色/权限'),
(978, 38, 'rights', 'admin.php?p=rights', 1, 1374984429, '角色/权限'),
(979, 38, 'rights', 'admin.php?p=rights', 1, 1374984470, '角色/权限'),
(980, 38, 'rights', 'admin.php?p=rights', 1, 1374984472, '角色/权限'),
(981, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374984474, ''),
(982, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1374984476, ' 内容管理&gt;user&car映射表'),
(983, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=45', 0, 1374984478, ''),
(984, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1374984486, ' 内容管理&gt;user&car映射表'),
(985, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002473, ' 内容管理&gt;user&car映射表'),
(986, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=3', 0, 1375002476, ''),
(987, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002481, ' 内容管理&gt;user&car映射表'),
(988, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=3', 0, 1375002497, ''),
(989, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002499, ' 内容管理&gt;user&car映射表'),
(990, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=3', 0, 1375002504, ''),
(991, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002507, ' 内容管理&gt;user&car映射表'),
(992, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=3', 0, 1375002523, ''),
(993, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002530, ' 内容管理&gt;user&car映射表'),
(994, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=1', 0, 1375002557, ''),
(995, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002561, ' 内容管理&gt;user&car映射表'),
(996, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=45&item_id=3', 0, 1375002565, ''),
(997, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375002568, ' 内容管理&gt;user&car映射表'),
(998, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1375007320, ' 内容管理&gt;车辆信息'),
(999, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1375171252, ''),
(1000, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1375171257, ''),
(1001, 38, '', '/vanet/vanet/admin.php?', 0, 1375171257, ''),
(1002, 38, 'category', 'admin.php?p=category', 1, 1375171259, ' 栏目管理'),
(1003, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171260, ''),
(1004, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=45&depth=1', 0, 1375171431, ''),
(1005, 38, 'category', 'admin.php?p=category', 1, 1375171451, ' 栏目管理'),
(1006, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171451, ''),
(1007, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1375171460, ''),
(1008, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171462, ''),
(1009, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1375171467, ' 内容管理&gt;车辆信息'),
(1010, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1375171469, ' 内容管理&gt;token信息'),
(1011, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1375171469, ' 内容管理&gt;user&car映射表'),
(1012, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1375171470, ' 内容管理&gt;车辆信息'),
(1013, 38, 'category', 'admin.php?p=category', 1, 1375171477, ' 栏目管理'),
(1014, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171477, ''),
(1015, 38, 'category', 'admin.php?p=category', 1, 1375171546, ' 栏目管理'),
(1016, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171547, ''),
(1017, 38, 'category', 'admin.php?p=category', 1, 1375171680, ' 栏目管理'),
(1018, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171680, ''),
(1019, 38, 'category', 'admin.php?p=category', 1, 1375171739, ' 栏目管理'),
(1020, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171740, ''),
(1021, 38, 'category', 'admin.php?p=category', 1, 1375171752, ' 栏目管理'),
(1022, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171753, ''),
(1023, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1375171776, ''),
(1024, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=46', 0, 1375171776, ''),
(1025, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=46', 0, 1375171779, ''),
(1026, 38, 'category', 'admin.php?p=category', 1, 1375171780, ' 栏目管理'),
(1027, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171781, ''),
(1028, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171782, ''),
(1029, 38, 'admin', 'admin.php?p=admin', 1, 1375171783, ' 管理员'),
(1030, 38, 'rights', 'admin.php?p=rights', 1, 1375171785, '角色/权限'),
(1031, 38, 'rights', 'admin.php?p=rights', 1, 1375171787, '角色/权限'),
(1032, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1375171790, ''),
(1033, 38, 'rights', 'admin.php?p=rights', 1, 1375171792, '角色/权限'),
(1034, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171794, ''),
(1035, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=46', 0, 1375171795, ''),
(1036, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=46', 0, 1375171832, ''),
(1037, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171834, ''),
(1038, 38, 'category', 'admin.php?p=category', 1, 1375171835, ' 栏目管理'),
(1039, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1375171835, ''),
(1049, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1375171872, ''),
(1066, 38, 'rights', 'admin.php?p=rights', 1, 1375171949, '角色/权限'),
(1068, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1375171953, ''),
(1070, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375171957, ''),
(1076, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375172002, ''),
(1078, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172039, ' 内容管理&gt;车辆&NOBD视图'),
(1081, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172047, ''),
(1084, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172085, ''),
(1087, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375172144, ''),
(1090, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172208, ''),
(1094, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1375172284, ' 内容管理&gt;车辆&NOBD视图'),
(1095, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=11', 0, 1375172286, ''),
(1097, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=47&item_id=10', 0, 1375172292, ''),
(1113, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375175000, ' 内容管理&gt;用户&车辆&NOBD视图'),
(1116, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375175078, ' 内容管理&gt;用户&车辆&NOBD视图'),
(1118, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1375184812, ' 内容管理&gt;用户&车辆&NOBD视图');

-- --------------------------------------------------------

--
-- 表的结构 `end_rights`
--

CREATE TABLE IF NOT EXISTS `end_rights` (
  `rights_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `rights` text COLLATE utf8_unicode_ci,
  UNIQUE KEY `rights_id` (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_rights`
--

INSERT INTO `end_rights` (`rights_id`, `name`, `description`, `order_id`, `rights`) VALUES
(1, '系统管理员', 'Can do everything', 9, 'category_view,category_add,category_update,category_delete,item_view,item_add,item_update,item_delete,account_update,admin_view,admin_add,admin_update,admin_update_password,admin_delete,config_view,config_add,config_update,config_delete,extension_view,extension_add,extension_update,extension_delete,upload_add,rights_view,rights_add,rights_update,rights_delete,accesslog_view,accesslog_delete,accesslog_update,accesslog_add,cardevice_view,cardevice_delete,cardevice_update,cardevice_add,carstatus_view,carstatus_delete,carstatus_update,carstatus_add,maker_view,maker_delete,maker_update,maker_add,udmessage_view,udmessage_delete,udmessage_update,udmessage_add,vanet_car_view,vanet_car_delete,vanet_car_update,vanet_car_add,vanet_gpsdata_view,vanet_gpsdata_delete,vanet_gpsdata_update,vanet_gpsdata_add,vanet_nobd_view,vanet_nobd_delete,vanet_nobd_update,vanet_nobd_add,vanet_obddata_view,vanet_obddata_delete,vanet_obddata_update,vanet_obddata_add,vanet_token_view,vanet_token_delete,vanet_token_update,vanet_token_add,vanet_user_view,vanet_user_delete,vanet_user_update,vanet_user_add,vanet_usercar_view,vanet_usercar_delete,vanet_usercar_update,vanet_usercar_add,vanet_v_car_nobd_view,vanet_v_ucn_view');

-- --------------------------------------------------------

--
-- 表的结构 `end_user`
--

CREATE TABLE IF NOT EXISTS `end_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `sid` varchar(128) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL COMMENT '云平台发放的访问令牌',
  `name` varchar(128) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='车联网云平台用户' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_user`
--

INSERT INTO `end_user` (`user_id`, `username`, `password`, `sid`, `access_token`, `name`, `phone`, `email`, `avatar`, `create_time`, `status`) VALUES
(1, 'u', '19bb0e8a96395afa9191fa8208daf9ca40fcd66d', '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', 'bdd477a386f5547a1db558c99ee5eed10dfc574db38f11572305f867bc8fb1d5', 'u', '', 'u@123.com', NULL, 1371373361, '');

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_car`
--

CREATE TABLE IF NOT EXISTS `end_vanet_car` (
  `car_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vin` varchar(128) DEFAULT NULL,
  `license` varchar(64) DEFAULT NULL COMMENT '车牌号',
  `init_mile` int(11) DEFAULT NULL,
  `current_mile` int(11) DEFAULT NULL,
  `engine_size` float DEFAULT NULL,
  `brand` varchar(128) DEFAULT NULL COMMENT '厂商',
  `model` varchar(128) DEFAULT NULL COMMENT '型号',
  `emissions` varchar(16) DEFAULT NULL COMMENT '排量',
  `maintenancemiles` bigint(20) DEFAULT NULL COMMENT '保养里程数',
  `initializemiles` bigint(20) DEFAULT NULL COMMENT '初始里程',
  `currentmiles` bigint(20) DEFAULT NULL COMMENT '当前里程',
  `roadfeesvalidity` int(11) DEFAULT NULL COMMENT '养路费有效期',
  `drivinglicensevalidity` int(11) DEFAULT NULL COMMENT '行驶证有效期',
  `insurancevalidity` int(11) DEFAULT NULL COMMENT '保险有效期',
  `comment` varchar(256) DEFAULT NULL COMMENT '备注',
  `status` varchar(32) DEFAULT NULL COMMENT '状态',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='汽车信息表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `end_vanet_car`
--

INSERT INTO `end_vanet_car` (`car_id`, `vin`, `license`, `init_mile`, `current_mile`, `engine_size`, `brand`, `model`, `emissions`, `maintenancemiles`, `initializemiles`, `currentmiles`, `roadfeesvalidity`, `drivinglicensevalidity`, `insurancevalidity`, `comment`, `status`, `create_time`) VALUES
(1, 'p09012lwgeg', '12312', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376100082),
(2, 'p09012lwgeg', '12312', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376100988),
(3, 'p09012lwgeg1', '川A CR141', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376100988),
(4, 'p09012lwgeg', '京A 00001', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376101036),
(5, 'p09012lwgeg12', '京A 00002', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376101160),
(6, 'p09012lwgeg1', '川A CR141', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376101160),
(7, 'p09012lwgeg', '12312', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376102807),
(8, 'p09012lwgeg', '12312', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376102825),
(9, 'p09012lwgeg1', '川A CR141', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376102825),
(10, 'p09012lwgeg', '12312', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376102847),
(11, 'p09012lwgeg1', '川A CR141', 1212, 212, 1.8, '', '', '', 0, 0, 0, 1376582400, -28800, -28800, '', NULL, 1376102847);

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_gpsdata`
--

CREATE TABLE IF NOT EXISTS `end_vanet_gpsdata` (
  `gpsdata_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nobd_id` bigint(20) unsigned DEFAULT NULL,
  `longtitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `speed` float DEFAULT NULL,
  `course` float DEFAULT NULL,
  `gps_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`gpsdata_id`),
  KEY `FK_Reference_3` (`nobd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=205 ;

--
-- 转存表中的数据 `end_vanet_gpsdata`
--

INSERT INTO `end_vanet_gpsdata` (`gpsdata_id`, `nobd_id`, `longtitude`, `latitude`, `speed`, `course`, `gps_time`, `create_time`) VALUES
(1, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376405970),
(2, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406510),
(3, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406555),
(4, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406630),
(5, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406631),
(6, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406633),
(7, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406634),
(8, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406636),
(9, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406637),
(10, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406638),
(11, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406640),
(12, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406641),
(13, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406642),
(14, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406644),
(15, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406645),
(16, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406647),
(17, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406658),
(18, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406659),
(19, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406660),
(20, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406662),
(21, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406663),
(22, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406845),
(23, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406846),
(24, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406848),
(25, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406849),
(26, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406850),
(27, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376406851),
(28, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407267),
(29, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407268),
(30, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407269),
(31, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407271),
(32, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407272),
(33, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407273),
(34, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407274),
(35, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407276),
(36, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407277),
(37, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407279),
(38, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407280),
(39, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407281),
(40, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407413),
(41, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407415),
(42, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407416),
(43, NULL, 1.5, 1.5, 80.1, 90.1, 1345678334, 1376407417),
(44, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407521),
(45, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407523),
(46, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407524),
(47, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407526),
(48, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407527),
(49, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407528),
(50, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407530),
(51, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407531),
(52, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407532),
(53, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407533),
(54, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407535),
(55, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407536),
(56, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407537),
(57, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407539),
(58, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407540),
(59, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407541),
(60, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407542),
(61, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407543),
(62, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407545),
(63, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407546),
(64, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407547),
(65, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407548),
(66, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407550),
(67, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407551),
(68, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407553),
(69, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407554),
(70, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407555),
(71, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407556),
(72, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407558),
(73, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407559),
(74, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407560),
(75, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407561),
(76, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407563),
(77, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407564),
(78, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407565),
(79, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407566),
(80, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407567),
(81, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407569),
(82, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407570),
(83, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407571),
(84, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407572),
(85, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407574),
(86, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407575),
(87, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407576),
(88, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407577),
(89, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407579),
(90, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407580),
(91, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407581),
(92, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407582),
(93, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407583),
(94, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407585),
(95, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407586),
(96, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407587),
(97, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407588),
(98, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407590),
(99, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407591),
(100, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407592),
(101, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407593),
(102, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407595),
(103, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407596),
(104, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407597),
(105, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407598),
(106, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407599),
(107, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407601),
(108, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407602),
(109, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407603),
(110, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407604),
(111, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407606),
(112, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407607),
(113, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407608),
(114, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407610),
(115, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407611),
(116, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407612),
(117, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407613),
(118, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407614),
(119, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407616),
(120, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407617),
(121, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407618),
(122, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407620),
(123, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407621),
(124, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407622),
(125, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407624),
(126, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407625),
(127, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407626),
(128, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407627),
(129, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407629),
(130, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407630),
(131, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407631),
(132, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407632),
(133, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407634),
(134, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407635),
(135, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407636),
(136, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407637),
(137, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407638),
(138, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407640),
(139, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407641),
(140, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407642),
(141, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407643),
(142, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407645),
(143, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407646),
(144, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407647),
(145, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407648),
(146, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407649),
(147, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407651),
(148, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407652),
(149, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407653),
(150, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407654),
(151, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407656),
(152, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407657),
(153, NULL, 1.5, 1.5, 80.1, 90.1, 1376407524, 1376407659),
(154, NULL, 1.5, 1.5, 80.1, 90.1, 1376407852, 1376407849),
(155, NULL, 1.5, 1.5, 80.1, 90.1, 1376407853, 1376407850),
(156, NULL, 1.5, 1.5, 80.1, 90.1, 1376407854, 1376407852),
(157, NULL, 1.5, 1.5, 80.1, 90.1, 1376407855, 1376407853),
(158, NULL, 1.5, 1.5, 80.1, 90.1, 1376407856, 1376407854),
(159, NULL, 1.5, 1.5, 80.1, 90.1, 1376407857, 1376407855),
(160, NULL, 1.5, 1.5, 80.1, 90.1, 1376407858, 1376407857),
(161, NULL, 1.5, 1.5, 80.1, 90.1, 1376407859, 1376407858),
(162, NULL, 1.5, 1.5, 80.1, 90.1, 1376407860, 1376407859),
(163, NULL, 1.5, 1.5, 80.1, 90.1, 1376407861, 1376407860),
(164, NULL, 1.5, 1.5, 80.1, 90.1, 1376407862, 1376407861),
(165, NULL, 1.5, 1.5, 80.1, 90.1, 1376407863, 1376407863),
(166, NULL, 1.5, 1.5, 80.1, 90.1, 1376407864, 1376407864),
(167, NULL, 1.5, 1.5, 80.1, 90.1, 1376407865, 1376407865),
(168, NULL, 1.5, 1.5, 80.1, 90.1, 1376407866, 1376407867),
(169, NULL, 1.5, 1.5, 80.1, 90.1, 1376407867, 1376407868),
(170, NULL, 1.5, 1.5, 80.1, 90.1, 1376407868, 1376407869),
(171, NULL, 1.5, 1.5, 80.1, 90.1, 1376407869, 1376407870),
(172, NULL, 1.5, 1.5, 80.1, 90.1, 1376407870, 1376407872),
(173, NULL, 1.5, 1.5, 80.1, 90.1, 1376407871, 1376407873),
(174, NULL, 1.5, 1.5, 80.1, 90.1, 1376407872, 1376407874),
(175, NULL, 1.5, 1.5, 80.1, 90.1, 1376407873, 1376407875),
(176, NULL, 1.5, 1.5, 80.1, 90.1, 1376407874, 1376407877),
(177, NULL, 1.5, 1.5, 80.1, 90.1, 1376407875, 1376407878),
(178, NULL, 1.5, 1.5, 80.1, 90.1, 1376407876, 1376407879),
(179, NULL, 1.5, 1.5, 80.1, 90.1, 1376407877, 1376407880),
(180, NULL, 1.5, 1.5, 80.1, 90.1, 1376407878, 1376407881),
(181, NULL, 1.5, 1.5, 80.1, 90.1, 1376407879, 1376407883),
(182, NULL, 1.5, 1.5, 80.1, 90.1, 1376407880, 1376407884),
(183, NULL, 1.5, 1.5, 80.1, 90.1, 1376407881, 1376407885),
(184, NULL, 1.5, 1.5, 80.1, 90.1, 1376407882, 1376407886),
(185, NULL, 1.5, 1.5, 80.1, 90.1, 1376407883, 1376407888),
(186, NULL, 1.5, 1.5, 80.1, 90.1, 1376407884, 1376407889),
(187, NULL, 1.5, 1.5, 80.1, 90.1, 1376407885, 1376407890),
(188, NULL, 1.5, 1.5, 80.1, 90.1, 1376407886, 1376407891),
(189, NULL, 1.5, 1.5, 80.1, 90.1, 1376407887, 1376407892),
(190, NULL, 1.5, 1.5, 80.1, 90.1, 1376407888, 1376407894),
(191, NULL, 1.5, 1.5, 80.1, 90.1, 1376407889, 1376407895),
(192, NULL, 1.5, 1.5, 80.1, 90.1, 1376407890, 1376407896),
(193, NULL, 1.5, 1.5, 80.1, 90.1, 1376407891, 1376407897),
(194, NULL, 1.5, 1.5, 80.1, 90.1, 1376407892, 1376407899),
(195, NULL, 1.5, 1.5, 80.1, 90.1, 1376407893, 1376407900),
(196, NULL, 1.5, 1.5, 80.1, 90.1, 1376407894, 1376407901),
(197, NULL, 1.5, 1.5, 80.1, 90.1, 1376407895, 1376407902),
(198, NULL, 1.5, 1.5, 80.1, 90.1, 1376407896, 1376407904),
(199, NULL, 1.5, 1.5, 80.1, 90.1, 1376407897, 1376407905),
(200, NULL, 1.5, 1.5, 80.1, 90.1, 1376407898, 1376407906),
(201, NULL, 1.5, 1.5, 80.1, 90.1, 1376407899, 1376407907),
(202, NULL, 1.5, 1.5, 80.1, 90.1, 1376407900, 1376407909),
(203, NULL, 1.5, 1.5, 80.1, 90.1, 1376407901, 1376407910),
(204, NULL, 1.5, 1.5, 80.1, 90.1, 1376407902, 1376407911);

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_nobd`
--

CREATE TABLE IF NOT EXISTS `end_vanet_nobd` (
  `nobd_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` bigint(20) unsigned DEFAULT NULL,
  `sn` varchar(128) DEFAULT NULL COMMENT '设备序列号，识别ID',
  `pw` varchar(128) DEFAULT NULL,
  `sim_no` varchar(32) DEFAULT NULL COMMENT 'OBD板载SIM卡手机号',
  `active_time` int(11) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`nobd_id`),
  KEY `FK_Reference_10` (`car_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='OBD设备（含GPRS模块）' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_vanet_nobd`
--

INSERT INTO `end_vanet_nobd` (`nobd_id`, `car_id`, `sn`, `pw`, `sim_no`, `active_time`, `status`, `create_time`) VALUES
(1, 5, 'user1', 'pw1', '', 0, '', 1376100003);

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_obddata`
--

CREATE TABLE IF NOT EXISTS `end_vanet_obddata` (
  `obddata_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nobd_id` bigint(20) unsigned DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `data_time` int(11) DEFAULT NULL COMMENT '数据采集时间',
  `engine_rpm` float DEFAULT NULL,
  `vehicle_speed` int(11) DEFAULT NULL,
  `engine_run_time` int(11) DEFAULT NULL,
  `distance_mil` int(11) DEFAULT NULL COMMENT 'MIL灯亮起后的行驶距离',
  `time_mil` int(11) DEFAULT NULL,
  `fuel_rail_pressure` float DEFAULT NULL COMMENT '燃油导轨压力',
  `fuel_rail_pressure_abs` float DEFAULT NULL,
  `fuel_rail_pressure_mv` float DEFAULT NULL COMMENT '燃油导轨压力',
  `control_module_voltage` float DEFAULT NULL,
  `relative_throttle_position` int(11) DEFAULT NULL,
  `ambient_air_temp` int(11) DEFAULT NULL,
  `time_since_tc` int(11) DEFAULT NULL,
  `fuel_type` int(11) DEFAULT NULL,
  `acc_pedal_position` int(11) DEFAULT NULL COMMENT '0~100',
  PRIMARY KEY (`obddata_id`),
  KEY `FK_Reference_4` (`nobd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_vanet_obddata`
--

INSERT INTO `end_vanet_obddata` (`obddata_id`, `nobd_id`, `create_time`, `data_time`, `engine_rpm`, `vehicle_speed`, `engine_run_time`, `distance_mil`, `time_mil`, `fuel_rail_pressure`, `fuel_rail_pressure_abs`, `fuel_rail_pressure_mv`, `control_module_voltage`, `relative_throttle_position`, `ambient_air_temp`, `time_since_tc`, `fuel_type`, `acc_pedal_position`) VALUES
(1, 0, 1374656066, 0, 123, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_obds3`
--

CREATE TABLE IF NOT EXISTS `end_vanet_obds3` (
  `obds3_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nobd_id` bigint(20) unsigned DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `trouble_code` varchar(128) DEFAULT NULL,
  `data_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`obds3_id`),
  KEY `FK_Reference_9` (`nobd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_obds12`
--

CREATE TABLE IF NOT EXISTS `end_vanet_obds12` (
  `obds12_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nobd_id` bigint(20) unsigned DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `data_time` int(11) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL COMMENT 's1, s2',
  `DTC_CNT` int(11) DEFAULT NULL COMMENT '故障码个数',
  `DTCFRZF` varchar(32) DEFAULT NULL COMMENT '冻结帧故障码',
  `FEULSYS1` smallint(6) DEFAULT NULL COMMENT '燃油系统状态1',
  `FEULSYS2` smallint(6) DEFAULT NULL COMMENT '燃油系统状态2',
  `LOAD_PCT` smallint(6) DEFAULT NULL COMMENT '发动机负载',
  `ECT` smallint(6) DEFAULT NULL COMMENT '发动机冷却液温度',
  `SHRFTF1` smallint(6) DEFAULT NULL COMMENT '短时燃油修正，汽缸1',
  `SHRFTF3` smallint(6) DEFAULT NULL,
  `LONGFT1` smallint(6) DEFAULT NULL COMMENT '长时燃油修正，汽缸1',
  `LONGFT3` smallint(6) DEFAULT NULL,
  `LONGFT2` smallint(6) DEFAULT NULL,
  `LONGFT4` smallint(6) DEFAULT NULL,
  `FRP` int(11) DEFAULT NULL COMMENT '燃油导轨压力',
  `MAP` smallint(6) DEFAULT NULL COMMENT '进气管压力',
  `RPM` int(11) DEFAULT NULL COMMENT '发动机转速',
  `VSS` smallint(6) DEFAULT NULL COMMENT '车辆速度',
  `SPARKADV` smallint(6) DEFAULT NULL COMMENT '点火正时提前角',
  `IAT` smallint(6) DEFAULT NULL COMMENT '进气温度',
  `MAF` int(11) DEFAULT NULL COMMENT '空气流量',
  `TP` smallint(6) DEFAULT NULL COMMENT '绝对节气门位置',
  `AIR_STAT` smallint(6) DEFAULT NULL COMMENT '空气状态',
  `O2SLOC` smallint(6) DEFAULT NULL COMMENT '氧传感器位置',
  `OBDSUP` smallint(6) DEFAULT NULL COMMENT 'OBD设计规格',
  `PTO_STAT` smallint(6) DEFAULT NULL COMMENT '辅助输入状态',
  `MIL_DIST` int(11) DEFAULT NULL COMMENT '故障激活后行驶距离',
  `RUNTM` int(11) DEFAULT NULL COMMENT '发动机运行时间',
  `EGR_PCT` smallint(6) DEFAULT NULL COMMENT 'EGR开度',
  `EGR_ERR` smallint(6) DEFAULT NULL COMMENT 'EGR误差',
  `EVAP_PCT` smallint(6) DEFAULT NULL COMMENT '蒸汽冲洗控制指令',
  `FLI` smallint(6) DEFAULT NULL COMMENT '燃油液位输入',
  `WARM_UPS` smallint(6) DEFAULT NULL COMMENT '自故障码清除后暖机循环次数',
  `CLR_DIST` int(11) DEFAULT NULL COMMENT '故障码清楚后行驶距离',
  `EVAP_VP` int(11) DEFAULT NULL COMMENT '蒸汽压力',
  `BARO` smallint(6) DEFAULT NULL COMMENT '大气压',
  `CATEMP11` int(11) DEFAULT NULL COMMENT '催化器温度B1S1',
  `CATEMP21` int(11) DEFAULT NULL,
  `CATEMP12` int(11) DEFAULT NULL,
  `CATEMP22` int(11) DEFAULT NULL,
  `VPWR` int(11) DEFAULT NULL COMMENT '控制模块电压',
  `LOAD_ABS` int(11) DEFAULT NULL COMMENT '负载绝对值',
  `EQ_RAT` int(11) DEFAULT NULL COMMENT '等效比指令',
  `TP_R` smallint(6) DEFAULT NULL COMMENT '相对节气门位置',
  `AAT` smallint(6) DEFAULT NULL COMMENT '环境温度',
  `TP_B` smallint(6) DEFAULT NULL COMMENT '相对节气门位置B',
  `TP_C` smallint(6) DEFAULT NULL,
  `APP_D` smallint(6) DEFAULT NULL COMMENT '加速踏板位置D',
  `APP_E` smallint(6) DEFAULT NULL,
  `APP_F` smallint(6) DEFAULT NULL,
  `TAC_PCT` smallint(6) DEFAULT NULL COMMENT '节气门执行控制器指令',
  `MIL_TIME` int(11) DEFAULT NULL COMMENT '故障激活后发动机运行时间',
  `CLR_TIME` int(11) DEFAULT NULL COMMENT '故障清除后运行时间',
  `FUEL_TYP` smallint(6) DEFAULT NULL COMMENT '燃油类型',
  `ALCH_PCT` smallint(6) DEFAULT NULL COMMENT '酒精百分比',
  `EVAP_VPA` int(11) DEFAULT NULL COMMENT '蒸汽压力绝对值',
  `STSO2FT1` smallint(6) DEFAULT NULL COMMENT '第二氧传感器短时燃油修正B1',
  `STSO2FT3` smallint(6) DEFAULT NULL,
  `LGSO2FT1` smallint(6) DEFAULT NULL,
  `LGSO2FT3` smallint(6) DEFAULT NULL,
  `STSO2FT2` smallint(6) DEFAULT NULL,
  `STSO2FT4` smallint(6) DEFAULT NULL,
  `LGSO2FT2` smallint(6) DEFAULT NULL,
  `LGSO2FT4` smallint(6) DEFAULT NULL,
  `APP_R` smallint(6) DEFAULT NULL COMMENT '加速踏板相对位置',
  PRIMARY KEY (`obds12_id`),
  KEY `FK_Reference_7` (`nobd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_token`
--

CREATE TABLE IF NOT EXISTS `end_vanet_token` (
  `token_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `access_token` varchar(128) NOT NULL,
  `token_type` varchar(32) NOT NULL COMMENT 'token类型，obd,user',
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `expire_time` int(11) DEFAULT NULL,
  `status` varchar(32) NOT NULL COMMENT 'token状态',
  PRIMARY KEY (`token_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `end_vanet_token`
--

INSERT INTO `end_vanet_token` (`token_id`, `access_token`, `token_type`, `owner_id`, `create_time`, `expire_time`, `status`) VALUES
(1, '52946b78ab0e060b', 'obd', 1, 1376100017, NULL, 'valid'),
(2, 'f313e38dfb990557b49f475d42e89237ddda905a34a086fa48e7f26d9894242b', 'user', 1, 1376100020, NULL, 'valid');

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_user`
--

CREATE TABLE IF NOT EXISTS `end_vanet_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL COMMENT '用户角色：普通汽车用户，4S',
  `name` varchar(128) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(32) DEFAULT NULL COMMENT '手机',
  `email` varchar(128) DEFAULT NULL COMMENT '邮箱',
  `avatar` varchar(128) DEFAULT NULL COMMENT '头像',
  `create_time` int(10) unsigned DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='车联网云平台用户' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_vanet_user`
--

INSERT INTO `end_vanet_user` (`user_id`, `username`, `password`, `role`, `name`, `phone`, `email`, `avatar`, `create_time`, `status`) VALUES
(1, 'u', 'ce8ec216647d62a8e51f1817c67334bb26d9d0f9', NULL, 'liudan', '', 'liudanking@126.com', NULL, 1376099983, '');

-- --------------------------------------------------------

--
-- 表的结构 `end_vanet_usercar`
--

CREATE TABLE IF NOT EXISTS `end_vanet_usercar` (
  `r_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(11) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `car_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `FK_Reference_5` (`user_id`),
  KEY `FK_Reference_8` (`car_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `end_vanet_usercar`
--

INSERT INTO `end_vanet_usercar` (`r_id`, `create_time`, `user_id`, `car_id`) VALUES
(1, 1376100082, 1, 1),
(2, 1376100988, 1, 5),
(6, 1376101160, 1, 6),
(7, 1376102807, 1, 7),
(8, 1376102825, 1, 8),
(9, 1376102825, 1, 9),
(10, 1376102847, 1, 10),
(11, 1376102847, 1, 11);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `end_vanet_v_car_nobd`
--
CREATE TABLE IF NOT EXISTS `end_vanet_v_car_nobd` (
`car_id` bigint(20) unsigned
,`vin` varchar(128)
,`license` varchar(64)
,`init_mile` int(11)
,`current_mile` int(11)
,`engine_size` float
,`brand` varchar(128)
,`model` varchar(128)
,`emissions` varchar(16)
,`maintenancemiles` bigint(20)
,`initializemiles` bigint(20)
,`currentmiles` bigint(20)
,`roadfeesvalidity` int(11)
,`drivinglicensevalidity` int(11)
,`insurancevalidity` int(11)
,`comment` varchar(256)
,`carstatus` varchar(32)
,`create_time` int(11)
,`nobd_id` bigint(20) unsigned
,`sn` varchar(128)
,`pw` varchar(128)
,`sim_no` varchar(32)
,`active_time` int(11)
,`nobdstatus` varchar(32)
);
-- --------------------------------------------------------

--
-- 替换视图以便查看 `end_vanet_v_ucn`
--
CREATE TABLE IF NOT EXISTS `end_vanet_v_ucn` (
`user_id` bigint(20) unsigned
,`userstatus` varchar(32)
,`car_id` bigint(20) unsigned
,`vin` varchar(128)
,`license` varchar(64)
,`init_mile` int(11)
,`current_mile` int(11)
,`engine_size` float
,`brand` varchar(128)
,`model` varchar(128)
,`emissions` varchar(16)
,`maintenancemiles` bigint(20)
,`initializemiles` bigint(20)
,`currentmiles` bigint(20)
,`roadfeesvalidity` int(11)
,`drivinglicensevalidity` int(11)
,`insurancevalidity` int(11)
,`comment` varchar(256)
,`carstatus` varchar(32)
,`create_time` int(11)
,`nobd_id` bigint(20) unsigned
,`sn` varchar(128)
,`pw` varchar(128)
,`sim_no` varchar(32)
,`active_time` int(11)
,`nobdstatus` varchar(32)
);
-- --------------------------------------------------------

--
-- 替换视图以便查看 `end_vanet_v_user_car`
--
CREATE TABLE IF NOT EXISTS `end_vanet_v_user_car` (
`user_id` bigint(20) unsigned
,`userstatus` varchar(32)
,`car_id` bigint(20) unsigned
,`vin` varchar(128)
,`license` varchar(64)
,`init_mile` int(11)
,`current_mile` int(11)
,`engine_size` float
,`brand` varchar(128)
,`model` varchar(128)
,`emissions` varchar(16)
,`maintenancemiles` bigint(20)
,`initializemiles` bigint(20)
,`currentmiles` bigint(20)
,`roadfeesvalidity` int(11)
,`drivinglicensevalidity` int(11)
,`insurancevalidity` int(11)
,`comment` varchar(256)
,`status` varchar(32)
,`create_time` int(11)
);
-- --------------------------------------------------------

--
-- 视图结构 `end_vanet_v_car_nobd`
--
DROP TABLE IF EXISTS `end_vanet_v_car_nobd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_car_nobd` AS select `c`.`car_id` AS `car_id`,`c`.`vin` AS `vin`,`c`.`license` AS `license`,`c`.`init_mile` AS `init_mile`,`c`.`current_mile` AS `current_mile`,`c`.`engine_size` AS `engine_size`,`c`.`brand` AS `brand`,`c`.`model` AS `model`,`c`.`emissions` AS `emissions`,`c`.`maintenancemiles` AS `maintenancemiles`,`c`.`initializemiles` AS `initializemiles`,`c`.`currentmiles` AS `currentmiles`,`c`.`roadfeesvalidity` AS `roadfeesvalidity`,`c`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`c`.`insurancevalidity` AS `insurancevalidity`,`c`.`comment` AS `comment`,`c`.`status` AS `carstatus`,`c`.`create_time` AS `create_time`,`n`.`nobd_id` AS `nobd_id`,`n`.`sn` AS `sn`,`n`.`pw` AS `pw`,`n`.`sim_no` AS `sim_no`,`n`.`active_time` AS `active_time`,`n`.`status` AS `nobdstatus` from (`end_vanet_car` `c` left join `end_vanet_nobd` `n` on((`c`.`car_id` = `n`.`car_id`)));

-- --------------------------------------------------------

--
-- 视图结构 `end_vanet_v_ucn`
--
DROP TABLE IF EXISTS `end_vanet_v_ucn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_ucn` AS select `u`.`user_id` AS `user_id`,`u`.`userstatus` AS `userstatus`,`c`.`car_id` AS `car_id`,`c`.`vin` AS `vin`,`c`.`license` AS `license`,`c`.`init_mile` AS `init_mile`,`c`.`current_mile` AS `current_mile`,`c`.`engine_size` AS `engine_size`,`c`.`brand` AS `brand`,`c`.`model` AS `model`,`c`.`emissions` AS `emissions`,`c`.`maintenancemiles` AS `maintenancemiles`,`c`.`initializemiles` AS `initializemiles`,`c`.`currentmiles` AS `currentmiles`,`c`.`roadfeesvalidity` AS `roadfeesvalidity`,`c`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`c`.`insurancevalidity` AS `insurancevalidity`,`c`.`comment` AS `comment`,`c`.`carstatus` AS `carstatus`,`c`.`create_time` AS `create_time`,`c`.`nobd_id` AS `nobd_id`,`c`.`sn` AS `sn`,`c`.`pw` AS `pw`,`c`.`sim_no` AS `sim_no`,`c`.`active_time` AS `active_time`,`c`.`nobdstatus` AS `nobdstatus` from (`end_vanet_v_user_car` `u` join `end_vanet_v_car_nobd` `c` on((`u`.`car_id` = `c`.`car_id`)));

-- --------------------------------------------------------

--
-- 视图结构 `end_vanet_v_user_car`
--
DROP TABLE IF EXISTS `end_vanet_v_user_car`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_user_car` AS select `u`.`user_id` AS `user_id`,`u`.`status` AS `userstatus`,`c`.`car_id` AS `car_id`,`c`.`vin` AS `vin`,`c`.`license` AS `license`,`c`.`init_mile` AS `init_mile`,`c`.`current_mile` AS `current_mile`,`c`.`engine_size` AS `engine_size`,`c`.`brand` AS `brand`,`c`.`model` AS `model`,`c`.`emissions` AS `emissions`,`c`.`maintenancemiles` AS `maintenancemiles`,`c`.`initializemiles` AS `initializemiles`,`c`.`currentmiles` AS `currentmiles`,`c`.`roadfeesvalidity` AS `roadfeesvalidity`,`c`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`c`.`insurancevalidity` AS `insurancevalidity`,`c`.`comment` AS `comment`,`c`.`status` AS `status`,`c`.`create_time` AS `create_time` from ((`end_vanet_usercar` `uc` left join `end_vanet_user` `u` on((`u`.`user_id` = `uc`.`user_id`))) left join `end_vanet_car` `c` on((`c`.`car_id` = `uc`.`car_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
