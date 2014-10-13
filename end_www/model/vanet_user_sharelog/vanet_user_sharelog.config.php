<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['vanet_user_sharelog'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD分享记录数据',	//某型的名字，可以把一个栏目配置成某个模型
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
		'sharelog_id' => array(//数据库中的字段名
			'name' => 'ID',//显示在后台的名字
			'type' => 'text',//类型
			'null' => true
			),
		'sender_userid' => array(
			'name' => '发送方',
			'type' => 'text',
			'null' => true
		),
		'receiver_userid' => array(
			'name' => '接收方',
			'type' => 'text',
			'null' => true
		)
	),
	//显示在列表中的内容
	'list_fields' => array(
		'sharelog_id'=>array(//数据库中的字段名
			'name'=>'ID',//显示在后台的名字
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'sender_userid'=>array(
			'name'=>'发送方',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'receiver_userid'=>array(
			'name'=>'接收方',
			'width'=>'auto',
			'type'=>'text'
		),
		'type'=>array(
			'name'=>'分享方式',
			'width'=>'auto',
			'type'=>'text'
		),
		'type_content'=>array(
			'name'=>'分享方式信息',
			'width'=>'auto',
			'type'=>'text'
		),
		'message_id'=>array(
			'name'=>'消息ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_sharelog_date'//可以调用一个函数来显示
		),
		'_options'=>array(//显示操作里面的按钮
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_sharelog_options'
		)
	)
);

function show_vanet_sharelog_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
	'name'=>'vanet_user_sharelog',
	'description'=>'OBD分享记录数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_sharelog_options($item)
{
	$id = 'sharelog_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}