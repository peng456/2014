<?php
/**
 * maker model config
 *
 * @author liudanking
 */
$end_models['maker'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '车机车企制造商',	//某型的名字，可以把一个栏目配置成某个模型
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
		'username' => array(
			'name' => '登陆名',
			'type' => 'text',
			'null' => false,
			'readonly' => true
			),
		'password' => array(
			'name' => '密码',
			'type' => 'text',
			'null' => true,
			//'width'=> 200,
			'prefilter'=>'end_show_maker_empty_password',
			'description'=>'如不需要修改密码，请留空',
		),
		'name' => array(
			'name' => '名称',
			'type' => 'text',
			'null' => true
		),
		'mid' => array(
			'name' => 'maker ID',
			'type' => 'text',
			'null' => true
		),
		'create_time' => array(
			'name' => '注册时间',
			'type' => 'text',
			'null' => false
		),
	),
	'list_fields' => array(
		'maker_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'username'=>array(
			'name'=>'登录名',
			'width'=>'auto',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'name'=>array(
			'name'=>'公司名称',
			'width'=>'auto',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'mid'=>array(
			'name'=>'maker ID',
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
			'filter'=>'show_maker_options'
		)
	)
);

function end_show_maker_empty_password()
{
	return '';
}

function show_maker_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'maker',
	'description'=>'制造商数据',
	'rights'=>array('view','delete','update','add')
);

function show_maker_options($maker)
{
	end_show_view_button($maker['maker_id']);
	end_show_edit_button($maker['maker_id']);
	end_show_delete_button($maker['maker_id']);
}