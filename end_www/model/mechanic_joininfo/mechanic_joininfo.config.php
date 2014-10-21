<?php
/**
 * user model config
 *
 * @author lidongxu
 */

$end_models['mechanic_joininfo'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '加盟信息',	//某型的名字，可以把一个栏目配置成某个模型
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
		'joininfo_id'=>array(
			'name'=>'ID',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'join_code'=>array(
			'name'=>'加盟码',
			'type'=>'text',
			'null'=>true,
			'width'=>200
		),
		'name'=>array(
			'name'=>'姓名',
			'type'=>'text',
			'null'=>false
		),
		'stars'=>array(
			'name'=>'星级',
			'type'=>'text',
			'null'=>true
		),
		'work_year'=>array(
			'name'=>'工作时间',
			'type'=>'text',
			'null'=>false
		),
		'workplace'=>array(
			'name'=>'工作地点',
			'type'=>'text',
			'null'=>true
		),
		'award' => array(
		 	'name' => '获得奖项',
		 	'type' => 'text',
		 	'null' => true
		),
		'resume' => array(
			'name' => '个人履历',
			'type' => 'text',
			'null' => true
		)
	),
	'list_fields' => array(
		'joininfo_id'=>array(
			'name'=>'ID',
			'type'=>'text',
			'null'=>false,
			'readonly'=>true
		),
		'join_code'=>array(
			'name'=>'加盟码',
			'type'=>'text',
			'null'=>true,
			'width'=>200
		),
		'name'=>array(
			'name'=>'姓名',
			'type'=>'text',
			'null'=>false
		),
		'stars'=>array(
			'name'=>'星级',
			'type'=>'text',
			'null'=>true
		),
		'work_year'=>array(
			'name'=>'工作时间',
			'type'=>'text',
			'null'=>false
		),
		'workplace'=>array(
			'name'=>'工作地点',
			'type'=>'text',
			'null'=>true
		),
		'award' => array(
		 	'name' => '获得奖项',
		 	'type' => 'text',
		 	'null' => true
		),
		'resume' => array(
			'name' => '个人履历',
			'type' => 'text',
			'null' => true
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_mechanic_joininfo_options'
		)
	)
);


function show_mechanic_joininfo_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'mechanic_joininfo',
	'description'=>'加盟信息',
	'rights'=>array('view','delete','update','add')
);

function show_mechanic_joininfo_options($user)
{
	end_show_view_button($user['joininfo_id']);
	end_show_edit_button($user['joininfo_id']);
	end_show_delete_button($user['joininfo_id']);
}
