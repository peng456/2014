<?php
/**
 * user model config
 *
 * @author liudanking
 */

$end_models['udmessage'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '用户/设备交互数据',	//某型的名字，可以把一个栏目配置成某个模型
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
		'user_id'=>array(
			'name'=>'用户ID',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'device_id'=>array(
			'name'=>'设备ID',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'create_time'=>array(
			'name'=>'接收时间',
			'type'=>'text',
			'null'=>true
		),
		'done_time'=>array(
			'name'=>'完成时间',
			'type'=>'text',
			'null'=>true
		),
		'type'=>array(
			'name'=>'消息类型',
			'type'=>'text',
			'null'=>true
		),
		'content'=>array(
			'name'=>'消息内容',
			'type'=>'text',
			'null'=>true
		),
		'status' => array(
			'name' => '状态',
			'type' => 'text',
			'null' => true
		)
		
	),
	'list_fields' => array(
		'message_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),
		'user_id'=>array(
			'name'=>'用户ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'device_id'=>array(
			'name'=>'设备ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'接收时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_udmessage_date'
		),
		'done_time'=>array(
			'name'=>'完成时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_udmessage_date'
		),
		'type'=>array(
			'name'=>'消息类型',
			'width'=>'auto',
			'type'=>'text'
		),
		'content'=>array(
			'name'=>'消息内容',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_udmessage_options'
		)
	)
);


function show_udmessage_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'udmessage',
	'description'=>'用户/设备交互数据',
	'rights'=>array('view','delete','update','add')
);

function show_udmessage_options($udmessage)
{
	end_show_view_button($udmessage['message_id']);
	end_show_edit_button($udmessage['message_id']);
	end_show_delete_button($udmessage['message_id']);
}
