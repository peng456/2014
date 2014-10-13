<?php
/**
 * accesslog model config
 *
 * @author liudanking
 */

$end_models['accesslog'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '用户访问历史数据',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>20, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'list_fields' => array(
		'accesslog_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),
		'access_time'=>array(
			'name'=>'访问时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_accesslog_date'
		),
		'user_type'=>array(
			'name'=>'用户类型',
			'width'=>'auto',
			'type'=>'text'
		),
		'user_id'=>array(
			'name'=>'用户ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'sid'=>array(
			'name'=>'secret id',
			'width'=>'auto',
			'type'=>'text'
		),
		'access_token'=>array(
			'name'=>'access token',
			'width'=>'auto',
			'type'=>'text'
		),
		'ip_address'=>array(
			'name'=>'IP地址',
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
			'filter'=>'show_accesslog_options'
		)
	),
	'fields' => array(
		'accesslog_id'=>array(
			'name'=>'访问ID',
			'type'=>'text',
			'null'=>true,
			'readonly'=>true
		),
		'access_time'=>array(
			'name'=>'访问时间',
			'type'=>'text',
			'null'=>true
		)
	)
);


function show_accesslog_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'accesslog',
	'description'=>'用户访问历史数据',
	'rights'=>array('view','delete','update','add')
);

function show_accesslog_options($accesslog)
{
	end_show_view_button($accesslog['accesslog_id']);
	end_show_edit_button($accesslog['accesslog_id']);
	end_show_delete_button($accesslog['accesslog_id']);
}
