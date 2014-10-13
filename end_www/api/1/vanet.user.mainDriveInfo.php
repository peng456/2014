<?php

/**
 * API 2.13
 * get total drivesense info
 *
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;
 
if (!isset($data['access_token']))
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];
$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;

if (!$data_user) 
{
	die_json_msg('database error: get user error', 10003) ;
}

$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
$mile_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']} ") ;

$data = $db->get_all("SELECT * from end_vanet_usercar where user_id=$user_id");

$device_id = 0 ;

foreach ($data as $key => $value) 
{
	$obd_data = $db->get_all("SELECT * from end_vanet_nobd where car_id = $value[car_id]") ;
	$device_data[$device_id]['obd_imei'] = $obd_data[0]['sn'] ;
	//$device_data[$device_id]['obd_pw'] = $obd_data[0]['pw'] ;
	$device_data[$device_id]['vehicle_id'] = $obd_data[0]['car_id'] ;

	$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = $value[car_id] ") ;
	$device_data[$device_id]['vehicle_name'] = $car_data[0]['vehicle_name'] ;
	$device_data[$device_id]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
	$device_data[$device_id]['vehicle_brand'] = $car_data[0]['brand'] ;
	$device_data[$device_id]['vehicle_type'] = $car_data[0]['model'] ;
	$device_data[$device_id]['init_mile'] = $car_data[0]['init_mile'] ;
	$device_data[$device_id]['current_mile'] = $car_data[0]['current_mile'] ;
	$device_data[$device_id]['engine_size'] = $car_data[0]['engine_size'] ;

	if (!$obd_data || !$car_data) 
	{
		die_json_msg('database error:get car info error', 10003) ;
	}
	
	$device_id ++ ;
}

json_send(array('averageFuel'=>$socre_data[0]['average_fuel'],
				'current_mile'=>$mile_data[0]['current_mile'],
				'averageFuelBill'=>$socre_data[0]['average_fuel_bill'],
				'speed'=>$socre_data[0]['speed'],
				'grade'=>$socre_data[0]['grade'],
				'run_time'=>$socre_data[0]['run_time'],
				'bind_id'=>$data_user[0]['default_carid'],
				'count'=>$device_id,
				'device_data'=>$device_data,
				));