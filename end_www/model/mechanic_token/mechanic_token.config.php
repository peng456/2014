<?php
/**
 * mechanic_token model config
 *
 * @author lidongxu
 */

$end_models['mechanic_token'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'token信息',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>20, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('name'),
			'type'=>'text',
			'null'=>true
		)
	),
	'fields' => array(
		'access_token'=>array(
			'name'=>'access_token',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'token_type'=>array(
			'name'=>'token_type',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'owner_id'=>array(
			'name'=>'owner_id',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'create_time'=>array(
			'name'=>'起始时间',
			'type'=>'text',
			'null'=>true
		),
		'expire_time'=>array(
			'name'=>'过期时间',
			'type'=>'text',
			'null'=>true
		),
		'status'=>array(
			'name'=>'状态',
			'type'=>'text',
			'null'=>false
		)
	),
	'list_fields' => array(
		'token_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),
		'access_token'=>array(
			'name'=>'access_token',
			'width'=>'auto',
			'type'=>'text'
		),
		'token_type'=>array(
			'name'=>'token_type',
			'width'=>'auto',
			'type'=>'text'
		),
		'owner_id'=>array(
			'name'=>'owner_id',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'起始时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_mechanic_token_date'
		),
		'expire_time'=>array(
			'name'=>'过期时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_mechanic_token_date'
		),
		'status'=>array(
			'name'=>'状态',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_mechanic_token_options'
		)
	)
);
/*
function end_mechanic_user_show_empty_password()
{
	return '';
}*/

function show_mechanic_token_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'mechanic_token',
	'description'=>'token信息',
	'rights'=>array('view','delete','update','add')
);

function show_mechanic_token_options($token)
{
	end_show_view_button($token['token_id']);
	end_show_edit_button($token['token_id']);
	end_show_delete_button($token['token_id']);
}