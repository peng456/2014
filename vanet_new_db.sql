-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 08 月 13 日 22:10
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

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
-- 表的结构 `end_accesslog`
--

CREATE TABLE IF NOT EXISTS `end_accesslog` (
  `accesslog_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `access_time` int(11) DEFAULT NULL,
  `user_type` varchar(64) DEFAULT NULL COMMENT 'user, maker, device',
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `sid` varchar(128) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `ip_address` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`accesslog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `end_accesslog`
--

INSERT INTO `end_accesslog` (`accesslog_id`, `access_time`, `user_type`, `user_id`, `sid`, `access_token`, `ip_address`) VALUES
(1, 1371373411, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '2a10df565b8405515fc27f5c06f267b6584660bdff000b9ff277da36922b4610', '127.0.0.1'),
(2, 1371373525, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '448574f28a788adc1db81593fa4b87d02adc29b48f9251d8db22d1ee90c9da54', '127.0.0.1'),
(3, 1371373749, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '06e9e7bc072047a9ad3afa55e9da54e4284a151eda7f1d987d971450f7228d31', '127.0.0.1'),
(4, 1371374802, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '184ab06c2e86b04aa02f3450668793c6d92c16360c81fb5e285ff0f98f7a69bb', '127.0.0.1'),
(5, 1371374812, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '230e0690c9872ab07b5da6cb091bcab5a58d0c06bca4522ff156f5685008db97', '127.0.0.1'),
(6, 1371374914, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', 'ae97236f7085c3cd3faf71f372152e773c3b13cc275df352ba33c0384ebf0ac5', '127.0.0.1'),
(7, 1371375049, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', 'f0733c128673de08b0d7f78425663fa9f518963b46ef9613a74aeef2b303a5f4', '127.0.0.1'),
(8, 1371378537, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'ac4d1edd3359994847c5296ff18da6ca908ae86458d88ec650b3861c1049b3ed', '127.0.0.1'),
(9, 1371384266, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '9a23519340dcdbeef21ac1c2eb9603163dd64f19f011f7cd212db04882a83d99', '127.0.0.1'),
(10, 1371384266, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', 'c5a260a2d8b496172b60ea64c35984f74996de9588b5e40e1313cfe49bfbafa9', '127.0.0.1'),
(11, 1371384294, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '6f1e3756b50b962904372649acbcebd4acbc4b1fa742dc47f9077c6f93eb7bda', '127.0.0.1'),
(12, 1371384294, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '927a004095bcae7966986254c84d17e9714220cc1be397b988f5caf3b703b138', '127.0.0.1'),
(13, 1371384335, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '4946de93d5202cb6379db6e2dc7ad649a76e79f3adff2730e16262e83a40900d', '127.0.0.1'),
(14, 1371384335, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', 'f089408027fd13c8d20c4006a9a144fa17dc0576aca84e0da81b3fb12fa803ba', '127.0.0.1'),
(15, 1371384399, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '8e0701a314db7db3afbc1f85ccb59fa2cdea6f9fff96161a30b6072e97d3efda', '127.0.0.1'),
(16, 1371384399, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '5da304206bd67baf9201a506db6e3b3dbfe65af78e78afc5af857a39440852d6', '127.0.0.1'),
(17, 1371384399, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', 'cdfab5081cab184d8c187cca3707d5c7903528753d3756c1da208924d545bfac', '127.0.0.1'),
(18, 1371384593, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '6ed84d3488da2f9e7076bde259a92e65228ff9920362b5b32de69857bdc6d88c', '127.0.0.1'),
(19, 1371384593, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '3420b6b8e83acaf37694b52612bd6072acd19be920b45351d07ab07a28dc8a6c', '127.0.0.1'),
(20, 1371384593, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '50d90b9012d7e335da01be65613f4a36ed53629b1e5713ad0ed96101146ef4cf', '127.0.0.1'),
(21, 1371388899, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'ef02ed1bce9ee5ac2692ca950c7f3aec6758ea51849a3ca14e2be885e99054c4', '127.0.0.1'),
(22, 1371388899, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'c4b0a3b5509a9d3ef78b2b83e3b964df5a50f4efef6cbb2924f7a0cd96bb5eae', '127.0.0.1'),
(23, 1371388899, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', 'd2edc4937112d42e051f2ed6c87e64ed9a4f8a517f045e69c6cacf727cb86d0a', '127.0.0.1'),
(24, 1371388938, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'a8e993f1a371aa911397863a9504025cedb9f0a528cfa89332566b5c9337f206', '127.0.0.1'),
(25, 1371388938, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'f05c2887df3fc1cb3d68491c2b3ccc00532f9e628b39fd5389d9f5fd5c3580da', '127.0.0.1'),
(26, 1371388938, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '7d359bc856b23b1a8b754d6a21646857f6e70aaf1aaa260ff7e0c35d9099deaa', '127.0.0.1'),
(27, 1371389051, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'd94b85ae02062f903e84278320b16b5875d1bf76e2fd77e8c078a42e2e1e6fa1', '127.0.0.1'),
(28, 1371389051, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'e8b85fdfcb7178a2735f36e96800c0f265f80ce03b6591746d39da1d71152836', '127.0.0.1'),
(29, 1371389051, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '7773ee5a14de560a919fee42ece4d9343df47f957cd7248b57bc4d856c721c42', '127.0.0.1'),
(30, 1371389101, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'ed3f64a76d3f0c3df3891b51b66ba57d468c9491c029fe611d3bd1e9a1a21d1e', '127.0.0.1'),
(31, 1371389101, 'maker', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', '837e537d9606b55e63eae7e9e3f6e9131166534f545858aac16d8ae8db63cba5', '127.0.0.1'),
(32, 1371389101, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '02fe5f9585cc4de7cd26039d1a5b2f4c7f7777443c30a1c25fb1b6ee90141654', '127.0.0.1'),
(33, 1371396635, 'user', 0, '2f60c59ca42224e9724e1df43a955e60b6d453e0', 'c2de123b262a01c2b107b69371e392a16c2fc8fbf9d64847b033a19f2cc801f7', '127.0.0.1'),
(34, 1371396635, 'maker', 0, 'dff6e63c91a0326d93b684e903d176b6a1b5b123', '206f1ae257d16f73d1c0df4890ae0951e374220f3afaa1b1e7b9405cc03212d4', '127.0.0.1'),
(35, 1371396635, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '20b21a2582ab970ce8c61f6159d7a155ef64fe020c191f54d69b9d9589a503ff', '127.0.0.1'),
(36, 1371396749, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '1d992a38f076f0811c51ef82f733361d860ec7289b686870e30374f1ab5548c0', '127.0.0.1'),
(37, 1371396749, 'maker', 0, 'dff6e63c91a0326d93b684e903d176b6a1b5b123', '9c9cdb427778ecaaea00f9dab0a01d616f5f8b603a17b79099becc5512e15fd7', '127.0.0.1'),
(38, 1371396749, 'device', 0, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '9606852fcec52d3959b264dc1150da7e55b57de858dbf305b13c3e57444d2d7d', '127.0.0.1'),
(39, 1371396895, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', '2357de289837acf8f4303145261f33fadb1d854124f75312bb30cce21d87aec5', '127.0.0.1'),
(40, 1371396895, 'maker', 1, 'dff6e63c91a0326d93b684e903d176b6a1b5b123', '27c763cea9ae7f7f35d1861dd867920dcfa4cf29e521d8f820ddc3fe1f7d59f2', '127.0.0.1'),
(41, 1371396895, 'device', 1, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '16cb498c803a1e1d557a1243411db152db03c872c690c3f8e16a027c6e350457', '127.0.0.1'),
(42, 1371397078, 'user', 1, '9c56b2baaa71e71fcb6c7fb8694766e644fea9e7', 'bdd477a386f5547a1db558c99ee5eed10dfc574db38f11572305f867bc8fb1d5', '127.0.0.1'),
(43, 1371397078, 'maker', 1, 'dff6e63c91a0326d93b684e903d176b6a1b5b123', '9a2d5cf41fec837c62dc88a1c364768fca8c856e0a268b1afa7ece5d52d976f4', '127.0.0.1'),
(44, 1371397078, 'device', 1, '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '88e19c9001afe4405a080a94b628167a7b96fc9324580086e71dcc028b1e0e7c', '127.0.0.1');

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
-- 表的结构 `end_cardevice`
--

CREATE TABLE IF NOT EXISTS `end_cardevice` (
  `device_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `did` varchar(128) DEFAULT NULL COMMENT '设备的ID，厂家设定',
  `token` varchar(128) DEFAULT NULL COMMENT '设备原始令牌，厂家设定',
  `sid` varchar(128) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL COMMENT '云平台发放的访问令牌',
  `active_time` int(10) unsigned DEFAULT NULL,
  `maker_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`device_id`),
  KEY `FK_Reference_1` (`maker_id`),
  KEY `FK_Reference_2` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='车机设备' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `end_cardevice`
--

INSERT INTO `end_cardevice` (`device_id`, `did`, `token`, `sid`, `access_token`, `active_time`, `maker_id`, `user_id`, `status`) VALUES
(1, '2013', '2013', '40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763', '88e19c9001afe4405a080a94b628167a7b96fc9324580086e71dcc028b1e0e7c', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `end_carstatus`
--

CREATE TABLE IF NOT EXISTS `end_carstatus` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '服务器接收到消息的时间',
  `time` int(10) unsigned DEFAULT NULL COMMENT '车机产生数据的时间',
  `longtitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `engine` int(11) DEFAULT NULL,
  `window` int(11) DEFAULT NULL,
  `aircondition` int(11) DEFAULT NULL,
  `totalmile` int(10) unsigned DEFAULT NULL,
  `device_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`status_id`),
  KEY `FK_Reference_3` (`device_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='车机报告的历史状态信息' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `end_carstatus`
--

INSERT INTO `end_carstatus` (`status_id`, `create_time`, `time`, `longtitude`, `latitude`, `engine`, `window`, `aircondition`, `totalmile`, `device_id`) VALUES
(1, 1371458353, 1189898959, 13.378854, 10.276783, 0, NULL, NULL, NULL, NULL),
(2, 1371458397, 1189898959, 13.378854, 10.276783, 0, NULL, NULL, NULL, 1);

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
(45, 0, 'OBDS3数据管理', NULL, NULL, 0, 'vanet_obds3_list', 1374977805, 1374977804, 'OBDS3数据管理', '', '', '', '', 'no', 0, '', NULL),
(2, 22, '参考预算', NULL, NULL, 0, 'cankaoyusuan_list', 1368246926, 1368180735, '参考预算', '', '', '', '', 'yes', 0, '', NULL),
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
(44, 0, 'OBDS12数据管理', NULL, NULL, 0, 'vanet_obds12_list', 1374926292, 1374926290, 'OBDS12数据管理', '', '', '', '', 'no', 0, '', NULL),
(37, 0, '用户/设备交互管理', NULL, NULL, 0, 'udmessage_list', 1371351679, 1371351677, '用户/设备交互管理', '', '', '', '', 'no', 0, '', NULL),
(26, 25, '前台角色列表', NULL, NULL, 0, 'user_role_list', 1369156610, 1369156609, '前台角色列表', '', '', '', '', 'no', 0, '', NULL),
(43, 0, '用户管理', NULL, NULL, 0, 'vanet_user_list', 1374656171, 1374656169, '用户管理', '', '', '', '', 'no', 0, '', NULL),
(36, 0, '车辆状态', NULL, NULL, 0, 'carstatus_list', 1371214157, 1371214155, '车辆状态', '', '', '', '', 'no', 0, '', NULL),
(46, 0, 'Token管理', NULL, NULL, 0, 'vanet_token_list', 1376029271, 1376029269, 'Token管理', '', '', '', '', 'no', 0, '', NULL),
(47, 0, '车辆管理', NULL, NULL, 0, 'vanet_car_list', 1376039590, 1376039588, '车辆管理', '', '', '', '', 'no', 0, '', NULL),
(38, 0, '用户访问历史管理', NULL, NULL, 0, 'accesslog_list', 1371372567, 1371372563, '用户访问历史管理', '', '', '', '', 'no', 0, '', NULL),
(39, 0, 'GPS数据管理', NULL, NULL, 0, 'vanet_gpsdata_list', 1374584871, 1374584869, 'GPS数据管理', '', '', '', '', 'no', 0, '', NULL),
(40, 0, 'OBD设备管理', NULL, NULL, 0, 'vanet_nobd_list', 1374653437, 1374653435, 'OBD设备管理', '', '', '', '', 'no', 0, '', NULL),
(41, 0, 'OBD数据管理', NULL, NULL, 0, 'vanet_obddata_list', 1374654981, 1374654979, 'OBD数据管理', '', '', '', '', 'no', 0, '', NULL),
(48, 0, 'USER-CAR管理', NULL, NULL, 0, 'vanet_usercar_list', 1376039682, 1376039680, 'USER-CAR管理', '', '', '', '', 'no', 0, '', NULL);

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
(17, 0, 'site_name', '车联网云平台', '2013-07-23 15:56:34', 'text', '站点名字', 0);

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
-- 表的结构 `end_event`
--

CREATE TABLE IF NOT EXISTS `end_event` (
  `event_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `wenjuan` longtext NOT NULL,
  `ziping` longtext NOT NULL,
  `huping` longtext NOT NULL,
  `pingjia` longtext NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `end_event`
--

INSERT INTO `end_event` (`event_id`, `teacher_id`, `activity_id`, `create_time`, `status`, `wenjuan`, `ziping`, `huping`, `pingjia`) VALUES
(4, 1, 8, 1369039978, 1, '[{"title":"\\u6211\\u6839\\u636e\\u81ea\\u8eab\\u7279\\u70b9\\uff0c\\u8ba4\\u771f\\u601d\\u8003\\u3002","options":[{"title":"\\u4e00\\u822c","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"\\u826f\\u597d","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]},{"title":"\\u975e\\u5e38\\u597d","points":["\\u6297\\u632b\\u6298\\u80fd\\u529b","","",""]}]},{"title":"hfhfh","options":[{"title":"1123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u4ea4\\u5f80\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u6297\\u632b\\u6298\\u80fd\\u529b"]},{"title":"123","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u5b66\\u4e60\\u80fd\\u529b","\\u81ea\\u63a7\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b"]},{"title":"123","points":["\\u81ea\\u63a7\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u5b66\\u4e60\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b"]}]},{"title":"123123","options":[{"title":"12312","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u5b66\\u4e60\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]}]},{"title":"123123","options":[{"title":"123","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u4ea4\\u5f80\\u80fd\\u529b","","",""]}]},{"title":"123123","options":[{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u5b66\\u4e60\\u80fd\\u529b","",""]},{"title":"123","points":["\\u5b66\\u4e60\\u80fd\\u529b","","",""]}]}]', '[{"title":"\\u6211\\u5bf9\\u5de5\\u4f5c\\u6709\\u72ec\\u7279\\u7684\\u89c1\\u89e3\\u548c\\u5904\\u7406\\u65b9\\u5f0f","points":["\\u4ea4\\u5f80\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u554a\\u554a\\u554a","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","",""]},{"title":"\\u5851\\u6599\\u888b\\u5ba2\\u670d\\u804a\\u51e0\\u53e5","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]}]', '[{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u81ea\\u63a7\\u80fd\\u529b","",""]}]', '[{"title":"\\u6328\\u6253\\u554a","points":["\\u4ea4\\u5f80\\u80fd\\u529b","\\u5b66\\u4e60\\u80fd\\u529b","",""]}]'),
(5, 1, 5, 1368683539, 1, '[{"title":"111","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"222","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"33","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"123123","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"dddd","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]},{"title":"bbb","options":[{"title":"","points":["","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]}]', '[{"title":"","points":["","","",""]}]', '[{"title":"","points":["","","",""]}]', '[{"title":"","points":["","","",""]}]'),
(7, 1, 10, 1369067365, 1, '[{"title":"123","options":[{"title":"1","points":["\\u4e16\\u754c\\u89c2","","",""]},{"title":"2","points":["\\u653f\\u6cbb\\u7acb\\u573a","","",""]},{"title":"3","points":["\\u8d23\\u4efb\\u610f\\u8bc6","","",""]}]},{"title":"321","options":[{"title":"1","points":["\\u56e2\\u961f\\u7cbe\\u795e","","",""]},{"title":"12","points":["\\u5b66\\u4e60\\u80fd\\u529b","","",""]},{"title":"123","points":["\\u6267\\u884c\\u80fd\\u529b","","",""]}]}]', '[{"title":"123","points":["\\u6267\\u884c\\u80fd\\u529b","\\u8d23\\u4efb\\u610f\\u8bc6","",""]},{"title":"321","points":["\\u8d23\\u4efb\\u610f\\u8bc6","\\u4e16\\u754c\\u89c2","",""]}]', '[{"title":"adaf","points":["\\u653f\\u6cbb\\u7acb\\u573a","\\u653f\\u6cbb\\u7acb\\u573a","\\u4e16\\u754c\\u89c2","\\u5b66\\u4e60\\u80fd\\u529b"]},{"title":"asdf","points":["\\u4e16\\u754c\\u89c2","\\u56e2\\u961f\\u7cbe\\u795e","\\u653f\\u6cbb\\u7acb\\u573a",""]}]', '[{"title":"asdf","points":["\\u4e16\\u754c\\u89c2","\\u653f\\u6cbb\\u7acb\\u573a","\\u8d23\\u4efb\\u610f\\u8bc6","\\u56e2\\u961f\\u7cbe\\u795e"]},{"title":"fff","points":["\\u4e16\\u754c\\u89c2","\\u4e16\\u754c\\u89c2","\\u653f\\u6cbb\\u7acb\\u573a","\\u653f\\u6cbb\\u7acb\\u573a"]}]'),
(8, 1, 11, 1369071698, 1, '[{"title":"11","options":[{"title":"","points":["1","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]'),
(9, 1, 11, 1369072046, 1, '[{"title":"11","options":[{"title":"","points":["1","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]'),
(10, 1, 11, 1369212237, 1, '[{"title":"11","options":[{"title":"","points":["1","","",""]},{"title":"","points":["","","",""]},{"title":"","points":["","","",""]}]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]', '[{"title":"1","points":["1","","",""]}]'),
(13, 1, 8, 1369839699, 1, '[{"title":"\\u6211\\u6839\\u636e\\u81ea\\u8eab\\u7279\\u70b9\\uff0c\\u8ba4\\u771f\\u601d\\u8003\\u3002","options":[{"title":"\\u4e00\\u822c","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"\\u826f\\u597d","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]},{"title":"\\u975e\\u5e38\\u597d","points":["\\u6297\\u632b\\u6298\\u80fd\\u529b","","",""]}]},{"title":"hfhfh","options":[{"title":"1123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u4ea4\\u5f80\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u6297\\u632b\\u6298\\u80fd\\u529b"]},{"title":"123","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u5b66\\u4e60\\u80fd\\u529b","\\u81ea\\u63a7\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b"]},{"title":"123","points":["\\u81ea\\u63a7\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u5b66\\u4e60\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b"]}]},{"title":"123123","options":[{"title":"12312","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u5b66\\u4e60\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]}]},{"title":"123123","options":[{"title":"123","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]},{"title":"123123","points":["\\u4ea4\\u5f80\\u80fd\\u529b","","",""]}]},{"title":"123123","options":[{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u5b66\\u4e60\\u80fd\\u529b","",""]},{"title":"123","points":["\\u5b66\\u4e60\\u80fd\\u529b","","",""]}]}]', '[{"title":"\\u6211\\u5bf9\\u5de5\\u4f5c\\u6709\\u72ec\\u7279\\u7684\\u89c1\\u89e3\\u548c\\u5904\\u7406\\u65b9\\u5f0f","points":["\\u4ea4\\u5f80\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u554a\\u554a\\u554a","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","",""]},{"title":"\\u5851\\u6599\\u888b\\u5ba2\\u670d\\u804a\\u51e0\\u53e5","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]}]', '[{"title":"123","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"123","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","","",""]},{"title":"123213","points":["\\u81ea\\u4fe1\\u5fc3","","",""]},{"title":"551515","points":["\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","","",""]}]', '[{"title":"\\u6328\\u6253\\u554a","points":["\\u4ea4\\u5f80\\u80fd\\u529b","\\u5b66\\u4e60\\u80fd\\u529b","",""]}]'),
(14, 1, 12, 1369843379, 1, '[{"title":"\\u662f\\u5426\\u5728\\u6d3b\\u52a8\\u524d\\u6709\\u9488\\u5bf9\\u6027\\u7684\\u51c6\\u5907\\u4e86\\u81ea\\u6211\\u4ecb\\u7ecd\\uff1f","options":[{"title":"\\u662f\\u7684","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u51c6\\u5907\\u4e86\\u4e00\\u5927\\u90e8\\u5206","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u51c6\\u5907\\u4e86\\u4e00\\u4e9b","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u6ca1\\u6709\\u51c6\\u5907","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u9002\\u5e94\\u80fd\\u529b",""]}]},{"title":"\\u9009\\u62e9\\u884c\\u4e1a\\u53ca\\u5c97\\u4f4d\\u7684\\u81ea\\u6211\\u6807\\u51c6\\u662f\\u4ec0\\u4e48\\uff1f\\uff08\\u5141\\u8bb8\\u591a\\u9009\\uff09","options":[{"title":"\\u9002\\u5408\\u81ea\\u8eab\\u4e13\\u4e1a","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]},{"title":"\\u6709\\u8f83\\u597d\\u7684\\u53d1\\u5c55\\u524d\\u666f","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]},{"title":"\\u81ea\\u5df1\\u611f\\u5174\\u8da3","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]},{"title":"\\u6ca1\\u6709\\u6807\\u51c6","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]}]},{"title":"\\u4f60\\u8ba4\\u4e3a\\u8fdb\\u5165\\u516c\\u53f8\\u540e\\uff0c\\u4f60\\u7684\\u54ea\\u4e9b\\u80fd\\u529b\\u4f1a\\u5f97\\u5230\\u63d0\\u9ad8\\uff1f","options":[{"title":"\\u77e5\\u8bc6\\u6c34\\u5e73\\u548c\\u4e13\\u4e1a\\u6280\\u80fd","points":["\\u5b66\\u4e60\\u80fd\\u529b","\\u4e13\\u4e1a\\u77e5\\u8bc6","\\u64cd\\u4f5c\\u6280\\u80fd",""]},{"title":"\\u4e0e\\u4eba\\u4ea4\\u5f80\\u548c\\u6c9f\\u901a\\u7684\\u80fd\\u529b","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b",""]},{"title":"\\u9075\\u5b88\\u516c\\u53f8\\u89c4\\u5b9a\\uff0c\\u6309\\u65f6\\u5b8c\\u6210\\u5de5\\u4f5c","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u7ec4\\u7ec7\\u7eaa\\u5f8b","\\u81ea\\u63a7\\u80fd\\u529b",""]},{"title":"\\u57f9\\u517b\\u81ea\\u4fe1\\u5fc3\\u548c\\u4e0d\\u6015\\u56f0\\u96be\\u7684\\u7cbe\\u795e","points":["\\u9002\\u5e94\\u80fd\\u529b","\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3",""]}]},{"title":"\\u5728\\u6ca1\\u6709\\u5b9e\\u9645\\u5de5\\u4f5c\\u7ecf\\u9a8c\\u7684\\u60c5\\u51b5\\u4e0b\\uff0c\\u5982\\u4f55\\u51c6\\u5907\\u81ea\\u5df1\\u6d3b\\u52a8\\u53ca\\u5b9e\\u4e60\\u7684\\u4ecb\\u7ecd\\uff1f","options":[{"title":"\\u548c\\u5468\\u56f4\\u540c\\u5b66\\u4e00\\u540c\\u8ba8\\u8bba","points":["\\u6267\\u884c\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b",""]},{"title":"\\u5728\\u4e92\\u8054\\u7f51\\u4e0a\\u5bfb\\u627e\\u6848\\u4f8b\\u5e76\\u8fdb\\u884c\\u603b\\u7ed3","points":["\\u6267\\u884c\\u80fd\\u529b","\\u56e2\\u961f\\u7cbe\\u795e","\\u4ea4\\u5f80\\u80fd\\u529b",""]},{"title":"\\u5411\\u8001\\u5e08\\u548c\\u9ad8\\u5e74\\u7ea7\\u5b66\\u957f\\u5b66\\u59d0\\u8be2\\u95ee\\u7ecf\\u9a8c","points":["\\u6267\\u884c\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u521b\\u65b0\\u80fd\\u529b",""]},{"title":"\\u6ca1\\u6709\\u51c6\\u5907","points":["\\u6267\\u884c\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b",""]}]},{"title":"\\u5bf9\\u4e8e\\u548c\\u4e0a\\u7ea7\\u9886\\u5bfc\\u3001\\u540c\\u4e8b\\u4e00\\u540c\\u5de5\\u4f5c\\uff0c\\u4f60\\u505a\\u4e86\\u54ea\\u4e9b\\u51c6\\u5907\\uff1f","options":[{"title":"\\u67e5\\u9605\\u76f8\\u5173\\u4e66\\u7c4d","points":["\\u5408\\u4f5c\\u610f\\u8bc6","\\u56e2\\u961f\\u7cbe\\u795e","\\u4ea4\\u5f80\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b"]},{"title":"\\u5411\\u8001\\u5e08\\u3001\\u5bb6\\u957f\\u8be2\\u95ee\\u7ecf\\u9a8c","points":["\\u5408\\u4f5c\\u610f\\u8bc6","\\u56e2\\u961f\\u7cbe\\u795e","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b"]},{"title":"\\u5728\\u601d\\u60f3\\u4e0a\\u63d0\\u9ad8\\u8ba4\\u8bc6","points":["\\u5408\\u4f5c\\u610f\\u8bc6","\\u521b\\u65b0\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b"]},{"title":"\\u6ca1\\u6709\\u51c6\\u5907","points":["\\u5408\\u4f5c\\u610f\\u8bc6","\\u56e2\\u961f\\u7cbe\\u795e","\\u4ea4\\u5f80\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b"]}]},{"title":"\\u9762\\u8bd5\\u8fc7\\u7a0b\\u4e2d\\u662f\\u5426\\u51fa\\u73b0\\u4e86\\u5931\\u8bef\\uff0c\\u4f60\\u91c7\\u53d6\\u4ec0\\u4e48\\u65b9\\u5f0f\\u89e3\\u51b3\\uff1f","options":[{"title":"\\u662f\\u7684\\uff0c\\u627f\\u8ba4\\u9519\\u8bef\\u5e76\\u5c3d\\u91cf\\u6539\\u8fdb","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u4ea4\\u5f80\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u51fa\\u73b0\\u4e86\\u5931\\u8bef\\uff0c\\u4f46\\u4e0d\\u77e5\\u9053\\u5982\\u4f55\\u89e3\\u51b3","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u4ea4\\u5f80\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u6ca1\\u6709\\u51fa\\u73b0\\u5931\\u8bef","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u4ea4\\u5f80\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u4e0d\\u77e5\\u9053\\u81ea\\u5df1\\u662f\\u5426\\u51fa\\u73b0\\u5931\\u8bef","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u4ea4\\u5f80\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]}]},{"title":"\\u516c\\u53f8\\u7684\\u89c4\\u7ae0\\u5236\\u5ea6\\u4e0e\\u9886\\u5bfc\\u7684\\u5b89\\u6392\\u4e0e\\u81ea\\u5df1\\u610f\\u613f\\u53d1\\u751f\\u77db\\u76fe\\u65f6\\u5982\\u4f55\\u5904\\u7406\\uff1f","options":[{"title":"\\u575a\\u6301\\u81ea\\u5df1\\u610f\\u613f","points":["\\u81ea\\u63a7\\u80fd\\u529b","\\u5de5\\u4f5c\\u6001\\u5ea6","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b",""]},{"title":"\\u9002\\u5ea6\\u8868\\u8fbe\\u81ea\\u5df1\\u610f\\u613f\\u5e76\\u4e0e\\u4e4b\\u534f\\u8c03","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b","\\u5408\\u4f5c\\u610f\\u8bc6",""]},{"title":"\\u653e\\u5f03\\u81ea\\u5df1\\u610f\\u613f","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u81ea\\u4fe1\\u5fc3","\\u6297\\u632b\\u6298\\u80fd\\u529b",""]},{"title":"\\u4e0d\\u77e5\\u9053\\u5982\\u4f55\\u5904\\u7406","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u6297\\u632b\\u6298\\u80fd\\u529b","",""]}]},{"title":"\\u5728\\u5de5\\u4f5c\\u4ee5\\u5916\\u7684\\u95f2\\u6687\\u65f6\\u95f4\\uff0c\\u4f60\\u613f\\u610f\\u4e3a\\u81ea\\u5df1\\u5b89\\u6392\\u54ea\\u4e9b\\u6d3b\\u52a8\\uff1f","options":[{"title":"\\u5b66\\u4e60\\u5916\\u8bed\\u3001\\u8ba1\\u7b97\\u673a\\u77e5\\u8bc6\\uff0c\\u4e3a\\u81ea\\u5df1\\u5145\\u7535","points":["\\u5b66\\u4e60\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","",""]},{"title":"\\u4e0e\\u540c\\u4e8b\\u3001\\u670b\\u53cb\\u4e00\\u8d77\\u5a31\\u4e50\\uff0c\\u6269\\u5927\\u4ea4\\u9645\\u5708","points":["\\u4ea4\\u5f80\\u80fd\\u529b","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","",""]},{"title":"\\u5b8c\\u6210\\u6ca1\\u505a\\u5b8c\\u7684\\u5de5\\u4f5c\\uff0c\\u4fdd\\u6301\\u5145\\u5b9e\\u7684\\u72b6\\u6001","points":["\\u6267\\u884c\\u80fd\\u529b","\\u5de5\\u4f5c\\u6001\\u5ea6","",""]},{"title":"\\u4f11\\u606f\\u548c\\u653e\\u677e\\uff0c\\u4e3a\\u9ad8\\u5f3a\\u5ea6\\u7684\\u5de5\\u4f5c\\u505a\\u51c6\\u5907","points":["\\u81ea\\u63a7\\u80fd\\u529b","\\u5065\\u5eb7\\u72b6\\u51b5","",""]}]},{"title":"\\u4f60\\u8ba4\\u4e3a\\u81ea\\u5df1\\u8fd8\\u5b58\\u5728\\u54ea\\u4e9b\\u7f3a\\u70b9\\u548c\\u4e0d\\u8db3\\uff1f","options":[{"title":"\\u5b66\\u79d1\\u77e5\\u8bc6\\u65b9\\u9762","points":["\\u4e13\\u4e1a\\u77e5\\u8bc6","","",""]},{"title":"\\u4e13\\u4e1a\\u6280\\u80fd\\u65b9\\u9762","points":["\\u64cd\\u4f5c\\u6280\\u80fd","","",""]},{"title":"\\u4eba\\u9645\\u4ea4\\u5f80\\u65b9\\u9762","points":["\\u4ea4\\u5f80\\u80fd\\u529b","","",""]},{"title":"\\u6ca1\\u6709\\u7f3a\\u70b9\\u548c\\u4e0d\\u8db3","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","","",""]}]},{"title":"\\u5982\\u679c\\u4f60\\u6ca1\\u80fd\\u88ab\\u516c\\u53f8\\u5f55\\u53d6\\uff0c\\u4f60\\u4f1a\\u600e\\u4e48\\u505a\\uff1f","options":[{"title":"\\u9a6c\\u4e0a\\u5f00\\u59cb\\u5e94\\u8058\\u4e0b\\u4e00\\u5bb6\\u516c\\u53f8","points":["\\u4ef7\\u503c\\u89c2","\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3",""]},{"title":"\\u603b\\u7ed3\\u7ecf\\u9a8c\\u6559\\u8bad\\uff0c\\u4e89\\u53d6\\u4e0b\\u6b21\\u6210\\u529f","points":["\\u4ef7\\u503c\\u89c2","\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3",""]},{"title":"\\u6d88\\u6c89\\u4e00\\u6bb5\\u65f6\\u95f4","points":["\\u4ef7\\u503c\\u89c2","\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3",""]},{"title":"\\u7ed3\\u679c\\u5bf9\\u6211\\u6765\\u8bf4\\u65e0\\u6240\\u8c13","points":["\\u4ef7\\u503c\\u89c2","\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3",""]}]}]', '[{"title":"\\u6211\\u6839\\u636e\\u81ea\\u8eab\\u7684\\u4e13\\u4e1a\\u7279\\u70b9\\u548c\\u62e9\\u4e1a\\u65b9\\u5411\\u8fdb\\u884c\\u601d\\u8003\\uff0c\\u9009\\u62e9\\u4e86\\u9002\\u5408\\u81ea\\u5df1\\u7684\\u804c\\u4e1a\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]},{"title":"\\u6211\\u80fd\\u8ba4\\u771f\\u5206\\u6790\\u62db\\u8058\\u8005\\u5bf9\\u6211\\u63d0\\u51fa\\u7684\\u95ee\\u9898\\uff0c\\u5e76\\u4f5c\\u51fa\\u56de\\u7b54\\u3002            ","points":["\\u9002\\u5e94\\u80fd\\u529b","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b"]},{"title":"\\u5728\\u8fdb\\u884c\\u81ea\\u6211\\u4ecb\\u7ecd\\u65f6\\uff0c\\u6211\\u80fd\\u7b80\\u8981\\u3001\\u5168\\u9762\\u3001\\u6e05\\u6670\\u7684\\u4ecb\\u7ecd\\u81ea\\u5df1\\u3002            ","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u6267\\u884c\\u80fd\\u529b",""]},{"title":"\\u6211\\u5bf9\\u5de5\\u4f5c\\u6709\\u72ec\\u7279\\u7684\\u89c1\\u89e3\\u548c\\u505a\\u4e8b\\u65b9\\u5f0f\\u3002","points":["\\u521b\\u65b0\\u80fd\\u529b","\\u5de5\\u4f5c\\u6001\\u5ea6","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u6211\\u5bf9\\u62db\\u8058\\u8005\\u7684\\u9700\\u6c42\\u8fdb\\u884c\\u8fc7\\u4e00\\u5b9a\\u7684\\u4e86\\u89e3\\u3002","points":["\\u4ef7\\u503c\\u89c2","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b",""]},{"title":"\\u6211\\u5bf9\\u4e13\\u4e1a\\u89c4\\u5212\\u548c\\u884c\\u4e1a\\u53d1\\u5c55\\u63d0\\u51fa\\u4e86\\u89c1\\u89e3\\uff0c\\u5e76\\u548c\\u62db\\u8058\\u8005\\u8fdb\\u884c\\u4e86\\u6c9f\\u901a\\u3002         ","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b",""]},{"title":"\\u5728\\u5e94\\u8058\\u4e2d\\u9047\\u5230\\u4e86\\u6211\\u6ca1\\u6709\\u8fdb\\u884c\\u51c6\\u5907\\u7684\\u95ee\\u9898\\uff0c\\u6211\\u80fd\\u8bda\\u5b9e\\u544a\\u77e5\\u5e76\\u5c3d\\u91cf\\u56de\\u7b54\\u95ee\\u9898\\u3002","points":["\\u6297\\u632b\\u6298\\u80fd\\u529b","\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u6267\\u884c\\u80fd\\u529b",""]},{"title":"\\u5728\\u548c\\u62db\\u8058\\u8005\\u6301\\u4e0d\\u540c\\u89c2\\u70b9\\u65f6\\uff0c\\u6211\\u80fd\\u51c6\\u786e\\u5e76\\u9002\\u5ea6\\u7684\\u8868\\u8fbe\\u81ea\\u5df1\\u7684\\u89c2\\u70b9\\u3002","points":["\\u81ea\\u63a7\\u80fd\\u529b","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b",""]},{"title":"\\u6211\\u5bf9\\u5e94\\u8058\\u7684\\u804c\\u4f4d\\u63d0\\u51fa\\u4e86\\u81ea\\u5df1\\u7684\\u89c4\\u5212\\u548c\\u671f\\u671b\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","",""]},{"title":"\\u6211\\u5728\\u5e94\\u8058\\u4e2d\\u7a7f\\u7740\\u5f97\\u4f53\\uff0c\\u5bf9\\u5de5\\u4f5c\\u4eba\\u5458\\u6001\\u5ea6\\u826f\\u597d\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u81ea\\u63a7\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]}]', '[{"title":"\\u804c\\u4f4d\\u9009\\u62e9\\u7b26\\u5408\\u5176\\u81ea\\u8eab\\u4f18\\u52bf","points":["\\u4ef7\\u503c\\u89c2","\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u8d23\\u4efb\\u610f\\u8bc6",""]},{"title":"\\u7fa4\\u4f53\\u9762\\u8bd5\\u8868\\u73b0\\u4f18\\u5f02","points":["\\u56e2\\u961f\\u7cbe\\u795e","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u4ea4\\u5f80\\u80fd\\u529b","\\u6297\\u632b\\u6298\\u80fd\\u529b"]},{"title":"\\u505a\\u4e86\\u5145\\u5206\\u9762\\u8bd5\\u51c6\\u5907","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u8d23\\u4efb\\u610f\\u8bc6","\\u6267\\u884c\\u80fd\\u529b"]},{"title":"\\u9762\\u8bd5\\u7ed3\\u679c\\u4e0e\\u5e73\\u65f6\\u8868\\u73b0\\u76f8\\u7b26\\u5408","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u6267\\u884c\\u80fd\\u529b","\\u81ea\\u63a7\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b"]}]', '[{"title":"\\u8be5\\u5b66\\u751f\\u6240\\u9009\\u804c\\u4f4d\\u53ca\\u884c\\u4e1a\\u4e0e\\u5176\\u4e13\\u4e1a\\u5bc6\\u5207\\u76f8\\u5173\\uff0c\\u6709\\u610f\\u613f\\u957f\\u671f\\u4ece\\u4e8b\\u8be5\\u884c\\u4e1a\\u5de5\\u4f5c\\u3002","points":["\\u4ef7\\u503c\\u89c2","","",""]},{"title":"\\u8be5\\u5b66\\u751f\\u81ea\\u6211\\u4ecb\\u7ecd\\u65f6\\u80fd\\u591f\\u7d27\\u6263\\u804c\\u4f4d\\u8981\\u6c42\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","",""]},{"title":"\\u8be5\\u5b66\\u751f\\u5e94\\u8058\\u65f6\\u7740\\u88c5\\u5f97\\u4f53\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u81ea\\u63a7\\u80fd\\u529b","\\u9002\\u5e94\\u80fd\\u529b",""]},{"title":"\\u8be5\\u5b66\\u751f\\u80fd\\u51c6\\u786e\\u3001\\u8be6\\u5b9e\\u7684\\u4ecb\\u7ecd\\u81ea\\u8eab\\u5b9e\\u4e60\\u53ca\\u53c2\\u4e0e\\u5b66\\u751f\\u5de5\\u4f5c\\u60c5\\u51b5\\u3002","points":["\\u8bda\\u5b9e\\u5b88\\u4fe1","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u56e2\\u961f\\u7cbe\\u795e"]},{"title":"\\u8be5\\u5b66\\u751f\\u5bf9\\u81ea\\u8eab\\u804c\\u4e1a\\u53d1\\u5c55\\u89c4\\u5212\\u6e05\\u6670\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u8d23\\u4efb\\u610f\\u8bc6","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b",""]},{"title":"\\u8be5\\u5b66\\u751f\\u5bf9\\u516c\\u53f8\\u53ca\\u884c\\u4e1a\\u53d1\\u5c55\\u63d0\\u51fa\\u4e86\\u5408\\u7406\\u7684\\u7545\\u60f3\\u53ca\\u5efa\\u8bae\\u3002","points":["\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u8d23\\u4efb\\u610f\\u8bc6","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b",""]},{"title":"\\u8be5\\u5b66\\u751f\\u5728\\u7fa4\\u4f53\\u9762\\u8bd5\\u4e2d\\u8868\\u73b0\\u7a81\\u51fa\\u3002","points":["\\u56e2\\u961f\\u7cbe\\u795e","\\u5408\\u4f5c\\u610f\\u8bc6","\\u7ec4\\u7ec7\\u7ba1\\u7406\\u80fd\\u529b","\\u6267\\u884c\\u80fd\\u529b"]},{"title":"\\u8be5\\u5b66\\u751f\\u5bf9\\u8003\\u5b98\\u63d0\\u51fa\\u7684\\u95ee\\u9898\\u6709\\u660e\\u786e\\u7684\\u601d\\u8def\\u53ca\\u6709\\u6548\\u7684\\u89e3\\u51b3\\u529e\\u6cd5\\u3002","points":["\\u521b\\u65b0\\u80fd\\u529b","\\u81ea\\u4fe1\\u5fc3","\\u6297\\u632b\\u6298\\u80fd\\u529b",""]},{"title":"\\u8be5\\u5b66\\u751f\\u5411\\u9762\\u8bd5\\u5b98\\u63d0\\u51fa\\u4e86\\u4e0e\\u804c\\u4f4d\\u3001\\u81ea\\u8eab\\u53d1\\u5c55\\u76f8\\u5173\\u7684\\u79ef\\u6781\\u7684\\u95ee\\u9898\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u4ef7\\u503c\\u89c2","\\u8bed\\u8a00\\u8868\\u8fbe\\u80fd\\u529b","\\u8bda\\u5b9e\\u5b88\\u4fe1"]},{"title":"\\u8be5\\u5b66\\u751f\\u9762\\u8bd5\\u524d\\u540e\\u5bf9\\u8003\\u5b98\\u6709\\u793c\\u8c8c\\u3002","points":["\\u5de5\\u4f5c\\u6001\\u5ea6","\\u9002\\u5e94\\u80fd\\u529b","\\u81ea\\u63a7\\u80fd\\u529b",""]}]');

-- --------------------------------------------------------

--
-- 表的结构 `end_link`
--

CREATE TABLE IF NOT EXISTS `end_link` (
  `link_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `URL` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `click_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1254 ;

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
(1047, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1375712911, ''),
(1048, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1375712913, ' 内容管理&gt;GPS数据管理'),
(1050, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1375713569, ' 内容管理&gt;GPS数据管理'),
(1054, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376029014, ''),
(1055, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376029017, ' 内容管理&gt;OBD设备管理'),
(1056, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376029065, ' 内容管理&gt;OBD设备管理'),
(1057, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1376029093, ' 内容管理&gt;用户访问历史管理'),
(1059, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1376029099, ' 内容管理&gt;车辆状态'),
(1060, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1376029106, ' 内容管理&gt;车载设备管理'),
(1061, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1376029117, ' 内容管理&gt;制造商管理'),
(1062, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=42', 0, 1376029121, ''),
(1063, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1376029125, ' 内容管理&gt;制造商管理'),
(1065, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1376029129, ' 内容管理&gt;OBDS12数据管理'),
(1066, 38, 'admin', 'admin.php?p=admin', 1, 1376029209, ' 管理员'),
(1067, 38, 'rights', 'admin.php?p=rights', 1, 1376029211, '角色/权限'),
(1068, 38, 'rights', 'admin.php?p=rights', 1, 1376029212, '角色/权限'),
(1069, 38, 'category', 'admin.php?p=category', 1, 1376029221, ' 栏目管理'),
(1070, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376029222, ''),
(35, 0, 'login', '/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1371104081, ''),
(36, 0, 'login', '/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1371104082, ''),
(1071, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376029222, ''),
(1072, 38, 'category', 'admin.php?p=category', 1, 1376029228, ' 栏目管理'),
(1074, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=34', 0, 1376029234, ''),
(1075, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=35', 0, 1376029240, ''),
(1076, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1376029269, ''),
(1077, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=46', 0, 1376029269, ''),
(1078, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=46', 0, 1376029271, ''),
(1079, 38, 'category', 'admin.php?p=category', 1, 1376029273, ' 栏目管理'),
(1080, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376029273, ''),
(1081, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376029276, ''),
(1082, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376029278, ' 内容管理&gt;Token管理'),
(1083, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376029377, ' 内容管理&gt;OBD设备管理'),
(1084, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376029463, ' 内容管理&gt;Token管理'),
(1087, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1376029961, ''),
(1088, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376029962, ' 内容管理&gt;用户管理'),
(1090, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376038488, ' 内容管理&gt;用户管理'),
(1091, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1376038490, ''),
(1092, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1376038506, ''),
(1093, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376038508, ' 内容管理&gt;用户管理'),
(1095, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=40', 0, 1376038512, ''),
(1096, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=40', 0, 1376038567, ''),
(1097, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=40', 0, 1376038574, ''),
(1098, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376038576, ' 内容管理&gt;OBD设备管理'),
(1101, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=43&item_id=1', 0, 1376038597, ''),
(1102, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=43', 0, 1376038603, ''),
(1103, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=43', 0, 1376038621, ''),
(1104, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376038622, ' 内容管理&gt;用户管理'),
(1106, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376038640, ' 内容管理&gt;Token管理'),
(1107, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376038641, ' 内容管理&gt;Token管理'),
(1108, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1376039544, ' 内容管理&gt;车辆状态'),
(1111, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1376039557, ' 内容管理&gt;用户访问历史管理'),
(1115, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1376039570, ''),
(1116, 38, 'category', 'admin.php?p=category', 1, 1376039571, ' 栏目管理'),
(1117, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376039572, ''),
(1118, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1376039588, ''),
(1119, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=47', 0, 1376039588, ''),
(1120, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=47', 0, 1376039590, ''),
(1121, 38, 'category', 'admin.php?p=category', 1, 1376039592, ' 栏目管理'),
(1123, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376039594, ''),
(1124, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=47', 0, 1376039597, ''),
(1125, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376039602, ''),
(1126, 38, 'admin', 'admin.php?p=admin', 1, 1376039603, ' 管理员'),
(1127, 38, 'rights', 'admin.php?p=rights', 1, 1376039605, '角色/权限'),
(1128, 38, 'rights', 'admin.php?p=rights', 1, 1376039607, '角色/权限'),
(1130, 38, 'rights', 'admin.php?p=rights', 1, 1376039616, '角色/权限'),
(1133, 38, 'rights', 'admin.php?p=rights', 1, 1376039629, '角色/权限'),
(1134, 38, 'category', 'admin.php?p=category', 1, 1376039632, ' 栏目管理'),
(1135, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376039633, ''),
(1136, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376039655, ''),
(1137, 38, 'category', 'admin.php?p=category', 1, 1376039660, ' 栏目管理'),
(1139, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1376039680, ''),
(1140, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=48', 0, 1376039680, ''),
(1141, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=48', 0, 1376039682, ''),
(1142, 38, 'category', 'admin.php?p=category', 1, 1376039683, ' 栏目管理'),
(1143, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376039684, ''),
(1144, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376039685, ''),
(1145, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376039687, ' 内容管理&gt;USER-CAR管理'),
(1148, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376039709, ' 内容管理&gt;USER-CAR管理'),
(1151, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_token&id=1', 0, 1376039928, ''),
(1152, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376039956, ' 内容管理&gt;USER-CAR管理'),
(1153, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_usercar&id=1', 0, 1376039964, ''),
(1154, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_usercar&id=2', 0, 1376039966, ''),
(1155, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376039982, ' 内容管理&gt;车辆管理'),
(1157, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376040233, ' 内容管理&gt;车辆管理'),
(1159, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376040327, ' 内容管理&gt;车辆管理'),
(1160, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376040597, ' 内容管理&gt;车辆管理'),
(1161, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=47&item_id=10', 0, 1376040601, ''),
(1162, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376040604, ' 内容管理&gt;车辆管理'),
(1166, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376097422, ''),
(1167, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376097424, ' 内容管理&gt;车辆管理'),
(1168, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376097454, ' 内容管理&gt;USER-CAR管理'),
(1171, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_car&id=2', 0, 1376097472, ''),
(1172, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_car&id=3', 0, 1376097475, ''),
(1173, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376097706, ' 内容管理&gt;OBD设备管理'),
(1176, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376099968, ' 内容管理&gt;用户管理'),
(1178, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1376099983, ''),
(1179, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376099984, ' 内容管理&gt;用户管理'),
(1182, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=40', 0, 1376100003, ''),
(1183, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376100005, ' 内容管理&gt;OBD设备管理'),
(1184, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376100060, ' 内容管理&gt;Token管理'),
(1186, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376100328, ' 内容管理&gt;USER-CAR管理'),
(1187, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=42', 0, 1376100339, ''),
(1188, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376100341, ' 内容管理&gt;USER-CAR管理'),
(1189, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376100353, ' 内容管理&gt;OBD设备管理'),
(1190, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376101016, ' 内容管理&gt;车辆管理'),
(1192, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376101058, ' 内容管理&gt;车辆管理'),
(1193, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376101136, ' 内容管理&gt;OBD设备管理'),
(1194, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=40&item_id=1', 0, 1376101153, ''),
(1195, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=40', 0, 1376101157, ''),
(1196, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376101158, ' 内容管理&gt;OBD设备管理'),
(1197, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376101162, ' 内容管理&gt;OBD设备管理'),
(1199, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376102046, ' 内容管理&gt;车辆管理'),
(1201, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=40&item_id=1', 0, 1376102115, ''),
(1202, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=40', 0, 1376102119, ''),
(1203, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102121, ' 内容管理&gt;OBD设备管理'),
(1205, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102137, ' 内容管理&gt;OBD设备管理'),
(1208, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376102312, ' 内容管理&gt;车辆管理'),
(1209, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102315, ' 内容管理&gt;OBD设备管理'),
(1210, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=40&item_id=1', 0, 1376102816, ''),
(1211, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=40', 0, 1376102822, ''),
(1212, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102824, ' 内容管理&gt;OBD设备管理'),
(1214, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102830, ' 内容管理&gt;OBD设备管理'),
(1215, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102848, ' 内容管理&gt;OBD设备管理'),
(1216, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=40&item_id=1', 0, 1376102872, ''),
(1217, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=40', 0, 1376102875, ''),
(1218, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102876, ' 内容管理&gt;OBD设备管理'),
(1221, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376103853, ' 内容管理&gt;车辆管理'),
(1222, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376103894, ' 内容管理&gt;车辆管理'),
(1225, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376105345, ' 内容管理&gt;车辆管理'),
(1227, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105358, ' 内容管理&gt;OBD设备管理'),
(1229, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105393, ' 内容管理&gt;OBD设备管理'),
(1231, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105611, ' 内容管理&gt;USER-CAR管理'),
(1233, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=4&category_id=48', 0, 1376105620, ''),
(1234, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105622, ' 内容管理&gt;USER-CAR管理'),
(1236, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105652, ' 内容管理&gt;OBD设备管理'),
(1238, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105713, ' 内容管理&gt;OBD设备管理'),
(1239, 38, 'category', 'admin.php?p=category', 1, 1376105715, ' 栏目管理'),
(1240, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376105716, ''),
(1241, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=42', 0, 1376105720, ''),
(1242, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1376105722, ''),
(1243, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105724, ' 内容管理&gt;USER-CAR管理'),
(1244, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105741, ' 内容管理&gt;OBD设备管理'),
(1245, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105774, ' 内容管理&gt;USER-CAR管理'),
(1246, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105846, ' 内容管理&gt;USER-CAR管理'),
(1247, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=48&item_id=2', 0, 1376105886, ''),
(1248, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=2&category_id=48', 0, 1376105889, ''),
(1249, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105891, ' 内容管理&gt;USER-CAR管理'),
(1251, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=2&category_id=48', 0, 1376105905, ''),
(1252, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105906, ' 内容管理&gt;USER-CAR管理'),
(1253, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105913, ' 内容管理&gt;OBD设备管理'),
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
(596, 38, 'category', 'admin.php?p=category', 1, 1371372522, ' 栏目管理'),
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
(620, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1371378932, ' 内容管理&gt;制造商管理');
INSERT INTO `end_log` (`log_id`, `admin_id`, `controller`, `url`, `menu`, `time`, `info`) VALUES
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
(671, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374584804, ''),
(672, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1374584806, ''),
(673, 38, '', '/vanet/vanet/admin.php?', 0, 1374584806, ''),
(674, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374584808, ''),
(675, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374584856, ''),
(676, 38, 'category', 'admin.php?p=category', 1, 1374584858, ' 栏目管理'),
(677, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374584859, ''),
(678, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374584869, ''),
(679, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=39', 0, 1374584869, ''),
(680, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=39', 0, 1374584871, ''),
(681, 38, 'category', 'admin.php?p=category', 1, 1374584872, ' 栏目管理'),
(682, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374584873, ''),
(683, 38, 'admin', 'admin.php?p=admin', 1, 1374584874, ' 管理员'),
(684, 38, 'rights', 'admin.php?p=rights', 1, 1374584876, '角色/权限'),
(685, 38, 'rights', 'admin.php?p=rights', 1, 1374584886, '角色/权限'),
(686, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374584891, ''),
(687, 38, 'rights', 'admin.php?p=rights', 1, 1374584894, '角色/权限'),
(688, 38, 'rights', 'admin.php?p=rights', 1, 1374584896, '角色/权限'),
(689, 38, '', '/vanet/vanet/admin.php', 0, 1374584900, ''),
(690, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374584903, ''),
(691, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374584907, ''),
(692, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374584985, ''),
(693, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374584987, ''),
(694, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374584989, ''),
(695, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374585042, ' 内容管理&gt;GPS数据管理'),
(696, 38, 'category', 'admin.php?p=category', 1, 1374585461, ' 栏目管理'),
(697, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374585462, ''),
(698, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374585463, ''),
(699, 38, 'admin', 'admin.php?p=admin', 1, 1374585464, ' 管理员'),
(700, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374585466, ''),
(701, 38, '', '/vanet/vanet/admin.php', 0, 1374585745, ''),
(702, 38, 'item', '/dev/vanet2/admin.php?p=item', 0, 1374585831, ''),
(703, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374585835, ' 内容管理&gt;GPS数据管理'),
(704, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1374585838, ' 内容管理&gt;用户访问历史管理'),
(705, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374585848, ' 内容管理&gt;GPS数据管理'),
(706, 38, 'category', 'admin.php?p=category', 1, 1374585851, ' 栏目管理'),
(707, 38, 'category', '/dev/vanet2/admin.php?p=category&action=ajax_get', 0, 1374585852, ''),
(708, 38, 'config', '/dev/vanet2/admin.php?p=config', 0, 1374585853, ''),
(709, 38, 'ajax', '/dev/vanet2/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374585859, ''),
(710, 38, 'config', '/dev/vanet2/admin.php?p=config', 0, 1374585861, ''),
(711, 38, 'ajax', '/dev/vanet2/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374585866, ''),
(712, 38, 'admin', 'admin.php?p=admin', 1, 1374585870, ' 管理员'),
(713, 38, 'config', '/dev/vanet2/admin.php?p=config', 0, 1374585872, ''),
(714, 38, 'admin', 'admin.php?p=admin', 1, 1374585874, ' 管理员'),
(715, 38, 'extension', '/dev/vanet2/admin.php?p=extension', 0, 1374585877, ''),
(716, 38, '', '/dev/vanet2/admin.php', 0, 1374585882, ''),
(717, 38, 'item', '/dev/vanet2/admin.php?p=item', 0, 1374585884, ''),
(718, 38, '', '/vanet/vanet/admin.php', 0, 1374587383, ''),
(719, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374587387, ''),
(720, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374587389, ' 内容管理&gt;GPS数据管理'),
(721, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374588111, ' 内容管理&gt;GPS数据管理'),
(722, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374588224, ' 内容管理&gt;GPS数据管理'),
(723, 38, '', '/vanet/vanet/admin.php', 0, 1374593288, ''),
(724, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374593290, ''),
(725, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374593825, ''),
(726, 38, 'category', 'admin.php?p=category', 1, 1374593826, ' 栏目管理'),
(727, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374593827, ''),
(728, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374593828, ''),
(729, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374593829, ' 内容管理&gt;GPS数据管理'),
(730, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374593918, ''),
(731, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=1', 0, 1374593923, ''),
(732, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374593926, ''),
(733, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=1', 0, 1374593931, ''),
(734, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374593933, ''),
(735, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594078, ''),
(736, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374594083, ''),
(737, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594085, ''),
(738, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374594088, ''),
(739, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594089, ''),
(740, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374594091, ''),
(741, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594093, ' 内容管理&gt;GPS数据管理'),
(742, 38, 'item', 'admin.php?p=item&category_id=37', 1, 1374594096, ' 内容管理&gt;用户/设备交互管理'),
(743, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1374594098, ' 内容管理&gt;用户访问历史管理'),
(744, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594100, ' 内容管理&gt;GPS数据管理'),
(745, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594104, ''),
(746, 38, 'admin', 'admin.php?p=admin', 1, 1374594105, ' 管理员'),
(747, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374594107, ''),
(748, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374594110, ''),
(749, 38, '', '/vanet/vanet/admin.php', 0, 1374594216, ''),
(750, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594218, ' 内容管理&gt;GPS数据管理'),
(751, 38, 'admin', 'admin.php?p=admin', 1, 1374594237, ' 管理员'),
(752, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374594239, ''),
(753, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374594520, ''),
(754, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594522, ' 内容管理&gt;GPS数据管理'),
(755, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594582, ' 内容管理&gt;GPS数据管理'),
(756, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374594611, ' 内容管理&gt;GPS数据管理'),
(757, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594983, ''),
(758, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374594988, ''),
(759, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594990, ''),
(760, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=update&table=config&column=value&id=17', 0, 1374594994, ''),
(761, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374594997, ''),
(762, 38, 'admin', 'admin.php?p=admin', 1, 1374595000, ' 管理员'),
(763, 38, 'extension', '/vanet/vanet/admin.php?p=extension', 0, 1374595001, ''),
(764, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374595042, ''),
(765, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374595045, ' 内容管理&gt;GPS数据管理'),
(766, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374595099, ' 内容管理&gt;GPS数据管理'),
(767, 38, '', '/vanet/vanet/admin.php', 0, 1374595196, ''),
(768, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374650936, ''),
(769, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1374650938, ''),
(770, 38, '', '/vanet/vanet/admin.php?', 0, 1374650938, ''),
(771, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374650940, ''),
(772, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374650942, ' 内容管理&gt;GPS数据管理'),
(773, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=39&item_id=85', 0, 1374650947, ''),
(774, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=85&category_id=39', 0, 1374650952, ''),
(775, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374650954, ' 内容管理&gt;GPS数据管理'),
(776, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=39&item_id=85', 0, 1374650963, ''),
(777, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374650966, ' 内容管理&gt;GPS数据管理'),
(778, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374652676, ' 内容管理&gt;GPS数据管理'),
(779, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374652680, ' 内容管理&gt;GPS数据管理'),
(780, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374652710, ' 内容管理&gt;GPS数据管理'),
(781, 38, '', '/vanet/vanet/admin.php', 0, 1374653317, ''),
(782, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653319, ''),
(783, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653335, ''),
(784, 38, 'admin', 'admin.php?p=admin', 1, 1374653340, ' 管理员'),
(785, 38, 'rights', 'admin.php?p=rights', 1, 1374653343, '角色/权限'),
(786, 38, 'rights', 'admin.php?p=rights', 1, 1374653349, '角色/权限'),
(787, 38, 'category', 'admin.php?p=category', 1, 1374653424, ' 栏目管理'),
(788, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374653425, ''),
(789, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374653435, ''),
(790, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=40', 0, 1374653435, ''),
(791, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=40', 0, 1374653437, ''),
(792, 38, 'category', 'admin.php?p=category', 1, 1374653439, ' 栏目管理'),
(793, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374653439, ''),
(794, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653441, ''),
(795, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=40', 0, 1374653442, ''),
(796, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653445, ''),
(797, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=40', 0, 1374653456, ''),
(798, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653459, ''),
(799, 38, 'admin', 'admin.php?p=admin', 1, 1374653467, ' 管理员'),
(800, 38, 'rights', 'admin.php?p=rights', 1, 1374653468, '角色/权限'),
(801, 38, 'rights', 'admin.php?p=rights', 1, 1374653471, '角色/权限'),
(802, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374653475, ''),
(803, 38, 'rights', 'admin.php?p=rights', 1, 1374653478, '角色/权限'),
(804, 38, 'rights', 'admin.php?p=rights', 1, 1374653480, '角色/权限'),
(805, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374653485, ''),
(806, 38, 'rights', 'admin.php?p=rights', 1, 1374653488, '角色/权限'),
(807, 38, '', '/vanet/vanet/admin.php', 0, 1374653491, ''),
(808, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374653492, ''),
(809, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374653494, ' 内容管理&gt;OBD设备管理'),
(810, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=40', 0, 1374653497, ''),
(811, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=40', 0, 1374653508, ''),
(812, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374653510, ' 内容管理&gt;OBD设备管理'),
(813, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374653634, ' 内容管理&gt;GPS数据管理'),
(814, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374653636, ' 内容管理&gt;OBD设备管理'),
(815, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374654921, ''),
(816, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=39', 0, 1374654955, ''),
(817, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374654962, ' 内容管理&gt;GPS数据管理'),
(818, 38, 'category', 'admin.php?p=category', 1, 1374654965, ' 栏目管理'),
(819, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374654966, ''),
(820, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374654979, ''),
(821, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=41', 0, 1374654979, ''),
(822, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=41', 0, 1374654981, ''),
(823, 38, 'category', 'admin.php?p=category', 1, 1374654982, ' 栏目管理'),
(824, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374654983, ''),
(825, 38, 'admin', 'admin.php?p=admin', 1, 1374654986, ' 管理员'),
(826, 38, 'rights', 'admin.php?p=rights', 1, 1374654988, '角色/权限'),
(827, 38, 'rights', 'admin.php?p=rights', 1, 1374654990, '角色/权限'),
(828, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374654993, ''),
(829, 38, 'rights', 'admin.php?p=rights', 1, 1374654996, '角色/权限'),
(830, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374654998, ''),
(831, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374654999, ' 内容管理&gt;OBD数据管理'),
(832, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374655021, ' 内容管理&gt;OBD数据管理'),
(833, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374655047, ' 内容管理&gt;OBD数据管理'),
(834, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=41', 0, 1374655053, ''),
(835, 38, 'admin', 'admin.php?p=admin', 1, 1374655958, ' 管理员'),
(836, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374655960, ''),
(837, 38, 'category', 'admin.php?p=category', 1, 1374655962, ' 栏目管理'),
(838, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374655963, ''),
(839, 38, 'admin', 'admin.php?p=admin', 1, 1374655964, ' 管理员'),
(840, 38, 'rights', 'admin.php?p=rights', 1, 1374655966, '角色/权限'),
(841, 38, 'rights', 'admin.php?p=rights', 1, 1374655968, '角色/权限'),
(842, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374655973, ''),
(843, 38, 'rights', 'admin.php?p=rights', 1, 1374655976, '角色/权限'),
(844, 38, 'category', 'admin.php?p=category', 1, 1374655978, ' 栏目管理'),
(845, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374655978, ''),
(846, 38, 'config', '/vanet/vanet/admin.php?p=config', 0, 1374655980, ''),
(847, 38, 'category', 'admin.php?p=category', 1, 1374655984, ' 栏目管理'),
(848, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374655985, ''),
(849, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374655998, ''),
(850, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=42', 0, 1374655998, ''),
(851, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=42', 0, 1374656000, ''),
(852, 38, 'category', 'admin.php?p=category', 1, 1374656003, ' 栏目管理'),
(853, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656004, ''),
(854, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374656005, ''),
(855, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374656011, ' 内容管理&gt;OBD数据管理'),
(856, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=41', 0, 1374656013, ''),
(857, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=41', 0, 1374656022, ''),
(858, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=41', 0, 1374656066, ''),
(859, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374656068, ' 内容管理&gt;OBD数据管理'),
(860, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656077, ' 内容管理&gt;USER-OBD'),
(861, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=1', 0, 1374656083, ''),
(862, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656088, ' 内容管理&gt;USER-OBD'),
(863, 38, 'category', 'admin.php?p=category', 1, 1374656100, ' 栏目管理'),
(864, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656102, ''),
(865, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=25', 0, 1374656109, ''),
(866, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=1', 0, 1374656118, ''),
(867, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get&category_id=22&depth=1', 0, 1374656121, ''),
(868, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=22', 0, 1374656124, ''),
(869, 38, 'category', 'admin.php?p=category', 1, 1374656128, ' 栏目管理'),
(870, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656130, ''),
(871, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=category&id=28', 0, 1374656133, ''),
(872, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374656169, ''),
(873, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=43', 0, 1374656169, ''),
(874, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=43', 0, 1374656171, ''),
(875, 38, 'category', 'admin.php?p=category', 1, 1374656174, ' 栏目管理'),
(876, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374656174, ''),
(877, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374656176, ''),
(878, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374656179, ' 内容管理&gt;用户管理'),
(879, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1374656188, ''),
(880, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656205, ' 内容管理&gt;USER-OBD'),
(881, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1374656207, ''),
(882, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1374656231, ''),
(883, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1374656300, ''),
(884, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=43', 0, 1374656309, ''),
(885, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374656312, ' 内容管理&gt;用户管理'),
(886, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656316, ' 内容管理&gt;USER-OBD'),
(887, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=42', 0, 1374656319, ''),
(888, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=42', 0, 1374656324, ''),
(889, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656327, ' 内容管理&gt;USER-OBD'),
(890, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=42', 0, 1374656331, ''),
(891, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656334, ' 内容管理&gt;USER-OBD'),
(892, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374656337, ' 内容管理&gt;OBD数据管理'),
(893, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374656340, ' 内容管理&gt;OBD设备管理'),
(894, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=40', 0, 1374656345, ''),
(895, 38, 'item', '/vanet/vanet/admin.php?m=new_item&p=item&category_id=40', 0, 1374656351, ''),
(896, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374656354, ' 内容管理&gt;OBD设备管理'),
(897, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656358, ' 内容管理&gt;USER-OBD'),
(898, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=42&item_id=1', 0, 1374656362, ''),
(899, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=42', 0, 1374656367, ''),
(900, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656370, ' 内容管理&gt;USER-OBD'),
(901, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=42&item_id=1', 0, 1374656375, ''),
(902, 38, 'item', '/vanet/vanet/admin.php?m=edit_item&p=item&item_id=1&category_id=42', 0, 1374656387, ''),
(903, 38, 'item', 'admin.php?p=item&category_id=42', 1, 1374656390, ' 内容管理&gt;USER-OBD'),
(904, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374671868, ' 内容管理&gt;OBD数据管理'),
(905, 38, 'item', 'admin.php?p=item&category_id=34', 1, 1374671875, ' 内容管理&gt;制造商管理'),
(906, 38, 'item', 'admin.php?p=item&category_id=35', 1, 1374671881, ' 内容管理&gt;车载设备管理'),
(907, 38, '', '/vanet/vanet/admin.php', 0, 1374671886, ''),
(908, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=1', 0, 1374671902, ''),
(909, 38, '', '/vanet/vanet/admin.php', 0, 1374671906, ''),
(910, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374671910, ''),
(911, 38, '', '/vanet/vanet/admin.php', 0, 1374671913, ''),
(912, 38, '', '/vanet/vanet/admin.php', 0, 1374671917, ''),
(913, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374671923, ''),
(914, 38, '', '/vanet/vanet/admin.php', 0, 1374671927, ''),
(915, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374671935, ''),
(916, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=28', 0, 1374673746, ''),
(917, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=41', 0, 1374673750, ''),
(918, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374673753, ' 内容管理&gt;GPS数据管理'),
(919, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374673759, ' 内容管理&gt;OBD设备管理'),
(920, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=40&item_id=1', 0, 1374673762, ''),
(921, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1374673769, ' 内容管理&gt;OBD数据管理'),
(922, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1374673776, ' 内容管理&gt;车辆状态'),
(923, 38, 'item', 'admin.php?p=item&category_id=36', 1, 1374678248, ' 内容管理&gt;车辆状态'),
(924, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374926262, ''),
(925, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1374926263, ''),
(926, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1374926265, ''),
(927, 38, '', '/vanet/vanet/admin.php?', 0, 1374926266, ''),
(928, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374926268, ''),
(929, 38, 'category', 'admin.php?p=category', 1, 1374926271, ' 栏目管理'),
(930, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374926272, ''),
(931, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374926290, ''),
(932, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=44', 0, 1374926290, ''),
(933, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=44', 0, 1374926292, ''),
(934, 38, 'category', 'admin.php?p=category', 1, 1374926294, ' 栏目管理'),
(935, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374926294, ''),
(936, 38, 'admin', 'admin.php?p=admin', 1, 1374926295, ' 管理员'),
(937, 38, 'rights', 'admin.php?p=rights', 1, 1374926297, '角色/权限'),
(938, 38, 'rights', 'admin.php?p=rights', 1, 1374926300, '角色/权限'),
(939, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374926311, ''),
(940, 38, 'rights', 'admin.php?p=rights', 1, 1374926313, '角色/权限'),
(941, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374926315, ''),
(942, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374926316, ' 内容管理&gt;OBDS12数据管理'),
(943, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=44', 0, 1374926319, ''),
(944, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374926322, ' 内容管理&gt;OBDS12数据管理'),
(945, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374926592, ' 内容管理&gt;OBDS12数据管理'),
(946, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374926949, ' 内容管理&gt;OBDS12数据管理'),
(947, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1374977048, ' 内容管理&gt;用户管理'),
(948, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374977051, ' 内容管理&gt;OBDS12数据管理'),
(949, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374977760, ''),
(950, 38, 'category', 'admin.php?p=category', 1, 1374977762, ' 栏目管理'),
(951, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374977763, ''),
(952, 38, 'category', 'admin.php?p=category', 1, 1374977790, ' 栏目管理'),
(953, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374977791, ''),
(954, 38, 'category', '/vanet/vanet/admin.php?m=new_category&p=category&category_id=0', 0, 1374977804, ''),
(955, 38, 'category', '/vanet/vanet/admin.php?p=category&action=edit_category&category_id=45', 0, 1374977804, ''),
(956, 38, 'category', '/vanet/vanet/admin.php?m=edit_category&p=category&category_id=45', 0, 1374977805, ''),
(957, 38, 'category', 'admin.php?p=category', 1, 1374977807, ' 栏目管理'),
(958, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1374977807, ''),
(959, 38, 'admin', 'admin.php?p=admin', 1, 1374977808, ' 管理员'),
(960, 38, 'rights', 'admin.php?p=rights', 1, 1374977812, '角色/权限'),
(961, 38, 'rights', 'admin.php?p=rights', 1, 1374977813, '角色/权限'),
(962, 38, 'rights', 'admin.php?p=rights', 1, 1374977837, '角色/权限'),
(963, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1374977842, ''),
(964, 38, 'rights', 'admin.php?p=rights', 1, 1374977845, '角色/权限'),
(965, 38, 'item', '/vanet/vanet/admin.php?p=item', 0, 1374977863, ''),
(966, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1374977865, ' 内容管理&gt;OBDS3数据管理'),
(967, 38, 'item', 'admin.php?p=item&category_id=45', 1, 1374978804, ' 内容管理&gt;OBDS3数据管理'),
(968, 38, '', '/vanet/vanet/admin.php', 0, 1374982030, ''),
(969, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374984575, ' 内容管理&gt;OBDS12数据管理'),
(970, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374984671, ' 内容管理&gt;OBDS12数据管理'),
(971, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374984683, ' 内容管理&gt;OBD设备管理'),
(972, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=42', 0, 1374984698, ''),
(973, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374984700, ' 内容管理&gt;OBD设备管理'),
(974, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374984729, ' 内容管理&gt;OBDS12数据管理'),
(975, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_obds12&id=1', 0, 1374984733, ''),
(976, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_obds12&id=2', 0, 1374984735, ''),
(977, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374985346, ' 内容管理&gt;GPS数据管理'),
(978, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374985396, ' 内容管理&gt;GPS数据管理'),
(979, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374985407, ' 内容管理&gt;OBDS12数据管理'),
(980, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1374985412, ' 内容管理&gt;GPS数据管理'),
(981, 38, 'item', 'admin.php?p=item&category_id=37', 1, 1374985614, ' 内容管理&gt;用户/设备交互管理'),
(982, 38, 'item', 'admin.php?p=item&category_id=38', 1, 1374985616, ' 内容管理&gt;用户访问历史管理'),
(983, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1374985618, ' 内容管理&gt;OBD设备管理'),
(984, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996511, ' 内容管理&gt;OBDS12数据管理'),
(985, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996526, ' 内容管理&gt;OBDS12数据管理'),
(986, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996546, ' 内容管理&gt;OBDS12数据管理'),
(987, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996552, ' 内容管理&gt;OBDS12数据管理'),
(988, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996578, ' 内容管理&gt;OBDS12数据管理'),
(989, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996585, ' 内容管理&gt;OBDS12数据管理'),
(990, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996623, ' 内容管理&gt;OBDS12数据管理'),
(991, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996707, ' 内容管理&gt;OBDS12数据管理'),
(992, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374996759, ' 内容管理&gt;OBDS12数据管理'),
(993, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1374997767, ' 内容管理&gt;OBDS12数据管理'),
(994, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375006887, ' 内容管理&gt;OBDS12数据管理'),
(995, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375006928, ' 内容管理&gt;OBDS12数据管理'),
(996, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007062, ' 内容管理&gt;OBDS12数据管理'),
(997, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007114, ' 内容管理&gt;OBDS12数据管理'),
(998, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007153, ' 内容管理&gt;OBDS12数据管理'),
(999, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007579, ' 内容管理&gt;OBDS12数据管理'),
(1000, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007660, ' 内容管理&gt;OBDS12数据管理'),
(1001, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007685, ' 内容管理&gt;OBDS12数据管理'),
(1002, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375007720, ' 内容管理&gt;OBDS12数据管理'),
(1003, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375008568, ' 内容管理&gt;OBDS12数据管理'),
(1004, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1375173637, ''),
(1005, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1375173640, ''),
(1006, 38, '', '/vanet/vanet/admin.php?', 0, 1375173640, ''),
(1007, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1375174146, ' 内容管理&gt;GPS数据管理'),
(1008, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1375175272, ' 内容管理&gt;GPS数据管理'),
(1009, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1375175353, ' 内容管理&gt;GPS数据管理'),
(1010, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1375175439, ' 内容管理&gt;OBD数据管理'),
(1011, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1375175448, ' 内容管理&gt;OBD设备管理'),
(1012, 38, 'item', 'admin.php?p=item&category_id=41', 1, 1375175450, ' 内容管理&gt;OBD数据管理'),
(1013, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375175453, ' 内容管理&gt;OBDS12数据管理'),
(1014, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375175510, ' 内容管理&gt;OBDS12数据管理'),
(1015, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1375175544, ' 内容管理&gt;用户管理'),
(1016, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375175547, ' 内容管理&gt;OBDS12数据管理'),
(1017, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1375179383, ' 内容管理&gt;用户管理'),
(1018, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179386, ' 内容管理&gt;OBDS12数据管理'),
(1019, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179531, ' 内容管理&gt;OBDS12数据管理'),
(1020, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179553, ' 内容管理&gt;OBDS12数据管理'),
(1021, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179567, ' 内容管理&gt;OBDS12数据管理'),
(1022, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179718, ' 内容管理&gt;OBDS12数据管理'),
(1023, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179792, ' 内容管理&gt;OBDS12数据管理'),
(1024, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375179860, ''),
(1025, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375179879, ' 内容管理&gt;OBDS12数据管理'),
(1026, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375180094, ' 内容管理&gt;OBDS12数据管理'),
(1027, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180200, ''),
(1028, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180216, ''),
(1029, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180235, ''),
(1030, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180279, ''),
(1031, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180522, ''),
(1032, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180540, ''),
(1033, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180739, ''),
(1034, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180884, ''),
(1035, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180934, ''),
(1036, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180955, ''),
(1037, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375180984, ''),
(1038, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375181003, ''),
(1039, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375181050, ''),
(1040, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375181062, ''),
(1041, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375181081, ''),
(1042, 38, 'item', '/vanet/vanet/admin.php?p=item&action=view_item&category_id=44&item_id=252', 0, 1375181109, ''),
(1043, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375181112, ' 内容管理&gt;OBDS12数据管理'),
(1044, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1375712899, ''),
(1045, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1375712904, ''),
(1046, 38, '', '/vanet/vanet/admin.php?', 0, 1375712904, ''),
(1049, 38, 'item', 'admin.php?p=item&category_id=44', 1, 1375712920, ' 内容管理&gt;OBDS12数据管理'),
(1051, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1376029004, ''),
(1052, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1376029007, ''),
(1053, 38, '', '/vanet/vanet/admin.php?', 0, 1376029007, ''),
(1058, 38, 'item', 'admin.php?p=item&category_id=37', 1, 1376029097, ' 内容管理&gt;用户/设备交互管理'),
(1064, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376029127, ' 内容管理&gt;用户管理'),
(1073, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376029229, ''),
(1085, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376029893, ' 内容管理&gt;用户管理'),
(1086, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1376029900, ''),
(1089, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1376029964, ''),
(1094, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376038511, ' 内容管理&gt;OBD设备管理'),
(1099, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376038579, ' 内容管理&gt;Token管理'),
(1100, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376038591, ' 内容管理&gt;用户管理'),
(1105, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376038639, ' 内容管理&gt;用户管理'),
(1109, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376039550, ' 内容管理&gt;Token管理'),
(1110, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376039555, ' 内容管理&gt;OBD设备管理'),
(1112, 38, 'item', 'admin.php?p=item&category_id=39', 1, 1376039559, ' 内容管理&gt;GPS数据管理'),
(1113, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376039561, ' 内容管理&gt;OBD设备管理'),
(1114, 38, 'admin', 'admin.php?p=admin', 1, 1376039567, ' 管理员'),
(1122, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376039593, ''),
(1129, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1376039613, ''),
(1131, 38, 'rights', 'admin.php?p=rights', 1, 1376039620, '角色/权限'),
(1132, 38, 'rights', '/vanet/vanet/admin.php?p=rights&m=config&rights_id=1', 0, 1376039626, ''),
(1138, 38, 'category', '/vanet/vanet/admin.php?p=category&action=ajax_get', 0, 1376039661, ''),
(1146, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376039697, ' 内容管理&gt;车辆管理'),
(1147, 38, 'item', 'admin.php?p=item&category_id=43', 1, 1376039706, ' 内容管理&gt;用户管理'),
(1149, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376039860, ' 内容管理&gt;Token管理'),
(1150, 38, 'item', 'admin.php?p=item&category_id=46', 1, 1376039921, ' 内容管理&gt;Token管理'),
(1156, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376039987, ' 内容管理&gt;车辆管理'),
(1158, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376040281, ' 内容管理&gt;车辆管理'),
(1163, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&backurl=admin.php%3F', 0, 1376097418, ''),
(1164, 0, 'login', '/vanet/vanet/admin.php?p=login&module=admin&m=login&backurl=admin.php%3F', 0, 1376097420, ''),
(1165, 38, '', '/vanet/vanet/admin.php?', 0, 1376097420, ''),
(1169, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376097466, ' 内容管理&gt;车辆管理'),
(1170, 38, 'ajax', '/vanet/vanet/admin.php?p=ajax&m=delete&table=vanet_car&id=1', 0, 1376097469, ''),
(1174, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376098891, ' 内容管理&gt;USER-CAR管理'),
(1175, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376098950, ' 内容管理&gt;车辆管理'),
(1177, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=43', 0, 1376099970, ''),
(1180, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376099990, ' 内容管理&gt;OBD设备管理'),
(1181, 38, 'item', '/vanet/vanet/admin.php?p=item&action=new_item&category_id=40', 0, 1376099992, ''),
(1185, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376100312, ' 内容管理&gt;车辆管理'),
(1191, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376101053, ' 内容管理&gt;USER-CAR管理'),
(1198, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376101168, ' 内容管理&gt;车辆管理'),
(1200, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102107, ' 内容管理&gt;OBD设备管理'),
(1204, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102133, ' 内容管理&gt;OBD设备管理'),
(1206, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376102143, ' 内容管理&gt;车辆管理'),
(1207, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376102160, ' 内容管理&gt;车辆管理'),
(1213, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102827, ' 内容管理&gt;OBD设备管理'),
(1219, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376102880, ' 内容管理&gt;OBD设备管理'),
(1220, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376102886, ' 内容管理&gt;车辆管理'),
(1223, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376103899, ' 内容管理&gt;车辆管理'),
(1224, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376103907, ' 内容管理&gt;车辆管理'),
(1226, 38, 'item', 'admin.php?p=item&category_id=48', 1, 1376105349, ' 内容管理&gt;USER-CAR管理'),
(1228, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105376, ' 内容管理&gt;OBD设备管理'),
(1230, 38, 'item', 'admin.php?p=item&category_id=47', 1, 1376105509, ' 内容管理&gt;车辆管理'),
(1232, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=48&item_id=4', 0, 1376105617, ''),
(1235, 38, 'item', 'admin.php?p=item&category_id=40', 1, 1376105644, ' 内容管理&gt;OBD设备管理'),
(1237, 38, 'item', '/vanet/vanet/admin.php?p=item&category_id=42', 0, 1376105711, ''),
(1250, 38, 'item', '/vanet/vanet/admin.php?p=item&action=edit_item&category_id=48&item_id=2', 0, 1376105900, '');

-- --------------------------------------------------------

--
-- 表的结构 `end_maker`
--

CREATE TABLE IF NOT EXISTS `end_maker` (
  `maker_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `sid` varchar(128) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `mid` varchar(256) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `business_license` longblob,
  `email` varchar(128) DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`maker_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='车机/汽车制造商' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `end_maker`
--

INSERT INTO `end_maker` (`maker_id`, `username`, `password`, `sid`, `access_token`, `mid`, `name`, `logo`, `business_license`, `email`, `create_time`, `phone`, `address`, `website`, `status`) VALUES
(1, 'm', '82be9e4c6332230d328dc35bb432af7666d23c98', 'dff6e63c91a0326d93b684e903d176b6a1b5b123', '9a2d5cf41fec837c62dc88a1c364768fca8c856e0a268b1afa7ece5d52d976f4', 'mid', 'name', NULL, NULL, NULL, 1371378967, NULL, NULL, NULL, NULL);

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
(1, '系统管理员', 'Can do everything', 9, 'category_view,category_add,category_update,category_delete,item_view,item_add,item_update,item_delete,account_update,admin_view,admin_add,admin_update,admin_update_password,admin_delete,config_view,config_add,config_update,config_delete,extension_view,extension_add,extension_update,extension_delete,upload_add,rights_view,rights_add,rights_update,rights_delete,accesslog_view,accesslog_delete,accesslog_update,accesslog_add,cardevice_view,cardevice_delete,cardevice_update,cardevice_add,carstatus_view,carstatus_delete,carstatus_update,carstatus_add,maker_view,maker_delete,maker_update,maker_add,udmessage_view,udmessage_delete,udmessage_update,udmessage_add,vanet_car_view,vanet_car_delete,vanet_car_update,vanet_car_add,vanet_gpsdata_view,vanet_gpsdata_delete,vanet_gpsdata_update,vanet_gpsdata_add,vanet_nobd_view,vanet_nobd_delete,vanet_nobd_update,vanet_nobd_add,vanet_obddata_view,vanet_obddata_delete,vanet_obddata_update,vanet_obddata_add,vanet_obds12_view,vanet_obds12_delete,vanet_obds12_update,vanet_obds12_add,vanet_obds3_view,vanet_obds3_delete,vanet_obds3_update,vanet_obds3_add,vanet_token_view,vanet_token_delete,vanet_token_update,vanet_token_add,vanet_user_view,vanet_user_delete,vanet_user_update,vanet_user_add,vanet_usercar_view,vanet_usercar_delete,vanet_usercar_update,vanet_usercar_add');

-- --------------------------------------------------------

--
-- 表的结构 `end_udmessage`
--

CREATE TABLE IF NOT EXISTS `end_udmessage` (
  `message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `done_time` int(10) unsigned DEFAULT NULL,
  `content` varchar(4096) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL COMMENT 'u2d; d2u; u20; d20 :用户到设备；设备到用户；用户上报；设备上报',
  `status` varchar(64) DEFAULT NULL COMMENT 'onging; done; fail',
  PRIMARY KEY (`message_id`),
  KEY `FK_Reference_4` (`user_id`),
  KEY `FK_Reference_5` (`device_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- 表的结构 `end_user_right`
--

CREATE TABLE IF NOT EXISTS `end_user_right` (
  `user_right_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_right_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `end_user_right`
--

INSERT INTO `end_user_right` (`user_right_id`, `name`) VALUES
(1, '创建活动'),
(2, '组织活动'),
(3, '辅助数据分析');

-- --------------------------------------------------------

--
-- 表的结构 `end_user_role`
--

CREATE TABLE IF NOT EXISTS `end_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rights` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `end_user_role`
--

INSERT INTO `end_user_role` (`user_role_id`, `name`, `rights`) VALUES
(6, '班主任', '辅助数据分析,组织活动,创建活动'),
(7, '辅导员', '组织活动,创建活动'),
(8, '领导', '组织活动,创建活动'),
(9, '企业', '组织活动'),
(10, '其他', '');

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
(11, 'p09012lwgeg1', '川A CR141', 1212, 212, 1.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1376102847);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
