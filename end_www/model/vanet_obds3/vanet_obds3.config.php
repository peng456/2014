<?php
/**
 * vanet_token model config
 *
 * @author lidongxu
 */

$end_models['vanet_obds3'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD S3信息',	//某型的名字，可以把一个栏目配置成某个模型
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
		'nobd_id'=>array(
			'name'=>'nobd ID',
			'type'=>'text',
			'null'=>true
		),
		'trouble_code'=>array(
			'name'=>'故障码',
			'type'=>'text',
			'null'=>true
		)
	),
	'list_fields' => array(
		'obds3_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center'
		),
		'nbod_id'=>array(
			'name'=>'nobd ID',
			'width'=>'auto',
			'type'=>'text'
		),
		'data_time'=>array(
			'name'=>'数据时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_obds3_date'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_obds3_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_obds3_options'
		)
	)
);


function show_vanet_obds3_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_obds3',
	'description'=>'OBDS3数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_obds3_options($item)
{
	$id = 'obds3_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}