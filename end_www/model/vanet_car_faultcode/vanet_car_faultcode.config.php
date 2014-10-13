<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['vanet_car_faultcode'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD故障码数据',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>30, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	//在查看操作中显示的内容，查看按钮在每条数据的后面
	'fields' => array(
		'code' => array(//数据库中的字段名
			'name' => '故障码',//显示在后台的名字
			'type' => 'text',//类型
			'null' => true
			),
		'title' => array(
			'name' => '故障码含义',
			'type' => 'text',
			'null' => true
		),
		'content' => array(
			'name' => '故障码含义具体介绍',
			'type' => 'text',
			'null' => true
		)
	),
	//显示在列表中的内容
	'list_fields' => array(
		'code'=>array(//数据库中的字段名
			'name'=>'故障码',//显示在后台的名字
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'title'=>array(
			'name'=>'故障码含义',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'content'=>array(
			'name'=>'故障码含义具体介绍',
			'width'=>'auto',
			'type'=>'text'
		),
		'repair_suggestion'=>array(
			'name'=>'修复建议',
			'width'=>'auto',
			'type'=>'text'
		),
		'reminding'=>array(
			'name'=>'保养提醒',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(//显示操作里面的按钮
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_faultcode_options'
		)
	)
);

function show_vanet_faultcode_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
	'name'=>'vanet_car_faultcode',
	'description'=>'OBD故障码数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_faultcode_options($item)
{
	$id = 'code';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}