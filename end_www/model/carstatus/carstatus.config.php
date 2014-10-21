<?php
/**
 * car status model config
 *
 * @author liudanking
 */

$end_models['carstatus'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '车辆状态',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>20, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'fields' => array(
		'time'=>array(
			'name'=>'时间',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'longtitude'=>array(
			'name'=>'经度',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'latitude'=>array(
			'name'=>'纬度',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'engine'=>array(
			'name'=>'引擎',
			'type'=>'text',
			'null'=>true
		),
		'window'=>array(
			'name'=>'车窗',
			'type'=>'text',
			'null'=>true
		),
		'aircondition'=>array(
			'name'=>'空调',
			'type'=>'text',
			'null'=>true
		),
		'totalmile'=>array(
			'name'=>'总里程',
			'type'=>'text',
			'null'=>true
		),
		'device_id' => array(
			'name' => '设备ID',
			'type' => 'text',
			'null' => true,
			'readonly'=>true
		),
		'status' => array(
			'name' => '状态',
			'type' => 'text',
			'null' => true
		)
		
	),
	'list_fields' => array(
		'status_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),
		'create_time'=>array(
			'name'=>'server时间',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true,
			'filter'=>'show_carstatus_date'
		),
		'device_id'=>array(
			'name'=>'设备ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'time'=>array(
			'name'=>'时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_carstatus_date'
		),
		'longtitude'=>array(
			'name'=>'经度',
			'width'=>'auto',
			'type'=>'text'
		),
		'latitude'=>array(
			'name'=>'纬度',
			'width'=>'auto',
			'type'=>'text'
		),
		'engine'=>array(
			'name'=>'引擎',
			'width'=>'auto',
			'type'=>'text'
		),
		'window'=>array(
			'name'=>'车窗',
			'width'=>'auto',
			'type'=>'text'
		),
		'aircondition'=>array(
			'name'=>'空调',
			'width'=>'auto',
			'type'=>'text'
		),
		'totalmile'=>array(
			'name'=>'总里程',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_carstatus_options'
		)
	)
);

function show_carstatus_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'carstatus',
	'description'=>'车辆状态数据',
	'rights'=>array('view','delete','update','add')
);

function show_carstatus_options($carstatus)
{
	end_show_view_button($carstatus['status_id']);
	end_show_edit_button($carstatus['status_id']);
	end_show_delete_button($carstatus['status_id']);
}
