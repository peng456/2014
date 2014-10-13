<?php
/**
 * user model config
 *
 * @author liudanking
 */

$end_models['cardevice'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '车载设备列表',	//某型的名字，可以把一个栏目配置成某个模型
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
		'did'=>array(
			'name'=>'设备ID',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'token'=>array(
			'name'=>'令牌',
			'type'=>'text'
		),	
	),
	'list_fields' => array(
		'device_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),
		'did'=>array(
			'name'=>'设备ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'token'=>array(
			'name'=>'设备token',
			'width'=>'auto',
			'type'=>'text'
		),
		'sid'=>array(
			'name'=>'secret ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'access_token'=>array(
			'name'=>'访问token',
			'width'=>'auto',
			'type'=>'text'
		),
		'expires_in'=>array(
			'name'=>'失效时间',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_cardevice_options'
		)
	)
);


function show_cardevice_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'cardevice',
	'description'=>'车载设备数据',
	'rights'=>array('view','delete','update','add')
);

function show_cardevice_options($device)
{
	end_show_view_button($device['device_id']);
	end_show_edit_button($device['device_id']);
	end_show_delete_button($device['device_id']);
}
