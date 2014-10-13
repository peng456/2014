<?php
/**
 * maker model config
 *
 * @author liudanking
 */
$end_models['vanet_gpsdata'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'GPS数据',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>30, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'fields' => array(
		'nobd_id' => array(
			'name' => '设备ID',
			'type' => 'text',
			'null' => true
			),
		'longtitude' => array(
			'name' => '经度',
			'type' => 'text',
			'null' => true
		),
		'latitude' => array(
			'name' => '纬度',
			'type' => 'text',
			'null' => true
		),
		'speed' => array(
			'name' => '速度',
			'type' => 'text',
			'null' => true
		),
		'course' => array(
			'name' => '航向',
			'type' => 'text',
			'null' => true
		),
		'gps_time' => array(
			'name' => 'GPS时间',
			'type' => 'text',
			'null' => true
		),
	),
	'list_fields' => array(
		'gpsdata_id'=>array(
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
		'longtitude'=>array(
			'name'=>'经度',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'latitude'=>array(
			'name'=>'纬度',
			'width'=>'auto',
			'type'=>'text'
		),
		'speed'=>array(
			'name'=>'速度',
			'width'=>'auto',
			'type'=>'text'
		),
		'course'=>array(
			'name'=>'航向',
			'width'=>'auto',
			'type'=>'text'
		),
		'gps_time'=>array(
			'name'=>'GPS时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_gpsdata_date'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_gpsdata_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_gpsdata_options'
		)
	)
);

function show_vanet_gpsdata_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_gpsdata',
	'description'=>'GPS数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_gpsdata_options($item)
{
	$id = 'gpsdata_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}