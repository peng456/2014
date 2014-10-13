<?php
/**
 * obd service1 and service 2 model config
 *
 * @author liudanking
 */
$end_models['vanet_obds12'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD Service 1,2数据',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>500, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'fields' => array(
		'DTC_CNT' => array(
			'name' => '故障码个数',
			'type' => 'text',
			'null' => true
			),
		'DTCFRZF' => array(
			'name' => '冻结帧故障码',
			'type' => 'text',
			'null' => true
			),
		'LOAD_PCT' => array(
			'name' => '计算负载值',
			'type' => 'text',
			'null' => true
			),
		'ECT' => array(
			'name' => '发动机泠却液温度',
			'type' => 'text',
			'null' => true
			),
		'MAP' => array(
			'name' => '进气压力',
			'type' => 'text',
			'null' => true
			),
		'RPM' => array(
			'name' => '发动机转速',
			'type' => 'text',
			'null' => true
			),
		'VSS' => array(
			'name' => '车辆时速',
			'type' => 'text',
			'null' => true
			),
		'SPARKADV' => array(
			'name' => '正时提前角',
			'type' => 'text',
			'null' => true
			),
		'IAT' => array(
			'name' => '进气温度',
			'type' => 'text',
			'null' => true
			),
		'MAF' => array(
			'name' => '进气量',
			'type' => 'text',
			'null' => true
			),
		'TP' => array(
			'name' => '气门绝对位置',
			'type' => 'text',
			'null' => true
			),
		'RUNTM' => array(
			'name' => '运行时间',
			'type' => 'text',
			'null' => true
			),
		'MIL_DIST' => array(
			'name' => '故障灯激活行驶里程',
			'type' => 'text',
			'null' => true
			),
		'FLI' => array(
			'name' => '燃油液位输入',
			'type' => 'text',
			'null' => true
			),
		'CLR_DIST' => array(
			'name' => '故障码清除后行驶里程',
			'type' => 'text',
			'null' => true
			),
		'VPWR' => array(
			'name' => '控制模块电压',
			'type' => 'text',
			'null' => true
			),
		'FUEL_TYP' => array(
			'name' => '燃油类型',
			'type' => 'text',
			'null' => true
			),
		'APP_R' => array(
			'name' => '加速踏板相对位置',
			'type' => 'text',
			'null' => true
			)		
	),
	'list_fields' => array(
		'obds12_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'nobd_id'=>array(
			'name'=>'设备ID',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'DTC_CNT'=>array(
			'name'=>'故障个数',
			'width'=>'auto',
			'type'=>'text'
		),
		'DTCFRZF'=>array(
			'name'=>'冻结帧故障码',
			'width'=>'auto',
			'type'=>'text'
		),
		'LOAD_PCT'=>array(
			'name'=>'计算负载',
			'width'=>'auto',
			'type'=>'text'
		),
		'ECT'=>array(
			'name'=>'冷却液温度',
			'width'=>'auto',
			'type'=>'text'
		),
		'MAP'=>array(
			'name'=>'进气管压力',
			'width'=>'auto',
			'type'=>'text'
		),
		'RPM'=>array(
			'name'=>'转速',
			'width'=>'auto',
			'type'=>'text'
		),
		'VSS'=>array(
			'name'=>'时速',
			'width'=>'auto',
			'type'=>'text'
		),
		'SPARKADV'=>array(
			'name'=>'点火正时',
			'width'=>'auto',
			'type'=>'text'
		),
		'IAT'=>array(
			'name'=>'进气温度',
			'width'=>'auto',
			'type'=>'text'
		),
		'MAF'=>array(
			'name'=>'空气流量',
			'width'=>'auto',
			'type'=>'text'
		),
		'TP'=>array(
			'name'=>'节气门绝对位置',
			'width'=>'auto',
			'type'=>'text'
		),
		'RUNTM'=>array(
			'name'=>'运行时间',
			'width'=>'auto',
			'type'=>'text'
		),
		'MIL_DIST'=>array(
			'name'=>'故障灯激活行驶里程',
			'width'=>'auto',
			'type'=>'text'
		),
		'FLI'=>array(
			'name'=>'燃油余量',
			'width'=>'auto',
			'type'=>'text'
		),
		'CLR_DIST'=>array(
			'name'=>'故障码清除后行驶里程',
			'width'=>'auto',
			'type'=>'text'
		),
		'VPWR'=>array(
			'name'=>'电压',
			'width'=>'auto',
			'type'=>'text'
		),
		'AAT'=>array(
			'name'=>'环境温度',
			'width'=>'auto',
			'type'=>'text'
		),
		'FUEL_TYP'=>array(
			'name'=>'燃油类型',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_obds12_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_obds12_options'
		)
	)
);

function show_vanet_obds12_date($t)
{
	# test
	#$s12_item = model('vanet_obds12')->get_one(array('DTC_CNT'=>1));
	#var_dump($s12_item);
	#
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_obds12',
	'description'=>'OBD数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_obds12_options($item)
{
	$id = 'obds12_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}