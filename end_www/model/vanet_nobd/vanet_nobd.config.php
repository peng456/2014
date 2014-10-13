<?php
/**
 * maker model config
 *
 * @author liudanking
 */
$end_models['vanet_nobd'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD设备',	//某型的名字，可以把一个栏目配置成某个模型
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
		'car_id' => array(
			'name' => '车辆ID',
			'type' => 'text',
			'null' => true
			),
		'sn' => array(
			'name' => '设备sn',
			'type' => 'text',
			'null' => true
			),
		'pw' => array(
			'name' => '设备pw',
			'type' => 'text',
			'null' => true
			),
		'sim_no' => array(
			'name' => 'sim卡号',
			'type' => 'text',
			'null' => true
		),
		'active_time' => array(
			'name' => '激活时间',
			'type' => 'text',
			'null' => true
		),
		'status' => array(
			'name' => '设备状态',
			'type' => 'text',
			'null' => true
		)
	),
	'list_fields' => array(
		'nobd_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),	
		'car_id'=>array(
			'name'=>'车辆ID',
			'width'=>'auto',
			'align'=>'center'
		),	
		'sn'=>array(
			'name'=>'设备sn',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'pw'=>array(
			'name'=>'设备pw',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'sim_no'=>array(
			'name'=>'sim卡号',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'active_time'=>array(
			'name'=>'激活时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_nobd_date'
		),
		'status'=>array(
			'name'=>'状态',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_nobd_options'
		)
	)
);

function show_vanet_nobd_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_nobd',
	'description'=>'OBD设备',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_nobd_options($item)
{
	$id = 'nobd_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}