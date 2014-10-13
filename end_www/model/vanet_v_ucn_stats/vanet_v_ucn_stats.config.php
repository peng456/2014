<?php
/**
 * vanet_v_ucn_stats model config
 *
 * @author lidongxu
 */

$end_models['vanet_v_ucn_stats'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '车辆OBD&GPS统计视图',	//某型的名字，可以把一个栏目配置成某个模型
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
		'user_id'=>array(
			'name'=>'用户ID',
			'type'=>'text',
			'null'=>false
		),
		'userstatus' => array(
			'name' => '用户状态',
			'type' => 'text',
			'null' => false
		),
		'car_id' => array(
			'name' => '车辆ID',
			'type' => 'text',
			'null' => false
		),
		'vehicle_name'=>array(
			'name'=>'车辆昵称',
			'type'=>'text',
			'null'=>false
		),
		'vehicle_avatar'=>array(
			'name'=>'车辆头像',
			'type'=>'text',
			'null'=>false
		),
		'years'=>array(
			'name'=>'车辆驾龄',
			'type'=>'text',
			'null'=>false
		),
		'license'=>array(
			'name'=>'车牌号',
			'type'=>'text',
			'null'=>false
		),
		'brand'=>array(
			'name'=>'品牌',
			'type'=>'text',
			'null'=>true
		),
		'model'=>array(
			'name'=>'型号',
			'type'=>'text',
			'null'=>true
		),
		'emissions'=>array(
			'name'=>'排量',
			'type'=>'text',
			'null'=>true
		),
		'maintenancemiles'=>array(
			'name'=>'保养里程数',
			'type'=>'text',
			'null'=>true
		),
		'initializemiles'=>array(
			'name'=>'初始里程',
			'type'=>'text',
			'null'=>true
		),
		'currentmiles'=>array(
			'name'=>'当前里程',
			'type'=>'text',
			'null'=>true
		),
		'roadfeesvalidity'=>array(
			'name'=>'养路费有效期',
			'type'=>'datetime',
			'null'=>true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'drivinglicensevalidity'=>array(
			'name'=>'行驶证有效期',
			'type'=>'datetime',
			'null'=>true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'insurancevalidity'=>array(
			'name'=>'保险有效期',
			'type'=>'datetime',
			'null'=>true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'comment'=>array(
			'name'=>'备注',
			'type'=>'text',
			'null'=>true
		),
		'carstatus'=>array(
			'name'=>'车辆状态',
			'type'=>'text',
			'null'=>true
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'type'=>'datetime',
			'null'=>true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'nobd_id'=>array(
			'name'=>'NOBD ID',
			'type'=>'text',
			'null'=>true
		),
		'sn' => array(
			'name' => '设备sn身份标识号',
			'type' => 'text',
			'null' => true
			),
		'sim_no' => array(
			'name' => 'sim卡号',
			'type' => 'text',
			'null' => true
		),
		'active_time' => array(
			'name' => '激活时间',
			'type' => 'text',
			'null' => true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'nobdstatus' => array(
			'name' => '设备状态',
			'type' => 'text',
			'null' => true
		),
		'obd_total_count' => array(
			'name' => 'OBD数据总数',
			'type' => 'text',
			'null' => false
		),
		'obd_min_ctime' => array(
			'name' => 'OBD数据最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'obd_max_ctime' => array(
			'name' => 'OBD数据最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'obds12_min_id'=>array(
			'name'=>'OBD数据最小id',
			'type'=>'text',
			'null'=>true
		),
		'obds12_max_id'=>array(
			'name'=>'OBD数据最大id',
			'type'=>'text',
			'null'=>true
		),
		'gps_total_count' => array(
			'name' => 'GPS数据总数',
			'type' => 'text',
			'null' => false
		),
		'gps_min_ctime' => array(
			'name' => 'GPS数据最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'gps_max_ctime' => array(
			'name' => 'GPS数据最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'gpsdata_min_id'=>array(
			'name'=>'GPS数据最小id',
			'type'=>'text',
			'null'=>true
		),
		'gpsdata_max_id'=>array(
			'name'=>'GPS数据最大id',
			'type'=>'text',
			'null'=>true
		)
	),
	'list_fields' => array(
		'car_id'=>array(
			'name'=>'车辆ID',
			'width'=>'30',
			'sort'=>true,
			'search'=>true,
			'align'=>'center',
		),
		'vehicle_name'=>array(
			'name'=>'车辆昵称',
			'type'=>'text',
			'sort'=>true,
			'search'=>true,
			'null'=>false
		),
		'user_id'=>array(
			'name'=>'用户ID',
			'width'=>'30',
			'sort'=>true,
			'search'=>true,
			'align'=>'center',
		),
		'nobd_id'=>array(
			'name'=>'NOBD ID',
			'width' => 'auto',
			'sort'=>true,
			'search'=>true,
			'type'=>'text'
		),
		'sn' => array(
			'name' => 'NOBD序列号',
			'width' => 'auto',
			'sort'=>true,
			'search'=>true,
			'type'=>'text'
		),
		'sim_no' => array(
			'name' => 'sim卡号',
			'width' => 'auto',
			'type'=>'text',
			'sort'=>true,
			'search'=>true
		),
		'comment'=>array(
			'name'=>'备注',
			'width'=>'auto',
			'type'=>'text'
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>110,
			'sort'=>true,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'obd_total_count' => array(
			'name' => 'OBD数据总数',
			'type' => 'text',
			'null' => false
		),
		'obd_min_ctime' => array(
			'name' => 'OBD数据最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'obd_max_ctime' => array(
			'name' => 'OBD数据最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'obds12_min_id'=>array(
			'name'=>'OBD数据最小id',
			'type'=>'text',
			'null'=>true
		),
		'obds12_max_id'=>array(
			'name'=>'OBD数据最大id',
			'type'=>'text',
			'null'=>true
		),
		'gps_total_count' => array(
			'name' => 'GPS数据总数',
			'type' => 'text',
			'null' => false
		),
		'gps_min_ctime' => array(
			'name' => 'GPS数据最早创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'gps_max_ctime' => array(
			'name' => 'GPS数据最晚创建时间',
			'type' => 'text',
			'null' => false,
			'filter'=>'show_vanet_v_ucn_stats_date'
		),
		'gpsdata_min_id'=>array(
			'name'=>'GPS数据最小id',
			'type'=>'text',
			'null'=>true
		),
		'gpsdata_max_id'=>array(
			'name'=>'GPS数据最大id',
			'type'=>'text',
			'null'=>true
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>200,
			'filter'=>'show_vanet_v_ucn_stats_options'
		)
	)
);

function show_vanet_v_ucn_stats_date($t)
{
	return date('Y-m-d H:i',$t);
}

$end_rights[] = array(
	'name'=>'vanet_v_ucn_stats',
	'description'=>'车辆OBD&GPS统计视图',
	'rights'=>array('view')
);

function show_vanet_v_ucn_stats_options($car)
{
	end_show_view_button($car['car_id']);
	end_show_obddata_button($car['nobd_id'],'查看OBD数据');
	end_show_gpsdata_button($car['nobd_id'],'查看GPS数据');
}