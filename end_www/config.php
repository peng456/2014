<?php
define('END_VIEWER_DIR',END_THEME_DIR.'default/');
$end_module['www'] = array('name'=>'www');

/*
* function: menu configuration data
* author: lidongxu
*/
$navigation = array(
	'name' => "Vehicular Ad Hoc Network Cloud Platform",
	'url' => "?p=home",
	'children' => array(
		'status' => array(
			'name' => '车辆概况',
			'url' => '?c=status&p=status',
			'children' => array(
				//nav-header
				//无url及children属性
				array(
					'name' => '车况信息',
					'type' => 'header'
					),
				'status' => array(
					'name' => '实时车况',
					'url' => '?c=status&p=status',
					'children' => NULL
					),
				'malfunction' => array(
					'name' => '故障分析',
					'url' => '?c=status&p=malfunction',
					'children' => NULL
					),
				'illegal' => array(
					'name' => '违章信息',
					'url' => '?c=status&p=illegal',
					'children' => NULL
					),
				'maintainance' => array(
					'name' => '保养记录',
					'url' => '?c=status&p=maintainance',
					'children' => NULL
					),
				array(
					'name' => '报告提醒',
					'type' => 'header'
					),
				'drive_report' => array(
					'name' => '驾驶报告',
					'url' => '?c=status&p=drive_report',
					'children' => NULL
					),
				'snapshot' => array(
					'name' => '车况快照',
					'url' => '?c=status&p=snapshot',
					'children' => NULL
					),
				'alarm' => array(
					'name' => '报警信息',
					'url' => '?c=status&p=alarm',
					'children' => NULL
					)
				)			 
			),
		'location' => array(
			'name' => '行程分析',
			'url' => '?c=location&p=location',
			'children' => array(
				//nav-header
				//无url及children属性
				array(
					'name' => '分析报告',
					'type' => 'header'
					),
				'process' => array(
					'name' => '行程报告',
					'url' => '?c=location&p=process',
					'children' => NULL
					),
				'oil' => array(
					'name' => '油耗分析',
					'url' => '?c=location&p=oil',
					'children' => NULL
					),
				array(
					'name' => '统计服务',
					'type' => 'header'
					),
				'time' => array(
					'name' => '时间统计',
					'url' => '?c=location&p=time',
					'children' => NULL
					),
				'speed' => array(
					'name' => '速度统计',
					'url' => '?c=location&p=speed',
					'children' => NULL
					),
				'path' => array(
					'name' => '行程轨迹',
					'url' => '?c=location&p=path',
					'children' => NULL
					),
				'location' => array(
					'name' => '实时位置',
					'url' => '?c=location&p=location',
					'children' => NULL
					)
				)
			),
		'setting' => array(
			'name' => '设置',
			'url' => '?c=setting&p=car',
			'children' => array(
				//nav-header
				//无url及children属性
				array(
					'name' => '车辆设置',
					'type' => 'header'
					),
				'car' => array(
					'name' => '车辆信息',
					'url' => '?c=setting&p=car',
					'children' => NULL
					),
				'addcar' => array(
					'name' => '添加车辆',
					'url' => '?c=setting&p=addcar',
					'children' => NULL
					),
				'nobd' => array(
					'name' => '绑定NOBD',
					'url' => '?c=setting&p=nobd',
					'children' => NULL
					),
				array(
					'name' => '个人设置',
					'type' => 'header'
					),
				'profile' => array(
					'name' => '个人信息',
					'url' => '?c=setting&p=profile',
					'children' => NULL
					),
				'resetpassword' => array(
					'name' => '修改密码',
					'url' => '?c=setting&p=resetpassword',
					'children' => NULL
					)
				)
			)/*,
		'logout' => array(
			'name' => '注销',
			'url' => '?p=logout',
			'children' => NULL
			)*/
		),
	'extension' => array(
		array(
			'name' => '车况总览',
			'type' => 'header'
			),
		'notify' => array(
			'name' => '提醒消息',
			'url' => '?c=home&p=notify',
			'children' => NULL
			),
		'report' => array(
			'name' => '车况报表',
			'url' => '?c=home&p=report',
			'children' => NULL
			)
		)
	);
?>