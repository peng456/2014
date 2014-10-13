<?php
/**
 * vanet_v_ucn model config
 *
 * @author lidongxu
 */

$end_models['vanet_v_gps_stats'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'GPS统计视图',	//某型的名字，可以把一个栏目配置成某个模型
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
			'name'=>'设备ID',
			'type'=>'text',
			'null'=>false
		),
		'gps_total_count' => array(
			'name' => '数据总数',
			'type' => 'text',
			'null' => false
		),
		'gps_max_ctime' => array(
			'name' => '最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_gps_stats_date'
		),
		'gps_min_ctime' => array(
			'name' => '最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_gps_stats_date'
		),
		'gpsdata_max_id'=>array(
			'name'=>'数据最大id',
			'type'=>'text',
			'null'=>true
		),
		'gpsdata_min_id'=>array(
			'name'=>'数据最小id',
			'type'=>'text',
			'null'=>true
		)
	),
	'list_fields' => array(
		'nobd_id'=>array(
			'name'=>'设备ID',
			'type'=>'text',
			'sort'=>true,
			'null'=>false
		),
		'gps_total_count' => array(
			'name' => '数据总数',
			'type' => 'text',
			'null' => false
		),
		'gps_max_ctime' => array(
			'name' => '最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_gps_stats_date'
		),
		'gps_min_ctime' => array(
			'name' => '最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_gps_stats_date'
		),
		'gpsdata_max_id'=>array(
			'name'=>'数据最大id',
			'type'=>'text',
			'null'=>true
		),
		'gpsdata_min_id'=>array(
			'name'=>'数据最小id',
			'type'=>'text',
			'null'=>true
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_v_gps_stats_options'
		)
	)
);

function show_vanet_v_gps_stats_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'vanet_v_gps_stats',
	'description'=>'GPS统计视图',
	'rights'=>array('view')
);

function show_vanet_v_gps_stats_options($car)
{
	end_show_view_button($car['nobd_id']);
}