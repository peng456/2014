<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['vanet_user_share'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD_位置分享数据',	//某型的名字，可以把一个栏目配置成某个模型
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
		'share_id' => array(//数据库中的字段名
			'name' => 'ID',//显示在后台的名字
			'type' => 'text',//类型
			'null' => true
			),
		'shareuser_id' => array(
			'name' => '被分享用户',
			'type' => 'text',
			'null' => true
		),
		'sharecar_id' => array(
			'name' => '被分享车辆',
			'type' => 'text',
			'null' => true
		),
	),
	//显示在列表中的内容
	'list_fields' => array(
		'share_id'=>array(//数据库中的字段名
			'name'=>'ID',//显示在后台的名字
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'shareuser_id'=>array(
			'name'=>'被分享用户',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'sharecar_id'=>array(
			'name'=>'被分享车辆',
			'width'=>'auto',
			'type'=>'text'
		),
		'touser_id'=>array(
			'name'=>'分享到用户',
			'width'=>'auto',
			'type'=>'text'
		),
		'share_state'=>array(
			'name'=>'分享状态',
			'width'=>'auto',
			'type'=>'text'
		),
		'_options'=>array(//显示操作里面的按钮
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_user_share_options'
		)
	)
);

function show_vanet_user_share_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
	'name'=>'vanet_user_share',
	'description'=>'OBD_位置分享数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_user_share_options($item)
{
	$id = 'share_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}