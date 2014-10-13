<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['vanet_user_friends'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD好友数据',	//某型的名字，可以把一个栏目配置成某个模型
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
		'id' => array(//数据库中的字段名
			'name' => 'ID',//显示在后台的名字
			'type' => 'text',//类型
			'null' => true
			),
		'user_id_a' => array(
			'name' => '好友1',
			'type' => 'text',
			'null' => true
		),
		'user_id_b' => array(
			'name' => '好友2',
			'type' => 'text',
			'null' => true
		)
	),
	//显示在列表中的内容
	'list_fields' => array(
		'id'=>array(//数据库中的字段名
			'name'=>'ID',//显示在后台的名字
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'user_id_a'=>array(
			'name'=>'好友1',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'user_id_b'=>array(
			'name'=>'好友2',
			'width'=>'auto',
			'type'=>'text'
		),
		'friend_state'=>array(
			'name'=>'好友情况',
			'width'=>'auto',
			'type'=>'text'
		),
		'share_state_formar'=>array(
			'name'=>'分享情况前向后',
			'width'=>'auto',
			'type'=>'text'
		),
		'share_state_latter'=>array(
			'name'=>'分享情况后向前',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(//显示操作里面的按钮
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_friends_options'
		)
	)
);

function show_vanet_friends_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
	'name'=>'vanet_user_friends',
	'description'=>'OBD好友数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_friends_options($item)
{
	$id = 'id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}