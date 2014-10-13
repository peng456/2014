<?php
/**
 * obddata model config
 *
 * @author liudanking
 */
$end_models['vanet_obddata'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'OBD数据',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>30, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'fields' => array(
		'nobd_id' => array(
			'name' => '设备ID',
			'type' => 'text',
			'null' => true
			),
		'engine_rpm' => array(
			'name' => '发动机转速',
			'type' => 'text',
			'null' => true
		),
		'vehicle_speed' => array(
			'name' => '速度',
			'type' => 'text',
			'null' => true
		),
		'engine_run_time' => array(
			'name' => '运行时间',
			'type' => 'text',
			'null' => true
		),
		'distance_mil' => array(
			'name' => 'MIL后行驶距离',
			'type' => 'text',
			'null' => true
		),
		'time_mil' => array(
			'name' => 'MIL后行驶时间',
			'type' => 'text',
			'null' => true
		),
		'fuel_rail_pressure' => array(
			'name' => '燃料压力',
			'type' => 'text',
			'null' => true
		),
		'fuel_rail_pressure_abs' => array(
			'name' => '燃料压力绝对值',
			'type' => 'text',
			'null' => true
		),
		'fuel_rail_pressure_mv' => array(
			'name' => '燃料压力相对值',
			'type' => 'text',
			'null' => true
		),
		'control_module_voltage' => array(
			'name' => '控制模块电压',
			'type' => 'text',
			'null' => true
		),
		'relative_throttle_position' => array(
			'name' => '节气门相对位置',
			'type' => 'text',
			'null' => true
		),
		'ambient_air_temp' => array(
			'name' => '环境温度',
			'type' => 'text',
			'null' => true
		),
		'time_since_tc' => array(
			'name' => '故障码清空后时间',
			'type' => 'text',
			'null' => true
		),
		'fuel_type' => array(
			'name' => '燃油类型',
			'type' => 'text',
			'null' => true
		),
		'acc_pedal_position' => array(
			'name' => '油门位置',
			'type' => 'text',
			'null' => true
		),
		'data_time' => array(
			'name' => '数据采集时间',
			'type' => 'datetime',
			'null' => true
		),
		'create_time' => array(
			'name' => '创建时间',
			'type' => 'datetime',
			'null' => true
		)
	),
	'list_fields' => array(
		'obddata_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),	
		'nobd_id'=>array(
			'name'=>'设备ID',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'date_time'=>array(
			'name'=>'采集时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_obddata_date'
		),
		'engine_rpm'=>array(
			'name'=>'发动机转速',
			'width'=>'auto',
			'type'=>'text'
		),
		'vehicle_speed'=>array(
			'name'=>'速度',
			'width'=>'auto',
			'type'=>'text'
		),
		'engine_run_time'=>array(
			'name'=>'启动时间',
			'width'=>'auto',
			'type'=>'text'
		),
		'distance_mil'=>array(
			'name'=>'MIL后行驶距离',
			'width'=>'auto',
			'type'=>'text'
		),
		'time_mil'=>array(
			'name'=>'MIL后行驶时间',
			'width'=>'auto',
			'type'=>'text'
		),
		'fuel_rail_pressure'=>array(
			'name'=>'燃油压力',
			'width'=>'auto',
			'type'=>'text'
		),
		'fuel_rail_pressure_abs'=>array(
			'name'=>'燃油压力绝对值',
			'width'=>'auto',
			'type'=>'text'
		),
		'fuel_rail_pressure_mv'=>array(
			'name'=>'燃油压力相对值',
			'width'=>'auto',
			'type'=>'text'
		),
		'control_module_voltage'=>array(
			'name'=>'控制模块电压',
			'width'=>'auto',
			'type'=>'text'
		),
		'relative_throttle_position'=>array(
			'name'=>'节气门相对位置',
			'width'=>'auto',
			'type'=>'text'
		),
		'ambient_air_temp'=>array(
			'name'=>'燃油压力',
			'width'=>'auto',
			'type'=>'text'
		),
		'time_since_tc'=>array(
			'name'=>'故障码清除后时间',
			'width'=>'auto',
			'type'=>'text'
		),
		'fuel_type'=>array(
			'name'=>'燃油类型',
			'width'=>'auto',
			'type'=>'text'
		),
		'acc_pedal_position'=>array(
			'name'=>'踏板位置',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_vanet_obddata_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_obddata_options'
		)
	)
);

function show_vanet_obddata_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_obddata',
	'description'=>'OBD数据',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_obddata_options($item)
{
	$id = 'obddata_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}