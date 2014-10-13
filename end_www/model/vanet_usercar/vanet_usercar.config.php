<?php
/**
 * maker model config
 *
 * @author liudanking
 */
$end_models['vanet_usercar'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'USER,CAR关系',	//某型的名字，可以把一个栏目配置成某个模型
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
		'user_id' => array(
			'name' => '用户ID',
			'type' => 'text',
			'null' => true
			),
		'car_id' => array(
			'name' => '车辆ID',
			'type' => 'text',
			'null' => true
		),
		'create_time' => array(
			'name' => '创建时间',
			'type' => 'datetime',
			'null' => true
		)
	),
	'list_fields' => array(
		'r_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'user_id' => array(
			'name' => '用户ID',
			'type' => 'text'
		),
		'car_id'=>array(
			'name'=>'车辆ID',
			'type' => 'text'
		),	
		'create_time'=>array(
			'name'=>'激活时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_usernobd_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_usernobd_options'
		)
	)
);

function show_vanet_usernobd_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_usercar',
	'description'=>'USER,CAR关系',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_usernobd_options($item)
{
	$id = 'r_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}