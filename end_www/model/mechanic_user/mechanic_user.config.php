<?php
/**
 * user model config
 *
 * @author lidongxu
 */

$end_models['mechanic_user'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '用户列表',	//某型的名字，可以把一个栏目配置成某个模型
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
		'username'=>array(
			'name'=>'用户名',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'password'=>array(
			'name'=>'密码',
			'type'=>'text',
			'null'=>true,
			'width'=>200,
			'prefilter'=>'end_mechanic_user_show_empty_password',
			'description'=>'如不需要修改密码，请留空'
		),
		'name'=>array(
			'name'=>'姓名',
			'type'=>'text',
			'null'=>false
		),
		'phone'=>array(
			'name'=>'电话',
			'type'=>'text',
			'null'=>true
		),
		'email'=>array(
			'name'=>'Email',
			'type'=>'text',
			'null'=>false
		),
		'avatar'=>array(
			'name'=>'头像',
			'type'=>'image',
			'null'=>true
		),
		'create_time' => array(
		 	'name' => '注册时间',
		 	'type' => 'datetime',
		 	'null' => true
		),
		'status' => array(
			'name' => '状态',
			'type' => 'text',
			'null' => true
		)
	),
	'list_fields' => array(
		'user_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),
		'username'=>array(
			'name'=>'用户名',
			'width'=>'auto',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'name'=>array(
			'name'=>'姓名',
			'width'=>'auto',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'email'=>array(
			'name'=>'Email',
			'width'=>'auto',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'create_time'=>array(
			'name'=>'注册时间',
			'width'=>110,
			'sort'=>true,
			'filter'=>'show_mechanic_user_date'
		),
		'sex'=>array(
			'name'=>'性别',
			'width'=>'auto',
			'type'=>'text'
		),
		'years'=>array(
			'name'=>'驾龄',
			'width'=>'auto',
			'type'=>'text'
		),
		'car'=>array(
			'name'=>'车辆',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_mechanic_user_options'
		)
	)
);

function end_mechanic_user_show_empty_password()
{
	return '';
}

function show_mechanic_user_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'mechanic_user',
	'description'=>'用户数据',
	'rights'=>array('view','delete','update','add')
);

function show_mechanic_user_options($user)
{
	end_show_view_button($user['user_id']);
	end_show_edit_button($user['user_id']);
	end_show_delete_button($user['user_id']);
}
